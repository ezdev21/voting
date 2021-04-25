<template>
    <div>
     <button @click="vote">vote</button>
     <p v-if="message" v-text="message" ref="message" />
    </div>
</template>
<script>
export default {
    props:['candidateId','userId'],
    data() {
        message:''
    },
    computed:{
        
    },
    methods:{
         vote(){
            axios.post('/vote',{candidateId:this.candidate.id,userId:this.user.id})
            .then(response=>{
                this.message='successfully voted'+this.candidate.name;
                this.$ref.message.style.color="green";
            })
            .catch(err =>{
                this.message='unsuccesful please try again'
                this.$ref.message.style.color="red";
            })
          }
    }
}
</script>
