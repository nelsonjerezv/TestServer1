<template>
    <div class="contenedor-vue">
        <el-form ref="formularioCompresion" :model="form" :rules="reglas" label-width="150px">
            <el-row >
                <el-col :span="8" >
                    <el-form-item label="N° Muestra" prop="numMuestra">
                        <el-input class="no-click" v-model="form.numIngreso"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8" >
                    <el-form-item label="N° OTT" prop="OTT">
                        <el-select
                            v-model="form.OTT"
                            filterable
                            clearable
                            remote
                            reserve-keyword
                            placeholder="Seleccione OTT"
                            :remote-method="querySearchNumeroOtt"
                            :loading="loading">
                            <el-option
                                v-for="item in opcionesSearchBoxOTT"
                                :key="item.id"
                                :label="item.value"
                                :value="item.value">
                            </el-option>
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :span="8" >
                    <el-form-item label="N° Informe" prop="numInforme">
                        <el-input v-model="form.numInforme"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider />
            <el-row >
                <el-col :span="24">
                    M&eacute;todo de curado
                </el-col>
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
                    <el-form-item label="Error: 150mm (%)" prop="errorCientoCincuentaMm">
                        <el-input v-model="form.errorCientoCincuentaMm"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item label="Error: 300mm (%)" prop="errorTrescientosMm">
                        <el-input v-model="form.errorTrescientosMm"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item label="Marmita N°" prop="numMarmita">
                        <el-input v-model="form.numMarmita"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8">
                    <el-form-item label="Dispositivo de refrentado N°" prop="numDispositivoRefrentado">
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
                    <div class="texto">
                        Probeta N°
                    </div>
                    <div class="texto-muestras">
                        1
                    </div>
                    <div class="texto-muestras">
                        2
                    </div>
                    <div class="texto-muestras">
                        3
                    </div>
                    <div class="texto-muestras">
                        4
                    </div>
                </el-col>
                <!-- Nº de molde -->
                <el-col :span="24">
                    <div class="texto">
                        Nº de molde
                    </div>
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
                    <div class="texto">
                        Fecha de Confección
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaConfeccionMuestraUno">
                            <el-input class="no-click" v-model="form.fechaConfeccionMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaConfeccionMuestraDos">
                            <el-input class="no-click" v-model="form.fechaConfeccionMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaConfeccionMuestraTres">
                            <el-input class="no-click" v-model="form.fechaConfeccionMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaConfeccionMuestraCuatro">
                            <el-input class="no-click" v-model="form.fechaConfeccionMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Fecha de Ensayo -->
                <el-col :span="24">
                    <div class="texto">
                        Fecha de Ensayo
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaEnsayoMuestraUno">
                            <el-date-picker
                                v-model="form.fechaEnsayoMuestraUno"
                                type="date"
                                size="mini"
                                format="dd-MM-yyyy"
                                value-format="dd-MM-yyyy">
                            </el-date-picker>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaEnsayoMuestraDos">
                            <el-date-picker
                                v-model="form.fechaEnsayoMuestraDos"
                                type="date"
                                size="mini"
                                format="dd-MM-yyyy"
                                value-format="dd-MM-yyyy">
                            </el-date-picker>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaEnsayoMuestraTres">
                            <el-date-picker
                                v-model="form.fechaEnsayoMuestraTres"
                                type="date"
                                size="mini"
                                format="dd-MM-yyyy"
                                value-format="dd-MM-yyyy">
                            </el-date-picker>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="fechaEnsayoMuestraCuatro">
                            <el-date-picker
                                v-model="form.fechaEnsayoMuestraCuatro"
                                type="date"
                                size="mini"
                                format="dd-MM-yyyy"
                                value-format="dd-MM-yyyy">
                            </el-date-picker>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Edad - Días -->
                <el-col :span="24">
                    <div class="texto">
                        Edad - Días
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="edadDiasMuestraUno">
                            <el-input v-model="form.edadDiasMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="edadDiasMuestraDos">
                            <el-input v-model="form.edadDiasMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="edadDiasMuestraTres">
                            <el-input v-model="form.edadDiasMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="edadDiasMuestraCuatro">
                            <el-input v-model="form.edadDiasMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Refrentado -->
                <el-col :span="24">
                    <div class="texto">
                        Refrentado
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
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="perpendicularidadMuestraUno">
                            <el-checkbox v-model="form.perpendicularidadMuestraUno"></el-checkbox>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="perpendicularidadMuestraDos">
                            <el-checkbox v-model="form.perpendicularidadMuestraDos"></el-checkbox>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="perpendicularidadMuestraTres">
                            <el-checkbox v-model="form.perpendicularidadMuestraTres"></el-checkbox>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="perpendicularidadMuestraCuatro">
                            <el-checkbox v-model="form.perpendicularidadMuestraCuatro"></el-checkbox>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- planeidad -->
                <el-col :span="24">
                    <div class="texto">
                        planeidad
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
                    <div class="texto-ancho-full">
                        Dimensiones
                    </div>
                </el-col>
                <!-- d 1 -->
                <el-col :span="24">
                    <div class="texto">
                        d 1
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
                    <div class="texto-ancho-full">
                        Dimensiones Corregidas
                    </div>
                </el-col>
                <!-- d 1 -->
                <el-col :span="24">
                    <div class="texto">
                        d 1'
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dUnoMuestraUnoCorregida">
                            <el-input class="no-click" v-model="form.dUnoMuestraUnoCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dUnoMuestraDosCorregida">
                            <el-input class="no-click" v-model="form.dUnoMuestraDosCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dUnoMuestraTresCorregida">
                            <el-input class="no-click" v-model="form.dUnoMuestraTresCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dUnoMuestraCuatroCorregida">
                            <el-input class="no-click" v-model="form.dUnoMuestraCuatroCorregida"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- d 2 -->
                <el-col :span="24">
                    <div class="texto">
                        d 2'
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dDosMuestraUnoCorregida">
                            <el-input class="no-click" v-model="form.dDosMuestraUnoCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dDosMuestraDosCorregida">
                            <el-input class="no-click" v-model="form.dDosMuestraDosCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dDosMuestraTresCorregida">
                            <el-input class="no-click" v-model="form.dDosMuestraTresCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="dDosMuestraCuatroCorregida">
                            <el-input class="no-click" v-model="form.dDosMuestraCuatroCorregida"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- h 1-->
                <el-col :span="24">
                    <div class="texto">
                        h 1'
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hUnoMuestraUnoCorregida">
                            <el-input class="no-click" v-model="form.hUnoMuestraUnoCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hUnoMuestraDosCorregida">
                            <el-input class="no-click" v-model="form.hUnoMuestraDosCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hUnoMuestraTresCorregida">
                            <el-input class="no-click" v-model="form.hUnoMuestraTresCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hUnoMuestraCuatroCorregida">
                            <el-input class="no-click" v-model="form.hUnoMuestraCuatroCorregida"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- h 2 -->
                <el-col :span="24">
                    <div class="texto">
                        h 2'
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hDosMuestraUnoCorregida">
                            <el-input class="no-click" v-model="form.hDosMuestraUnoCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hDosMuestraDosCorregida">
                            <el-input class="no-click" v-model="form.hDosMuestraDosCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hDosMuestraTresCorregida">
                            <el-input class="no-click" v-model="form.hDosMuestraTresCorregida"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="hDosMuestraCuatroCorregida">
                            <el-input class="no-click" v-model="form.hDosMuestraCuatroCorregida"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- h refrentado -->
                <el-col :span="24">
                    <div class="texto">
                        h refrentado'
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="refrentadoCorregidoMuestraUno">
                            <el-input class="no-click" v-model="form.refrentadoCorregidoMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="refrentadoCorregidoMuestraDos">
                            <el-input class="no-click" v-model="form.refrentadoCorregidoMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="refrentadoCorregidoMuestraTres">
                            <el-input class="no-click" v-model="form.refrentadoCorregidoMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="refrentadoCorregidoMuestraCuatro">
                            <el-input class="no-click" v-model="form.refrentadoCorregidoMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Masa -->
                <el-col :span="24">
                    <div class="texto">
                        Masa
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
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="masaCorregidaMuestraUno">
                            <el-input class="no-click" v-model="form.masaCorregidaMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="masaCorregidaMuestraDos">
                            <el-input class="no-click" v-model="form.masaCorregidaMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="masaCorregidaMuestraTres">
                            <el-input class="no-click" v-model="form.masaCorregidaMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="masaCorregidaMuestraCuatro">
                            <el-input class="no-click" v-model="form.masaCorregidaMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Volumen -->
                <el-col :span="24">
                    <div class="texto">
                        Volumen
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
                        Volumen m3
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="volumenMetroCubicoMuestraUno">
                            <el-input v-model="form.volumenMetroCubicoMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="volumenMetroCubicoMuestraDos">
                            <el-input v-model="form.volumenMetroCubicoMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="volumenMetroCubicoMuestraTres">
                            <el-input v-model="form.volumenMetroCubicoMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="volumenMetroCubicoMuestraCuatro">
                            <el-input v-model="form.volumenMetroCubicoMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Densidad -->
                <el-col :span="24">
                    <div class="texto">
                        Densidad (masa / vol)
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="densidadMuestraUno">
                            <el-input class="no-click" v-model="form.densidadMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="densidadMuestraDos">
                            <el-input class="no-click" v-model="form.densidadMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="densidadMuestraTres">
                            <el-input class="no-click" v-model="form.densidadMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="densidadMuestraCuatro">
                            <el-input class="no-click" v-model="form.densidadMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Area -->
                <el-col :span="24">
                    <div class="texto">
                        Área = 0,196 ( d1'+d2' )2
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="areaMuestraUno">
                            <el-input v-model="form.areaMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="areaMuestraDos">
                            <el-input v-model="form.areaMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="areaMuestraTres">
                            <el-input v-model="form.areaMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="areaMuestraCuatro">
                            <el-input v-model="form.areaMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- P (Carga de ensayo) -->
                <el-col :span="24">
                    <div class="texto">
                        P (Carga de ensayo)
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
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="cargaEnsayoMilMuestraUno">
                            <el-input v-model="form.cargaEnsayoMilMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="cargaEnsayoMilMuestraDos">
                            <el-input v-model="form.cargaEnsayoMilMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="cargaEnsayoMilMuestraTres">
                            <el-input v-model="form.cargaEnsayoMilMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="cargaEnsayoMilMuestraCuatro">
                            <el-input v-model="form.cargaEnsayoMilMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Tiempo de Carga -->
                <el-col :span="24">
                    <div class="texto">
                        Tiempo de Carga
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
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="errorresistenciaCompresionraUno">
                            <el-input v-model="form.resistenciaCompresionMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCompresionMuestraDos">
                            <el-input v-model="form.resistenciaCompresionMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCompresionMuestraTres">
                            <el-input v-model="form.resistenciaCompresionMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCompresionMuestraCuatro">
                            <el-input v-model="form.resistenciaCompresionMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Factores Conversion -->
                <el-col :span="24">
                    <div class="texto">
                        Factores de conversión cil. 15x30  a  cubo 20x20
                        <br>
                        Fcil  a 20 MPa * 1,25 | Fcil  20 Mpa ver nota (*)
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="factoresConversionMuestraUno">
                            <el-input v-model="form.factoresConversionMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="factoresConversionMuestraDos">
                            <el-input v-model="form.factoresConversionMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="factoresConversionMuestraTres">
                            <el-input v-model="form.factoresConversionMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="factoresConversionMuestraCuatro">
                            <el-input v-model="form.factoresConversionMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Resistencia Corregida -->
                <el-col :span="24">
                    <div class="texto">
                        Resistencia Corregida
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCorregidaMuestraUno">
                            <el-input v-model="form.resistenciaCorregidaMuestraUno"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCorregidaMuestraDos">
                            <el-input v-model="form.resistenciaCorregidaMuestraDos"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCorregidaMuestraTres">
                            <el-input v-model="form.resistenciaCorregidaMuestraTres"></el-input>
                        </el-form-item>
                    </div>
                    <div class="texto-muestras">
                        <el-form-item prop="resistenciaCorregidaMuestraCuatro">
                            <el-input v-model="form.resistenciaCorregidaMuestraCuatro"></el-input>
                        </el-form-item>
                    </div>
                </el-col>
                <!-- Velocidad de ensayo -->
                <el-col :span="24">
                    <div class="texto">
                        Velocidad de ensayo
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
                        Velocidad
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
                    <div class="texto-ancho-full">
                        Observaciones
                    </div>
                </el-col>
                <el-col :span="24">
                    <el-form-item prop="observaciones">
                        <el-input type="textarea" autosize v-model="form.observaciones">
                        </el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8" >
                    <el-form-item label="Ensayado por" prop="ensayadoPor">
                        <el-input v-model="form.ensayadoPor"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="8" >
                    <el-form-item label="Fecha" prop="fecha">
                        <el-date-picker
                            v-model="form.fecha"
                            type="date"
                            size="mini"
                            format="dd-MM-yyyy"
                            value-format="dd-MM-yyyy">
                        </el-date-picker>
                    </el-form-item>
                </el-col>
                <el-col :span="8" >
                    <el-form-item label="V°B°" prop="vb">
                        <el-input v-model="form.vb"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider />
            <el-form-item class="container-botones" prop="">
                <el-button type="primary" @click="onSubmit('formularioCompresion')" plain>Crear Ensayo</el-button>
                <el-popconfirm
                    confirm-button-text='Vaciar campos'
                    cancel-button-text='volver'
                    @confirm="resetForm('formularioCompresion')"
                    placement="right"
                    icon="el-icon-info"
                    icon-color="red"
                    :hide-icon="true"
                    title="Está seguro quiere vaciar todos los campos?">
                    <el-button slot="reference" plain>Vaciar campos</el-button>
                </el-popconfirm>
            </el-form-item>
        </el-form>
    </div>
</template>

<script>
    import Tools from '../../../tools.js';
    import moment from 'moment'

    Vue.prototype.moment = moment

    export default {
        data() {
            return {
                urlGuardarEnsayo: `${GLOBAL.URL}ensayos/guardar-ensayo-compresion`,
                urlBuscarOtt: `${GLOBAL.URL}ensayos/buscar-ott`,
                timeout:  null,
                ordenSeleccionada: '',
                ordenes: [],
                opcionesSearchBoxOTT: [],
                loading: false,
                cantidadDecimales: 2,
                pickerOptionsFechaEnsayo:{
                    // disabledDate(time) {
                        //     this.calculaFechaEnsayoInicio()
                    //     return time.getTime() > Date.now();
                    // },
                },
                form: {
                    numIngreso: 'Cargado desde la OTT',
                    OTT: '',
                    numInforme: '',
                    camaraHumeda: '',
                    piscina: '',
                    balanza: '',
                    numPieDeMetro: '',
                    numPrensa: '',
                    numCronometro: '',
                    errorCientoCincuentaMm: 0,
                    errorTrescientosMm: 0,
                    numMarmita: '',
                    numDispositivoRefrentado: '',
                    numMicrometro: '',
                    numMoldeMuestraUno: '',
                    numMoldeMuestraDos: '',
                    numMoldeMuestraTres: '',
                    numMoldeMuestraCuatro: '',
                    fechaConfeccionMuestraUno: 'Cargado desde OTT',
                    fechaConfeccionMuestraDos: 'Cargado desde OTT',
                    fechaConfeccionMuestraTres: 'Cargado desde OTT',
                    fechaConfeccionMuestraCuatro: 'Cargado desde OTT',
                    fechaEnsayoMuestraUno: '',
                    fechaEnsayoMuestraDos: '',
                    fechaEnsayoMuestraTres: '',
                    fechaEnsayoMuestraCuatro: '',
                    edadDiasMuestraUno: '',
                    edadDiasMuestraDos: '',
                    edadDiasMuestraTres: '',
                    edadDiasMuestraCuatro: '',
                    refrentadoMuestraUno: '',
                    refrentadoMuestraDos: '',
                    refrentadoMuestraTres: '',
                    refrentadoMuestraCuatro: '',
                    refrentadoCorregidoMuestraUno: '',
                    refrentadoCorregidoMuestraDos: '',
                    refrentadoCorregidoMuestraTres: '',
                    refrentadoCorregidoMuestraCuatro: '',
                    perpendicularidadMuestraUno: '',
                    perpendicularidadMuestraDos: '',
                    perpendicularidadMuestraTres: '',
                    perpendicularidadMuestraCuatro: '',
                    planeidadMuestraUno: '',
                    planeidadMuestraDos: '',
                    planeidadMuestraTres: '',
                    planeidadMuestraCuatro: '',
                    espesorSuperiorMuestraUno: '',
                    espesorSuperiorMuestraDos: '',
                    espesorSuperiorMuestraTres: '',
                    espesorSuperiorMuestraCuatro: '',
                    espesorInferiorMuestraUno: '',
                    espesorInferiorMuestraDos: '',
                    espesorInferiorMuestraTres: '',
                    espesorInferiorMuestraCuatro: '',
                    espesorPromedioMuestraUno: '',
                    espesorPromedioMuestraDos: '',
                    espesorPromedioMuestraTres: '',
                    espesorPromedioMuestraCuatro: '',
                    dUnoMuestraUno: '',
                    dUnoMuestraDos: '',
                    dUnoMuestraTres: '',
                    dUnoMuestraCuatro: '',
                    dDosMuestraUno: '',
                    dDosMuestraDos: '',
                    dDosMuestraTres: '',
                    dDosMuestraCuatro: '',
                    hUnoMuestraUno: '',
                    hUnoMuestraDos: '',
                    hUnoMuestraTres: '',
                    hUnoMuestraCuatro: '',
                    hDosMuestraUno: '',
                    hDosMuestraDos: '',
                    hDosMuestraTres: '',
                    hDosMuestraCuatro: '',
                    refrentadoUno: '',
                    refrentadoDos: '',
                    refrentadoTres: '',
                    refrentadoCuatro: '',
                    dUnoMuestraUnoCorregida: '',
                    dUnoMuestraDosCorregida: '',
                    dUnoMuestraTresCorregida: '',
                    dUnoMuestraCuatroCorregida: '',
                    dDosMuestraUnoCorregida: '',
                    dDosMuestraDosCorregida: '',
                    dDosMuestraTresCorregida: '',
                    dDosMuestraCuatroCorregida: '',
                    hUnoMuestraUnoCorregida: '',
                    hUnoMuestraDosCorregida: '',
                    hUnoMuestraTresCorregida: '',
                    hUnoMuestraCuatroCorregida: '',
                    hDosMuestraUnoCorregida: '',
                    hDosMuestraDosCorregida: '',
                    hDosMuestraTresCorregida: '',
                    hDosMuestraCuatroCorregida: '',
                    masaMuestraUno: '',
                    masaMuestraDos: '',
                    masaMuestraTres: '',
                    masaMuestraCuatro: '',
                    errorMuestraUno: '',
                    errorMuestraDos: '',
                    errorMuestraTres: '',
                    errorMuestraCuatro: '',
                    masaCorregidaMuestraUno: '',
                    masaCorregidaMuestraDos: '',
                    masaCorregidaMuestraTres: '',
                    masaCorregidaMuestraCuatro: '',
                    volumenMuestraUno: '',
                    volumenMuestraDos: '',
                    volumenMuestraTres: '',
                    volumenMuestraCuatro: '',
                    volumenMetroCubicoMuestraUno: '',
                    volumenMetroCubicoMuestraDos: '',
                    volumenMetroCubicoMuestraTres: '',
                    volumenMetroCubicoMuestraCuatro: '',
                    densidadMuestraUno: '',
                    densidadMuestraDos: '',
                    densidadMuestraTres: '',
                    densidadMuestraCuatro: '',
                    areaMuestraUno: '',
                    areaMuestraDos: '',
                    areaMuestraTres: '',
                    areaMuestraCuatro: '',
                    cargaEnsayoMuestraUno: '',
                    cargaEnsayoMuestraDos: '',
                    cargaEnsayoMuestraTres: '',
                    cargaEnsayoMuestraCuatro: '',
                    cargaEnsayoMilMuestraUno: '',
                    cargaEnsayoMilMuestraDos: '',
                    cargaEnsayoMilMuestraTres: '',
                    cargaEnsayoMilMuestraCuatro: '',
                    tiempoCargaMuestraUno: '',
                    tiempoCargaMuestraDos: '',
                    tiempoCargaMuestraTres: '',
                    tiempoCargaMuestraCuatro: '',
                    resistenciaCompresionMuestraUno: '',
                    resistenciaCompresionMuestraDos: '',
                    resistenciaCompresionMuestraTres: '',
                    resistenciaCompresionMuestraCuatro: '',
                    factoresConversionMuestraUno: '',
                    factoresConversionMuestraDos: '',
                    factoresConversionMuestraTres: '',
                    factoresConversionMuestraCuatro: '',
                    resistenciaCorregidaMuestraUno: '',
                    resistenciaCorregidaMuestraDos: '',
                    resistenciaCorregidaMuestraTres: '',
                    resistenciaCorregidaMuestraCuatro: '',
                    velocidadEnsayoMuestraUno: '',
                    velocidadEnsayoMuestraDos: '',
                    velocidadEnsayoMuestraTres: '',
                    velocidadEnsayoMuestraCuatro: '',
                    tipoRoturaMuestraUno: '',
                    tipoRoturaMuestraDos: '',
                    tipoRoturaMuestraTres: '',
                    tipoRoturaMuestraCuatro: '',
                    aseguramientoMuestraUno: '',
                    aseguramientoMuestraDos: '',
                    aseguramientoMuestraTres: '',
                    aseguramientoMuestraCuatro: '',
                    cumpleMuestraUno: false,
                    cumpleMuestraDos: false,
                    cumpleMuestraTres: false,
                    cumpleMuestraCuatro: false,
                    velocidadMuestraUno: false,
                    velocidadMuestraDos: false,
                    velocidadMuestraTres: false,
                    velocidadMuestraCuatro: false,
                    observaciones: '',
                    ensayadoPor: '',
                    fecha: '',
                    vb: ''
                },
                reglas: {
                    numIngreso: [ { required: true, message: '', trigger: 'blur' } ],
                    OTT: [ { required: true, message: '', trigger: 'change' } ],
                    numInforme: [ { required: true, message: '', trigger: 'blur' } ],
                    camaraHumeda: [ { required: true, message: '', trigger: 'blur' } ],
                    piscina: [ { required: true, message: '', trigger: 'blur' } ],
                    balanza: [ { required: true, message: '', trigger: 'blur' } ],
                    numPieDeMetro: [ { required: true, message: '', trigger: 'blur' } ],
                    numPrensa: [ { required: true, message: '', trigger: 'blur' } ],
                    numCronometro: [ { required: true, message: '', trigger: 'blur' } ],
                    errorTrescientosMm: [ { required: true, message: '', trigger: 'blur' } ],
                    numMarmita: [ { required: true, message: '', trigger: 'blur' } ],
                    numDispositivoRefrentado: [ { required: true, message: '', trigger: 'blur' } ],
                    numMicrometro: [ { required: true, message: '', trigger: 'blur' } ],
                    numMoldeMuestraUno: [ { required: true, message: '', trigger: 'blur' } ],
                    numMoldeMuestraDos: [ { required: true, message: '', trigger: 'blur' } ],
                    numMoldeMuestraTres: [ { required: true, message: '', trigger: 'blur' } ],
                    numMoldeMuestraCuatro: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaConfeccionMuestraUno: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaConfeccionMuestraDos: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaConfeccionMuestraTres: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaConfeccionMuestraCuatro: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaEnsayoMuestraUno: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaEnsayoMuestraDos: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaEnsayoMuestraTres: [ { required: true, message: '', trigger: 'blur' } ],
                    fechaEnsayoMuestraCuatro: [ { required: true, message: '', trigger: 'blur' } ],
                    edadDiasMuestraUno: [ { required: true, message: '', trigger: 'blur' } ],
                    edadDiasMuestraDos: [ { required: true, message: '', trigger: 'blur' } ],
                    edadDiasMuestraTres: [ { required: true, message: '', trigger: 'blur' } ],
                    edadDiasMuestraCuatro: [ { required: true, message: '', trigger: 'blur' } ],
                }
            }
        },
        methods: {
            onSubmit(nombreEnsayo) {
                // this.$refs[nombreEnsayo].validate((valid) => {
                //     if (valid) {
                        this.$http.post(this.urlGuardarEnsayo,{
                            ensayo: this.form
                        }).then(response => {
                            if(response.body[1] == true){
                                Tools.mensajeAlerta("Ensayo guardado. Será redirigido a la lista de ensayos en 5 segundos.", Tools.MENSAJE.EXITO, '', 5);
                                setTimeout(()=>{
                                    this.$emit("cambiaMain", {vista: "ListadoEnsayosCompresionProbetasCilindricas", condicion:''});
                                }, 5000);
                            } else{
                                if(response.body[0].errorInfo[0] == "23000"){
                                    return Tools.mensajeAlerta("Ya existe un ensayo con este número de informe en la base de datos.", Tools.MENSAJE.ERROR, '', 5);
                                }
                                return Tools.mensajeAlerta("No se pudo guardar el ensayo.", Tools.MENSAJE.ERROR, '', 5);
                            }
                        }, response => {
                            console.log(response)
                            Tools.mensajeAlerta("No se pudo guardar el ensayo.", Tools.MENSAJE.ERROR, '', 5);
                        });
                //     } else {
                //         Tools.mensajeAlerta("Faltan campos que llenar en el ensayo.", Tools.MENSAJE.ADVERTENCIA, '', 5);
                //         return false;
                //     }
                // });
            },
            resetForm(nombreFormulario) {
                this.$refs[nombreFormulario].resetFields();
            },
            querySearchNumeroOtt(query) {
                if (query !== '') {
                    this.loading = true;

                    this.$http.get(this.urlBuscarOtt + '/' + query, {
                    }).then(response => {
                        this.loading = false;
                        let resultados = response.body;
                        var results = resultados.length > 0 ? resultados.map(orden => {return {'value': orden.num_ott,
                                                                                               'id': orden.num_ott}} ) : [];
                        // console.log('resultados', this.opcionesSearchBoxOTT);
                        this.opcionesSearchBoxOTT = results;
                        this.ordenes = resultados;
                    }, response => {
                        console.log(response)
                        Tools.mensajeAlerta("No se pudo encontrar ott para su criterio de busqueda.", Tools.MENSAJE.ERROR, '', 5);
                    });
                }
            },
            calculaDiametroCorregido(){
                var error              = parseFloat(this.form.errorCientoCincuentaMm);
                var dUnoMuestraUno     = parseFloat(this.form.dUnoMuestraUno);
                var dDosMuestraUno     = parseFloat(this.form.dDosMuestraUno);
                var dUnoMuestraDos     = parseFloat(this.form.dUnoMuestraDos);
                var dDosMuestraDos     = parseFloat(this.form.dDosMuestraDos);
                var dUnoMuestraTres    = parseFloat(this.form.dUnoMuestraTres);
                var dDosMuestraTres    = parseFloat(this.form.dDosMuestraTres);
                var dUnoMuestraCuatro  = parseFloat(this.form.dUnoMuestraCuatro);
                var dDosMuestraCuatro  = parseFloat(this.form.dDosMuestraCuatro);
                let calc;
                if( isNaN(error)){
                    this.form.dUnoMuestraUnoCorregida = 'No valido';
                    this.form.dDosMuestraUnoCorregida = 'No valido';
                    this.form.dUnoMuestraDosCorregida = 'No valido';
                    this.form.dDosMuestraDosCorregida = 'No valido';
                    this.form.dUnoMuestraTresCorregida = 'No valido';
                    this.form.dDosMuestraTresCorregida = 'No valido';
                    this.form.dUnoMuestraCuatroCorregida = 'No valido';
                    this.form.dDosMuestraCuatroCorregida = 'No valido';
                }
                if( !isNaN(dUnoMuestraUno) && !isNaN(error) ){
                    calc = dUnoMuestraUno * error/100;
                    this.form.dUnoMuestraUnoCorregida = (dUnoMuestraUno - calc).toFixed(this.cantidadDecimales) + ', ' + (dUnoMuestraUno + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dUnoMuestraUnoCorregida = 'No valido'; }
                if( !isNaN(dDosMuestraUno) && !isNaN(error) ){
                    calc = dDosMuestraUno * error/100;
                    this.form.dDosMuestraUnoCorregida = (dDosMuestraUno - calc).toFixed(this.cantidadDecimales) + ', ' + (dDosMuestraUno + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dDosMuestraUnoCorregida = 'No valido'; }
                if( !isNaN(dUnoMuestraDos) && !isNaN(error) ){
                    calc = dUnoMuestraDos * error/100;
                    this.form.dUnoMuestraDosCorregida = (dUnoMuestraDos - calc).toFixed(this.cantidadDecimales) + ', ' + (dUnoMuestraDos + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dUnoMuestraDosCorregida = 'No valido'; }
                if( !isNaN(dDosMuestraDos) && !isNaN(error) ){
                    calc = dDosMuestraDos * error/100;
                    this.form.dDosMuestraDosCorregida = (dDosMuestraDos - calc).toFixed(this.cantidadDecimales) + ', ' + (dDosMuestraDos + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dDosMuestraDosCorregida = 'No valido'; }
                if( !isNaN(dUnoMuestraTres) && !isNaN(error) ){
                    calc = dUnoMuestraTres * error/100;
                    this.form.dUnoMuestraTresCorregida = (dUnoMuestraTres - calc).toFixed(this.cantidadDecimales) + ', ' + (dUnoMuestraTres + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dUnoMuestraTresCorregida = 'No valido'; }
                if( !isNaN(dDosMuestraTres) && !isNaN(error) ){
                    calc = dDosMuestraTres * error/100;
                    this.form.dDosMuestraTresCorregida = (dDosMuestraTres - calc).toFixed(this.cantidadDecimales) + ', ' + (dDosMuestraTres + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dDosMuestraTresCorregida = 'No valido'; }
                if( !isNaN(dUnoMuestraCuatro) && !isNaN(error) ){
                    calc = dUnoMuestraCuatro * error/100;
                    this.form.dUnoMuestraCuatroCorregida = (dUnoMuestraCuatro - calc).toFixed(this.cantidadDecimales) + ', ' + (dUnoMuestraCuatro + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dUnoMuestraCuatroCorregida = 'No valido'; }
                if( !isNaN(dDosMuestraCuatro) && !isNaN(error) ){
                    calc = dDosMuestraCuatro * error/100;
                    this.form.dDosMuestraCuatroCorregida = (dDosMuestraCuatro - calc).toFixed(this.cantidadDecimales) + ', ' + (dDosMuestraCuatro + calc).toFixed(this.cantidadDecimales);
                } else{ this.form.dDosMuestraCuatroCorregida = 'No valido'; }
            },
            calculaLongitudCorregida(){
                var error              = parseFloat(this.form.errorTrescientosMm);
                var hUnoMuestraUno     = parseFloat(this.form.hUnoMuestraUno);
                var hDosMuestraUno     = parseFloat(this.form.hDosMuestraUno);
                var hUnoMuestraDos     = parseFloat(this.form.hUnoMuestraDos);
                var hDosMuestraDos     = parseFloat(this.form.hDosMuestraDos);
                var hUnoMuestraTres    = parseFloat(this.form.hUnoMuestraTres);
                var hDosMuestraTres    = parseFloat(this.form.hDosMuestraTres);
                var hUnoMuestraCuatro  = parseFloat(this.form.hUnoMuestraCuatro);
                var hDosMuestraCuatro  = parseFloat(this.form.hDosMuestraCuatro);
                var refrentadoUno      = parseFloat(this.form.refrentadoUno);
                var refrentadoDos      = parseFloat(this.form.refrentadoDos);
                var refrentadoTres     = parseFloat(this.form.refrentadoTres);
                var refrentadoCuatro   = parseFloat(this.form.refrentadoCuatro);
                let calc;
                if( isNaN(error)){
                    this.form.hUnoMuestraUnoCorregida = 'No valido';
                    this.form.hDosMuestraUnoCorregida = 'No valido';
                    this.form.hUnoMuestraDosCorregida = 'No valido';
                    this.form.hDosMuestraDosCorregida = 'No valido';
                    this.form.hUnoMuestraTresCorregida = 'No valido';
                    this.form.hDosMuestraTresCorregida = 'No valido';
                    this.form.hUnoMuestraCuatroCorregida = 'No valido';
                    this.form.hDosMuestraCuatroCorregida = 'No valido';
                    this.form.refrentadoCorregidoMuestraUno = 'No valido';
                    this.form.refrentadoCorregidoMuestraDos = 'No valido';
                    this.form.refrentadoCorregidoMuestraTres = 'No valido';
                    this.form.refrentadoCorregidoMuestraCuatro = 'No valido';
                }
                if( !isNaN(hUnoMuestraUno) && !isNaN(error) ){
                    calc = hUnoMuestraUno * error/100;
                    this.form.hUnoMuestraUnoCorregida = (hUnoMuestraUno - calc).toFixed(this.cantidadDecimales) + ', ' + (hUnoMuestraUno + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hUnoMuestraUnoCorregida = 'No valido'; }
                if( !isNaN(hDosMuestraUno) && !isNaN(error) ){
                    calc = hDosMuestraUno * error/100;
                    this.form.hDosMuestraUnoCorregida = (hDosMuestraUno - calc).toFixed(this.cantidadDecimales) + ', ' + (hDosMuestraUno + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hDosMuestraUnoCorregida = 'No valido'; }
                if( !isNaN(hUnoMuestraDos) && !isNaN(error) ){
                    calc = hUnoMuestraDos * error/100;
                    this.form.hUnoMuestraDosCorregida = (hUnoMuestraDos - calc).toFixed(this.cantidadDecimales) + ', ' + (hUnoMuestraDos + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hUnoMuestraDosCorregida = 'No valido'; }
                if( !isNaN(hDosMuestraDos) && !isNaN(error) ){
                    calc = hDosMuestraDos * error/100;
                    this.form.hDosMuestraDosCorregida = (hDosMuestraDos - calc).toFixed(this.cantidadDecimales) + ', ' + (hDosMuestraDos + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hDosMuestraDosCorregida = 'No valido'; }
                if( !isNaN(hUnoMuestraTres) && !isNaN(error) ){
                    calc = hUnoMuestraTres * error/100;
                    this.form.hUnoMuestraTresCorregida = (hUnoMuestraTres - calc).toFixed(this.cantidadDecimales) + ', ' + (hUnoMuestraTres + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hUnoMuestraTresCorregida = 'No valido'; }
                if( !isNaN(hDosMuestraTres) && !isNaN(error) ){
                    calc = hDosMuestraTres * error/100;
                    this.form.hDosMuestraTresCorregida = (hDosMuestraTres - calc).toFixed(this.cantidadDecimales) + ', ' + (hDosMuestraTres + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hDosMuestraTresCorregida = 'No valido'; }
                if( !isNaN(hUnoMuestraCuatro) && !isNaN(error) ){
                    calc = hUnoMuestraCuatro * error/100;
                    this.form.hUnoMuestraCuatroCorregida = (hUnoMuestraCuatro - calc).toFixed(this.cantidadDecimales) + ', ' + (hUnoMuestraCuatro + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hUnoMuestraCuatroCorregida = 'No valido'; }
                if( !isNaN(hDosMuestraCuatro) && !isNaN(error) ){
                    calc = hDosMuestraCuatro * error/100;
                    this.form.hDosMuestraCuatroCorregida = (hDosMuestraCuatro - calc).toFixed(this.cantidadDecimales) + ', ' + (hDosMuestraCuatro + calc).toFixed(this.cantidadDecimales);
                } else { this.form.hDosMuestraCuatroCorregida = 'No valido'; }
                if( !isNaN(refrentadoUno) && !isNaN(error) ){
                    calc = refrentadoUno * error/100;
                    this.form.refrentadoCorregidoMuestraUno = (refrentadoUno - calc).toFixed(this.cantidadDecimales) + ', ' + (refrentadoUno + calc).toFixed(this.cantidadDecimales);
                } else { this.form.refrentadoCorregidoMuestraUno = 'No valido'; }
                if( !isNaN(refrentadoDos) && !isNaN(error) ){
                    calc = refrentadoDos * error/100;
                    this.form.refrentadoCorregidoMuestraDos = (refrentadoDos - calc).toFixed(this.cantidadDecimales) + ', ' + (refrentadoDos + calc).toFixed(this.cantidadDecimales);
                } else { this.form.refrentadoCorregidoMuestraDos = 'No valido'; }
                if( !isNaN(refrentadoTres) && !isNaN(error) ){
                    calc = refrentadoTres * error/100;
                    this.form.refrentadoCorregidoMuestraTres = (refrentadoTres - calc).toFixed(this.cantidadDecimales) + ', ' + (refrentadoTres + calc).toFixed(this.cantidadDecimales);
                } else { this.form.refrentadoCorregidoMuestraTres = 'No valido'; }
                if( !isNaN(refrentadoCuatro) && !isNaN(error) ){
                    calc = refrentadoCuatro * error/100;
                    this.form.refrentadoCorregidoMuestraCuatro = (refrentadoCuatro - calc).toFixed(this.cantidadDecimales) + ', ' + (refrentadoCuatro + calc).toFixed(this.cantidadDecimales);
                } else { this.form.refrentadoCorregidoMuestraCuatro = 'No valido'; }
            }
        },
        watch: {
            'form.volumenMetroCubicoMuestraUno': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraUno);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraUno = 'No valido';
                } else{
                    this.form.densidadMuestraUno = (parseInt(this.form.masaCorregidaMuestraUno) / parseInt(this.form.volumenMetroCubicoMuestraUno)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaCorregidaMuestraUno': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraUno);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraUno = 'No valido';
                } else{
                    this.form.densidadMuestraUno = (parseInt(this.form.masaCorregidaMuestraUno) / parseInt(this.form.volumenMetroCubicoMuestraUno)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaCorregidaMuestraDos': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraDos);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraDos = 'No valido';
                } else{
                    this.form.densidadMuestraDos = (parseInt(this.form.masaCorregidaMuestraDos) / parseInt(this.form.volumenMetroCubicoMuestraDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.volumenMetroCubicoMuestraDos': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraDos);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraDos = 'No valido';
                } else{
                    this.form.densidadMuestraDos = (parseInt(this.form.masaCorregidaMuestraDos) / parseInt(this.form.volumenMetroCubicoMuestraDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaCorregidaMuestraTres': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraTres);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraTres = 'No valido';
                } else{
                }
                this.form.densidadMuestraTres = (parseInt(this.form.masaCorregidaMuestraTres) / parseInt(this.form.volumenMetroCubicoMuestraTres)).toFixed(this.cantidadDecimales);
            },
            'form.volumenMetroCubicoMuestraTres': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraTres);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraTres = 'No valido';
                } else{
                    this.form.densidadMuestraTres = (parseInt(this.form.masaCorregidaMuestraTres) / parseInt(this.form.volumenMetroCubicoMuestraTres)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaCorregidaMuestraCuatro': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraCuatro);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraCuatro = 'No valido';
                } else{
                    this.form.densidadMuestraCuatro = (parseInt(this.form.masaCorregidaMuestraCuatro) / parseInt(this.form.volumenMetroCubicoMuestraCuatro)).toFixed(this.cantidadDecimales);
                }
            },
            'form.volumenMetroCubicoMuestraCuatro': function (newVal, oldVal){
                var dUno = parseFloat(this.form.masaCorregidaMuestraCuatro);
                var dDos = parseFloat(this.form.volumenMetroCubicoMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.densidadMuestraCuatro = 'No valido';
                } else{
                    this.form.densidadMuestraCuatro = (parseInt(this.form.masaCorregidaMuestraCuatro) / parseInt(this.form.volumenMetroCubicoMuestraCuatro)).toFixed(this.cantidadDecimales);
                }
            },
            'form.OTT': function(newVal, oldVal){
                this.ordenSeleccionada = this.ordenes.filter(orden => {return orden.num_ott == newVal});
                if (this.ordenSeleccionada.length != 0) {
                    this.ordenSeleccionada = this.ordenSeleccionada[0];
                    this.form.fechaConfeccionMuestraUno = this.ordenSeleccionada.fecha_confeccion;
                    this.form.fechaConfeccionMuestraDos = this.ordenSeleccionada.fecha_confeccion;
                    this.form.fechaConfeccionMuestraTres = this.ordenSeleccionada.fecha_confeccion;
                    this.form.fechaConfeccionMuestraCuatro = this.ordenSeleccionada.fecha_confeccion;
                    this.form.numIngreso = this.ordenSeleccionada.num_ingreso;
                }
            },
            'form.fechaEnsayoMuestraUno': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraUno) && patronFecha.test(this.form.fechaConfeccionMuestraUno) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraUno, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraUno = diff;
                }
            },
            'form.fechaConfeccionMuestraUno': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraUno) && patronFecha.test(this.form.fechaConfeccionMuestraUno) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraUno, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraUno = diff;
                }
            },
            'form.fechaEnsayoMuestraDos': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraDos) && patronFecha.test(this.form.fechaConfeccionMuestraDos) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraDos, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraDos, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraDos = diff;
                }
            },
            'form.fechaConfeccionMuestraDos': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraUno) && patronFecha.test(this.form.fechaConfeccionMuestraDos) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraUno, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraDos, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraDos = diff;
                }
            },
            'form.fechaEnsayoMuestraTres': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraTres) && patronFecha.test(this.form.fechaConfeccionMuestraTres) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraTres, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraTres, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraTres = diff;
                }
            },
            'form.fechaConfeccionMuestraTres': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraTres) && patronFecha.test(this.form.fechaConfeccionMuestraTres) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraTres, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraTres, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraTres = diff;
                }
            },
            'form.fechaEnsayoMuestraCuatro': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraCuatro) && patronFecha.test(this.form.fechaConfeccionMuestraCuatro) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraCuatro, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraCuatro, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraCuatro = diff;
                }
            },
            'form.fechaConfeccionMuestraCuatro': function(newVal, oldVal){
                var patronFecha = /[0-9]{2}-[0-9]{2}-[0-9]{4}/;

                if( patronFecha.test(this.form.fechaEnsayoMuestraCuatro) && patronFecha.test(this.form.fechaConfeccionMuestraCuatro) ){
                    var date1 = moment(this.form.fechaEnsayoMuestraCuatro, "DD-MM-YYYY");
                    var date2 = moment(this.form.fechaConfeccionMuestraCuatro, "DD-MM-YYYY");
                    var diff = date1.diff(date2, 'days');
                    this.form.edadDiasMuestraCuatro = diff;
                }
            },
            'form.masaMuestraUno': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraUno)) || isNaN(parseFloat(this.form.errorMuestraUno)) ){
                    this.form.masaCorregidaMuestraUno = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraUno = (parseFloat(this.form.masaMuestraUno) + parseFloat(this.form.errorMuestraUno)).toFixed(this.cantidadDecimales);
                }
            },
            'form.errorMuestraUno': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraUno)) || isNaN(parseFloat(this.form.errorMuestraUno)) ){
                    this.form.masaCorregidaMuestraUno = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraUno = (parseFloat(this.form.masaMuestraUno) + parseFloat(this.form.errorMuestraUno)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaMuestraDos': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraDos)) || isNaN(parseFloat(this.form.errorMuestraDos)) ){
                    this.form.masaCorregidaMuestraDos = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraDos = (parseFloat(this.form.masaMuestraDos) + parseFloat(this.form.errorMuestraDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.errorMuestraDos': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraDos)) || isNaN(parseFloat(this.form.errorMuestraDos)) ){
                    this.form.masaCorregidaMuestraDos = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraDos = (parseFloat(this.form.masaMuestraDos) + parseFloat(this.form.errorMuestraDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaMuestraTres': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraTres)) || isNaN(parseFloat(this.form.errorMuestraTres)) ){
                    this.form.masaCorregidaMuestraTres = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraTres = (parseFloat(this.form.masaMuestraTres) + parseFloat(this.form.errorMuestraTres)).toFixed(this.cantidadDecimales);
                }
            },
            'form.errorMuestraTres': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraTres)) || isNaN(parseFloat(this.form.errorMuestraTres)) ){
                    this.form.masaCorregidaMuestraTres = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraTres = (parseFloat(this.form.masaMuestraTres) + parseFloat(this.form.errorMuestraTres)).toFixed(this.cantidadDecimales);
                }
            },
            'form.masaMuestraCuatro': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraCuatro)) || isNaN(parseFloat(this.form.errorMuestraCuatro)) ){
                    this.form.masaCorregidaMuestraCuatro = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraCuatro = (parseFloat(this.form.masaMuestraCuatro) + parseFloat(this.form.errorMuestraCuatro)).toFixed(this.cantidadDecimales);
                }
            },
            'form.errorMuestraCuatro': function(newVal, oldVal){
                if( isNaN(parseFloat(this.form.masaMuestraCuatro)) || isNaN(parseFloat(this.form.errorMuestraCuatro)) ){
                    this.form.masaCorregidaMuestraCuatro = 'No valido';
                } else{
                    this.form.masaCorregidaMuestraCuatro = (parseFloat(this.form.masaMuestraCuatro) + parseFloat(this.form.errorMuestraCuatro)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dUnoMuestraUnoCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraUnoCorregida);
                var dDos = parseFloat(this.form.dDosMuestraUnoCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraUno = 'No valido';
                } else{
                    this.form.areaMuestraUno = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dDosMuestraUnoCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraUnoCorregida);
                var dDos = parseFloat(this.form.dDosMuestraUnoCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraUno = 'No valido';
                } else{
                    this.form.areaMuestraUno = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dUnoMuestraDosCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraDosCorregida);
                var dDos = parseFloat(this.form.dDosMuestraDosCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraDos = 'No valido';
                } else{
                    this.form.areaMuestraDos = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dDosMuestraDosCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraDosCorregida);
                var dDos = parseFloat(this.form.dDosMuestraDosCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraDos = 'No valido';
                } else{
                    this.form.areaMuestraDos = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dUnoMuestraTresCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraTresCorregida);
                var dDos = parseFloat(this.form.dDosMuestraTresCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraTres = 'No valido';
                } else{
                    this.form.areaMuestraTres = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dDosMuestraTresCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraTresCorregida);
                var dDos = parseFloat(this.form.dDosMuestraTresCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraTres = 'No valido';
                } else{
                    this.form.areaMuestraTres = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dUnoMuestraCuatroCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraCuatroCorregida);
                var dDos = parseFloat(this.form.dDosMuestraCuatroCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraCuatro = 'No valido';
                } else{
                    this.form.areaMuestraCuatro = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.dDosMuestraCuatroCorregida': function(newVal, oldVal){
                var dUno = parseFloat(this.form.dUnoMuestraCuatroCorregida);
                var dDos = parseFloat(this.form.dDosMuestraCuatroCorregida);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.areaMuestraCuatro = 'No valido';
                } else{
                    this.form.areaMuestraCuatro = (0.196 * (dUno + dDos) * (dUno + dDos)).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMuestraUno': function(newVal, oldVal){
                var carga = parseFloat(this.form.cargaEnsayoMuestraUno);
                if( isNaN(carga) ){
                    this.form.cargaEnsayoMilMuestraUno = 'No valido';
                } else{
                    this.form.cargaEnsayoMilMuestraUno = (1000 * carga).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMuestraDos': function(newVal, oldVal){
                var carga = parseFloat(this.form.cargaEnsayoMuestraDos);
                if( isNaN(carga) ){
                    this.form.cargaEnsayoMilMuestraDos = 'No valido';
                } else{
                    this.form.cargaEnsayoMilMuestraDos = (1000 * carga).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMuestraTres': function(newVal, oldVal){
                var carga = parseFloat(this.form.cargaEnsayoMuestraTres);
                if( isNaN(carga) ){
                    this.form.cargaEnsayoMilMuestraTres = 'No valido';
                } else{
                    this.form.cargaEnsayoMilMuestraTres = (1000 * carga).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMuestraCuatro': function(newVal, oldVal){
                var carga = parseFloat(this.form.cargaEnsayoMuestraCuatro);
                if( isNaN(carga) ){
                    this.form.cargaEnsayoMilMuestraCuatro = 'No valido';
                } else{
                    this.form.cargaEnsayoMilMuestraCuatro = (1000 * carga).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMilMuestraUno': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraUno);
                var dDos = parseFloat(this.form.areaMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraUno = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraUno = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.areaMuestraUno': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraUno);
                var dDos = parseFloat(this.form.areaMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraUno = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraUno = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMilMuestraDos': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraDos);
                var dDos = parseFloat(this.form.areaMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraDos = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraDos = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.areaMuestraDos': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraDos);
                var dDos = parseFloat(this.form.areaMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraDos = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraDos = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMilMuestraTres': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraTres);
                var dDos = parseFloat(this.form.areaMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraTres = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraTres = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.areaMuestraTres': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraTres);
                var dDos = parseFloat(this.form.areaMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraTres = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraTres = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.cargaEnsayoMilMuestraCuatro': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraCuatro);
                var dDos = parseFloat(this.form.areaMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraCuatro = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraCuatro = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.areaMuestraCuatro': function(newVal, oldVal){
                var dUno = parseFloat(this.form.cargaEnsayoMilMuestraCuatro);
                var dDos = parseFloat(this.form.areaMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCompresionMuestraCuatro = 'No valido';
                } else{
                    this.form.resistenciaCompresionMuestraCuatro = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.resistenciaCompresionMuestraUno': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraUno);
                var dDos = parseFloat(this.form.factoresConversionMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraUno = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraUno = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.factoresConversionMuestraUno': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraUno);
                var dDos = parseFloat(this.form.factoresConversionMuestraUno);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraUno = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraUno = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.resistenciaCompresionMuestraDos': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraDos);
                var dDos = parseFloat(this.form.factoresConversionMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraDos = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraDos = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.factoresConversionMuestraDos': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraDos);
                var dDos = parseFloat(this.form.factoresConversionMuestraDos);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraDos = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraDos = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.resistenciaCompresionMuestraTres': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraTres);
                var dDos = parseFloat(this.form.factoresConversionMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraTres = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraTres = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.factoresConversionMuestraTres': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraTres);
                var dDos = parseFloat(this.form.factoresConversionMuestraTres);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraTres = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraTres = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.resistenciaCompresionMuestraCuatro': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraCuatro);
                var dDos = parseFloat(this.form.factoresConversionMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraCuatro = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraCuatro = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.factoresConversionMuestraCuatro': function(newVal, oldVal){
                var dUno = parseFloat(this.form.resistenciaCompresionMuestraCuatro);
                var dDos = parseFloat(this.form.factoresConversionMuestraCuatro);
                if( isNaN(dUno) || isNaN(dDos) ){
                    this.form.resistenciaCorregidaMuestraCuatro = 'No valido';
                } else{
                    this.form.resistenciaCorregidaMuestraCuatro = (dUno / dDos).toFixed(this.cantidadDecimales);
                }
            },
            'form.errorCientoCincuentaMm': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dUnoMuestraUno': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dDosMuestraUno': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dUnoMuestraDos': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dDosMuestraDos': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dUnoMuestraTres': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dDosMuestraTres': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dUnoMuestraCuatro': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.dDosMuestraCuatro': function(newVal, oldVal){
                this.calculaDiametroCorregido();
            },
            'form.errorTrescientosMm': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hUnoMuestraUno': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hDosMuestraUno': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hUnoMuestraDos': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hDosMuestraDos': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hUnoMuestraTres': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hDosMuestraTres': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hUnoMuestraCuatro': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.hDosMuestraCuatro': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.refrentadoUno': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.refrentadoDos': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.refrentadoTres': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
            'form.refrentadoCuatro': function(newVal, oldVal){
                this.calculaLongitudCorregida();
            },
        },
    }
</script>

<style scoped lang="scss">
    .no-click {
        pointer-events: none;
    }
    .contenedor-vue{
        background-color: #f5f5f5;
        padding: 10px;
        line-height: 20px;
        height: auto;
        overflow: auto;
        /deep/  .el-form-item__content {
            line-height: 20px;
        }
        /deep/  .el-form-item__label {
            line-height: 20px;
        }
        /deep/  .el-input__inner {
            line-height: 20px;
            height: 20px;
        }
        /deep/  .el-col{
            padding: 3px;
        }
        /deep/  .el-divider--horizontal {
            display: block;
            height: 1px;
            width: 100%;
            margin: 5px 0;
        }
        /deep/  .el-form-item__error {
            top: 10px;
            font-size: 14px;
            padding-left: 15px;
            color: #ffffff00;
            z-index: -1;
        }
        /deep/  .el-form-item__label {
            width: auto !important;
        }
        /deep/  .el-form-item__content {
            margin: 0px !important;
            display: flex;
        }
        /deep/  .el-form-item {
            white-space: nowrap;
            margin-bottom: 0px;
        }
        /deep/  .el-input--mini .el-input__icon {
            line-height: 20px;
        }
        .texto{
            min-width: 200px;
            width: 28%;
            display: flex;
            border-style: none solid none none;
            border-color: #adb0b7;
            border-width: 1px;
            padding: 0px 10px;
        }
        .texto-ancho-full{
            min-width: 200px;
            width: 100%;
            display: flex;
            border-style: none solid none none;
            border-color: #adb0b7;
            border-width: 1px;
            padding: 0px 10px;
        }
        .texto-muestras{
            display: flex;
            width: 18%;
            border-style: none solid none none;
            border-color: #484b50;
            border-width: 1px;
            padding: 0px 10px;
        }
        .muestras{
            .el-col{
                flex-wrap: nowrap;
                display: flex;
                border-style: solid none none none;
                border-color: #adb0b7;
                border-width: 1px;
            }
        }
        .contenedor-botones{
            padding-top: 20px;
        }
    }
</style>