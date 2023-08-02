<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net-bs5';
import 'datatables.net-select';
import 'datatables.net-responsive';
import { library } from '@fortawesome/fontawesome-svg-core'
DataTable.use(DataTablesCore);


    defineProps({
        auto : Object,
        marca: Object,
        modelo: Object,  
    });
    
    function encontrarmd(number , array){
        var modelo = array.filter(e => e.Modelo_ID == number);
        modelo = modelo.map(e => e.Nombre_Modelo);
        modelo = modelo.toString();
        return modelo
    }
    function encontrarmc(number , array){
        var modelo = array.filter(e => e.Marca_ID == number);
        modelo = modelo.map(e => e.Nombre_Marca);
        modelo = modelo.toString();
        return modelo
    }


</script>
<style>
    @import 'datatables.net-bs5';
</style>
<template>
    <Head title="Listar autos" />
    
    <div class="col-md-6 offset-3">
        <DataTable  class=" table table-success table-striped display">
            <thead>
                <tr>
                    <td>patente</td>
                    <td>Kilometraje</td>
                    <td> Marca</td>
                    <td> Modelo</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in auto">
                    <td> {{ item.Patente }}</td>
                    <td> {{ item.Kilometraje }} km</td>
                    <td> {{ encontrarmc(item.Marca_ID_Auto, marca) }}</td>
                    <td> {{ encontrarmd(item.Modelo_ID_Auto, modelo) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </DataTable>
    </div>
</template>
