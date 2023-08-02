<script setup>
    import { Head, Link, router } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';
    import Swal from 'sweetalert2'

    router.on('invalid', () => {Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'invalido',
        footer: '<a href="">Why do I have this issue?</a>'
    })});
    
    router.on('success', ()=>{Swal.fire({
        position: 'center-center',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1000
    })});

    router.on('errors.Patente', (event) => {Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'La execpticon',
        footer: '<a href="">Why do I have this issue?</a>'
    })});


    defineProps({
        auto : Object,
        marca: Object,
        modelo: Object,   
        errors: Object  
    });



    const form = useForm({
        Kilometraje: null,
        Patente: null,
        Marca_ID_Auto: null,
        Modelo_ID_Auto: null,
        });

    const enviado = ()=>{Swal.fire({
                    position: 'center-center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: true,
                    timer: 1500
                    })}


</script>

<template>
    <Head title="leer autos" />
    <div class="col-md-6 offset-3 py-5">
        <form @submit.prevent="form.post('/store')" action="POST">
            <div class="row">
                <div class="col">
                    <label for="Kilometraje" class="form-label">Kilometraje</label>
                    <input type="number" min="0" required  v-model="form.Kilometraje" class="form-control" >
                </div>
                <div class="col">
                
                    <label for="Patente" class="form-label"> Patente</label>
                    <input type="text" required minlength="8" maxlength="8" name="Patente" id="Patente" v-model="form.Patente"  class="form-control {'text-danger': hasError }" placeholder="ej: AA-BB-11">
                    <p v-if="errors.Patente" class="text-danger">{{ errors.Patente }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col gy-4">
                    <label for="Marca_ID_Auto" class="form-label">Marca</label>
                    <select  name="Marca_ID_Auto" id="Marca_ID_Auto" class="form-select" v-model="form.Marca_ID_Auto">
                        <option  v-for="item in marca" v-bind:value="item.Marca_ID">{{ item.Nombre_Marca}}</option>
                    </select>
                </div>
                <div class="col gy-4">
                    <label for="Modelo_ID_Auto" class="form-label">Modelo</label>
                    <select  name="Modelo_ID_Auto" v-model="form.Modelo_ID_Auto" id="Modelo_ID_Auto" class="form-select">
                        <option  v-for="item in modelo"  v-bind:value="item.Modelo_ID">{{ item.Nombre_Modelo}} </option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col gy-4">
                    <label for="">Fecha inicio</label>
                    <input type="datetime-local" class="form-control">
                </div>
                <div class="col gy-4">
                    <label for="">Fecha termino</label>
                    <input type="datetime-local" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col justify-content-center gy-4">
                    <button type="submit" class="btn btn-success btn-lg" id="btn">Guardar</button>
                </div>
            </div>
        </form>
        
    </div>
</template>


