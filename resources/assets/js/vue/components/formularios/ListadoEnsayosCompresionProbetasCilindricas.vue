<template>
    <div class="contenedor-vue">
        <div class="container-elementos">
            <h1>Listado Ensayos Compresi&oacute;n</h1>
            <el-input class="width-100" placeholder="Filtre por N° Muestra" v-model="buscador"></el-input>
        </div>
        <div class="container-items-formulario">
            <item-lista-ensayo
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
    import ItemListaEnsayo from '../../components/formularios/ItemListaEnsayo.vue';

    export default {
        components: {
            ItemListaEnsayo
        },
        props: [],
        data(){
            return{
                urlTodosLosEnsayos: `${GLOBAL.URL}ensayos/todos-los-ensayos`,
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
                    Tools.mensajeAlerta("No se pueden cargar los ensayoss.", Tools.MENSAJE.ERROR, '', 5);
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


aridos-volumen m3 no va

aridos-muestras son check