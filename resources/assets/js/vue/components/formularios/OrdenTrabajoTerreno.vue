<template>
  <div class="contenedor-vue">
    <el-form
      ref="formularioOtt"
      :model="form"
      :rules="reglas"
      label-width="150px"
      :class="esClickeable"
    >
      <!-- Cabecera / OTT -->

      <table>
        <tr>
          <td rowspan="2" style="width: 250px" align="left" valign="top">
            <img src="/images/logo-lacem.png" style="width: 100px" />
          </td>
          <td colspan="3" align="center" style="width: 500px">
            <b>Orden de Trabajo de Terreno</b><br />
            <b
              >Extracción de Muestras de Mortero, Hormigón Fresco y
              Endurecido</b
            >
          </td>
          <td align="right">
            Página<br />
            1 de 1
          </td>
        </tr>
        <tr>
          <td align="left" style="width: 250px">
            Revisión&nbsp;&nbsp;&nbsp;011
          </td>
          <td>Código&nbsp;&nbsp;&nbsp;FOCC-007-002</td>
          <td colspan="2" align="right">
            Fecha aprobación:&nbsp;&nbsp;&nbsp;13 de Febrero de 2019
          </td>
        </tr>
      </table>

      <el-divider class="el-divider-5" />

      <!-- CLIENTE OBRA / N° OTT -->
      <el-row class="margin-b-5">
        <el-col :span="14" class="padding-5">
          <el-form-item label="N° Cliente Obra" prop="numClienteObra">
            <el-input v-model="form.numClienteObra"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="10" class="padding-5 una-linea">
          <el-form-item
            class="item-no-margin cantidad-otros"
            label="OTT N° HF - "
            prop="numOtt"
          >
            <!-- <label class="el-form-item__label" style="width: 150px;">N° OTT</label> -->
            <!-- <el-input class="no-click" v-model="form.numOtt"></el-input> -->
            <el-input class="" v-model="form.numOtt"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <!-- NOMBRE CLIENTE -->
      <el-row class="margin-b-5">
        <el-col :span="24" class="padding-5">
          <el-form-item label="Cliente" prop="nombreCliente">
            <el-input v-model="form.nombreCliente"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <!-- OBRA / FONO OBRA -->
      <el-row class="margin-b-5">
        <el-col :span="15" class="padding-5">
          <el-form-item label="Obra" prop="nombreObra">
            <el-input v-model="form.nombreObra"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="9" class="padding-5">
          <el-form-item
            class="item-no-margin cantidad-otros"
            label="Fono Obra"
            prop="fonoObra"
          >
            <el-input v-model="form.fonoObra"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <!-- DIRECCION / ENCARGADO OBRA -->
      <el-row class="margin-b-5">
        <el-col :span="15" class="padding-5">
          <el-form-item label="Dirección Obra" prop="direccionObra">
            <el-input v-model="form.direccionObra"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="9" class="padding-5">
          <el-form-item
            class="item-no-margin cantidad-otros"
            label="Encargado Obra"
            prop="encargadoObra"
          >
            <el-input v-model="form.encargadoObra"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <!-- MUESTREO HORMIGON / MORTERO / SECCION TESTIGOS / SECCION ARIDOS-->
      <!-- <el-row class="margin-b-5">
                <el-col :span="24" class="padding-5">
                    <el-form-item label="Muestreo de:" prop="muestreoDe">
                        <el-radio v-model="form.muestreoDe" label="hormigon">Hormig&oacute;n</el-radio>
                        <el-radio v-model="form.muestreoDe" label="mortero">Mortero</el-radio>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-5"/>
            <el-row class="margin-b-5">
                <el-col :span="6" class="padding-5">
                    <el-form-item class="form-item-no-label" prop="seccionTestigosHabilitada">
                        <el-checkbox v-model="form.seccionTestigosHabilitada">Secci&oacute;n Testigos</el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="6" class="padding-5">
                    <el-form-item class="form-item-no-label" prop="seccionAridosHabilitada">
                        <el-checkbox v-model="form.seccionAridosHabilitada">Secci&oacute;n &Aacute;ridos</el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="6" class="padding-5">
                    <el-form-item class="form-item-no-label" prop="seccionOtrosHabilitada">
                        <el-checkbox v-model="form.seccionOtrosHabilitada">Secci&oacute;n Otros</el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="6" class="padding-5">
                    <el-form-item class="form-item-no-label" prop="seccionRetiroMuestrasHabilitada">
                        <el-checkbox v-model="form.seccionRetiroMuestrasHabilitada">Secci&oacute;n Retiro de Muestras</el-checkbox>
                    </el-form-item>
                </el-col>
            </el-row> -->
      <el-row class="margin-b-5">
        <el-col :span="24" class="padding-5">
          <el-form-item label="Muestreo de:" prop="muestreoDe">
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'hormigon')"
              v-model="form.muestreoDe"
              label="hormigon"
              >Hormig&oacute;n</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'mortero')"
              v-model="form.muestreoDe"
              label="mortero"
              >Mortero</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'seccionTestigos')"
              v-model="form.muestreoDe"
              label="seccionTestigos"
              >Secci&oacute;n Testigos</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'seccionAridos')"
              v-model="form.muestreoDe"
              label="seccionAridos"
              >Secci&oacute;n &Aacute;ridos</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'seccionOtros')"
              v-model="form.muestreoDe"
              label="seccionOtros"
              >Secci&oacute;n Otros</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('muestreoDe', 'seccionRetiro')"
              v-model="form.muestreoDe"
              label="seccionRetiro"
              >Secci&oacute;n Retiro de Muestras</el-radio
            >
          </el-form-item>
        </el-col>
        <!--
        <el-col :span="3" class="padding-5">
          <el-form-item
            class="form-item-no-label"
            prop="seccionTestigosHabilitada"
          >
            <el-checkbox
              v-model="form.seccionTestigosHabilitada"
              :disabled="
                form.seccionAridosHabilitada ||
                form.seccionOtrosHabilitada ||
                form.seccionRetiroMuestrasHabilitada
              "
            >
              Secci&oacute;n Testigos</el-checkbox
            >
          </el-form-item>
        </el-col>
        <el-col :span="3" class="padding-5">
          <el-form-item
            class="form-item-no-label"
            prop="seccionAridosHabilitada"
          >
            <el-checkbox
              v-model="form.seccionAridosHabilitada"
              :disabled="
                form.seccionTestigosHabilitada ||
                form.seccionOtrosHabilitada ||
                form.seccionRetiroMuestrasHabilitada
              "
            >
              Secci&oacute;n &Aacute;ridos</el-checkbox
            >
          </el-form-item>
        </el-col>
        <el-col :span="3" class="padding-5">
          <el-form-item
            class="form-item-no-label"
            prop="seccionOtrosHabilitada"
          >
            <el-checkbox
              v-model="form.seccionOtrosHabilitada"
              :disabled="
                form.seccionTestigosHabilitada ||
                form.seccionAridosHabilitada ||
                form.seccionRetiroMuestrasHabilitada
              "
            >
              Secci&oacute;n Otros</el-checkbox
            >
          </el-form-item>
        </el-col>
        <el-col :span="5" class="padding-5">
          <el-form-item
            class="form-item-no-label"
            prop="seccionRetiroMuestrasHabilitada"
          >
            <el-checkbox
              v-model="form.seccionRetiroMuestrasHabilitada"
              :disabled="
                form.seccionTestigosHabilitada ||
                form.seccionAridosHabilitada ||
                form.seccionOtrosHabilitada
              "
            >
              Secci&oacute;n Retiro de Muestras</el-checkbox
            >
          </el-form-item>
        </el-col>
        -->
      </el-row>
      <!-- <el-divider class="el-divider-5"/>
            <el-row class="margin-b-5">
            </el-row> -->
      <el-divider class="el-divider-5" />
      <el-row class="margin-b-5">
        <el-col :span="unaDosColumnas" class="padding-5">
          <el-form-item label="Extracción" prop="extraccion">
            <div class="dis-flex-dir-col">
              <el-radio
                @click.native.prevent="clickitem('extraccion', 'camion')"
                v-model="form.extraccion"
                label="camion"
                >Cami&oacute;n</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('extraccion', 'betonera')"
                v-model="form.extraccion"
                label="betonera"
                >Betonera</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('extraccion', 'acopio')"
                v-model="form.extraccion"
                label="acopio"
                >Acopio</el-radio
              >
            </div>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item label="Compactación" prop="">
            <div class="dis-flex-dir-col">
              <el-radio
                @click.native.prevent="clickitem('compactacion', 'apisonado')"
                v-model="form.compactacion"
                label="apisonado"
                >Apisonado</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('compactacion', 'vibrado')"
                v-model="form.compactacion"
                label="vibrado"
                >Vibrado</el-radio
              >
            </div>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <!-- <div class="una-linea dis-flex-dir-row">
                        <div class="label-item" style="min-width: 150px;padding-right: 12px;display: flex;">Tipo de Molde (en cm)</div>
                        <div style="display: flex;flex-direction: column;width: 100%;">
                            <el-form-item class="item-no-margin cantidad-otros" label="15x15x15 | 400-01" prop="tipoMoldeUno">
                                <el-input size="mini" v-model="form.tipoMoldeUno"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="20x20x20 | 400-01" prop="tipoMoldeDos">
                                <el-input size="mini" v-model="form.tipoMoldeDos"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="15x30 | 400-02" prop="tipoMoldeTres">
                                <el-input size="mini" v-model="form.tipoMoldeTres"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="4x4x16 | 400-04" prop="tipoMoldeCuatro">
                                <el-input size="mini" v-model="form.tipoMoldeCuatro"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="53x15x15 | 400-03" prop="tipoMoldeCinco">
                                <el-input size="mini" v-model="form.tipoMoldeCinco"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="10x10x10 | 400-06" prop="tipoMoldeSeis">
                                <el-input size="mini" v-model="form.tipoMoldeSeis"></el-input>
                            </el-form-item>
                            <el-form-item class="item-no-margin cantidad-otros" label="15x30 | 400-07" prop="tipoMoldeSiete">
                                <el-input size="mini" v-model="form.tipoMoldeSiete"></el-input>
                            </el-form-item>
                        </div>
                    </div> -->
          <div class="una-linea dis-flex-dir-row">
            <div
              class="label-item"
              style="min-width: 150px; padding-right: 12px; display: flex"
            >
              Tipo de Molde (en cm)
            </div>
            <div style="display: flex; flex-direction: column; width: 100%">
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="15x15x15 | 400-01"
                prop="tipoMoldeUno"
              >
                <el-checkbox v-model="form.tipoMoldeUno"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="20x20x20 | 400-01"
                prop="tipoMoldeDos"
              >
                <el-checkbox v-model="form.tipoMoldeDos"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="15x30 | 400-02"
                prop="tipoMoldeTres"
              >
                <el-checkbox v-model="form.tipoMoldeTres"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="4x4x16 | 400-04"
                prop="tipoMoldeCuatro"
              >
                <el-checkbox v-model="form.tipoMoldeCuatro"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="53x15x15 | 400-03"
                prop="tipoMoldeCinco"
              >
                <el-checkbox v-model="form.tipoMoldeCinco"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="10x10x10 | 400-06"
                prop="tipoMoldeSeis"
              >
                <el-checkbox v-model="form.tipoMoldeSeis"></el-checkbox>
              </el-form-item>
              <el-form-item
                class="item-no-margin cantidad-otros"
                label="15x30 | 400-07"
                prop="tipoMoldeSiete"
              >
                <el-checkbox v-model="form.tipoMoldeSiete"></el-checkbox>
              </el-form-item>
            </div>
          </div>
          <!-- <el-form-item label="Tipo de Molde (en cm)" prop="tipoMolde">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.tipoMoldeUno" class="radio-molde" label="400-01">
                                <div style="display: flex;"><div style="flex-grow: 1;">15x15x15</div><div> | <b>400-01</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeDos" class="radio-molde" label="400-02">
                                <div style="display: flex;"><div style="flex-grow: 1;">20x20x20</div><div> | <b>400-02</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeTres" class="radio-molde" label="400-03">
                                <div style="display: flex;"><div style="flex-grow: 1;">15x30</div><div> | <b>400-03</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeCuatro" class="radio-molde" label="400-04">
                                <div style="display: flex;"><div style="flex-grow: 1;">4x4x16</div><div> | <b>400-04</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeCinco" class="radio-molde" label="400-05">
                                <div style="display: flex;"><div style="flex-grow: 1;">53x15x15</div><div> | <b>400-05</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeSeis" class="radio-molde" label="400-06">
                                <div style="display: flex;"><div style="flex-grow: 1;">10x10x10</div><div> | <b>400-06</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMoldeSiete" class="radio-molde" label="400-07">
                                <div style="display: flex;"><div style="flex-grow: 1;">15x30</div><div> | <b>400-07</b> </div></div>
                            </el-radio>
                        </div>
                    </el-form-item> -->
          <el-divider class="el-divider-5" />
          <el-form-item label="Muestreado por" prop="muestreadoPor">
            <div class="dis-flex-dir-col">
              <el-radio
                @click.native.prevent="clickitem('muestreadoPor', 'lacem')"
                v-model="form.muestreadoPor"
                label="lacem"
                >Lacem</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('muestreadoPor', 'mandante')"
                v-model="form.muestreadoPor"
                label="mandante"
                >Mandante</el-radio
              >
            </div>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item label="Ensayado por" prop="ensayadoPor">
            <div class="dis-flex-dir-col">
              <el-radio
                @click.native.prevent="clickitem('ensayadoPor', 'lacem')"
                v-model="form.ensayadoPor"
                label="lacem"
                >Lacem</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('ensayadoPor', 'mandante')"
                v-model="form.ensayadoPor"
                label="mandante"
                >Mandante</el-radio
              >
            </div>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item label="Tipo de muestra" prop="tipoMuestra">
            <div class="dis-flex-dir-col">
              <el-radio
                @click.native.prevent="clickitem('tipoMuestra', 'simple')"
                v-model="form.tipoMuestra"
                label="simple"
                >Simple</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('tipoMuestra', 'compuesta')"
                v-model="form.tipoMuestra"
                label="compuesta"
                >Compuesta</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('tipoMuestra', 'especial')"
                v-model="form.tipoMuestra"
                label="especial"
                >Especial</el-radio
              >
            </div>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item
            label="Volumen de la Amasada del Hormigón (m³)"
            prop="amasadaHormigon"
          >
            <el-input v-model="form.amasadaHormigon"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item
            label="Asentamiento de cono (cm)"
            prop="asentamientoCono"
          >
            <el-input v-model="form.asentamientoCono"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item label="N° Informe" prop="numInforme">
            <!-- <el-input class="no-click" v-model="form.numInforme"></el-input> -->
            <strong
              ><label>{{ form.numInforme }}</label></strong
            >
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item label="Segregación" prop="segregacion">
            <el-input v-model="form.segregacion"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item
            label="N° equipo Cono de Abrams"
            prop="numEquipoConoAbrams"
          >
            <el-input v-model="form.numEquipoConoAbrams"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item
            label="N° Vibrador de Inmersión"
            prop="numVibradorInmersion"
          >
            <el-input v-model="form.numVibradorInmersion"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5" />
          <el-form-item
            label="N° equipo Cono reducido"
            prop="numEquipoConoReducido"
          >
            <el-input v-model="form.numEquipoConoReducido"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="unaDosColumnas" class="padding-5">
          <!-- <div class="container-item no-click una-linea">
                        <div class="label-item">N° Ingreso</div>
                        <el-input class="contenido-item" v-model="placeholderNumIngreso"></el-input>
                    </div> -->
          <el-form-item label="N° Muestra" prop="numIngreso">
            <el-input v-model="form.numIngreso"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Hora Muestreo" prop="horaMuestreo">
            <el-time-picker
              v-model="form.horaMuestreo"
              format="HH:mm"
              value-format="HH:mm"
            >
            </el-time-picker>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Hora Inicio amasado" prop="horaInicioAmasado">
            <el-time-picker
              v-model="form.horaInicioAmasado"
              format="HH:mm"
              value-format="HH:mm"
            >
            </el-time-picker>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="T° Ambiente" prop="tAmbiente">
            <el-input v-model="form.tAmbiente"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="T° Hormigón/Mortero" prop="tHormigonMortero">
            <el-input v-model="form.tHormigonMortero"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Proveedor" prop="proveedor">
            <el-input v-model="form.proveedor"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="N° Guía de Despacho" prop="numGuiaDespacho">
            <el-input v-model="form.numGuiaDespacho"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Nombre Chofer" prop="nombreChofer">
            <el-input v-model="form.nombreChofer"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Curado Inicial" prop="curadoInicial">
            <el-input v-model="form.curadoInicial"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Elemento Hormigonado" prop="elementoHormigonado">
            <el-input v-model="form.elementoHormigonado"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Ubicación del Elemento" prop="ubicacionElemento">
            <el-input v-model="form.ubicacionElemento"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item
            label="Tipo de Hormigón / Mortero"
            prop="tipoHormigonMortero"
          >
            <el-input v-model="form.tipoHormigonMortero"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item
            label="Resistencia especificada"
            prop="resistenciaEspecificada"
          >
            <el-input v-model="form.resistenciaEspecificada"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Fecha de confección" prop="fechaConfeccion">
            <el-date-picker
              v-model="form.fechaConfeccion"
              type="date"
              format="dd-MM-yyyy"
              value-format="dd-MM-yyyy"
            >
            </el-date-picker>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="Aditivo" prop="aditivo">
            <el-input v-model="form.aditivo"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <el-form-item label="N° de Mixer" prop="numMixer">
            <el-input v-model="form.numMixer"></el-input>
          </el-form-item>
          <el-divider class="el-divider-5 margin-l-5" />
          <!-- Fecha de Retiro de muestra -->
          <el-col :span="24" class="padding-5">
            <div class="Rtable Rtable--4cols">
              <!-- titulos -->
              <div class="Rtable-cell width-35">
                <strong>Programa de Ensayo a</strong>
              </div>
              <div class="Rtable-cell width-15"><strong>Cantidad</strong></div>
              <div class="Rtable-cell width-datepicker">
                <strong>Fecha</strong>
              </div>
              <div class="Rtable-cell width-15"><strong>Informe</strong></div>
              <!-- 1 dia -->
              <div class="Rtable-cell width-35"><label>1 dia</label></div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadUnDia"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadUnDia"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaUnDia"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaUnDia"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeUnDia"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeUnDia"
                  ></el-input>
                </el-form-item>
              </div>
              <!-- 3 dias -->
              <div class="Rtable-cell width-35"><label>3 dias</label></div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadTresDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadTresDias"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaTresDias"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaTresDias"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeTresDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeTresDias"
                  ></el-input>
                </el-form-item>
              </div>
              <!-- 7 dias -->
              <div class="Rtable-cell width-35"><label>7 dias</label></div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadSieteDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadSieteDias"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaSieteDias"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaSieteDias"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeSieteDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeSieteDias"
                  ></el-input>
                </el-form-item>
              </div>
              <!-- 14 dias -->
              <div class="Rtable-cell width-35"><label>14 dias</label></div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadCatorceDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadCatorceDias"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaCatorceDias"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaCatorceDias"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeCatorceDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeCatorceDias"
                  ></el-input>
                </el-form-item>
              </div>
              <!-- 28 dias -->
              <div class="Rtable-cell width-35"><label>28 dias</label></div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadVeintiochoDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadVeintiochoDias"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaVeintiochoDias"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaVeintiochoDias"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeVeintiochoDias"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeVeintiochoDias"
                  ></el-input>
                </el-form-item>
              </div>
              <!-- otros -->
              <div class="Rtable-cell width-35">
                <el-form-item
                  class="item-no-margin cantidad-otros"
                  label="Otros"
                  prop="retiroMuestraOtros"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraOtros"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraCantidadOtros"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraCantidadOtros"
                  ></el-input>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-datepicker">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraFechaOtros"
                >
                  <el-date-picker
                    v-model="form.retiroMuestraFechaOtros"
                    type="date"
                    size="mini"
                    format="dd-MM-yyyy"
                    value-format="dd-MM-yyyy"
                  >
                  </el-date-picker>
                </el-form-item>
              </div>
              <div class="Rtable-cell width-15">
                <el-form-item
                  class="item-no-margin"
                  prop="retiroMuestraInformeOtros"
                >
                  <el-input
                    size="mini"
                    v-model="form.retiroMuestraInformeOtros"
                  ></el-input>
                </el-form-item>
              </div>
            </div>
          </el-col>
          <el-col :span="24" class="padding-5"
            >Traslado de probetas al Laboratorio</el-col
          >
          <el-col :span="24" class="padding-5">
            <el-form-item prop="trasladoProbetas">
              <el-radio
                @click.native.prevent="clickitem('trasladoProbetas', 'moldes')"
                v-model="form.trasladoProbetas"
                label="moldes"
                >En Moldes</el-radio
              >
              <el-radio
                @click.native.prevent="
                  clickitem('trasladoProbetas', 'desmoldadas')
                "
                v-model="form.trasladoProbetas"
                label="desmoldadas"
                >Desmoldadas</el-radio
              >
            </el-form-item>
          </el-col>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <!-- testigos hormigon endurecido -->
      <el-row class="margin-b-5">
        <el-col :span="24" style="font-weight: 600" class="padding-5"
          >Extracci&oacute;n de Testigos Hormig&oacute;n Endurecido</el-col
        >
        <el-col :span="24" class="padding-5">
          <div class="tabla-extraccion tabla-extraccion--10cols comentarios">
            <!-- titulos -->
            <div class="tabla-extraccion-cell" style="width: 30%">
              Di&aacute;metro
            </div>
            <div class="tabla-extraccion-cell">>6"|400-13</div>
            <div class="tabla-extraccion-cell">>4"|400-12</div>
            <div class="tabla-extraccion-cell">Total</div>
            <div class="tabla-extraccion-cell">Ingreso</div>
            <div
              class="tabla-extraccion-cell"
              style="border-right-color: transparent; width: 3%"
            ></div>
            <div
              class="tabla-extraccion-cell"
              style="border-right-color: transparent; width: 3%"
            ></div>
            <div
              class="tabla-extraccion-cell"
              style="
                border-right-color: transparent;
                width: 23%;
                text-align: center;
              "
            >
              N° de Informe
            </div>
            <div
              class="tabla-extraccion-cell"
              style="border-right-color: transparent; width: 3%"
            ></div>
            <div class="tabla-extraccion-cell" style="width: 3%"></div>
            <!-- N° de Testigos Extraidos -->
            <div class="tabla-extraccion-cell" style="width: 30%">
              N° de Testigos Extra&iacute;dos
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item class="item-no-margin" prop="testigosExtraidosSeis">
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosExtraidosSeis"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item
                class="item-no-margin"
                prop="testigosExtraidosCuatro"
              >
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosExtraidosCuatro"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item
                class="item-no-margin"
                prop="testigosExtraidosTotal"
              >
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosExtraidosTotal"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <!-- N° de Testigos Ensayados -->
            <div
              class="tabla-extraccion-cell"
              style="width: 30%; flex-wrap: nowrap; display: flex"
            >
              <div style="display: flex; flex-grow: 1">
                N° de Testigos Ensayados
              </div>
              <div class="tabla-extraccion-cell extraccion-cell-borde-left">
                400-14
              </div>
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item class="item-no-margin" prop="testigosEnsayadosSeis">
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosEnsayadosSeis"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item
                class="item-no-margin"
                prop="testigosEnsayadosCuatro"
              >
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosEnsayadosCuatro"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell">
              <el-form-item
                class="item-no-margin"
                prop="testigosEnsayadosTotal"
              >
                <el-input
                  size="mini"
                  :disabled="!form.seccionTestigosHabilitada"
                  v-model="form.testigosEnsayadosTotal"
                ></el-input>
              </el-form-item>
            </div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
            <div class="tabla-extraccion-cell"></div>
          </div>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <!-- aridos para hormigon -->
      <el-row class="margin-b-5">
        <el-col :span="6" style="font-weight: 600" class="padding-5"
          >&Aacute;ridos para Hormig&oacute;n</el-col
        >
        <el-col :span="6" style="font-weight: 600" class="padding-5"
          >Procedimiento Extracci&oacute;n</el-col
        >
        <el-col :span="12" class="padding-5">
          <el-form-item
            class="procedimiento-extraccion-opciones"
            prop="procedimientoExtraccion"
          >
            <el-radio
              @click.native.prevent="
                clickitem('procedimientoExtraccion', 'yacimiento')
              "
              v-model="form.procedimientoExtraccion"
              :disabled="!form.seccionAridosHabilitada"
              label="yacimiento"
              >Yacimiento</el-radio
            >
            <el-radio
              @click.native.prevent="
                clickitem('procedimientoExtraccion', 'produccion')
              "
              v-model="form.procedimientoExtraccion"
              :disabled="!form.seccionAridosHabilitada"
              label="produccion"
              >Producci&oacute;n</el-radio
            >
            <el-radio
              @click.native.prevent="
                clickitem('procedimientoExtraccion', 'obra')
              "
              v-model="form.procedimientoExtraccion"
              :disabled="!form.seccionAridosHabilitada"
              label="obra"
              >Obra
            </el-radio>
          </el-form-item>
        </el-col>
        <el-col :span="12" class="padding-5">
          <div class="tabla-aridos comentarios">
            <!-- titulos1 -->
            <div class="tabla-aridos-cell" style="width: 100%">N° Ingreso</div>
            <!-- titulos 2 -->
            <div class="tabla-aridos-cell" style="width: 35%">400 - 17</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">M - 1</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">M - 2</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">M - 3</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">M - 4</div>
            <!-- Grava -->
            <div class="tabla-aridos-cell" style="width: 35%">Grava</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraUno">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraUno', 'grava')
                  "
                  v-model="form.aridosHormigonMuestraUno"
                  :disabled="!form.seccionAridosHabilitada"
                  label="grava"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraDos">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraDos', 'grava')
                  "
                  v-model="form.aridosHormigonMuestraDos"
                  :disabled="!form.seccionAridosHabilitada"
                  label="grava"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraTres">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraTres', 'grava')
                  "
                  v-model="form.aridosHormigonMuestraTres"
                  :disabled="!form.seccionAridosHabilitada"
                  label="grava"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraCuatro">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraCuatro', 'grava')
                  "
                  v-model="form.aridosHormigonMuestraCuatro"
                  :disabled="!form.seccionAridosHabilitada"
                  label="grava"
                ></el-radio>
              </el-form-item>
            </div>
            <!-- Gravilla -->
            <div class="tabla-aridos-cell" style="width: 35%">Gravilla</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraUno">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraUno', 'gravilla')
                  "
                  v-model="form.aridosHormigonMuestraUno"
                  :disabled="!form.seccionAridosHabilitada"
                  label="gravilla"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraDos">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraDos', 'gravilla')
                  "
                  v-model="form.aridosHormigonMuestraDos"
                  :disabled="!form.seccionAridosHabilitada"
                  label="gravilla"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraTres">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraTres', 'gravilla')
                  "
                  v-model="form.aridosHormigonMuestraTres"
                  :disabled="!form.seccionAridosHabilitada"
                  label="gravilla"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraCuatro">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraCuatro', 'gravilla')
                  "
                  v-model="form.aridosHormigonMuestraCuatro"
                  :disabled="!form.seccionAridosHabilitada"
                  label="gravilla"
                ></el-radio>
              </el-form-item>
            </div>
            <!-- Arena -->
            <div class="tabla-aridos-cell" style="width: 35%">Arena</div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraUno">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraUno', 'arena')
                  "
                  v-model="form.aridosHormigonMuestraUno"
                  :disabled="!form.seccionAridosHabilitada"
                  label="arena"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraDos">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraDos', 'arena')
                  "
                  v-model="form.aridosHormigonMuestraDos"
                  :disabled="!form.seccionAridosHabilitada"
                  label="arena"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraTres">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraTres', 'arena')
                  "
                  v-model="form.aridosHormigonMuestraTres"
                  :disabled="!form.seccionAridosHabilitada"
                  label="arena"
                ></el-radio>
              </el-form-item>
            </div>
            <div class="tabla-aridos-cell" style="width: 16.25%">
              <el-form-item prop="aridosHormigonMuestraCuatro">
                <el-radio
                  @click.native.prevent="
                    clickitem('aridosHormigonMuestraCuatro', 'arena')
                  "
                  v-model="form.aridosHormigonMuestraCuatro"
                  :disabled="!form.seccionAridosHabilitada"
                  label="arena"
                ></el-radio>
              </el-form-item>
            </div>
          </div>
        </el-col>
        <el-col :span="12" class="padding-5">
          <div class="tabla-aridos">
            <!-- r1 -->
            <div class="tabla-aridos-cell" style="width: 90%">
              Ensayos para aceptaci&oacute;n de &aacute;ridos
            </div>
            <div class="tabla-aridos-cell" style="width: 10%">-</div>
            <!-- r2 -->
            <div class="tabla-aridos-cell" style="width: 90%">
              Ensayos para dosificaci&oacute; de hormig&oacute;n
            </div>
            <div class="tabla-aridos-cell" style="width: 10%">-</div>
            <!-- r3 -->
            <div class="tabla-aridos-cell" style="width: 75%">
              - Sin probetas de prueba
            </div>
            <div class="tabla-aridos-cell" style="width: 15%">400 - 18</div>
            <div class="tabla-aridos-cell" style="width: 10%">-</div>
            <!-- r4 -->
            <div class="tabla-aridos-cell" style="width: 75%">
              - Con probetas de prueba
            </div>
            <div class="tabla-aridos-cell" style="width: 15%">400 - 19</div>
            <div class="tabla-aridos-cell" style="width: 10%">-</div>
            <!-- asdsad -->
            <div class="tabla-aridos-cell" style="width: 30%">N° Informe</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 30%">--</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
            <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
          </div>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <!-- Otros -->
      <el-row class="margin-b-5 seccion-otros-container">
        <el-col :span="24" style="font-weight: 600; border-radius: 4px;
    height: auto !important; width: 100%;" class="padding-5"
          >Otros</el-col
        >
          <el-form-item
            label="Dens. Aparente Hormigón"
            prop="densAparenteHormigon"
          >
            <div slot="label"><p style="margin-bottom: 0px;">Dens. Aparente Hormig&oacute;n<br/><div style="border-style: solid;border-width: 1px;display: inline;">&nbsp;400 - 10&nbsp;</div></p></div>
            <el-checkbox
              :disabled="!form.seccionOtrosHabilitada"
              v-model="form.densAparenteHormigon"
            ></el-checkbox>
          </el-form-item>
          <el-form-item
            label="Dens. Aparente Mortero"
            prop="densAparenteMortero"
          >
            <div slot="label"><p style="margin-bottom: 0px;">Dens. Aparente Mortero<br/><div style="border-style: solid;border-width: 1px;display: inline;">&nbsp;400 - 10&nbsp;</div></p></div>
            <el-checkbox
              :disabled="!form.seccionOtrosHabilitada"
              v-model="form.densAparenteMortero"
            ></el-checkbox>
          </el-form-item>
          <el-form-item
            label="Índice Esclerométrico"
            prop="indiceEsclerometrico"
          >
            <div slot="label"><p style="margin-bottom: 0px;">&Iacute;ndice Esclerom&eacute;trico<br/><div style="border-style: solid;border-width: 1px;display: inline;">&nbsp;400 - 21&nbsp;</div></p></div>
            <el-checkbox
              :disabled="!form.seccionOtrosHabilitada"
              v-model="form.indiceEsclerometrico"
            ></el-checkbox>
          </el-form-item>
          <el-form-item
            label="Irregularidad Superficial"
            prop="irregularidadSuperficial"
          >
            <div slot="label"><p style="margin-bottom: 0px;">Irregularidad Superficial<br/><div style="border-style: solid;border-width: 1px;display: inline;">&nbsp;400 - 20&nbsp;</div></p></div>
            <el-checkbox
              :disabled="!form.seccionOtrosHabilitada"
              v-model="form.irregularidadSuperficial"
            ></el-checkbox>
          </el-form-item>
          <el-form-item
            label="Irregularidad Superficial - cantidad ml"
            prop="irregularidadSuperficialMl"
          >
            <el-input
              :disabled="!form.seccionOtrosHabilitada"
              v-model="form.irregularidadSuperficialMl"
            ></el-input>
          </el-form-item>
      </el-row>
      <el-divider class="el-divider-5" />
      <el-row class="margin-b-5">
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item
            label="Muestra Ingresada por el Cliente"
            prop="muestraIngresadaPorCliente"
          >
            <el-radio
              @click.native.prevent="
                clickitem('muestraIngresadaPorCliente', 'true')
              "
              v-model="form.muestraIngresadaPorCliente"
              label="true"
              >Si</el-radio
            >
            <el-radio
              @click.native.prevent="
                clickitem('muestraIngresadaPorCliente', 'false')
              "
              v-model="form.muestraIngresadaPorCliente"
              label="false"
              >No</el-radio
            >
          </el-form-item>
        </el-col>
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item label="Responsable en Obra" prop="responsableEnObra">
            <el-input v-model="form.responsableEnObra"></el-input>
          </el-form-item>
        </el-col>
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item label="Fecha de Ingreso" prop="fechaIngreso">
            <el-date-picker
              v-model="form.fechaIngreso"
              type="date"
              format="dd-MM-yyyy"
              value-format="dd-MM-yyyy"
            >
            </el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item label="Fecha de Visita Obra" prop="fechaVisitaObra">
            <el-date-picker
              v-model="form.fechaVisitaObra"
              type="date"
              format="dd-MM-yyyy"
              value-format="dd-MM-yyyy"
            >
            </el-date-picker>
          </el-form-item>
        </el-col>
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item label="Hora Llegada" prop="horaLlegada">
            <el-time-picker
              v-model="form.horaLlegada"
              format="HH:mm"
              value-format="HH:mm"
            >
            </el-time-picker>
          </el-form-item>
        </el-col>
        <el-col :span="12" class="seccion-otros padding-5">
          <el-form-item label="Hora Salida" prop="horaSalida">
            <el-time-picker
              v-model="form.horaSalida"
              format="HH:mm"
              value-format="HH:mm"
            >
            </el-time-picker>
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <el-row class="margin-b-5 comentarios">
        <el-col :span="12">
          <el-col :span="24" class="padding-5">Observaciones</el-col>
          <el-col :span="24" class="padding-5">
            <el-form-item prop="observaciones">
              <el-input type="textarea" autosize v-model="form.observaciones">
              </el-input>
            </el-form-item>
          </el-col>
        </el-col>
        <el-col :span="12">
          <el-col :span="24" class="padding-5"
            >La muestra presenta alguna alteraci&oacute;n?</el-col
          >
          <el-col :span="24" class="padding-5">
            <el-form-item prop="alteracionMuestra">
              <el-radio
                @click.native.prevent="clickitem('alteracionMuestra', 'si')"
                v-model="form.alteracionMuestra"
                label="si"
                >Si</el-radio
              >
              <el-radio
                @click.native.prevent="clickitem('alteracionMuestra', 'no')"
                v-model="form.alteracionMuestra"
                label="no"
                >No</el-radio
              >
            </el-form-item>
          </el-col>
          <el-col :span="24" class="padding-5">
            <el-form-item prop="observacionesAlteracionesMuestra">
              <el-input
                type="textarea"
                autosize
                v-model="form.observacionesAlteracionesMuestra"
              >
              </el-input>
            </el-form-item>
          </el-col>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <el-row class="margin-b-5">
        <el-col :span="unaDosColumnas" class="padding-5">
          <!--el-form-item label="Laboratorista" prop="laboratorista">
            <el-input v-model="form.laboratorista"></el-input>
          </el-form-item-->

          Laboratorista
          <el-select
            v-model="form.laboratorista"
            placeholder="Seleccione.."
            prop="laboratorista"
          >
            <el-option
              v-for="item in laboratorista"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
          </el-select>
        </el-col>
        <el-col :span="unaDosColumnas" class="padding-5">
          <!--el-form-item label="Ayudante" prop="ayudante">
            <el-input v-model="form.ayudante"></el-input>
          </el-form-item-->

          Ayudante
          <el-select
            v-model="form.ayudante"
            placeholder="Seleccione.."
            prop="ayudante"
          >
            <el-option
              v-for="item in ayudante"
              :key="item.value"
              :label="item.label"
              :value="item.value"
            >
            </el-option>
          </el-select>
        </el-col>
        <el-col :span="unaDosColumnas" class="comentarios">
          <el-form-item prop="recibeOMuestrea">
            <el-radio
              @click.native.prevent="clickitem('recibeOMuestrea', 'recibe')"
              v-model="form.recibeOMuestrea"
              label="recibe"
              >Recibe</el-radio
            >
            <el-radio
              @click.native.prevent="clickitem('recibeOMuestrea', 'muestrea')"
              v-model="form.recibeOMuestrea"
              label="muestrea"
              >Muestrea</el-radio
            >
          </el-form-item>
        </el-col>
      </el-row>
      <el-divider class="el-divider-5" />
      <el-form-item class="comentarios" prop="" v-if="visualizacion != 'ver'">
        <el-button
          type="primary"
          @click.prevent="onSubmit('formularioOtt', 'crear')"
          v-if="visualizacion != 'editar'"
          plain
        >
          Crear OTT
        </el-button>
        <el-button
          type="primary"
          @click.prevent="onSubmit('formularioOtt', 'editar')"
          v-if="visualizacion == 'editar'"
          plain
        >
          Actualizar OTT
        </el-button>
        <el-popconfirm
          confirm-button-text="Vaciar campos"
          cancel-button-text="volver"
          @confirm="resetForm('formularioOtt')"
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
var moment = require("moment");

export default {
  props: ["tipoOtt", "ottCargada"],
  data() {
    return {
      ayudante: [
        {
          value: "OSCAR ALARCON REYES",
          label: "OSCAR ALARCON REYES",
        },
        {
          value: "CRISTIAN GARRIDO PAINEO",
          label: "CRISTIAN GARRIDO PAINEO",
        },
        {
          value: "BAYHRON ITURRA PRADENAS",
          label: "BAYHRON ITURRA PRADENAS",
        },
        {
          value: "JOSE PALMA ASTORGA",
          label: "JOSE PALMA ASTORGA",
        },
        {
          value: "DANIEL PINCHEIRA BECERRA",
          label: "DANIEL PINCHEIRA BECERRA",
        },
        {
          value: "FELIPE PIZARRO ARAYA",
          label: "FELIPE PIZARRO ARAYA",
        },
        {
          value: "CARLOS QUIROGA ABURTO",
          label: "CARLOS QUIROGA ABURTO",
        },
        {
          value: "MARCELO RETAMALES MATELUNA",
          label: "MARCELO RETAMALES MATELUNA",
        },
        {
          value: "MIGUEL ROJAS GARRIDO",
          label: "MIGUEL ROJAS GARRIDO",
        },
        {
          value: "GONZALO ROJAS SANCHEZ",
          label: "GONZALO ROJAS SANCHEZ",
        },
        {
          value: "ALFREDO ROJAS SANCHEZ",
          label: "ALFREDO ROJAS SANCHEZ",
        },
        {
          value: "LUIS VELASQUEZ ATABALES",
          label: "LUIS VELASQUEZ ATABALES",
        },
        {
          value: "LUIS VERA MORALES",
          label: "LUIS VERA MORALES",
        },
      ],
      laboratorista: [
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
      moment: moment,
      labelPosition: "left",
      unaDosColumnas: 24,
      urlGuardarFormulario: `${GLOBAL.URL}formularios/guardar-formulario`,
      urlActualizarFormulario: `${GLOBAL.URL}formularios/actualizar-formulario`,
      visualizacion: "",
      placeholderNumIngreso: "Se generará automáticamente",
      form: {
        id: null,
        numClienteObra: "",
        numOtt: "",
        numIngreso: "",
        nombreCliente: "",
        nombreObra: "",
        fonoObra: "",
        direccionObra: "",
        encargadoObra: "",
        muestreoDe: "",
        extraccion: "",
        compactacion: "",
        tipoMoldeUno: false,
        tipoMoldeDos: false,
        tipoMoldeTres: false,
        tipoMoldeCuatro: false,
        tipoMoldeCinco: false,
        tipoMoldeSeis: false,
        tipoMoldeSiete: false,
        muestreadoPor: "",
        ensayadoPor: "",
        tipoMuestra: "",
        amasadaHormigon: "",
        asentamientoCono: "",
        numInforme: "400-08",
        segregacion: "",
        numEquipoConoAbrams: "",
        numVibradorInmersion: "",
        numEquipoConoReducido: "",
        horaMuestreo: "",
        horaInicioAmasado: "",
        tAmbiente: "",
        tHormigonMortero: "",
        proveedor: "",
        numGuiaDespacho: "",
        nombreChofer: "",
        curadoInicial: "Piscina de curado",
        elementoHormigonado: "",
        ubicacionElemento: "",
        tipoHormigonMortero: "",
        resistenciaEspecificada: "",
        fechaConfeccion: moment().format("DD-MM-YYYY"),
        aditivo: "",
        numMixer: "",
        trasladoProbetas: "",
        retiroMuestraOtros: "",
        retiroMuestraCantidadUnDia: "",
        retiroMuestraCantidadTresDias: "",
        retiroMuestraCantidadSieteDias: "",
        retiroMuestraCantidadCatorceDias: "",
        retiroMuestraCantidadVeintiochoDias: "",
        retiroMuestraCantidadOtros: "",
        retiroMuestraFechaUnDia: "",
        retiroMuestraFechaTresDias: "",
        retiroMuestraFechaSieteDias: "",
        retiroMuestraFechaCatorceDias: "",
        retiroMuestraFechaVeintiochoDias: "",
        retiroMuestraFechaOtros: "",
        retiroMuestraInformeUnDia: "",
        retiroMuestraInformeTresDias: "",
        retiroMuestraInformeSieteDias: "",
        retiroMuestraInformeCatorceDias: "",
        retiroMuestraInformeVeintiochoDias: "",
        retiroMuestraInformeOtros: "",
        procedimientoExtraccion: "",
        muestraIngresadaPorCliente: "",
        fechaIngreso: "",
        fechaVisitaObra: "",
        horaLlegada: "",
        horaSalida: "",
        responsableEnObra: "",
        densAparenteHormigon: "",
        densAparenteMortero: "",
        indiceEsclerometrico: "",
        irregularidadSuperficial: "",
        irregularidadSuperficialMl: "",
        observaciones: "",
        alteracionMuestra: "",
        observacionesAlteracionesMuestra: "",
        laboratorista: "",
        ayudante: "",
        recibeOMuestrea: "",
        aridosHormigonMuestraUno: "",
        aridosHormigonMuestraDos: "",
        aridosHormigonMuestraTres: "",
        aridosHormigonMuestraCuatro: "",
        seccionTestigosHabilitada: false,
        seccionAridosHabilitada: false,
        seccionOtrosHabilitada: false,
        seccionRetiroMuestrasHabilitada: false,
        seccionHormigonHabilitada: false,
        seccionMorteroHabilitada: false,
        testigosExtraidosSeis: "0",
        testigosExtraidosCuatro: "0",
        testigosExtraidosTotal: "0",
        testigosEnsayadosSeis: "0",
        testigosEnsayadosCuatro: "0",
        testigosEnsayadosTotal: "0",
      },
      reglas: {
        numClienteObra: [{ required: true, message: "", trigger: "blur" }],
        numOtt: [{ required: true, message: "", trigger: "blur" }],
        numIngreso: [{ required: true, message: "", trigger: "blur" }],
        nombreCliente: [{ required: true, message: "", trigger: "blur" }],
        nombreObra: [{ required: true, message: "", trigger: "blur" }],
        fonoObra: [{ required: false, message: "", trigger: "blur" }],
        direccionObra: [{ required: true, message: "", trigger: "blur" }],
        encargadoObra: [{ required: false, message: "", trigger: "blur" }],
        muestreoDe: [{ required: true, message: "", trigger: "change" }],
        extraccion: [{ required: true, message: "", trigger: "change" }],
        compactacion: [{ required: true, message: "", trigger: "change" }],
        tipoMoldeUno: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeDos: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeTres: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeCuatro: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeCinco: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeSeis: [{ required: true, message: "", trigger: "blur" }],
        tipoMoldeSiete: [{ required: true, message: "", trigger: "blur" }],
        muestreadoPor: [{ required: true, message: "", trigger: "change" }],
        ensayadoPor: [{ required: true, message: "", trigger: "change" }],
        tipoMuestra: [{ required: true, message: "", trigger: "change" }],
        seccionTestigosHabilitada: [
          { required: false, message: "", trigger: "change" },
        ],
        amasadaHormigon: [{ required: true, message: "", trigger: "blur" }],
        asentamientoCono: [{ required: true, message: "", trigger: "blur" }],
        // numInforme: [{ required: true, message: "", trigger: "blur" }],
        segregacion: [{ required: true, message: "", trigger: "blur" }],
        numEquipoConoAbrams: [{ required: true, message: "", trigger: "blur" }],
        numVibradorInmersion: [
          { required: true, message: "", trigger: "blur" },
        ],
        numEquipoConoReducido: [
          { required: true, message: "", trigger: "blur" },
        ],
        horaMuestreo: [{ required: true, message: "", trigger: "blur" }],
        horaInicioAmasado: [{ required: false, message: "", trigger: "blur" }],
        tAmbiente: [{ required: true, message: "", trigger: "blur" }],
        tHormigonMortero: [{ required: true, message: "", trigger: "blur" }],
        proveedor: [{ required: true, message: "", trigger: "blur" }],
        numGuiaDespacho: [{ required: true, message: "", trigger: "blur" }],
        nombreChofer: [{ required: true, message: "", trigger: "blur" }],
        curadoInicial: [{ required: true, message: "", trigger: "blur" }],
        elementoHormigonado: [{ required: true, message: "", trigger: "blur" }],
        ubicacionElemento: [{ required: true, message: "", trigger: "blur" }],
        tipoHormigonMortero: [{ required: true, message: "", trigger: "blur" }],
        resistenciaEspecificada: [
          { required: true, message: "", trigger: "blur" },
        ],
        fechaConfeccion: [{ required: true, message: "", trigger: "blur" }],
        aditivo: [{ required: false, message: "", trigger: "blur" }],
        numMixer: [{ required: false, message: "", trigger: "blur" }],
        retiroMuestraCantidadUnDia: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaUnDia: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeUnDia: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraCantidadTresDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaTresDias: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeTresDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraCantidadSieteDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaSieteDias: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeSieteDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraCantidadCatorceDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaCatorceDias: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeCatorceDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraCantidadVeintiochoDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaVeintiochoDias: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeVeintiochoDias: [
          { required: true, message: "", trigger: "blur" },
        ],
        // retiroMuestraOtros: [{ required: true, message: "", trigger: "blur" }],
        retiroMuestraCantidadOtros: [
          { required: true, message: "", trigger: "blur" },
        ],
        retiroMuestraFechaOtros: [
          { required: true, message: "", trigger: "change" },
        ],
        retiroMuestraInformeOtros: [
          { required: true, message: "", trigger: "blur" },
        ],
        trasladoProbetas: [{ required: true, message: "", trigger: "blur" }],
        procedimientoExtraccion: [
          { required: true, message: "", trigger: "change" },
        ],
        aridosHormigonMuestraUno: [
          { required: true, message: "", trigger: "change" },
        ],
        aridosHormigonMuestraDos: [
          { required: true, message: "", trigger: "change" },
        ],
        aridosHormigonMuestraTres: [
          { required: true, message: "", trigger: "change" },
        ],
        aridosHormigonMuestraCuatro: [
          { required: true, message: "", trigger: "change" },
        ],
        densAparenteHormigon: [
          { required: true, message: "", trigger: "change" },
        ],
        densAparenteMortero: [
          { required: true, message: "", trigger: "change" },
        ],
        indiceEsclerometrico: [
          { required: true, message: "", trigger: "change" },
        ],
        irregularidadSuperficial: [
          { required: true, message: "", trigger: "change" },
        ],
        irregularidadSuperficialMl: [
          { required: true, message: "", trigger: "blur" },
        ],
        muestraIngresadaPorCliente: [
          { required: true, message: "", trigger: "change" },
        ],
        responsableEnObra: [{ required: false, message: "", trigger: "blur" }],
        fechaIngreso: [{ required: true, message: "", trigger: "change" }],
        fechaVisitaObra: [{ required: true, message: "", trigger: "change" }],
        horaLlegada: [{ required: true, message: "", trigger: "change" }],
        horaSalida: [{ required: true, message: "", trigger: "change" }],
        observaciones: [{ required: true, message: "", trigger: "blur" }],
        alteracionMuestra: [{ required: true, message: "", trigger: "change" }],
        observacionesAlteracionesMuestra: [
          { required: true, message: "", trigger: "change" },
        ],
        observaciones: [{ required: true, message: "", trigger: "blur" }],
        laboratorista: [{ required: true, message: "", trigger: "blur" }],
        ayudante: [{ required: true, message: "", trigger: "blur" }],
        recibeOMuestrea: [{ required: true, message: "", trigger: "change" }],
      },
    };
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  mounted() {
    this.visualizacion = this.tipoOtt;
    console.log(this.visualizacion);
    if (this.ottCargada) {
      this.cargaDatosOtt();
    }
  },
  methods: {
    onSubmit(nombreFormulario, accion) {
      if (accion === "crear") {
        // this.$refs[nombreFormulario].validate((valid) => {
        //     if (valid) {
        this.$http
          .post(this.urlGuardarFormulario, {
            formulario: this.form,
          })
          .then(
            (response) => {
              console.log(response);
              if (response.body[1] == true) {
                Tools.mensajeAlerta(
                  "Formulario guardado.",
                  Tools.MENSAJE.EXITO,
                  "",
                  5
                );
                this.$emit("cambiaMain", {
                  vista: "ListadoFormularios",
                  condicion: "porvalidar",
                });
              } else {
                if (response.body[0].errorInfo[0] == "23000") {
                  return Tools.mensajeAlerta(
                    "Ya existe una OTT con este numero en la base de datos.",
                    Tools.MENSAJE.ERROR,
                    "",
                    5
                  );
                }
                return Tools.mensajeAlerta(
                  "No se pudo guardar el formulario.",
                  Tools.MENSAJE.ERROR,
                  "",
                  5
                );
              }
            },
            (response) => {
              console.log(response);
              Tools.mensajeAlerta(
                "No se pudo guardar el formulario.",
                Tools.MENSAJE.ERROR,
                "",
                5
              );
            }
          );
        //     } else {
        //         Tools.mensajeAlerta("Faltan camposque llenar en el formulario.", Tools.MENSAJE.ADVERTENCIA, '', 5);
        //         return false;
        //     }
        // });
      } else if (accion === "editar") {
        let estado = this.ottCargada.validado ? "validadas" : "porvalidar";
        console.log("estado vale " + estado);
        // this.$refs[nombreFormulario].validate((valid) => {
        //     if (valid) {
        this.$http
          .post(this.urlActualizarFormulario, {
            formulario: this.form,
          })
          .then(
            (response) => {
              console.log(response);
              if (response.body[1] == true) {
                Tools.mensajeAlerta(
                  "Formulario actualizado.",
                  Tools.MENSAJE.EXITO,
                  "",
                  7
                );
                setTimeout(function () {
                  parent.$("#cerrar-visualizacion").click();
                }, 100);
              } else {
                if (response.body[0].errorInfo[0] == "23000") {
                  return Tools.mensajeAlerta(
                    "Ya existe una OTT con este numero en la base de datos.",
                    Tools.MENSAJE.ERROR,
                    "",
                    5
                  );
                }
                return Tools.mensajeAlerta(
                  "No se pudo guardar el formulario.",
                  Tools.MENSAJE.ERROR,
                  "",
                  5
                );
              }
            },
            (response) => {
              console.log(response);
              Tools.mensajeAlerta(
                "No se pudo guardar el formulario.",
                Tools.MENSAJE.ERROR,
                "",
                5
              );
            }
          );
        //     } else {
        //         Tools.mensajeAlerta("Faltan camposque llenar en el formulario.", Tools.MENSAJE.ADVERTENCIA, '', 5);
        //         return false;
        //     }
        // });
      }
    },
    resetForm(nombreFormulario) {
      this.$refs[nombreFormulario].resetFields();
    },
    handleResize() {
      this.unaDosColumnas = window.innerWidth < 940 ? 24 : 12;
    },
    cargaDatosOtt() {
      this.form.id = this.ottCargada.id;
      this.form.numClienteObra = this.ottCargada.num_cliente_obra;
      this.form.numOtt = this.ottCargada.num_ott;
      this.form.numIngreso = this.ottCargada.num_ingreso;
      this.form.nombreCliente = this.ottCargada.nombre_cliente;
      this.form.nombreObra = this.ottCargada.nombre_obra;
      this.form.fonoObra = this.ottCargada.fono_obra;
      this.form.direccionObra = this.ottCargada.direccion_obra;
      this.form.encargadoObra = this.ottCargada.encargado_obra;
      this.form.muestreoDe = this.ottCargada.muestreo_de;
      this.form.extraccion = this.ottCargada.extraccion;
      this.form.compactacion = this.ottCargada.compactacion;
      this.form.muestreadoPor = this.ottCargada.muestreado_por;
      this.form.ensayadoPor = this.ottCargada.ensayado_por;
      this.form.tipoMuestra = this.ottCargada.tipo_muestra;
      this.form.amasadaHormigon = this.ottCargada.amasada_hormigon;
      this.form.asentamientoCono = this.ottCargada.asentamiento_cono;
      this.form.numInforme = this.ottCargada.num_informe;
      this.form.segregacion = this.ottCargada.segregacion;
      this.form.numEquipoConoAbrams = this.ottCargada.num_equipo_cono_abrams;
      this.form.numVibradorInmersion = this.ottCargada.num_vibrador_inmersion;
      this.form.numEquipoConoReducido =
        this.ottCargada.num_equipo_cono_reducido;
      this.form.horaMuestreo = this.ottCargada.hora_muestreo;
      this.form.horaInicioAmasado = this.ottCargada.hora_inicio_amasado;
      this.form.tAmbiente = this.ottCargada.t_ambiente;
      this.form.tHormigonMortero = this.ottCargada.t_hormigon_mortero;
      this.form.proveedor = this.ottCargada.proveedor;
      this.form.numGuiaDespacho = this.ottCargada.num_guia_despacho;
      this.form.nombreChofer = this.ottCargada.nombre_chofer;
      this.form.curadoInicial = this.ottCargada.curado_inicial;
      this.form.elementoHormigonado = this.ottCargada.elemento_hormigonado;
      this.form.ubicacionElemento = this.ottCargada.ubicacion_elemento;
      this.form.tipoHormigonMortero = this.ottCargada.tipo_hormigon_mortero;
      this.form.resistenciaEspecificada =
        this.ottCargada.resistencia_especificada;
      this.form.fechaConfeccion = this.ottCargada.fecha_confeccion;
      this.form.aditivo = this.ottCargada.aditivo;
      this.form.numMixer = this.ottCargada.num_mixer;
      this.form.trasladoProbetas = this.ottCargada.traslado_probetas;
      this.form.retiroMuestraOtros = this.ottCargada.retiro_muestra_otros;
      this.form.retiroMuestraCantidadUnDia =
        this.ottCargada.retiro_muestra_cantidad_un_dia;
      this.form.retiroMuestraCantidadTresDias =
        this.ottCargada.retiro_muestra_cantidad_tres_dias;
      this.form.retiroMuestraCantidadSieteDias =
        this.ottCargada.retiro_muestra_cantidad_siete_dias;
      this.form.retiroMuestraCantidadCatorceDias =
        this.ottCargada.retiro_muestra_cantidad_catorce_dias;
      this.form.retiroMuestraCantidadVeintiochoDias =
        this.ottCargada.retiro_muestra_cantidad_veintiocho_dias;
      this.form.retiroMuestraCantidadOtros =
        this.ottCargada.retiro_muestra_cantidad_otros;
      this.form.retiroMuestraFechaUnDia =
        this.ottCargada.retiro_muestra_fecha_un_dia;
      this.form.retiroMuestraFechaTresDias =
        this.ottCargada.retiro_muestra_fecha_tres_dias;
      this.form.retiroMuestraFechaSieteDias =
        this.ottCargada.retiro_muestra_fecha_siete_dias;
      this.form.retiroMuestraFechaCatorceDias =
        this.ottCargada.retiro_muestra_fecha_catorce_dias;
      this.form.retiroMuestraFechaVeintiochoDias =
        this.ottCargada.retiro_muestra_fecha_veintiocho_dias;
      this.form.retiroMuestraFechaOtros =
        this.ottCargada.retiro_muestra_fecha_otros;
      this.form.retiroMuestraInformeUnDia =
        this.ottCargada.retiro_muestra_informe_un_dia;
      this.form.retiroMuestraInformeTresDias =
        this.ottCargada.retiro_muestra_informe_tres_dias;
      this.form.retiroMuestraInformeSieteDias =
        this.ottCargada.retiro_muestra_informe_siete_dias;
      this.form.retiroMuestraInformeCatorceDias =
        this.ottCargada.retiro_muestra_informe_catorce_dias;
      this.form.retiroMuestraInformeVeintiochoDias =
        this.ottCargada.retiro_muestra_informe_veintiocho_dias;
      this.form.retiroMuestraInformeOtros =
        this.ottCargada.retiro_muestra_informe_otros;
      this.form.procedimientoExtraccion =
        this.ottCargada.procedimiento_extraccion;
      this.form.muestraIngresadaPorCliente =
        this.ottCargada.muestra_ingresada_por_cliente;
      this.form.fechaIngreso = this.ottCargada.fecha_ingreso;
      this.form.fechaVisitaObra = this.ottCargada.fecha_visita_obra;
      this.form.horaLlegada = this.ottCargada.hora_llegada;
      this.form.horaSalida = this.ottCargada.hora_salida;
      this.form.responsableEnObra = this.ottCargada.responsable_en_obra;
      this.form.irregularidadSuperficialMl =
        this.ottCargada.irregularidad_superficial_ml;
      this.form.observaciones = this.ottCargada.observaciones;
      this.form.alteracionMuestra = this.ottCargada.alteracion_muestra;
      this.form.observacionesAlteracionesMuestra =
        this.ottCargada.observaciones_alteraciones_muestra;
      this.form.laboratorista = this.ottCargada.laboratorista;
      this.form.ayudante = this.ottCargada.ayudante;
      this.form.recibeOMuestrea = this.ottCargada.recibe_o_muestrea;
      this.form.aridosHormigonMuestraUno =
        this.ottCargada.aridos_hormigon_muestra_uno;
      this.form.aridosHormigonMuestraDos =
        this.ottCargada.aridos_hormigon_muestra_dos;
      this.form.aridosHormigonMuestraTres =
        this.ottCargada.aridos_hormigon_muestra_tres;
      this.form.aridosHormigonMuestraCuatro =
        this.ottCargada.aridos_hormigon_muestra_cuatro;
      this.form.testigosExtraidosSeis = this.ottCargada.testigos_extraidos_seis;
      this.form.testigosExtraidosCuatro =
        this.ottCargada.testigos_extraidos_cuatro;
      this.form.testigosExtraidosTotal =
        this.ottCargada.testigos_extraidos_total;
      this.form.testigosEnsayadosSeis = this.ottCargada.testigos_ensayados_seis;
      this.form.testigosEnsayadosCuatro =
        this.ottCargada.testigos_ensayados_cuatro;
      this.form.testigosEnsayadosTotal =
        this.ottCargada.testigos_ensayados_total;

      this.form.seccionTestigosHabilitada =
        this.ottCargada.seccion_testigos_habilitada == 1
          ? true
          : this.ottCargada.seccion_testigos_habilitada;
      this.form.seccionAridosHabilitada =
        this.ottCargada.seccion_aridos_habilitada == 1
          ? true
          : this.ottCargada.seccion_aridos_habilitada;
      this.form.seccionOtrosHabilitada =
        this.ottCargada.seccion_otros_habilitada == 1
          ? true
          : this.ottCargada.seccion_otros_habilitada;
      this.form.seccionRetiroMuestrasHabilitada =
        this.ottCargada.seccion_retiro_muestras_habilitada == 1
          ? true
          : this.ottCargada.seccion_retiro_muestras_habilitada;
      this.form.tipoMoldeUno =
        this.ottCargada.tipo_molde_uno == 1
          ? true
          : this.ottCargada.tipo_molde_uno;
      this.form.tipoMoldeDos =
        this.ottCargada.tipo_molde_dos == 1
          ? true
          : this.ottCargada.tipo_molde_dos;
      this.form.tipoMoldeTres =
        this.ottCargada.tipo_molde_tres == 1
          ? true
          : this.ottCargada.tipo_molde_tres;
      this.form.tipoMoldeCuatro =
        this.ottCargada.tipo_molde_cuatro == 1
          ? true
          : this.ottCargada.tipo_molde_cuatro;
      this.form.tipoMoldeCinco =
        this.ottCargada.tipo_molde_cinco == 1
          ? true
          : this.ottCargada.tipo_molde_cinco;
      this.form.tipoMoldeSeis =
        this.ottCargada.tipo_molde_seis == 1
          ? true
          : this.ottCargada.tipo_molde_seis;
      this.form.tipoMoldeSiete =
        this.ottCargada.tipo_molde_siete == 1
          ? true
          : this.ottCargada.tipo_molde_siete;
      this.form.densAparenteHormigon =
        this.ottCargada.dens_aparente_hormigon == 1
          ? true
          : this.ottCargada.dens_aparente_hormigon;
      this.form.densAparenteMortero =
        this.ottCargada.dens_aparente_mortero == 1
          ? true
          : this.ottCargada.dens_aparente_mortero;
      this.form.indiceEsclerometrico =
        this.ottCargada.indice_esclerometrico == 1
          ? true
          : this.ottCargada.indice_esclerometrico;
      this.form.irregularidadSuperficial =
        this.ottCargada.irregularidad_superficial == 1
          ? true
          : this.ottCargada.irregularidad_superficial;
    },
    clickitem(item, value) {
      if (item == "muestreoDe") {
        this.form.muestreoDe == value
          ? (this.form.muestreoDe = "")
          : (this.form.muestreoDe = value);
      }
      if (item == "extraccion") {
        this.form.extraccion == value
          ? (this.form.extraccion = "")
          : (this.form.extraccion = value);
      }
      if (item == "compactacion") {
        this.form.compactacion == value
          ? (this.form.compactacion = "")
          : (this.form.compactacion = value);
      }
      if (item == "muestreadoPor") {
        this.form.muestreadoPor == value
          ? (this.form.muestreadoPor = "")
          : (this.form.muestreadoPor = value);
      }
      if (item == "ensayadoPor") {
        this.form.ensayadoPor == value
          ? (this.form.ensayadoPor = "")
          : (this.form.ensayadoPor = value);
      }
      if (item == "tipoMuestra") {
        this.form.tipoMuestra == value
          ? (this.form.tipoMuestra = "")
          : (this.form.tipoMuestra = value);
      }
      if (item == "trasladoProbetas") {
        this.form.trasladoProbetas == value
          ? (this.form.trasladoProbetas = "")
          : (this.form.trasladoProbetas = value);
      }
      if (item == "procedimientoExtraccion") {
        this.form.procedimientoExtraccion == value
          ? (this.form.procedimientoExtraccion = "")
          : (this.form.procedimientoExtraccion = value);
      }
      if (item == "muestraIngresadaPorCliente") {
        this.form.muestraIngresadaPorCliente == value
          ? (this.form.muestraIngresadaPorCliente = "")
          : (this.form.muestraIngresadaPorCliente = value);
      }
      if (item == "recibeOMuestrea") {
        this.form.recibeOMuestrea == value
          ? (this.form.recibeOMuestrea = "")
          : (this.form.recibeOMuestrea = value);
      }
      if (item == "alteracionMuestra") {
        this.form.alteracionMuestra == value
          ? (this.form.alteracionMuestra = "")
          : (this.form.alteracionMuestra = value);
      }
      if (item == "aridosHormigonMuestraUno") {
        this.form.aridosHormigonMuestraUno == value
          ? (this.form.aridosHormigonMuestraUno = "")
          : (this.form.aridosHormigonMuestraUno = value);
      }
      if (item == "aridosHormigonMuestraDos") {
        this.form.aridosHormigonMuestraDos == value
          ? (this.form.aridosHormigonMuestraDos = "")
          : (this.form.aridosHormigonMuestraDos = value);
      }
      if (item == "aridosHormigonMuestraTres") {
        this.form.aridosHormigonMuestraTres == value
          ? (this.form.aridosHormigonMuestraTres = "")
          : (this.form.aridosHormigonMuestraTres = value);
      }
      if (item == "aridosHormigonMuestraCuatro") {
        this.form.aridosHormigonMuestraCuatro == value
          ? (this.form.aridosHormigonMuestraCuatro = "")
          : (this.form.aridosHormigonMuestraCuatro = value);
      }
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
    "form.muestreoDe": function (newVal, oldVal) {
      if (this.form.muestreoDe == "seccionOtros") {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = true;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = false;
      } else if (this.form.muestreoDe == "seccionRetiro") {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = true;
      } else if (this.form.muestreoDe == "seccionAridos") {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = true;
        this.form.seccionRetiroMuestrasHabilitada = false;
      } else if (this.form.muestreoDe == "seccionTestigos") {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = true;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = false;
      } else if (this.form.muestreoDe == "hormigon") {
        this.form.seccionHormigonHabilitada = true;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = false;
      } else if (this.form.muestreoDe == "mortero") {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = true;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = false;
      } else {
        this.form.seccionHormigonHabilitada = false;
        this.form.seccionMorteroHabilitada = false;
        this.form.seccionOtrosHabilitada = false;
        this.form.seccionTestigosHabilitada = false;
        this.form.seccionAridosHabilitada = false;
        this.form.seccionRetiroMuestrasHabilitada = false;
      }
    },
    "form.testigosExtraidosCuatro": function (newVal, oldVal) {
      this.form.testigosExtraidosTotal =
        parseInt(this.form.testigosExtraidosCuatro) +
        parseInt(this.form.testigosExtraidosSeis);
    },
    "form.testigosExtraidosSeis": function (newVal, oldVal) {
      this.form.testigosExtraidosTotal =
        parseInt(this.form.testigosExtraidosCuatro) +
        parseInt(this.form.testigosExtraidosSeis);
    },
    "form.testigosEnsayadosSeis": function (newVal, oldVal) {
      this.form.testigosEnsayadosTotal =
        parseInt(this.form.testigosEnsayadosCuatro) +
        parseInt(this.form.testigosEnsayadosSeis);
    },
    "form.testigosEnsayadosCuatro": function (newVal, oldVal) {
      this.form.testigosEnsayadosTotal =
        parseInt(this.form.testigosEnsayadosCuatro) +
        parseInt(this.form.testigosEnsayadosSeis);
    },
    "form.muestreadoPor": function (newVal, oldVal) {
      if (newVal == "lacem") {
        this.form.ensayadoPor = "lacem";
      }
    },
  },
};
</script>
<style scoped lang="scss">
.no-click {
  pointer-events: none;
}
.container-item {
  display: flex;
  .label-item {
    margin-right: 10px;
    color: #606266;
  }
}
.contenedor-vue {
  background-color: #f5f5f5;
  padding: 10px;
  line-height: 40px;
  height: auto;
  overflow: auto;
  /deep/ .el-form-item__error {
    top: 10px;
    font-size: 14px;
    padding-left: 15px;
    color: #ffffff00;
    z-index: -1;
  }
  /deep/ .el-date-editor.el-input {
    width: 100% !important;
  }
}
.una-linea {
  white-space: nowrap;
}
.dis-flex-dir-col {
  display: flex;
  flex-direction: column;
}
.dis-flex-dir-row {
  display: flex;
  flex-direction: row;
}
.radio-molde {
  width: 100%;
  min-width: 142px;
  max-width: 180px;
  display: flex;
  /deep/ .el-radio__label {
    width: 100%;
  }
}
.item-no-margin {
  /deep/ .el-form-item__content {
    margin: 0px !important;
  }
  /deep/ .el-form-item__label-wrap {
    margin: 0px !important;
  }
}
.cantidad-otros {
  white-space: nowrap;
  /deep/ .el-form-item__content {
    display: flex;
  }
  /deep/ .el-form-item__label {
    width: auto !important;
  }
}
.tabla-aridos {
  /deep/ .el-radio__label {
    display: none;
  }
  /deep/ .el-form-item__content {
    text-align: center;
    line-height: 20px;
  }
}
.el-form-item__label-wrap {
  margin-left: 0px !important;
}
.padding-5 {
  padding: 5px;
}
.nombre-campo {
  padding: 0px 15px;
}
.margin-b-0 {
  margin-bottom: 0px;
}
.margin-b-5 {
  margin-bottom: 5px;
}
.margin-b-15 {
  margin-bottom: 15px;
}

.margin-l-5 {
  margin-left: 5px;
}
.el-row {
  height: 40px;
  height: auto !important;
  &:last-child {
    margin-bottom: 0;
  }
}
.el-col {
  border-radius: 4px;
  height: auto !important;
}
.bg-purple-dark {
  background: #99a9bf;
}
.bg-purple {
  background: #d3dce6;
}
.bg-purple-light {
  background: #e5e9f2;
}
.grid-content {
  border-radius: 4px;
  height: 44px;
  display: flex;
  flex-direction: row;
  white-space: nowrap;
  padding: 0px 3px;
}
.row-bg {
  padding: 10px 0;
  background-color: #f9fafc;
}
.el-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  text-align: left;
}
.el-form-item {
  margin-bottom: 3px;
}
/deep/ .el-form-item__label-wrap {
  margin-left: 4px !important;
}
/deep/ .el-form-item__label {
  line-height: 20px;
  text-align: left;
  min-height: 40px;
  display: flex;
  align-items: center;
}
.seccion-otros-container {
  width: auto !important;
  white-space: nowrap !important;
  display: flex !important;
  flex-direction: row;
  flex-wrap: wrap;
  /deep/ .el-form-item {
    display: flex;
    width: fit-content !important;
    margin-right: 30px;
    white-space: nowrap !important;
  }
  /deep/ .el-form-item__label {
    width: auto !important;
  }
  /deep/ .el-form-item__content {
    margin: 0px !important;
  }
}
.el-divider-5 {
  margin: 14px 0;
}
.el-divider-5 {
  margin: 5px 0;
}
.Rtable {
  display: flex;
  flex-wrap: wrap;
  margin: 0 0 3em 0;
  padding: 0;
}
.Rtable-cell {
  box-sizing: border-box;
  flex-grow: 1;
  width: 100%; // Default to full width
  padding: 1px;
  overflow: hidden; // Or flex might break
  list-style: none;
  border: 1px solid #f5f5f5;
  > h1,
  > h2,
  > h3,
  > h4,
  > h5,
  > h6 {
    margin: 0;
  }
}
.Rtable--2cols > .Rtable-cell {
  width: 50%;
}
.Rtable--3cols > .Rtable-cell {
  width: 33.33%;
}
.Rtable--4cols > .Rtable-cell {
  width: 25%;
}
.Rtable--5cols > .Rtable-cell {
  width: 20%;
}
.Rtable--6cols > .Rtable-cell {
  width: 16.6%;
}

.tabla-extraccion {
  color: #8e9198;
  display: flex;
  flex-wrap: wrap;
  margin: 0 0 3em 0;
  padding: 0;
  border-left-style: solid;
  border-top-style: solid;
  border-left-color: #8e9198;
  border-top-color: #8e9198;
  border-left-width: 1px;
  border-top-width: 1px;
}
.tabla-extraccion-cell {
  color: #8e9198;
  box-sizing: border-box;
  flex-grow: 1;
  width: 100%; // Default to full width
  padding: 1px;
  overflow: hidden; // Or flex might break
  list-style: none;
  border-right-style: solid;
  border-bottom-style: solid;
  border-right-color: #8e9198;
  border-bottom-color: #8e9198;
  border-right-width: 1px;
  border-bottom-width: 1px;
  > h1,
  > h2,
  > h3,
  > h4,
  > h5,
  > h6 {
    margin: 0;
  }
  white-space: nowrap;
}
.extraccion-cell-borde-left {
  border-left-style: solid;
  border-left-color: #8e9198;
  border-left-width: 1px;
  border-right-width: 0px;
  border-bottom-width: 0px;
  width: fit-content !important;
  padding: 0 10px;
  flex-grow: 0;
}
.tabla-extraccion--10cols > .tabla-extraccion-cell {
  width: 7%;
}

.width-15 {
  width: 70px !important;
  /deep/ .el-input__inner {
    padding: 0 5px;
  }
}
.width-35 {
  width: 35% !important;
}
.width-datepicker {
  width: 135px !important;
  max-width: 143px;
  /deep/ .el-input__inner {
    width: 135px;
  }
}
.procedimiento-extraccion-opciones,
.comentarios {
  /deep/ .el-form-item__content {
    margin-left: 0px !important;
  }
}

.tabla-aridos {
  color: #8e9198;
  display: flex;
  flex-wrap: wrap;
  margin: 0 0 3em 0;
  padding: 0;
  border-left-style: solid;
  border-top-style: solid;
  border-left-color: #8e9198;
  border-top-color: #8e9198;
  border-left-width: 1px;
  border-top-width: 1px;
}
.tabla-aridos-cell {
  color: #8e9198;
  box-sizing: border-box;
  flex-grow: 1;
  width: 100%; // Default to full width
  padding: 0 4px;
  overflow: hidden; // Or flex might break
  list-style: none;
  border-right-style: solid;
  border-bottom-style: solid;
  border-right-color: #8e9198;
  border-bottom-color: #8e9198;
  border-right-width: 1px;
  border-bottom-width: 1px;
  > h1,
  > h2,
  > h3,
  > h4,
  > h5,
  > h6 {
    margin: 0;
  }
  white-space: nowrap;
  line-height: 20px;
}
.seccion-otros {
  /deep/ .el-date-editor.el-input {
    width: 140px !important;
  }
}
.form-item-no-label {
  /deep/ .el-form-item__content {
    margin-left: 0px !important;
  }
}
</style>