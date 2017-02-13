<template>
    <div>
        <!-- TAB NAVIGATION -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tab1" role="tab" data-toggle="tab">
                Asignar
            </a></li>
            <li>
                <a href="#tab2" role="tab" data-toggle="tab">Tab2</a>
            </li>
            <li>
                <a href="#tab3" role="tab" data-toggle="tab">Tab3</a>
            </li>
        </ul>
        <!-- TAB CONTENT -->
        <div class="tab-content">
            <div class="active tab-pane fade in" id="tab1">
                <asignar></asignar>
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
</template>

<script>
    import asignar from './modulos/asignar.vue'
    export default {
        mounted() {},

        data(){
            return {}
        },

        methods: {},
        computed: {},
        components: {
            'asignar': asignar
        },
    }
</script>
