@extends ('master')
@section('content')
<div id="ver-ott">
    <orden-trabajo-terreno
        :ott-cargada="orden"
        :tipo-ott="ver"
    />
</div>
@endsection
@section('styles')
    {{-- <link rel="stylesheet" lang="scss" href="{{ asset(mix('css/listatrabajo.css')) }}" /> --}}

@endsection
@section('scripts')
    <script type="text/javascript">
        window.orden = @json($orden);
    </script>
    <script type="text/javascript" src="{{ asset(mix('js/vue/verFormulario.js')) }}"></script>
@endsection