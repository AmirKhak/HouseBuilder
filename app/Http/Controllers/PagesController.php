<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;

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

  public function users() {
    if ($this->isCurrentUserAdmin()) {
      $users = User::all()->latest();
      return view('pages.users');
    }
  }

  public function orders() {
    if ($this->isCurrentUserAdmin()) {
      $orders = Order::all()->latest();
      return view('pages.orders');
    }
  }

}
