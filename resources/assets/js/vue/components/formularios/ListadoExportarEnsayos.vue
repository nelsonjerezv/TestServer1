<template>
    <div class="contenedor-vue">
        <div class="container-elementos">
            <h1>Buscar Ensayos</h1>
            <el-input class="width-100" placeholder="Filtre por N° Muestra" v-model="buscador"></el-input>
        </div>
        <div class="container-items-formulario">
            <item-lista-exportar-ensayos
                v-for="(orden, index) in ensayosHormigon"
                v-bind:itemLista="orden"
                v-bind:index="index"
                v-bind:key="orden.id"
                @actualizar="getEnsayos"
            />
        </div>
    </div>
</template>
<script>
    import ItemListaExportarEnsayos from './ItemListaExportarEnsayos.vue';

    export default {
        components: {
            ItemListaExportarEnsayos
        },
        props: [],
        data(){
            return{
                urlTodosLosEnsayos: `${GLOBAL.URL}ensayos/todos-los-ensayos/validadas`,
                ensayosHormigon: '',
                todosLosEnsayos: '',
                buscador: ''
            }
        },
        mounted(){
            this.getEnsayos();
        },
        methods: {
            getEnsayos() {
                this.$http.get(this.urlTodosLosEnsayos)
                .then(response => {
                    this.todosLosEnsayos =  response.body;
                    this.ensayosHormigon = response.body;
                }, response => {
                    Tools.mensajeAlerta("No se pueden cargar los ensayos.", Tools.MENSAJE.ERROR, '', 5);
                });
            },
            filtraEnsayos(){
                this.ensayosHormigon = this.todosLosEnsayos.filter(ensayo => ensayo.num_muestra.includes(this.buscador));
            }
        },
        watch: {
            buscador() {
                this.filtraEnsayos();
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