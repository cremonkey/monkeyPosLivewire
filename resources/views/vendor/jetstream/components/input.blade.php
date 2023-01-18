@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 mr-4 ml-4 focus:ring-opacity-50 rounded-md shadow-sm']) !!} >

