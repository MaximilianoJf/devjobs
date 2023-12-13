@php
    $classes = "text-xs text-gray-500
     hover:text-gray-900"
@endphp

{{-- merge une los atributos, los que pase por componente y los que se encuentran en cabecera --}}
<div>
    <a {{$attributes->merge(['class' => $classes])}}>
        {{ $slot }}
    </a>
</div>
{{-- o tambien puede ser asi: (si llamamos enlace en el componente cuando 
    pasas el parametro, se debe especificar qu ese llamara href) --}}
{{-- <div>
    <a {{$attributes->merge(['class' => $classes, 'href' => $enlace])}}>
    {{ $slot }}
    </a>
</div> --}}