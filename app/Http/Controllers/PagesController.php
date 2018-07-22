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
      $users = User::latest()->paginate(10);
      return view('pages.users')->with('users', $users);
    }
  }

  public function orders() {
    if ($this->isCurrentUserAdmin()) {
      $orders = Order::latest()->paginate(10);
      return view('pages.orders')->with('orders', $orders);
    }
  }

  public function destroy($id) {
    if ($this->isCurrentUserAdmin()) {
      $user = User::find($id);
      $user->delete();
      return redirect('/users')->with('success', 'The user has been removed!');
    }
  }

  public function mark_as_done($id) {
    if ($this->isCurrentUserAdmin()) {
      $order = Order::find($id);
      $mark = true;
      if ($order->done) {
        $mark = false;
      }
      $order->done = $mark;
      $order->save();
      return redirect('/orders');
    }
  }

}
