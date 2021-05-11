<template>
  <div class="contenedor-vue height-max-percent">
    <el-header> Prototipo </el-header>
    <el-container style="height: calc(100% - 0px) !important">
      <sidebar-formularios @cambiaMain="cambiarMain" ref="sidebar" />
      <el-container>
        <el-main>
          <div v-if="componenteMain == ''" class="bienvenido">Bienvenido</div>
          <listado-formularios
            v-if="componenteMain == 'ListadoFormularios'"
            :modo="modoListadoOtt"
          />
          <orden-trabajo-terreno
            v-if="componenteMain == 'OrdenTrabajoTerreno'"
            @cambiaMain="cambiarMain"
            :tipo-ott="tipoOTT"
          />
          <ensayo-compresion-probetas-cilindricas
            v-if="componenteMain == 'EnsayoCompresionProbetasCilindricas'"
            @cambiaMain="cambiarMain"
            :tipo-ensayo="tipoEnsayo"
          />
          <listado-ensayos-compresion-probetas-cilindricas
            v-if="
              componenteMain == 'ListadoEnsayosCompresionProbetasCilindricas'
            "
            @cambiaMain="cambiarMain"
            :modo="modoListadoEnsayo"
          />
          <listado-exportar-ensayos
            v-if="componenteMain == 'ListadoExportarEnsayos'"
            @cambiaMain="cambiarMain"
            :modo="modoListadoExportar"
          />
        </el-main>
        <el-footer>Footer</el-footer>
      </el-container>
    </el-container>
  </div>
</template>

<script>
import SidebarFormularios from "../../components/formularios/SidebarFormularios.vue";
import OrdenTrabajoTerreno from "../../components/formularios/OrdenTrabajoTerreno.vue";
import ListadoFormularios from "../../components/formularios/ListadoFormularios.vue";
import EnsayoCompresionProbetasCilindricas from "../../components/formularios/EnsayoCompresionProbetasCilindricas.vue";
import ListadoEnsayosCompresionProbetasCilindricas from "../../components/formularios/ListadoEnsayosCompresionProbetasCilindricas.vue";
import ListadoExportarEnsayos from "../../components/formularios/ListadoExportarEnsayos.vue";

export default {
  components: {
    SidebarFormularios,
    OrdenTrabajoTerreno,
    ListadoFormularios,
    EnsayoCompresionProbetasCilindricas,
    ListadoEnsayosCompresionProbetasCilindricas,
    ListadoExportarEnsayos,
  },
  props: ["ordenes"],
  data() {
    return {
      componenteMain: "",
      // componenteMain: 'EnsayoCompresionProbetasCilindricas',
      // componenteMain: 'ListadoEnsayosCompresionProbetasCilindricas',
      tipoOTT: "",
      tipoEnsayo: "",
      modoListadoOtt: "",
      modoListadoEnsayo: "",
      modoListadoExportar: "",
    };
  },
  mounted() {
    console.log("ordenes", this.ordenes);
  },
  methods: {
    cambiarMain: function (contenido) {
      this.componenteMain = contenido.vista;
      if (contenido.vista === "OrdenTrabajoTerreno") {
        this.tipoOTT = contenido.condicion;
      }
      if (contenido.vista === "EnsayoCompresionProbetasCilindricas") {
        this.tipoEnsayo = contenido.condicion;
      }
      if (contenido.vista === "ListadoFormularios") {
        this.modoListadoOtt = contenido.condicion;
        if (this.modoListadoOtt == "porvalidar") {
          this.$refs.sidebar.$refs.menuLateral.activeIndex = "2-2";
        } else if (this.modoListadoOtt == "validadas") {
          this.$refs.sidebar.$refs.menuLateral.activeIndex = "2-3";
        }
      }
      if (contenido.vista === "ListadoEnsayosCompresionProbetasCilindricas") {
        this.modoListadoEnsayo = contenido.condicion;
        if (this.modoListadoOtt == "porvalidar") {
          this.$refs.sidebar.$refs.menuLateral.activeIndex = "3-2";
        } else if (this.modoListadoOtt == "validadas") {
          this.$refs.sidebar.$refs.menuLateral.activeIndex = "3-3";
        }
      }
      if (contenido.vista === "ListadoExportarEnsayos") {
        this.modoListadoExportar = contenido.condicion;
      }
    },
  },
};
</script>

<style style="scss">
.height-max-percent {
  height: 100%;
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
.el-menu-item-group__title {
  padding: 0px 0px 0px 20px;
}

.bienvenido {
  display: flex;
  width: 100%;
  height: 100%;
  justify-content: center;
}
</style>