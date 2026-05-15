<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;

class landingPageController extends Controller
{
    public function index()
    {
        $ilustrators = User::with(['role'])->where('status', 'active')->where('role_id', 3) ->orderBy('updated_at', 'asc')->get();
        $services = Service::all();
        return view('user.home', compact('ilustrators', 'services'));
    }

    public function detailIlustrator($id){

     $ilustrator = User::findOrfail($id);

     return view('user.userPortofolio', compact('ilustrator'));


    }

    
}
