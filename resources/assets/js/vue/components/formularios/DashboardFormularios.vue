<template>
    <div class="contenedor-vue">
        <el-container class="height-max-percent">
            <el-header>
                <h1>Secci&oacute;n formularios</h1>
            </el-header>
            <el-container style="height: calc(100% - 60px) !important;">
                <sidebar-formularios
                    @cambiaMain="cambiarMain"
                />
                <el-container>
                    <el-main>
                        <component :is="componenteMain"></component>
                    </el-main>
                    <el-footer>Footer</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>
    import SidebarFormularios from '../../components/formularios/SidebarFormularios.vue';
    import OrdenTrabajoTerreno from '../../components/formularios/OrdenTrabajoTerreno.vue';
    import ListadoFormularios from '../../components/formularios/ListadoFormularios.vue';

    export default {
        components:{
            SidebarFormularios,
            OrdenTrabajoTerreno,
            ListadoFormularios
        },
        data() {
            return {
                componenteMain: "OrdenTrabajoTerreno"
            };
        },
        mounted() {
            console.log("Component mounted.");
        },
        methods: {
            cambiarMain: function(contenido){
                this.componenteMain = contenido;
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
</style>