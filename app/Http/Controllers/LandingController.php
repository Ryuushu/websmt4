<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LandingController extends Controller
{
   public function index(){
    $datatext="data dari controller";
        return view('pages.landing',['datatext'=>$datatext]);
   }
}
