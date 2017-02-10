<template>
    <div>
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">


                <div class="panel father panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" v-for="item in items">
                                <h5 class="text-center">{{item.nombreItem}}</h5>
                                <button class="btn btn-info btn-sm btn-block" @click="changeItem(item)">
                                    Cargar
                                </button>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="panel father panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5>{{startItem.nombreItem}}</h5>
                                <hr>


                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <h4>Agrupacion de evaluaciones</h4>
                                        <hr>
                                        <div class="panel panel-info" v-for="items in agrupaciones">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">{{items.nombreAgrupacion}}</h3>
                                            </div>
                                            <div class="panel-body">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <h4>Evaluaciones</h4>
                                        <hr>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-group btn-block">
                    <div class="">

                    </div>
                    <button type="button" data-toggle="modal" href="#agruparPreguntaModal"
                            class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agrupar evaluaciones
                    </button>
                    <button type="button" data-toggle="modal" href="#agregarPregunta"
                            class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agregar evaluaciones
                    </button>
                </div>
            </div>
        </div>

        <div class="modal fade" id="agruparPreguntaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agrupar evaluaciones</h4>
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


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="agruparPregunta">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <div class="modal fade" id="agregarPregunta">
            <div class="modal-dialog modal-lg" style="width: 95%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar evaluacion</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="panel father panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"
                                                 style="border-right: 1px solid lightgrey">
                                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Titulo de la evaluacion</label>
                                                    <input type="text"
                                                           placeholder="Escriba aca el titulo de la evaluacion"
                                                           v-model="evaluacion.nombreEvaluacion"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Documentos verificadores</label>
                                                    <input type="text" v-model="evaluacion.documentosVerificadores"
                                                           placeholder="Separe cada documento con una coma *Opcional*"
                                                           class="form-control">
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Aspecto</label>
                                                    <textarea v-model="evaluacion.aspecto"
                                                              placeholder="Escriba el aspecto evaluativo de esta evaluacion *Opcional*"
                                                              class="form-control"></textarea>
                                                </div>
                                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Criticidad de la evaluacion</label>
                                                    <input type="text" v-model="evaluacion.criticidad"
                                                           placeholder="Escriba aqui la criticidad de esta evaluacion *Opcional*"
                                                           class="form-control">
                                                </div>

                                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <label class="control-label">Opcion de evaluacion</label>
                                                    <div>
                                                        <select class="form-control"
                                                                v-model="evaluacion.opcionCumplimiento">
                                                            <option v-for="item in opcionesEvaluacion" :value="item.id">
                                                                {{item.nombreCumplimiento}} --
                                                                <span>
                                                                    <label class="label label-default">
                                                                        {{item.contenido}}
                                                                    </label>
                                                                </span>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <h5 class="text-center"><b>Evaluacion</b></h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <h5><b>{{evaluacion.nombreEvaluacion}}</b></h5>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <div v-if="evaluacion.tipo === 'texto'">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <input type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div v-if="evaluacion.tipo === 'numero'">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <input type="number" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="evaluacion.tipo === 'fecha'">
                                                            <div class="form-group">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <input type="number" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="evaluacion.tipo === 'seleccionUnica'">
                                                            <div class="form-group">
                                                                <label class="control-label">Seleccion unica</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <select class="form-control">
                                                                        <option value=""> -- Select One --</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div v-if="evaluacion.tipo === 'seleccionMultiple'">
                                                            <div class="form-group">
                                                                <label class="control-label">Seleccion multiple</label>
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <select class="form-control" multiple>
                                                                        <option value=""> -- Select One --</option>
                                                                        <option value=""> -- Select One --</option>
                                                                        <option value=""> -- Select One --</option>
                                                                        <option value=""> -- Select One --</option>
                                                                        <option value=""> -- Select One --</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="panel-group">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" href="#collapse1">
                                                                    Mas informacion
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapse1" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                                        <p>Documentos verificadores</p>
                                                                        <ul class="list-group">
                                                                            <li class="list-group-item">
                                                                                <label class="label label-default"
                                                                                       v-for="item in evaluacion.documentosVerificadores.split(',')">
                                                                                    {{item}}
                                                                                </label>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-group  text-center center-block">
                                    <button @click="evaluacion.tipo = 'texto'"
                                            class="btn btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <i class="fa fa-text-width" aria-hidden="true"></i>
                                        Entrada de texto
                                    </button>
                                    <button @click="evaluacion.tipo = 'numero'"
                                            class="btn btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        .<i class="fa fa-calculator" aria-hidden="true"></i> Entrada de numero
                                    </button>
                                    <button @click="evaluacion.tipo = 'fecha'"
                                            class="btn btn-default col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> Entrada de fecha
                                    </button>
                                    <button @click="evaluacion.tipo = 'seleccionUnica'"
                                            class="btn btn-default col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <i class="fa fa-check" aria-hidden="true"></i> Entrada de seleccion unica
                                    </button>
                                    <button @click="evaluacion.tipo = 'seleccionMultiple'"
                                            class="btn btn-default col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        Entrada de seleccion multiple
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar evaluacion</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</template>
<style scoped>
    .panel.father {
        min-height: 60vh;
        max-height: 100%;
    }
</style>
<script>
    export default {
        mounted() {
            this.startItem = this.itemFromParent;
            this.traerAgrupaciones();
            this.traerOpciones();
        },
        props: {
            itemFromParent: Object,
            items: Array
        },

        data(){
            return {
                startItem: '',
                agrupaciones: '',
                opcionesEvaluacion: '',
                tituloAgrupacion: {
                    idItem: '',
                    nombreAgrupacion: ''
                },

                evaluacion: {
                    nombreEvaluacion: '',
                    tipo: '',
                    documentosVerificadores: '',
                    aspectoEvaluativo: '',
                    criticidad: '',
                    opcionCumplimiento: ''

                },

            }
        },

        methods: {

            traerAgrupaciones(){
                axios.get('api/get/agrupaciones/' + this.startItem.id).then(r => {
                    this.agrupaciones = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },
            traerOpciones(){
                axios.get('api/get/opciones/cumplimiento').then(r => {
                    this.opcionesEvaluacion = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },
            agruparPregunta(){
                let self = this;
                self.tituloAgrupacion.idItem = self.startItem.id;
                let data = self.tituloAgrupacion;

                axios.post('api/save/agrupacion', data).then(r => {
                    $('#agruparPreguntaModal').modal('hide');
                    this.traerAgrupaciones();
                }).catch(e => {
                    console.log(e.status)
                })


            },
            changeItem(item){
                this.startItem = item;
                this.traerAgrupaciones();

            }
        },
        computed: {},
        components: {},
    }
</script>
