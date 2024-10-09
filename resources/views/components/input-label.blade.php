@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-lg text-gray-600 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
