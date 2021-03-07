<template>
    <div class="contenedor-vue">
        <div class="container-elementos">
            <h1>Listado Ensayos Compresi&oacute;n</h1>
            <el-input class="width-100" placeholder="Filtre por N° Cliente Obra" v-model="buscador"></el-input>
        </div>
        <div class="container-items-formulario">
            <item-lista-ensayo
                v-for="(orden, index) in ordenesDeTrabajo"
                v-bind:itemLista="orden"
                v-bind:index="index"
                v-bind:key="orden.id"
                @actualizar="getOrdenes"
            />
        </div>
    </div>
</template>
<script>
    import ItemListaEnsayo from '../../components/formularios/ItemListaEnsayo.vue';

    export default {
        components: {
            ItemListaEnsayo
        },
        props: [],
        data(){
            return{
                urltodasLasOrdenes: `${GLOBAL.URL}ensayos/todos-los-ensayos`,
                ordenesDeTrabajo: '',
                todasLasOrdenes: '',
                buscador: ''
            }
        },
        mounted(){
            this.getOrdenes();
        },
        methods: {
            getOrdenes() {
                this.$http.get(this.urltodasLasOrdenes)
                .then(response => {
                    this.todasLasOrdenes =  response.body;
                    this.ordenesDeTrabajo = response.body;
                }, response => {
                    Tools.mensajeAlerta("No se pueden cargar las ordenes.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
            filtraOrdenes(){
                this.ordenesDeTrabajo = this.todasLasOrdenes.filter(orden => orden.num_cliente_obra.includes(this.buscador));
            }
        },
        watch: {
            buscador() {
                this.filtraOrdenes();
            }
        },
    }
</script>
<style>
    .width-100{
        width: 100%;
    }
    .container-elementos{
        margin-bottom: 20px;
    }
    .container-items-formulario{
        max-height: calc(100% - 128px);
        overflow: auto;
        padding: 10px;
    }
</style>


aridos-volumen m3 no va

aridos-muestras son check