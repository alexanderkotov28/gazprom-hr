<header class="header">
    <img class="header__logo" src="/img/logo.svg" alt="Logo">

    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="header__links">
        <a href="{{ route('admin.vacancies.index') }}" class="header__link link">Вакансии</a>
        <a href="{{ route('admin.positions.index') }}" class="header__link link">Должности</a>
        <a href="#" class="header__link link">Тесты</a>
        <a href="#" class="header__link link">Кандидаты</a>
    </div>

    <div class="header__account">
        <img src="/img/avatars/{{ Auth::user()->role->slug == 'hr'?'hr':'employer' }}.png" alt="" class="header__avatar">
        <div class="header__info">
            <div class="header__name">{{ Auth::user()->role->slug == 'hr'?'Анастасия Петрова':'Иван Седобородов' }}</div>
            <div class="header__prof">{{ Auth::user()->role->slug == 'hr'?'HR Manager':'Руководитель IT-департамента' }}</div>
        </div>
        <div class="header__dots">
            <div class="header__dot"></div>
            <div class="header__dot"></div>
            <div class="header__dot"></div>
        </div>
    </div>
    @endif
</header>