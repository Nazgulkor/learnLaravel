@extends('layouts.base')
@section('title', 'Изменить пост')


@section('content')
    <section>
        <x-container>
            <x-title>
                {{ __('Изменить пост') }}
                <x-slot name="right">
                    <a href="{{  URL::previous() }}">
                        {{ __('назад') }}
                    </a>
                </x-slot>
            </x-title>

            <x-form action="{{ route('posts.update', $post->title) }}" method='POST'>
                @method('PUT')
                <x-form-item>
                    <x-label for="">
                        {{ __('Название поста') }}
                    </x-label>
                    <x-input name="title" autofocus value='{{$post->title}}'/>
                </x-form-item>
                <x-form-item>
                    <x-label for="">
                        {{ __('Содержание поста') }}
                    </x-label>
                    <input id="x" type="hidden" name="content" value="{{ $post->content}}">
                    <trix-editor input="x"></trix-editor>
                </x-form-item>
                <x-button>
                    {{ __('Изменить') }}
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
