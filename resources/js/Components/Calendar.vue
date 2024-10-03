<template>
    <div>
        <FullCalendar :options="calendarOptions"></FullCalendar>
    </div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue3'
import daygrid from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
import timeGrip from '@fullcalendar/timegrid'

export default {
    name: 'Calendar',
    components: {
        FullCalendar 
    },
    data() {
        return {
            calendarOptions: {
                plugins: [daygrid, interactionPlugin, timeGrip],
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                height: 'auto',
                allDaySlot: false,
                slotMinTime: "08:00:00",
                slotMaxTime: "19:00:00",
                dateClick: this.handleDateClick,
            }
        }
    },
    methods: {
        handleDateClick(clickInfo) {
            this.$emit('dateClick', clickInfo)
        }
    }
}
</script>