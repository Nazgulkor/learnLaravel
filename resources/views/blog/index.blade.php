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
                            <x-input name="search" placeholder="{{ __('Поиск') }}" value="{{ request()->old('search') }}" />
                        </div>
                    </div>
                    {{-- <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-select name="category_id" :options="[__('Все категории') => null, __('Первая категория') => 1]"/>
                        </div>
                    </div> --}}
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-input name="from_date" placeholder="{{ __('Дата начала') }}"
                                value="{{ request()->old('from_date') }}" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-input name="to_date" placeholder="{{ __('Дата окончания') }}"
                                value="{{ request()->old('to_date') }}" />
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-3">
                            <x-input name="tag" placeholder="{{ __('Тег') }}"
                                value="{{ request()->old('tag') }}" />
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
                @if (!empty($posts))
                    {{ $posts->links() }}
                @endif
            </div>
        </x-container>
    </section>
@endsection
