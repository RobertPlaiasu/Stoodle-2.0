<template>
    <div class="card col-lg-4">
        <!-- Image -->
        <div class="backgrounded">
        <img src="image" alt="">
        </div>

        <!-- Name -->
        <div class="name">
              {{ name }}            
        </div>

        <!-- Features -->
        <div class="prop text-center">
            <div class="col">

                <!-- University -->
                <div class="row">
                    <div class="col">
                        {{ university }}
                    </div>
                </div>

                <div class="row justify-content-between">
                    <!-- Compability with the student -->
                    <div class="col">
                        {{ compability }}
                        <i class="fas fa-percentage"></i>
                    </div>

                    <!-- County -->
                    <div class="col">
                        {{ county }}
                        <i class="fas fa-city"></i>
                    </div>
                </div>

            </div>
        </div>

        <!-- Add card to favorites -->
        <div class="row-lg-3 fav text-center"> 
            <favorite
                :college= id
                :favorited= isfavorite
            ></favorite>
        </div>

        <!-- External link -->
        <div class="row-lg-3 extra text-center">
            <a :href="link" target="_blank">Afla mai mult</a>
        </div>
    </div>
</template>
<script>
    export default {
        props: [ 'id', 'name', 'university', 'compability', 'county', 'link', 'isfavorite' ],
    }
</script>