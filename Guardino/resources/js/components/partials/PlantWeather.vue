<template>
    <div id="weatherCon">
        
        <div id="currentWeather">
            <h4>{{ Math.round(weather.main.temp) }}&deg;C</h4>

            <div>
                <p>{{weather.weather[0].description}}</p>
                <img v-bind:src="`https://api.openweathermap.org/img/w/${weather.weather[0].icon}.png`" alt="weather icon">
            </div>
        </div>

        <div>
            <p>Low {{ Math.round(weather.main.temp_min) }}&deg;C &#8693; High {{ Math.round(weather.main.temp_max) }}&deg;C</p>
        </div>
        
    </div>
</template>

<script>
export default {
    data() {
        return {
        weather: {}
        };
    },
    created: function() {
        let vm = this;
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=Toronto&units=metric&appid=0cfd5254b9feba1008beb2600ba94f49`) 
        .then(function(response){
        return response.json();
        }).then(function(data){
            // console.log(data)
            vm.weather = data;
        })
    },
    methods: {
        currentDate() {
            const current = new Date();
            const date = `${current.getDate()}/${current.getMonth()+1}/${current.getFullYear()}`;
            return date;
        }
    },
}
</script>

<style lang="scss" scoped>
 #currentWeather{
     display: flex;
     flex-direction: row;
     align-items: center;
     margin-bottom: 20px;
    h4{
        margin-right: 30px;
    }
    p{
        margin-bottom: 5px !important;
    }
 }

 #nameDate{
    display: flex;
    flex-direction: row;
    align-items: center;
    h2{
        margin-right: 30px;
    }
 }

 @media screen and (min-width: 1200px) {
     #weatherCon{
         display: flex;
         flex-direction: row;

     }

     #currentWeather{
         margin-right: 30px;
     }
 }
</style>