@extends ('masterSimple')
@section('content')
<div id="ver-ensayo">
    <ensayo-compresion-probetas-cilindricas
        :tipo-ensayo="accion"
        :ensayo-cargado="ensayo"
    />
</div>
@endsection
@section('styles')
    {{-- <link rel="stylesheet" lang="scss" href="{{ asset(mix('css/listatrabajo.css')) }}" /> --}}

@endsection
@section('scripts')
    <script type="text/javascript">
        window.accion = @json($accion);
        window.ensayo = @json($ensayo);
    </script>
    <script type="text/javascript" src="{{ asset(mix('js/vue/verEnsayo.js')) }}"></script>
@endsection