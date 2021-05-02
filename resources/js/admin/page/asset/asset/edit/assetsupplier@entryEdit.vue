<template id="">
  <span>
   <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Asset Supplier</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="addAssetSupplierUpdate()">

              <div class="form-group">
                  <label> Asset Supplier Name</label>
                  <input v-model="form.assetSupplierName" type="text" name="assetSupplierName" :class="{ 'is-invalid': form.errors.has('assetSupplierName') }" placeholder="Asset Supplier Name" class="form-control">
                  <has-error :form="form" field="assetSupplierName"></has-error>
              </div>

               <div class="form-group">
                  <label> Asset Supplier Code</label>
                  <input disabled v-model="form.assetSupplierCode" type="text" name="assetSupplierCode" :class="{ 'is-invalid': form.errors.has('assetSupplierCode') }" placeholder="Asset Supplier Code" class="form-control">
                  <has-error :form="form" field="assetSupplierCode"></has-error>
              </div>

               <div class="form-group">
                  <label> Asset Supplier Phone Number</label>
                  <input v-model="form.assetSupplierPhone" type="text" name="assetSupplierPhone" :class="{ 'is-invalid': form.errors.has('assetSupplierPhone') }" placeholder="Asset Supplier Phone" class="form-control">
                  <has-error :form="form" field="assetSupplierPhone"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Hot Line</label>
                  <input v-model="form.assetSupplierHotLine" type="text" name="assetSupplierHotLine" :class="{ 'is-invalid': form.errors.has('assetSupplierHotLine') }" placeholder="Asset Supplier Hot Line" class="form-control">
                  <has-error :form="form" field="assetSupplierHotLine"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Mail</label>
                  <input v-model="form.assetSupplierMail" type="text" name="assetSupplierMail" :class="{ 'is-invalid': form.errors.has('assetSupplierMail') }" placeholder="Asset Supplier Mail..." class="form-control">
                  <has-error :form="form" field="assetSupplierMail"></has-error>
              </div>

                <div class="form-group">
                  <label> Asset Supplier Facebook</label>
                  <input v-model="form.assetSupplierFb" type="text" name="assetSupplierFb" :class="{ 'is-invalid': form.errors.has('assetSupplierFb') }" placeholder="Asset Supplier Facebook..." class="form-control">
                  <has-error :form="form" field="assetSupplierFb"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Web</label>
                  <input v-model="form.assetSupplierWeb" type="text" name="assetSupplierWeb" :class="{ 'is-invalid': form.errors.has('assetSupplierWeb') }" placeholder="Asset Supplier Web..." class="form-control">
                  <has-error :form="form" field="assetSupplierWeb"></has-error>
              </div>


                 <div class="form-group">
                  <label> Asset Supplier IMO</label>
                  <input v-model="form.assetSupplierImo" type="text" name="assetSupplierImo" :class="{ 'is-invalid': form.errors.has('assetSupplierImo') }" placeholder="Asset Supplier IMO..." class="form-control">
                  <has-error :form="form" field="assetSupplierImo"></has-error>
              </div>

              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.assetSupplierAddress" type="text" name="assetSupplierAddress"  :class="{ 'is-invalid': form.errors.has('assetSupplierAddress') }" placeholder="Asset Supplier Address" class="form-control"></textarea>
                  <has-error :form="form" field="assetSupplierAddress"></has-error>
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
                    assetSupplierName : '',
                    assetSupplierCode: '',
                    assetSupplierPhone: '',
                    assetSupplierHotLine: '',
                    assetSupplierMail: '',
                    assetSupplierWeb: '',
                    assetSupplierFb: '',
                    assetSupplierImo: '',
                    assetSupplierAddress: '',
                }),
                assetSupplierAllDatas: [],
            }
        },
        mounted(){
            this.getData();
        },


        methods:{
            getData(){
                axios.get('/addAssetSupplier/'+this.$route.params.assetSupplierId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                    })
            },

            addAssetSupplierUpdate(){
                this.form.put('/addAssetSupplier/'+this.$route.params.assetSupplierId)
                    .then(res=>{
                      if (res.data.samePhone) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Change Your Phone Number'
                        })
                      }
                    else if (res.data.sameMail) {
                          Toast.fire({
                              icon: 'error',
                              title: 'Change Your Mail'
                          })
                      }
                    else {
                      Toast.fire({
                          icon: 'success',
                          title: 'Asset  Update Successfully'
                      })
                      this.$router.push('/assetsupplier@entry')
                    }
                })
            }
        }
    }

</script>
