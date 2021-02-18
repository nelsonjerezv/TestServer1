<template>
    <div class="contenedor-vue">
        <el-row :gutter="20">
            <el-col :span="12">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">N° Cliente Obra</span>
                    <el-input placeholder="Please input" v-model="numClienteObra"></el-input>
                </div>
            </el-col>
            <el-col :span="12">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">OTT N° HF - </span>
                    <el-input placeholder="Please input" v-model="ottNumberHF"></el-input>
                </div>
            </el-col>
        </el-row>
        <el-row :gutter="20">
            <el-col :span="24">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Cliente</span>
                    <el-input placeholder="Please input" v-model="nombreCliente"></el-input>
                </div>
            </el-col>
        </el-row>
        <el-row :gutter="20">
            <el-col :span="16">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Obra</span>
                    <el-input placeholder="Please input" v-model="nombreObra"></el-input>
                </div>
            </el-col>
            <el-col :span="8">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Fono Obra</span>
                    <el-input placeholder="Please input" v-model="fonoObra"></el-input>
                </div>
            </el-col>
        </el-row>
        <el-row :gutter="20">
            <el-col :span="16">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Direcci&oacute;n Obra</span>
                    <el-input placeholder="Please input" v-model="direccionObra"></el-input>
                </div>
            </el-col>
            <el-col :span="8">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Encargado Obra</span>
                    <el-input placeholder="Please input" v-model="encargadoObra"></el-input>
                </div>
            </el-col>
        </el-row>
        <el-row :gutter="20">
            <el-col :span="24">
                <div class="grid-content bg-purple">
                    <span class="nombre-campo">Muestreo de: </span>
                    <el-radio v-model="muestreoDe" label="hormigon">Hormig&oacute;n</el-radio>
                    <el-radio v-model="muestreoDe" label="mortero">Mortero</el-radio>
                </div>
            </el-col>
        </el-row>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                numClienteObra: '',
                ottNumberHF: '',
                nombreCliente: '',
                nombreObra: '',
                fonoObra: '',
                direccionObra: '',
                encargadoObra: '',
                muestreoDe: ''
            }
        }
    }
</script>
<style scoped>
    .contenedor-vue{
        background-color: darkgray;
        padding: 10px;
        line-height: 40px;
    }
    .nombre-campo{
        padding: 0px 15px;
    }
    .el-row {
        margin-bottom: 20px;
        &:last-child {
            margin-bottom: 0;
        }
    }
    .el-col {
        border-radius: 4px;
    }
    .bg-purple-dark {
        background: #99a9bf;
    }
    .bg-purple {
        background: #d3dce6;
    }
    .bg-purple-light {
        background: #e5e9f2;
    }
    .grid-content {
        border-radius: 4px;
        height: 44px;
        display: flex;
        flex-direction: row;
        white-space: nowrap;
        align-items: center;
        padding: 0px 3px;
    }
    .row-bg {
        padding: 10px 0;
        background-color: #f9fafc;
    }
</style>