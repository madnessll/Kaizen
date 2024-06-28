@extends('layouts.app')

@section('title', $forum->name)

@section('content')
<section class="forum-topics">
    <div class="forum-topics__btn-back-wrapper">
      <a href="{{ route('main_page') }}" class="forum-topics__btn-back">Назад</a> 
    </div>
    <h1 class="forum-topics__title">{{ $forum->name }}</h1>
    @foreach ($topics as $topic)
        <div class="question__descr">
            <div class="question__descr-left">
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
        </div>
    @endforeach
    @auth
        @if (Auth::user()->role === 'admin')
            <div class="forum-topics__form">
                <form action="{{ route('topics.store', $forum->id) }}" method="POST">
                    @csrf
                    <label class="forum-topics__answer" for="title">Название темы</label>
                    <textarea class="forum-topics__form-text" id="title" name="title" required></textarea>
                    <label class="forum-topics__answer" for="content">Описание</label>
                    <textarea class="forum-topics__form-text" id="content" name="content" required></textarea>
                    <div class="forum-topics__form-wrapper">
                        <button type="submit" class="forum-topics__form-btn">Создать</button>
                    </div>
                </form>
            </div>
        @endif
    @endauth
</section>
@endsection
