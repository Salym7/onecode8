<x-card>  
    <x-card-body>
        <h5 class="">
            <a href="{{route('blog.show', $post->id)}}"> 
                {{$post->title}}
            </a>
        </h5>
        <div class="small text-muted">
            {{ now()->format('d.m.Y H:i:s') }}
        </div>
    </x-card-body>
</x-card>
