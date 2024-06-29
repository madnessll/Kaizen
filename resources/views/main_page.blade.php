@extends('layouts.app')

@section('title', 'Kaizen')

@section('content')
<section class="questions">
    @foreach ($forums as $forum)
        <div class="question">
            <a href="{{ route('forums.show', $forum->id) }}" class="question__forum">{{ $forum->name }}</a>
            @php $count = 0; @endphp
            @foreach ($forum->topics as $topic)
                @if ($count >= 10)
                    @break
                @endif
                <div class="question__descr">
                    <div class="question__descr-left">
                        <a href="{{ route('topics.show', $topic->id) }}" class="question__descr-left-name">{{ $topic->title }}</a>
                        <div class="question__descr-left-descr">{{ $topic->content }}</div>
                    </div>
                </div>
                @php $count++; @endphp
            @endforeach
        </div>
    @endforeach
</section>
@endsection
