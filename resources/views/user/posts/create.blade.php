@extends('layouts.base')
@section('title', 'Создать пост')


@section('content')
    <section>
        <x-container>
            <x-title>
                {{ __('Создать пост') }}
                <x-slot name="right">
                    <a href="{{ URL::previous() }}">
                        {{ __('назад') }}
                    </a>
                </x-slot>
            </x-title>
            <x-form action="{{ route('posts.store') }}" method='post'>
                <x-form-item>
                    <x-label for="">
                        {{ __('Название поста') }}
                    </x-label>
                    <x-input name="title" autofocus value="{{ request()->old('title') }}" />
                    @error('title')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label for="">
                        {{ __('Содержание поста') }}
                    </x-label>
                    <input id="x" type="hidden" name="content" value="{{ request()->old('content') }}">
                    <trix-editor input="x"></trix-editor>
                    @error('content')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </x-form-item>

                <x-form-item>
                    <x-label for="">
                        {{ __('Дата публикации') }}
                    </x-label>
                    <x-input id="x" type="text" name="published_at" placeholder="dd.mm.yyyy"/>
                    @error('published_at')
                        <div class="small text-danger">{{ $message }}</div>
                    @enderror
                </x-form-item>
                
                <x-form-item>
                    <x-checkbox id="pub" name='published'/>
                    <x-label class="form-check-label" for="pub">
                        {{__('Опубликовано')}}
                    </x-label>
                </x-form-item>
                <x-button>
                    {{ __('Создать') }}
                </x-button>
            </x-form>


        </x-container>
    </section>
@endsection
@push('trix-css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endpush
@push('trix-js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush
