<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Forum;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        // Load replies for the topic
        // $replies = $topic->replies()->with('user')->get();
        $forum = $topic->forum;
        $replies = $topic->replies()->paginate(10); 

        // Return the view with the topic and replies
        return view('topics.show', compact('topic', 'replies', 'forum'));
    }
}
