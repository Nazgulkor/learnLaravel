@extends('layouts.base')
@section('title', 'Blog')


@section('content')
    <section>
        <x-container>
            <x-title>
                {{ __('Посты') }}
            </x-title>
            <x-form action="{{ route('blog') }}" method='get'>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-input name="search" placeholder="{{ __('Поиск') }}" value="{{ $search }}" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-select name="category_id" :options="[__('Все категории') => null, __('Первая категория') => 1]"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-button>
                                {{ __('Применить') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </x-form>

            <div class="row">
                @forelse ($posts as $post)
                    <div class="col-12 col-md-4 ">
                        <x-post.card :post='$post' :loop='$loop' :route="'blog.show'" />
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
