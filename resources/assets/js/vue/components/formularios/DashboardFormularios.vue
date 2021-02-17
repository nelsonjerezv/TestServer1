<template>
    <div id="contenedor-vue">
        <el-container class="height-max-percent">
            <el-header>Secci&oacute;n formularios</el-header>
            <el-container>
                <el-aside width="200px">
                    <el-menu default-active="1" class="el-menu-vertical-demo">
                        <el-menu-item index="1">
                            <span slot="title">Resumen</span>
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
                <el-container>
                    <el-main>Main</el-main>
                    <el-footer>Footer</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>


    export default {
        data() {
            return {
                color1: "#409EFF",
                color2: null,
                color: "rgba(19, 206, 102, 0.8)",
                //sidebar
                isCollapse: true
            };
        },
        mounted() {
            console.log("Component mounted.");
        },
        methods: {
            //sidebar
            clickOTT() {
                console.log('Abrir OTT');
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

    .el-aside {
        background-color: #d3dce6;
        color: #333;
        text-align: center;
        line-height: 200px;
    }

    .el-main {
        background-color: #e9eef3;
        color: #333;
        text-align: center;
        line-height: 160px;
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


    /* sidebar */
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 200px;
        min-height: 400px;
    }
    .el-menu{
        background-color: transparent;
    }
</style>