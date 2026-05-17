<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ilustrator;
class landingPageController extends Controller
{
    public function index()
    {
       $ilustrators = Ilustrator::whereHas('user', function($query) {
        $query->where('status', 'active')->where('role_id', 3);
    })->orderBy('updated_at', 'asc')->get();
        $services = Service::all();
        return view('user.home', compact('ilustrators', 'services'));
    }

    public function detailIlustrator($id){

     $ilustrators = Ilustrator::with(['user'])->get()->findOrFail($id);

     return view('user.userPortofolio', compact('ilustrators'));


    }

    
}
