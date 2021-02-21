<template>
    <div class="contenedor-vue">
        <div class="container-elementos">
            <h1>Listado Órdenes de Trabajo de Terreno</h1>
            <el-input class="width-100" placeholder="Filtre por N° Cliente Obra" v-model="buscador"></el-input>
        </div>
        <div class="container-items-formulario">
            <item-lista-formularios
                v-for="(orden, index) in ordenesDeTrabajo"
                v-bind:itemLista="orden"
                v-bind:index="index"
                v-bind:key="orden.id"
            />
        </div>
    </div>
</template>
<script>
    import ItemListaFormularios from '../../components/formularios/ItemListaFormularios.vue';

    export default {
        components: {
            ItemListaFormularios
        },
        props: [],
        data(){
            return{
                urltodasLasOrdenes: `${GLOBAL.URL}formularios/todas-las-ordenes`,
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