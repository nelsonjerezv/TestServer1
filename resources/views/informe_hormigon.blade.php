{{-- @extends ('master')
@section('content') --}}
{{-- <div id="informeHormigon">
    hormigon
</div> --}}
{{-- @endsection --}}
{{-- @section('styles') --}}
    {{-- <link rel="stylesheet" lang="scss" href="{{ asset(mix('css/listatrabajo.css')) }}" /> --}}

{{-- @endsection
@section('scripts')
    <script type="text/javascript">
    </script>
    <script type="text/javascript" src="{{ asset(mix('js/vue/formulario.js')) }}"></script>
@endsection --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .page-break {
            page-break-after: always;
        }
        .bg-grey {
            background: #F3F3F3;
        }
        .text-right {
            text-align: right;
        }
        .w-full {
            width: 100%;
        }
        .small-width {
            width: 15%;
        }
        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
</head>
    <body class="bg-grey">
<style type="text/css">
    table {
        width: 100%;
        font-family:Arial, sans-serif;
    }
    .tg  {
        border-collapse:collapse;
        border-color:rgb(0, 184, 46);
        font-family:Arial, sans-serif;
        border-spacing:0;
        border-style:none;
        border-width: 0px;
    }
    .tg td{
        border-style:none;
        border-width: 0px;
        font-family:Arial, sans-serif;
        font-size:12px;
        overflow:hidden;
        padding:5px 5px;
        word-break:normal;
        white-space: nowrap;
    }
    .tg th{
        border-style:none;
        border-width: 0px;
        font-family:Arial, sans-serif;
        font-size:12px;
        font-weight:normal;
        overflow:hidden;
        padding:5px 5px;
        word-break:normal;}
    .tg .tg-0lax{
        text-align:left;
        vertical-align:top
    }
    .width-100{
      width: 100%;
    }
    .width-50{
      width: 50%;
    }
    .izquierda{
      text-align: left;
    }
    .centro{
      text-align: center;
    }
    .titulo{
      font-size: 16px !important;
      font-weight: bold;
      vertical-align:top
    }
    .subtitulo{
      font-size: 14px !important;
      font-weight: bold;
      vertical-align:top
    }
    .subsubtitulo{
      font-size: 12px !important;
      font-weight: bold;
      vertical-align:top
    }
    .resultado-ensayo tr{
      border: solid #707070 !important;
      border-width: 1px 0px 1px 0px !important;
    }
</style>
<script type="text/javascript">
    console.log($orden, $datos);
    window.orden = @json($orden);
    window.datos = @json($datos);
    </script>

{{-- tabla 0 --}}
<div class="tg-wrap"><table>
<tbody>
  <tr>
    <td colspan="10" class="titulo centro">INFORME DE ENSAYO OFICIAL</td>
  </tr>
  <tr>
    <td colspan="10" class="subsubtitulo centro">(Resolución MINVU Nº 13104 del 13 de noviembre de 2017)</td>
  </tr>
  <tr>
    <td colspan="10"></td>
  </tr>
  <tr>
    <td colspan="10" class="titulo centro">COMPRESION CUBICA O CILINDRICA</td>
  </tr>
  <tr>
    <td colspan="10" class="titulo centro">DE PROBETAS DE HORMIGON</td>
  </tr>
</tbody>
{{-- tabla 1 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-0lax">Obra</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $orden->{'nombre_obra'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">Solicitante</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $orden->{'nombre_cliente'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">Dirección Solicitante</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $datos->{'direccionSolicitante'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">Localización Obra</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $datos->{'localizacionObra'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">Proyecto N°</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $datos->{'numProyecto'} }}</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda">ANTECEDENTES GENERALES</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 2 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-fsgl">Ensayo realizado</td>
    <td class="tg-gvcd">:</td>
    <td class="tg-gvcd width-100" colspan="8">Compresión de probetas cúbicas o cilíndricas de hormigón endurecido</td>
  </tr>
  <tr>
    <td class="tg-fsgl">Normas Aplicadas</td>
    <td class="tg-gvcd">:</td>
    <td class="tg-gvcd width-100" colspan="8">NCh 1037 n2009; NCh 1019 Of. 09; NCh 171 E Of. 75; NCh 1172 Of. 10; NCh 1017 E Of. 75</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 3 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-0lax">Identificación del elemento muestreado</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $orden->{'elemento_hormigonado'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">Ubicación en obra</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-100" colspan="8">{{ $orden->{'ubicacion_elemento'} }}</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 4 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-0pky">Fecha de muestreo</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">
      @if ($orden->{'muestreado_por'} === 'lacem' || $orden->{'muestreado_por'} === 'LACEM' )
          {{ $orden->{'fecha_confeccion'} }}
      @else
              {{ $datos->{'fechaMuestreoManual'} }}
      @endif
    </td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Número  de  OTT</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $orden->{'num_ott'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Fecha de ensayo</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $datos->{'ensayo'}->{'fecha_ensayo_muestra_uno'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Número  de  Muestra</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $datos->{'ensayo'}->{'num_ingreso'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Lugar de realización de ensayos</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $datos->{'lugarEnsayos'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Nº Correlativo de informe obra</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $datos->{'numCorrelativoInformeObra'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Laboratorista que efectuó el muestreo</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $datos->{'ensayo'}->{'ensayado_por'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Nº Correlativo de obra</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $datos->{'numCorrelativoObra'} }}</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda">RESULTADOS</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 5 --}}
<div class="tg-wrap"><table class="tg">
  <tbody>
  <tr>
    <td class="tg-1wig subsubtitulo" colspan="10">Antecedentes de confección</td>
  </tr>
  <tr>
    <td class="tg-0lax">Tipo de hormigón</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-50" colspan="2">{{ $orden->{'tipo_hormigon_mortero'} }}</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax">Temperatura ambiente (Cº)</td>
    <td class="tg-0lax">:</td>
    <td class="tg-0lax width-50" colspan="3">{{ $orden->{'t_ambiente'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Lugar de confección o procedencia</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $orden->{'proveedor'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Temperatura del hormigón (Cº)</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $orden->{'t_hormigon_mortero'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Guía Nº</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $orden->{'num_guia_despacho'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Docilidad o cono (cm)</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $orden->{'asentamiento_cono'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Hora de confección</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $orden->{'hora_inicio_amasado'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Curado inicial</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $datos->{'curadoInicial'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">Hora de muestreo</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="2">{{ $orden->{'hora_muestreo'} }}</td>
    <td class="tg-0pky"></td>
    <td class="tg-0pky">Curado en laboratorio</td>
    <td class="tg-0pky">:</td>
    <td class="tg-0pky width-50" colspan="3">{{ $datos->{'ensayo'}->{'piscina'} }}</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 6 --}}
<div class="tg-wrap"><table class="tg resultado-ensayo">
<tbody>
  <tr>
    <td class="tg-1wig subtitulo izquierda" colspan="10">Resultados de ensayo</td>
  </tr>
  <tr>
    <td class="tg-0lax">MUESTRA N°</td>
    <td class="tg-0lax" colspan="2" rowspan="10"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" rowspan="10"></td>
    <td class="tg-amwm">1</td>
    <td class="tg-amwm">2</td>
    <td class="tg-amwm">3</td>
    <td class="tg-amwm">4</td>
  </tr>
  <tr>
    <td class="tg-0pky">EDAD</td>
    <td class="tg-0pky">(días)</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'edad_dias_muestra_uno'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'edad_dias_muestra_dos'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'edad_dias_muestra_tres'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'edad_dias_muestra_cuatro'} }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">REFRENTADO</td>
    <td class="tg-0pky"></td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'refrentado_muestra_uno'} === "1" ? "Si" : "No" }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'refrentado_muestra_dos'} === "1" ? "Si" : "No" }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'refrentado_muestra_tres'} === "1" ? "Si" : "No" }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'refrentado_muestra_cuatro'} === "1" ? "Si" : "No" }}</td>
  </tr>
  <tr>
    <td class="tg-0pky">HUMEDAD DE LA MUESTRA</td>
    <td class="tg-0pky"></td>
    <td class="tg-c3ow">---</td>
    <td class="tg-c3ow">---</td>
    <td class="tg-c3ow">---</td>
    <td class="tg-c3ow">---</td>
  </tr>
  <tr>
    <td class="tg-0pky">DENSIDAD (*)</td>
    <td class="tg-0pky">(Kg/m3)</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'densidad_muestra_uno'} === "" ? "---" : $datos->{'ensayo'}->{'densidad_muestra_uno'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'densidad_muestra_dos'} === "" ? "---" : $datos->{'ensayo'}->{'densidad_muestra_dos'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'densidad_muestra_tres'} === "" ? "---" : $datos->{'ensayo'}->{'densidad_muestra_tres'} }}</td>
    <td class="tg-c3ow">{{ $datos->{'ensayo'}->{'densidad_muestra_cuatro'} === "" ? "---" : $datos->{'ensayo'}->{'densidad_muestra_cuatro'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">SECCION DE ENSAYO</td>
    <td class="tg-0lax">(mm2)</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'area_muestra_uno'} === "" ? "---" : $datos->{'ensayo'}->{'area_muestra_uno'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'area_muestra_dos'} === "" ? "---" : $datos->{'ensayo'}->{'area_muestra_dos'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'area_muestra_tres'} === "" ? "---" : $datos->{'ensayo'}->{'area_muestra_tres'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'area_muestra_cuatro'} === "" ? "---" : $datos->{'ensayo'}->{'area_muestra_cuatro'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">CARGA MAXIMA REGISTRADA</td>
    <td class="tg-0lax">(N)</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_uno'} === "" ? "---" : $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_uno'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_dos'} === "" ? "---" : $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_dos'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_tres'} === "" ? "---" : $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_tres'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_cuatro'} === "" ? "---" : $datos->{'ensayo'}->{'carga_ensayo_mil_muestra_cuatro'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">RESISTENCIA CILINDRICA</td>
    <td class="tg-0lax">(MPa)</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'resistencia_compresion_muestra_uno'} === "" ? "---" : $datos->{'ensayo'}->{'resistencia_compresion_muestra_uno'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'resistencia_compresion_muestra_dos'} === "" ? "---" : $datos->{'ensayo'}->{'resistencia_compresion_muestra_dos'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'resistencia_compresion_muestra_tres'} === "" ? "---" : $datos->{'ensayo'}->{'resistencia_compresion_muestra_tres'} }}</td>
    <td class="tg-baqh">{{ $datos->{'ensayo'}->{'resistencia_compresion_muestra_cuatro'} === "" ? "---" : $datos->{'ensayo'}->{'resistencia_compresion_muestra_cuatro'} }}</td>
  </tr>
  <tr>
    <td class="tg-0lax">RESISTENCIA CUBICA 15x15</td>
    <td class="tg-0lax">(MPa)</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_uno'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_dos'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_tres'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_cuatro'} }} --}}</td>
  </tr>
  <tr>
    <td class="tg-0lax">RESISTENCIA CUBICA 20x20 CONVERTIDA</td>
    <td class="tg-0lax">(MPa)</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_uno'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_dos'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_tres'} }} --}}</td>
    <td class="tg-baqh">*{{-- {{ $datos->{'ensayo'}->{'muestra_cuatro'} }} --}}</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 7 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-1wig">OBSERVACIONES :</td>
    <td class="tg-cly1 width-100" colspan="9">{{ $datos->{'ensayo'}->{'observaciones'} }}</td>
    <td class="tg-cly1" colspan="10">(*) Densidad calculada según NCh 1037, pto.&nbsp;&nbsp;&nbsp;6.2.1</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 8 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-1wig" colspan="5" rowspan="3" style="width: 50%;text-align: center;">&nbsp;</td>
    <td class="tg-baqh" colspan="5" style="width: 50%;text-align: center;">CRISTIAN ALARCON BRAVO</td>
  </tr>
  <tr>
    <td class="tg-baqh" colspan="5" style="width: 50%;text-align: center;">Ingeniero Civil U.C.</td>
  </tr>
  <tr>
    <td class="tg-baqh" colspan="5" style="width: 50%;text-align: center;">Jefe Area Hormigones</td>
  </tr>
</tbody>
</table></div>
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td colspan="10" class="tg-0lax subtitulo izquierda"></td>
  </tr>
</tbody>
</table></div>
{{-- tabla 9 --}}
<div class="tg-wrap"><table class="tg">
<tbody>
  <tr>
    <td class="tg-cly1" colspan="10" style="width: 50%;text-align: center;">CASA MATRIZ: CALLE RIO ITATA Nº 9648 - PUDAHUEL - FONO: 2 258 73 300  - E-Mail: lacem@lacem.cl</td>
  </tr>
  <tr>
    <td class="tg-0lax" colspan="10" style="width: 50%;text-align: center;">Este Informe no puede ser reproducido sin autorización de la Gerencia General</td>
  </tr>
</tbody>
</table></div>


    {{-- <style>
        .seccion {
            width: 100%;
            display: flex;
        }
        .nombres,
        .valores {
            padding: 5px 5px;
        }
    </style> --}}

    {{-- <div class="container-pdf">
        <div class="seccion">
            <div class="nombres">
                <div class="nombre">Obra</div>
                <div class="nombre">Solicitante</div>
                <div class="nombre">Dirección Solicitante </div>
                <div class="nombre">Localización Obra</div>
            </div>
            <div class="valores">
                <div class="valor">: valorasdsad</div>
                <div class="valor">: valorasdsad</div>
                <div class="valor">: valorasdsad</div>
                <div class="valor">: valorasdsad</div>
            </div>
        </div>
    </div> --}}


    </body>
</html>