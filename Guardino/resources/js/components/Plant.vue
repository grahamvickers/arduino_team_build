<template>
    <div>
        <section>
            <h2>Banana Plant <span><img src="images/tree.svg" alt="tree" height="40px" padding-left="20px"></span></h2>
            <h3>Gas: {{ gas }}</h3>
            <h3>Moisture: {{ moisture }}</h3>
            <h3>Temperature: {{ temperature }}</h3>
            <h3>Light: {{ light }}</h3>
        </section>

        <!-- <div>
            <HistoryChart></HistoryChart>
        </div> -->
        <canvas id="gasChart" style="height:150px; width:150px"></canvas>
        <canvas id="lightChart" style="height:150px; width:150px"></canvas>
        <canvas id="tempChart" style="height:150px; width:150px"></canvas>
        
         <form class="hidden" ref="sensorForm" enctype="multipart/form-data">
            <input type="number" name="gas" id="gas" :value="`${gas}`">
            <input type="number" name="moisture" id="moisture" :value="`${moisture}`">
            <input type="text" name="temperature" id="temperature" :value="`${temperature}`">
            <input type="number" name="light" id="light" :value="`${light}`">        
        </form>
    </div>
    
</template>

<script>
    // import HistoryChart from './partials/HistoryChart.vue';
    
    export default {
        computed: {
            sensors() {
                return this.$store.state.sensors;
            }
        },
        // components: {
        //     HistoryChart
        // },
        data() {
            return {
                gas: null,
                moisture: null,
                temperature: null,
                light: null,
            }
        },
        mounted() {
            let vm = this;

            let config = {
                apiKey: "AIzaSyB1RlWE4vCmCN8HHThtccQ6igKQZo5bWtM",
                authDomain: "pi-hms.firebaseapp.com",
                databaseURL: "https://pi-hms.firebaseio.com",
                projectId: "pi-hms",
                storageBucket: "pi-hms.appspot.com",
                messagingSenderId: "737726017750",
            };

            if (firebase.apps.length == 0) {
                firebase.initializeApp(config);
            }
  
	        let fireSensor = firebase.database().ref('sensors');

            fireSensor.on('value', function(snap){
                vm.gas = Math.round(snap.val().gas.value);
                vm.moisture = Math.round(snap.val().moisture.value);
                vm.temperature = snap.val().temp.value;
                vm.light = Math.round(snap.val().light.value);
            });

            setTimeout(() => {
                vm.postVal();
            }, 1000);

            // setTimeout(() => {
            //     vm.sensors.forEach(sensor => {
            //         console.log(sensor.gas);
            //         console.log(sensor.moisture);
            //         console.log(sensor.temperature);
            //         console.log(sensor.light);
            //     });  
            // }, 1000); 
            
            setTimeout(() => {
    
                let val = vm.temperature.slice(0,2);
                let tVal = parseInt(val);
   
                let percentG = 100 - vm.gas;
                let percentL = 100 - vm.light;
                let percentT = 100 - tVal;
                new Chart("gasChart", {
                    type: "doughnut",
                    data: {
                        labels: ["Gas"],
                        datasets: [{
                        backgroundColor: ['rgb(96, 166, 95)', 'rgb(235, 235, 235)'],
                        data: [vm.gas, percentG]
                        }]
                    },
                    options: {
                        // responsive: false,
                        cutout: 90

                    }
                });
                new Chart("lightChart", {
                    type: "doughnut",
                    data: {
                        labels: ["Light"],
                        datasets: [{
                        backgroundColor: ['rgb(96, 166, 95)', 'rgb(235, 235, 235)'],
                        data: [vm.light, percentL]
                        }]
                    },
                    options: {
                        // responsive: false,
                        cutout: 90

                    }
                });
                new Chart("tempChart", {
                    type: "doughnut",
                    data: {
                        labels: ["Tempature"],
                        datasets: [{
                        backgroundColor: ['rgb(96, 166, 95)', 'rgb(235, 235, 235)'],
                        data: [tVal, percentT]
                        }]
                    },
                    options: {
                        // responsive: false,
                        cutout: 90

                    }
                });
            }, 1000);
            
        },
        methods: {
            postVal() {

                const formS = new FormData(this.$refs.sensorForm);
                formS.append('_method', 'PATCH');
                axios.post(`/api/sensor`, formS)
                .then(response => {
                    console.log(response.status);
                });

            }
        }
    }
</script>

<style lang="scss" scoped>

</style>