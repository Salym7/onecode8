@extends('layouts.base')

@section('page.title' , 'Enter page')

@section('content')
<section>
    <x-container>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 text-start">
                @yield('auth.content')
            </div>
        </div>
    </x-container>
</section>
@endsection
        