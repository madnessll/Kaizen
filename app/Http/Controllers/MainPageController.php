<?php

namespace App\Http\Controllers;
use App\Models\Forum;
use App\Models\Topic;

class MainPageController extends Controller
{
  public function index() {
    $forums = Forum::with('topics')->get();
    return view("main_page", compact('forums'));
  }
}