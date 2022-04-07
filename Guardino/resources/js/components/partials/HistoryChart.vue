<template>
  <Doughnut id="historyChart"
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
</template>

<script>
import { Doughnut } from 'vue-chartjs/legacy'

import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  CategoryScale
} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)

export default {
    name: 'DoughnutChart',
    components: {
        Doughnut
    },
    computed: {
        sensors() {
            return this.$store.state.sensors;
        }
    },
    props: {
        chartId: {
        type: String,
        default: 'doughnut-chart'
        },
        datasetIdKey: {
        type: String,
        default: 'label'
        },
        width: {
        type: Number,
        default: 400
        },
        height: {
        type: Number,
        default: 400
        },
        cssClasses: {
        default: '',
        type: String
        },
        styles: {
        type: Object,
        default: () => {}
        },
        plugins: {
        type: Array,
        default: () => []
        }
    },
    data() {
        return {
        sData: [],
        chartData: null,
        chartOptions: {
            responsive: true,
            maintainAspectRatio: false
        }
        }
    },
    mounted() {
        let vm = this;

        setTimeout(() => {
        
            let sLength = vm.sensors.length;
            let sLast = vm.sensors[sLength-1];
            let val = sLast.temperature.slice(0,2);
            let tVal = parseInt(val);

            vm.sData.push(sLast.gas);
            vm.sData.push(sLast.light);
            vm.sData.push(sLast.moisture);
            vm.sData.push(tVal);

            vm.chartData = {
                labels: ['Moisture', 'Temperature', 'Light', 'Gas'],
                datasets: [
                {
                    backgroundColor: ['#2B3D54', '#60A65F', '#BDD600', '#5F9EA6'],
                    data: vm.sData
                }
                ]
            }

        }, 1000);
                
                
    }

}
</script>

<style lang="scss" scoped>
 #historyChart{
     width: 200px;
 }

 @media screen and (min-width: 760px) {
    //  #historyChart{
    // //  width: 300px;
    // }
 }
 @media screen and (min-width: 1200) {
     #historyChart{
        width: 200px; 
    }
 }
</style>
