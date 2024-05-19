<template lang="">
    <div class="card mt-3 border-secondary">
        <div class="card-header bg-secondary fs-4 fw-bold text-white">
            Cicles
            <a href="{{ url('cicle/create') }} " class="btn btn-primary float-end">
                <i class="bi bi-plus-circle"></i> Afegir cicle
            </a>
        </div>
<div class="card-body">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Sigles</th>
        <th scope="col">Descripcio</th>
        <th scope="col">Actiu</th>
        </tr>
    </thead>
    <tbody>

                <tr v-for="cicle in cicles">
                    <td> {{ cicle.sigles }} </td>
                    <td> {{ cicle.descripcio }} </td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="actiu" name="actiu"
                            checked="cicle.actiu" disabled>
                            <label class="form-check-label" for="actiu"></label>
                                
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-row-reverse">

                            <button class="btn btn-danger btn-sm" @click="confirmDelete(cicle)">
                                    <i class="bi bi-trash3-fill"></i> Esborrar
                                </button>


                                <button class="btn btn-secondary btn-sm me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>

                            </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

    <!-- Modal borrar -->

<div class="modal" tabindex="-1" id="deleteModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Esborrar Cicle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Està segur d'esborrar el cicle <strong>{{ cicle.sigles}}</strong>?</p>
        <span v-if="isError" class="badge text-bg-danger">{{messageError}}</span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Tancar
        </button>
        <button type="button" class="btn btn-danger" @click="deleteCicle()">
            <i class="bi bi-trash3-fill" ></i>
            Aceptar
        </button>
      </div>
    </div>
  </div>
</div>

</template>
<script>

import axios from 'axios';
import * as bootstrap from 'bootstrap'


export default {
    data() {
        return {
            cicles: [],
            myModal: {},
            cicle: {},
            messageError: "",
            isError: false,
        }
    },
    methods:{
            showCicle(){
                const me = this
            axios.get("cicle")
                .then(response => {
                    console.log(response)
                    me.cicles = response.data.data
                })
                .catch(error => {

                })
            },
            confirmDelete(cicle){
                this.isError = false
                this.cicle = cicle
                this.myModal = new bootstrap.Modal('#deleteModal')
                this.myModal.show()
            },
            deleteCicle(){
                const me = this
            axios.delete("cicle/" + me.cicle.id)
                .then(response => {
                    me.showCicle()
                    me.myModal.hide
                })
                .catch(error => {
                    this.isError = true
                    me.messageError = error.response.data.error
                })
            }


    },
    created() {
            this.showCicle()
        },
}
</script>
<style lang="">
    
</style>