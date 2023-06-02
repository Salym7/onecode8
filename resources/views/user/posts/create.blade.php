@extends('layouts.main')

@section('page.title' , 'My posts')

@section('main.content')

            <x-title>
                {{__('Create post')}}

                <x-slot name="right">
                    <x-button-link href="{{route('user.posts')}}">
                    {{__("back")}}
                    </x-button-link>
                </x-slot>
            </x-title>
            
            <x-post.form action="{{ route('user.posts.store') }}">
                    <x-button type="submit">
                        {{ __("Create") }}
                    </x-button>
            </x-post.form>

@endsection

