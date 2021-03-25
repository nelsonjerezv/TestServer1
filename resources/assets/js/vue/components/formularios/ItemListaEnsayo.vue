<template>
    <div class="item-lista-formularios">
        <div class="item">
            <div class="atributos">
                <div class="item-atributo">N° Ingreso: {{item.num_ingreso}}</div>
                <div class="item-atributo">N° Ott: {{item.ott}}</div>
                <div class="item-atributo">Ensayado por: {{item.ensayado_por}}</div>
            </div>

            <div class="item-contenedor-botones">
                <el-button type="primary" @click="dialogVisible = true" plain>Ver Ensayo</el-button>
                <el-dialog
                    :visible.sync="dialogVisible"
                    width="90%"
                    :before-close="handleClose">
                    <iframe style="width: 100%; height: 100%;" :src="rutaVerInforme"></iframe>
                    <span slot="footer" class="dialog-footer">
                        <el-button type="success" @click="dialogVisible = false" plain>Validar</el-button>
                        <el-button type="warning" @click="dialogVisible = false" plain>Rechazar</el-button>
                        <el-button type="danger" @click="dialogVisible = false" plain>Volver</el-button>
                        <!-- <el-button type="primary" @click="dialogVisible = false">Confirm</el-button> -->
                    </span>
                </el-dialog>
                <el-button type="warning" @click="editarEnsayo" plain>Editar</el-button>
                <el-popconfirm
                    confirm-button-text='Eliminar'
                    cancel-button-text='volver'
                    @confirm="eliminarEnsayo"
                    placement="top-end"
                    icon="el-icon-info"
                    icon-color="red"
                    :hide-icon="true"
                    title="Está seguro quiere eliminar el formulario?">
                    <el-button slot="reference" type="danger" plain>Eliminar</el-button>
                </el-popconfirm>
            </div>
        </div>
    </div>
</template>

<script>
    import Tools from '../../../tools.js';

    export default {
        props: [
            'itemLista'
        ],
        data() {
            return {
                item: '',
                dialogVisible: false,
                urlEliminarEnsayo: `${GLOBAL.URL}ensayos/eliminar-ensayo`,
                urlEditarEnsayo: `${GLOBAL.URL}ensayos/editar-ensayo`,
                urlExportarEnsayoPdf: `${GLOBAL.URL}ensayos/exportar-ensayo-pdf`,
            }
        },
        mounted () {
            this.item = this.itemLista;
        },
        methods: {
            eliminarEnsayo() {
                this.$http.post(this.urlEliminarEnsayo, {
                    id: this.item.id
                }).then(response => {
                    Tools.mensajeAlerta("Ensayo eliminado.", Tools.MENSAJE.EXITO, '', 5);
                    this.$emit("actualizar");
                }, response => {
                    Tools.mensajeAlerta("No se pudo eliminar el ensayoo.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
            editarEnsayo() {
                // this.$http.get(this.urlEditarFormulario,{
                //     id: this.item.id
                // });
                console.log('editar ensayo');
            },
            exportarPDF(){
                let data = {
                    id: this.item.id,
                    direccionSolicitante: this.direccionSolicitante,
                    localizacionObra: this.localizacionObra,
                    numProyecto: this.numProyecto,
                    numCorrelativoInformeObra: this.numCorrelativoInformeObra,
                    numCorrelativoObra: this.numCorrelativoObra,
                    curadoInicial:this.curadoInicial,
                };
                window.open(this.urlExportarEnsayoPdf + '/' + this.item.id
                                                      + '/' + this.direccionSolicitante
                                                      + '/' + this.localizacionObra
                                                      + '/' + this.numProyecto
                                                      + '/' + this.numCorrelativoInformeObra
                                                      + '/' + this.numCorrelativoObra
                                                      + '/' + this.curadoInicial
                                                      + '/' + this.lugarEnsayos, '_blank')
                console.log('exportarPDF');
            },
            exportarExcel(){
                let data = {
                    id: this.item.id,
                    direccionSolicitante: this.direccionSolicitante,
                    localizacionObra: this.localizacionObra,
                    numProyecto: this.numProyecto,
                    numCorrelativoInformeObra: this.numCorrelativoInformeObra,
                    numCorrelativoObra: this.numCorrelativoObra,
                    curadoInicial:this.curadoInicial,
                };
                window.open(this.urlExportarEnsayoExcel + '/' + this.item.id
                                                      + '/' + this.direccionSolicitante
                                                      + '/' + this.localizacionObra
                                                      + '/' + this.numProyecto
                                                      + '/' + this.numCorrelativoInformeObra
                                                      + '/' + this.numCorrelativoObra
                                                      + '/' + this.curadoInicial
                                                      + '/' + this.lugarEnsayos, '_blank')
                console.log('exportarExcel');
            },
            handleClose(done) {
                done().catch(_ => {});
            }
        },
        computed: {
            rutaVerInforme() {
                return `${GLOBAL.URL}` + '/ensayos/ver-ensayo-pdf/' + this.item.id
                                                      /* + '/' + '-'
                                                      + '/' + '-'
                                                      + '/' + '-'
                                                      + '/' + '-'
                                                      + '/' + '-'
                                                      + '/' + '-'
                                                      + '/' + '-' */;
            }
        },
    }
</script>

<style lang="scss" scoped>
    .una-linea{
        white-space: nowrap;
        display: flex;
        line-height: 40px;
        margin-bottom: 6px;
        .el-input {
            margin-left: 5px;
        }
    }
    .datos-informe{
        width: 700px;
    }
    .item-lista-formularios{
        display: flex;
        flex-grow: 1;
        background-color: #e4e4e4;
        line-height: 20px;
        padding: 10px;
        border-radius: 15px;
        border: 1px solid #888787;
        margin-bottom: 10px;
    }
    .item{
        flex-direction: row;
        text-align-last: left;
        height: fit-content;
        flex-wrap: nowrap;
        width: 100%;
        display: flex;
    }
    .item-atributo{
        width: fit-content;
    }
    .item-contenedor-botones{
        flex-grow: 1;
        text-align-last: end;
    }
    .el-button--warning.is-plain {
        margin-left: 0px;
    }
    /deep/  .el-dialog{
        width: 90% !important;
        height: 90% !important;
        margin: 3% auto !important;
        .el-dialog__header{
            padding: 0px;
        }
        .el-dialog__body {
            height: calc(100% - 60px);
            padding: 20px;
        }
        .el-dialog__footer{
            padding: 0px 20px 20px;
        }
    }
</style>