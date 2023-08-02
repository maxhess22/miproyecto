<script setup>



defineProps({
    auto : Object,
    marca: Object,
    modelo: Object,  
});
</script>
<style>
    @import 'datatables.net-bs5';
</style>
<template>
    <Head title="Listar autos" />
    
    <div class="col-md-6 offset-3">
        <DataTable  class=" table table-striped display">
            <thead>
                <tr>
                    <td>patente</td>
                    <td>Kilometraje</td>
                    <td> Marca</td>
                    <td> Modelo</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in auto">
                    <td> {{ item.Patente }}</td>
                    <td> {{ item.Kilometraje }} km</td>
                    <td> {{ item.Marca_ID_Auto }}</td>
                    <td> {{ item.Modelo_ID_Auto }}</td>
                </tr>
            </tbody>
        </DataTable>
    </div>
</template>
