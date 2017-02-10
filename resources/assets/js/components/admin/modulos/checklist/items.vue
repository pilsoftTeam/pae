<template>
    <div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">


                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" v-for="item in items">
                                <h5 class="text-center">{{item.nombreItem}}</h5>
                                <button class="btn btn-info btn-sm btn-block" @click="startItem = item">
                                    Cargar
                                </button>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5>{{startItem.nombreItem}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group btn-block">
                    <div class="">

                    </div>
                    <button type="button" data-toggle="modal" href="#agruparPreguntaModal"
                            class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agrupar preguntas
                    </button>
                    <button type="button" class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agregar pregunta
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="agruparPreguntaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agrupar preguntas</h4>
                    </div>
                    <div class="modal-body">


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Titulo de agrupacion</label>
                                    <div class="col-sm-10">
                                        <input type="text"
                                               v-model="tituloAgrupacion.nombreAgrupacion"
                                               class="form-control"
                                               required="required">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <p class="text-center">
                            Agrupar preguntas esta
                            pensado para cuando hay
                            preguntas que se
                            perteneces unas a otras
                            dejarlas todas juntas</p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="agruparPregunta">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
</template>
<style scoped>
    .panel {
        min-height: 60vh;
        max-height: 100%;
    }

    .footer {
        bottom: 4%;
        position: absolute;
    }
</style>
<script>
    export default {
        mounted() {
            this.startItem = this.itemFromParent
        },
        props: {
            itemFromParent: Object,
            items: Array
        },

        data(){
            return {
                startItem: '',
                tituloAgrupacion: {
                    idItem: '',
                    nombreAgrupacion: ''
                }
            }
        },

        methods: {

            traerAgrupaciones(){
                axios.get('api/get/agrupaciones').then(r => {
                    console.log(r.data)
                }).then(e => {
                    console.log(e)
                })
            },
            agruparPregunta(){
                let self = this;
                self.tituloAgrupacion.idItem = self.startItem.id;
                let data = self.tituloAgrupacion;

                axios.post('api/save/agrupacion', data).then(r => {
                    console.log(r.data)
                }).catch(e => {
                    console.log(e.status)
                })


            }
        },
        computed: {},
        components: {},
    }
</script>
