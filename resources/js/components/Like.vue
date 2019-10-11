<template>
    <div>
        <a href="#" @click.prevent= "likePost" class="card-link"> <i class="fas fa-check text-success" style="font-size:25px;"></i> {{likeCount}}</a>
        <a href="#" @click.prevent= "dislikePost" class="card-link mr-4"> <i class="fas fa-times text-danger" style="font-size:25px;"></i> {{dislikeCount}}</a>
    </div>
</template>

<script>
      export default {
        data(){
          return {
            likeCount : 0,
            dislikeCount: 0,
           
          }
        },

        props:[

            'postId',
            'likes',
            'dislike'
        ],
        
          created(){
          this.likeCount = this.likes
          this.dislikeCount = this.dislike
        },
        
        methods:{
            likePost(){
                axios.post('hitlike', {
                    id:this.postId
                     
                }).then(response =>{
                    
                    if(response.data =='deleted'){
                        this.likeCount --
                        
                    }else{
                        this.likeCount ++
                        this.dislikeCount = 0
                     
                    }
                    console.log(error)
                })    
            },
            dislikePost(){

                axios.post('misslike', {
                    id:this.postId
                }).then(response =>{
                    if(response.data == 'deleted'){
                        this.dislikeCount --
                       
                    }else{
                        this.dislikeCount ++
                        this.likeCount = 0
                       
                    }
                }).catch(error =>{
                    console.log(error)
                })
            }

        },

        mounted() {
            console.log('Component mounted.')
            axios.get('/getlike').
            then(response =>{
                
                console.log(response)
            }).
            catch(error =>{
                console.log(error);
            })
        }
    }
</script>
