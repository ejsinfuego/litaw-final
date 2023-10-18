@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full md:w-96 py-2.5 px-2 text-sm text-gray-900 bg-gray-50 md:rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:border-l-gray-300 dark:border-gray-300 dark:placeholder-gray-500 dark:focus:border-blue-500', 'placeholder' => $placeholder ?? 'Insert Here']) !!}>
