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
        props: {
            sensors: {
                type: Array
            }
        },

        mounted() {
            this.$store.commit('sensors', this.sensors);
        }

    }
</script>

<style lang="scss" scoped>
main{
    padding: 30px 40px;
}
#mainCon{
    display: flex;
    ul{ 
        position: fixed;
        bottom: 0;
        padding: 20px !important;
        background-color: #F2F2F2;
        margin-right: 20px;
        list-style: none;
        width: 100vw;
        display: flex;
        flex-direction: row;
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
@media screen and (min-width: 858px){
    main{
        padding-top: 30px;
        padding-left: 130px;
    } 
    #mainCon{
        display: flex;
        ul{ 
            z-index: -1;
            width: 80px;
            position: fixed;
            padding: 20px !important;
            background-color: #F2F2F2;
            margin-right: 20px;
            list-style: none;
            height: 100vh;
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

@media screen and (min-width: 1200px) {
    main{
        padding-top: 30px;
        padding-left: 130px;
    }   
    
}
}
</style>
