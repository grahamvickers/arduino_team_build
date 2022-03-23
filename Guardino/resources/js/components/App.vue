<template>
    <div class="wrapper">
        <ul>
            <li><router-link to="/home">Home</router-link></li>
            <li><router-link to="/plant">Plant</router-link></li>
        </ul>
        <main>
            <router-view />
        </main>
    </div>
</template>

<script>
    export default {
        name: 'app'
    }
</script>

<style lang="scss" scoped>
</style>
