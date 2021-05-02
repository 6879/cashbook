<template>
  <div>
    <h1> Purchase Type Edit </h1>
    <form @submit.prevent="updatePurchaseType">
      <div class="row">
        <div class="col-md-6">


          <div class="form-group">
            <label> Purchase Type :</label>
            <input type="text" class="form-control" v-model="post.purchaseType">
          </div>


          <div class="form-group">
            <label> Status :</label>
            <input type="text" class="form-control" v-model="post.status">
          </div>
 

        </div>
        </div>


         <br />
        <div class="form-group">
          <button class="btn btn-primary">Update</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {

      data() {
        return {
          post: {}
        }
      },
      created() {
        let uri = `/purchase/edit/${this.$route.params.id}`;
        axios.get(uri).then((response) => {
            this.post = response.data;
        });
      },
      methods: {
        updateStudent() {
          let uri = `/student/update/${this.$route.params.id}`;
          this.axios.post(uri, this.post).then((response) => {
            this.$router.push({name: 'students'});
          });
        }
      }
    }
</script>