@props(['options' => []])
<select {{ $attributes->class(['form-control']) }}>
    @foreach ($options as $name => $value)
        <option value="{{ $value }}" {{ $value == request('category_id') ? 'selected' : ''}}>
            {{ $name }}
        </option>
    @endforeach
</select>
