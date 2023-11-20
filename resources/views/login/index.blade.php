@extends('layouts.auth')

@section('title', 'Login')



@section('auth.content')
    <x-card>
        <x-card-header>
            <h4 class="m-0">
                {{ __('Вход') }}
            </h4>
            <x-slot name="right"> 
                <a href="{{ route('register') }}">
                    {{__('Зарегистрироваться')}}
                </a>
            </x-slot>
        </x-card-header>
        <div class="card-body">
            <x-form action="{{ route('login.store') }}" method="post">
                <x-form-item>
                    <x-label required>
                        {{ _('Почта') }}
                    </x-label>
                    <x-input type="email" name="email" autofocus required />
                </x-form-item>
                <x-form-item>
                    <x-label required>
                        {{ _('Пароль') }}
                    </x-label>
                    <x-input type="password" name="password" />
                </x-form-item>
                <x-form-item>
                    <div class="form-check">
                        <x-checkbox name="remember" id="remember" checked />
                        <x-label class="form-check-label" for="remember">
                            {{ __('Запомнить') }}
                        </x-label>
                    </div>
                </x-form-item>
                <x-button type="submit">
                    {{ __('Войти') }}
                </x-button>
            </x-form>
        </div>
    </x-card>
@endsection
