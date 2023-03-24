@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);

@endphp
<ul class="flex">
    @foreach ($tags as $value)
        @php
            $newValue= trim($value);
        @endphp
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?tag={{$newValue}}">{{ $value }}</a>
        </li>
    @endforeach
</ul>
