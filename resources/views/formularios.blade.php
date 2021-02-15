@extends ('master')
@section('content')
<div id="formularios">
    <listado-formularios/>
</div>    
@endsection
@section('styles')
    {{-- <link rel="stylesheet" lang="scss" href="{{ asset(mix('css/listatrabajo.css')) }}" /> --}}

@endsection
@section('scripts')
    {{-- <script type="text/javascript">
        window.datos = @json($datos);
    </script>  --}}
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection