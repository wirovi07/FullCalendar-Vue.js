<template>
    <div
        class="fixed inset-0 z-10 flex items-center justify-center overflow-y-auto bg-gray-500 bg-opacity-75 ease-out duration-400">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <form>
                <!-- Header -->
                <div class="flex justify-between border-b border-gray-100 px-5 py-4">
                    <div>
                        <i class="fas fa-exclamation-circle text-blue-500"></i>
                        <span class="font-bold text-gray-700 text-lg">Reservas</span>
                    </div>
                    <div>
                        <button>
                            <i class="fa fa-times-circle text-red-500 hover:text-red-600 transition duration-150"></i>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <!-- Buscar Usuario -->
                    <div class="mb-4">
                        <label for="buscarUsuario" class="block text-gray-700 text-sm font-bold mb-2">Buscar
                            Usuario</label>
                        <div class="relative">
                            <input placeholder="Buscar Usuario"
                                class="p-2 w-full text-gray-800 border border-gray-300 rounded focus:ring-2 focus:ring-teal-500 focus:outline-none" />
                            <button type="button" class="absolute right-2 top-2 text-gray-500">
                                <i class="fas fa-chevron-up"></i>
                            </button>
                        </div>
                        <!-- Dropdown options -->
                        <div
                            class="absolute shadow bg-white top-100 z-40 w-full left-0 rounded max-h-select overflow-y-auto">
                        </div>
                    </div>

                    <!-- Motivo -->
                    <div class="mb-4">
                        <label for="motivo" class="block text-gray-700 text-sm font-bold mb-2">Motivo:</label>
                        <input v-model="form.title" type="text" class="input-field" id="motivo"
                            placeholder="Ingresa el motivo de la consulta" autocomplete="off">
                    </div>

                    <!-- Fecha -->
                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha</label>
                        <input v-model="form.date_at" disabled type="text" class="input-field bg-gray-100 cursor-not-allowed" id="fecha"
                            placeholder="Fecha seleccionada">
                    </div>

                    <!-- Hora -->
                    <div class="mb-4">
                        <label for="hora" class="block text-gray-700 text-sm font-bold mb-2">Hora</label>
                        <input v-model="form.hour" disabled type="text" class="input-field bg-gray-100 cursor-not-allowed" id="hora"
                            placeholder="Hora seleccionada">
                    </div>

                    <!-- Duración -->
                    <div class="mb-4">
                        <label for="duracion" class="block text-sm font-bold text-gray-700">Duración</label>
                        <select v-model="form.session" id="duracion"
                            class="mt-1 block form-select w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500">
                            <option value="900">15 minutos</option>
                            <option value="1800">30 minutos</option>
                            <option value="3600">1 hora</option>
                        </select>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                    <button @click.prevent="store(form)" type="button"
                        class="inline-flex justify-center w-full border border-teal-500 bg-teal-500 text-white rounded-md px-4 py-2 m-2">Guardar</button>
                    <button type="button"
                        class="inline-flex justify-center w-full border border-red-500 text-red-500 rounded-md px-4 py-2 m-2">Eliminar</button>
                    <button type="button" @click.prevent="closeModal"
                        class="inline-flex justify-center w-full border border-gray-200 bg-teal-200 text-gray-700 rounded-md px-4 py-2 m-2">Atrás</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        form: {
            type: Object,
            default: ()=>{}
        }
    },
    components: {
    },
    methods: {
        closeModal(){
            this.$emit('closeModal')
        },
        store(form){
            this.$emit('saveAppt', form)
        }
    }
};
</script>

<style>
.input-field {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #d1d5db;
    /* Gray border */
    border-radius: 0.375rem;
    /* Rounded corners */
    background-color: transparent;
    color: #374151;
    /* Gray text */
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.input-field:focus {
    outline: none;
    border-color: #14b8a6;
    /* Teal border on focus */
    box-shadow: 0 0 0 2px rgba(20, 184, 166, 0.4);
    /* Teal shadow on focus */
}

.input-field[disabled] {
    background-color: #f9fafb;
    /* Light gray background for disabled inputs */
    cursor: not-allowed;
}

.max-h-select {
    max-height: 300px;
}

.top-100 {
    top: 100%;
}
</style>