@props(['post'=>null])

{{-- <x-errors/> --}}

<x-form {{ $attributes }}>

    <x-form-item>
        <x-label required>{{ __("Title") }}</x-label>
        <x-input name="title" value="{{$post->title ?? ''}}" autofocus></x-input>

        <x-error name='title'/>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __("Contetn") }}</x-label>
        <x-trix name="content" value="{{$post->content ?? ''}}">content</x-trix>
        <x-error name='content'/>
    </x-form-item>

    {{ $slot }}
</x-form>


