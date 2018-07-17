<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function home() {
    return view('pages.home');
  }

  public function about_us() {
    return view('pages.about_us');
  }

  public function contact() {
    return view('pages.contact');
  }

}
