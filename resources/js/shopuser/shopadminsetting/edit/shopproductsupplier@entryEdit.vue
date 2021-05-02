<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Product Supplier</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="addProductSupplierUpdate()">

              <div class="form-group">
                  <label> Product Supplier Name</label>
                  <input v-model="form.productSupplierName" type="text" name="productSupplierName" :class="{ 'is-invalid': form.errors.has('productSupplierName') }" placeholder="Product Supplier Name" class="form-control">
                  <has-error :form="form" field="productSupplierName"></has-error>
              </div>

               <div class="form-group">
                  <label> Product Supplier Code</label>
                  <input disabled v-model="form.productSupplierCode" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('productSupplierCode') }" placeholder="Product Supplier Code" class="form-control">
                  <has-error :form="form" field="productSupplierCode"></has-error>
              </div>

               <div class="form-group">
                  <label> Product Supplier Phone Number</label>
                  <input v-model="form.productSupplierPhone" type="text" name="productSupplierPhone" :class="{ 'is-invalid': form.errors.has('productSupplierPhone') }" placeholder="Product Supplier Phone" class="form-control">
                  <has-error :form="form" field="productSupplierPhone"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Hot Line</label>
                  <input v-model="form.productSupplierHotLine" type="text" name="productSupplierHotLine" :class="{ 'is-invalid': form.errors.has('productSupplierHotLine') }" placeholder="Product Supplier Hot Line" class="form-control">
                  <has-error :form="form" field="productSupplierHotLine"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Mail</label>
                  <input v-model="form.productSupplierMail" type="text" name="productSupplierMail" :class="{ 'is-invalid': form.errors.has('productSupplierMail') }" placeholder="Product Supplier Mail..." class="form-control">
                  <has-error :form="form" field="productSupplierMail"></has-error>
              </div>

                <div class="form-group">
                  <label> Product Supplier Facebook</label>
                  <input v-model="form.productSupplierFb" type="text" name="productSupplierFb" :class="{ 'is-invalid': form.errors.has('productSupplierFb') }" placeholder="Product Supplier Facebook..." class="form-control">
                  <has-error :form="form" field="productSupplierFb"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Web</label>
                  <input v-model="form.productSupplierWeb" type="text" name="productSupplierWeb" :class="{ 'is-invalid': form.errors.has('productSupplierWeb') }" placeholder="Product Supplier Web..." class="form-control">
                  <has-error :form="form" field="productSupplierWeb"></has-error>
              </div>


               <div class="form-group">
                  <label> Product Supplier Imo</label>
                  <input v-model="form.productSupplierImo" type="text" name="productSupplierImo" :class="{ 'is-invalid': form.errors.has('productSupplierImo') }" placeholder="Product Supplier Imo..." class="form-control">
                  <has-error :form="form" field="productSupplierImo"></has-error>
              </div>

              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.productSupplierAddress" type="text" name="productSupplierAddress"  :class="{ 'is-invalid': form.errors.has('productSupplierAddress') }" placeholder="Product Supplier Address" class="form-control"></textarea>
                  <has-error :form="form" field="productSupplierAddress"></has-error>
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
        data () {
            return {
                form: new Form({
                    productSupplierName : '',
                    productSupplierCode: '',
                    productSupplierPhone: '',
                    productSupplierHotLine: '',
                    productSupplierMail: '',
                    productSupplierWeb: '',
                    productSupplierFb: '',
                    productSupplierImo: '',
                    productSupplierAddress: '',
                }),
                productSupplierAllDatas: {},
            }
        },
        mounted(){
            this.getData();
        },


        methods:{
            getData(){
                axios.get('/addProductSupplier/'+this.$route.params.productSupplierId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                    })
            },

            addProductSupplierUpdate(){
                this.form.put('/addProductSupplier/'+this.$route.params.productSupplierId).then(res=>{
                    if (res.data.sameMail) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Mail'
                        })
                    }
                    else if (res.data.samePhone) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Phone Number'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Product Supplier Information  Update Successfully'
                        })
                        this.$router.push('/shopaddproductsupplier@entry')
                    }
                })
            },

        }

    }

</script>
