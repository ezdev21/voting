<template>
    <div v-if="!voted" class="mx-auto">
     <p class="text-xl font-bold inline m-1">{{candidateScore}}</p>
     <button @click="vote" class="bg-blue-900 text-xl text-white rounded p-1 px-4">vote</button>
    </div>
</template>
<script>
export default {
    props:{
        candidateid:{
            type:String
        },
        userid:{
            type:String
        }
    },
    data() {
        return{
            message:'',
            voted:false,
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
                this.candidateScore+=1;
            })
            .catch(err =>{
                
            })
          }
    }
}
</script>
