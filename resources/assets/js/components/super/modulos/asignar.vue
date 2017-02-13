<template>
    <div>
        <br/>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-default" style="height: 70vh; max-height: 100vh">
                    <div class="panel-body">


                        <div class="form-group">
                            <label class="control-label">Checklists</label>
                            <div>
                                <select class="form-control" v-model="selectedCheckList" @change="showInfoChecklist">
                                    <option value=""> -- Seleccione uno --</option>
                                    <option v-for="item in checklists" :value="item.id">
                                        {{item.nombreChecklist}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Revisores</label>
                            <div>
                                <select class="form-control" v-model="selectedRevisor" @change="showInfoRevisor">
                                    <option value=""> -- Seleccione uno --</option>
                                    <option v-for="revisor in revisores" :value="revisor.idUsuario">
                                <span v-for="usuario in revisor.get_users">
                                    {{usuario.name}}
                                </span>
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Proveedor</label>
                            <div>
                                <select class="form-control" v-model="selectedBodega" @change="showInfoBodega">
                                    <option value=""> -- Seleccione uno --</option>
                                    <option v-for="bodega in bodegas"
                                            :value="bodega.id">
                                        {{bodega.nombreProveedor}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <button @click="designarChecklist"
                                    class="btn btn-block btn-lg btn-success">Designar
                            </button>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>

                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="panel panel-info" style="height: 70vh; max-height: 100vh">
                    <div class="panel-heading">
                        <h3 class="panel-title">Asignar un revisor</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <h4 class="text-center">Revisor designado</h4>

                                <ul class="list-group">

                                    <li class="list-group-item">
                                        Nombre : <span v-for="item in mostrarRevisor.get_users">
                                                    <b>{{item.name}}</b>
                                                </span>
                                    </li>
                                    <li class="list-group-item">
                                        Email : <span v-for="item in mostrarRevisor.get_users">
                                                  <b>{{item.name}}</b>
                                                </span>
                                    </li>


                                    <li class="list-group-item">
                                        Tareas Asignadas : <b>2</b>
                                    </li>
                                </ul>


                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <h4 class="text-center">Checklist elegido</h4>

                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Nombre : <b>{{mostrarChecklist.nombreChecklist}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        Creado el : <b>{{mostrarChecklist.created_at}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        N° evaluaciones : <b>XX</b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h4 class="text-center">Bodega proveedor</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        Licitacion : <b>{{ selectedProveedor.licitacion}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        Region : <b>{{ selectedProveedor.region}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        Comuna : <b>{{ selectedProveedor.comuna}}</b>
                                    </li>
                                    <li class="list-group-item">
                                        Direccion bodega : <b>{{selectedProveedor.DireccionBodega}}</b>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import _ from 'lodash'
    export default {
        mounted() {
            this.getBodegas();
            this.getRevisores();
            this.getChecklists();
        },

        data(){
            return {
                bodegas: '',
                revisores: '',
                checklists: '',


                selectedBodega: '',
                selectedProveedor: '',

                selectedRevisor: '',
                mostrarRevisor: '',

                selectedCheckList: '',
                mostrarChecklist: ''
            }
        },

        methods: {

            getBodegas(){
                axios.get('api/bodegas/all').then(r => {
                    this.bodegas = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },

            getRevisores(){
                axios.get('api/get/users/revisores').then(r => {
                    this.revisores = r.data;
                }).catch(e => {
                    console.log(e)
                })
            },

            getChecklists(){
                axios.get('api/get/checkLists').then(r => {
                    this.checklists = r.data;
                }).catch(e => {
                    console.log(e)
                });
            },
            showInfoBodega(){
                let self = this;
                self.selectedProveedor = _.find(self.bodegas, f => {
                    return f.id === self.selectedBodega
                });

            },
            showInfoRevisor(){
                let self = this;

                self.mostrarRevisor = _.find(self.revisores, f => {
                    return f.id === self.selectedRevisor
                });
            },
            showInfoChecklist(){
                let self = this;
                self.mostrarChecklist = _.find(self.checklists, f => {
                    return f.id === self.selectedCheckList
                });
            },

            designarChecklist(){

                let obj = {
                    idChecklist: this.selectedCheckList,
                    idRevisor: this.selectedRevisor,
                    idBodega: this.selectedBodega,
                };


                axios.post('api/designar/checklist', obj).then(r => {
                    console.log(r.data)
                }).catch(e => {
                    console.log(e)
                })

            }
        },
        computed: {},
        components: {},
    }
</script>
