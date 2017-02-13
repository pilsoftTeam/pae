<template>
    <div>
        <div class="container">
            <div v-for="element in checklist">
                <div class="row" v-for="items in element.get_items">
                    <div class="col-md-8 col-md-offset-2">
                        <h4 class="text-center">
                            <b>Item : {{items.nombreItem}}</b>
                        </h4>
                        <div class="panel panel-default">
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
                                <div v-if="items.get_agrupaciones.length > 0">
                                    <div class="panel panel-primary" v-for="agrupacion in items.get_agrupaciones">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{{agrupacion.nombreAgrupacion}}</h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group" v-for="evaluaciones in agrupacion.get_evaluaciones">
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
            <button class="btn btn-success pull-right">
                Terminar
            </button>
        </div>


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
                evaluaciones: []
            }
        },

        methods: {

            getChecklist(){
                axios.get('api/get/checklist/' + this.revision.id).then(r => {
                    this.checklist = r.data;

                    let evaluacion = {};


                    _.forEach(r.data, i => {

                        console.log(i.get_items)
                    })


                }).catch(e => {
                    console.log(e)
                })
            }
        },
        computed: {},
        components: {},
    }
</script>
