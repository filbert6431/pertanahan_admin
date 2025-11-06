<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
     public function index() {
        return view('Pages.index');
    }

    public function form() {
        return view('pages.form');
    }


}
