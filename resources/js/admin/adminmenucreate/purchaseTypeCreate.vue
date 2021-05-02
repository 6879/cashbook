<template lang="">
    <div>
        <h1> Purchase Type Information  </h1>
         <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link to="/purchaseTypeNew" class="btn btn-primary"> Create Purchase Type </router-link>
          </div>
        </div><br />


        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th> Purchase Type </th>
                <th> Status </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(get,index) in gets" :key="get.id">
                    <td>{{ ++index }}</td>
                    <td>{{ get.purchaseType }}</td>
                    <td>{{ get.status }}</td>
                    <td>
                      <router-link :to="`/admintype@Edit${get.id}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                      </td>
                    <td><button class="btn btn-danger" @click.prevent="deletePost(get.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>



    </div>
</template>
<script>
  export default {
      data() {
        return {
          gets: []
        }
      },
      mounted() {
   this.view();
    },


    methods: {
       view() {
         
         let url = 'api/purchaseType';
      fetch(url).
      then((response) => response.json())
      .then(response => {
        this.gets = response.data;
      });},



       deletePost(id)
      {
        let uri = `api/purchase/delete/${id}`;
        axios.get(uri).then(response => {
          this.view();
        });
      }
    }
  }
</script>