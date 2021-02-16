<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <!-- <div class="card-header">Example Component</div> -->

                    <div class="card-body">
                        Componente prueba
                    </div>
                    <!-- <el-button
                        :@click="iraFormularios">
                        ir a formularios
                    </el-button> -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            // iraFormularios(){
            //     this.$http.get('http://app.versionuno/formularios');
            // }
        }
    }
</script>
