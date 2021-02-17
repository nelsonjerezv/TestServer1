
// componentes
import DashboardFormularios from '../../components/formularios/DashboardFormularios.vue';
import SidebarFormularios from '../../components/formularios/SidebarFormularios.vue';

// librerias
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale";
import lang from "element-ui/lib/locale/lang/es";

locale.use(lang);
Vue.use(ElementUI);

new Vue({
    el: '#formularios' ,
    components: {
        DashboardFormularios,
        SidebarFormularios
    },
    data() {
        return {

        }
    }
});

