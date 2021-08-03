<template>
    <div class="category" v-if="post.category !== null">
        <dt>Category </dt>
        <dd> {{ post.category.name}}</dd>

        <dt>Category Description</dt>
        <dd>{{ post.category.description }}</dd>
    </div>
</template>

<script>
    import Axios from 'axios';
    export default {
        data(){
            return {
                categories: null
            }
        },
        mounted() {
            console.log('Component mounted');
            let config = {
                method: 'get',
                url: 'api/categories',
                headers: {
                    'Authorization': 'Bearer KPbd73ef9LV1yYnJdbMjMuYmYWOrDnWhgvaKqjHkkpRDAzzKlwOU23mSGjuIIEjxQVkqizGyxT5GBF3q'
                }
            };
            Axios(config).then(resp =>{ //get('/api/categories')
                //console.log(resp.data);
                this.categories = resp.data;
            }).catch(e =>{
                console.error('Scusa, non posso fare la chiamata!' + e);
            })
        }
    }
</script>
