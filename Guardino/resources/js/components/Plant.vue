<template>
    <section>
        <h2>Banana Plant <span><img src="images/tree.svg" alt="tree" height="40px" padding-left="20px"></span></h2>
        <h3>Gas: {{ gas }}</h3>
        <h3>Moisture: {{ moisture }}</h3>
        <h3>Temperature: {{ temperature }}</h3>
        <h3>Light: {{ light }}</h3>

        <!-- <div>
            <polarArea
                :chart-options="chartOptions"
                :chart-data="chartData"
                :chart-id="chartId"
                :dataset-id-key="datasetIdKey"
                :plugins="plugins"
                :css-classes="cssClasses"
                :styles="styles"
                :width="width"
                :height="height"
            />
        </div> -->

        <form class="hidden" ref="sensorForm" enctype="multipart/form-data">
            <input type="number" name="gas" id="gas" :value="`${gas}`">
            <input type="number" name="moisture" id="moisture" :value="`${moisture}`">
            <input type="text" name="temperature" id="temperature" :value="`${temperature}`">
            <input type="number" name="light" id="light" :value="`${light}`">        
        </form>
    </section>
</template>

<script>
    // import { polarArea } from 'vue-chartjs'
    

    export default {
        computed: {
            sensors() {
                return this.$store.state.sensors;
            }
        },
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
                // type: 'polarArea',
                // data: data,
                // options: {}
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

            setTimeout(() => {
                vm.sensors.forEach(sensor => {
                    console.log(sensor.gas);
                    console.log(sensor.moisture);
                    console.log(sensor.temperature);
                    console.log(sensor.light);
                });  
            }, 1000);       
            
            // const myChart = new Chart(
            //     document.getElementById('myChart'),
            //     config
            // );

            // const data = {
            //     labels: [
            //         'gas',
            //         'temperature',
            //         'moisture',
                    
            //     ],
            //     datasets: [{
            //         label: 'Live Sensor Data',
            //         data: [11, 16, 7, 3, 14],
            //         backgroundColor: [
            //         'rgb(255, 99, 132)',
            //         'rgb(75, 192, 192)',
            //         'rgb(255, 205, 86)',
                    
            //         ]
            //     }]
            // };
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