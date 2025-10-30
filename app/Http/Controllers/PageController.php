<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
     public function index() {
        return view('admin.pages.index');
    }

    public function form() {
        return view('admin.pages.form');
    }

    public function table() {
        return view('admin.pages.table');
    }

    public function chart() {
        return view('admin.pages.chart');
    }

    public function signin() {
        return view('admin.pages.signin');
    }

    public function signup() {
        return view('admin.pages.signup');
    }

    public function blank() {
        return view('admin.pages.blank');
    }

    public function error404() {
        return view('admin.pages.404');
    }
}
