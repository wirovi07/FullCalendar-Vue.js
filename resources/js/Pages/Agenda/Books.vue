<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Calendar
            </h2>
            <span>{{ $page.user }}</span>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Calendar @dateClick="dateClick"></Calendar>
                </div>
            </div>
        </div>
        <ModalCalendar v-if="showModal" :form="newEvent" @closeModal="closeModal" @saveAppt="saveAppt"></ModalCalendar>
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
                newEvent: {
                    title: '',
                    date_at: '',
                    hour: '',
                    user_id: '',
                    session: 1800
                }
            }
        },
        methods: {
            dateClick(arg){
                this.$data.showModal = true;
                this.setModalOpen(arg)
                console.log('recibiendo datos:', arg);
            },
            closeModal(){
                this.$data.showModal = false;
            },
            setModalOpen(obj){
                const dateAndTime = obj.dateStr.split("T")
                this.newEvent.date_at = dateAndTime[0];
                this.newEvent.hour = dateAndTime[1].substr(0, 8);
                this.newEvent.user_id = this.$page.user_id
                return
            },
            saveAppt(param){
                console.log(param)
            }
        }
    }
</script>