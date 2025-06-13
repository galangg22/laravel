@extends('layouts.app')

@section('content')
    <!-- Komponen React Home -->
    <div id="home-page"></div>
@endsection

@push('scripts')
    <script>
        // Pastikan window.reactComponents sudah ada sebelum push
        if (typeof window.reactComponents === 'undefined') {
            window.reactComponents = [];
        }

        window.reactComponents.push({
            component: 'Home',
            props: {},
            elementId: 'home-page'
        });

        console.log('React component configuration added:', window.reactComponents);
    </script>
@endpush