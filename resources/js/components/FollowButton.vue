<template>
    <div>
        <button class="btn btn-outline-primary ml-4 btn-sm" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {

        props : ['userId', 'follows ', 'authId'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return{
                status: this.follows,
            }
        },

        methods: {

            followUser(){
              
               if(this.authId == this.userId){
                   // cannot follow self
                    alert('Cannot follow self');
                
               }else{

                   axios.post('/follow/' + this.userId)
                    .then(response => {
                        this.status = ! this.status;
                    })
                    .catch(errors => {
                        if(errors.response.status == 401) {
                            window.location = '/login';
                        }
                });
                  
               }
                    
            }
        },

        computed: {
            buttonText(){
                return (this.status) ? 'Unfollow' : 'Follow'; 
            }
        }
    }
</script>
