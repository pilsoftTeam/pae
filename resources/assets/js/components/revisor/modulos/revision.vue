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
                                    <a href="#" class="list-group-item" v-for="item in items">
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
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti dicta dignissimos
                                earum
                                eos minima minus officia quidem vel! Accusantium deserunt ducimus facilis impedit magni
                                numquam recusandae suscipit ullam! Incidunt, perspiciatis!
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

                items: []
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
                        })
                    })
                }).catch(e => {
                    console.log(e)
                })
            },

            showItem(id){
                console.log(id);
            }
        },
        computed: {},
        components: {},
    }
</script>
