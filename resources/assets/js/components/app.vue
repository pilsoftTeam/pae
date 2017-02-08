<template>
    <div class="container-fluid">
        <div class="row">

            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Checklists</a></li>
                        <li><a href="#tab2" role="tab" data-toggle="tab">Tab2</a></li>
                        <li><a href="#tab3" role="tab" data-toggle="tab">Tab3</a></li>
                    </ul>
                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <div class="active tab-pane fade in" id="tab1">
                            <checklist-index-component></checklist-index-component>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <h2>Tab2</h2>
                            <p>Lorem ipsum.</p>
                        </div>
                        <div class="tab-pane fade" id="tab3">
                            <h2>Tab3</h2>
                            <p>Lorem ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>


            <!-- TAB NAVIGATION -->


        </div>
    </div>
</template>
<style scoped>
    .tab-pane {
        margin-top: 1%;
    }

    .panel {
        min-height: 85vh;
        max-height: 100%;
    }
</style>
<script>
    import checkListIndex from './admin/checklists/index.vue'
    export default {
        mounted() {

        },

        data(){
            return {}
        },


        methods: {
            init(){
                axios.get('api/user').then(r => {
                    console.log(r.data);
                }).catch(r => {
                    console.log('Error : ' + r.status)
                })
            },
            checkMove(e){
                console.log(e.target)
            }
        },
        components: {
            'checklist-index-component': checkListIndex
        }
    }
</script>
