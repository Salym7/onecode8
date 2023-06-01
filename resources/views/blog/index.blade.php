@extends('layouts.main')

@section('page.title' , 'blog page')

@section('main.content')

        {{-- <x-login.card/> --}}

            <x-title>
                {{__('Просмотр поста')}}
            </x-title>
            <div class="row">
            @if (empty($posts))
                <p>{{__("no one post")}}</p> 
            @else
                @foreach ($posts as $post)
                
                <div class="col-12 col-md-4">
                <x-post.card :post="$post"/>
                </div>
               
                @endforeach  
            @endif
                {{-- <div class="row">
                    <div class="col-12">

                    </div>
                </div> --}}
            </div>

        
@endsection
        