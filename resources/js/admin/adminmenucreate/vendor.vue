<template lang="">
    <div>
        <h1> Vendor Information  </h1>
         <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link to="/vendorCreate" class="btn btn-primary"> Create Vendor </router-link>
          </div>
        </div><br />


        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th> Name </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(get,index) in gets" :key="get.id">
                    <td>{{ ++index }}</td>
                    <td>{{ get.name }}</td>
                    <td>{{ get.email }}</td>
                    <td>{{ get.phone }}</td>
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
         
         let url = 'api/vendors';
      fetch(url).
      then((response) => response.json())
      .then(response => {
        this.gets = response.data;
      });},



       deletePost(id)
      {
        let uri = `api/vendor/delete/${id}`;
        axios.get(uri).then(response => {
          this.view();
        });
      }
    }
  }
</script>