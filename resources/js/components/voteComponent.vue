<template>
    <div>
     <button @click="vote">vote</button class="bg-blue-900 text-xl text-white">
     <p v-if="message" v-text="message" ref="message" />
    </div>
</template>
<script>
export default {
    props:['candidateId','userId'],
    data() {
        return{
            message:null
        }
    },
    computed:{
        
    },
    methods:{
         vote(){
            axios.post('/vote',{candidateId:this.candidateId,userId:this.userId})
            .then(response=>{
                this.message='successfully voted '+this.candidate.name;
                this.$refs.message.style.color="green";
                console.log('voting succesfull');
            })
            .catch(err =>{
                this.message='unsuccesful please try again'
                this.$ref.message.style.color="red";
                console.log('unseccusfull');
            })
          }
    }
}
</script>
