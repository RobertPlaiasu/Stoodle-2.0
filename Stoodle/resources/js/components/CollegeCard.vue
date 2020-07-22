<template>
   <div class="card" style="width: 18rem;">
        <img class="card-img-top" :src="image" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title m-0"> {{ name }} </h5>
        </div>
        <ul class="list-group list-group-flush" style="font-weight: bold">
            <li class="list-group-item"> {{ university }} </li>
            <li class="list-group-item"> Judetul {{ county }}</li>
            <li class="list-group-item">Compatibilitatelitatea: {{ compatility }}</li>
            <li class="list-group-item">
                 <favorite :college=id :favorited=isfavorite
                ></favorite>
            </li>
            <li class="list-group-item">
                <a :href="'facultati/' + id" target="_top">Afla mai mult</a>
            </li>
        </ul>
    </div>
</template>
<script>
    export default {
        props: [ 'id', 'image', 'name', 'university', 'compatility', 'county', 'isfavorite' ],
    }
</script>