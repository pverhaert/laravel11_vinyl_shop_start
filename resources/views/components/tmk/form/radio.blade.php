@props(['disabled' => false])

<input type="radio" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-full shadow-sm']) !!}>
<input type="radio" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:ring-indigo-500 rounded-full shadow-sm']) !!}>

