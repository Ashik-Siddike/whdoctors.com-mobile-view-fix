@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 float-left  focus:shadow-md focus:outline-none']) }}>
    {{ $value ?? $slot }}
</label>

