<template>
    <div class="container">
        <div>
            Componente formularios
        </div>
        <span class="demonstration">With default value</span>
        <el-color-picker v-model="color1"></el-color-picker>
        <el-color-picker v-model="color" show-alpha></el-color-picker>                
    </div>
</template>

<script>
    import { ColorPicker } from 'element-ui';
    import locale from 'element-ui/lib/locale';
    import lang from 'element-ui/lib/locale/lang/es';

    // Vue.component(ColorPicker.name, ColorPicker);
    Vue.use(ColorPicker);

    export default {
        data() {
            return {
                color1: '#409EFF',
                color2: null,
                color: 'rgba(19, 206, 102, 0.8)'
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>

</style>