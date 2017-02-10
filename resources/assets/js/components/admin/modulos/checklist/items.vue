<template>
    <div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" v-for="item in items">
                            <h5 class="text-center">{{item.nombreItem}}</h5>
                            <button class="btn btn-info btn-sm btn-block" @click="startItem = item">
                                Cargar
                            </button>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5>{{startItem.nombreItem}}</h5>
                            <hr>
                            <h5>Preguntas</h5>
                            <p>alsdlasld</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<style scoped>
    .panel {
        min-height: 60vh;
        max-height: 100%;
    }
</style>
<script>
    export default {
        mounted() {
            this.startItem = this.itemFromParent
        },
        props: {
            itemFromParent: Object,
            items: Array
        },

        data(){
            return {
                startItem: ''
            }
        },

        methods: {},
        computed: {},
        components: {},
    }
</script>
