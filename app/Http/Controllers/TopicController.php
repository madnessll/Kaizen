<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        // Load replies for the topic
        $replies = $topic->replies;

        // Return the view with the topic and replies
        return view('topics.show', compact('topic', 'replies'));
    }
}
