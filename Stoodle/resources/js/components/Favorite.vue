<template>
    <span id="favorite">
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(college)">
            <i  class="fa fa-heart"></i>
            Sterge de la favorite
        </a>
        <a href="#" v-else @click.prevent="favorite(college)">
            <i  class="fa fa-heart-o"></i>
            Adauga la favorite
        </a>
    </span>
</template>

<script>
    export default {
        props: ['college', 'favorited'],

        data: function () {
            return {
                isFavorited: '',
            }
        },

        mounted () {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(college) {
                axios.post('/favorite/'+college)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(college) {
                axios.post('/unfavorite/'+college)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>