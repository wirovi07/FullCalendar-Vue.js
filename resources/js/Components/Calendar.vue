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
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev, next, today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                }
            }
        }
    }
}
</script>