
// componentes
import OrdenTrabajoTerreno from '../components/formularios/OrdenTrabajoTerreno.vue';
// librerias
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale";
import lang from "element-ui/lib/locale/lang/es";

locale.use(lang);
Vue.use(ElementUI);

new Vue({
    el: '#ver-ott' ,
    components: {
        OrdenTrabajoTerreno
    },
    data() {
        return {
            orden: window.orden,
            accion: window.accion
        }
    }
});

