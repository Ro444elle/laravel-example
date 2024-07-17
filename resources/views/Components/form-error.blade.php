@props(['name'])

@error($name)
 <P class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</P> 
@enderror 