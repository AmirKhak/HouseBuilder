<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function isCurrentUserAdmin() {
      $is_current_user_admin = false;
      if (Auth::check()) {
        if (Auth::user()->admin) {
          $is_current_user_admin = true;
        }
      }
      return $is_current_user_admin;
    }
}
