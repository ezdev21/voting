<template>
    <div v-if="!voted">
     <button @click="vote" class="bg-blue-900 text-xl text-green">vote</button>
     <p id="message" class="text-xl text-bold italic">{{message}}</p>
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
            voted:flase
        }
    },
    mounted(){
    },
    methods:{
         vote(){
            axios.post('/vote/vote/'+this.candidateid+'/'+this.userid)
            .then(response=>{
                this.message='successfully voted ';
                document.getElementById('message').style.color='green';
                this.voted=true;
            })
            .catch(err =>{
                this.message='unsuccesful please try again'
                document.getElementById('message').style.color='red';
            })
          }
    }
}
</script>
