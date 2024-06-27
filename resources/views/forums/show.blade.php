@extends('layouts.app')

@section('title', $forum->name)

@section('content')
<section class="forum-topics">
    <h1 class="forum-topics__title">{{ $forum->name }}</h1>
    @foreach ($topics as $topic)
        <div class="question__descr">
            <div class="question__descr-left">
              <a href="{{ route('topics.show', $topic->id) }}" class="question__descr-left-name">{{ $topic->title }}</a>
              <div class="question__descr-left-descr">{{ $topic->content }}</div>
            </div>
            <div class="question__descr-right">
              <div class="question__descr-right-img">
                <img src="{{ asset('images/ava.png') }}" alt="ava">
              </div>
              <div class="question__descr-right-descr">
                <div class="question__descr-right-last">Последний вопрос</div>
                <div class="question__descr-right-author">Автор</div>
                <div class="question__descr-right-time">Сегодня, 13:50</div>
              </div>
            </div>
          </div>
        </div>
    @endforeach
</section>
@endsection
