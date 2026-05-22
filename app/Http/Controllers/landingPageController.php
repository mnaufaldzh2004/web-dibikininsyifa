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
       $ilustrators = User::where('role_id', 3)->orderBy('name', 'asc')->get();
 
        $services = Service::all();
        return view('user.home', compact('ilustrators', 'services'));
    }

    public function detailIlustrator($id){

     $ilustrators = Ilustrator::with(['user'])->get()->findOrFail($id);
 
     $portofolios = Ilustrator::where('user_id', $id)->orderBy('updated_at', 'asc')->get();
     return view('user.userPortofolio', compact('ilustrators', 'portofolios'));


    }

    
}
