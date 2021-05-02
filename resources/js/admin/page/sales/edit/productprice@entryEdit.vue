<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Sales Product Price Update</h3>
         </div>
         <form @submit.prevent="productPriceUpdate()">
            <div class="supplier-entry py-4 px-2">
               <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
                     <div class="form-group">
                         <label>Product Name/Code</label>
                         <select  v-model="form.purchaseProductId"  name="purchaseProductId" class="form-control" @change.prevent="productIdCatch()">
                            <option value="">Select One</option>
                            <option v-for="purchaseProductList in purchaseProductLists" :value="purchaseProductList.purchaseProductId">{{ purchaseProductList.product_name.productName }} ({{ purchaseProductList.product_name.productCode }})</option>
                         </select>
                         <has-error :form="form" field="purchaseProductId"></has-error>
                     </div>
                </div>
            </div>
           <div class="py-4 px-2">
            <div class="offset-sm-1 col-9 pl-sm-5 supplier-border">
                  <div class="form-row">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Product Name</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text" disabled v-model="form.productNameId" name="productNameId" :class="{ 'is-invalid': form.errors.has('productNameId') }" class="form-control" placeholder="Product Name">
                        <has-error :form="form" field="productNameId"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Purchase Unit Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text" disabled v-model="form.unitPrice" name="unitPrice" :class="{ 'is-invalid': form.errors.has('unitPrice') }" class="form-control" placeholder="Purchase Unit Price">
                        <has-error :form="form" field="unitPrice"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">MRP Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.mrpPrice" name="mrpPrice" :class="{ 'is-invalid': form.errors.has('mrpPrice') }" class="form-control" placeholder="MRP Price">
                        <has-error :form="form" field="mrpPrice"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Sales Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.salesPrice" name="salesPrice" :class="{ 'is-invalid': form.errors.has('salesPrice') }" class="form-control" placeholder="Sales Price">
                        <has-error :form="form" field="salesPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Wholesale Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.wholesalePrice" name="wholesalePrice" :class="{ 'is-invalid': form.errors.has('wholesalePrice') }" class="form-control" placeholder="Whole sale Price">
                        <has-error :form="form" field="wholesalePrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Special Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.specialPrice" name="specialPrice" :class="{ 'is-invalid': form.errors.has('specialPrice') }" class="form-control" placeholder="Special Price">
                        <has-error :form="form" field="specialPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">E-Commerce Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.eCommercePrice" name="eCommercePrice" :class="{ 'is-invalid': form.errors.has('eCommercePrice') }" class="form-control" placeholder="E-Commerce Price">
                        <has-error :form="form" field="eCommercePrice"></has-error>
                      </div>
                  </div>

                  <div class="col-11 text-right pr-0 pt-3">
                    <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Update</button>
                  </div>
             </div>
           </div>
       </form>
     </div>

  </span>

</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    purchaseProductId:'',
                    productNameId:'',
                    productId:'',
                    unitPrice:'',
                    mrpPrice:'',
                    salesPrice:'',
                    wholesalePrice: '',
                    specialPrice:'',
                    eCommercePrice:'',
                }),
                purchaseProductLists:{},
            }
        },

        mounted() {
            this.salesProductNameList()
            this.salesProductPriceInfo()
        },

        methods: {
            salesProductNameList() {
                axios.get('/salesProductNameShow').then(res => {
                     this.purchaseProductLists = res.data.purchaseProductLists
                })
            },
            salesProductPriceInfo() {
                axios.get('/salesProductPriceEntry/'+this.$route.params.salesProductPriceEntryId+'/edit').then(res => {
                    this.form.fill(res.data);
                    this.productIdCatch()
                })
            },
            productIdCatch() {
                axios.get('/productUnitePrice/'+this.form.purchaseProductId).then(res => {
                     this.form.unitPrice = res.data.productUnitePrice.unitPrice
                     this.form.productNameId = res.data.productUnitePrice.product_name.productName
                     this.form.productId = res.data.productUnitePrice.productId

                })
            },
            productPriceUpdate() {
                this.form.put('/salesProductPriceEntry/'+this.$route.params.salesProductPriceEntryId).then(res => {
                    if (res.data.alReadyEntry) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Already Sales Product Price Entry'
                        })
                    }
                    else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Sales Product Price Update SuccessFully'
                        })
                        this.$router.push('/productprice@entry')
                    }
                });
            },
        }
    }
</script>
