<template>
    <div class="mx-auto">
     <p class="text-xl font-bold inline m-1">{{candidateScore}}</p>
     <button @click="vote" :disabled="voted" class="bg-blue-400 text-xl text-white rounded p-1 px-4">{{voteText}}</button>
    </div>
</template>
<script>
export default {
    props:['userId','candidateId'],
    data() {
        return{
            message:'',
            voted:false,
            voteText:'vote',
            candidateScore:0
        }
    },
    mounted(){
        axios.get('/vote/result',{params:{userId:this.userId,candidateId:this.candidateId}})
        .then(res=>{
          this.voted=res.data.voted;
          this.candidateScore=res.data.candidateScore;
        })
        .catch(err=>{

        });
    },
    methods:{
         vote(){
            axios.post('/vote/vote',{userId:this.userId,candidateId:this.candidateId})
            .then(res=>{
                this.voted=true;
                this.voteText="voted"
                this.candidateScore+=1;
            })
            .catch(err =>{
                
            })
          }
    }
}
</script>
