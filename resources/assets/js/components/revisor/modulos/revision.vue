<template>
    <div>
        <div class="row">
            <h5 class="text-center">
                <b>{{revision.get_checklist_name[0].nombreChecklist}}</b>
            </h5>
            <hr>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
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
                    <div class="col-xs-18 col-sm-8 col-md-8 col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group"
                                             v-for="evaluaciones in evaluaciones">

                                            <div v-if="evaluaciones.nombreAgrupacion">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">{{evaluaciones.nombreAgrupacion}}</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>

                                                        <div v-if="evaluaciones.tipo === 'texto'">
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control">
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'numero'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control">
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'fecha'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control">
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                            <select class="form-control"
                                                                    v-for="opciones in evaluaciones.opciones">
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
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                            <select class="form-control" multiple>
                                                                <option value=""> -- Select One --</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div v-else>
                                                <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>

                                                <div v-if="evaluaciones.tipo === 'texto'">
                                                    <input type="text"
                                                           name="name"
                                                           class="form-control">
                                                </div>
                                                <div v-if="evaluaciones.tipo === 'numero'">
                                                    <input type="number"
                                                           name="name"
                                                           class="form-control">
                                                </div>
                                                <div v-if="evaluaciones.tipo === 'fecha'">
                                                    <input type="number"
                                                           name="name"
                                                           class="form-control">
                                                </div>
                                                <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                    <select class="form-control"
                                                            v-for="opciones in evaluaciones.opciones">
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
                                                </div>
                                                <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                    <select class="form-control" multiple>
                                                        <option value=""> -- Select One --</option>
                                                    </select>
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
</template>

<script>
    export default {
        mounted() {
            this.getChecklist();
        },
        props: {
            revision: Object
        },

        data(){
            return {

                items: [],
                itemData: [],
                evaluaciones: []
            }
        },

        methods: {
            getChecklist(){
                axios.get('api/get/checklist/' + this.revision.id).then(r => {
                    //this.checklist = r.data;
                    let self = this;
                    _.forEach(r.data, i => {
                        _.forEach(i.get_items, a => {
                            let item = {
                                id: a.id,
                                item: a.nombreItem
                            };



                            self.items.push(item);

                            self.evaluaciones.push(a.nombreItem);

                            _.forEach(a.get_evaluaciones, e => {
                                console.log(e);
                                let obj = {
                                    documentosVerificadores: e.documentosVerificadores,
                                    aspectoEvaluativo: e.aspectoEvaluativo,
                                    criticidad: e.criticidad,
                                    nombreAgrupacion: '',
                                    idEtapa: e.idEtapa,
                                    idItem: e.idItem,
                                    opciones: e.get_opciones,
                                    idOpcionCumplimiento: e.idOpcionCumplimiento,
                                    nombreEvaluacion: e.nombreEvaluacion,
                                    observacionDocumental: e.observacionDocumental,
                                    observacionEscrita: e.observacionEscrita,
                                    replicacion: e.replicacion,
                                    tipo: e.tipo,
                                    value: ''
                                };
                                self.evaluaciones.push(obj)
                            });


                            _.forEach(a.get_agrupaciones, g => {


                                _.forEach(g.get_evaluaciones, e => {
                                    let obj = {
                                        documentosVerificadores: e.documentosVerificadores,
                                        aspectoEvaluativo: e.aspectoEvaluativo,
                                        criticidad: e.criticidad,
                                        nombreAgrupacion: g.nombreAgrupacion,
                                        idEtapa: e.idEtapa,
                                        idItem: e.idItem,
                                        opciones: e.get_opciones,
                                        idOpcionCumplimiento: e.idOpcionCumplimiento,
                                        nombreEvaluacion: e.nombreEvaluacion,
                                        observacionDocumental: e.observacionDocumental,
                                        observacionEscrita: e.observacionEscrita,
                                        replicacion: e.replicacion,
                                        tipo: e.tipo,
                                        value: ''
                                    };
                                    self.evaluaciones.push(obj)
                                })
                            })


                        })
                    });

                }).catch(e => {
                    console.log(e)
                })
            },

            showItem(id){
                let self = this;
                let itemData = this.itemData;
                //let a = _.find(itemData, i => {
                //    return i.id === id;
                //});
//
                //_.forEach(a.get_evaluaciones, item => {
                //    let obj = {
                //        pregunta: item.nombreEvaluacion,
                //        value: ''
                //    };
                //    self.evaluaciones.push(obj)
                //});
                //_.forEach(a.get_agrupaciones, item => {
//
                //    let obj = {
                //        pregunta: item.nombreAgrupacion,
                //        value: ''
                //    };
//
//
                //    self.evaluaciones.push(obj)
                //});
//
//
                //_.forEach(a.get_evaluaciones, o => {
                //    console.log(o);
                //})


            }
        },
        computed: {},
        components: {},
    }
</script>
