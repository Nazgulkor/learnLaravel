<h1>
    <div class="d-flex justify-content-between">
        {{ $slot }}
        @isset($right)    
        <div>
            {{$right}}
        </div>
        @endisset
    </div>
</h1>