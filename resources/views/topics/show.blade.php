@extends('layouts.app')

@section('title', 'Topic Details')

@section('content')
<section class="discussion">
    <h1 class="discussion__topic">{{ $topic->title }}</h1>
    <div class="discussion__form">
        <label class="discussion__answer" for="response">Ответить</label>
        <textarea class="discussion__form-text" id="response" name="response"></textarea>
        <div class="discussion__wrapper">
            <button class="discussion__btn" type="submit">Отправить</button>
        </div>
    </div>
</section>
@endsection
