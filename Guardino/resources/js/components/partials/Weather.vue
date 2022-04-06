<template>
    <div>
        <h2>{{ weather.name }}</h2>
        <p>{{ currentDate() }}</p>
        <h2>{{ Math.round(weather.main.temp) }}&deg;C</h2>
        <h5>{{weather.weather[0].description}}</h5>
        <img v-bind:src="`https://api.openweathermap.org/img/w/${weather.weather[0].icon}.png`" alt="weather icon">
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