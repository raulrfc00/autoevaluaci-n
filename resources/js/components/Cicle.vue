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
                    <td>{{ cicle.sigles }}</td>
                    <td>{{ cicle.descripcio }}</td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="actiu" name="actiu"
                            checked="cicle.actiu" disabled>
                            <label class="form-check-label" for="actiu"></label>
                                
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-row-reverse">
                            <form action="" method="post">
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3-fill"></i> Esborrar
                                </button>
                            </form>
                            <form action="" class="float">
                                <button class="btn btn-secondary btn-sm me-2">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            cicles: [],
        }
    },
    created() {
        const me = this
        axios.get("/M07/autoevaluacion/public/api/cicle")
            .then(response => {
                console.log(response)
                me.cicles = response.data
            })
    },
}
</script>
<style lang="">
    
</style>