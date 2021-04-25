<template>
    <p>{{result}}</p>
</template>
<script>
    export default{
        props:['score'],
        data(){
            return{
                result:this.score
            }
        },
        
    }
</script>