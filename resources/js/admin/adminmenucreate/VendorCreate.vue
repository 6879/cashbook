<template>
  <div>
    <h1> New Vendor </h1>
    <form @submit.prevent="addVendor">
      <div class="row">
        <div class="col-md-6">

            
          <div class="form-group">
            <label> Name :</label>
            <input type="text" class="form-control" v-model="vendor.name">
          </div>


          <div class="form-group">
            <label> Email :</label>
            <input type="text" class="form-control" v-model="vendor.email">
          </div>


          <div class="form-group">
            <label> Phone :</label>
            <input type="text" class="form-control" v-model="vendor.phone">
          </div>

          <div class="form-group">
            <label> Image :</label>
            <input type="file" class="form-control">
          </div>


        </div>
        </div>
         <br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          vendor:{}
        }
    },
    methods: {
      addVendor(){
    let uri = 'api/vendor/create';
    axios.post(uri, this.vendor).then((response) => {
       this.$router.push('vendor');
    });
},

    }
  }
</script>