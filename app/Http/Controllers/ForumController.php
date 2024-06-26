<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function show(Forum $forum)
    {
        $topics = $forum->topics;

        return view('forums.show', compact('forum', 'topics'));
    }
}
