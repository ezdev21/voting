<template>
    <p>{{newResult()}}</p>
</template>
<script>
    export default{
        props:['candidateId'],
        data(){
            result:null
        },
        computed:{
            async newResult(){
                const data=await axios.get('/result')
                .then(res=>{
                    this.result-res.data.result;
                })
            }
        }
    }
</script>