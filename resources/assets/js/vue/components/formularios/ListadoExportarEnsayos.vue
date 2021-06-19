<template>
  <div class="contenedor-vue" style="display: flex; flex-direction: column">
    <div class="container-elementos">
      <h1>Buscar Informes</h1>
      <el-input
        class="width-100"
        placeholder="Filtre por N° Ott, N° Muestra, N° Informe o quien realizó el ensayo"
        v-model="buscador"
      ></el-input>
    </div>
    <div class="container-items-formulario">
      <item-lista-exportar-ensayos
        v-for="(orden, index) in ensayosHormigon"
        v-bind:itemLista="orden"
        v-bind:index="index"
        v-bind:key="orden.id"
        @actualizar="getEnsayos"
      />
    </div>
  </div>
</template>
<script>
import ItemListaExportarEnsayos from "./ItemListaExportarEnsayos.vue";

export default {
  components: {
    ItemListaExportarEnsayos,
  },
  props: ["modo"],
  data() {
    return {
      urlTodosLosEnsayos: `${GLOBAL.URL}ensayos/todos-los-ensayos`,
      ensayosHormigon: "",
      todosLosEnsayos: "",
      buscador: "",
    };
  },
  mounted() {
    this.getEnsayos();
  },
  methods: {
    getEnsayos() {
      this.ensayosHormigon = [];
      this.todosLosEnsayos = [];
      this.$http.get(`${this.urlTodosLosEnsayos}/${this.modo}`).then(
        (response) => {
          this.todosLosEnsayos = response.body;
          this.ensayosHormigon = response.body;
        },
        (response) => {
          Tools.mensajeAlerta(
            "No se pueden cargar los ensayos.",
            Tools.MENSAJE.ERROR,
            "",
            5
          );
        }
      );
    },
    filtraEnsayos() {
      this.ensayosHormigon = this.todosLosEnsayos;
      let aciertos = [];
      for (let index = 0; index < this.ensayosHormigon.length; index++) {
        let numInforme = this.ensayosHormigon[index].num_informe
          ? this.ensayosHormigon[index].num_informe
              .toLowerCase()
              .includes(this.buscador.toLowerCase())
          : false;

        let numMuestra = this.ensayosHormigon[index].num_ingreso
          ? this.ensayosHormigon[index].num_ingreso
              .toLowerCase()
              .includes(this.buscador.toLowerCase())
          : false;

        let numOtt = this.ensayosHormigon[index].ott.num_ott
          ? this.ensayosHormigon[index].ott.num_ott
              .toLowerCase()
              .includes(this.buscador.toLowerCase())
          : false;

        let ensayador = this.ensayosHormigon[index].ensayado_por
          ? this.ensayosHormigon[index].ensayado_por
              .toLowerCase()
              .includes(this.buscador.toLowerCase())
          : false;

        if (numMuestra || numInforme || ensayador || numOtt) {
          aciertos.push(this.ensayosHormigon[index]);
        }
      }
      this.ensayosHormigon = aciertos;
    },
  },
  watch: {
    buscador() {
      this.filtraEnsayos();
    },
    modo() {
      this.getEnsayos();
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
  overflow: auto;
  padding: 10px;
}
</style>