@extends('layouts.admin')

@section('content')
    <div class="login-card__wrapper">
        <div class="login-card">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <div style="font-size: 18px;">Данные для входа:</div>
                    <div class="mt-1">
                        <div>Заказчик:</div>
                        <div>employer@hrbank.ga</div>
                        <div>test</div>
                    </div>
                    <div class="mt-2 mb-4">
                        <div>HR:</div>
                        <div>hr@hrbank.ga</div>
                        <div>test</div>
                    </div>
                </div>
                <field-input title="E-mail" type="email" name="email" @error('email') error="{{ $message }}" @enderror></field-input>
                <field-input title="Пароль" type="password" name="password" @error('password') error="{{ $message }}" @enderror></field-input>
                <button class="btn btn_blue btn_md">Войти</button>
            </form>
        </div>
    </div>
@endsection
