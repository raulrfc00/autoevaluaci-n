<template lang="">
    <div class="card mt-3 border-secondary">
        <div class="card-header bg-secondary fs-4 fw-bold text-white">
            Cicles
            <button class="btn btn-primary float-end" @click="showForm">
                <i class="bi bi-plus-circle"></i> Afegir cicle
            </button>
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
                    <tr v-for="cicle in cicles" :key="cicle.id">
                        <td>{{ cicle.sigles }}</td>
                        <td>{{ cicle.descripcio }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" :checked="cicle.actiu" disabled>
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
                    <p>Està segur d'esborrar el cicle <strong>{{ cicle.sigles }}</strong>?</p>
                    <span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tancar
                    </button>
                    <button type="button" class="btn btn-danger" @click="deleteCicle">
                        <i class="bi bi-trash3-fill"></i> Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal insert/update -->
    <div class="modal" tabindex="-1" id="insertUpdateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Sigles</label>
                        <input type="text" class="form-control" id="sigles" v-model="cicle.sigles">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Descripciò</label>
                        <input type="text" class="form-control" id="descripcio" v-model="cicle.descripcio">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="actiu" v-model="cicle.actiu">
                        <label class="form-check-label" for="actiu">Actiu</label>
                    </div>
                    <span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tancar
                    </button>
                    <button type="button" class="btn btn-primary" @click="insertCicle">
                        <i class="bi bi-plus-circle"></i> Afegir
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import * as bootstrap from 'bootstrap';

export default {
    data() {
        return {
            cicles: [],
            myModal: null,
            cicle: {
                sigles: '',
                descripcio: '',
                actiu: false
            },
            messageError: "",
            isError: false
        };
    },
    methods: {
        showCicle() {
            axios.get("cicle")
                .then(response => {
                    console.log("showCicle response", response);
                    this.cicles = response.data.data;
                })
                .catch(error => {
                    console.log("showCicle error", error);
                });
        },
        showForm() {
            this.isError = false;
            this.cicle = { sigles: '', descripcio: '', actiu: false }; // Limpiar el formulario
            this.myModal = new bootstrap.Modal(document.getElementById('insertUpdateModal'));
            this.myModal.show();
        },
        insertCicle() {
            console.log("insertCicle called", this.cicle);
            axios.post("cicle/", this.cicle)
                .then(response => {
                    console.log("insertCicle response", response);
                    this.showCicle();
                    this.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    console.log("insertCicle error", error);
                    this.messageError = error.response.data.error;
                });
        },
        confirmDelete(cicle) {
            this.isError = false;
            this.cicle = cicle;
            this.myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            this.myModal.show();
        },
        deleteCicle() {
            axios.delete("cicle/" + this.cicle.id)
                .then(response => {
                    console.log("deleteCicle response", response);
                    this.showCicle();
                    this.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    console.log("deleteCicle error", error);
                    this.messageError = error.response.data.error;
                });
        }
    },
    created() {
        this.showCicle();
    }
};
</script>

<style lang="">
</style>
