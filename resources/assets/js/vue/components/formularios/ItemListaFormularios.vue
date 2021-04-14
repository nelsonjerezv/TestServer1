<template>
    <div class="item-lista-formularios">
        <div class="item">
            <div class="atributos">
                <div class="item-atributo"><strong>N° OTT:</strong> {{item.num_ott}}</div>
                <div class="item-atributo"><strong>N° Cliente Obra:</strong> {{item.num_cliente_obra}} &emsp; &emsp; <strong>Laboratorista:</strong> {{item.laboratorista}}</div>
            </div>
            <div class="item-contenedor-botones">
                <el-button type="primary" @click="dialogVerVisible = true"  plain>Ver OTT</el-button>
                <el-dialog
                    :visible.sync="dialogVerVisible"
                    width="90%">
                    <!-- :before-close="handleClose" -->
                    <iframe style="width: 100%; height: 100%;" :src="rutaVerInforme"></iframe>
                    <span slot="footer" class="dialog-footer">
                        <el-button type="success" @click="validarOtt"  v-if="!item.validado" plain>Validar</el-button>
                        <el-button type="warning" @click="rechazarOtt" v-if="item.validado" plain>Rechazar</el-button>
                        <el-button type="danger" @click="dialogVerVisible = false" plain>Volver</el-button>
                        <!-- <el-button type="primary" @click="dialogVisible = false">Confirm</el-button> -->
                    </span>
                </el-dialog>

                <el-button type="warning" @click="dialogEditarVisible = true" plain>Editar OTT</el-button>
                <el-dialog
                    :visible.sync="dialogEditarVisible"
                    width="90%">
                    <!-- :before-close="handleClose" -->
                    <iframe style="width: 100%; height: 100%;" :src="rutaEditarInforme"></iframe>
                    <span slot="footer" class="dialog-footer">
                        <el-button type="success" @click="validarOtt"  v-if="!item.validado" plain>Validar</el-button>
                        <el-button type="warning" @click="rechazarOtt" v-if="item.validado" plain>Rechazar</el-button>
                        <el-button type="danger" @click="dialogEditarVisible = false" plain>Volver</el-button>
                        <!-- <el-button type="primary" @click="dialogVisible = false">Confirm</el-button> -->
                    </span>
                </el-dialog>
                <el-popconfirm
                    confirm-button-text='Eliminar'
                    cancel-button-text='volver'
                    @confirm="eliminarFormulario"
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
                urlEliminarFormulario: `${GLOBAL.URL}formularios/eliminar-formulario`,
                urlEditarFormulario: `${GLOBAL.URL}formularios/editar-formulario`,
                urlValidarFormulario: `${GLOBAL.URL}` + '/formularios/validar-ott',
                urlRechazarFormulario: `${GLOBAL.URL}` + '/formularios/rechazar-ott',
                dialogVisible: false,
                dialogVerVisible: false,
                dialogEditarVisible: false,

            }
        },
        mounted () {
            this.item = this.itemLista;
            console.log('itemlistaformularios mounted', this.item.id, this.item);
        },
        methods: {
            eliminarFormulario() {
                this.$http.post(this.urlEliminarFormulario,{
                    id: this.item.id
                }).then(response => {
                    Tools.mensajeAlerta("Formulario eliminado.", Tools.MENSAJE.EXITO, '', 5);
                    this.$emit("actualizar");
                }, response => {
                    Tools.mensajeAlerta("No se pudo eliminar el formulario.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
            verFormulario() {
                // this.$http.get(this.urlEditarFormulario,{
                //     id: this.item.id
                // });
                console.log('ver formulario');
            },
            editarFormulario() {
                // this.$http.get(this.urlEditarFormulario,{
                //     id: this.item.id
                // });
                console.log('editar formulario');
            },
            handleInner(done) {
                this.$confirm('Pendiente')
                .then(_ => {
                    done();
                })
                .catch(_ => {});
            },
            validarOtt(){
                this.$http.post(this.urlValidarFormulario,{
                    id: this.item.id
                }).then(response => {
                    Tools.mensajeAlerta("Formulario validado exitosamente.", Tools.MENSAJE.EXITO, '', 5);
                    this.dialogVerVisible = false;
                    this.dialogEditarVisible = false;
                    this.$emit("actualizar");
                }, response => {
                    Tools.mensajeAlerta("No se pudo validar el formulario.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
            rechazarOtt(){
                this.$http.post(this.urlRechazarFormulario,{
                    id: this.item.id
                }).then(response => {
                    Tools.mensajeAlerta("Formulario rechazado exitosamente.", Tools.MENSAJE.EXITO, '', 5);
                    this.dialogVerVisible = false;
                    this.dialogEditarVisible = false;
                    this.$emit("actualizar");
                }, response => {
                    Tools.mensajeAlerta("No se pudo rechazar el formulario.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
        },
        computed: {
            rutaVerInforme() {
                return this.dialogVerVisible ? `${GLOBAL.URL}` + '/formularios/ver-ott/' + this.item.id : '';
            },
            rutaEditarInforme() {
                return this.dialogEditarVisible ? `${GLOBAL.URL}` + '/formularios/editar-ott/' + this.item.id : '';
            },
            rutaValidarInforme() {
                return `${GLOBAL.URL}` + '/formularios/validar-ott';
            },
            rutaRechazarInforme() {
                return `${GLOBAL.URL}` + '/formularios/rechazar-ott';
            }
        },
    }
</script>

<style lang="scss" scoped>
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