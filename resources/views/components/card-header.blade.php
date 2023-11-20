<div class="card-body">
    <div class="d-flex justify-content-between">
        <div>
            {{ $slot }}
        </div>
        @isset($right)
            {{ $right }}
        @endisset
    </div>
</div>
