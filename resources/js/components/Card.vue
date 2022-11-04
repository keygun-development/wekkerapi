<template>
    <slot></slot>
</template>

<script>
export default {
    name: "Card",

    data() {
        return {
            time: ''
        }
    },

    props: {
        alarmId: String,
        alarmTime: String
    },

    methods: {
        changeState: async function (event) {
            self = this
            await axios.post('/api/alarm/changeState', {
                id: this.alarmId
            })
                .then(function (response) {
                    event.target.checked ?
                        axios.post('http://keaganmpi.local:7000/api/devices/alarm/setTime', {
                            'time': self.alarmTime,
                        })
                            .then(response => {
                                console.log(response)
                            })
                            .catch(err => {
                                console.log(err)
                            })
                        :
                        axios.post('http://keaganmpi.local:7000/api/devices/alarm/removeTime', {
                            'time': self.alarmTime,
                        })
                            .then(response => {
                                console.log(response)
                            })
                            .catch(err => {
                                console.log(err)
                            })
                })
                .catch(function (err) {
                    console.log(err)
                })
        }
    }
}
</script>
