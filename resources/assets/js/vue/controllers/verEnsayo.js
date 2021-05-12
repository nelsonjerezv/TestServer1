
// componentes
import EnsayoCompresionProbetasCilindricas from "../components/formularios/EnsayoCompresionProbetasCilindricas.vue";
// librerias
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import locale from "element-ui/lib/locale";
import lang from "element-ui/lib/locale/lang/es";

locale.use(lang);
Vue.use(ElementUI);

new Vue({
    el: '#ver-ensayo',
    components: {
        EnsayoCompresionProbetasCilindricas
    },
    data() {
        return {
            ensayo: window.ensayo,
            accion: window.accion
        }
    }
});

