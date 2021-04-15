<template>
    <div>
     <button @click="vote">vote</button>
     <p v-if="message" v-text="message" ref="message" />
    </div>
</template>
<script>
export default {
    props:['candidate','user'],
    data() {
        message:''
    },
    computed:{
        
    },
    methods:{
         vote(){
            axios.post('/vote',this.candidate,this.user)
            .then(response=>{
                this.message='';
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
