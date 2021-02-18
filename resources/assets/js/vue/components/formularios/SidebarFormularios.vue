<template>
    <div>
        <el-aside width="fit-content">
            <el-menu default-active="2" class="el-menu-vertical-demo">
                <el-menu-item
                    index="1"
                    @click="clickResumen">
                    Resumen
                </el-menu-item>
                <el-submenu index="2">
                    <template slot="title">
                        <span slot="title">Formularios</span>
                    </template>
                    <el-menu-item-group>
                        <!-- <span slot="title">Group One</span> -->
                        <el-menu-item
                            index="2-1"
                            @click="clickOTT">
                            Orden de trabajo de Terreno
                        </el-menu-item>
                        <el-menu-item index="2-2" disabled>item two</el-menu-item>
                    </el-menu-item-group>
                    <el-menu-item-group>
                        <el-menu-item index="2-3" disabled>item three</el-menu-item>
                    </el-menu-item-group>
                    <!-- <el-submenu index="2-4">
                        <span slot="title">item four</span>
                        <el-menu-item index="2-4-1">item one</el-menu-item>
                    </el-submenu> -->
                </el-submenu>
                <el-menu-item index="3" disabled>
                    <span slot="title">Navigator Two</span>
                </el-menu-item>
                <el-menu-item index="4" disabled>
                    <span slot="title">Navigator Three</span>
                </el-menu-item>
                <el-menu-item index="5" disabled>
                    <span slot="title">Navigator Four</span>
                </el-menu-item>
            </el-menu>
        </el-aside>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isCollapse: true
            }
        },
        methods: {
            clickOTT() {
                console.log('Abrir OTT');
                this.$emit("cambiaMain", "OrdenTrabajoTerreno");
            },
            clickResumen() {
                console.log('Volver a resumen');
                this.$emit("cambiaMain", "ListadoFormularios");
            }
        }
    }
</script>

<style>
    .el-aside {
        background-color: #d3dce6;
        height: 100%;
        color: #333;
        text-align: left;
        overflow-x: hidden;
    }
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: fit-content;
        min-height: 400px;
    }
    .el-menu{
        background-color: transparent;
    }
    .el-menu-item, .el-submenu__title, .el-submenu .el-menu-item {
        height: 40px;
        line-height: 40px;
    }
</style>