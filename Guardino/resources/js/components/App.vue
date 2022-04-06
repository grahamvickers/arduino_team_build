<template>
    <div id="mainCon">
        <div>
            
            <ul id="sideMenu">
                <li><router-link to="/home"><span><img src="images/home.png" alt="home icon"></span></router-link></li>
                <li><router-link to="/plant"><span><img src="images/list.png" alt="home icon"></span></router-link></li>
                <li><span><img src="images/add.png" alt="add plant icon"></span></li>
                <li><span><img src="images/profile.png" alt="add plant icon"></span></li>
                <li><span><img src="images/logout.png" alt="add plant icon"></span></li>
                
            </ul>
        </div>
       
        <main>
            <router-view />
        </main>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                thePlantData: [],
            }
        },
        
    }
</script>

<style lang="scss" scoped>
main{
    padding-top: 20px;
    padding-left: 90px;
}
#mainCon{
    display: flex;
    ul{ 
        position: fixed;
        padding: 20px !important;
        background-color: #F2F2F2;
        margin-right: 20px;
        list-style: none;
        height: 95vh;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        li{
            display: flex;
            
            justify-content: space-around;
            img{
                width: 30px;
                &:hover{
                    cursor: pointer;
                    opacity: .8;
                }
            }
        }
    }
}
</style>
