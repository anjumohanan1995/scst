<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClerkController extends Controller
{
  public function ChildFinanceListClerk(){
    return view('clerk.ChildFinanceList');
  }
}
