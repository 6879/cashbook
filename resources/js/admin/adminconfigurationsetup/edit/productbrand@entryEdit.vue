<template>
    <span>
      <div class="card">
            <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                 <h3 style="color:black">Update Product Brand Entry</h3>
            </div>
            <div class="supplier-entry py-4 px-2">
                <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
                    <form @submit.prevent="productBrandUpdate()">
               <div class="form-group">
                 <label>Product Brand Name</label>
                 <input type="text" v-model="form.productBrandName" name="productBrandName" placeholder="Brand Name"
                        class="form-control" :class="{ 'is-invalid': form.errors.has('productBrandName') }">
                   <has-error :form="form" field="productBrandName"></has-error>
               </div>

              <div class="form-group">
                 <label>Product Brand Status</label>
                 <select v-model="form.productBrandStatus" name="productBrandStatus"
                         :class="{ 'is-invalid': form.errors.has('productBrandStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="productBrandStatus"></has-error>
              </div>
              <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
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
                    productBrandName: '',
                    productBrandStatus: '',
                }),
                showDataentry: [],
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
              axios.get('/productBrandEntry/'+this.$route.params.productBrandEntryId + '/edit').then(res => {
                    this.form.fill(res.data.editProductBrandType)
                })
            },
            productBrandUpdate() {
                this.form.put('/productBrandEntry/'+this.$route.params.productBrandEntryId).then(res => {
                    if (res.data.changeProductBrandName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Your Product Brand Name'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Product Brand Updated successfully'
                        })
                        this.$router.push('/productbrand@entry')
                    }
                })
            },
        }
    }
</script>

<style scoped>

</style>
