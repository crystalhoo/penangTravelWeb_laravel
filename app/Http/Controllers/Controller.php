<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create()
    {
      if (Gate::allows('isAdmin')) {
          dd('Admin allowed');
      } else {
          dd('You are not Admin');
      }

    }

    public function edit()
    {
      if (Gate::allows('isAdmin')) {
          dd('Admin allowed');
      } else {
          dd('You are not Admin');
      }

    }
    public function delete()
  {
      if (Gate::allows('isAdmin')) {
          dd('Admin allowed');
      } else {
          dd('You are not Admin');
      }

  }
}
