@props(['post'=>null])

<x-form {{ $attributes }}>
    {{-- @csrf --}}
    <x-form-item>
        <x-label required>{{ __("Title") }}</x-label>
        <x-input name="title" value="{{$post->title ?? ''}}" autofocus></x-input>
    </x-form-item>

    <x-form-item>
        <x-label required>{{ __("Contetn") }}</x-label>
        <x-trix name="content" value="{{$post->content ?? ''}}">content</x-trix>
    </x-form-item>

    {{ $slot }}
</x-form>


