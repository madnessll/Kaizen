<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaizen</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
</head>
<body>
  <header class="header">
      <div class="header__container">
          <div class="header__wrapper">
              <h1 class="header__name">
                  <a href="{{ route('main_page') }}" class="header__link">Kaizen</a>
              </h1>
              <div class="header__right">
                <div class="header__right-form">
                  <input type="text" class="header__right-input" placeholder="Искать">
                  <button class="header__right-form-btn">
                    <div class="header__right-input-bg"></div>
                    <img src="{{ asset('images/search.svg') }}" alt="search" class="header__right-search">
                  </button>
                </div>
                <div class="header__btns">
                  @auth
                      <div class="header__user">
                          <span class="header__user-name">{{ Auth::user()->name }}</span>
                          <a href="{{ route('logout') }}" class="header__btn"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Выйти
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  @else
                      <a href="{{ route('login') }}" class="header__btn">Войти</a>
                      <a href="{{ route('register') }}" class="header__btn">Зарегистрироваться</a>
                  @endauth
                </div>
              </div>
          </div>
      </div>
  </header>
  <section class="questions">
    @foreach ($forums as $forum)
        <div class="question">
            <div class="question__forum">{{ $forum->name }}</div>
            @foreach ($forum->topics as $topic)
                <div class="question__descr">
                    <div class="question__descr-left">
                        <div class="question__descr-left-name">{{ $topic->title }}</div>
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
            @endforeach
        </div>
    @endforeach
  </section>
  <footer class="footer">
    <div class="footer__descr">Сайтик замутил Анатолий Федоров</div>
  </footer>
</body>
</html>
