@extends('layouts.auth')

@section('title', 'register')



@section('auth.content')
    <x-card>
        <x-card-header>
            <h4 class="m-0">
                {{ __('Регистрация') }}
            </h4>
            <x-slot name='right'>
                <a href="{{ route('login') }}">
                   {{__('Войти')}}
                </a>
            </x-slot>
        </x-card-header>
        <div class="card-body">
            <x-form action="{{ route('register.store') }}" method="post">
                <x-form-item>
                    <x-label required>
                        {{ _('Имя') }}
                    </x-label>
                    <x-input name="name" value="{{ request()->old('name')}}" autofocus />
                </x-form-item>
                <x-form-item>
                    <x-label required>
                        {{ _('Почта') }}
                    </x-label>
                    <x-input type="email" name="email" value="{{ request()->old('email')}}" required />
                </x-form-item>
                <x-form-item>
                    <x-label required>
                        {{ _('Пароль') }}
                    </x-label>
                    <x-input type="password" name="password" />
                </x-form-item>
                <x-form-item>
                    <x-label required>
                        {{ _('Повторите пароль') }}
                    </x-label>
                    <x-input type="password" name="password_confirmation" />
                </x-form-item>
                <x-form-item>
                    <div class="form-check">
                        <x-checkbox name="agreement" id="agree" />
                        <x-label class="form-check-label" for="agree">
                            {{ __('Я согласен на обработку чего то там') }}
                        </x-label>
                    </div>
                </x-form-item>
                <x-button type="submit">
                    {{ __('Регистрация') }}
                </x-button>
            </x-form>
        </div>
    </x-card>
@endsection
