<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function profile(){
        $authenticatedId = Auth::user()->id;
        $authenticatedData = User::find($authenticatedId);

        return view('admin.profile_admin', compact('authenticatedData'));
    }
}
