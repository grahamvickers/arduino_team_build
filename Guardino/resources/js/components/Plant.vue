<template>
    <div>
        <section>
            <h2>Banana Plant <span><img src="images/tree.svg" alt="tree" height="40px" padding-left="20px"></span></h2>
        </section>

        <section id="plantDataCon">
            <h2 class="hidden">Plant Data</h2>

            <div id="sensorCharts">
                <h3 hidden>Live Sensor Display</h3>

                <div class="chart">
                    <canvas  id="gasChart" style="height:150px; width:150px"></canvas>
                   <h5>{{ gas }} kg</h5>
                </div>
                <div class="chart">
                    <canvas id="lightChart" style="height:150px; width:150px"></canvas>
                   <h5>{{ light }} %</h5>
                </div>
                <div class="chart">
                    <canvas id="tempChart" style="height:150px; width:150px"></canvas>
                   <h5>{{ temperature }}</h5>
                </div>
            </div>

            <div id="secondaryDataCon">
                <div>
                    <h3 hidden>Plant History Chart</h3>
                    <HistoryChart></HistoryChart>
                </div>
                <div>
                    <h3 hidden>Open weather Api Display</h3>
                    <WeatherApi></WeatherApi>
                </div>
            </div>
        </section>

         <form class="hidden" ref="sensorForm" enctype="multipart/form-data">
            <input type="number" name="gas" id="gas" :value="`${gas}`">
            <input type="number" name="moisture" id="moisture" :value="`${moisture}`">
            <input type="text" name="temperature" id="temperature" :value="`${temperature}`">
            <input type="number" name="light" id="light" :value="`${light}`">        
        </form>
    </div>
    
</template>

<script>
    import HistoryChart from './partials/HistoryChart.vue';
    import WeatherApi from './partials/PlantWeather.vue';

    
    export default {
        computed: {
            sensors() {
                return this.$store.state.sensors;
            }
        },
        components: {
            HistoryChart,
            WeatherApi
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
                        cutout: 70

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
                        cutout: 70

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
                        cutout: 70

                    }
                });
            }, 1000);
            

            let val = vm.temperature.slice(0,2);
                let tVal = parseInt(val);
   
                let percentG = 100 - vm.gas;
                let percentL = 100 - vm.light;
                let percentT = 100 - tVal;

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
                    responsive: false,
                    cutout: 90

                }
            });

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );

           
        },
        methods: {
            postVal() {

                const formS = new FormData(this.$refs.sensorForm);
                formS.append('_method', 'PATCH');
                axios.post(`/api/sensor`, formS)
                .then(response => {
                    console.log(response.status);
                });

            },

            // sendSms() {
            //     // sms function below 
            //     const client = require('twilio')('ACe0066d7fe8e4e129d320d77a991d0237', '5170db6740df41b9b1d4ae6c57fbbd9d');

            //     if (vm.moisture >= 85) {
            //         client.messages
            //         .create({
            //             body: 'Flora.io plant alert!',
            //             // twillo sending number
            //             from: '+15078794673',
            //             // user number
            //             to: '+12269270901'
            //         }).then(message => console.log(message))
            //         .catch(error => console.log(error))
            //     }
                
            // }
        }
    }
</script>

<style lang="scss" scoped>
    .chart{
        // height: auto;
        width: 250px;
        // canvas{
        // width: 250px;
        // height: 250px;
        // }
        margin-bottom: 30px;
        h5{
            margin-top: 10px;
        }
        text-align: center  ;
        
    }

    @media screen and (min-width: 858px) {
        #sensorCharts{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        #secondaryDataCon{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }
    }

    @media screen and (min-width: 1200px) {

        #plantDataCon{
            display: flex;
            flex-direction: column ;
            justify-content: space-around;
        }
        

        
    }
</style>