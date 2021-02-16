
import listadoFormularios from '../../components/formularios/FormularioEnsayo.vue';
import Element from 'element-ui';
import locale from 'element-ui/lib/locale/lang/es';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(Element, {locale});

new Vue({
    el: '#formularios' ,
    components: {
        listadoFormularios
    },
    data() {
        return {
            
        }
    }
});

