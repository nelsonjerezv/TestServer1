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
                <el-button type="danger" plain>Eliminar</el-button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'itemLista'
        ],
        data() {
            return {
                item: ''
            }
        },
        mounted () {
            this.item = this.itemLista;
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
</style>