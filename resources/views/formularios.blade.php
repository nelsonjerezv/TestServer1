@extends ('master')

@section('content')
<div id="formularios">
    <dashboard-formularios
        :ordenes="ordenes"
    />
</div>
@endsection
@section('styles')
    {{-- <link rel="stylesheet" lang="scss" href="{{ asset(mix('css/listatrabajo.css')) }}" /> --}}

@endsection
@section('scripts')
    <script type="text/javascript">
        window.datos = @json($datos);
    </script>
    <script type="text/javascript" src="{{ asset(mix('js/vue/formulario.js')) }}"></script>
@endsection