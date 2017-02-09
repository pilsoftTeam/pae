<template>
    <div>
        <div class="container-fluid">
            <div class="col-xs-18 col-sm-12 col-md-12 col-lg-12">
                <div class="row">
                    <item></item>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
    . panel-default {
        height: inherit;
        max-height: 40vh;
    }

    .footer-btn {
        position: fixed;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
    }
</style>
<script>
    import item from './item.vue'
    export default {
        data () {
            return {
                msg: 'Hello world!'
            }
        },
        props: {
            checklistData: Object
        },
        components: {
            item
        }
    }
</script>
