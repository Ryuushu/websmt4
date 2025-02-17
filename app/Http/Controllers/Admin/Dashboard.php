<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
   public function index(){
    $datatext="data dari controller";
        return view('pages.admin.dashboar',['datatext'=>$datatext]);
   }
}