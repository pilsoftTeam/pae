<template>
    <div>
        <div class="container">
            <div class="col-xs-18 col-sm-3 col-md-3 col-lg-3">
                <div class="panel panel-default">
                    <h4 class="text-center">
                        <b>Items</b>
                    </h4>
                    <div class="panel-body">
                        <div class="list-group">
                            <a class="list-group-item" v-for="item in items">
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
            <div class="col-xs-18 col-sm-9 col-md-9 col-lg-9">
                <div v-for="element in checklist">
                    <div class="row" v-for="(items ,key) in element.get_items">
                        <div v-if="items.id == showItems">
                            <div>

                                <div class="panel panel-default">
                                    <h4 class="text-center">
                                        <b>Item : {{items.nombreItem}}</b>
                                    </h4>
                                    <div class="panel-body">
                                        <div v-if="items.get_evaluaciones.length > 0">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="form-group"
                                                         v-for="evaluaciones in items.get_evaluaciones">
                                                        <div class="row">
                                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                                <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"
                                                                 v-if="evaluaciones.criticidad">
                                                                <h5 class="text-center">
                                                                    Criticidad : <b>{{evaluaciones.criticidad}}</b>
                                                                </h5>

                                                            </div>
                                                        </div>

                                                        <div v-if="evaluaciones.tipo === 'texto'">
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'numero'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'fecha'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    v-for="opciones in evaluaciones.get_opciones">
                                                                <option v-for="opt in opciones.contenido.split(',')"
                                                                        :value="opt">
                                                                    {{opt === 'C' ? 'Cumple': ''}}
                                                                    {{opt === 'NC' ? 'No Cumple': ''}}
                                                                    {{opt === 'NA' ? 'No Aplica': ''}}
                                                                    {{opt === 'NV' ? 'No Verificable': ''}}
                                                                    {{opt === 'A' ? 'Aprueba': ''}}
                                                                    {{opt === 'Na' ? 'No Aprueba': ''}}
                                                                </option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                            <select class="form-control" v-model="evaluaciones.value"
                                                                    multiple>
                                                                <option value=""> -- Select One --</option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="items.get_agrupaciones.length > 0">
                                            <div class="panel panel-primary"
                                                 v-for="agrupacion in items.get_agrupaciones">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">{{agrupacion.nombreAgrupacion}}</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group"
                                                         v-for="evaluaciones in agrupacion.get_evaluaciones">
                                                        <div class="row">
                                                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                                                <label class="control-label">{{evaluaciones.nombreEvaluacion}}</label>
                                                            </div>
                                                            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"
                                                                 v-if="evaluaciones.criticidad">
                                                                <h5 class="text-center">
                                                                    Criticidad : <b>{{evaluaciones.criticidad}}</b>
                                                                </h5>

                                                            </div>
                                                        </div>

                                                        <div v-if="evaluaciones.tipo === 'texto'">
                                                            <input type="text"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <!--|| evaluaciones.observacionEscrita == 1  -->
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        s
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'numero'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>

                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'fecha'">
                                                            <input type="number"
                                                                   name="name"
                                                                   class="form-control"
                                                                   v-model="evaluaciones.value">
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionUnica'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    v-for="opciones in evaluaciones.get_opciones">
                                                                <option v-for="opt in opciones.contenido.split(',')"
                                                                        :value="opt">
                                                                    {{opt === 'C' ? 'Cumple': ''}}
                                                                    {{opt === 'NC' ? 'No Cumple': ''}}
                                                                    {{opt === 'NA' ? 'No Aplica': ''}}
                                                                    {{opt === 'NV' ? 'No Verificable': ''}}
                                                                    {{opt === 'A' ? 'Aprueba': ''}}
                                                                    {{opt === 'Na' ? 'No Aprueba': ''}}
                                                                </option>
                                                            </select>
                                                            <br>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <hr>


                                                        </div>
                                                        <div v-if="evaluaciones.tipo === 'seleccionMultiple'">
                                                            <select class="form-control"
                                                                    v-model="evaluaciones.value"
                                                                    multiple>
                                                                <option value=""> -- Select One --</option>
                                                            </select>
                                                            <hr>
                                                            <div class="row"
                                                                 v-if="evaluaciones.observacionDocumental
                                                                 || evaluaciones.observacionEscrita == 1">
                                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                                    <div class="panel panel-warning">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse"
                                                                                   @click="options.params.idPregunta = evaluaciones.id"
                                                                                   data-parent="#accordion"
                                                                                   :href="'#'+(evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_'))"
                                                                                >Subir adjuntos / Aspectos evaluativos ,
                                                                                    Documentos requeridos</a>
                                                                            </h4>
                                                                        </div>
                                                                        <div :id="evaluaciones.nombreEvaluacion.replace(/[^a-zA-Z0-9]/g,'_')"
                                                                             class="panel-collapse collapse">
                                                                            <div class="panel-body">


                                                                                <div class="row">
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Observacion
                                                                                            escrita</label>
                                                                                            <textarea
                                                                                                    class="form-control"
                                                                                                    v-model="evaluaciones.observacionEscritaValue"
                                                                                            ></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-xs-18 col-sm-6 col-md-6 col-lg-6 uploadSize">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Subir
                                                                                            archivos</label>
                                                                                            <file-upload
                                                                                                    :id="'myVueDropzone'+evaluaciones.id"
                                                                                                    :thumbnailWidth="300"
                                                                                                    :thumbnailHeight="100"
                                                                                                    :maxFileSizeInMB="10"
                                                                                                    :maxNumberOfFiles="99"
                                                                                                    url="//localhost/pae/public/api/get/files"
                                                                                                    :dropzone-options="options"
                                                                                                    :use-custom-dropzone-options="true"
                                                                                                    v-on:vdropzone-success="showSuccess"
                                                                                                    :useFontAwesome="true">
                                                                                            </file-upload>
                                                                                        </div>

                                                                                    </div>

                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Aspectos evaluativos</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center">
                                                                                            {{evaluaciones.aspectoEvaluativo}}
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                                        <h5 class="text-center">
                                                                                            <b>Documentos
                                                                                                verificadores</b>
                                                                                        </h5>
                                                                                        <hr>
                                                                                        <p class="text-center"
                                                                                           v-if="evaluaciones.documentosVerificadores">
                                                                                            <span v-for="item in evaluaciones.documentosVerificadores.split(',')">
                                                                                                <li class="list-group-item">{{item}}</li>
                                                                                            </span>
                                                                                        </p>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <button type="button" class="btn btn-success btn-block btn-lg" @click="end">
                Terminar evaluacion
            </button>
            <br>
        </div>

        <div class="modal fade" id="endChecklistModal">
            <div class="modal-dialog modal-xs">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">El checklist ha sido terminado. </h4>
                    </div>
                    <div class="modal-body">
                        El checklist ha sido terminado
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Aceptar</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>
<style>

</style>
<script>
    import _ from 'lodash'
    import Dropzone from 'vue2-dropzone/src/index.vue'
    export default {
        mounted() {
            this.getChecklist();
        },
        props: {
            revision: Object
        },

        data(){
            return {
                checklist: '',
                opcionesEvaluacion: '',
                items: [],
                evaluaciones: [],
                showItems: 0,
                options: {
                    headers: {'X-CSRF-TOKEN': Laravel.csrfToken},
                    dictDefaultMessage: 'Haga click o arrastre aqui para subir archivos.',
                    dictFallbackMessage: 'Este navagador no acepta drag & drop.',
                    dictFileTooBig: 'El archivo subido es demasiado grande. Por favor suba uno mas pequeño.',
                    dictInvalidFileType: 'Este archivo no es permitido.',
                    dictResponseError: 'El servidor invalido la operacion codigo status {{statusCode}} .',
                    dictCancelUpload: 'Cancelar subida .',
                    dictCancelUploadConfirmation: '¿ Esta seguro que desea cancelar la subida de este archivo ?',
                    dictRemoveFile: '¿ Eliminar archivo ?',
                    thumbnailWidth: 290,
                    thumbnailHeight: 140,
                    uploadMultiple: true,
                    addRemoveLinks: true,
                    paramName: 'documentos',
                    previewTemplate: '<div class="dz-preview dz-file-preview">  <div class="dz-image" style="width:' + this.thumbnailWidth + 'px;height:' + this.thumbnailHeight + 'px"><img data-dz-thumbnail /></div>  <div class="dz-details">    <div class="dz-size"><span data-dz-size></span></div>    <div class="dz-filename"><span data-dz-name></span></div>  </div>  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>  <div class="dz-error-message"><span data-dz-errormessage></span></div>  <div class="dz-success-mark"><i class="fa fa-check fa-3x"></i> </div>  <div class="dz-error-mark"><i class="fa fa-close fa-3x"></i></div></div>',
                    params: {
                        idPregunta: '',
                        idChecklist: this.revision.idChecklist,
                        idBodega: this.revision.idBodega

                    }


                },
                showEnd: false,

            }
        },


        methods: {

            getChecklist(){
                axios.get('api/get/checklist/' + this.revision.id).then(r => {
                    this.checklist = r.data;

                    let self = this;
                    _.forEach(r.data, i => {
                        _.forEach(i.get_items, a => {
                            let item = {
                                id: a.id,
                                item: a.nombreItem
                            };
                            self.items.push(item)
                        });
                    })
                }).catch(e => {
                    console.log(e)
                })
            },


            saveChecklist(){
                $('#endChecklistModal').modal('show');
            },


            showItem(id){
                this.showItems = id;
            },
            showSuccess(){
            },


            end(){
                let self = this;
                let evaluacion = self.checklist;
                let item = [];

                _.forEach(evaluacion, e => {


                    let obj = {
                        idEvaluacion: '',
                        idItem: '',
                        idAgrupacion: '',
                        valorInput: '',
                        valorObservacion: '',
                    };


                    _.forEach(e.get_items, i => {

                        if (i.get_agrupaciones.length > 0) {

                            _.forEach(i.get_agrupaciones, a => {

                                _.forEach(a.get_evaluaciones, s => {
                                    console.log(s)
                                });

                            });


                        }


                    });


                    console.log()
                });


                //axios.post('api/end/checklist').then(r => {
                //    console.log(r.data)
                //}).catch(e => {
                //    console.log(e)
                //})
            }

        },
        computed: {},
        components: {
            'file-upload': Dropzone,
        },
    }
</script>
