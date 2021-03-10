<template>
    <div class="contenedor-vue height-max-percent">
        <el-header>
            Prototipo
        </el-header>
        <el-container style="height: calc(100% - 60px) !important;">
            <sidebar-formularios
                @cambiaMain="cambiarMain"
            />
            <el-container>
                <el-main>
                    <div v-if="componenteMain == ''" class="bienvenido">
                        Bienvenido
                    </div>
                    <listado-formularios
                        v-if="componenteMain == 'ListadoFormularios'"
                    />
                    <orden-trabajo-terreno
                        v-if="componenteMain == 'OrdenTrabajoTerreno'"
                        @cambiaMain="cambiarMain"
                        :tipo-ott="tipoOTT"
                    />
                    <ensayo-compresion-probetas-cilindricas
                        v-if="componenteMain == 'EnsayoCompresionProbetasCilindricas' "
                        @cambiaMain="cambiarMain"
                        :tipo-ensayo="tipoEnsayo"
                    />
                    <listado-ensayos-compresion-probetas-cilindricas
                        v-if="componenteMain == 'ListadoEnsayosCompresionProbetasCilindricas' "
                        @cambiaMain="cambiarMain"
                    />
                </el-main>
                <el-footer>Footer</el-footer>
            </el-container>
        </el-container>
    </div>
</template>

<script>
    import SidebarFormularios from '../../components/formularios/SidebarFormularios.vue';
    import OrdenTrabajoTerreno from '../../components/formularios/OrdenTrabajoTerreno.vue';
    import ListadoFormularios from '../../components/formularios/ListadoFormularios.vue';
    import EnsayoCompresionProbetasCilindricas from '../../components/formularios/EnsayoCompresionProbetasCilindricas.vue';
    import ListadoEnsayosCompresionProbetasCilindricas from '../../components/formularios/ListadoEnsayosCompresionProbetasCilindricas.vue';

    export default {
        components:{
            SidebarFormularios,
            OrdenTrabajoTerreno,
            ListadoFormularios,
            EnsayoCompresionProbetasCilindricas,
            ListadoEnsayosCompresionProbetasCilindricas
        },
        props: [
            'ordenes'
        ],
        data() {
            return {
                // componenteMain: 'OrdenTrabajoTerreno'
                // componenteMain: 'EnsayoCompresionProbetasCilindricas'
                componenteMain: 'ListadoEnsayosCompresionProbetasCilindricas',
                tipoOTT: '',
                tipoEnsayo: '',
            };
        },
        mounted() {
        },
        methods: {
            cambiarMain: function(contenido){
                this.componenteMain = contenido.vista;
                if (contenido.vista === 'OrdenTrabajoTerreno') {
                    this.tipoOTT = contenido.condicion;
                }
                if (contenido.vista === 'EnsayoCompresionProbetasCilindricas') {
                    this.tipoEnsayo = contenido.condicion;
                }
            }
        }
    };
</script>

<style>
    .height-max-percent{
        height: 100%;
    }

    .el-header,
    .el-footer {
        background-color: #b3c0d1;
        color: #333;
        text-align: center;
        line-height: 60px;
    }
    .el-header{
        font-size: xx-large;
    }
    .el-main {
        background-color: #e9eef3;
        color: #333;
        text-align: center;
        line-height: 160px;
        display: flex;
    }
    body > .el-container {
        margin-bottom: 40px;
    }

    .el-container:nth-child(5) .el-aside,
    .el-container:nth-child(6) .el-aside {
        line-height: 260px;
    }

    .el-container:nth-child(7) .el-aside {
        line-height: 320px;
    }

    #formularios {
        height: 100%;
        width: 100%;
    }
    .el-menu-item-group__title {
        padding: 0px 0px 0px 20px;
    }

    .bienvenido{
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: center;
    }
</style>