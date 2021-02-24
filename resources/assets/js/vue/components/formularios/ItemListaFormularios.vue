<template>
    <div class="item-lista-formularios">
        <div class="item">
            <div class="atributos">
                <div class="item-atributo">N° Cliente Obra: {{item.num_cliente_obra}}</div>
                <div class="item-atributo">Laboratorista: {{item.laboratorista}}</div>
            </div>
            <div class="item-contenedor-botones">
                <el-button type="primary" plain>Ver</el-button>
                <el-button type="warning" plain>Editar</el-button>
                <!-- <el-button @click="clickEliminar" type="danger" plain>Eliminar</el-button> -->
                <el-popconfirm
                    confirm-button-text='Eliminar'
                    cancel-button-text='volver'
                    @confirm="clickEliminar"
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
            }
        },
        mounted () {
            this.item = this.itemLista;
        },
        methods: {
            clickEliminar() {
                this.$http.post(this.urlEliminarFormulario,{
                    id: this.item.id
                }).then(response => {
                    Tools.mensajeAlerta("Formulario eliminado.", Tools.MENSAJE.EXITO, '', 5);
                    this.$emit("actualizar");
                }, response => {
                    Tools.mensajeAlerta("No se pudo eliminar el formulario.", Tools.MENSAJE.ERROR, '', 5);
                });
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
</style>