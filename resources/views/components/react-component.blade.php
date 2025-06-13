<!-- resources/views/components/react-component.blade.php -->
@props(['component', 'props' => [], 'elementId' => 'react-root'])

<div id="{{ $elementId }}"></div>

@push('react-components')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof window.mountReactComponent === 'function') {
            window.mountReactComponent('{{ $component }}', @json($props), '{{ $elementId }}');
        }
    });
</script>
@endpush