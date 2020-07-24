<template>
   <div class="card" style="width: 18rem;">
        <img class="card-img-top" :src="image" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title m-0"> {{ name }} </h5>
        </div>
        <ul class="list-group list-group-flush" style="font-weight: bold">
            <li class="list-group-item backgrounded-list-item"> 
                <a :href="'../university/' + university.id "> {{ university.name }} </a> 
            </li>
            <li class="list-group-item"> Judetul {{ county }}</li>
            <li class="list-group-item">Compatibilitatelitatea: {{ compatibility }}</li>
            <li class="list-group-item" id="favorite">
                 <favorite :college=id :favorited=isfavorite></favorite>
            </li>
            <li class="list-group-item backgrounded-list-item">
                <a :href="'../facultati/' + id " target="_top">Afla mai mult</a>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: {
            id: String,
            image: String,
            name: String,
            university: Object,
            compatibility: String,
            county: String,
            isfavorite: String
        }
    }
</script>