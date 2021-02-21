<template>
    <div class="contenedor-vue">
        <el-form ref="form" :model="form" label-width="150px">
            <!-- CLIENTE OBRA / N° OTT -->
            <el-row class="margin-b-5">
                <el-col :span="14" class="padding-5">
                    <el-form-item label="N° Cliente Obra">
                        <el-input placeholder="Please input" v-model="form.numClienteObra"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="10" class="padding-5">
                    <el-form-item label="OTT N° HF - ">
                        <el-input placeholder="Please input" v-model="form.ottNumberHF"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <!-- NOMBRE CLIENTE -->
            <el-row class="margin-b-5">
                <el-col :span="24">
                    <el-form-item label="Cliente">
                        <el-input placeholder="Please input" v-model="form.nombreCliente"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <!-- OBRA / FONO OBRA -->
            <el-row class="margin-b-5">
                <el-col :span="15" class="padding-5">
                    <el-form-item label="Obra">
                        <el-input placeholder="Please input" v-model="form.nombreObra"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="9" class="padding-5">
                    <el-form-item label="Fono Obra">
                        <el-input placeholder="Please input" v-model="form.fonoObra"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <!-- DIRECCION / ENCARGADO OBRA -->
            <el-row class="margin-b-5">
                <el-col :span="15" class="padding-5">
                    <el-form-item label="Dirección Obra">
                        <el-input placeholder="Please input" v-model="form.direccionObra"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="9" class="padding-5">
                    <el-form-item label="Encargado Obra">
                        <el-input placeholder="Please input" v-model="form.encargadoObra"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <!-- MUESTREO HORMIGON / MORTERO -->
            <el-row class="margin-b-5">
                <el-col :span="24" class="padding-5">
                    <el-form-item label="Muestreo de:">
                        <el-radio v-model="form.muestreoDe" label="hormigon">Hormig&oacute;n</el-radio>
                        <el-radio v-model="form.muestreoDe" label="mortero">Mortero</el-radio>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="unaDosColumnas" class="padding-5">
                    <el-form-item label="Extracción">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.extraccion" label="camion">Cami&oacute;n</el-radio>
                            <el-radio v-model="form.extraccion" label="betonera">Betonera</el-radio>
                            <el-radio v-model="form.extraccion" label="acopio">Acopio</el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Compactación">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.compactacion" label="apisonado">Apisonado</el-radio>
                            <el-radio v-model="form.compactacion" label="vibrado">Vibrado</el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Tipo de Molde (en cm)">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-01">
                                <div style="display: flex;"><div style="flex-grow: 1;">15x15x15</div><div> | <b>400-01</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-02">
                                <div style="display: flex;"><div style="flex-grow: 1;">20x20x20</div><div> | <b>400-02</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-03">
                                <div style="display: flex;"><div style="flex-grow: 1;">15x30</div><div> | <b>400-03</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-04">
                                <div style="display: flex;"><div style="flex-grow: 1;">4x4x16</div><div> | <b>400-04</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-05">
                                <div style="display: flex;"><div style="flex-grow: 1;">53x15x15</div><div> | <b>400-05</b> </div></div>
                            </el-radio>
                            <el-radio v-model="form.tipoMolde" class="radio-molde" label="400-06">
                                <div style="display: flex;"><div style="flex-grow: 1;">10x10x10</div><div> | <b>400-06</b> </div></div>
                            </el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Muestreado por">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.muestreadoPor" label="lacem">Lacem</el-radio>
                            <el-radio v-model="form.muestreadoPor" label="mandante">Mandante</el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Ensayado por">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.ensayadoPor" label="lacem">Lacem</el-radio>
                            <el-radio v-model="form.ensayadoPor" label="mandante">Mandante</el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Tipo de muestra">
                        <div class="dis-flex-dir-col">
                            <el-radio v-model="form.tipoMuestra" label="simple">Simple</el-radio>
                            <el-radio v-model="form.tipoMuestra" label="compuesta">Compuesta</el-radio>
                            <el-radio v-model="form.tipoMuestra" label="especial">Especial</el-radio>
                        </div>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Volumen de la Amasada del Hormigón (m³)">
                        <el-input placeholder="Please input" v-model="form.amasadaHormigon"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Asentamiento de cono (cm)">
                        <el-input placeholder="Please input" v-model="form.asentamientoCono"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="N° Informe">
                        <el-input placeholder="Please input" disabled v-model="form.numInforme"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="Segregación">
                        <el-input placeholder="Please input" v-model="form.segregacion"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="N° equipo Cono de Abrams">
                        <el-input placeholder="Please input" v-model="form.numEquipoConoAbrams"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="N° Vibrador de Inmersión">
                        <el-input placeholder="Please input" v-model="form.numVibradorInmersion"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5"/>
                    <el-form-item label="N° equipo Cono reducido">
                        <el-input placeholder="Please input" v-model="form.numEquipoConoReducido"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="unaDosColumnas" class="padding-5">
                    <el-form-item label="N° Ingreso">
                        <el-input placeholder="Please input" v-model="form.numIngreso"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Hora Muestreo">
                        <el-input placeholder="Please input" v-model="form.horaMuestreo"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Hora Inicio amasado">
                        <el-input placeholder="Please input" v-model="form.horaInicioAmasado"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="T° Ambiente">
                        <el-input placeholder="Please input" v-model="form.tAmbiente"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="T° Hormigón/Mortero">
                        <el-input placeholder="Please input" v-model="form.tHormigonMortero"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Proveedor">
                        <el-input placeholder="Please input" v-model="form.proveedor"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="N° Guía de Despacho">
                        <el-input placeholder="Please input" v-model="form.numGuiaDespacho"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Nombre Chofer">
                        <el-input placeholder="Please input" v-model="form.nombreChofer"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Curado Inicial">
                        <el-input placeholder="Please input" v-model="form.curadoInicial"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Elemento Hormigonado">
                        <el-input placeholder="Please input" v-model="form.elementoHormigonado"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Ubicación del Elemento">
                        <el-input placeholder="Please input" v-model="form.ubicacionElemento"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Tipo de Hormigón / Mortero">
                        <el-input placeholder="Please input" v-model="form.tipoHormigonMortero"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Resistencia especificada">
                        <el-input placeholder="Please input" v-model="form.resistenciaEspecificada"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Fecha de confección">
                        <el-input placeholder="Please input" v-model="form.fechaConfeccion"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="Aditivo">
                        <el-input placeholder="Please input" v-model="form.aditivo"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <el-form-item label="N° de Mixer">
                        <el-input placeholder="Please input" v-model="form.numMixer"></el-input>
                    </el-form-item>
                    <el-divider class="el-divider-5 margin-l-5"/>
                    <!-- Fecha de Retiro de muestra -->
                    <el-col :span="24" class="padding-5">
                        <div class="Rtable Rtable--4cols">
                            <!-- titulos -->
                            <div class="Rtable-cell width-35"><strong>Programa de Ensayo a</strong></div>
                            <div class="Rtable-cell width-15"><strong>Cantidad</strong></div>
                            <div class="Rtable-cell width-datepicker"><strong>Fecha</strong></div>
                            <div class="Rtable-cell width-15"><strong>Informe</strong></div>
                            <!-- 1 dia -->
                            <div class="Rtable-cell width-35"><label>1 dia</label></div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadUnDia"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaUnDia"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeUnDia"></el-input>
                                </el-form-item>
                            </div>
                            <!-- 3 dias -->
                            <div class="Rtable-cell width-35"><label>3 dia</label></div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadTresDias"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaTresDias"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeTresDias"></el-input>
                                </el-form-item>
                            </div>
                            <!-- 7 dias -->
                            <div class="Rtable-cell width-35"><label>7 dia</label></div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadSieteDias"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaSieteDias"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeSieteDias"></el-input>
                                </el-form-item>
                            </div>
                            <!-- 14 dias -->
                            <div class="Rtable-cell width-35"><label>14 dia</label></div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadCatorceDias"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaCatorceDias"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeCatorceDias"></el-input>
                                </el-form-item>
                            </div>
                            <!-- 28 dias -->
                            <div class="Rtable-cell width-35"><label>28 dia</label></div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadVeintiochoDias"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaVeintiochoDias"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeVeintiochoDias"></el-input>
                                </el-form-item>
                            </div>
                            <!-- otros -->
                            <div class="Rtable-cell width-35">
                                <el-form-item class="item-no-margin cantidad-otros" label="Otros">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadOtros"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraCantidadOtros"></el-input>
                                </el-form-item>
                            </div>
                            <div class="Rtable-cell width-datepicker">
                                <el-date-picker
                                    v-model="form.retiroMuestraFechaOtros"
                                    type="date"
                                    size="mini">
                                </el-date-picker>
                            </div>
                            <div class="Rtable-cell width-15">
                                <el-form-item class="item-no-margin">
                                    <el-input size="mini" v-model="form.retiroMuestraInformeOtros"></el-input>
                                </el-form-item>
                            </div>
                        </div>
                    </el-col>
                    <el-col :span="24" class="padding-5">Traslado de probetas al Laboratorio</el-col>
                    <el-col :span="24" class="padding-5">
                        <el-form-item>
                            <el-radio v-model="form.trasladoProbetas" label="moldes">En Moldes</el-radio>
                            <el-radio v-model="form.trasladoProbetas" label="desmoldadas">Desmoldadas</el-radio>
                        </el-form-item>
                    </el-col>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="24" style="font-weight: 600" class="padding-5">Extracci&oacute;n de Testigos Hormig&oacute;n Endurecido</el-col>
                <el-col :span="24" class="padding-5">
                    <div class="tabla-extraccion tabla-extraccion--10cols comentarios">
                        <!-- titulos -->

                        <div class="tabla-extraccion-cell" style="width: 30%;">Di&aacute;metro</div>
                        <div class="tabla-extraccion-cell">>6"|400-13</div>
                        <div class="tabla-extraccion-cell">>4"|400-12</div>
                        <div class="tabla-extraccion-cell">Total</div>
                        <div class="tabla-extraccion-cell">Ingreso</div>
                        <div class="tabla-extraccion-cell" style="border-right-color: transparent;width: 3%;"></div>
                        <div class="tabla-extraccion-cell" style="border-right-color: transparent;width: 3%;"></div>
                        <div class="tabla-extraccion-cell" style="border-right-color: transparent;width: 23%;text-align: center;">N° de Informe</div>
                        <div class="tabla-extraccion-cell" style="border-right-color: transparent;width: 3%;"></div>
                        <div class="tabla-extraccion-cell" style="width: 3%;"></div>
                        <!-- N° de Testigos Extraidos -->
                        <div class="tabla-extraccion-cell" style="width: 30%;">N° de Testigos Extra&iacute;dos</div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <!-- N° de Testigos Ensayados -->
                        <div class="tabla-extraccion-cell" style="width: 30%;">N° de Testigos Ensayados</div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                        <div class="tabla-extraccion-cell"></div>
                    </div>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="6" style="font-weight: 600" class="padding-5">&Aacute;ridos para Hormig&oacute;n</el-col>
                <el-col :span="6" style="font-weight: 600" class="padding-5">Procedimiento Extracci&oacute;n</el-col>
                <el-col :span="12" class="padding-5">
                    <el-form-item class="procedimiento-extraccion-opciones">
                        <el-radio v-model="form.procedimientoExtraccion" label="yacimiento">Yacimiento</el-radio>
                        <el-radio v-model="form.procedimientoExtraccion" label="produccion">Producci&oacute;n</el-radio>
                        <el-radio v-model="form.procedimientoExtraccion" label="obra">Obra </el-radio>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="padding-5">
                    <div class="tabla-aridos">
                        <!-- titulos1 -->
                        <div class="tabla-aridos-cell" style="width: 100%;">N° Ingreso</div>
                        <!-- titulos 2 -->
                        <div class="tabla-aridos-cell" style="width: 35%;">400 - 17</div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <!-- Grava -->
                        <div class="tabla-aridos-cell" style="width: 35%;">Grava</div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <!-- Gravilla -->
                        <div class="tabla-aridos-cell" style="width: 35%;">Gravilla</div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <!-- Arena -->
                        <div class="tabla-aridos-cell" style="width: 35%;">Arena</div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <!-- Volumen -->
                        <div class="tabla-aridos-cell" style="width: 35%;">Volumen Representado m&#179;</div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                        <div class="tabla-aridos-cell" style="width: 8.125%"></div>
                    </div>
                </el-col>
                <el-col :span="12" class="padding-5">
                    <div class="tabla-aridos">
                        <!-- r1 -->
                        <div class="tabla-aridos-cell" style="width: 90%;">Ensayos para aceptaci&oacute;n de &aacute;ridos</div>
                        <div class="tabla-aridos-cell" style="width: 10%;">-</div>
                        <!-- r2 -->
                        <div class="tabla-aridos-cell" style="width: 90%">Ensayos para dosificaci&oacute; de hormig&oacute;n</div>
                        <div class="tabla-aridos-cell" style="width: 10%">-</div>
                        <!-- r3 -->
                        <div class="tabla-aridos-cell" style="width: 75%">- Sin probetas de prueba</div>
                        <div class="tabla-aridos-cell" style="width: 15%">400 - 18</div>
                        <div class="tabla-aridos-cell" style="width: 10%">-</div>
                        <!-- r4 -->
                        <div class="tabla-aridos-cell" style="width: 75%">- Con probetas de prueba</div>
                        <div class="tabla-aridos-cell" style="width: 15%">400 - 19</div>
                        <div class="tabla-aridos-cell" style="width: 10%">-</div>
                        <!-- asdsad -->
                        <div class="tabla-aridos-cell" style="width: 30%;">N° Informe</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 30%;">--</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                        <div class="tabla-aridos-cell" style="width: 17.5%">-</div>
                    </div>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="24" style="font-weight: 600" class="padding-5">Otros</el-col>
                <el-col :span="8" class="padding-5">
                    <el-form-item label="Dens. Aparente Hormigón">
                        <el-checkbox v-model="form.densAparenteHormigon"></el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="8" class="padding-5">
                    <el-form-item label="Dens. Aparente Mortero">
                        <el-checkbox v-model="form.densAparenteMortero"></el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="8" class="padding-5">
                    <el-form-item label="Índice Esclerométrico">
                        <el-checkbox v-model="form.indiceEsclerometrico"></el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="padding-5">
                    <el-form-item label="Irregularidad Superficial">
                        <el-checkbox v-model="form.irregularidadSuperficial"></el-checkbox>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="padding-5">
                    <el-form-item label="Irregularidad Superficial - cantidad ml">
                        <el-input placeholder="Please input" v-model="form.irregularidadSuperficialMl"></el-input>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Muestra Ingresada por el Cliente">
                        <el-radio v-model="form.muestraIngresadaPorCliente" label="true">Si</el-radio>
                        <el-radio v-model="form.muestraIngresadaPorCliente" label="false">No</el-radio>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Responsable en Obra">
                        <el-input placeholder="Please input" v-model="form.responsableEnObra"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Fecha de Ingreso">
                        <el-date-picker
                            v-model="form.fechaIngreso"
                            type="date">
                        </el-date-picker>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Fecha de Visita Obra">
                            <el-date-picker
                                v-model="form.fechaVisitaObra"
                                type="date">
                            </el-date-picker>
                        </el-form-item>
                </el-col>
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Hora Llegada">
                        <el-time-picker
                            v-model="form.horaLlegada">
                        </el-time-picker>
                    </el-form-item>
                </el-col>
                <el-col :span="12" class="seccion-otros padding-5">
                    <el-form-item label="Hora Salida">
                        <el-time-picker
                            v-model="form.horaSalida">
                        </el-time-picker>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height comentarios">
                <el-col :span="12">
                    <el-col :span="24" class="padding-5">Observaciones</el-col>
                    <el-col :span="24" class="padding-5">
                        <el-form-item>
                            <el-input
                                type="textarea"
                                autosize
                                placeholder="Please input"
                                v-model="form.observaciones">
                            </el-input>
                        </el-form-item>
                    </el-col>
                </el-col>
                <el-col :span="12">
                    <el-col :span="24" class="padding-5">La muestra presenta alguna alteraci&oacute;n?</el-col>
                    <el-col :span="24" class="padding-5">
                        <el-form-item>
                            <el-radio v-model="form.alteracionMuestra" label="si">Si</el-radio>
                            <el-radio v-model="form.alteracionMuestra" label="no">No</el-radio>
                        </el-form-item>
                    </el-col>
                    <el-col :span="24" class="padding-5">
                        <el-form-item>
                            <el-input
                                type="textarea"
                                autosize
                                placeholder="Please input"
                                v-model="form.observaciones">
                            </el-input>
                        </el-form-item>
                    </el-col>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-row class="margin-b-5 auto-height">
                <el-col :span="unaDosColumnas" class="padding-5">
                    <el-form-item label="Laboratorista">
                        <el-input placeholder="Please input" v-model="form.laboratorista"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="unaDosColumnas" class="padding-5">
                    <el-form-item label="Ayudante">
                        <el-input placeholder="Please input" v-model="form.ayudante"></el-input>
                    </el-form-item>
                </el-col>
                <el-col :span="unaDosColumnas" class="comentarios">
                    <el-form-item>
                        <el-radio v-model="form.recibeOMuestrea" label="recibe">Recibe</el-radio>
                        <el-radio v-model="form.recibeOMuestrea" label="muestrea">Muestrea</el-radio>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-divider class="el-divider-14"/>
            <el-form-item class="comentarios">
                <el-button type="primary" @click="onSubmit">Crear OTT</el-button>
                <!-- <el-button>Cancel</el-button> -->
            </el-form-item>
        </el-form>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                labelPosition: 'left',
                unaDosColumnas: 24,
                form: {
                    numClienteObra: '',
                    ottNumberHF: '',
                    nombreCliente: '',
                    nombreObra: '',
                    fonoObra: '',
                    direccionObra: '',
                    encargadoObra: '',
                    muestreoDe: '',
                    extraccion: '',
                    compactacion: '',
                    tipoMolde: '',
                    muestreadoPor: '',
                    ensayadoPor: '',
                    tipoMuestra: '',
                    amasadaHormigon: '',
                    asentamientoCono: '',
                    numInforme: '400-08',
                    segregacion: '',
                    numEquipoConoAbrams: '',
                    numVibradorInmersion: '',
                    numEquipoConoReducido: '',
                    numIngreso: '',
                    horaMuestreo: '',
                    horaInicioAmasado: '',
                    tAmbiente: '',
                    tHormigonMortero: '',
                    proveedor: '',
                    numGuiaDespacho: '',
                    nombreChofer: '',
                    curadoInicial: '',
                    elementoHormigonado: '',
                    ubicacionElemento: '',
                    tipoHormigonMortero: '',
                    resistenciaEspecificada: '',
                    fechaConfeccion: '',
                    aditivo: '',
                    numMixer: '',
                    trasladoProbetas: '',
                    retiroMuestraOtros: '',
                    retiroMuestraCantidadUnDia: '',
                    retiroMuestraCantidadTresDias: '',
                    retiroMuestraCantidadSieteDias: '',
                    retiroMuestraCantidadCatorceDias: '',
                    retiroMuestraCantidadVeintiochoDias: '',
                    retiroMuestraCantidadOtros: '',
                    retiroMuestraFechaUnDia: '',
                    retiroMuestraFechaTresDias: '',
                    retiroMuestraFechaSieteDias: '',
                    retiroMuestraFechaCatorceDias: '',
                    retiroMuestraFechaVeintiochoDias: '',
                    retiroMuestraFechaOtros: '',
                    retiroMuestraInformeUnDia: '',
                    retiroMuestraInformeTresDias: '',
                    retiroMuestraInformeSieteDias: '',
                    retiroMuestraInformeCatorceDias: '',
                    retiroMuestraInformeVeintiochoDias: '',
                    retiroMuestraInformeOtros: '',
                    procedimientoExtraccion: '',
                    muestraIngresadaPorCliente: '',
                    fechaIngreso: '',
                    fechaVisitaObra: '',
                    horaLlegada: '',
                    horaSalida: '',
                    responsableEnObra: '',
                    densAparenteHormigon: '',
                    densAparenteMortero: '',
                    indiceEsclerometrico: '',
                    irregularidadSuperficial: '',
                    irregularidadSuperficialMl: '',
                    observaciones: '',
                    alteracionMuestra: '',
                    laboratorista: '',
                    ayudante: '',
                    recibeOMuestrea: ''
                },
                urlGuardarFormulario: `${GLOBAL.URL}formularios/guardar-formulario`,
                resource: {
                    guardarFormulario: {
                        method: 'POST',
                    }
                }
            }
        },
        created() {
            window.addEventListener('resize', this.handleResize);
            this.handleResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize);
        },
        methods: {
            onSubmit() {
                console.log('submit!');
                this.$http.post(this.urlGuardarFormulario,{
                    formulario: this.form
                }).then(response => {
                    console.log('response', response);
                });
            },
            handleResize() {
                this.unaDosColumnas = window.innerWidth < 1200 ? 24 : 12
            },
        }
    }
</script>
<style scoped lang="scss">
    .contenedor-vue{
        background-color: #f5f5f5;
        padding: 10px;
        line-height: 40px;
        height: auto;
    }
    .dis-flex-dir-col{
        display: flex;
        flex-direction: column;
    }
    .radio-molde{
        width: 100%;
        min-width: 142px;
        max-width: 180px;
        display: flex;
        /deep/  .el-radio__label{
            width: 100%;
        }
    }
    .item-no-margin{
        /deep/  .el-form-item__content{
            margin: 0px !important;

        }
        /deep/  .el-form-item__label-wrap{
            margin: 0px !important;
        }
    }
    .cantidad-otros{
        white-space: nowrap;
        /deep/  .el-input__inner{
            width: calc(100% - 41px);
            margin-left: -112px;
        }
    }
    .el-form-item__label-wrap{
        margin-left: 0px !important;
    }
    .padding-5{
        padding: 5px;
    }
    .nombre-campo{
        padding: 0px 15px;
    }
    .margin-b-0{
        margin-bottom: 0px;
    }
    .margin-b-5{
        margin-bottom: 5px;
    }
    .margin-b-15{
        margin-bottom: 15px;
    }

    .margin-l-5{
        margin-left: 5px;
    }
    .auto-height{
        height: auto !important;
    }
    .el-row {
        height: 40px;
        &:last-child {
            margin-bottom: 0;
        }
    }
    .el-col {
        border-radius: 4px;
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
    .el-form{
        display: flex;
        flex-direction: column;
        width: 100%;
        text-align: left;
    }
    .el-form-item {
        margin-bottom: 3px;
    }
    /deep/  .el-form-item__label-wrap{
        margin-left: 4px !important;
    }
    /deep/  .el-form-item__label{
        line-height: 20px;
        text-align: left;
        min-height: 40px;
        display: flex;
        align-items: center;
    }
    .el-divider-14{
        margin: 14px 0;
    }
    .el-divider-5{
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
        width: 100%;  // Default to full width
        padding: 1px;
        overflow: hidden; // Or flex might break
        list-style: none;
        border: 1px solid #f5f5f5;
        > h1, > h2, > h3, > h4, > h5, > h6 { margin: 0; }
    }
    .Rtable--2cols > .Rtable-cell  { width: 50%; }
    .Rtable--3cols > .Rtable-cell  { width: 33.33%; }
    .Rtable--4cols > .Rtable-cell  { width: 25%; }
    .Rtable--5cols > .Rtable-cell  { width: 20%; }
    .Rtable--6cols > .Rtable-cell  { width: 16.6%; }

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
        width: 100%;  // Default to full width
        padding: 1px;
        overflow: hidden; // Or flex might break
        list-style: none;
        border-right-style: solid;
        border-bottom-style: solid;
        border-right-color: #8e9198;
        border-bottom-color: #8e9198;
        border-right-width: 1px;
        border-bottom-width: 1px;
        > h1, > h2, > h3, > h4, > h5, > h6 { margin: 0; }
        white-space: nowrap;
    }
    .tabla-extraccion--10cols > .tabla-extraccion-cell  { width: 7%; }

    .width-15{
        width: 70px !important;
        /deep/  .el-input__inner{
            padding: 0 5px;
        }
    }
    .width-35{
        width: 35% !important;
    }
    .width-datepicker{
        width: 135px !important;
        max-width: 143px;
        /deep/  .el-input__inner{
            width: 135px;
        }
    }
    .procedimiento-extraccion-opciones, .comentarios{
        /deep/ .el-form-item__content{
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
        width: 100%;  // Default to full width
        padding: 0 4px;
        overflow: hidden; // Or flex might break
        list-style: none;
        border-right-style: solid;
        border-bottom-style: solid;
        border-right-color: #8e9198;
        border-bottom-color: #8e9198;
        border-right-width: 1px;
        border-bottom-width: 1px;
        > h1, > h2, > h3, > h4, > h5, > h6 { margin: 0; }
        white-space: nowrap;
        line-height: 20px;
    }
    .seccion-otros{
        /deep/  .el-date-editor.el-input{
            width: 140px !important;
        }
    }
</style>