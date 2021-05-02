<template>
    <div>
      <div class="btn btn-primary btn-block" data-target="#id" data-toggle="collapse">
          Button
      </div>

        <div class="collapse" id="id">
            <div class="card">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "shopadd@category",

        data () {
            return {
                form: new Form({
                    username: '',


                })
            }
        },
    }

</script>

<style scoped>

</style>
