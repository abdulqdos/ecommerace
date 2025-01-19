@props(['name', 'label'])

<div class="inline-flex items-center gap-x-3 mb-2">
    <span class="w-2 h-2 bg-white inline-block"></span>
    <label class="font-bold text-white cursor-text " for="{{ $name }}">{{ $label }}</label>
</div>
