<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Year;
use App\Models\Theses;
use App\Models\Authors;
use App\Models\College;
use Illuminate\View\View;
use App\Models\Interactions;
use App\Models\ViewedTheses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Policies\ThesisPolicy;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->authorizeResource(Theses::class, 'theses');
     }
    public function index(Theses $theses): View
    {
        //
        $cas = 'college of arts and sciences';
        $cbm = 'college of business and management';
        $coed = 'college of education';
        $cet = 'college of engineering and technology';

        return view('home', [
            'theses' => $theses::with('authors')->latest()->get()->where('approved', 1),
            'cas' => College::where('college', $cas)->get()->first()->id,
            'cbm' => College::where('college', $cbm)->get()->first()->id,
            'coed' => College::where('college', $coed)->get()->first()->id,
            'cet' => College::where('college', $cet)->get()->first()->id,
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
            'theses' => Theses::where('college_id', $key)->get(),
            'college' => College::where('id', $key)->get()->first(),
            'years' => Year::all(),
            'courses' => DB::table('courses')->get(),

        ]);
    }

    public function years($year)
    {   
        return view('colleges', [
            'theses' => Theses::where('year_id', $year)->get(),
            'college' => College::all(),
            'years' => Year::get()->latest(),
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

        return view('thesis-abstract', [
            'theses' => $theses::with('authors')->where('id', $theses->id)->get()->first(),
            'path' => Storage::url($theses->filename),
            'views'=> ViewedTheses::where('theses_id', $theses->id)->count(),
            'comments' => Interactions::where('theses_id', $theses->id)->with('user')->latest()->get(),
            'likes' => Interactions::where('theses_id', $theses->id)->where('likes', 1)->count(),
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
            'metakeys' => 'required',
            'filename' => 'required',
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
            'theses' => Theses::search($term)->get(),
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
            dd($theses);
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Theses $theses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theses $theses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Theses $theses)
    {
        //
    }
}
