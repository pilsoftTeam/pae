<template>
    <div>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-xs-18 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-hover table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Nombre Proveedor</th>
                                    <th>Comuna</th>
                                    <th>Region</th>
                                    <th>Licitacion</th>
                                    <th>Checklist a evaluar</th>
                                    <th>Revisor asignado</th>
                                    <th>Designador</th>
                                    <th>Estado</th>
                                    <th>Ver</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="asignacion in asignaciones">
                                    <td>{{asignacion.get_bodega_info.nombreProveedor}}</td>
                                    <td>{{asignacion.get_bodega_info.comuna}}</td>
                                    <td>{{asignacion.get_bodega_info.region}}</td>
                                    <td>{{asignacion.get_bodega_info.licitacion}}</td>
                                    <td>{{asignacion.get_checklist_name.nombreChecklist}}</td>
                                    <td>{{asignacion.get_revisor.name}}</td>
                                    <td>{{asignacion.get_super.name}}</td>
                                    <td>
                                        <b>{{asignacion.estado}}</b>
                                    </td>
                                    <td v-if="asignacion.estado === 'revisado'">
                                        <button @click="getAsignacion(asignacion.id)"
                                                data-toggle="modal" href="#modalVer"
                                                class="btn btn-xs btn-info">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalVer">
            <div class="modal-dialog" style="width: 99%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Revision</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-18 col-sm-3 col-md-3 col-lg-3">
                                <div class="panel panel-default">
                                    <h4 class="text-center">
                                        <b>Items</b>
                                    </h4>
                                    <div v-for="item in items">
                                        <div class="row">
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">

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
                                                    <hr>
                                                    <hr>
                                                </div>


                                            </div>
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-18 col-sm-9 col-md-9 col-lg-9">
                                <div v-for="element in checklist">
                                    <div class="row" v-for="(items ,key) in element.get_items_with_respuestas">
                                        <div v-if="items.id == showItems">


                                            <div class="panel panel-default">
                                                <h4 class="text-center">
                                                    <b>Item : {{items.nombreItem}}</b>
                                                </h4>
                                                <div class="panel-body">
                                                    <div v-if="items.get_evaluaciones_with_respuestas.length > 0">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <div class="form-group"
                                                                     v-for="evaluaciones in items.get_evaluaciones_with_respuestas">
                                                                    <div class="row">
                                                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                                            <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"
                                                                             v-if="evaluaciones.criticidad">
                                                                            <h5 class="text-center">
                                                                                Criticidad : <b>{{evaluaciones.criticidad}}</b>
                                                                            </h5>

                                                                        </div>
                                                                    </div>
                                                                    Respuesta :
                                                                    <h5 class="well">
                                                                        <b>{{evaluaciones.get_respuestas.valor}} </b>
                                                                    </h5>
                                                                </div>
                                                                <div class="panel-group"
                                                                     v-if="evaluaciones.observacionEscrita == 1
                                                                         || evaluaciones.observacionDocumental == 1">
                                                                    <div class="panel  panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   :href="'#demo'+evaluaciones.id">Adjuntos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="'demo'+evaluaciones.id"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                        <div class="well">

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
                                                    <div v-if="items.get_agrupaciones_with_respuestas.length > 0">
                                                        <div class="panel panel-primary"
                                                             v-for="agrupacion in items.get_agrupaciones_with_respuestas">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">
                                                                    {{agrupacion.nombreAgrupacion}}</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="form-group"
                                                                     v-for="evaluaciones in agrupacion.get_evaluaciones">
                                                                    <div class="row">
                                                                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                                            <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>
                                                                        </div>
                                                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"
                                                                             v-if="evaluaciones.criticidad">
                                                                            <h5 class="text-center">
                                                                                Criticidad : <b>{{evaluaciones.criticidad}}</b>
                                                                            </h5>


                                                                        </div>
                                                                    </div>
                                                                    Respuesta a evaluacion :
                                                                    <h5 class="well">
                                                                        <b>
                                                                            {{evaluaciones.get_respuestas.valor}} </b>
                                                                    </h5>
                                                                    <hr>


                                                                    <div class="panel-group"
                                                                         v-if="evaluaciones.observacionEscrita == 1
                                                                         || evaluaciones.observacionDocumental == 1">
                                                                        <div class="panel  panel-warning">
                                                                            <div class="panel-heading">
                                                                                <h4 class="panel-title">
                                                                                    <a data-toggle="collapse"
                                                                                       :href="'#demo'+evaluaciones.id">Adjuntos</a>
                                                                                </h4>
                                                                            </div>
                                                                            <div :id="'demo'+evaluaciones.id"
                                                                                 class="panel-collapse collapse">
                                                                                <div class="panel-body">
                                                                                    <div class="row">
                                                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                                            Lorem ipsum dolor sit amet,
                                                                                            consectetur adipisicing
                                                                                            elit. Dignissimos eum
                                                                                            impedit quam soluta ullam. A
                                                                                            accusantium autem, corporis
                                                                                            distinctio enim explicabo
                                                                                            modi molestiae natus
                                                                                            necessitatibus, nobis quis
                                                                                            quo, ratione tenetur.
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Exportar a excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        mounted(){
            this.getAsignaciones();
        },
        data()
        {
            return {
                asignaciones: '',
                evaluaciones: '',
                checklist: '',
                showItems: 0,
                items: []
            }
        }
        ,

        methods: {
            getAsignaciones()
            {
                axios.get('api/get/estados/checklists').then(r => {
                    this.asignaciones = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },

            getAsignacion(id){
                this.getChecklist(id);
                this.items.length = 0;
                axios.get('api/get/asignacion/' + id).then(r => {
                    this.evaluaciones = r.data
                }).catch(e => {
                    console.log(e)
                })
            },
            getChecklist(id){
                axios.get('api/get/estados/get/checklist/' + id).then(r => {
                    this.checklist = r.data;

                    let self = this;
                    _.forEach(r.data, i => {
                        _.forEach(i.get_items_with_respuestas, a => {
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
            showItem(id){
                this.$forceUpdate();
                this.showItems = id;
            }
        }
    }
</script>
