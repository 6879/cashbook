<template>
    <span>
      <div class="card">
            <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                 <h3 style="color:black">Update Brand Entry</h3>
            </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="brandEntryUpdate()">
               <div class="form-group">
                 <label>Brand Name</label>
                 <input type="text" v-model="form.brandName" name="brandName" placeholder="Brand Name" class="form-control">
               </div>

                <div class="form-group">
                    <label>Product Brand Status</label>
                    <select class="form_control" v-model="form.brandStatus" name="brandStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                    </select>
                </div>

              <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button  class="btn-pill btn-hover-shine btn btn-primary">Update</button>
              </div>
          </form>

        </div>
      </div>
    </div>

 </span>

</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    brandName:'',
                    brandStatus:'',
                }),
            }
        },
        mounted() {
            this.getData();
        },
        methods:{
            getData(){
                axios.get('/purchaseBrandEntry/'+this.$route.params.brandId+'/edit')
                    .then( res => {
                        this.form.fill(res.data.data)
                    })
            },
            brandEntryUpdate(){
                this.form.put('/purchaseBrandEntry/'+this.$route.params.brandId)
                    .then(res=>{
                        if (res.data.changedBrandName) {
                            Toast.fire({
                                icon: 'error',
                                title: 'Changed Your Brand Name'
                            })
                        }
                        else{
                            Toast.fire({
                                icon: 'success',
                                title: 'Brand Information Updated successfully'
                            })
                            this.$router.push('/brand@entry')
                        }
                    })
            }


        }
    }
</script>

<style scoped>

</style>
