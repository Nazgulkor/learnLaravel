@extends('layouts.base')

@section('title', $post->title)


@section('content')
    <section>
        <x-container>
            <a href="{{ route('blog') }}">{{__('Назад')}}</a>
            <x-title>{{ $post->title }}</x-title>
            <p>
                {!! $post->content !!}
            </p>
        </x-container>
    </section>
@endsection
