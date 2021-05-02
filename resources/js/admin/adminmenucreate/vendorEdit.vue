<template>
  <div>
    <h1> Student Edit </h1>
    <form @submit.prevent="updateVendor">
      <div class="row">
        <div class="col-md-6">


          <div class="form-group">
            <label> Name :</label>
            <input type="text" class="form-control" v-model="post.name">
          </div>


          <div class="form-group">
            <label> Email :</label>
            <input type="text" class="form-control" v-model="post.email">
          </div>


          <div class="form-group">
            <label> Phone :</label>
            <input type="text" class="form-control" v-model="post.phone">
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
        let uri = `api/vendor/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
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