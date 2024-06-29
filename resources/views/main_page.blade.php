@extends('layouts.app')

@section('title', 'Kaizen')

@section('content')
<section class="questions">
    @foreach ($forums as $forum)
        <div class="question">
            <a href="{{ route('forums.show', $forum->id) }}" class="question__forum">{{ $forum->name }}</a>
            @php $count = 0; @endphp
            @foreach ($forum->topics as $topic)
                @if ($count >= 5)
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
<div class="pagination questions__pagination">
    {{ $forums->links() }} <!-- Вывод пагинационных ссылок для форумов -->
</div>
    @auth
        @if (Auth::user()->role === 'admin')
            <div class="questions__form">
                <form action="{{ route('forums.store') }}" method="POST">
                    @csrf
                    <label class="questions__answer" for="name">Название форума</label>
                    <input type="text" class="questions__form-text" id="name" name="name" required>
                    <div class="questions__form-wrapper">
                        <button type="submit" class="forum-topics__form-btn">Создать</button>
                    </div>
                </form>
            </div>
        @endif
    @endauth
@endsection
