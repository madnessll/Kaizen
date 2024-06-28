<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        $forum = $topic->forum;
        $replies = $topic->replies()->paginate(10); 

        // Return the view with the topic and replies
        return view('topics.show', compact('topic', 'replies', 'forum'));
    }
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        if (Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Вы не имеете права создавать новые темы.');
        }

        $topic = new Topic();
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->forum_id = $forum->id;
        $topic->user_id = Auth::id();
        $topic->save();

        return redirect()->route('forums.show', $forum->id)->with('success', 'Новая тема успешно создана.');
    }
    public function destroy(Topic $topic)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to delete this topic.');
        }

        $topic->delete();
        return redirect()->route('forums.show', $topic->forum_id)->with('success', 'Topic deleted successfully.');
    }
}
