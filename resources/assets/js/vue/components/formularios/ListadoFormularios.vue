<template>
  <div class="contenedor-vue" style="display: flex; flex-direction: column">
    <div class="container-elementos">
      <h1>Listado Órdenes de Trabajo de Terreno</h1>
      <el-input
        class="width-100"
        placeholder="Filtre por N° OTT, N° Cliente Obra o Laboratorista"
        v-model="buscador"
      ></el-input>
    </div>
    <div class="container-items-formulario">
      <item-lista-formularios
        v-for="(orden, index) in ordenesDeTrabajo"
        v-bind:itemLista="orden"
        v-bind:index="index"
        v-bind:key="orden.id"
        @actualizar="getOrdenes"
      />
    </div>
  </div>
</template>
<script>
import ItemListaFormularios from "../../components/formularios/ItemListaFormularios.vue";

export default {
  components: {
    ItemListaFormularios,
  },
  props: ["modo"],
  data() {
    return {
      urltodasLasOrdenes: `${GLOBAL.URL}formularios/todas-las-ordenes`,
      ordenesDeTrabajo: "",
      todasLasOrdenes: "",
      buscador: "",
    };
  },
  mounted() {
    this.getOrdenes();
  },
  methods: {
    getOrdenes() {
      this.ordenesDeTrabajo = [];
      this.todasLasOrdenes = [];
      this.$http.get(`${this.urltodasLasOrdenes}/${this.modo}`).then(
        (response) => {
          this.todasLasOrdenes = response.body;
          this.ordenesDeTrabajo = response.body;
        },
        (response) => {
          Tools.mensajeAlerta(
            "No se pueden cargar las ordenes.",
            Tools.MENSAJE.ERROR,
            "",
            5
          );
        }
      );
    },
    filtraOrdenes() {
      this.ordenesDeTrabajo = this.todasLasOrdenes.filter(
        (orden) =>
          orden.num_cliente_obra
            .toLowerCase()
            .includes(this.buscador.toLowerCase()) ||
          orden.laboratorista
            .toLowerCase()
            .includes(this.buscador.toLowerCase()) ||
          orden.id.toString().includes(this.buscador.toLowerCase())
      );
    },
  },
  watch: {
    buscador() {
      this.filtraOrdenes();
    },
    modo() {
      this.getOrdenes();
    },
  },
};
</script>
<style>
.width-100 {
  width: 100%;
}
.container-elementos {
  margin-bottom: 20px;
}
.container-items-formulario {
  max-height: calc(100% - 128px);
  overflow: auto;
  padding: 10px;
}
</style>


aridos-volumen m3 no va

aridos-muestras son check