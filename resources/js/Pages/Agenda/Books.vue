<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Calendar
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Calendar @dateClick="dateClick"></Calendar>
                </div>
            </div>
        </div>
        <ModalCalendar v-if="showModal"></ModalCalendar>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import Calendar from '../../Components/Calendar.vue'
    import ModalCalendar from '../../Components/Modals/CalendarModal.vue'

    export default {
        name: 'Books',
        components: {
            Calendar,
            AppLayout,
            ModalCalendar
        },
        data(){
            return{
                showModal: false,
            }
        },
        methods: {
            dateClick(arg){
                this.$data.showModal = true;
                console.log('recibiendo datos:', arg);
            }
        }
    }
</script>