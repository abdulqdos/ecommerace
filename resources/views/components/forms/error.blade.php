@props(['name'])
@error($name)
    <p class="text-red-500 font-semibold italic mt-2"> {{ $message }}</p>
@enderror
