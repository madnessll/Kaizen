<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'response' => 'required|string|max:1000',
        ]);

        Reply::create([
            'content' => $request->input('response'),
            'topic_id' => $topic->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('topics.show', $topic->id);
    }
    public function destroy(Reply $reply)
    {
        if (Auth::id() !== $reply->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this reply.');
        }

        $reply->delete();
        return redirect()->back();
    }
}
