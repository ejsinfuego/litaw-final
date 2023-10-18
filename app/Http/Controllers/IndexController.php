<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class IndexController extends Controller
{
    //
    public function index(User $user)
    {
       if (auth()->user()->hasRole('admin')) {
            return view('admin.index', [
                'users' => $user::all(),
            ]);
        } elseif (auth()->user()->hasRole('contentModerator')) {
            return view('moderator.index', [
                'users' => $user::all(),
            ]);
        } else {
            return view('home', [
                'users' => $user::all(),
            ]);
        }
        
    }
}
