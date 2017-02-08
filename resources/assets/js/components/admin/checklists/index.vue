<template>
    <div>
        <div v-if="!changeState">
            <div class="row">
                <div class="col-xs-18 col-sm-4 col-md-4 col-lg-4" id="border">
                    <h4>Checklists creados</h4>
                    <div v-for="item in checkLists">
                        <div class="list-group">
                            <a class="list-group-item" @click="showChecklistInitPage(item)">
                                <h5 class="list-group-item-heading">Nombre : <b>{{item.nombreChecklist}}</b></h5>
                                <small class="list-group-item-text">Fecha creacion : <b>{{item.created_at}}</b></small>
                            </a>
                        </div>
                    </div>

                    <hr>


                    <div class="text-center" v-if="showChecklistMain">
                        <h4 class="text-center">Crear una nuevo checklist</h4>

                        <button class="btn btn-success" @click="makeCheckList">
                            <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="col-xs-18 col-sm-8 col-md-8 col-lg-8">

                    <div v-if="!showChecklistMain">
                        <h3 class="text-center">Crear una nuevo checklist</h3>
                        <br>
                        <br>
                        <button class="btn btn-success btn-lg center-block text-center" @click="makeCheckList">
                            <i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div v-else>
                        <h3 class="text-center">{{checkListMain.nombreChecklist}}</h3>
                        <hr>

                        <p class="text-justify">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus ducimus
                            eaque fugiat inventore
                            laudantium quaerat reiciendis totam. Ab dolores incidunt laudantium optio pariatur!
                            Aperiam
                            dolores officiis, sequi sint su Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                            Delectus ducimus
                            eaque fugiat inventore nt tempore.at reiciendis totam. Ab dolores incidunt laudantium
                            optio
                            pariatur! Aperiam
                            dolores officiis, sequi sint sunt tempore.at reiciendis totam. Ab dolores incidunt
                            laudantium
                            optio pariatur! Aperiam
                            dolores officiis, sequi sint sunt tempore.
                        </p>

                        <button class="btn btn-lg btn-success pull-right" @click="changeState = true">
                            <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div v-else>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium atque culpa cum enim
                        officiis quam sunt ut vel? Accusamus, cumque cupiditate error esse ipsa natus neque sapiente
                        sequi sint ut?
                    </div>
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
                                <button type="button" class="btn btn-primary" @click="saveChecklist">Guardar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
        <div v-else>
            <creation-component :checklistData="checkListMain"></creation-component>
        </div>


    </div>


</template>
<style scoped>
    #border {
        border-right: 1px solid lightgray;
        height: 450px;
        max-height: 80%;
    }
</style>
<script>
    import creation from './mod/creation.vue'
    export default {
        mounted(){
            this.init();
        },
        data () {
            return {
                checkLists: '',
                nombreChecklist: 'Escriba aca',
                showChecklistMain: false,
                changeState: false,
                checkListMain: {
                    id: '',
                    nombreChecklist: ''
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

            makeCheckList(){
                $('#agregarChecklist').modal('show');
            },
            saveChecklist(){
                let data = {
                    nombreChecklist: this.nombreChecklist
                };

                axios.post('api/crear/checkList', data)
                    .then(r => {
                        $('#agregarChecklist').modal('hide');
                        this.init()
                    })
                    .catch(error => {
                        console.log(error);
                    });

            },
            showChecklistInitPage(checkList){
                this.showChecklistMain = true;
                this.checkListMain.id = checkList.id
                this.checkListMain.nombreChecklist = checkList.nombreChecklist
            }
        },
        components: {
            'creation-component': creation
        }
    }
</script>
