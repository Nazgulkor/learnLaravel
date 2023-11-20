<x-errors />


<form {{ $attributes }}>
    @if (strtolower($attributes['method']) != 'get')
        @csrf
    @endif
    {{ $slot }}
</form>
