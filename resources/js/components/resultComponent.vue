<template>
    <p class="text-green-900 text-bold">{{result}}</p>
</template>
<script>
    export default{
        props:['score'],
        data(){
            return{
                result:this.score
            }
        },
        computed:{
            async update()
            {
                const result=await axios.get('/vote/'+this.candidateid)
                .then(res=>{
                    this.result=res.data;
                })
                .catch(err=>{
                  console.log('error in fetching data');
                });
            }
        }
    }
</script>