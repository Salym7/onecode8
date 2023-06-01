@extends('layouts.main')

@section('page.title' , 'blog page')

@section('main.content')

        {{-- <x-login.card/> --}}

            <x-title>
                {{ $post->title}}

                <x-slot name="link">
                    <a href="{{route('blog')}}">
                    {{__('Back')}}</a>
                </x-slot>
            </x-title>

            {!! $post->content !!}
        
@endsection
        