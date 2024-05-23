<template lang="">
    <div class="card mt-3 border-secondary">
        <div class="card-header bg-secondary fs-4 fw-bold text-white">
            Usuaris
            <button class="btn btn-primary float-end" @click="showForm">
                <i class="bi bi-plus-circle"></i> Afegir usuari
            </button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom Usuari</th>
                        <th scope="col">Contrasenya</th>
                        <th scope="col">Correu</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Cognom</th>
                        <th scope="col">Actiu</th>
                        <th scope="col">Cicles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="usuari in usuaris" :key="usuari.id">
                        <td>{{ usuari.nom_usuari }}</td>
                        <td>{{ usuari.contrasenya }}</td>
                        <td>{{ usuari.correu }}</td>
                        <td>{{ usuari.nom }}</td>
                        <td>{{ usuari.cognom }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" :checked="usuari.actiu" disabled>
                            </div>
                        </td>
                        <td>{{ usuari.cicles }}</td>
                        <td>
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-danger btn-sm" @click="confirmDelete(usuari)">
                                    <i class="bi bi-trash3-fill"></i> Esborrar
                                </button>
                                <button class="btn btn-secondary btn-sm me-2" @click="editUsuari(usuari)">
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
                    <h5 class="modal-title">Esborrar usuari</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Està segur d'esborrar el usuari <strong>{{ usuari.nom_usuari }}</strong>?</p>
                    <span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tancar
                    </button>
                    <button type="button" class="btn btn-danger" @click="deleteUsuari()">
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
                    <h5 v-if="insert" class="modal-title">Afegir usuari</h5>
                    <h5 v-else class="modal-title">Modificar usuari</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomUsuari" class="form-label">Nom Usuari</label>
                        <input type="text" class="form-control" id="nomUsuari" v-model="usuari.nom_usuari">
                    </div>
                    <div class="mb-3">
                        <label for="contrasenya" class="form-label">Contrasenya</label>
                        <input type="password" class="form-control" id="contrasenya" v-model="usuari.contrasenya">
                    </div>
                    <div class="mb-3">
                        <label for="correu" class="form-label">Correu</label>
                        <input type="email" class="form-control" id="correu" v-model="usuari.correu">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" v-model="usuari.nom">
                    </div>
                    <div class="mb-3">
                        <label for="cognom" class="form-label">Cognom</label>
                        <input type="text" class="form-control" id="cognom" v-model="usuari.cognom">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="actiu" v-model="usuari.actiu">
                        <label class="form-check-label" for="actiu">Actiu</label>
                    </div>
                    
                    <span v-if="isError" class="badge text-bg-danger">{{ messageError }}</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tancar
                    </button>
                    <button v-if="insert" type="button" class="btn btn-primary" @click="insertUsuari()">
                        <i class="bi bi-plus-circle"></i> Afegir
                    </button>
                    <button v-else type="button" class="btn btn-primary" @click="updateUsuari()">
                        <i class="bi bi-plus-circle"></i> Modificar
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
            usuaris: [],
            myModal: null,
            usuari: {
                id: null,
                nom_usuari: '',
                contrasenya: '',
                correu: '',
                nom: '',
                cognom: '',
                actiu: false,
                cicles: ''
            },
            messageError: "",
            isError: false,
            insert: false,
        };
    },
    methods: {
        showUsuari() {
            axios.get("usuari")
                .then(response => {
                    this.usuaris = response.data.data;
                })
                .catch(error => {
                    console.log("showUsuari error", error);
                });
        },
        showForm() {
            this.insert = true;
            this.isError = false;
            this.usuari = {
                id: null,
                nom_usuari: '',
                contrasenya: '',
                correu: '',
                nom: '',
                cognom: '',
                actiu: false,
                cicles: ''
            }; // Limpiar el formulario
            this.myModal = new bootstrap.Modal(document.getElementById('insertUpdateModal'));
            this.myModal.show();
        },
        insertUsuari() {
            axios.post("usuari", this.usuari)
                .then(response => {
                    this.showUsuari();
                    this.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    this.messageError = error.response.data.error;
                });
        },
        editUsuari(usuari){
            this.insert = false;
            this.usuari = { ...usuari };
            this.myModal = new bootstrap.Modal(document.getElementById('insertUpdateModal'));
            this.myModal.show();
        },
        updateUsuari(){
            axios.put("usuari/" + this.usuari.id, this.usuari)
                .then(response => {
                    this.showUsuari();
                    this.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    this.messageError = error.response.data.error;
                });
        },
        confirmDelete(usuari) {
            this.isError = false;
            this.usuari = usuari;
            this.myModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            this.myModal.show();
        },
        deleteUsuari() {
            axios.delete("usuari/" + this.usuari.id)
                .then(response => {
                    this.showUsuari();
                    this.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    this.messageError = error.response.data.error;
                });
        }
    },
    created() {
        this.showUsuari();
    }
};
</script>


<style lang="">
</style>
