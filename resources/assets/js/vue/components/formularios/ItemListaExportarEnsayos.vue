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
        <el-button type="warning" @click="dialogVisible = true" plain
          >Ver Ensayo</el-button
        >
        <el-dialog
          :visible.sync="dialogVisible"
          width="90%"
          :before-close="handleClose"
        >
          <iframe
            style="width: 100%; height: 100%"
            :src="rutaVerInforme"
          ></iframe>
          <span slot="footer" class="dialog-footer">
            <el-button @click="dialogVisible = false" plain
              >Cerrar visualizaci&oacute;n</el-button
            >
            <!-- <el-button type="primary" @click="dialogVisible = false">Confirm</el-button> -->
          </span>
        </el-dialog>
        <el-popover
          placement="right"
          width="400"
          trigger="click"
          popper-class="datos-informe"
        >
          <div class="una-linea">
            <h3>Complete Datos faltantes</h3>
          </div>
          <div id="campos-completar-manual">
            <div class="una-linea">
              Direcci&oacute;n Solicitante:
              <el-input
                placeholder=""
                size="mini"
                v-model="direccionSolicitante"
              />
            </div>
            <div class="una-linea">
              Localizaci&oacute;n Obra:
              <el-input placeholder="" size="mini" v-model="localizacionObra" />
            </div>
            <div class="una-linea">
              Proyecto N°:
              <el-input placeholder="" size="mini" v-model="numProyecto" />
            </div>
            <div class="una-linea">
              Nº Correlativo de informe obra:
              <el-input
                placeholder=""
                size="mini"
                v-model="numCorrelativoInformeObra"
              />
            </div>
            <div class="una-linea">
              Nº Correlativo de obra:
              <el-input
                placeholder=""
                size="mini"
                v-model="numCorrelativoObra"
              />
            </div>
            <div class="una-linea">
              Curado inicial:
              <el-input placeholder="" size="mini" v-model="curadoInicial" />
            </div>
            <div class="una-linea">
              Lugar de realizaci&oacute;n de ensayos:
              <el-input placeholder="" size="mini" v-model="lugarEnsayos" />
            </div>
            <div class="una-linea">
              N&uacute;mero de p&aacute;gina de este informe:
              <el-input placeholder="" size="mini" v-model="paginaActual" />
            </div>
            <div class="una-linea">
              N&uacute;mero de p&aacute;ginas total:
              <el-input placeholder="" size="mini" v-model="totalPaginas" />
            </div>
            <div class="una-linea">
              Persona que firma:
              <el-input placeholder="" size="mini" v-model="firmador" />
            </div>
            <div class="una-linea">
              Profesi&oacute;n de quien firma:
              <el-input
                placeholder=""
                size="mini"
                v-model="profesionFirmador"
              />
            </div>
            <div class="una-linea">
              Cargo de quien firma:
              <el-input placeholder="" size="mini" v-model="cargoFirmador" />
            </div>
            <!-- <div class="una-linea" v-if="item.ott.muestreado_por.toUpperCase() != 'LACEM'">Fecha de muestreo:
                                                                                                    <el-date-picker
                                                                                                          v-model="fechaMuestreoManual"
                                                                                                          type="date"
                                                                                                          size="mini"
                                                                                                          format="dd-MM-yyyy"
                                                                                                          value-format="dd-MM-yyyy">
                                                                                                      </el-date-picker>
                      </div> -->
          </div>
          <div class="una-linea">
            <el-button type="primary" @click="exportarPDF" plain
              >Exportar Informe</el-button
            >
          </div>
          <el-button slot="reference" type="primary" plain
            >Exportar a PDF</el-button
          >
        </el-popover>
        <!-- <el-popover
                    placement="right"
                    width="400"
                    trigger="click"
                    popper-class="datos-informe">
                    <div class="una-linea">Complete Datos faltantes</div>
                    <div class="una-linea">Dirección Solicitante:            <el-input placeholder="" size="mini" v-model="direccionSolicitante"/></div>
                    <div class="una-linea">Localización Obra:                <el-input placeholder="" size="mini" v-model="localizacionObra"/></div>
                    <div class="una-linea">Proyecto N°:                      <el-input placeholder="" size="mini" v-model="numProyecto"/></div>
                    <div class="una-linea">Nº Correlativo de informe obra:   <el-input placeholder="" size="mini" v-model="numCorrelativoInformeObra"/></div>
                    <div class="una-linea">Nº Correlativo de obra:           <el-input placeholder="" size="mini" v-model="numCorrelativoObra"/></div>
                    <div class="una-linea">Curado inicial:                   <el-input placeholder="" size="mini" v-model="curadoInicial"/></div>
                    <div class="una-linea">Lugar de realizaci&oacute;n de ensayos: <el-input placeholder="" size="mini" v-model="lugarEnsayos"/></div>
                    <div class="una-linea"><el-button type="success" @click="exportarExcel" plain>Exportar Excel</el-button></div>
                    <el-button slot="reference" type="success" plain>Exportar a Excel</el-button>
                </el-popover> -->
        <el-button type="success" @click="handleInner" disabled plain>
          Exportar a Excel
        </el-button>
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
      urlEliminarEnsayo: `${GLOBAL.URL}ensayos/eliminar-ensayo`,
      urlEditarEnsayo: `${GLOBAL.URL}ensayos/editar-ensayo`,
      urlExportarEnsayoPdf: `${GLOBAL.URL}ensayos/exportar-ensayo-pdf`,
      urlExportarEnsayoExcel: `${GLOBAL.URL}ensayos/exportar-ensayo-excel`,
      direccionSolicitante: "Dirección Solicitante",
      localizacionObra: "localizacion obra",
      numProyecto: "numero de proyecto",
      numCorrelativoInformeObra: "n° corelativo informe obra",
      numCorrelativoObra: "n° corelativo obra",
      curadoInicial: "Piscina de Curado",
      lugarEnsayos: "Laboratorio LACEM",
      fechaMuestreoManual: "",
      paginaActual: "1",
      totalPaginas: "1",
      firmador: "CRISTIAN ALARCON BRAVO",
      profesionFirmador: "Ingeniero Civil U.C.",
      cargoFirmador: "Jefe Área Hormigones",
      dialogVisible: false,
    };
  },
  mounted() {
    this.item = this.itemLista;
    this.numeroOtt = this.item.ott.num_ott;
    console.log("item.muestreadoPor", this.item);
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
        fechaMuestreoManual: this.fechaMuestreoManual,
      };

      let fecha =
        this.fechaMuestreoManual == "" ? "-" : this.fechaMuestreoManual;

      let url =
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
        this.lugarEnsayos +
        "/" +
        fecha +
        "/" +
        this.paginaActual +
        "/" +
        this.totalPaginas +
        "/" +
        this.firmador +
        "/" +
        this.profesionFirmador +
        "/" +
        this.cargoFirmador;
      console.log("exportarPDF", url);
      window.open(url, "_blank");
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
    handleClose(done) {
      done();
      // .catch(_ => {});
    },
    handleInner(done) {
      this.$confirm("Pendiente").then((_) => {
        done();
      });
      // .catch(_ => {});
    },
  },
  computed: {
    rutaVerInforme() {
      let fecha =
        this.fechaMuestreoManual == "" ? "-" : this.fechaMuestreoManual;
      let ruta =
        `${GLOBAL.URL}` +
        "/ensayos/ver-ensayo-pdf/" +
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
        this.lugarEnsayos +
        "/" +
        fecha +
        "/" +
        "quien firma" +
        "/" +
        "profesion de quien firma" +
        "/" +
        "cargo de quien firma";

      return ruta;
    },
  },
};
</script>

<style lang="scss" scoped>
#campos-completar-manual {
  height: 28em;
  overflow: auto;
}
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