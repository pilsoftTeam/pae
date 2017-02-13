<template>
    <div>
        <div class="container">
            <div class="col-xs-18 col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-default">
                    <h4 class="text-center">
                        <b>Items</b>
                    </h4>
                    <div class="panel-body">
                        <div class="list-group">
                            <a class="list-group-item" v-for="item in items">
                                <div class="row">
                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                        <h5 class="list-group-item-heading">{{item.item}}</h5>
                                    </div>
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <button class="btn btn-sm btn-success pull-right"
                                                @click="showItem(item.id)">
                                            <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                <br>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div v-for="element in checklist">
                    <div class="row" v-for="(items ,key) in element.get_items">
                        <div v-if="key == showItems">
                            <div>

                                <div class="panel panel-default">
                                    <h4 class="text-center">
                                        <b>Item : {{items.nombreItem}}</b>
                                    </h4>
                                    <div class="panel-body">
                                        <div v-if="items.get_evaluaciones.length > 0">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group"
                                                         v-for="evaluaciones in items.get_evaluaciones">
                                                        <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>

                                                        <div v-if="evaluaciones.tipo === 'texto'">
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'numero'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'fecha'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    v-for="opciones in evaluaciones.get_opciones">
                                                                <option v-for="opt in opciones.contenido.split(',')"
                                                                        :value="opt">
                                                                    {{opt === 'C' ? 'Cumple': ''}}
                                                                    {{opt === 'NC' ? 'No Cumple': ''}}
                                                                    {{opt === 'NA' ? 'No Aplica': ''}}
                                                                    {{opt === 'NV' ? 'No Verificable': ''}}
                                                                    {{opt === 'A' ? 'Aprueba': ''}}
                                                                    {{opt === 'Na' ? 'No Aprueba': ''}}
                                                                </option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                            <select class="form-control" v-model="evaluaciones.value"
                                                                    multiple>
                                                                <option value=""> -- Select One --</option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="items.get_agrupaciones.length > 0">
                                            <div class="panel panel-primary"
                                                 v-for="agrupacion in items.get_agrupaciones">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{agrupacion.nombreAgrupacion}}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group"
                                                         v-for="evaluaciones in agrupacion.get_evaluaciones">
                                                        <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>
                                                        <div v-if="evaluaciones.tipo === 'texto'">
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <!--|| evaluaciones.observacionEscrita == 1  -->
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'numero'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>

                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'fecha'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/\s/g,''))">
                                                                    Collapsible Group 1</a>
                                                                <div :id="evaluaciones.nombreEvaluacion.replace(/\s/g,'')"
                                                                     class="panel-collapse collapse in">
                                                                    <div class="panel-body">Lorem ipsum dolor sit amet,
                                                                        consectetur adipisicing elit,
                                                                        sed do eiusmod tempor incididunt ut labore et
                                                                        dolore magna aliqua. Ut enim ad
                                                                        minim veniam, quis nostrud exercitation ullamco
                                                                        laboris nisi ut aliquip ex ea
                                                                        commodo consequat.
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    v-for="opciones in evaluaciones.get_opciones">
                                                                <option v-for="opt in opciones.contenido.split(',')"
                                                                        :value="opt">
                                                                    {{opt === 'C' ? 'Cumple': ''}}
                                                                    {{opt === 'NC' ? 'No Cumple': ''}}
                                                                    {{opt === 'NA' ? 'No Aplica': ''}}
                                                                    {{opt === 'NV' ? 'No Verificable': ''}}
                                                                    {{opt === 'A' ? 'Aprueba': ''}}
                                                                    {{opt === 'Na' ? 'No Aprueba': ''}}
                                                                </option>
                                                            </select>
                                                            <br>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Collapsible Group 1</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">

                                                                                <div class="row">
                                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                                        <h5 class="text-center">Aspectos
                                                                                            evaluativos</h5>
                                                                                        <hr>
                                                                                        {{evaluaciones.aspectoEvaluativo}}
                                                                                    </div>
                                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                                        <h5 class="text-center">
                                                                                            Documentos verificadores
                                                                                        </h5>
                                                                                        <hr>
                                                                                        {{evaluaciones.documentosVerificadores}}
                                                                                    </div>
                                                                                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                                                        <h5 class="text-center">
                                                                                            Criticidad</h5>
                                                                                        <hr>
                                                                                        {{evaluaciones.criticidad}}
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <hr>


                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    multiple>
                                                                <option value=""> -- Select One --</option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">


                                                                <div class="panel-group" id="accordion">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Collapsible Group 1</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse in">
                                                                            <div class="panel-body">Lorem ipsum dolor
                                                                                sit amet,
                                                                                consectetur adipisicing elit,
                                                                                sed do eiusmod tempor incididunt ut
                                                                                labore et
                                                                                dolore magna aliqua. Ut enim ad
                                                                                minim veniam, quis nostrud exercitation
                                                                                ullamco
                                                                                laboris nisi ut aliquip ex ea
                                                                                commodo consequat.
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="endChecklistModal">
            <div class="modal-dialog">
                <div class="modal-content modal-sm">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">El checklist ha sido terminado. </h4>
                    </div>
                    <div class="modal-body">
                        El checklist ha sido terminado
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
    import _ from 'lodash'
    export default {
        mounted() {
            this.getChecklist()
        },
        props: {
            revision: Object
        },

        data(){
            return {
                checklist: '',
                opcionesEvaluacion: '',
                items: [],
                evaluaciones: [],
                showItems: 0
            }
        },

        methods: {

            getChecklist(){
                axios.get('api/get/checklist/' + this.revision.id).then(r => {
                    this.checklist = r.data;

                    let self = this;
                    _.forEach(r.data, i => {
                        _.forEach(i.get_items, a => {
                            let item = {
                                id: a.id,
                                item: a.nombreItem
                            };
                            self.items.push(item)
                        });
                    })
                }).catch(e => {
                    console.log(e)
                })
            },

            saveChecklist(){
                $('#endChecklistModal').modal('show');
            },

            showItem(id){
                this.showItems = id - 1;
            }
        },
        computed: {},
        components: {},
    }
</script>
