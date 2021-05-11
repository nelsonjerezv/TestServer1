<template>
  <div>
    <el-aside width="fit-content">
      <el-menu
        default-active="1"
        class="el-menu-vertical-demo"
        ref="menuLateral"
      >
        <el-menu-item index="1" @click="inicio"> Inicio </el-menu-item>
        <el-submenu index="2">
          <template slot="title">
            <span slot="title">OTT</span>
          </template>
          <el-menu-item-group>
            <el-menu-item index="2-1" @click="nuevaOTT">
              Nueva OTT
            </el-menu-item>
            <el-menu-item index="2-2" @click="listadoOTTsPorValidar">
              OTTs por validar
            </el-menu-item>
            <el-menu-item index="2-3" @click="listadoOTTsValidadas">
              OTTs validadas
            </el-menu-item>
          </el-menu-item-group>
          <!-- <el-menu-item-group>
                        <el-menu-item index="2-3" disabled>item three</el-menu-item>
                    </el-menu-item-group> -->
          <!-- <el-submenu index="2-4">
                        <span slot="title">item four</span>
                        <el-menu-item index="2-4-1">item one</el-menu-item>
                    </el-submenu> -->
        </el-submenu>

        <el-submenu index="3">
          <template slot="title">
            <span slot="title">Ensayos</span>
          </template>
          <el-menu-item-group>
            <el-menu-item index="3-1" @click="nuevoEnsayo">
              Nuevo Ensayo
            </el-menu-item>
            <el-menu-item index="3-2" @click="listadoEnsayosPorValidar">
              Ensayos por validar
            </el-menu-item>
            <el-menu-item index="3-3" @click="listadoEnsayosValidos">
              Ensayos validados
            </el-menu-item>
          </el-menu-item-group>
        </el-submenu>

        <el-submenu index="4">
          <span slot="title">Exportar</span>
          <el-menu-item-group>
            <el-menu-item index="4-1" @click="exportaEnsayos">
              Ensayos
            </el-menu-item>
          </el-menu-item-group>
          <!-- <el-menu-item-group>
                        <el-menu-item disabled index="4-2">
                            A Excel
                        </el-menu-item>
                    </el-menu-item-group> -->
        </el-submenu>

        <el-submenu index="5">
          <span slot="title">Mantenedores</span>
          <el-menu-item-group>
            <el-menu-item index="5-1" @click="inicio" disabled>
              Usuarios
            </el-menu-item>
          </el-menu-item-group>
 
        </el-submenu>



        <!-- <el-menu-item index="6" disabled>
                    <span slot="title">Navigator Four</span>
                </el-menu-item> -->
      </el-menu>
    </el-aside>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    inicio() {
      this.$emit("cambiaMain", "");
      this.$refs.menuLateral.activeIndex = "1";
    },
    nuevaOTT() {
      this.$emit("cambiaMain", {
        vista: "OrdenTrabajoTerreno",
        condicion: "nueva",
      });
      this.$refs.menuLateral.activeIndex = "2-1";
    },
    listadoOTTsPorValidar() {
      this.$emit("cambiaMain", {
        vista: "ListadoFormularios",
        condicion: "porvalidar",
      });
      this.$refs.menuLateral.activeIndex = "2-2";
    },
    listadoOTTsValidadas() {
      this.$emit("cambiaMain", {
        vista: "ListadoFormularios",
        condicion: "validadas",
      });
      this.$refs.menuLateral.activeIndex = "2-3";
    },
    nuevoEnsayo() {
      this.$emit("cambiaMain", {
        vista: "EnsayoCompresionProbetasCilindricas",
        condicion: "nueva",
      });
      this.$refs.menuLateral.activeIndex = "3-1";
    },
    listadoEnsayosPorValidar() {
      this.$emit("cambiaMain", {
        vista: "ListadoEnsayosCompresionProbetasCilindricas",
        condicion: "porvalidar",
      });
      this.$refs.menuLateral.activeIndex = "3-2";
    },
    listadoEnsayosValidos() {
      this.$emit("cambiaMain", {
        vista: "ListadoEnsayosCompresionProbetasCilindricas",
        condicion: "validadas",
      });
      this.$refs.menuLateral.activeIndex = "3-3";
    },
    exportaEnsayos() {
      this.$emit("cambiaMain", {
        vista: "ListadoExportarEnsayos",
        condicion: "validadas",
      });
      this.$refs.menuLateral.activeIndex = "4-1";
    },
  },
};
</script>

<style>
.el-menu-vertical-demo:not(.el-menu--collapse) {
  width: fit-content;
  min-height: 400px;
}
.el-menu {
  background-color: transparent;
}
.el-menu-item,
.el-submenu__title,
.el-submenu .el-menu-item {
  height: 40px;
  line-height: 40px;
}
</style>