<template>
    <div>

        <div class="row" style="border-left: 1px solid lightgrey; height: 400px; max-height: 100%">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4>Items</h4>
                <hr>
                <div class="form-group">
                    <label for="nombreItem">Nombre item : </label>
                    <input type="text" id="nombreItem" v-model="items.name" class="form-control" title=""
                           required="required">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="etapas">Añadir etapas</label>
                        <div class="input-group">
                            <input type="text" id="etapas" v-model="items.stage" class="form-control"
                                   placeholder="Agregue etapas a este item">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" @click="saveAndClone">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <h4 class="text-center">Etapas</h4>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="list-group" v-for="(etapas, index) in items.stages">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                        <p>Etapa : {{etapas.stage}}<br>
                                        <p>Item : {{etapas.name}}</p>
                                    </div>
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <button class="btn pull-right btn-danger"
                                                title="Eliminar esta etapa"
                                                @click="deleteStage(etapas.id)">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <button class="btn pull-right" @click="sendToPreguntas(etapas)"
                                                title="Enviar a preguntas">
                                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border-left: 1px solid lightgrey; height: 400px">
                <h4>Preguntas</h4>
                <hr>
                <div class="row" v-if="showPreguntas">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h4>Etapa : {{preguntas.stageName}}<br>
                            <span>
                               <small>Item :{{preguntas.item}}</small>
                            </span>
                        </h4>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="nombrePregunta" class="control-label">Nombre de la pregunta</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="text"
                                               v-model="preguntas.pregunta"
                                               class="form-control"
                                               id="nombrePregunta"
                                               placeholder="Escriba aca">
                                    </div>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="border-left: 1px solid lightgrey; height: 400px">
                <h4>Prev</h4>
                <hr>


            </div>
        </div>


    </div>
</template>
<script>
    import _ from 'lodash'
    export default {
        data () {
            return {
                msg: 'Hello world!',
                items: {
                    id: 0,
                    name: '',
                    stage: '',
                    stages: []
                },
                preguntas: {
                    stageId: '',
                    item: '',
                    stageName: '',
                    pregunta: '',
                    type: '',
                    objetivo: '',
                    aspecto: '',
                    documentos: '',
                    criticidad: '',
                    cumplimiento: ''

                },
                showPreguntas: false,
            }
        },
        methods: {
            saveAndClone(){
                let obj = {
                    id: this.items.id,
                    name: this.items.name,
                    stage: this.items.stage
                };
                this.items.stages.push(obj);
                this.items.id += 1;
                this.items.stage = '';

            },
            deleteStage(id){
                _.remove(this.items.stages, {id: id});
                this.$forceUpdate();
            },
            sendToPreguntas(etapa){
                let preguntas = this.preguntas;

                preguntas.stageId = etapa.id;
                preguntas.item = etapa.name;
                preguntas.stageName = etapa.stage;
                this.showPreguntas = true
            }
        }
    }
</script>
