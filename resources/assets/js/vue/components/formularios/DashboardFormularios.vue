<template>
    <div id="contenedor-vue">
        <el-container class="height-max-percent">
            <el-header>Secci&oacute;n formularios</el-header>
            <el-container>
                <sidebar-formularios/>
                <el-container>
                    <el-main>Main</el-main>
                    <el-footer>Footer</el-footer>
                </el-container>
            </el-container>
        </el-container>
    </div>
</template>

<script>
    import SidebarFormularios from '../../components/formularios/SidebarFormularios.vue';

    export default {
        components:{
            SidebarFormularios
        },
        data() {
            return {
                color1: "#409EFF",
                color2: null,
                color: "rgba(19, 206, 102, 0.8)",
            };
        },
        mounted() {
            console.log("Component mounted.");
        },
        methods: {
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
</style>