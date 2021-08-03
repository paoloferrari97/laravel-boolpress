<template>
    <div class="container post-component">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts:</div>

                    <div class="card-body" v-for="post in posts">
                        <h1>{{post.title}}</h1>
                        <p>{{post.body}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Axios from 'axios';
    export default {
        data(){
            return {
                posts: null
            }
        },
        mounted() {
            console.log('Component mounted');
            Axios.get('/api/posts').then(resp =>{
                //console.log(resp.data.data);
                this.posts = resp.data.data;
            }).catch(e =>{
                console.error('Scusa, non posso fare la chiamata!' + e);
            })
        }
    }
</script>
