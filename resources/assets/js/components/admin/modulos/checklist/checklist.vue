<template>
    <div>
        <div class="row" v-if="!showInit" @click="showInit = true">
            <button class="btn btn-xs btn-block btn-success">
                <i class="fa fa-arrow-circle-left"></i>
            </button>
            <hr>
        </div>

        <div class="row" v-if="showInit">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row" v-for="item in checkLists">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p style="word-wrap: break-word;">
                                    CheckList : {{item.nombreChecklist}}
                                </p>
                                <button class="btn btn-sm btn-success pull-right" @click="selectedChecklist(item)">
                                    <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                            <hr>
                        </div>

                    </div>
                </div>
                <div class="btn-group footer">
                    <button type="button" class="btn btn-default" @click="openCreationModal">Crear un nuevo checklist
                    </button>
                </div>
            </div>
            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-body" v-if="selectedChecklistConditional">

                        <h5>Checklist : {{clickedChecklist.nombreChecklist}}</h5>
                        <hr>
                        <h4>Items : </h4>
                        <br>
                        <!--
                        <div class="tree">
                            <ul v-for="item in items">
                                <li>
                                    <span>{{item.nombreItem}}</span>
                                    <button class="pull-right btn btn-info btn-sm alignedButton">
                                        Crear pregunta
                                    </button>
                                    <button class="pull-right btn btn-primary btn-sm alignedButton"
                                            @click="showSubEtapaModal(item)">Crear etapa
                                    </button>
                                </li>
                                <li>
                                    <ul v-for="etapas in item.get_etapas">
                                        <li>
                                            <span>{{etapas.nombreEtapa}}</span>
                                        </li>
                                        <li>
                                            <ul>
                                                <li>
                                                    <span>{{etapas.nombreEtapa}}</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        -->


                        <div class="row" v-for="item in items">
                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                {{item.nombreItem}}
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <button
                                        class="btn btn-success text-center center-block pull-right"
                                        @click="change(item)">
                                    Editar este item
                                </button>
                            </div>
                            <hr>
                            <hr>
                        </div>


                        <div class="btn-group footer pull-left">
                            <button type="button" class="btn btn-default" @click="showCrearItem">Crear Item</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div v-if="!showInit">
            <items-component :itemFromParent="selectedItem" :items="items"></items-component>
        </div>

        <div class="modal fade" id="agregarChecklist">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar Checklist</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                                <div class="form-group">
                                    <label for="agregarChecklist">Agrega un checklist</label>
                                    <input type="text"
                                           v-model="nombreChecklist"
                                           class="form-control"
                                           name="agregarChecklist"
                                           placeholder="Escriba aca">
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="saveCheckList">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="crearItems">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Crear Item</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <div class="form-group">
                                    <label class="control-label">Nombre del item</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="text" class="form-control" v-model="item.nombreItem"
                                               placeholder="Escriba aca">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="saveItem">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="crearEtapas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Crear etapa para : {{clickedChecklist.nombreChecklist}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                <div class="form-group">
                                    <label class="control-label">Nombre de etapa</label>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="text" class="form-control" v-model="etapa.nombreEtapa"
                                               placeholder="Escriba aca">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="crearPreguntas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Modal body ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="subCrearEtapas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Agregar una etapa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label class="control-label">Nombre de la etapa</label>
                                    <div class="col-sm-12">
                                        <input type="text" v-model="subEtapa.nombreEtapa" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click="saveSubEtapa">Guardar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


    </div>
</template>
<style>
    .footer {
        bottom: 5%;
        position: fixed;
    }

    .alignedButton {
        margin-top: -.5%;
    }

    .roundedBorder {
        border-radius: 10px 0px 10px 10px;
        -moz-border-radius: 10px 0px 10px 10px;
        -webkit-border-radius: 10px 0px 10px 10px;
        border: 1px solid lightgrey;
        margin: 1%;
        padding-bottom: 1%;
    }

</style>
<script>
    import items from './items.vue'
    export default {
        mounted(){

            this.init();

        },
        data () {
            return {
                checkLists: '',
                nombreChecklist: '',
                clickedChecklist: '',
                selectedChecklistConditional: false,
                showInit: true,
                etapas: '',
                items: '',
                selectedItem: '',
                item: {
                    idChecklist: '',
                    nombreItem: '',
                },
                etapa: {
                    idChecklist: '',
                    nombreEtapa: ''
                },
                subEtapa: {
                    idItem: '',
                    nombreEtapa: ''
                }
            }
        },
        methods: {
            init(){
                axios.get('api/get/checkLists').then(r => {
                    this.checkLists = r.data;
                }).catch(err => {
                    console.log(err)
                })
            },

            getItems(){
                let idChecklist = this.clickedChecklist.id;
                axios.get('api/get/items/' + idChecklist).then(r => {
                    this.items = r.data;
                }).catch(e => {
                    console.log(e);
                })
            },
            openCreationModal(){
                $('#agregarChecklist').modal('show');
            },
            saveCheckList(){
                let object = {
                    nombreChecklist: this.nombreChecklist
                };
                axios.post('api/crear/checkList', object).then(r => {
                    this.init();
                    $('#agregarChecklist').modal('hide');
                }).catch(e => {
                    $('#agregarChecklist').modal('hide');
                })
            },
            selectedChecklist(item){
                this.clickedChecklist = item
                this.selectedChecklistConditional = true
                this.getItems();
            },


            showCrearItem(){
                $('#crearItems').modal('show');
            },
            showCrearEtapas(){
                $('#crearEtapas').modal('show');
            },
            showCrearPreguntas(){
                $('#crearPreguntas').modal('show');
            },

            saveItem(){
                this.item.idChecklist = this.clickedChecklist.id;
                let self = this;
                let item = self.item;


                axios.post('api/agregar/item', item).then(r => {
                    self.getItems();
                    $('#crearItems').modal('hide');
                }).catch(e => {
                    $('#crearItems').modal('hide');
                })

            },

            showSubEtapaModal(item){
                $('#subCrearEtapas').modal('show');
                this.subEtapa.idItem = item.id
            },

            saveSubEtapa(){
                let self = this;
                let data = self.subEtapa;

                axios.post('api/agregar/etapa', data).then(r => {
                    self.getItems();
                    $('#subCrearEtapas').modal('hide');
                }).catch(e => {
                    $('#subCrearEtapas').modal('hide');
                })

            },

            change(item){
                this.selectedItem = item;
                this.showInit = false;
            }
        },

        components: {
            'items-component': items
        }
    }
</script>
