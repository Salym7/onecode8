<x-card>  
    <x-card-body>
        <h5 class="">
            <a href="{{route('blog.show', $post->id)}}"> 
                {{$post->title}}
            </a>
        </h5>
        <div class="small text-muted">
            {{ $post->published_at->diffForHumans() }}
        </div>
        {{$post->id}}
    </x-card-body>
</x-card>
