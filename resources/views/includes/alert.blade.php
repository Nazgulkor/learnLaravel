@if ($alert = session()->pull('alert'))
    <div class="alert alert-success mb-0 rounded-0 text-center py-3" role="alert">
        {{ $alert }}
    </div>
@endif
