<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
     public function index() {
        return view('admin/index');
    }

    public function form() {
        return view('admin/form');
    }

    public function table() {
        return view('admin/table');
    }

    public function chart() {
        return view('admin/chart');
    }

    public function signin() {
        return view('admin/signin');
    }

    public function signup() {
        return view('admin/signup');
    }

    public function blank() {
        return view('admin/blank');
    }

    public function error404() {
        return view('admin/404');
    }
}
