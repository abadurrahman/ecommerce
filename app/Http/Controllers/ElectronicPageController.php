<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ElectronicPageController extends Controller
{
    public function Electronic()
    {
    $electronic=DB::table('electronics')->get();

    return view('pages.electronic',compact('electronic'));
    }
}
