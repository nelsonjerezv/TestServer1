<template>
  <div class="item-lista-formularios">
    <div class="item">
      <div class="atributos">
        <div class="item-atributo">
          <strong>N° Muestra:</strong> {{ item.num_ingreso }} &emsp; &emsp;
          <strong>N° Informe:</strong> {{ item.num_informe }}
        </div>
        <div class="item-atributo">
          <strong>N° Ott:</strong> {{ numeroOtt }} &emsp; &emsp;
          <strong>Ensayado por:</strong> {{ item.ensayado_por }}
        </div>
      </div>

      <div class="item-contenedor-botones">
        <el-button type="primary" @click="dialogVerVisible = true" plain
          >Ver Ensayo</el-button
        >
        <el-dialog :visible.sync="dialogVerVisible" width="90%">
          <!-- :before-close="handleClose" -->
          <iframe
            style="width: 100%; height: 100%"
            :src="rutaVerInforme"
          ></iframe>
          <span slot="footer" class="dialog-footer">
            <el-button
              type="success"
              @click="validarEnsayo"
              v-if="!item.validado"
              plain
              >Validar</el-button
            >
            <el-button
              type="warning"
              @click="rechazarEnsayo"
              v-if="item.validado"
              plain
              >Rechazar</el-button
            >
            <el-button type="danger" @click="dialogVerVisible = false" plain
              >Cerrar visualizaci&oacute;n</el-button
            >
            <!-- <el-button type="primary" @click="dialogVerVisible = false">Confirm</el-button> -->
          </span>
        </el-dialog>
        <el-button type="warning" @click="dialogEditarVisible = true" plain
          >Editar Ensayo</el-button
        >
        <el-dialog :visible.sync="dialogEditarVisible" width="90%">
          <iframe
            style="width: 100%; height: 100%"
            :src="rutaEditarEnsayo"
            ref="iframe"
          ></iframe>
          <span slot="footer" class="dialog-footer">
            <el-button
              type="success"
              @click="validarEnsayo"
              v-if="!item.validado"
              plain
              >Validar</el-button
            >
            <el-button
              type="warning"
              @click="rechazarEnsayo"
              v-if="item.validado"
              plain
              >Rechazar</el-button
            >
            <el-button
              type="danger"
              id="cerrar-visualizacion"
              @click="dialogEditarVisible = false"
              plain
              >Cerrar visualizaci&oacute;n</el-button
            >
          </span>
        </el-dialog>

        <el-popconfirm
          confirm-button-text="Eliminar"
          cancel-button-text="volver"
          @confirm="eliminarEnsayo"
          placement="top-end"
          icon="el-icon-info"
          icon-color="red"
          :hide-icon="true"
          title="Está seguro quiere eliminar el ensayo?"
        >
          <el-button slot="reference" type="danger" plain>Eliminar</el-button>
        </el-popconfirm>
      </div>
    </div>
  </div>
</template>

<script>
import Tools from "../../../tools.js";

export default {
  props: ["itemLista"],
  data() {
    return {
      item: "",
      numeroOtt: "",
      dialogVerVisible: false,
      dialogEditarVisible: false,
      urlEliminarEnsayo: `${GLOBAL.URL}ensayos/eliminar-ensayo`,
      urlEditarEnsayo: `${GLOBAL.URL}ensayos/editar-ensayo`,
      urlValidarFormulario: `${GLOBAL.URL}` + "/formularios/validar-ensayo",
      urlRechazarFormulario: `${GLOBAL.URL}` + "/formularios/rechazar-ensayo",
      urlExportarEnsayoPdf: `${GLOBAL.URL}ensayos/exportar-ensayo-pdf`,
    };
  },
  mounted() {
    this.item = this.itemLista;
    this.numeroOtt = this.item.ott.num_ott;
  },
  methods: {
    eliminarEnsayo() {
      this.$http
        .post(this.urlEliminarEnsayo, {
          id: this.item.id,
        })
        .then(
          (response) => {
            Tools.mensajeAlerta(
              "Ensayo eliminado.",
              Tools.MENSAJE.EXITO,
              "",
              5
            );
            this.$emit("actualizar");
          },
          (response) => {
            Tools.mensajeAlerta(
              "No se pudo eliminar el ensayoo.",
              Tools.MENSAJE.ERROR,
              "",
              5
            );
          }
        );
    },
    editarEnsayo() {
      // this.$http.get(this.urlEditarFormulario,{
      //     id: this.item.id
      // });
      console.log("editar ensayo");
    },
    exportarPDF() {
      let data = {
        id: this.item.id,
        direccionSolicitante: this.direccionSolicitante,
        localizacionObra: this.localizacionObra,
        numProyecto: this.numProyecto,
        numCorrelativoInformeObra: this.numCorrelativoInformeObra,
        numCorrelativoObra: this.numCorrelativoObra,
        curadoInicial: this.curadoInicial,
      };
      window.open(
        this.urlExportarEnsayoPdf +
          "/" +
          this.item.id +
          "/" +
          this.direccionSolicitante +
          "/" +
          this.localizacionObra +
          "/" +
          this.numProyecto +
          "/" +
          this.numCorrelativoInformeObra +
          "/" +
          this.numCorrelativoObra +
          "/" +
          this.curadoInicial +
          "/" +
          this.lugarEnsayos,
        "_blank"
      );
      console.log("exportarPDF");
    },
    exportarExcel() {
      let data = {
        id: this.item.id,
        direccionSolicitante: this.direccionSolicitante,
        localizacionObra: this.localizacionObra,
        numProyecto: this.numProyecto,
        numCorrelativoInformeObra: this.numCorrelativoInformeObra,
        numCorrelativoObra: this.numCorrelativoObra,
        curadoInicial: this.curadoInicial,
      };
      window.open(
        this.urlExportarEnsayoExcel +
          "/" +
          this.item.id +
          "/" +
          this.direccionSolicitante +
          "/" +
          this.localizacionObra +
          "/" +
          this.numProyecto +
          "/" +
          this.numCorrelativoInformeObra +
          "/" +
          this.numCorrelativoObra +
          "/" +
          this.curadoInicial +
          "/" +
          this.lugarEnsayos,
        "_blank"
      );
      console.log("exportarExcel");
    },
    handleInner(done) {
      this.$confirm("Pendiente")
        .then((_) => {
          done();
        })
        .catch((_) => {});
    },
    validarEnsayo() {
      this.$http
        .post(this.urlValidarFormulario, {
          id: this.item.id,
        })
        .then(
          (response) => {
            Tools.mensajeAlerta(
              "Ensayo validado exitosamente.",
              Tools.MENSAJE.EXITO,
              "",
              5
            );
            this.dialogVerVisible = false;
            this.dialogEditarVisible = false;
            this.$emit("actualizar");
          },
          (response) => {
            Tools.mensajeAlerta(
              "No se pudo validar el ensayo.",
              Tools.MENSAJE.ERROR,
              "",
              5
            );
          }
        );
    },
    rechazarEnsayo() {
      this.$http
        .post(this.urlRechazarFormulario, {
          id: this.item.id,
        })
        .then(
          (response) => {
            Tools.mensajeAlerta(
              "Ensayo rechazado exitosamente.",
              Tools.MENSAJE.EXITO,
              "",
              5
            );
            this.dialogVerVisible = false;
            this.dialogEditarVisible = false;
            this.$emit("actualizar");
          },
          (response) => {
            Tools.mensajeAlerta(
              "No se pudo rechazar el ensayo.",
              Tools.MENSAJE.ERROR,
              "",
              5
            );
          }
        );
    },
  },
  computed: {
    rutaVerInforme() {
      return this.dialogVerVisible
        ? `${GLOBAL.URL}` + "/ensayos/ver-ensayo/" + this.item.id
        : "";
    },
    rutaEditarEnsayo() {
      return this.dialogEditarVisible
        ? `${GLOBAL.URL}` + "/ensayos/editar-ensayo/" + this.item.id
        : "";
    },
  },
  watch: {
    dialogEditarVisible() {
      if (!this.dialogEditarVisible) {
        this.$emit("actualizar");
      }
    },
    dialogVerVisible() {
      if (!this.dialogVerVisible) {
        this.$emit("actualizar");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.una-linea {
  white-space: nowrap;
  display: flex;
  line-height: 40px;
  margin-bottom: 6px;
  .el-input {
    margin-left: 5px;
  }
}
.datos-informe {
  width: 700px;
}
.item-lista-formularios {
  display: flex;
  flex-grow: 1;
  background-color: #e4e4e4;
  line-height: 20px;
  padding: 10px;
  border-radius: 15px;
  border: 1px solid #888787;
  margin-bottom: 10px;
}
.item {
  flex-direction: row;
  text-align-last: left;
  height: fit-content;
  flex-wrap: nowrap;
  width: 100%;
  display: flex;
}
.item-atributo {
  width: fit-content;
}
.item-contenedor-botones {
  flex-grow: 1;
  text-align-last: end;
}
.el-button--warning.is-plain {
  margin-left: 0px;
}
/deep/ .el-dialog {
  width: 90% !important;
  height: 90% !important;
  margin: 3% auto !important;
  .el-dialog__header {
    padding: 0px;
  }
  .el-dialog__body {
    height: calc(100% - 60px);
    padding: 20px;
  }
  .el-dialog__footer {
    padding: 0px 20px 20px;
  }
}
</style>