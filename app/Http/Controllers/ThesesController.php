<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Year;
use App\Models\Course;
use App\Models\Theses;
use App\Models\Authors;
use App\Models\College;
use Illuminate\View\View;
use Spatie\PdfToImage\Pdf;
use App\Models\Interactions;
use App\Models\ViewedTheses;
use App\View\Components\nav;
use Illuminate\Http\Request;
use App\Policies\ThesisPolicy;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index(Theses $theses): View
    {
        //
        $cas = 'college of arts and sciences';
        $cbm = 'college of business and management';
        $coed = 'college of education';
        $cet = 'college of engineering and technology';

        return view('home', [
            'theses' => $theses::with('authors')->latest()->get()->where('approved', 1),
            'cas' => College::where('college', $cas)->get()->first(),
            'cbm' => College::where('college', $cbm)->get()->first(),
            'coed' => College::where('college', $coed)->get()->first(),
            'cet' => College::where('college', $cet)->get()->first(),
            'colleges' => College::all(),
            'cbm_theses' => $theses::where('college_id', 2)->where('approved', 1)->get(),    
            
            'cas_theses' => $theses::where('college_id', 1)->where('approved', 1),

            'coed_theses' => $theses::where('college_id', 4)->where('approved', 1)->get(),

            'cet_theses' => $theses::where('college_id', 3)->where('approved', 1)->get(),

            'recent_theses' => $theses::with('authors')->latest()->get()->where('approved', 1)->take(3),
            'courses' => DB::table('courses')->get(),

            //highest views
            'highest_views' => DB::table('viewed_theses')->select('theses_id')->groupBy('theses_id')->orderByRaw('COUNT(*) DESC')->limit(3)->get(),

            ]);

          

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function submit()
    {
        return view('submit', [
            'courses' => DB::table('courses')->get(),
            'colleges' => DB::table('colleges')->get(),
            'years' => DB::table('years')->get(),
        ]);
    }

    public function categories($key)
    {   
        return view('colleges', [
            'theses' => Theses::where('college_id', $key)->where('approved', 1)->get(),
            'college' => College::where('id', $key)->get()->first(),
            'years' => Year::all(),
            'program' => DB::table('courses')->where('course', $key)->get()->first(),
            'courses' => DB::table('courses')->get()->take(5),
            'course' => Theses::with('course')->where('course_id', $key)->get(),

        ]);
    }

    public function years($year)
    {   
        return view('year', [
            'taon' => Year::where('id', $year)->get()->first(),
            'theses' => Theses::where('year_id', $year)->where('approved', 1)->get(),
            'college' => College::all(),
            'years' => Year::all(),
            'courses' => DB::table('courses')->get(),
        ]);
    }

    public function courses($course)
    {   
        return view('courses', [
            'course' => Course::where('id', $course)->get()->first(),
            'theses' => Theses::where('course_id', $course)->where('approved', 1)->get(),
            'college' => College::all(),
            'years' => Year::all(),
            'courses' => DB::table('courses')->get(),
        ]);
    }


    public function singleThesis(Theses $theses)
    {   
        //We will be retrieving the session_id and theses_id from the current session which we will gonna query if there is already a row with the same data. If no return, it will gonna insert another row. The general idea is the theses_id must be different from session_id or vice versa.
    
        $check = DB::table('viewed_theses')->where('session_id',session()->getId())->where('theses_id', $theses->id)->get();

        if(sizeOf($check) == null){
            ViewedTheses::create([
                'session_id' => session()->getId(),
                'user_id' => isset(auth()->user()->id) ? auth()->user()->id : null,
                'theses_id' => $theses->id, 
            ]);
        }
        // $pathToPdf = Storage::disk('public')->path($theses->filename);
        // $pdf = new Pdf($pathToPdf);
        // $pathToWhereImageShouldBeStored = storage_path('app/public/theses_img/'.$theses->filename.'.jpg');
        // $pdf->saveImage($pathToWhereImageShouldBeStored);

        return view('thesis-abstract', [
            'theses' => $theses::with('authors')->where('id', $theses->id)->get()->first(),
            'path' => Storage::url($theses->filename),
            'views'=> ViewedTheses::where('theses_id', $theses->id)->count(),
            'comments' => Interactions::where('theses_id', $theses->id)->with('user')->latest()->get(),
            
            'likes' => DB::table('likes')->where('theses_id', $theses->id)->get(),
            'courses' => DB::table('courses')->get(),
            'colleges' => DB::table('colleges')->get(),
            'years' => DB::table('years')->get(),

            'recent_theses' => DB::table('theses')->latest()->get()->where('approved', 1)->take(5),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  
        $validated = $request->validate([

            'title' => 'required|max:255',
            'abstract' => 'required|max:20000',
            'filename' => 'required',
            'metakeys' => 'required',
            'course_id' => 'required',
            'college_id' => 'required',
            'year_id' => 'required',

        ]);
        $file = $request->filename;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $validated['filename'] = $filename; 
        Storage::disk('public')->put($filename, file_get_contents($file));
        $theses_id = array();

        //get arrays from authors input
        foreach($request->authors as $key => $author) {
            $author_id = $author;

            //store authors in authors table and get the id of the author and store it in theses_has_authors table

            DB::table('authors')->updateOrInsert([
                'author' => $author_id,
            ],[
                'author' => $author_id,
            ]);
            $getId = Authors::where('author', $author_id)->value('id');
            $theses_id[] = $getId;

        }
        //store in theses_has_authors table

        $request->user()->theses()->create($validated)->authors()->attach($theses_id);

       return redirect(route('view-thesis', $request->user()->theses()->latest()->first()->id));
    }

    public function search(Request $request)
    {
        $term = $request->searchTitle;
        return view('browse-theses', [
            'theses' => Theses::search($term)->where('approved', 1)->get(),
            'college' => College::search($term)->get(),
            'years' => Year::all(),
            'courses' => DB::table('courses')->get(),
            'programs' => Course::search($term)->get()->take(5),
            'colleges' => College::all()->take(5),
        ]);
    }

    public function approve(Request $request, User $user, Theses $theses)
    {   
        $user = Auth::user();
      
        if($user->can('approve', $theses)){
            $theses = Theses::where('id', $request->id)->get()->first();
            $theses->update([
                    'approved' => '1',
                ]);
                return redirect(route('moderator.index'));
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Theses $theses)
    {
        //
    }

    public function comment(Theses $theses, Request $request, User $user)
    {

        $theses = Theses::where('id', $request->theses_id)->get()->first();
        $user = Auth::user();
        Interactions::create(
            ['theses_id' => $request->thesis_id,
            'comment' => $request->comment, 'user_id' => $user->id,
            'likes' => 0]
        );  
        return redirect(route('view-thesis', $request->thesis_id));
    
    }

    public function like(Theses $theses, Request $request, User $user)
    {
        $user = Auth::user();
        DB::table('likes')->updateOrInsert(
            ['theses_id' => $theses->id],
            ['user_id' => $user->id,
            'likes' => 1]
        );  
        return redirect(route('view-thesis', $theses->id));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theses $theses, Request $request)
    {
        //
        $theses = Theses::where('id', $theses->id)->with('user')->get()->first();
        return view('edit', [
            'theses' => $theses,
            'colleges' => DB::table('colleges')->get(),
            'years' => DB::table('years')->get(),
            'courses' => DB::table('courses')->get(),
        ]);
    }

    public function updateThesis(Theses $theses)
    {   
        $theses = Theses::where('id', $theses->id)->get()->first();
        dd($theses->metakeys);
        return view('edit', [
            'theses' => $theses,
            'colleges' => DB::table('colleges')->get(),
            'years' => DB::table('years')->get(),
            'courses' => DB::table('courses')->get(),
        ]);
    }
        //

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theses $theses)
    {
        //
        //update or edit
        $request->validate([
            'title' => 'required|max:255',
            'abstract' => 'required|max:20000',
            'metakeys' => 'required',
            'course_id' => 'required',
            'year_id' => 'required',
            // 'authors' => 'required',
        ]);
        $theses->update([
            'title' => $request->title,
            'abstract' => $request->abstract,
            'metakeys' => $request->metakeys,
            'course_id' => $request->course_id,
            'year_id' => $request->year_id,
        ]);
        // $theses->authors()->detach();
        // $theses_id = array();
        // foreach($request->authors as $key => $author) {
        //     $author_id = $author;
        //     DB::table('authors')->updateOrInsert([
        //         'author' => $author_id,
        //     ],[
        //         'author' => $author_id,
        //     ]);
        //     $getId = Authors::where('author', $author_id)->value('id');
        //     $theses_id[] = $getId;
        // }
        // $theses->authors()->attach($theses_id);

        return redirect(route('view-thesis', $theses->id));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theses $theses)
    {
        //
        $user = User::find(Auth::user()->id);
        $user->theses()->detach($theses->id);
        $theses->delete();
        return redirect(route('dashboard'));
    }
}
