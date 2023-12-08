
<x-card>
    <h5>
        <a href="{{ route($route, $post->id) }}">
            {{ $post->title }} {{ $loop->iteration }}
        </a>
    </h5>
    <div class="small text-muted">
        {{ $post->published_at?->diffForHumans() }}
    </div>
    {{$post->id}}
</x-card>
