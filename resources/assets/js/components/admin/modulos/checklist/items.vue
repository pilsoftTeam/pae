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
                                                <div class="row">
                                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                        <h3 class="panel-title">{{items.nombreAgrupacion}}</h3>
                                                    </div>
                                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                        <button class="btn btn-primary btn-xs"
                                                                @click="mostrarModalEvaluacionParent(items.id)"
                                                                title="Agregar una evaluacion">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item"
                                                        v-for="evaluaciones in items.get_evaluaciones">
                                                        {{evaluaciones.nombreEvaluacion}}
                                                    </li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <h4>Evaluaciones</h4>
                                        <hr>


                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <ul class="list-group">
                                                    <li class="list-group-item" v-for="item in evaluaciones">
                                                        {{item.nombreEvaluacion}}
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
                <div class="btn-group btn-block">
                    <div class="">

                    </div>
                    <button type="button" data-toggle="modal" href="#agruparPreguntaModal"
                            class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agrupar evaluaciones
                    </button>
                    <button type="button" @click="mostrarModalEvaluacionNoParent"
                            class="btn btn-default col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        Agregar evaluacion
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
                                    <label class="control-label">Titulo de agrupacion</label>
                                    <div>
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
            <div class="modal-dialog modal-lg" style="width: 100%">
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
                                                                v-model="evaluacion.opcionCumplimiento"
                                                                @change="fillOpciones">
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

                                                <!--
                                                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Agregar nueva opcion de
                                                            evaluacion</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Search for...">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-secondary"
                                                                        type="button">Go!</button>
                                                              </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                -->


                                            </div>

                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <h5 class="text-center"><b>Previsualización</b></h5>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label class=" control-label">{{evaluacion.nombreEvaluacion}}</label>
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
                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                        <select class="form-control">
                                                                            <option v-for="item in opcionesEvaluacionDemo.placeholders"
                                                                                    :value="opcionesEvaluacionDemo.values">
                                                                                {{item}}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div v-if="evaluacion.tipo === 'seleccionMultiple'">
                                                                <div class="form-group">
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
                                <div class="row">
                                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"
                                         style="border-right: 1px solid lightgray">

                                        <h4 class="text-center">Entrada de datos</h4>
                                        <hr>
                                        <div class="btn-group">
                                            <button @click="evaluacion.tipo = 'texto'"
                                                    class="btn btn-default btn-block">
                                                <i class="fa fa-text-width" aria-hidden="true"></i>
                                                Entrada de texto
                                            </button>
                                            <button @click="evaluacion.tipo = 'numero'"
                                                    class="btn btn-default btn-block">
                                                .<i class="fa fa-calculator" aria-hidden="true"></i> Entrada de numero
                                            </button>
                                            <button @click="evaluacion.tipo = 'fecha'"
                                                    class="btn btn-default btn-block">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> Entrada de fecha
                                            </button>
                                            <button @click="evaluacion.tipo = 'seleccionUnica'"
                                                    class="btn btn-default btn-block">
                                                <i class="fa fa-check" aria-hidden="true"></i> Entrada de seleccion
                                                unica
                                            </button>
                                            <button @click="evaluacion.tipo = 'seleccionMultiple'"
                                                    class="btn btn-default btn-block">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                Entrada de seleccion multiple
                                            </button>


                                        </div>

                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <h4 class="text-center">Opciones</h4>
                                        <hr>
                                        <div class="form-group">
                                            <input type="checkbox" name="my-checkbox"
                                                   v-model="evaluacion.observacionEscrita">
                                            <label>¿ Tiene esta evaluacion una observacion escrita ? </label>

                                        </div>
                                        <div class="form-group">

                                            <input type="checkbox" name="my-checkbox"
                                                   v-model="evaluacion.observacionDocumental">
                                            <label>¿ Tiene esta evaluacion una observacion documental ? </label>
                                        </div>
                                        <div class="form-group">

                                            <input type="checkbox" name="my-checkbox"
                                                   v-model="evaluacion.replicacion">
                                            <label>¿ Esta pregunta se puede replicar ? </label>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="saveEvaluacion">Guardar evaluacion
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
</template>
<style scoped>
    .panel.father {
        min-height: 53vh;
        max-height: 80%;
    }

    .list-group-item {
        position: relative;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
    }
</style>
<script>
    import _ from 'lodash'

    export default {
        mounted() {
            this.startItem = this.itemFromParent;
            this.traerAgrupaciones();
            this.traerOpciones();
            this.getEvaluacionesNoParent();
        },
        props: {
            itemFromParent: Object,
            items: Array
        },

        data(){
            return {
                startItem: '',
                agrupaciones: '',
                evaluaciones: '',


                opcionesEvaluacion: '',
                selectedAgrupacion: '',
                tituloAgrupacion: {
                    idItem: '',
                    nombreAgrupacion: ''
                },

                evaluacion: {
                    idItem: '',
                    idAgrupacion: '',
                    nombreEvaluacion: '',
                    tipo: '',
                    documentosVerificadores: '',
                    aspectoEvaluativo: '',
                    criticidad: '',
                    opcionCumplimiento: '',
                    observacionEscrita: false,
                    observacionDocumental: false,
                    replicacion: false,

                },

                opcionesEvaluacionDemo: {
                    placeholders: [],
                    values: []
                }

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
                this.getEvaluacionesNoParent();
                this.traerAgrupaciones();

            },

            fillOpciones(){
                this.opcionesEvaluacionDemo.values.length = 0;
                this.opcionesEvaluacionDemo.placeholders.length = 0;
                let opt = this.evaluacion.opcionCumplimiento;
                let a = _.find(this.opcionesEvaluacion, f => {
                    return f.id === opt;
                });
                let placeholders = a.nombreCumplimiento.split('-');
                let values = a.contenido.split(',');
                _.each(placeholders, e => {
                    this.opcionesEvaluacionDemo.placeholders.push(e)
                });
                _.each(values, e => {
                    this.opcionesEvaluacionDemo.values.push(e)
                });
            },

            saveEvaluacion(){
                let data = this.evaluacion;
                data.idItem = this.startItem.id;

                axios.post('api/save/evaluacion', data).then(r => {
                    console.log(r.data);
                    $('#agregarPregunta').modal('hide');
                    this.traerAgrupaciones();
                    this.getEvaluacionesNoParent();
                }).catch(e => {
                    console.log(e)
                })
            },

            getEvaluacionesNoParent(){
                axios.get('api/get/evaluaciones/' + this.startItem.id).then(r => {
                    this.evaluaciones = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },
            mostrarModalEvaluacionParent(id){
                $('#agregarPregunta').modal('show');
                this.evaluacion.idAgrupacion = id;
            },
            mostrarModalEvaluacionNoParent(){
                $('#agregarPregunta').modal('show');
                this.evaluacion.idAgrupacion = '';
            }


        },
        computed: {},
        components: {},
    }
</script>
