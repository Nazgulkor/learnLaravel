@extends('layouts.base')

@section('title', $post->title)


@section('content')
    <section>
        <x-container>
            <x-title>
                <a href="{{ URL::previous() }}">{{__('Назад')}}</a>
                <x-slot name="right">
                    <x-button-link href=" {{route('posts.edit', $post->id)}}">
                        {{__('Изменить пост')}}
                    </x-button-link>
                </x-slot>
            </x-title>
            <x-title>{{ $post->title }}</x-title>
            <p>
                {!! $post->content !!}
            </p>
        </x-container>
    </section>
@endsection
