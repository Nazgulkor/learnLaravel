@extends('layouts.base')
@section('title', 'донаты')


@section('content')
    <section>
        <x-container>
            <x-title>
                {{ __('Мои донаты') }}
            </x-title>

            {{-- @include('user.donates.filter') --}}
            @include('user.donates.stats')
            {{-- @include('user.donates.table') --}}
        </x-container>
    </section>
@endsection
