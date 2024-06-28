@extends('layouts.app')

@section('title', 'Topic Details')

@section('content')
<section class="discussion">
    <h1 class="discussion__topic">{{ $topic->title }}</h1>
    @foreach ($replies as $reply)
        <div class="discussion__replies replies">
            <div class="replies__wrapper">
                <div class="replies__name">Имя: {{ $reply->user->name }}</div>
                <div class="replies__date">{{ $reply->created_at->format('H:i, d M Y') }}</div>
            </div>
            <div class="replies__comment">{{ $reply->content }}</div>
            @if (Auth::id() === $reply->user_id)
                <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="replies__delete-btn">Удалить</button>
                </form>
            @endif
        </div>
        <div class="replies__black"></div>
    @endforeach
    <div class="discussion__form">
        <form action="{{ route('replies.store', $topic->id) }}" method="POST">
            @csrf
            <label class="discussion__answer" for="response">Ответить</label>
            <textarea class="discussion__form-text" id="response" name="response"></textarea>
            <div class="discussion__wrapper">
                <button class="discussion__btn" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</section>
@endsection
