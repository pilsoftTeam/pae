<template>
    <div>
        <div v-if="init">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h3 class="text-center">Asignaciones</h3>
                        <div class="panel panel-default" v-for="item in asignaciones">
                            <div class="panel-heading">
                                Asignacion pendiente
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="text-center">Informacion de la bodega</h4>
                                        <hr>
                                        <p>Direccion : <b>{{item.get_bodega_info.DireccionBodega}}</b></p>
                                        <p>Comuna : <b>{{item.get_bodega_info.comuna}}</b></p>
                                        <p>Region : <b>{{item.get_bodega_info.region}}</b></p>

                                    </div>
                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="text-center">Informacion Sobre checklist</h4>
                                        <hr>

                                        <p>Checklist : <b>{{item.get_checklist_name.nombreChecklist}}</b></p>
                                        <p>Asignado el :<b>{{item.get_checklist_name.created_at}}</b></p>
                                    </div>
                                </div>
                                <hr>
                                <button @click="startRevision(item)" class="btn btn-block btn-success">
                                    Iniciar <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <revision :revision="selectedAsignacion"></revision>
        </div>

    </div>
</template>

<script>
    import revision from './modulos/revisionex.vue'
    export default {
        mounted() {
            this.getAsignaciones();
        },

        data(){
            return {
                init: true,
                asignaciones: '',
                selectedAsignacion: ''
            }
        },

        methods: {
            getAsignaciones(){
                axios.get('api/get/asignaciones').then(r => {

                    console.log(r.data);

                    this.asignaciones = r.data
                }).catch(e => {
                    console.log(e)
                })
            },

            startRevision(item){
                this.selectedAsignacion = item;
                this.init = false;
            },


        },
        computed: {},
        components: {
            'revision': revision
        },
    }
</script>
