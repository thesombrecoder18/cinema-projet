<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function annonces()
    {
        return view('admin.annonces');
    }

    public function movies()
    {
        return view('admin.movies');
    }

    public function seances()
    {
        return view('admin.seances');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}