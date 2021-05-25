<template>
  <div class="contenedor-vue">
    <el-form
      ref="formularioCompresion"
      :model="form"
      :rules="reglas"
      label-width="150px"
      :class="esClickeable"
    >
       
    <!-- Cabecera / EPC -->
    <table>
    <tr>
      <td rowspan="2" style="width:250px;" align="left" valign="top">
        <img src="/images/logo-lacem.png" style="width: 100px;">
      </td>
      <td colspan="3" align="center" style="width:500px;">
         <b>Hormigón: Ensayo de Compresión de Probetas Cilíndricas</b>
      </td>
      <td align="right" style="width:250px;">
        Página<br>
            1 de 1
      </td>
    </tr>
    <tr>
      <td align="left">
        Revisión&nbsp;&nbsp;&nbsp;012
      </td>
      <td>
        Código&nbsp;&nbsp;&nbsp;FE-H-006
      </td>
      <td colspan="2" align="right">
        Fecha aprobación:&nbsp;&nbsp;&nbsp;08-09-2016
      </td>
    </tr>  
    </table>
      
    <el-divider class="el-divider-5" />



      <el-row>
        <el-col :span="8">
          <el-form-item label="N° Muestra" prop="numMuestra">
            <el-input class="no-click" v-model="form.numIngreso"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="N° OTT" prop="OTT">
            <el-select
              v-model="form.OTT"
              filterable
              clearable
              remote
              reserve-keyword
              no-data-text="Sin resultados"
              placeholder="Seleccione OTT"
              :remote-method="querySearchNumeroOtt"
              :loading="loading"
            >
              <el-option
                v-for="item in opcionesSearchBoxOTT"
                :key="item.id"
                :label="item.value"
                :value="item.value"
              >
              </el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="N° Informe" prop="numInforme">
            <el-input v-model="form.numInforme"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider />
      <el-row>
        <el-col :span="24"> M&eacute;todo de curado </el-col>
        <el-col :span="8">
          <el-form-item label="Cámara Húmeda" prop="camaraHumeda">
            <el-input v-model="form.camaraHumeda"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Piscina N°" prop="piscina">
            <el-input v-model="form.piscina"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Balanza N°" prop="balanza">
            <el-input v-model="form.balanza"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Pie de Metro N°" prop="numPieDeMetro">
            <el-input v-model="form.numPieDeMetro"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Prensa N°" prop="numPrensa">
            <el-input v-model="form.numPrensa"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Cronómetro N°" prop="numCronometro">
            <el-input v-model="form.numCronometro"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Error: 150mm (mm)" prop="errorCientoCincuentaMm">
            <el-input v-model="form.errorCientoCincuentaMm"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Error: 300mm (mm)" prop="errorTrescientosMm">
            <el-input v-model="form.errorTrescientosMm"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Marmita N°" prop="numMarmita">
            <el-input v-model="form.numMarmita"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item
            label="Dispositivo de refrentado N°"
            prop="numDispositivoRefrentado"
          >
            <el-input v-model="form.numDispositivoRefrentado"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Micrómetro N°" prop="numMicrometro">
            <el-input v-model="form.numMicrometro"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider />
      <el-row class="muestras">
        <!-- titulo -->
        <el-col :span="24">
          <div class="texto">Probeta N°</div>
          <div class="texto-muestras">1</div>
          <div class="texto-muestras">2</div>
          <div class="texto-muestras">3</div>
          <div class="texto-muestras">4</div>
        </el-col>
        <!-- Nº de molde -->
        <el-col :span="24">
          <div class="texto">Nº de molde</div>
          <div class="texto-muestras">
            <el-form-item prop="numMoldeMuestraUno">
              <el-input v-model="form.numMoldeMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="numMoldeMuestraDos">
              <el-input v-model="form.numMoldeMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="numMoldeMuestraTres">
              <el-input v-model="form.numMoldeMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="numMoldeMuestraCuatro">
              <el-input v-model="form.numMoldeMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Fecha de Confección -->
        <el-col :span="24">
          <div class="texto">Fecha de Confección</div>
          <div class="texto-muestras">
            <el-form-item prop="fechaConfeccionMuestraUno">
              <el-input
                class="no-click"
                v-model="form.fechaConfeccionMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="fechaConfeccionMuestraDos">
              <el-input
                class="no-click"
                v-model="form.fechaConfeccionMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="fechaConfeccionMuestraTres">
              <el-input
                class="no-click"
                v-model="form.fechaConfeccionMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="fechaConfeccionMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.fechaConfeccionMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Fecha de Ensayo -->
        <el-col :span="24">
          <div class="texto">Fecha de Ensayo</div>
          <div class="texto-muestras">
            <el-form-item
              prop="fechaEnsayoMuestraUno"
              style="max-width: -webkit-fill-available"
            >
              <el-date-picker
                v-model="form.fechaEnsayoMuestraUno"
                type="date"
                size="mini"
                format="dd-MM-yyyy"
                value-format="dd-MM-yyyy"
              >
              </el-date-picker>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item
              prop="fechaEnsayoMuestraDos"
              style="max-width: -webkit-fill-available"
            >
              <el-date-picker
                v-model="form.fechaEnsayoMuestraDos"
                type="date"
                size="mini"
                format="dd-MM-yyyy"
                value-format="dd-MM-yyyy"
              >
              </el-date-picker>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item
              prop="fechaEnsayoMuestraTres"
              style="max-width: -webkit-fill-available"
            >
              <el-date-picker
                v-model="form.fechaEnsayoMuestraTres"
                type="date"
                size="mini"
                format="dd-MM-yyyy"
                value-format="dd-MM-yyyy"
              >
              </el-date-picker>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item
              prop="fechaEnsayoMuestraCuatro"
              style="max-width: -webkit-fill-available"
            >
              <el-date-picker
                v-model="form.fechaEnsayoMuestraCuatro"
                type="date"
                size="mini"
                format="dd-MM-yyyy"
                value-format="dd-MM-yyyy"
              >
              </el-date-picker>
            </el-form-item>
          </div>
        </el-col>
        <!-- Edad - Días -->
        <el-col :span="24">
          <div class="texto">Edad - Días</div>
          <div class="texto-muestras">
            <el-form-item prop="edadDiasMuestraUno">
              <el-input
                class="no-click"
                placeholder="Calculado automáticamente"
                v-model="form.edadDiasMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="edadDiasMuestraDos">
              <el-input
                class="no-click"
                placeholder="Calculado automáticamente"
                v-model="form.edadDiasMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="edadDiasMuestraTres">
              <el-input
                class="no-click"
                placeholder="Calculado automáticamente"
                v-model="form.edadDiasMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="edadDiasMuestraCuatro">
              <el-input
                class="no-click"
                placeholder="Calculado automáticamente"
                v-model="form.edadDiasMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Refrentado -->
        <el-col :span="24">
          <div class="texto">
            Refrentado
            <div class="texto-derecha">(SI/NO)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoMuestraUno">
              <el-checkbox v-model="form.refrentadoMuestraUno"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoMuestraDos">
              <el-checkbox v-model="form.refrentadoMuestraDos"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoMuestraTres">
              <el-checkbox v-model="form.refrentadoMuestraTres"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoMuestraCuatro">
              <el-checkbox v-model="form.refrentadoMuestraCuatro"></el-checkbox>
            </el-form-item>
          </div>
        </el-col>
        <!-- perpendicularidad -->
        <el-col :span="24">
          <div class="texto">
            perpendicularidad
            <div class="texto-derecha">(SI/NO)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="perpendicularidadMuestraUno">
              <el-checkbox
                v-model="form.perpendicularidadMuestraUno"
              ></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="perpendicularidadMuestraDos">
              <el-checkbox
                v-model="form.perpendicularidadMuestraDos"
              ></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="perpendicularidadMuestraTres">
              <el-checkbox
                v-model="form.perpendicularidadMuestraTres"
              ></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="perpendicularidadMuestraCuatro">
              <el-checkbox
                v-model="form.perpendicularidadMuestraCuatro"
              ></el-checkbox>
            </el-form-item>
          </div>
        </el-col>
        <!-- planeidad -->
        <el-col :span="24">
          <div class="texto">
            planeidad
            <div class="texto-derecha">(SI/NO)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="planeidadMuestraUno">
              <el-checkbox v-model="form.planeidadMuestraUno"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="planeidadMuestraDos">
              <el-checkbox v-model="form.planeidadMuestraDos"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="planeidadMuestraTres">
              <el-checkbox v-model="form.planeidadMuestraTres"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="planeidadMuestraCuatro">
              <el-checkbox v-model="form.planeidadMuestraCuatro"></el-checkbox>
            </el-form-item>
          </div>
        </el-col>
        <!-- Espesor Superior -->
        <el-col :span="24">
          <div class="texto">
            Espesor Superior
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorSuperiorMuestraUno">
              <el-input v-model="form.espesorSuperiorMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorSuperiorMuestraDos">
              <el-input v-model="form.espesorSuperiorMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorSuperiorMuestraTres">
              <el-input v-model="form.espesorSuperiorMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorSuperiorMuestraCuatro">
              <el-input v-model="form.espesorSuperiorMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Espesor Inferior -->
        <el-col :span="24">
          <div class="texto">
            Espesor Inferior
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorInferiorMuestraUno">
              <el-input v-model="form.espesorInferiorMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorInferiorMuestraDos">
              <el-input v-model="form.espesorInferiorMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorInferiorMuestraTres">
              <el-input v-model="form.espesorInferiorMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorInferiorMuestraCuatro">
              <el-input v-model="form.espesorInferiorMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Espesor Promedio -->
        <el-col :span="24">
          <div class="texto">
            Espesor Promedio
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorPromedioMuestraUno">
              <el-input v-model="form.espesorPromedioMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorPromedioMuestraDos">
              <el-input v-model="form.espesorPromedioMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorPromedioMuestraTres">
              <el-input v-model="form.espesorPromedioMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="espesorPromedioMuestraCuatro">
              <el-input v-model="form.espesorPromedioMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Dimensiones -->
        <el-col :span="24">
          <div class="texto-ancho-full">Dimensiones</div>
        </el-col>
        <!-- d 1 -->
        <el-col :span="24">
          <div class="texto">
            d 1
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraUno">
              <el-input v-model="form.dUnoMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraDos">
              <el-input v-model="form.dUnoMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraTres">
              <el-input v-model="form.dUnoMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraCuatro">
              <el-input v-model="form.dUnoMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- d 2 -->
        <el-col :span="24">
          <div class="texto">
            d 2
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraUno">
              <el-input v-model="form.dDosMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraDos">
              <el-input v-model="form.dDosMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraTres">
              <el-input v-model="form.dDosMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraCuatro">
              <el-input v-model="form.dDosMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h 1-->
        <el-col :span="24">
          <div class="texto">
            h 1
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraUno">
              <el-input v-model="form.hUnoMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraDos">
              <el-input v-model="form.hUnoMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraTres">
              <el-input v-model="form.hUnoMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraCuatro">
              <el-input v-model="form.hUnoMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h 2 -->
        <el-col :span="24">
          <div class="texto">
            h 2
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraUno">
              <el-input v-model="form.hDosMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraDos">
              <el-input v-model="form.hDosMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraTres">
              <el-input v-model="form.hDosMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraCuatro">
              <el-input v-model="form.hDosMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h refrentado -->
        <el-col :span="24">
          <div class="texto">
            h refrentado
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoUno">
              <el-input v-model="form.refrentadoUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoDos">
              <el-input v-model="form.refrentadoDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoTres">
              <el-input v-model="form.refrentadoTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoCuatro">
              <el-input v-model="form.refrentadoCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Dimensiones Corregidas -->
        <el-col :span="24">
          <div class="texto-ancho-full">Dimensiones Corregidas</div>
        </el-col>
        <!-- d 1 -->
        <el-col :span="24">
          <div class="texto">
            d 1'
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraUnoCorregida">
              <el-input
                class="no-click"
                v-model="form.dUnoMuestraUnoCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraDosCorregida">
              <el-input
                class="no-click"
                v-model="form.dUnoMuestraDosCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraTresCorregida">
              <el-input
                class="no-click"
                v-model="form.dUnoMuestraTresCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dUnoMuestraCuatroCorregida">
              <el-input
                class="no-click"
                v-model="form.dUnoMuestraCuatroCorregida"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- d 2 -->
        <el-col :span="24">
          <div class="texto">
            d 2'
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraUnoCorregida">
              <el-input
                class="no-click"
                v-model="form.dDosMuestraUnoCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraDosCorregida">
              <el-input
                class="no-click"
                v-model="form.dDosMuestraDosCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraTresCorregida">
              <el-input
                class="no-click"
                v-model="form.dDosMuestraTresCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="dDosMuestraCuatroCorregida">
              <el-input
                class="no-click"
                v-model="form.dDosMuestraCuatroCorregida"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h 1-->
        <el-col :span="24">
          <div class="texto">
            h 1'
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraUnoCorregida">
              <el-input
                class="no-click"
                v-model="form.hUnoMuestraUnoCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraDosCorregida">
              <el-input
                class="no-click"
                v-model="form.hUnoMuestraDosCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraTresCorregida">
              <el-input
                class="no-click"
                v-model="form.hUnoMuestraTresCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hUnoMuestraCuatroCorregida">
              <el-input
                class="no-click"
                v-model="form.hUnoMuestraCuatroCorregida"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h 2 -->
        <el-col :span="24">
          <div class="texto">
            h 2'
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraUnoCorregida">
              <el-input
                class="no-click"
                v-model="form.hDosMuestraUnoCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraDosCorregida">
              <el-input
                class="no-click"
                v-model="form.hDosMuestraDosCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraTresCorregida">
              <el-input
                class="no-click"
                v-model="form.hDosMuestraTresCorregida"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="hDosMuestraCuatroCorregida">
              <el-input
                class="no-click"
                v-model="form.hDosMuestraCuatroCorregida"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- h refrentado -->
        <el-col :span="24">
          <div class="texto">
            h refrentado'
            <div class="texto-derecha">mm</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoCorregidoMuestraUno">
              <el-input
                class="no-click"
                v-model="form.refrentadoCorregidoMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoCorregidoMuestraDos">
              <el-input
                class="no-click"
                v-model="form.refrentadoCorregidoMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoCorregidoMuestraTres">
              <el-input
                class="no-click"
                v-model="form.refrentadoCorregidoMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="refrentadoCorregidoMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.refrentadoCorregidoMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Masa -->
        <el-col :span="24">
          <div class="texto">
            Masa
            <div class="texto-derecha">(Kg)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaMuestraUno">
              <el-input v-model="form.masaMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaMuestraDos">
              <el-input v-model="form.masaMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaMuestraTres">
              <el-input v-model="form.masaMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaMuestraCuatro">
              <el-input v-model="form.masaMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Error -->
        <el-col :span="24">
          <div class="texto">
            Error
            <div class="texto-derecha">(Kg)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="errorMuestraUno">
              <el-input v-model="form.errorMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="errorMuestraDos">
              <el-input v-model="form.errorMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="errorMuestraTres">
              <el-input v-model="form.errorMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="errorMuestraCuatro">
              <el-input v-model="form.errorMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Masa Corregida -->
        <el-col :span="24">
          <div class="texto">
            Masa Corregida
            <div class="texto-derecha">(Kg)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaCorregidaMuestraUno">
              <el-input
                class="no-click"
                v-model="form.masaCorregidaMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaCorregidaMuestraDos">
              <el-input
                class="no-click"
                v-model="form.masaCorregidaMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaCorregidaMuestraTres">
              <el-input
                class="no-click"
                v-model="form.masaCorregidaMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="masaCorregidaMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.masaCorregidaMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Volumen -->
        <el-col :span="24">
          <div class="texto">
            Volumen
            <div class="texto-derecha">(mm<sup>3</sup>)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMuestraUno">
              <el-input v-model="form.volumenMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMuestraDos">
              <el-input v-model="form.volumenMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMuestraTres">
              <el-input v-model="form.volumenMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMuestraCuatro">
              <el-input v-model="form.volumenMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Volumen metro cubico-->
        <el-col :span="24">
          <div class="texto">
            Volumen ( &divide;
            <p style="margin: 0px !important">10<sup>9</sup></p>
            )
            <div class="texto-derecha">(m<sup>3</sup>)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMetroCubicoMuestraUno">
              <el-input
                class="no-click"
                v-model="form.volumenMetroCubicoMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMetroCubicoMuestraDos">
              <el-input
                class="no-click"
                v-model="form.volumenMetroCubicoMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMetroCubicoMuestraTres">
              <el-input
                class="no-click"
                v-model="form.volumenMetroCubicoMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="volumenMetroCubicoMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.volumenMetroCubicoMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Densidad -->
        <el-col :span="24">
          <div class="texto">
            Densidad (masa / vol)
            <div class="texto-derecha">(kg/m<sup>3</sup>)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="densidadMuestraUno">
              <el-input
                class="no-click"
                v-model="form.densidadMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="densidadMuestraDos">
              <el-input
                class="no-click"
                v-model="form.densidadMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="densidadMuestraTres">
              <el-input
                class="no-click"
                v-model="form.densidadMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="densidadMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.densidadMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Area -->
        <el-col :span="24">
          <div class="texto">
            Área = 0,196 ( d1'+d2' )
            <p style="margin: 0px !important"><sup>2</sup></p>
            <div class="texto-derecha">(mm<sup>2</sup>)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="areaMuestraUno">
              <el-input
                class="no-click"
                v-model="form.areaMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="areaMuestraDos">
              <el-input
                class="no-click"
                v-model="form.areaMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="areaMuestraTres">
              <el-input
                class="no-click"
                v-model="form.areaMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="areaMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.areaMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- P (Carga de ensayo) -->
        <el-col :span="24">
          <div class="texto">
            P (Carga de ensayo)
            <div class="texto-derecha">(KN)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMuestraUno">
              <el-input v-model="form.cargaEnsayoMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMuestraDos">
              <el-input v-model="form.cargaEnsayoMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMuestraTres">
              <el-input v-model="form.cargaEnsayoMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMuestraCuatro">
              <el-input v-model="form.cargaEnsayoMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- X 1000 -->
        <el-col :span="24">
          <div class="texto">
            X 1000
            <div class="texto-derecha">(N)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMilMuestraUno">
              <el-input
                class="no-click"
                v-model="form.cargaEnsayoMilMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMilMuestraDos">
              <el-input
                class="no-click"
                v-model="form.cargaEnsayoMilMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMilMuestraTres">
              <el-input
                class="no-click"
                v-model="form.cargaEnsayoMilMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cargaEnsayoMilMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.cargaEnsayoMilMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Tiempo de Carga -->
        <el-col :span="24">
          <div class="texto">
            Tiempo de Carga
            <div class="texto-derecha">(seg)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tiempoCargaMuestraUno">
              <el-input v-model="form.tiempoCargaMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tiempoCargaMuestraDos">
              <el-input v-model="form.tiempoCargaMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tiempoCargaMuestraTres">
              <el-input v-model="form.tiempoCargaMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tiempoCargaMuestraCuatro">
              <el-input v-model="form.tiempoCargaMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Resistencia compresión (P/S) -->
        <el-col :span="24">
          <div class="texto">
            Resistencia compresión (P/S)
            <div class="texto-derecha">(MPa/S)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="errorresistenciaCompresionraUno">
              <el-input
                class="no-click"
                v-model="form.resistenciaCompresionMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCompresionMuestraDos">
              <el-input
                class="no-click"
                v-model="form.resistenciaCompresionMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCompresionMuestraTres">
              <el-input
                class="no-click"
                v-model="form.resistenciaCompresionMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCompresionMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.resistenciaCompresionMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Factores Conversion -->
        <el-col :span="24">
          <div class="texto">
            Factores de conversión cil. 15x30 a cubo 20x20
            <br />
            Fcil a 20 MPa * 1,25 | Fcil 20 Mpa ver nota (*)
          </div>
          <div class="texto-muestras">
            <el-form-item prop="factoresConversionMuestraUno">
              <el-input
                class="no-click"
                v-model="form.factoresConversionMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="factoresConversionMuestraDos">
              <el-input
                class="no-click"
                v-model="form.factoresConversionMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="factoresConversionMuestraTres">
              <el-input
                class="no-click"
                v-model="form.factoresConversionMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="factoresConversionMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.factoresConversionMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Resistencia Corregida -->
        <el-col :span="24">
          <div class="texto">
            Resistencia Corregida
            <div class="texto-derecha">(MPa)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCorregidaMuestraUno">
              <el-input
                class="no-click"
                v-model="form.resistenciaCorregidaMuestraUno"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCorregidaMuestraDos">
              <el-input
                class="no-click"
                v-model="form.resistenciaCorregidaMuestraDos"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCorregidaMuestraTres">
              <el-input
                class="no-click"
                v-model="form.resistenciaCorregidaMuestraTres"
              ></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="resistenciaCorregidaMuestraCuatro">
              <el-input
                class="no-click"
                v-model="form.resistenciaCorregidaMuestraCuatro"
              ></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Velocidad de ensayo -->
        <el-col :span="24">
          <div class="texto">
            Velocidad de ensayo
            <div class="texto-derecha">(MPa/s)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadEnsayoMuestraUno">
              <el-input v-model="form.velocidadEnsayoMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadEnsayoMuestraDos">
              <el-input v-model="form.velocidadEnsayoMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadEnsayoMuestraTres">
              <el-input v-model="form.velocidadEnsayoMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadEnsayoMuestraCuatro">
              <el-input v-model="form.velocidadEnsayoMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Tipo rotura -->
        <el-col :span="24">
          <div class="texto">
            Tipo rotura
            <div class="texto-derecha">Anexo s Nch 1037</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tipoRoturaMuestraUno">
              <el-input v-model="form.tipoRoturaMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tipoRoturaMuestraDos">
              <el-input v-model="form.tipoRoturaMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tipoRoturaMuestraTres">
              <el-input v-model="form.tipoRoturaMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="tipoRoturaMuestraCuatro">
              <el-input v-model="form.tipoRoturaMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Aseguramiento (por Rango) -->
        <el-col :span="24">
          <div class="texto">
            Aseguramiento (por Rango)
            <div class="texto-derecha">(MPa)</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="aseguramientoMuestraUno">
              <el-input v-model="form.aseguramientoMuestraUno"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="aseguramientoMuestraDos">
              <el-input v-model="form.aseguramientoMuestraDos"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="aseguramientoMuestraTres">
              <el-input v-model="form.aseguramientoMuestraTres"></el-input>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="aseguramientoMuestraCuatro">
              <el-input v-model="form.aseguramientoMuestraCuatro"></el-input>
            </el-form-item>
          </div>
        </el-col>
        <!-- Cumple -->
        <el-col :span="24">
          <div class="texto">
            Cumple
            <div class="texto-derecha">SI / NO</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cumpleMuestraUno">
              <el-checkbox v-model="form.cumpleMuestraUno"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cumpleMuestraDos">
              <el-checkbox v-model="form.cumpleMuestraDos"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cumpleMuestraTres">
              <el-checkbox v-model="form.cumpleMuestraTres"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="cumpleMuestraCuatro">
              <el-checkbox v-model="form.cumpleMuestraCuatro"></el-checkbox>
            </el-form-item>
          </div>
        </el-col>
        <!-- Velocidad -->
        <el-col :span="24">
          <div class="texto">
            Velocidad &nbsp; &nbsp; 0,20 a 0,30 Mpa/s
            <div class="texto-derecha">SI / NO</div>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadMuestraUno">
              <el-checkbox v-model="form.velocidadMuestraUno"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadMuestraDos">
              <el-checkbox v-model="form.velocidadMuestraDos"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadMuestraTres">
              <el-checkbox v-model="form.velocidadMuestraTres"></el-checkbox>
            </el-form-item>
          </div>
          <div class="texto-muestras">
            <el-form-item prop="velocidadMuestraCuatro">
              <el-checkbox v-model="form.velocidadMuestraCuatro"></el-checkbox>
            </el-form-item>
          </div>
        </el-col>
      </el-row>
      <el-divider />
      <el-row>
        <el-col :span="24">
          <div class="texto-ancho-full">Observaciones</div>
        </el-col>
        <el-col :span="24">
          <el-form-item prop="observaciones">
            <el-input type="textarea" autosize v-model="form.observaciones">
            </el-input>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <!--el-form-item label="Ensayado por" prop="ensayadoPor">
            <el-input v-model="form.ensayadoPor"></el-input>
          </el-form-item-->

          Ensayado por
          <el-select
            v-model="form.ensayadoPor"
            placeholder="Seleccione.."
            prop="ensayadoPor"
          >
            <el-option
              v-for="item in options"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
          </el-select>
        </el-col>
        <el-col :span="8">
          <el-form-item label="Fecha" prop="fecha">
            <el-date-picker
              v-model="form.fecha"
              type="date"
              size="mini"
              format="dd-MM-yyyy"
              value-format="dd-MM-yyyy"
            >
            </el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="8">
          <el-form-item label="V°B°" prop="vb">
            <el-input v-model="form.vb"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider />
      <el-form-item
        class="container-botones"
        prop=""
        v-if="visualizacion != 'ver'"
      >
        <el-button
          type="primary"
          @click="onSubmit('formularioCompresion', 'crear')"
          v-if="visualizacion != 'editar'"
          plain
          >Crear Ensayo</el-button
        >
        <el-button
          type="primary"
          @click.prevent="onSubmit('formularioCompresion', 'editar')"
          v-if="visualizacion == 'editar'"
          plain
        >
          Actualizar Ensayo
        </el-button>
        <el-popconfirm
          confirm-button-text="Vaciar campos"
          cancel-button-text="volver"
          @confirm="resetForm('formularioCompresion')"
          placement="right"
          icon="el-icon-info"
          icon-color="red"
          :hide-icon="true"
          title="Está seguro quiere vaciar todos los campos?"
        >
          <el-button slot="reference" plain>Vaciar campos</el-button>
        </el-popconfirm>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import Tools from "../../../tools.js";
import moment from "moment";
Vue.prototype.moment = moment;
export default {
  props: ["tipoEnsayo", "ensayoCargado"],
  data() {
    return {
      urlGuardarEnsayo: `${GLOBAL.URL}ensayos/guardar-ensayo-compresion`,
      urlActualizarEnsayo: `${GLOBAL.URL}ensayos/actualizar-ensayo-compresion`,
      urlBuscarOtt: `${GLOBAL.URL}ensayos/buscar-ott`,
      timeout: null,
      ordenSeleccionada: "",
      ordenes: [],
      opcionesSearchBoxOTT: [],
      loading: false,
      cantidadDecimales: 6,
      factoresConversion: {
        20: 1.25,
        25: 1.2,
        30: 1.17,
        35: 1.14,
        40: 1.13,
        45: 1.11,
        50: 1.1,
      },
      options: [
        {
          value: "NELSON CARDENAS RODRIGUEZ",
          label: "NELSON CARDENAS RODRIGUEZ",
        },
        {
          value: "FABIAN DIAZ LOYOLA",
          label: "FABIAN DIAZ LOYOLA",
        },
        {
          value: "RICARDO MOYA GONZALEZ",
          label: "RICARDO MOYA GONZALEZ",
        },
        {
          value: "LUIS NAVARRO NAVARRO",
          label: "LUIS NAVARRO NAVARRO",
        },
        {
          value: "CRISTIAN REYES MARTINEZ",
          label: "CRISTIAN REYES MARTINEZ",
        },
        {
          value: "WALTER ROJAS SAN MARTIN",
          label: "WALTER ROJAS SAN MARTIN",
        },
        {
          value: "VICTOR SANDOVAL HERNANDEZ",
          label: "VICTOR SANDOVAL HERNANDEZ",
        },
        {
          value: "ERNESTO  VARGAS GONZALEZ",
          label: "ERNESTO  VARGAS GONZALEZ",
        },
        {
          value: "FRANCISCO VARGAS MARTINEZ",
          label: "FRANCISCO VARGAS MARTINEZ",
        },
        {
          value: "JORGE PINTO CONCHA",
          label: "JORGE PINTO CONCHA",
        },
        {
          value: "GUILLERMO NEIRA ROJAS",
          label: "GUILLERMO NEIRA ROJAS",
        },
        {
          value: "EVICTOR SAEZ BARRIOS",
          label: "VICTOR SAEZ BARRIOS",
        },
        {
          value: "VICTOR MUÑOZ ANDRADE",
          label: "VICTOR MUÑOZ ANDRADE",
        },
        {
          value: "ALEX ORTIZ  PASTEN",
          label: "ALEX ORTIZ  PASTEN",
        },
        {
          value: "IGNACIO ORTIZ  PASTEN",
          label: "IGNACIO ORTIZ  PASTEN",
        },
        {
          value: "ANGELO ESPINOZA HERNANDEZ",
          label: "ANGELO ESPINOZA HERNANDEZ",
        },
      ],
      pickerOptionsFechaEnsayo: {
        // disabledDate(time) {
        //     this.calculaFechaEnsayoInicio()
        //     return time.getTime() > Date.now();
        // },
      },
      form: {
        id: null,
        numIngreso: "Cargado desde la OTT",
        OTT: "",
        numInforme: "",
        camaraHumeda: "",
        piscina: "",
        balanza: "",
        numPieDeMetro: "",
        numPrensa: "",
        numCronometro: "",
        errorCientoCincuentaMm: 0,
        errorTrescientosMm: 0,
        numMarmita: "",
        numDispositivoRefrentado: "",
        numMicrometro: "",
        numMoldeMuestraUno: "",
        numMoldeMuestraDos: "",
        numMoldeMuestraTres: "",
        numMoldeMuestraCuatro: "",
        fechaConfeccionMuestraUno: "Cargado desde OTT",
        fechaConfeccionMuestraDos: "Cargado desde OTT",
        fechaConfeccionMuestraTres: "Cargado desde OTT",
        fechaConfeccionMuestraCuatro: "Cargado desde OTT",
        fechaEnsayoMuestraUno: "",
        fechaEnsayoMuestraDos: "",
        fechaEnsayoMuestraTres: "",
        fechaEnsayoMuestraCuatro: "",
        edadDiasMuestraUno: "",
        edadDiasMuestraDos: "",
        edadDiasMuestraTres: "",
        edadDiasMuestraCuatro: "",
        refrentadoMuestraUno: "",
        refrentadoMuestraDos: "",
        refrentadoMuestraTres: "",
        refrentadoMuestraCuatro: "",
        refrentadoCorregidoMuestraUno: "",
        refrentadoCorregidoMuestraDos: "",
        refrentadoCorregidoMuestraTres: "",
        refrentadoCorregidoMuestraCuatro: "",
        perpendicularidadMuestraUno: "",
        perpendicularidadMuestraDos: "",
        perpendicularidadMuestraTres: "",
        perpendicularidadMuestraCuatro: "",
        planeidadMuestraUno: "",
        planeidadMuestraDos: "",
        planeidadMuestraTres: "",
        planeidadMuestraCuatro: "",
        espesorSuperiorMuestraUno: "",
        espesorSuperiorMuestraDos: "",
        espesorSuperiorMuestraTres: "",
        espesorSuperiorMuestraCuatro: "",
        espesorInferiorMuestraUno: "",
        espesorInferiorMuestraDos: "",
        espesorInferiorMuestraTres: "",
        espesorInferiorMuestraCuatro: "",
        espesorPromedioMuestraUno: "",
        espesorPromedioMuestraDos: "",
        espesorPromedioMuestraTres: "",
        espesorPromedioMuestraCuatro: "",
        dUnoMuestraUno: "",
        dUnoMuestraDos: "",
        dUnoMuestraTres: "",
        dUnoMuestraCuatro: "",
        dDosMuestraUno: "",
        dDosMuestraDos: "",
        dDosMuestraTres: "",
        dDosMuestraCuatro: "",
        hUnoMuestraUno: "",
        hUnoMuestraDos: "",
        hUnoMuestraTres: "",
        hUnoMuestraCuatro: "",
        hDosMuestraUno: "",
        hDosMuestraDos: "",
        hDosMuestraTres: "",
        hDosMuestraCuatro: "",
        refrentadoUno: "",
        refrentadoDos: "",
        refrentadoTres: "",
        refrentadoCuatro: "",
        dUnoMuestraUnoCorregida: "",
        dUnoMuestraDosCorregida: "",
        dUnoMuestraTresCorregida: "",
        dUnoMuestraCuatroCorregida: "",
        dDosMuestraUnoCorregida: "",
        dDosMuestraDosCorregida: "",
        dDosMuestraTresCorregida: "",
        dDosMuestraCuatroCorregida: "",
        hUnoMuestraUnoCorregida: "",
        hUnoMuestraDosCorregida: "",
        hUnoMuestraTresCorregida: "",
        hUnoMuestraCuatroCorregida: "",
        hDosMuestraUnoCorregida: "",
        hDosMuestraDosCorregida: "",
        hDosMuestraTresCorregida: "",
        hDosMuestraCuatroCorregida: "",
        masaMuestraUno: "",
        masaMuestraDos: "",
        masaMuestraTres: "",
        masaMuestraCuatro: "",
        errorMuestraUno: "",
        errorMuestraDos: "",
        errorMuestraTres: "",
        errorMuestraCuatro: "",
        masaCorregidaMuestraUno: "",
        masaCorregidaMuestraDos: "",
        masaCorregidaMuestraTres: "",
        masaCorregidaMuestraCuatro: "",
        volumenMuestraUno: "",
        volumenMuestraDos: "",
        volumenMuestraTres: "",
        volumenMuestraCuatro: "",
        volumenMetroCubicoMuestraUno: "",
        volumenMetroCubicoMuestraDos: "",
        volumenMetroCubicoMuestraTres: "",
        volumenMetroCubicoMuestraCuatro: "",
        densidadMuestraUno: "",
        densidadMuestraDos: "",
        densidadMuestraTres: "",
        densidadMuestraCuatro: "",
        areaMuestraUno: "",
        areaMuestraDos: "",
        areaMuestraTres: "",
        areaMuestraCuatro: "",
        cargaEnsayoMuestraUno: "",
        cargaEnsayoMuestraDos: "",
        cargaEnsayoMuestraTres: "",
        cargaEnsayoMuestraCuatro: "",
        cargaEnsayoMilMuestraUno: "",
        cargaEnsayoMilMuestraDos: "",
        cargaEnsayoMilMuestraTres: "",
        cargaEnsayoMilMuestraCuatro: "",
        tiempoCargaMuestraUno: "",
        tiempoCargaMuestraDos: "",
        tiempoCargaMuestraTres: "",
        tiempoCargaMuestraCuatro: "",
        resistenciaCompresionMuestraUno: "",
        resistenciaCompresionMuestraDos: "",
        resistenciaCompresionMuestraTres: "",
        resistenciaCompresionMuestraCuatro: "",
        factoresConversionMuestraUno: "",
        factoresConversionMuestraDos: "",
        factoresConversionMuestraTres: "",
        factoresConversionMuestraCuatro: "",
        resistenciaCorregidaMuestraUno: "",
        resistenciaCorregidaMuestraDos: "",
        resistenciaCorregidaMuestraTres: "",
        resistenciaCorregidaMuestraCuatro: "",
        velocidadEnsayoMuestraUno: "",
        velocidadEnsayoMuestraDos: "",
        velocidadEnsayoMuestraTres: "",
        velocidadEnsayoMuestraCuatro: "",
        tipoRoturaMuestraUno: "",
        tipoRoturaMuestraDos: "",
        tipoRoturaMuestraTres: "",
        tipoRoturaMuestraCuatro: "",
        aseguramientoMuestraUno: "",
        aseguramientoMuestraDos: "",
        aseguramientoMuestraTres: "",
        aseguramientoMuestraCuatro: "",
        cumpleMuestraUno: false,
        cumpleMuestraDos: false,
        cumpleMuestraTres: false,
        cumpleMuestraCuatro: false,
        velocidadMuestraUno: false,
        velocidadMuestraDos: false,
        velocidadMuestraTres: false,
        velocidadMuestraCuatro: false,
        observaciones: "",
        ensayadoPor: "",
        fecha: "",
        vb: "",
      },
      reglas: {
        numIngreso: [{ required: true, message: "", trigger: "blur" }],
        OTT: [{ required: true, message: "", trigger: "change" }],
        numInforme: [{ required: true, message: "", trigger: "blur" }],
        camaraHumeda: [{ required: true, message: "", trigger: "blur" }],
        piscina: [{ required: true, message: "", trigger: "blur" }],
        balanza: [{ required: true, message: "", trigger: "blur" }],
        numPieDeMetro: [{ required: true, message: "", trigger: "blur" }],
        numPrensa: [{ required: true, message: "", trigger: "blur" }],
        numCronometro: [{ required: true, message: "", trigger: "blur" }],
        errorTrescientosMm: [{ required: true, message: "", trigger: "blur" }],
        numMarmita: [{ required: true, message: "", trigger: "blur" }],
        numDispositivoRefrentado: [
          { required: true, message: "", trigger: "blur" },
        ],
        numMicrometro: [{ required: true, message: "", trigger: "blur" }],
        numMoldeMuestraUno: [{ required: true, message: "", trigger: "blur" }],
        numMoldeMuestraDos: [{ required: true, message: "", trigger: "blur" }],
        numMoldeMuestraTres: [{ required: true, message: "", trigger: "blur" }],
        numMoldeMuestraCuatro: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaConfeccionMuestraUno: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaConfeccionMuestraDos: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaConfeccionMuestraTres: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaConfeccionMuestraCuatro: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaEnsayoMuestraUno: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaEnsayoMuestraDos: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaEnsayoMuestraTres: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaEnsayoMuestraCuatro: [
          { required: true, message: "", trigger: "blur" },
        ],
        edadDiasMuestraUno: [{ required: true, message: "", trigger: "blur" }],
        edadDiasMuestraDos: [{ required: true, message: "", trigger: "blur" }],
        edadDiasMuestraTres: [{ required: true, message: "", trigger: "blur" }],
        edadDiasMuestraCuatro: [
          { required: true, message: "", trigger: "blur" },
        ],
      },
      visualizacion: "",
    };
  },
  mounted() {
    this.visualizacion = this.tipoEnsayo;
    console.log(this.visualizacion);
    if (this.ensayoCargado) {
      this.cargaDatosEnsayo();
    }
  },
  methods: {
    onSubmit(nombreEnsayo, accion) {
      if (accion === "crear") {
        // this.$refs[nombreEnsayo].validate((valid) => {
        //     if (valid) {
        this.$http
          .post(this.urlGuardarEnsayo, {
            ensayo: this.form,
          })
          .then(
            (response) => {
              if (response.body[1] == true) {
                Tools.mensajeAlerta(
                  "Ensayo guardado.",
                  Tools.MENSAJE.EXITO,
                  "",
                  5
                );
                this.$emit("cambiaMain", {
                  vista: "ListadoEnsayosCompresionProbetasCilindricas",
                  condicion: "porvalidar",
                });
              } else {
                if (response.body[0].errorInfo[0] == "23000") {
                  return Tools.mensajeAlerta(
                    "Ya existe un ensayo con este número de informe en la base de datos.",
                    Tools.MENSAJE.ERROR,
                    "",
                    5
                  );
                }
                return Tools.mensajeAlerta(
                  "No se pudo guardar el ensayo.",
                  Tools.MENSAJE.ERROR,
                  "",
                  5
                );
              }
            },
            (response) => {
              console.log(response);
              Tools.mensajeAlerta(
                "No se pudo guardar el ensayo.",
                Tools.MENSAJE.ERROR,
                "",
                5
              );
            }
          );
        //     } else {
        //         Tools.mensajeAlerta("Faltan campos que llenar en el ensayo.", Tools.MENSAJE.ADVERTENCIA, '', 5);
        //         return false;
        //     }
        // });
      } else if (accion === "editar") {
        let estado = this.ensayoCargado.validado ? "validadas" : "porvalidar";
        console.log("estado vale " + estado);
        console.log(this.$parent.$parent);
        // this.$refs[nombreEnsayo].validate((valid) => {
        //     if (valid) {
        this.$http
          .post(this.urlActualizarEnsayo, {
            ensayo: this.form,
          })
          .then(
            (response) => {
              if (response.body[1] == true) {
                Tools.mensajeAlerta(
                  "Ensayo actualizado.",
                  Tools.MENSAJE.EXITO,
                  "",
                  5
                );
                setTimeout(function () {
                  parent.$("#cerrar-visualizacion").click();
                }, 100);
              } else {
                if (response.body[0].errorInfo[0] == "23000") {
                  return Tools.mensajeAlerta(
                    "Ya existe un ensayo con este número de informe en la base de datos.",
                    Tools.MENSAJE.ERROR,
                    "",
                    5
                  );
                }
                return Tools.mensajeAlerta(
                  "No se pudo guardar el ensayo.",
                  Tools.MENSAJE.ERROR,
                  "",
                  5
                );
              }
            },
            (response) => {
              console.log(response);
              Tools.mensajeAlerta(
                "No se pudo guardar el ensayo.",
                Tools.MENSAJE.ERROR,
                "",
                5
              );
            }
          );
        //     } else {
        //         Tools.mensajeAlerta("Faltan campos que llenar en el ensayo.", Tools.MENSAJE.ADVERTENCIA, '', 5);
        //         return false;
        //     }
        // });
      }
    },
    resetForm(nombreFormulario) {
      this.$refs[nombreFormulario].resetFields();
    },
    querySearchNumeroOtt(query) {
      if (query !== "") {
        this.loading = true;
        this.$http.get(this.urlBuscarOtt + "/" + query, {}).then(
          (response) => {
            this.loading = false;
            let resultados = response.body;
            var results =
              resultados.length > 0
                ? resultados.map((orden) => {
                    return { value: orden.num_ott, id: orden.num_ott };
                  })
                : [];
            console.log("resultados", results, resultados);
            this.opcionesSearchBoxOTT = results;
            this.ordenes = resultados;
          },
          (response) => {
            console.log(response);
            Tools.mensajeAlerta(
              "No se pudo encontrar ott para su criterio de busqueda.",
              Tools.MENSAJE.ERROR,
              "",
              5
            );
          }
        );
      }
    },
    calculaDiametroCorregido() {
      this.form.errorCientoCincuentaMm = this.form.errorCientoCincuentaMm
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraUno = this.form.dUnoMuestraUno
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraUno = this.form.dDosMuestraUno
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraDos = this.form.dUnoMuestraDos
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraDos = this.form.dDosMuestraDos
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraTres = this.form.dUnoMuestraTres
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraTres = this.form.dDosMuestraTres
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraCuatro = this.form.dUnoMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraCuatro = this.form.dDosMuestraCuatro
        .toString()
        .replace(",", ".");
      var error = this.form.errorCientoCincuentaMm.toString().replace(",", ".");
      var dUnoMuestraUno = this.form.dUnoMuestraUno
        .toString()
        .replace(",", ".");
      var dDosMuestraUno = this.form.dDosMuestraUno
        .toString()
        .replace(",", ".");
      var dUnoMuestraDos = this.form.dUnoMuestraDos
        .toString()
        .replace(",", ".");
      var dDosMuestraDos = this.form.dDosMuestraDos
        .toString()
        .replace(",", ".");
      var dUnoMuestraTres = this.form.dUnoMuestraTres
        .toString()
        .replace(",", ".");
      var dDosMuestraTres = this.form.dDosMuestraTres
        .toString()
        .replace(",", ".");
      var dUnoMuestraCuatro = this.form.dUnoMuestraCuatro
        .toString()
        .replace(",", ".");
      var dDosMuestraCuatro = this.form.dDosMuestraCuatro
        .toString()
        .replace(",", ".");
      let calc;
      if (isNaN(error) || error.trim() == "") {
        this.form.dUnoMuestraUnoCorregida = "---";
        this.form.dDosMuestraUnoCorregida = "---";
        this.form.dUnoMuestraDosCorregida = "---";
        this.form.dDosMuestraDosCorregida = "---";
        this.form.dUnoMuestraTresCorregida = "---";
        this.form.dDosMuestraTresCorregida = "---";
        this.form.dUnoMuestraCuatroCorregida = "---";
        this.form.dDosMuestraCuatroCorregida = "---";
      }
      if (
        !isNaN(dUnoMuestraUno) &&
        !isNaN(error) &&
        dUnoMuestraUno.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dUnoMuestraUno) + parseFloat(error);
        this.form.dUnoMuestraUnoCorregida = calc;
      } else {
        this.form.dUnoMuestraUnoCorregida = "---";
      }
      if (
        !isNaN(dDosMuestraUno) &&
        !isNaN(error) &&
        dDosMuestraUno.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dDosMuestraUno) + parseFloat(error);
        this.form.dDosMuestraUnoCorregida = calc;
      } else {
        this.form.dDosMuestraUnoCorregida = "---";
      }
      if (
        !isNaN(dUnoMuestraDos) &&
        !isNaN(error) &&
        dUnoMuestraDos.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dUnoMuestraDos) + parseFloat(error);
        this.form.dUnoMuestraDosCorregida = calc;
      } else {
        this.form.dUnoMuestraDosCorregida = "---";
      }
      if (
        !isNaN(dDosMuestraDos) &&
        !isNaN(error) &&
        dDosMuestraDos.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dDosMuestraDos) + parseFloat(error);
        this.form.dDosMuestraDosCorregida = calc;
      } else {
        this.form.dDosMuestraDosCorregida = "---";
      }
      if (
        !isNaN(dUnoMuestraTres) &&
        !isNaN(error) &&
        dUnoMuestraTres.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dUnoMuestraTres) + parseFloat(error);
        this.form.dUnoMuestraTresCorregida = calc;
      } else {
        this.form.dUnoMuestraTresCorregida = "---";
      }
      if (
        !isNaN(dDosMuestraTres) &&
        !isNaN(error) &&
        dDosMuestraTres.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dDosMuestraTres) + parseFloat(error);
        this.form.dDosMuestraTresCorregida = calc;
      } else {
        this.form.dDosMuestraTresCorregida = "---";
      }
      if (
        !isNaN(dUnoMuestraCuatro) &&
        !isNaN(error) &&
        dUnoMuestraCuatro.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dUnoMuestraCuatro) + parseFloat(error);
        this.form.dUnoMuestraCuatroCorregida = calc;
      } else {
        this.form.dUnoMuestraCuatroCorregida = "---";
      }
      if (
        !isNaN(dDosMuestraCuatro) &&
        !isNaN(error) &&
        dDosMuestraCuatro.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(dDosMuestraCuatro) + parseFloat(error);
        this.form.dDosMuestraCuatroCorregida = calc;
      } else {
        this.form.dDosMuestraCuatroCorregida = "---";
      }
    },
    calculaLongitudCorregida() {
      this.form.errorTrescientosMm = this.form.errorTrescientosMm
        .toString()
        .replace(",", ".");
      this.form.hUnoMuestraUno = this.form.hUnoMuestraUno
        .toString()
        .replace(",", ".");
      this.form.hDosMuestraUno = this.form.hDosMuestraUno
        .toString()
        .replace(",", ".");
      this.form.hUnoMuestraDos = this.form.hUnoMuestraDos
        .toString()
        .replace(",", ".");
      this.form.hDosMuestraDos = this.form.hDosMuestraDos
        .toString()
        .replace(",", ".");
      this.form.hUnoMuestraTres = this.form.hUnoMuestraTres
        .toString()
        .replace(",", ".");
      this.form.hDosMuestraTres = this.form.hDosMuestraTres
        .toString()
        .replace(",", ".");
      this.form.hUnoMuestraCuatro = this.form.hUnoMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.hDosMuestraCuatro = this.form.hDosMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.refrentadoUno = this.form.refrentadoUno
        .toString()
        .replace(",", ".");
      this.form.refrentadoDos = this.form.refrentadoDos
        .toString()
        .replace(",", ".");
      this.form.refrentadoTres = this.form.refrentadoTres
        .toString()
        .replace(",", ".");
      this.form.refrentadoCuatro = this.form.refrentadoCuatro
        .toString()
        .replace(",", ".");
      var error = this.form.errorTrescientosMm.toString().replace(",", ".");
      var hUnoMuestraUno = this.form.hUnoMuestraUno
        .toString()
        .replace(",", ".");
      var hDosMuestraUno = this.form.hDosMuestraUno
        .toString()
        .replace(",", ".");
      var hUnoMuestraDos = this.form.hUnoMuestraDos
        .toString()
        .replace(",", ".");
      var hDosMuestraDos = this.form.hDosMuestraDos
        .toString()
        .replace(",", ".");
      var hUnoMuestraTres = this.form.hUnoMuestraTres
        .toString()
        .replace(",", ".");
      var hDosMuestraTres = this.form.hDosMuestraTres
        .toString()
        .replace(",", ".");
      var hUnoMuestraCuatro = this.form.hUnoMuestraCuatro
        .toString()
        .replace(",", ".");
      var hDosMuestraCuatro = this.form.hDosMuestraCuatro
        .toString()
        .replace(",", ".");
      var refrentadoUno = this.form.refrentadoUno.toString().replace(",", ".");
      var refrentadoDos = this.form.refrentadoDos.toString().replace(",", ".");
      var refrentadoTres = this.form.refrentadoTres
        .toString()
        .replace(",", ".");
      var refrentadoCuatro = this.form.refrentadoCuatro
        .toString()
        .replace(",", ".");
      let calc;
      if (isNaN(error) || error.trim() == "") {
        this.form.hUnoMuestraUnoCorregida = "---";
        this.form.hDosMuestraUnoCorregida = "---";
        this.form.hUnoMuestraDosCorregida = "---";
        this.form.hDosMuestraDosCorregida = "---";
        this.form.hUnoMuestraTresCorregida = "---";
        this.form.hDosMuestraTresCorregida = "---";
        this.form.hUnoMuestraCuatroCorregida = "---";
        this.form.hDosMuestraCuatroCorregida = "---";
        this.form.refrentadoCorregidoMuestraUno = "---";
        this.form.refrentadoCorregidoMuestraDos = "---";
        this.form.refrentadoCorregidoMuestraTres = "---";
        this.form.refrentadoCorregidoMuestraCuatro = "---";
      }
      if (
        !isNaN(hUnoMuestraUno) &&
        !isNaN(error) &&
        hUnoMuestraUno.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hUnoMuestraUno) + parseFloat(error);
        this.form.hUnoMuestraUnoCorregida = calc;
      } else {
        this.form.hUnoMuestraUnoCorregida = "---";
      }
      if (
        !isNaN(hDosMuestraUno) &&
        !isNaN(error) &&
        hDosMuestraUno.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hDosMuestraUno) + parseFloat(error);
        this.form.hDosMuestraUnoCorregida = calc;
      } else {
        this.form.hDosMuestraUnoCorregida = "---";
      }
      if (
        !isNaN(hUnoMuestraDos) &&
        !isNaN(error) &&
        hUnoMuestraDos.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hUnoMuestraDos) + parseFloat(error);
        this.form.hUnoMuestraDosCorregida = calc;
      } else {
        this.form.hUnoMuestraDosCorregida = "---";
      }
      if (
        !isNaN(hDosMuestraDos) &&
        !isNaN(error) &&
        hDosMuestraDos.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hDosMuestraDos) + parseFloat(error);
        this.form.hDosMuestraDosCorregida = calc;
      } else {
        this.form.hDosMuestraDosCorregida = "---";
      }
      if (
        !isNaN(hUnoMuestraTres) &&
        !isNaN(error) &&
        hUnoMuestraTres.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hUnoMuestraTres) + parseFloat(error);
        this.form.hUnoMuestraTresCorregida = calc;
      } else {
        this.form.hUnoMuestraTresCorregida = "---";
      }
      if (
        !isNaN(hDosMuestraTres) &&
        !isNaN(error) &&
        hDosMuestraTres.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hDosMuestraTres) + parseFloat(error);
        this.form.hDosMuestraTresCorregida = calc;
      } else {
        this.form.hDosMuestraTresCorregida = "---";
      }
      if (
        !isNaN(hUnoMuestraCuatro) &&
        !isNaN(error) &&
        hUnoMuestraCuatro.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hUnoMuestraCuatro) + parseFloat(error);
        this.form.hUnoMuestraCuatroCorregida = calc;
      } else {
        this.form.hUnoMuestraCuatroCorregida = "---";
      }
      if (
        !isNaN(hDosMuestraCuatro) &&
        !isNaN(error) &&
        hDosMuestraCuatro.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(hDosMuestraCuatro) + parseFloat(error);
        this.form.hDosMuestraCuatroCorregida = calc;
      } else {
        this.form.hDosMuestraCuatroCorregida = "---";
      }
      if (
        !isNaN(refrentadoUno) &&
        !isNaN(error) &&
        refrentadoUno.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(refrentadoUno) + parseFloat(error);
        this.form.refrentadoCorregidoMuestraUno = calc;
      } else {
        this.form.refrentadoCorregidoMuestraUno = "---";
      }
      if (
        !isNaN(refrentadoDos) &&
        !isNaN(error) &&
        refrentadoDos.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(refrentadoDos) + parseFloat(error);
        this.form.refrentadoCorregidoMuestraDos = calc;
      } else {
        this.form.refrentadoCorregidoMuestraDos = "---";
      }
      if (
        !isNaN(refrentadoTres) &&
        !isNaN(error) &&
        refrentadoTres.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(refrentadoTres) + parseFloat(error);
        this.form.refrentadoCorregidoMuestraTres = calc;
      } else {
        this.form.refrentadoCorregidoMuestraTres = "---";
      }
      if (
        !isNaN(refrentadoCuatro) &&
        !isNaN(error) &&
        refrentadoCuatro.trim() != "" &&
        error.trim() != ""
      ) {
        calc = parseFloat(refrentadoCuatro) + parseFloat(error);
        this.form.refrentadoCorregidoMuestraCuatro = calc;
      } else {
        this.form.refrentadoCorregidoMuestraCuatro = "---";
      }
    },
    calculaFactorCompresion(
      resistenciaUno,
      resistenciaDos,
      factorUno,
      factorDos,
      valorRecibido
    ) {
      return (
        ((valorRecibido - resistenciaUno) / (resistenciaDos - resistenciaUno)) *
          (factorDos - factorUno) +
        factorUno
      ).toPrecision(1);
    },
    cargaDatosEnsayo() {
      this.form.id = this.ensayoCargado.id;
      this.form.numIngreso = this.ensayoCargado.num_ingreso;
      this.form.OTT = this.ensayoCargado.ott;
      this.form.numInforme = this.ensayoCargado.num_informe;
      this.form.camaraHumeda = this.ensayoCargado.camara_humeda;
      this.form.piscina = this.ensayoCargado.piscina;
      this.form.balanza = this.ensayoCargado.balanza;
      this.form.numPieDeMetro = this.ensayoCargado.num_pie_de_metro;
      this.form.numPrensa = this.ensayoCargado.num_prensa;
      this.form.numCronometro = this.ensayoCargado.num_cronometro;
      this.form.errorCientoCincuentaMm = this.ensayoCargado.error_cientocincuenta_mm;
      this.form.errorTrescientosMm = this.ensayoCargado.error_trescientos_mm;
      this.form.numMarmita = this.ensayoCargado.num_marmita;
      this.form.numDispositivoRefrentado = this.ensayoCargado.num_dispositivo_refrentado;
      this.form.numMicrometro = this.ensayoCargado.num_micrometro;
      this.form.numMoldeMuestraUno = this.ensayoCargado.num_molde_muestra_uno;
      this.form.numMoldeMuestraDos = this.ensayoCargado.num_molde_muestra_dos;
      this.form.numMoldeMuestraTres = this.ensayoCargado.num_molde_muestra_tres;
      this.form.numMoldeMuestraCuatro = this.ensayoCargado.num_molde_muestra_cuatro;
      this.form.fechaConfeccionMuestraUno = this.ensayoCargado.fecha_confeccion_muestra_uno;
      this.form.fechaConfeccionMuestraDos = this.ensayoCargado.fecha_confeccion_muestra_dos;
      this.form.fechaConfeccionMuestraTres = this.ensayoCargado.fecha_confeccion_muestra_tres;
      this.form.fechaConfeccionMuestraCuatro = this.ensayoCargado.fecha_confeccion_muestra_cuatro;
      this.form.fechaEnsayoMuestraUno = this.ensayoCargado.fecha_ensayo_muestra_uno;
      this.form.fechaEnsayoMuestraDos = this.ensayoCargado.fecha_ensayo_muestra_dos;
      this.form.fechaEnsayoMuestraTres = this.ensayoCargado.fecha_ensayo_muestra_tres;
      this.form.fechaEnsayoMuestraCuatro = this.ensayoCargado.fecha_ensayo_muestra_cuatro;
      this.form.edadDiasMuestraUno = this.ensayoCargado.edad_dias_muestra_uno;
      this.form.edadDiasMuestraDos = this.ensayoCargado.edad_dias_muestra_dos;
      this.form.edadDiasMuestraTres = this.ensayoCargado.edad_dias_muestra_tres;
      this.form.edadDiasMuestraCuatro = this.ensayoCargado.edad_dias_muestra_cuatro;
      this.form.refrentadoCorregidoMuestraUno = this.ensayoCargado.refrentado_corregido_muestra_uno;
      this.form.refrentadoCorregidoMuestraDos = this.ensayoCargado.refrentado_corregido_muestra_dos;
      this.form.refrentadoCorregidoMuestraTres = this.ensayoCargado.refrentado_corregido_muestra_tres;
      this.form.refrentadoCorregidoMuestraCuatro = this.ensayoCargado.refrentado_corregido_muestra_cuatro;
      this.form.espesorSuperiorMuestraUno = this.ensayoCargado.espesor_superior_muestra_uno;
      this.form.espesorSuperiorMuestraDos = this.ensayoCargado.espesor_superior_muestra_dos;
      this.form.espesorSuperiorMuestraTres = this.ensayoCargado.espesor_superior_muestra_tres;
      this.form.espesorSuperiorMuestraCuatro = this.ensayoCargado.espesor_superior_muestra_cuatro;
      this.form.espesorInferiorMuestraUno = this.ensayoCargado.espesor_inferior_muestra_uno;
      this.form.espesorInferiorMuestraDos = this.ensayoCargado.espesor_inferior_muestra_dos;
      this.form.espesorInferiorMuestraTres = this.ensayoCargado.espesor_inferior_muestra_tres;
      this.form.espesorInferiorMuestraCuatro = this.ensayoCargado.espesor_inferior_muestra_cuatro;
      this.form.espesorPromedioMuestraUno = this.ensayoCargado.espesor_promedio_muestra_uno;
      this.form.espesorPromedioMuestraDos = this.ensayoCargado.espesor_promedio_muestra_dos;
      this.form.espesorPromedioMuestraTres = this.ensayoCargado.espesor_promedio_muestra_tres;
      this.form.espesorPromedioMuestraCuatro = this.ensayoCargado.espesor_promedio_muestra_cuatro;
      this.form.dUnoMuestraUno = this.ensayoCargado.d_uno_muestra_uno;
      this.form.dUnoMuestraDos = this.ensayoCargado.d_uno_muestra_dos;
      this.form.dUnoMuestraTres = this.ensayoCargado.d_uno_muestra_tres;
      this.form.dUnoMuestraCuatro = this.ensayoCargado.d_uno_muestra_cuatro;
      this.form.dDosMuestraUno = this.ensayoCargado.d_dos_muestra_uno;
      this.form.dDosMuestraDos = this.ensayoCargado.d_dos_muestra_dos;
      this.form.dDosMuestraTres = this.ensayoCargado.d_dos_muestra_tres;
      this.form.dDosMuestraCuatro = this.ensayoCargado.d_dos_muestra_cuatro;
      this.form.hUnoMuestraUno = this.ensayoCargado.h_uno_muestra_uno;
      this.form.hUnoMuestraDos = this.ensayoCargado.h_uno_muestra_dos;
      this.form.hUnoMuestraTres = this.ensayoCargado.h_uno_muestra_tres;
      this.form.hUnoMuestraCuatro = this.ensayoCargado.h_uno_muestra_cuatro;
      this.form.hDosMuestraUno = this.ensayoCargado.h_dos_muestra_uno;
      this.form.hDosMuestraDos = this.ensayoCargado.h_dos_muestra_dos;
      this.form.hDosMuestraTres = this.ensayoCargado.h_dos_muestra_tres;
      this.form.hDosMuestraCuatro = this.ensayoCargado.h_dos_muestra_cuatro;
      this.form.refrentadoUno = this.ensayoCargado.refrentado_uno;
      this.form.refrentadoDos = this.ensayoCargado.refrentado_dos;
      this.form.refrentadoTres = this.ensayoCargado.refrentado_tres;
      this.form.refrentadoCuatro = this.ensayoCargado.refrentado_cuatro;
      this.form.dUnoMuestraUnoCorregida = this.ensayoCargado.d_uno_muestra_uno_corregida;
      this.form.dUnoMuestraDosCorregida = this.ensayoCargado.d_uno_muestra_dos_corregida;
      this.form.dUnoMuestraTresCorregida = this.ensayoCargado.d_uno_muestra_tres_corregida;
      this.form.dUnoMuestraCuatroCorregida = this.ensayoCargado.d_uno_muestra_cuatro_corregida;
      this.form.dDosMuestraUnoCorregida = this.ensayoCargado.d_dos_muestra_uno_corregida;
      this.form.dDosMuestraDosCorregida = this.ensayoCargado.d_dos_muestra_dos_corregida;
      this.form.dDosMuestraTresCorregida = this.ensayoCargado.d_dos_muestra_tres_corregida;
      this.form.dDosMuestraCuatroCorregida = this.ensayoCargado.d_dos_muestra_cuatro_corregida;
      this.form.hUnoMuestraUnoCorregida = this.ensayoCargado.h_uno_muestra_uno_corregida;
      this.form.hUnoMuestraDosCorregida = this.ensayoCargado.h_uno_muestra_dos_corregida;
      this.form.hUnoMuestraTresCorregida = this.ensayoCargado.h_uno_muestra_tres_corregida;
      this.form.hUnoMuestraCuatroCorregida = this.ensayoCargado.h_uno_muestra_cuatro_corregida;
      this.form.hDosMuestraUnoCorregida = this.ensayoCargado.h_dos_muestra_uno_corregida;
      this.form.hDosMuestraDosCorregida = this.ensayoCargado.h_dos_muestra_dos_corregida;
      this.form.hDosMuestraTresCorregida = this.ensayoCargado.h_dos_muestra_tres_corregida;
      this.form.hDosMuestraCuatroCorregida = this.ensayoCargado.h_dos_muestra_cuatro_corregida;
      this.form.masaMuestraUno = this.ensayoCargado.masa_muestra_uno;
      this.form.masaMuestraDos = this.ensayoCargado.masa_muestra_dos;
      this.form.masaMuestraTres = this.ensayoCargado.masa_muestra_tres;
      this.form.masaMuestraCuatro = this.ensayoCargado.masa_muestra_cuatro;
      this.form.errorMuestraUno = this.ensayoCargado.error_muestra_uno;
      this.form.errorMuestraDos = this.ensayoCargado.error_muestra_dos;
      this.form.errorMuestraTres = this.ensayoCargado.error_muestra_tres;
      this.form.errorMuestraCuatro = this.ensayoCargado.error_muestra_cuatro;
      this.form.masaCorregidaMuestraUno = this.ensayoCargado.masa_corregida_muestra_uno;
      this.form.masaCorregidaMuestraDos = this.ensayoCargado.masa_corregida_muestra_dos;
      this.form.masaCorregidaMuestraTres = this.ensayoCargado.masa_corregida_muestra_tres;
      this.form.masaCorregidaMuestraCuatro = this.ensayoCargado.masa_corregida_muestra_cuatro;
      this.form.volumenMuestraUno = this.ensayoCargado.volumen_muestra_uno;
      this.form.volumenMuestraDos = this.ensayoCargado.volumen_muestra_dos;
      this.form.volumenMuestraTres = this.ensayoCargado.volumen_muestra_tres;
      this.form.volumenMuestraCuatro = this.ensayoCargado.volumen_muestra_cuatro;
      this.form.volumenMetroCubicoMuestraUno = this.ensayoCargado.volumen_metro_cubico_muestra_uno;
      this.form.volumenMetroCubicoMuestraDos = this.ensayoCargado.volumen_metro_cubico_muestra_dos;
      this.form.volumenMetroCubicoMuestraTres = this.ensayoCargado.volumen_metro_cubico_muestra_tres;
      this.form.volumenMetroCubicoMuestraCuatro = this.ensayoCargado.volumen_metro_cubico_muestra_cuatro;
      this.form.densidadMuestraUno = this.ensayoCargado.densidad_muestra_uno;
      this.form.densidadMuestraDos = this.ensayoCargado.densidad_muestra_dos;
      this.form.densidadMuestraTres = this.ensayoCargado.densidad_muestra_tres;
      this.form.densidadMuestraCuatro = this.ensayoCargado.densidad_muestra_cuatro;
      this.form.areaMuestraUno = this.ensayoCargado.area_muestra_uno;
      this.form.areaMuestraDos = this.ensayoCargado.area_muestra_dos;
      this.form.areaMuestraTres = this.ensayoCargado.area_muestra_tres;
      this.form.areaMuestraCuatro = this.ensayoCargado.area_muestra_cuatro;
      this.form.cargaEnsayoMuestraUno = this.ensayoCargado.carga_ensayo_muestra_uno;
      this.form.cargaEnsayoMuestraDos = this.ensayoCargado.carga_ensayo_muestra_dos;
      this.form.cargaEnsayoMuestraTres = this.ensayoCargado.carga_ensayo_muestra_tres;
      this.form.cargaEnsayoMuestraCuatro = this.ensayoCargado.carga_ensayo_muestra_cuatro;
      this.form.cargaEnsayoMilMuestraUno = this.ensayoCargado.carga_ensayo_mil_muestra_uno;
      this.form.cargaEnsayoMilMuestraDos = this.ensayoCargado.carga_ensayo_mil_muestra_dos;
      this.form.cargaEnsayoMilMuestraTres = this.ensayoCargado.carga_ensayo_mil_muestra_tres;
      this.form.cargaEnsayoMilMuestraCuatro = this.ensayoCargado.carga_ensayo_mil_muestra_cuatro;
      this.form.tiempoCargaMuestraUno = this.ensayoCargado.tiempo_carga_muestra_uno;
      this.form.tiempoCargaMuestraDos = this.ensayoCargado.tiempo_carga_muestra_dos;
      this.form.tiempoCargaMuestraTres = this.ensayoCargado.tiempo_carga_muestra_tres;
      this.form.tiempoCargaMuestraCuatro = this.ensayoCargado.tiempo_carga_muestra_cuatro;
      this.form.resistenciaCompresionMuestraUno = this.ensayoCargado.resistencia_compresion_muestra_uno;
      this.form.resistenciaCompresionMuestraDos = this.ensayoCargado.resistencia_compresion_muestra_dos;
      this.form.resistenciaCompresionMuestraTres = this.ensayoCargado.resistencia_compresion_muestra_tres;
      this.form.resistenciaCompresionMuestraCuatro = this.ensayoCargado.resistencia_compresion_muestra_cuatro;
      this.form.factoresConversionMuestraUno = this.ensayoCargado.factores_conversion_muestra_uno;
      this.form.factoresConversionMuestraDos = this.ensayoCargado.factores_conversion_muestra_dos;
      this.form.factoresConversionMuestraTres = this.ensayoCargado.factores_conversion_muestra_tres;
      this.form.factoresConversionMuestraCuatro = this.ensayoCargado.factores_conversion_muestra_cuatro;
      this.form.resistenciaCorregidaMuestraUno = this.ensayoCargado.resistencia_corregida_muestra_uno;
      this.form.resistenciaCorregidaMuestraDos = this.ensayoCargado.resistencia_corregida_muestra_dos;
      this.form.resistenciaCorregidaMuestraTres = this.ensayoCargado.resistencia_corregida_muestra_tres;
      this.form.resistenciaCorregidaMuestraCuatro = this.ensayoCargado.resistencia_corregida_muestra_cuatro;
      this.form.velocidadEnsayoMuestraUno = this.ensayoCargado.velocidad_ensayo_muestra_uno;
      this.form.velocidadEnsayoMuestraDos = this.ensayoCargado.velocidad_ensayo_muestra_dos;
      this.form.velocidadEnsayoMuestraTres = this.ensayoCargado.velocidad_ensayo_muestra_tres;
      this.form.velocidadEnsayoMuestraCuatro = this.ensayoCargado.velocidad_ensayo_muestra_cuatro;
      this.form.tipoRoturaMuestraUno = this.ensayoCargado.tipo_rotura_muestra_uno;
      this.form.tipoRoturaMuestraDos = this.ensayoCargado.tipo_rotura_muestra_dos;
      this.form.tipoRoturaMuestraTres = this.ensayoCargado.tipo_rotura_muestra_tres;
      this.form.tipoRoturaMuestraCuatro = this.ensayoCargado.tipo_rotura_muestra_cuatro;
      this.form.aseguramientoMuestraUno = this.ensayoCargado.aseguramiento_muestra_uno;
      this.form.aseguramientoMuestraDos = this.ensayoCargado.aseguramiento_muestra_dos;
      this.form.aseguramientoMuestraTres = this.ensayoCargado.aseguramiento_muestra_tres;
      this.form.aseguramientoMuestraCuatro = this.ensayoCargado.aseguramiento_muestra_cuatro;
      this.form.observaciones = this.ensayoCargado.observaciones;
      this.form.ensayadoPor = this.ensayoCargado.ensayado_por;
      this.form.fecha = this.ensayoCargado.fecha;
      this.form.vb = this.ensayoCargado.vb;
      this.form.refrentadoMuestraUno =
        this.ensayoCargado.refrentado_muestra_uno == 1
          ? true
          : this.ensayoCargado.refrentado_muestra_uno;
      this.form.refrentadoMuestraDos =
        this.ensayoCargado.refrentado_muestra_dos == 1
          ? true
          : this.ensayoCargado.refrentado_muestra_dos;
      this.form.refrentadoMuestraTres =
        this.ensayoCargado.refrentado_muestra_tres == 1
          ? true
          : this.ensayoCargado.refrentado_muestra_tres;
      this.form.refrentadoMuestraCuatro =
        this.ensayoCargado.refrentado_muestra_cuatro == 1
          ? true
          : this.ensayoCargado.refrentado_muestra_cuatro;
      this.form.perpendicularidadMuestraUno =
        this.ensayoCargado.perpendicularidad_muestra_uno == 1
          ? true
          : this.ensayoCargado.perpendicularidad_muestra_uno;
      this.form.perpendicularidadMuestraDos =
        this.ensayoCargado.perpendicularidad_muestra_dos == 1
          ? true
          : this.ensayoCargado.perpendicularidad_muestra_dos;
      this.form.perpendicularidadMuestraTres =
        this.ensayoCargado.perpendicularidad_muestra_tres == 1
          ? true
          : this.ensayoCargado.perpendicularidad_muestra_tres;
      this.form.perpendicularidadMuestraCuatro =
        this.ensayoCargado.perpendicularidad_muestra_cuatro == 1
          ? true
          : this.ensayoCargado.perpendicularidad_muestra_cuatro;
      this.form.planeidadMuestraUno =
        this.ensayoCargado.planeidad_muestra_uno == 1
          ? true
          : this.ensayoCargado.planeidad_muestra_uno;
      this.form.planeidadMuestraDos =
        this.ensayoCargado.planeidad_muestra_dos == 1
          ? true
          : this.ensayoCargado.planeidad_muestra_dos;
      this.form.planeidadMuestraTres =
        this.ensayoCargado.planeidad_muestra_tres == 1
          ? true
          : this.ensayoCargado.planeidad_muestra_tres;
      this.form.planeidadMuestraCuatro =
        this.ensayoCargado.planeidad_muestra_cuatro == 1
          ? true
          : this.ensayoCargado.planeidad_muestra_cuatro;
      this.form.cumpleMuestraUno =
        this.ensayoCargado.cumple_muestra_uno == 1
          ? true
          : this.ensayoCargado.cumple_muestra_uno;
      this.form.cumpleMuestraDos =
        this.ensayoCargado.cumple_muestra_dos == 1
          ? true
          : this.ensayoCargado.cumple_muestra_dos;
      this.form.cumpleMuestraTres =
        this.ensayoCargado.cumple_muestra_tres == 1
          ? true
          : this.ensayoCargado.cumple_muestra_tres;
      this.form.cumpleMuestraCuatro =
        this.ensayoCargado.cumple_muestra_cuatro == 1
          ? true
          : this.ensayoCargado.cumple_muestra_cuatro;
      this.form.velocidadMuestraUno =
        this.ensayoCargado.velocidad_muestra_uno == 1
          ? true
          : this.ensayoCargado.velocidad_muestra_uno;
      this.form.velocidadMuestraDos =
        this.ensayoCargado.velocidad_muestra_dos == 1
          ? true
          : this.ensayoCargado.velocidad_muestra_dos;
      this.form.velocidadMuestraTres =
        this.ensayoCargado.velocidad_muestra_tres == 1
          ? true
          : this.ensayoCargado.velocidad_muestra_tres;
      this.form.velocidadMuestraCuatro =
        this.ensayoCargado.velocidad_muestra_cuatro == 1
          ? true
          : this.ensayoCargado.velocidad_muestra_cuatro;
    },
  },
  computed: {
    esClickeable: function () {
      return {
        "no-click": this.visualizacion === "ver",
      };
    },
  },
  watch: {
    "form.volumenMetroCubicoMuestraUno": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraUno);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraUno);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraUno = "---";
      } else {
        this.form.densidadMuestraUno = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.masaCorregidaMuestraUno": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraUno);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraUno);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraUno = "---";
      } else {
        this.form.densidadMuestraUno = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.masaCorregidaMuestraDos": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraDos);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraDos);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraDos = "---";
      } else {
        this.form.densidadMuestraDos = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.volumenMetroCubicoMuestraDos": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraDos);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraDos);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraDos = "---";
      } else {
        this.form.densidadMuestraDos = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.masaCorregidaMuestraTres": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraTres);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraTres);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraTres = "---";
      } else {
      }
      this.form.densidadMuestraTres = parseInt(
        Math.round(dUno / dDos / 10) * 10
      );
    },
    "form.volumenMetroCubicoMuestraTres": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraTres);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraTres);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraTres = "---";
      } else {
        this.form.densidadMuestraTres = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.masaCorregidaMuestraCuatro": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraCuatro);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraCuatro);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraCuatro = "---";
      } else {
        this.form.densidadMuestraCuatro = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.volumenMetroCubicoMuestraCuatro": function (newVal, oldVal) {
      var dUno = parseFloat(this.form.masaCorregidaMuestraCuatro);
      var dDos = parseFloat(this.form.volumenMetroCubicoMuestraCuatro);
      if (isNaN(dUno) || isNaN(dDos)) {
        this.form.densidadMuestraCuatro = "---";
      } else {
        this.form.densidadMuestraCuatro = parseInt(
          Math.round(dUno / dDos / 10) * 10
        );
      }
    },
    "form.OTT": function (newVal, oldVal) {
      this.ordenSeleccionada = this.ordenes.filter((orden) => {
        return orden.num_ott == newVal;
      });
      if (this.ordenSeleccionada.length != 0) {
        this.ordenSeleccionada = this.ordenSeleccionada[0];
        this.form.fechaConfeccionMuestraUno = this.ordenSeleccionada.fecha_confeccion;
        this.form.fechaConfeccionMuestraDos = this.ordenSeleccionada.fecha_confeccion;
        this.form.fechaConfeccionMuestraTres = this.ordenSeleccionada.fecha_confeccion;
        this.form.fechaConfeccionMuestraCuatro = this.ordenSeleccionada.fecha_confeccion;
        this.form.numIngreso = this.ordenSeleccionada.num_ingreso;
      }
    },
    "form.fechaEnsayoMuestraUno": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraUno) &&
        patronFecha.test(this.form.fechaConfeccionMuestraUno)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraUno, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraUno = diff;
      }
    },
    "form.fechaConfeccionMuestraUno": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraUno) &&
        patronFecha.test(this.form.fechaConfeccionMuestraUno)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraUno, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraUno = diff;
      }
    },
    "form.fechaEnsayoMuestraDos": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraDos) &&
        patronFecha.test(this.form.fechaConfeccionMuestraDos)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraDos, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraDos, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraDos = diff;
      }
    },
    "form.fechaConfeccionMuestraDos": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraUno) &&
        patronFecha.test(this.form.fechaConfeccionMuestraDos)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraDos, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraDos = diff;
      }
    },
    "form.fechaEnsayoMuestraTres": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraTres) &&
        patronFecha.test(this.form.fechaConfeccionMuestraTres)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraTres, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraTres, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraTres = diff;
      }
    },
    "form.fechaConfeccionMuestraTres": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraTres) &&
        patronFecha.test(this.form.fechaConfeccionMuestraTres)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraTres, "DD-MM-YYYY");
        var date2 = moment(this.form.fechaConfeccionMuestraTres, "DD-MM-YYYY");
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraTres = diff;
      }
    },
    "form.fechaEnsayoMuestraCuatro": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraCuatro) &&
        patronFecha.test(this.form.fechaConfeccionMuestraCuatro)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraCuatro, "DD-MM-YYYY");
        var date2 = moment(
          this.form.fechaConfeccionMuestraCuatro,
          "DD-MM-YYYY"
        );
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraCuatro = diff;
      }
    },
    "form.fechaConfeccionMuestraCuatro": function (newVal, oldVal) {
      var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;
      if (
        patronFecha.test(this.form.fechaEnsayoMuestraCuatro) &&
        patronFecha.test(this.form.fechaConfeccionMuestraCuatro)
      ) {
        var date1 = moment(this.form.fechaEnsayoMuestraCuatro, "DD-MM-YYYY");
        var date2 = moment(
          this.form.fechaConfeccionMuestraCuatro,
          "DD-MM-YYYY"
        );
        var diff = date1.diff(date2, "days");
        this.form.edadDiasMuestraCuatro = diff;
      }
    },
    "form.masaMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraUno.toString().replace(",", ".");
      this.form.masaMuestraUno = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraUno
        .toString()
        .replace(",", ".");
      this.form.errorMuestraUno = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraUno) &&
        !isNaN(this.form.errorMuestraUno) &&
        this.form.masaMuestraUno.trim() != "" &&
        this.form.errorMuestraUno.trim() != ""
      ) {
        this.form.masaCorregidaMuestraUno = (
          parseFloat(this.form.masaMuestraUno) +
          parseFloat(this.form.errorMuestraUno)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraUno = "---";
      }
    },
    "form.errorMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraUno.toString().replace(",", ".");
      this.form.masaMuestraUno = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraUno
        .toString()
        .replace(",", ".");
      this.form.errorMuestraUno = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraUno) &&
        !isNaN(this.form.errorMuestraUno) &&
        this.form.masaMuestraUno.trim() != "" &&
        this.form.errorMuestraUno.trim() != ""
      ) {
        this.form.masaCorregidaMuestraUno = (
          parseFloat(this.form.masaMuestraUno) +
          parseFloat(this.form.errorMuestraUno)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraUno = "---";
      }
    },
    "form.masaMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraDos.toString().replace(",", ".");
      this.form.masaMuestraDos = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraDos
        .toString()
        .replace(",", ".");
      this.form.errorMuestraDos = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraDos) &&
        !isNaN(this.form.errorMuestraDos) &&
        this.form.masaMuestraDos.trim() != "" &&
        this.form.errorMuestraDos.trim() != ""
      ) {
        this.form.masaCorregidaMuestraDos = (
          parseFloat(this.form.masaMuestraDos) +
          parseFloat(this.form.errorMuestraDos)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraDos = "---";
      }
    },
    "form.errorMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraDos.toString().replace(",", ".");
      this.form.masaMuestraDos = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraDos
        .toString()
        .replace(",", ".");
      this.form.errorMuestraDos = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraDos) &&
        !isNaN(this.form.errorMuestraDos) &&
        this.form.masaMuestraDos.trim() != "" &&
        this.form.errorMuestraDos.trim() != ""
      ) {
        this.form.masaCorregidaMuestraDos = (
          parseFloat(this.form.masaMuestraDos) +
          parseFloat(this.form.errorMuestraDos)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraDos = "---";
      }
    },
    "form.masaMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraTres
        .toString()
        .replace(",", ".");
      this.form.masaMuestraTres = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraTres
        .toString()
        .replace(",", ".");
      this.form.errorMuestraTres = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraTres) &&
        !isNaN(this.form.errorMuestraTres) &&
        this.form.masaMuestraTres.trim() != "" &&
        this.form.errorMuestraTres.trim() != ""
      ) {
        this.form.masaCorregidaMuestraTres = (
          parseFloat(this.form.masaMuestraTres) +
          parseFloat(this.form.errorMuestraTres)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraTres = "---";
      }
    },
    "form.errorMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraTres
        .toString()
        .replace(",", ".");
      this.form.masaMuestraTres = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraTres
        .toString()
        .replace(",", ".");
      this.form.errorMuestraTres = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraTres) &&
        !isNaN(this.form.errorMuestraTres) &&
        this.form.masaMuestraTres.trim() != "" &&
        this.form.errorMuestraTres.trim() != ""
      ) {
        this.form.masaCorregidaMuestraTres = (
          parseFloat(this.form.masaMuestraTres) +
          parseFloat(this.form.errorMuestraTres)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraTres = "---";
      }
    },
    "form.masaMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.masaMuestraCuatro = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.errorMuestraCuatro = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraCuatro) &&
        !isNaN(this.form.errorMuestraCuatro) &&
        this.form.masaMuestraCuatro.trim() != "" &&
        this.form.errorMuestraCuatro.trim() != ""
      ) {
        this.form.masaCorregidaMuestraCuatro = (
          parseFloat(this.form.masaMuestraCuatro) +
          parseFloat(this.form.errorMuestraCuatro)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraCuatro = "---";
      }
    },
    "form.errorMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.masaMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.masaMuestraCuatro = commaReplaced;
      let commaReplacedDos = this.form.errorMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.errorMuestraCuatro = commaReplacedDos;
      if (
        !isNaN(this.form.masaMuestraCuatro) &&
        !isNaN(this.form.errorMuestraCuatro) &&
        this.form.masaMuestraCuatro.trim() != "" &&
        this.form.errorMuestraCuatro.trim() != ""
      ) {
        this.form.masaCorregidaMuestraCuatro = (
          parseFloat(this.form.masaMuestraCuatro) +
          parseFloat(this.form.errorMuestraCuatro)
        ).toFixed(2);
      } else {
        this.form.masaCorregidaMuestraCuatro = "---";
      }
    },
    "form.dUnoMuestraUnoCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraUnoCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraUnoCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraUnoCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraUnoCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraUnoCorregida;
      var dDos = this.form.dDosMuestraUnoCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraUnoCorregida);
        dDos = parseFloat(this.form.dDosMuestraUnoCorregida);
        this.form.areaMuestraUno = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraUno = "---";
      }
    },
    "form.dDosMuestraUnoCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraUnoCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraUnoCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraUnoCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraUnoCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraUnoCorregida;
      var dDos = this.form.dDosMuestraUnoCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraUnoCorregida);
        dDos = parseFloat(this.form.dDosMuestraUnoCorregida);
        this.form.areaMuestraUno = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraUno = "---";
      }
    },
    "form.dUnoMuestraDosCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraDosCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraDosCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraDosCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraDosCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraDosCorregida;
      var dDos = this.form.dDosMuestraDosCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraDosCorregida);
        dDos = parseFloat(this.form.dDosMuestraDosCorregida);
        this.form.areaMuestraDos = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraDos = "---";
      }
    },
    "form.dDosMuestraDosCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraDosCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraDosCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraDosCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraDosCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraDosCorregida;
      var dDos = this.form.dDosMuestraDosCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraDosCorregida);
        dDos = parseFloat(this.form.dDosMuestraDosCorregida);
        this.form.areaMuestraDos = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraDos = "---";
      }
    },
    "form.dUnoMuestraTresCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraTresCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraTresCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraTresCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraTresCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraTresCorregida;
      var dDos = this.form.dDosMuestraTresCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraTresCorregida);
        dDos = parseFloat(this.form.dDosMuestraTresCorregida);
        this.form.areaMuestraTres = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraTres = "---";
      }
    },
    "form.dDosMuestraTresCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraTresCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraTresCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraTresCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraTresCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraTresCorregida;
      var dDos = this.form.dDosMuestraTresCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraTresCorregida);
        dDos = parseFloat(this.form.dDosMuestraTresCorregida);
        this.form.areaMuestraTres = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraTres = "---";
      }
    },
    "form.dUnoMuestraCuatroCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraCuatroCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraCuatroCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraCuatroCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraCuatroCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraCuatroCorregida;
      var dDos = this.form.dDosMuestraCuatroCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraCuatroCorregida);
        dDos = parseFloat(this.form.dDosMuestraCuatroCorregida);
        this.form.areaMuestraCuatro = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraCuatro = "---";
      }
    },
    "form.dDosMuestraCuatroCorregida": function (newVal, oldVal) {
      let commaReplaced = this.form.dUnoMuestraCuatroCorregida
        .toString()
        .replace(",", ".");
      this.form.dUnoMuestraCuatroCorregida = commaReplaced;
      let commaReplacedDos = this.form.dDosMuestraCuatroCorregida
        .toString()
        .replace(",", ".");
      this.form.dDosMuestraCuatroCorregida = commaReplacedDos;
      var dUno = this.form.dUnoMuestraCuatroCorregida;
      var dDos = this.form.dDosMuestraCuatroCorregida;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.dUnoMuestraCuatroCorregida);
        dDos = parseFloat(this.form.dDosMuestraCuatroCorregida);
        this.form.areaMuestraCuatro = parseFloat(
          (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(2)
        ).toString();
      } else {
        this.form.areaMuestraCuatro = "---";
      }
    },
    "form.cargaEnsayoMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMuestraUno
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMuestraUno = commaReplaced;
      var carga = this.form.cargaEnsayoMuestraUno;
      if (!isNaN(carga) && carga.trim() != "") {
        carga = parseFloat(this.form.cargaEnsayoMuestraUno);
        this.form.cargaEnsayoMilMuestraUno = 1000 * carga;
      } else {
        this.form.cargaEnsayoMilMuestraUno = "---";
      }
    },
    "form.cargaEnsayoMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMuestraDos
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMuestraDos = commaReplaced;
      var carga = this.form.cargaEnsayoMuestraDos;
      if (!isNaN(carga) && carga.trim() != "") {
        carga = parseFloat(this.form.cargaEnsayoMuestraDos);
        this.form.cargaEnsayoMilMuestraDos = 1000 * carga;
      } else {
        this.form.cargaEnsayoMilMuestraDos = "---";
      }
    },
    "form.cargaEnsayoMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMuestraTres
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMuestraTres = commaReplaced;
      var carga = this.form.cargaEnsayoMuestraTres;
      if (!isNaN(carga) && carga.trim() != "") {
        carga = parseFloat(this.form.cargaEnsayoMuestraTres);
        this.form.cargaEnsayoMilMuestraTres = 1000 * carga;
      } else {
        this.form.cargaEnsayoMilMuestraTres = "---";
      }
    },
    "form.cargaEnsayoMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMuestraCuatro = commaReplaced;
      var carga = this.form.cargaEnsayoMuestraCuatro;
      if (!isNaN(carga) && carga.trim() != "") {
        carga = parseFloat(this.form.cargaEnsayoMuestraCuatro);
        this.form.cargaEnsayoMilMuestraCuatro = 1000 * carga;
      } else {
        this.form.cargaEnsayoMilMuestraCuatro = "---";
      }
    },
    "form.cargaEnsayoMilMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraUno
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraUno = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraUno
        .toString()
        .replace(",", ".");
      this.form.areaMuestraUno = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraUno;
      var dDos = this.form.areaMuestraUno;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraUno);
        dDos = parseFloat(this.form.areaMuestraUno);
        this.form.resistenciaCompresionMuestraUno = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestrUnos = "---";
      }
    },
    "form.areaMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraUno
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraUno = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraUno
        .toString()
        .replace(",", ".");
      this.form.areaMuestraUno = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraUno;
      var dDos = this.form.areaMuestraUno;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraUno);
        dDos = parseFloat(this.form.areaMuestraUno);
        this.form.resistenciaCompresionMuestraUno = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestrUnos = "---";
      }
    },
    "form.cargaEnsayoMilMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraDos
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraDos = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraDos
        .toString()
        .replace(",", ".");
      this.form.areaMuestraDos = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraDos;
      var dDos = this.form.areaMuestraDos;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraDos);
        dDos = parseFloat(this.form.areaMuestraDos);
        this.form.resistenciaCompresionMuestraDos = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraDos = "---";
      }
    },
    "form.areaMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraDos
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraDos = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraDos
        .toString()
        .replace(",", ".");
      this.form.areaMuestraDos = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraDos;
      var dDos = this.form.areaMuestraDos;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraDos);
        dDos = parseFloat(this.form.areaMuestraDos);
        this.form.resistenciaCompresionMuestraDos = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraDos = "---";
      }
    },
    "form.cargaEnsayoMilMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraTres
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraTres = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraTres
        .toString()
        .replace(",", ".");
      this.form.areaMuestraTres = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraTres;
      var dDos = this.form.areaMuestraTres;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraTres);
        dDos = parseFloat(this.form.areaMuestraTres);
        this.form.resistenciaCompresionMuestraTres = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraTres = "---";
      }
    },
    "form.areaMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraTres
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraTres = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraTres
        .toString()
        .replace(",", ".");
      this.form.areaMuestraTres = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraTres;
      var dDos = this.form.areaMuestraTres;
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraTres);
        dDos = parseFloat(this.form.areaMuestraTres);
        this.form.resistenciaCompresionMuestraTres = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraTres = "---";
      }
    },
    "form.cargaEnsayoMilMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraCuatro = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.areaMuestraCuatro = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraCuatro.toString();
      var dDos = this.form.areaMuestraCuatro.toString();
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraCuatro);
        dDos = parseFloat(this.form.areaMuestraCuatro);
        this.form.resistenciaCompresionMuestraCuatro = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraCuatro = "---";
      }
    },
    "form.areaMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.cargaEnsayoMilMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.cargaEnsayoMilMuestraCuatro = commaReplaced;
      let commaReplacedDos = this.form.areaMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.areaMuestraCuatro = commaReplacedDos;
      var dUno = this.form.cargaEnsayoMilMuestraCuatro.toString();
      var dDos = this.form.areaMuestraCuatro.toString();
      if (
        !isNaN(dUno) &&
        !isNaN(dDos) &&
        dUno.trim() != "" &&
        dDos.trim() != ""
      ) {
        dUno = parseFloat(this.form.cargaEnsayoMilMuestraCuatro);
        dDos = parseFloat(this.form.areaMuestraCuatro);
        this.form.resistenciaCompresionMuestraCuatro = (dUno / dDos).toFixed(1);
      } else {
        this.form.resistenciaCompresionMuestraCuatro = "---";
      }
    },
    "form.resistenciaCompresionMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.resistenciaCompresionMuestraUno
        .toString()
        .replace(",", ".");
      this.form.resistenciaCompresionMuestraUno = commaReplaced;
      var dUno = this.form.resistenciaCompresionMuestraUno;
      if (!isNaN(dUno) && dUno.trim() != "") {
        dUno = parseFloat(this.form.resistenciaCompresionMuestraUno);
        if (Math.round(dUno * 100000) <= Math.round(parseFloat(20) * 100000)) {
          this.form.factoresConversionMuestraUno = this.factoresConversion[
            "20"
          ];
          this.form.resistenciaCorregidaMuestraUno = (
            this.factoresConversion["20"] * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(20) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(25) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            20,
            25,
            this.factoresConversion["20"],
            this.factoresConversion["25"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(25) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(30) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            25,
            30,
            this.factoresConversion["25"],
            this.factoresConversion["30"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(30) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(35) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            30,
            35,
            this.factoresConversion["30"],
            this.factoresConversion["35"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(35) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(40) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            35,
            40,
            this.factoresConversion["35"],
            this.factoresConversion["40"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(40) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(45) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            40,
            45,
            this.factoresConversion["40"],
            this.factoresConversion["45"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(45) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.calculaFactorCompresion(
            45,
            50,
            this.factoresConversion["45"],
            this.factoresConversion["50"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraUno = this.factoresConversion[
            "50"
          ];
          this.form.resistenciaCorregidaMuestraUno = (
            this.form.factoresConversionMuestraUno * dUno
          ).toFixed(1);
        }
      } else {
        this.form.factoresConversionMuestraUno = "---";
        this.form.resistenciaCorregidaMuestraUno = "---";
      }
    },
    "form.resistenciaCompresionMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.resistenciaCompresionMuestraDos
        .toString()
        .replace(",", ".");
      this.form.resistenciaCompresionMuestraDos = commaReplaced;
      var dUno = this.form.resistenciaCompresionMuestraDos;
      if (!isNaN(dUno) && dUno.trim() != "") {
        dUno = parseFloat(this.form.resistenciaCompresionMuestraDos);
        if (Math.round(dUno * 100000) <= Math.round(parseFloat(20) * 100000)) {
          this.form.factoresConversionMuestraDos = this.factoresConversion[
            "20"
          ];
          this.form.resistenciaCorregidaMuestraDos = (
            this.factoresConversion["20"] * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(20) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(25) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            20,
            25,
            this.factoresConversion["20"],
            this.factoresConversion["25"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(25) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(30) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            25,
            30,
            this.factoresConversion["25"],
            this.factoresConversion["30"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(30) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(35) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            30,
            35,
            this.factoresConversion["30"],
            this.factoresConversion["35"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(35) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(40) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            35,
            40,
            this.factoresConversion["35"],
            this.factoresConversion["40"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(40) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(45) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            40,
            45,
            this.factoresConversion["40"],
            this.factoresConversion["45"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(45) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.calculaFactorCompresion(
            45,
            50,
            this.factoresConversion["45"],
            this.factoresConversion["50"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraDos = this.factoresConversion[
            "50"
          ];
          this.form.resistenciaCorregidaMuestraDos = (
            this.form.factoresConversionMuestraDos * dUno
          ).toFixed(1);
        }
      } else {
        this.form.factoresConversionMuestraDos = "---";
        this.form.resistenciaCorregidaMuestraDos = "---";
      }
    },
    "form.resistenciaCompresionMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.resistenciaCompresionMuestraTres
        .toString()
        .replace(",", ".");
      this.form.resistenciaCompresionMuestraTres = commaReplaced;
      var dUno = this.form.resistenciaCompresionMuestraTres;
      if (!isNaN(dUno) && dUno.trim() != "") {
        dUno = parseFloat(this.form.resistenciaCompresionMuestraTres);
        if (Math.round(dUno * 100000) <= Math.round(parseFloat(20) * 100000)) {
          this.form.factoresConversionMuestraTres = this.factoresConversion[
            "20"
          ];
          this.form.resistenciaCorregidaMuestraTres = (
            this.factoresConversion["20"] * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(20) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(25) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            20,
            25,
            this.factoresConversion["20"],
            this.factoresConversion["25"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(25) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(30) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            25,
            30,
            this.factoresConversion["25"],
            this.factoresConversion["30"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(30) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(35) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            30,
            35,
            this.factoresConversion["30"],
            this.factoresConversion["35"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(35) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(40) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            35,
            40,
            this.factoresConversion["35"],
            this.factoresConversion["40"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(40) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(45) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            40,
            45,
            this.factoresConversion["40"],
            this.factoresConversion["45"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(45) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.calculaFactorCompresion(
            45,
            50,
            this.factoresConversion["45"],
            this.factoresConversion["50"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraTres = this.factoresConversion[
            "50"
          ];
          this.form.resistenciaCorregidaMuestraTres = (
            this.form.factoresConversionMuestraTres * dUno
          ).toFixed(1);
        }
      } else {
        this.form.factoresConversionMuestraTres = "---";
        this.form.resistenciaCorregidaMuestraTres = "---";
      }
    },
    "form.resistenciaCompresionMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.resistenciaCompresionMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.resistenciaCompresionMuestraCuatro = commaReplaced;
      var dUno = this.form.resistenciaCompresionMuestraCuatro;
      if (!isNaN(dUno) && dUno.trim() != "") {
        dUno = parseFloat(this.form.resistenciaCompresionMuestraCuatro);
        if (Math.round(dUno * 100000) <= Math.round(parseFloat(20) * 100000)) {
          this.form.factoresConversionMuestraCuatro = this.factoresConversion[
            "20"
          ];
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.factoresConversion["20"] * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(20) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(25) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            20,
            25,
            this.factoresConversion["20"],
            this.factoresConversion["25"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(25) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(30) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            25,
            30,
            this.factoresConversion["25"],
            this.factoresConversion["30"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(30) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(35) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            30,
            35,
            this.factoresConversion["30"],
            this.factoresConversion["35"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(35) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(40) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            35,
            40,
            this.factoresConversion["35"],
            this.factoresConversion["40"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(40) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(45) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            40,
            45,
            this.factoresConversion["40"],
            this.factoresConversion["45"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(45) * 100000) &&
          Math.round(dUno * 100000) <= Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.calculaFactorCompresion(
            45,
            50,
            this.factoresConversion["45"],
            this.factoresConversion["50"],
            dUno
          );
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        } else if (
          Math.round(dUno * 100000) > Math.round(parseFloat(50) * 100000)
        ) {
          this.form.factoresConversionMuestraCuatro = this.factoresConversion[
            "50"
          ];
          this.form.resistenciaCorregidaMuestraCuatro = (
            this.form.factoresConversionMuestraCuatro * dUno
          ).toFixed(1);
        }
      } else {
        this.form.factoresConversionMuestraCuatro = "---";
        this.form.resistenciaCorregidaMuestraCuatro = "---";
      }
    },
    "form.errorCientoCincuentaMm": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dUnoMuestraUno": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dDosMuestraUno": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dUnoMuestraDos": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dDosMuestraDos": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dUnoMuestraTres": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dDosMuestraTres": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dUnoMuestraCuatro": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.dDosMuestraCuatro": function (newVal, oldVal) {
      this.calculaDiametroCorregido();
    },
    "form.errorTrescientosMm": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hUnoMuestraUno": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hDosMuestraUno": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hUnoMuestraDos": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hDosMuestraDos": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hUnoMuestraTres": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hDosMuestraTres": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hUnoMuestraCuatro": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.hDosMuestraCuatro": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.refrentadoUno": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.refrentadoDos": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.refrentadoTres": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.refrentadoCuatro": function (newVal, oldVal) {
      this.calculaLongitudCorregida();
    },
    "form.volumenMuestraUno": function (newVal, oldVal) {
      let commaReplaced = this.form.volumenMuestraUno
        .toString()
        .replace(",", ".");
      this.form.volumenMuestraUno = commaReplaced;
      if (
        !isNaN(this.form.volumenMuestraUno) &&
        this.form.volumenMuestraUno.trim() != ""
      ) {
        this.form.volumenMetroCubicoMuestraUno = (
          parseFloat(this.form.volumenMuestraUno) / 1000000000
        )
          .toFixed(12)
          .toString();
      } else {
        this.form.volumenMetroCubicoMuestraUno = "---";
      }
    },
    "form.volumenMuestraDos": function (newVal, oldVal) {
      let commaReplaced = this.form.volumenMuestraDos
        .toString()
        .replace(",", ".");
      this.form.volumenMuestraDos = commaReplaced;
      if (
        !isNaN(this.form.volumenMuestraDos) &&
        this.form.volumenMuestraDos.trim() != ""
      ) {
        this.form.volumenMetroCubicoMuestraDos = (
          parseFloat(this.form.volumenMuestraDos) / 100000000
        )
          .toFixed(12)
          .toString();
      } else {
        this.form.volumenMetroCubicoMuestraDos = "---";
      }
    },
    "form.volumenMuestraTres": function (newVal, oldVal) {
      let commaReplaced = this.form.volumenMuestraTres
        .toString()
        .replace(",", ".");
      this.form.volumenMuestraTres = commaReplaced;
      if (
        !isNaN(this.form.volumenMuestraTres) &&
        this.form.volumenMuestraTres.trim() != ""
      ) {
        this.form.volumenMetroCubicoMuestraTres = (
          parseFloat(this.form.volumenMuestraTres) / 100000000
        )
          .toFixed(12)
          .toString();
      } else {
        this.form.volumenMetroCubicoMuestraTres = "---";
      }
    },
    "form.volumenMuestraCuatro": function (newVal, oldVal) {
      let commaReplaced = this.form.volumenMuestraCuatro
        .toString()
        .replace(",", ".");
      this.form.volumenMuestraCuatro = commaReplaced;
      if (
        !isNaN(this.form.volumenMuestraCuatro) &&
        this.form.volumenMuestraCuatro.trim() != ""
      ) {
        this.form.volumenMetroCubicoMuestraCuatro = (
          parseFloat(this.form.volumenMuestraCuatro) / 100000000
        )
          .toFixed(12)
          .toString();
      } else {
        this.form.volumenMetroCubicoMuestraCuatro = "---";
      }
    },
  },
};
</script>

<style scoped lang="scss">
.no-click {
  pointer-events: none;
  /deep/ .el-input__inner {
    background-color: #eee !important;
  }
}
.contenedor-vue {
  background-color: #f5f5f5;
  padding: 10px;
  line-height: 20px;
  height: auto;
  overflow: auto;
  /deep/ .el-form-item__content {
    line-height: 20px;
  }
  /deep/ .el-form-item__label {
    line-height: 20px;
  }
  /deep/ .el-input__inner {
    line-height: 20px;
    height: 20px;
  }
  /deep/ .el-col {
    padding: 3px;
  }
  /deep/ .el-divider--horizontal {
    display: block;
    height: 1px;
    width: 100%;
    margin: 5px 0;
  }
  /deep/ .el-form-item__error {
    top: 10px;
    font-size: 14px;
    padding-left: 15px;
    color: #ffffff00;
    z-index: -1;
  }
  /deep/ .el-form-item__label {
    width: auto !important;
  }
  /deep/ .el-form-item__content {
    margin: 0px !important;
    display: flex;
  }
  /deep/ .el-form-item {
    white-space: nowrap;
    margin-bottom: 0px;
  }
  /deep/ .el-input--mini .el-input__icon {
    line-height: 20px;
  }
  .texto {
    min-width: 200px;
    width: 28%;
    display: flex;
    border-style: none solid none none;
    border-color: #adb0b7;
    border-width: 1px;
    padding: 0px 10px;
  }
  .texto-ancho-full {
    min-width: 200px;
    width: 100%;
    display: flex;
    border-style: none solid none none;
    border-color: #adb0b7;
    border-width: 1px;
    padding: 0px 10px;
  }
  .texto-muestras {
    display: flex;
    width: 18%;
    border-style: none solid none none;
    border-color: #484b50;
    border-width: 1px;
    padding: 0px 10px;
  }
  .texto-right {
    /deep/ .el-input__inner {
      text-align: right;
    }
  }
  .texto-derecha {
    margin-left: auto;
  }
  .muestras {
    .el-col {
      flex-wrap: nowrap;
      display: flex;
      border-style: solid none none none;
      border-color: #adb0b7;
      border-width: 1px;
    }
  }
  .contenedor-botones {
    padding-top: 20px;
  }
}
</style>