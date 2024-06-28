<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Topic;

class ForumController extends Controller
{
    public function show(Forum $forum)
    {
        // $topics = $forum->topics;
        $topics = Topic::where('forum_id', $forum->id)->paginate(10);

        return view('forums.show', compact('forum', 'topics'));
    }
}
