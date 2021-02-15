import listadoFormularios from '../components/formularios/formularioEnsayo.vue';
import Element from 'element-ui';
import locale from 'element-ui/lib/locale/lang/es';

Vue.use(Element, {locale});

new Vue({
    el: '#plantilla' ,
    components: {
        listadoFormularios
    },
    data() {
        return {
            
        }
    }
});

