<template>
    <div>
        
        <section>
            <h2>Welcome back!</h2>
            <p>Your plants are all healthy, you’re doing a great job!</p>

        </section>

        <section>
            <h2>Plant Collection</h2>
            <div>
                <router-link to="/plant" class="plantBtn"><img src="images/plant_btn.png" alt="plant button"></router-link>
                <a href="#" class="plantBtn"><img src="images/plant_btn2.png" alt="plant button"></a>
                <a href="#" class="plantBtn"><img src="images/plant_btn.png" alt="plant button"></a>
            </div>
        </section>

        <section>
            <h2>Weather</h2>
        </section>
    </div>
</template>

<script>
    export default {

    }
</script>

<style lang="scss" scoped>
    .plantBtn{
        width: 100px;
        margin-right: 20px;
        margin-bottom: 20px !important;
    }
</style>
