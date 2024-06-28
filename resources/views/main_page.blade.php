@extends('layouts.app')

@section('title', 'Kaizen')

@section('content')
<section class="questions">
    @foreach ($forums as $forum)
        <div class="question">
            <a href="{{ route('forums.show', $forum->id) }}" class="question__forum">{{ $forum->name }}</a>
            @foreach ($forum->topics as $topic)
                <div class="question__descr">
                    <div class="question__descr-left">
                        <!-- <div class="question__descr-left-name">{{ $topic->title }}</div> -->
                        <a href="{{ route('topics.show', $topic->id) }}" class="question__descr-left-name">{{ $topic->title }}</a>
                        <div class="question__descr-left-descr">{{ $topic->content }}</div>
                    </div>
                    <!-- <div class="question__descr-right">
                        <div class="question__descr-right-img">
                            <img src="{{ asset('images/ava.png') }}" alt="ava">
                        </div>
                        <div class="question__descr-right-descr">
                            <div class="question__descr-right-last">Последний вопрос</div>
                            <div class="question__descr-right-author">Автор</div>
                            <div class="question__descr-right-time">Сегодня, 13:50</div>
                        </div>
                    </div> -->
                </div>
            @endforeach
        </div>
    @endforeach
</section>
@endsection
