<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function profile(){
        $authenticatedId = Auth::user()->id;
        $authenticatedData = User::find($authenticatedId);

        return view('admin.profile_admin', compact('authenticatedData'));
    }
}
