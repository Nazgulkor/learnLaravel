@extends('layouts.base')
@section('title', 'Мои посты')


@section('content')
    <section>
        <x-container>
            <x-title>
                {{ __('Мои посты') }}
                <x-slot name="right">
                    <x-button-link href="{{route('posts.create')}}">
                       {{__('Создать пост')}}
                    </x-button-link>
                </x-slot>
            </x-title>

            <div class="row">
                @forelse ($posts as $post)
                <div class="col-12 col-md-4 ">
                    <x-post.card :post='$post' :loop='$loop' :route="'posts.show'"/>
                </div>
                @empty
                <div>
                    Нет постов
                </div>
                @endforelse
            </div>
        </x-container>
    </section>
@endsection
