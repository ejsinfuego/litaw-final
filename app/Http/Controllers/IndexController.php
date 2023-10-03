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
        return $user->hasRole('admin') ? view('admin.index') : view('moderator.index');
        
    }
}
