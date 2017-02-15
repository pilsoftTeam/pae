<template>
    <div>
        <div class="container">
            <br>
            <div class="row">
                <div class="col-xs-18 col-sm-12 col-md-12 col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-hover table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Nombre Proveedor</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="bodega in bodegas">
                                    <td>{{bodega}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

        mounted(){
            this.getBodegas();
        },
        data()
        {
            return {
                bodegas: ''
            }
        }
        ,

        methods: {
            getBodegas()
            {
                axios.get('api/bodegas/all').then(r => {
                    this.bodegas = r.data;
                }).catch(e => {
                    console.log(e)
                })
            }
        }
    }
</script>
