
<x-card>
    <h5>
        <a href="{{ route($route, $post->id) }}">
            {{ $post->title }} {{ $loop->iteration }}
        </a>
    </h5>
    <div class="small text-muted">
        {{ now()->format('d.m.Y H:i:s') }}
    </div>

</x-card>
