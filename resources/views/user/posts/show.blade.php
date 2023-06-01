@extends('layouts.main')

@section('page.title' , 'My posts')

@section('main.content')
            <x-title>
                {{__('Post')}}

                <x-slot name="link">
                    <a href="{{route('user.posts')}}">
                        {{__('back')}}
                    </a>
                </x-slot>

                <x-slot name="right">
                    <x-button-link href="{{route('user.posts.edit', $post->id)}}" class="size-sm">
                        {{__('Edit')}}
                    </x-button-link>
                </x-slot>  
            </x-title>

            <a href="{{route('user.posts')}}">{{__('Back to posts')}}</a>
            <div class="mb-3">
                <h2 class="h6">
                    <a href="{{route('user.posts.show', $post->id)}}">
                        {{$post->title}}
                    </a>
                </h2>
                <div class="small text-muted">
                    {{ now()->format('d.m.Y H:i:s') }}
                </div>
                <p class="pt-3">{{$post->content}}</p>
            </div>

        
@endsection
        