<template>
    <form class="flex mt-4" @submit.prevent="setTime">
        <input type="time" class="border border-black rounded-lg" name="time" />
        <input type="submit" value="Set time" class="border border-black rounded-lg px-4 py-1 cursor-pointer ml-4 bg-blue-400 text-white" />
    </form>
</template>

<script>

export default {
    mounted() {
        axios.get('http://keaganmpi.local:7000/api/devices/alarm')
            .then(response => {
                console.log(response)
            })
            .catch(err => {
                console.log(err)
            })
    },

    methods: {
        setTime: async function(event)  {
            await axios.post('/api/alarm/setTime', {
                'time': event.target.elements.time.value,
            })
                .then(response => {
                    axios.post('http://keaganmpi.local:7000/api/devices/alarm/setTime', {
                        'time': event.target.elements.time.value,
                    })
                        .then(response => {
                            console.log(response)
                        })
                        .catch(err => {
                            console.log(err)
                        })
                })
                .catch(err => {
                    console.log(err)
                })
        },
    }
}
</script>
