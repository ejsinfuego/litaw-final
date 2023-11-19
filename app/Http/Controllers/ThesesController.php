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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
    public function index(Theses $theses): View
    {
        //check route
         $departments = [];
        if(request()->route()->getName() == 'theses'){
            $theses = Theses::class;
            $colleges = College::all();
            foreach($colleges as $college){
                //append in departmens array
                array_push($departments, $college->college);
            }
        }
        $college = array();
        $colleges = College::all();
        foreach($colleges as $col){
            $college[] = $col->college;
        }
        //caching theses per college
        //get all the college -> get the id of the college -> get the count of theses per college -> store it in an theses_count array
        cache()->remember('theses_college_counts', now()->addMinutes(1), function(){
            $colleges = College::all();
            $theses_count = array();
            foreach($colleges as $college){
                $college_theses = Theses::where('college_id', $college->id)->where('approved', 1)->get();
                array_push($theses_count, $college_theses->count());
            }
            return $theses_count;
        });

        //caching theses per course
        //get all the course -> get the id of the course -> get the count of theses per course -> store it in an theses_count array
  
        cache()->remember('theses_course_counts', now()->addMinutes(1), function(){
            $theses = Theses::all();
            $theses_count = array();
            $kurso = array();
            $theses = Theses::join('courses', 'theses.course_id', '=', 'courses.id' )->where('approved', 1)->get();
            $kurso = array();
            foreach($theses as $thesis){
                //check if the course already existing in kurso if false it push the course and count the number of thesis
                if(in_array($thesis->course, $kurso) == false){
                    array_push($kurso, $thesis->course);
                    $theses_course = Theses::join('courses', 'theses.course_id', '=', 'courses.id')->where('course', $thesis->course)->where('approved', 1)->get();
                                        array_push($theses_count, $theses_course->count());
                    }
                }

            return $theses_count;
        });

       
        cache()->remember('courses', now()->addMinutes(1), function(){
             $theses = Theses::join('courses', 'theses.course_id', '=', 'courses.id' )->where('approved', 1)->get();
            $kurso = array();
            foreach($theses as $thesis){
                //check if the course already existing in kurso
                if(in_array($thesis->course, $kurso) == false){
                    array_push($kurso, $thesis->course);
                }
                
            }
            return $kurso;
        });
          
        
        //caching theses per college
        //get all the college -> get the id of the college -> get the count of years per college -> store it in an years_count array
        $years = Year::all();
        $taons = array();
        foreach($years as $year){
            $taons[] = $year->year;
        }
        cache()->remember('years_college_counts', now()->addMinutes(1), function(){
            $years_count = array();
            $years = Year::all();
            foreach($years as $year){
                $theses_years = Theses::where('year_id', $year->id)->where('approved', 1)->get('year_id');
                array_push($years_count, $theses_years->count());
            }
            return $years_count;
        });

        cache()->remember('theses', now()->addMinutes(5), function() use ($theses){
            return $theses::with('authors')->latest()->limit(3)->get()->where('approved', 1);
        });

        cache()->rememberForever('cas', function(){
           return College::where('college', 'college of arts and sciences')->get()->first();
        });

        cache()->rememberForever('cbm', function(){
            return College::where('college', 'college of business and management')->get()->first();
         });

         cache()->rememberForever('coed', function(){
            return College::where('college', 'college of education')->get()->first();
         });

         cache()->rememberForever('cet', function(){
            return College::where('college', 'college of engineering and technology')->get()->first();
         });

        
        //for loop to cache
        for($i = 0; $i < sizeOf($colleges); $i++){
            if($colleges[$i]['id'] == 2){
            cache()->remember('cbm_theses', now()->addMinutes(10),
                function(){
                    return Theses::where('college_id', 2)->where('approved', 1)->count();
            });
            
        }else if($colleges[$i]['id'] == 1){
            cache()->remember('cas_theses', now()->addMinutes(10),
                function(){
                    return Theses::where('college_id', 1)->where('approved', 1)->count();
            });
        }else if($colleges[$i]['id'] == 3){
            cache()->remember('cet_theses', now()->addMinutes(10),
                function(){
                    return Theses::where('college_id', 3)->where('approved', 1)->count();
            });
        }else{
                cache()->remember('coed_theses', now()->addMinutes(10),
                    function(){
                        return Theses::where('college_id', 4)->where('approved', 1)->count();
                });
        }
        }
        //end cache
        return view('home', [
            'theses' => Theses::all(),
            'cas' => Cache::get('cas'),
            'cbm' => Cache::get('cbm'),
            'coed' => Cache::get('coed'),
            'cet' => Cache::get('cet'),
            'cbm_theses' => Cache::get('cbm_theses'),    
            'cas_theses' => Cache::get('cas_theses'),
            'coed_theses' => Cache::get('coed_theses'),
            'cet_theses' => Cache::get('cet_theses'),
            'colleges' => $college,
            'courses' => Cache::get('courses'),
            'course_count' => Cache::get('theses_course_counts'),
            'years' => $taons,
            'years_count' => Cache::get('years_college_counts'),
            'counts' => Cache::get('theses_college_counts'),
            'recent_theses' => Cache::get('theses'),
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
        cache()->remember('highest_course', now()->addHours(1), function(){
             //get all the course that have theses
            $theses = Theses::where('approved', 1)->get('course_id');
            $courses = array();
            $course_that_have_theses = array();
            foreach($theses as $thesis){
                array_push($courses, $thesis->course_id);
            }
            $course_count = array_count_values($courses);

            foreach($course_count as $keys => $value){
                $course_count[$keys] = Course::where('id', $keys)->get()->first();
                array_push($course_that_have_theses, $course_count[$keys]);
            }
            return $course_that_have_theses;
        });
        return view('colleges', [
            'theses' => Theses::with('authors')->where('college_id', $key)->where('approved', 1)->get()->sortByDesc('year'),
            'college' => College::where('id', $key)->get()->first(),
            'years' => Year::all(),
            'program' => DB::table('courses')->where('course', $key)->get()->first(),
            'courses' => Cache::get('highest_course'),
            'course' => Theses::with('course')->where('course_id', $key)->get(),
        ]);
    }

    public function stats(Theses $theses, User $user)
    {   
        // $collage = array();
        // $colleges = College::all();
        // foreach($colleges as $college){
        //     array_push($collage, $college->college);
        // 
        $user = Auth::user();
        $courses = Course::where('college_id', $user->college_id)->get();
        $count_theses_per_course = array();
        $theses = $theses->where('college_id', $user->college_id)->get();

        foreach($courses as $course){
            $count_theses_per_course[] = Theses::where('course_id', $course->id)->count();
        }
        return view('statistics', [
            'theses' => $theses,
            'college' => College::where('id', $user->college_id)->get(),
            'courses' => $courses,
            'counts_of_theses' => $count_theses_per_course,
        ]);
    }

    public function cacheHighestCourse(){

        cache()->remember('highest_course', now()->addHours(1), function(){
            //get all the course that have theses
           $theses = Theses::where('approved', 1)->get('course_id');
           $courses = array();
           $course_that_have_theses = array();
           foreach($theses as $thesis){
               array_push($courses, $thesis->course_id);
           }
           $course_count = array_count_values($courses);

           foreach($course_count as $keys => $value){
               $course_count[$keys] = Course::where('id', $keys)->get()->first();
               array_push($course_that_have_theses, $course_count[$keys]);
           }
           return $course_that_have_theses;
       });
    }
    public function years(Request $request)
    {   
        $theses = Theses::where('approved', 1)->get('course_id');
        $courses = array();
        $course_that_have_theses = array();
        foreach($theses as $thesis){
            array_push($courses, $thesis->course_id);
        }
        $course_count = array_count_values($courses);
        
        foreach($course_count as $key => $value){
            $course_count[$key] = Course::where('id', $key)->get()->first();
            array_push($course_that_have_theses, $course_count[$key]);
        }
        
        $year = $request->year;
        $college = $request->college;
        if($request->college != null){
            $theses = Theses::where('college_id', $college)->where('year_id', $year)->where('approved', 1)->get();
            $key = $request->college;
            return view('colleges', [
                'taon' => Year::where('id', $year)->get()->first(),
                'theses' => $theses,
                'college' => College::find($college)->get()->first(),
                'years' => Year::all(),
                'courses' => $course_that_have_theses,
                'key' => $key,
            ]);
        }elseif($request->course!= null){
            return view('courses', [
                'program' => Course::where('id', $request->course)->get()->first(),
                'theses' => Theses::where('course_id', $request->course)->where('year_id', $request->year)->where('approved', 1)->get(),
                'college' => College::all(),
                'years' => Year::all(),
                'courses' => Cache::get('highest_course'),
                'year' => Year::where('id', $request->year)->get()->first(),
            ]);
        }else{
            $term = $request->search;
            $year = $request->year;
            return view('browse-theses', [
                'theses' => Theses::search($term)->where('year_id', $year)->where('approved', 1)->get(),
                'college' => College::search($term)->get(),
                'years' => Year::all(),
                'courses' => $course_that_have_theses,
                'programs' => Course::search($term)->get()->take(5),
                'colleges' => College::all()->take(5),
                'search' => $request->search,
                'year' => Year::where('id', $year)->get()->first(),
            ]);
        }

        // return view('year', [
        //     'taon' => Year::where('id', $year)->get()->first(),
        //     'theses' => $theses,
        //     'college' => College::all(),
        //     'years' => Year::all(),
        //     'courses' => $course_that_have_theses,
        //     'key' => 'college='.$key,
        // ]);
    }

    //function to show only the year user desired
    function sortYear(Request $request){

       
       
        $theses = Theses::where('approved', 1)->get('course_id');
        $courses = array();
        $course_that_have_theses = array();
        foreach($theses as $thesis){
            array_push($courses, $thesis->course_id);
        }
        $course_count = array_count_values($courses);
        
        foreach($course_count as $key => $value){
            $course_count[$key] = Course::where('id', $key)->get()->first();
            array_push($course_that_have_theses, $course_count[$key]);
        }
        
        return view('browse-theses', [
            'theses' => $theses,
            'years' => Year::all(),
            'courses' => $course_that_have_theses,
            'college' => College::all(),
            'programs' => Course::all()->take(5),
            'colleges' => College::all()->take(5),
            'key' => $request->college,

        ]);


    }

    public function courses(Request $request)
    {
        cache()->remember('highest_course', now()->addHours(1), function(){
            //get all the course that have theses
           $theses = Theses::where('approved', 1)->get('course_id');
           $courses = array();
           $course_that_have_theses = array();
           foreach($theses as $thesis){
               array_push($courses, $thesis->course_id);
           }
           $course_count = array_count_values($courses);

           foreach($course_count as $keys => $value){
               $course_count[$keys] = Course::where('id', $keys)->get()->first();
               array_push($course_that_have_theses, $course_count[$keys]);
           }
           return $course_that_have_theses;
       });
        return view('courses', [
            'program' => Course::where('id', $request->course)->get()->first(),
            'theses' => Theses::where('course_id', $request->course)->where('approved', 1)->get(),
            'college' => College::all(),
            'years' => Year::all(),
            'courses' => Cache::get('highest_course'),
        ]);
    }


    public function singleThesis(Theses $theses)
    {   
        //We will be retrieving the session_id and theses_id from the current session which we will gonna query if there is already a row with the same data. If no return, it will gonna insert another row. The general idea is the theses_id must be different from session_id or vice versa.
        if($theses->approved == 1){
            
        $check = DB::table('viewed_theses')->where('session_id',session()->getId())->where('theses_id', $theses->id)->get();

        if(sizeOf($check) == null){
            ViewedTheses::create([
                'session_id' => session()->getId(),
                'user_id' => isset(auth()->user()->id) ? auth()->user()->id : null,
                'theses_id' => $theses->id, 
            ]);
        }
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
            'colleges' => DB::table('colleges')->get()->take(5),
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
                'author' => $author_id, 'email' => $request->author_email[$key],
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
        // this block sorts what course has the highest number of theses and display accordingly
        $theses = Theses::where('approved', 1)->get('course_id');
        $courses = array();
        $course_that_have_theses = array();
        foreach($theses as $thesis){
            array_push($courses, $thesis->course_id);
        }
        $course_count = array_count_values($courses);
        
        foreach($course_count as $key => $value){
            $course_count[$key] = Course::where('id', $key)->get()->first();
            array_push($course_that_have_theses, $course_count[$key]);
        }
        //end of this block
        
        $term = $request->searchTitle;
        return view('browse-theses', [
            'theses' => Theses::join('years', 'theses.year_id', '=', 'years.id')
            ->join('courses', 'theses.course_id', '=', 'courses.id')
            ->join('colleges', 'theses.college_id', '=', 'colleges.id')
            ->select('theses.*', 'courses.id as courseID', 'courses.course', 'colleges.id as collegeID', 'colleges.college', 'years.id as yearID', 'years.year')->where('title', 'LIKE', '%'.$term.'%')->orWhere('course', 'LIKE', '%'.$term.'%')
            ->get(),
            'college' => College::search($term)->get(),
            'years' => Year::all(),
            'courses' => $course_that_have_theses,
            'programs' => Course::search($term)->get()->take(5),
            'colleges' => College::all()->take(5),
            'search' => $term,
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
