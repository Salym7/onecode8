@extends('layouts.main')

@section('page.title' , 'My donates')

@section('main.content')


            <x-title>
                {{__('My donates')}}
            </x-title>
          
            {{-- @include('user.donates.filter'); --}}
            @include('user.donates.stats')
            {{-- @include('user.donates.table'); --}}
        
@endsection
        