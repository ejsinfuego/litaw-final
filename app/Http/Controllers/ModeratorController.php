<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Theses;
use App\Models\College;
use App\Models\Moderator;
use App\Models\Interactions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModeratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user, Theses $theses)
    {
        //
        if(Auth::user()->hasRole('admin')) {
            $theses = $theses::with('authors')->latest()->get();
        if($theses->isEmpty()) {
            return view('moderator.index', [
                'theses' => $theses,
                'message' => 'No theses to approve',
            ]);
        }
        }else{
        $college = Auth::user()->college_id;
        $theses = Theses::with('authors')->latest()->get()->where('college_id', $college);
        $college = Auth::user()->college_id;
        if($theses->isEmpty()) {
            return view('moderator.index', [
                'theses' => $theses,
                'message' => 'No theses to approve',
            ]);
            
        }
       
    }
    return view('moderator.index', [
        'theses' => $theses,
    ]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function approve(Request $request, Theses $theses, User $user)
    {   
      
        $theses = Theses::where('id', $request->id)->get()->first();
        $theses->update([
                'approved' => 1,
            ]);
            return redirect(route('moderator.index'));
    }

    public function users(User $user)
    {   
        $user = Auth::user();
        if($user->hasRole('contentModerator')){
            $users = User::with('roles')->where('college_id', $user->college_id)->get();
        }else{
            $users = User::with('roles')->get();
        }
        foreach($users as $user) {
            $user->role = $user->roles->pluck('name')->first();
            $user->course = Course::where('id', $user->course_id)->pluck('course')->first();
            $user->college = College::where('id', $user->college_id)->pluck('college')->first();
        }
        return view('moderator.users', [
            'users' => $users,
            
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Moderator $moderator)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moderator $moderator)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moderator $moderator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moderator $moderator)
    {
        //
    }
}
