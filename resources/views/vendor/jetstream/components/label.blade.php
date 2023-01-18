@props(['value'])

<label {{ $attributes->merge(['class' => ' ml-4  font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
