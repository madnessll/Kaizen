<?php

namespace App\Http\Controllers;
use App\Models\Forum;
use App\Models\Topic;

class MainPageController extends Controller
{
  public function index() {
    $forums = Forum::with('topics')->get();
    $forums = Forum::paginate(2);
    return view("main_page", compact('forums'));
  }
}