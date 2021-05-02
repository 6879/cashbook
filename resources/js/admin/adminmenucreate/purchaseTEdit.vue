<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Edit Purchase Type </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
         <form @submit.prevent="updatePurchaseType()">
              
              
              <div class="form-group">
                 <label> Purchase Type :</label>

            <input type="text"
             v-model="post.purchaseType" 
             name="purchaseType"
             placeholder="Purchase Type"
             class="form-control" 
             :class="{ 'is-invalid': form.errors.has('purchaseType') }">
                  <!-- <small v-if="exit==true" class="text-danger"> this is already exist. </small> -->
                 <has-error :form="form" field="purchaseType"></has-error>
              </div>
              
              
              
              <!-- <div class="form-group">
                 <label> Image :</label>

                 <div class="col-md-3" v-if="image">
                              <img :src="image" class="img-responsive" height="70" >
                           </div>

            <input type="file"
             v-on:change="onImageChange" 
             name="pImage"
             placeholder="image"
             class="form-control" 
             :class="{ 'is-invalid': form.errors.has('pImage') }">
                   <small v-if="exit==true" class="text-danger"> this is already exist. </small>  
                  <has-error :form="form" field="pImage"></has-error>
              </div> --> 
              
              
              <div class="form-group">
                  <label> Status :</label>
            <select
            v-model="post.status"
             class="form-control" 
             :class="{ 'is-invalid': form.errors.has('status') }">
                <option value=""> Select Status </option>
                <option value="0"> Active </option>
                <option value="1"> Inactive </option>
                </select>
                <has-error :form="form" field="status"></has-error>
              </div>


              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary"> Update </button>
              </div>
          </form>
        </div>
      </div>
    </div>

  
  </span>
</template>

<script>
    export default {

      data() {
        return {
            form: new Form({
                  purchaseType: '',
                  status: '',
                }),
          post: {}
        }
      },
      created() {
        let uri = `api/purchase/edit/${this.$route.params.id}`;
        axios.get(uri).then((response) => {
            this.post = response.data;
        });
      },
      methods: {
        updatePurchaseType() {
          let uri = `api/purchase/update/${this.$route.params.id}`;
          axios.post(uri, this.post).then((response) => {

                                  Toast.fire({
                        icon: 'success',
                        title: 'Update Successfull'
                    }),

            this.$router.push('purchaseTypeNew');
          });
        }
      }
    }
</script>