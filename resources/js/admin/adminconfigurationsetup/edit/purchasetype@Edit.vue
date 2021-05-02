<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Purchase Type</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="purchaseTypeUpdate()">
              <div class="form-group">
                  <label>Purchase Type Name</label>
                  <input  type="text" v-model="form.purchaseTypeName"  name="purchaseTypeName" :class="{ 'is-invalid': form.errors.has('purchaseTypeName') }" placeholder="Purchase Type Name" class="form-control">
                  <has-error :form="form" field="purchaseTypeName"></has-error>
              </div>

              <div class="form-group">
                 <label>Purchase Type Status</label>
                 <select v-model="form.purchaseTypeStatus" name="purchaseTypeStatus" :class="{ 'is-invalid': form.errors.has('purchaseTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="purchaseTypeStatus"></has-error>
              </div>

             <div class="text-right pt-3">
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
                    purchaseTypeName: '',
                    purchaseTypeStatus: '',
                }),
                adminPurchaseTypes:{},
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
             getData() {
                axios.get('/adminPurchaseType/'+this.$route.params.purchaseTypeId + '/edit').then(res => {
                      this.form.fill(res.data.editPurchaseType)
                  })
              },
              purchaseTypeUpdate() {
                  this.form.put('/adminPurchaseType/'+this.$route.params.purchaseTypeId).then(res => {
                      if (res.data.changePurchaseType){
                          Toast.fire({
                              icon: 'error',
                              title: 'Please Change Your Purchase Type Name'
                          })
                      }
                      else {
                          Toast.fire({
                              icon: 'success',
                              title: 'Purchase Type Updated Successfully'
                          })
                          this.$router.push('/purchasetype@entry')
                      }
                  })
              },
            }
       }
</script>
