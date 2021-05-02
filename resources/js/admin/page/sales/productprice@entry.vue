<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Sales Product Price Entry</h3>
         </div>
         <form @submit.prevent="productPriceEntry()">
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
                        <input type="text" disabled v-model="form.unitPrice" name="unitPrice"  class="form-control" placeholder="Purchase Unit Price">
                        <has-error :form="form" field="unitPrice"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">MRP Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.mrpPrice" @keyup.prevent="inputValueCheck()" name="mrpPrice"  class="form-control" placeholder="MRP Price">
                        <has-error :form="form" field="mrpPrice"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Sales Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.salesPrice" @keyup.prevent="inputValueCheck()" name="salesPrice"  class="form-control" placeholder="Sales Price">
                        <has-error :form="form" field="salesPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Wholesale Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.wholesalePrice" @keyup.prevent="inputValueCheck()" name="wholesalePrice"  class="form-control" placeholder="Whole sale Price">
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Special Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.specialPrice" @keyup.prevent="inputValueCheck()" name="specialPrice"  class="form-control" placeholder="Special Price">
                        <has-error :form="form" field="specialPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">E-Commerce Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.eCommercePrice" @keyup.prevent="inputValueCheck()" name="eCommercePrice"  class="form-control" placeholder="E-Commerce Price">
                        <has-error :form="form" field="eCommercePrice"></has-error>
                      </div>
                  </div>
                  <input type="hidden"  v-model="form.inputValueCheck" name="inputCheck"  class="form-control" >

                  <div class="col-11 text-right pr-0 pt-3">
                    <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                  </div>
             </div>
           </div>
       </form>
     </div>

     <div class="card mt-5">
         <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h3 style="color:black">Sales Product Price List</h3>
         </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered table-striped">
             <thead>
                <tr>
                  <th>SN</th>
                  <th>Product Name</th>
                  <th>MRP Price</th>
                  <th>Sales Price</th>
                  <th>Wholesale Price</th>
                  <th>Special Price</th>
                  <th>E-Commerce Price</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
                 <tr v-for="(salesProductPriceList, index) in salesProductPriceLists.data">
                   <td>{{ index+1 }}</td>
                   <td>{{ salesProductPriceList.product_name.productName }} ({{ salesProductPriceList.product_name.productCode }})</td>
                   <td>{{ salesProductPriceList.mrpPrice }}</td>
                   <td>{{ salesProductPriceList.salesPrice }}</td>
                   <td>{{ salesProductPriceList.wholesalePrice }}</td>
                   <td>{{ salesProductPriceList.specialPrice }}</td>
                   <td>{{ salesProductPriceList.eCommercePrice }}</td>
                   <td>{{ salesProductPriceList.created_at }}</td>
                   <td>
                     <router-link :to="`/productprice@entryEdit${salesProductPriceList.salesProductPriceEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                   </td>
              </tr>
             </tbody>
          </table>
        </div>
        <span class="card_footer">
          <pagination :data="salesProductPriceLists" :limit="limit"  @pagination-change-page="getPaginateList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
          </pagination>
       </span>
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

                    inputValueCheck:'',
                }),

                purchaseProductLists:{},
                salesProductPriceLists:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
            this.getPaginateList()
            this.salesProductNameList()
            this.salesProductPriceList()
        },
        methods: {
            salesProductNameList() {
                axios.get('/salesProductNameShow').then(res => {
                     this.purchaseProductLists = res.data.purchaseProductLists
                })
            },
            inputValueCheck(){
               this.form.inputValueCheck = 1;
            },
            productIdCatch() {
                axios.get('/productUnitePrice/'+this.form.purchaseProductId).then(res => {
                     this.form.unitPrice = res.data.productUnitePrice.unitPrice
                     this.form.productNameId = res.data.productUnitePrice.product_name.productName
                     this.form.productId = res.data.productUnitePrice.productId
                })
            },
            productPriceEntry() {
                if (this.form.inputValueCheck == 1) {
                    this.form.post('/salesProductPriceEntry').then(res => {
                      if (res.data.alReadyEntry) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Already Sales Product Price Entry'
                        })
                      }
                      else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Sales Product Price Entry'
                        })
                        this.form.reset()
                        this.salesProductPriceList();
                      }
                    });
                }
                else{
                    Toast.fire({
                      icon: 'error',
                      title: 'Enter Your Product Price'
                    })
                }
            },
            salesProductPriceList() {
                axios.get('/salesProductPriceEntry').then(res => {
                      this.salesProductPriceLists = res.data.salesProductPriceLists
                })
            },
            getPaginateList(page = 1){
              axios.get('/salesProductPriceEntry?page=' + page)
              .then(response => {
                   this.salesProductPriceLists = response.data.salesProductPriceLists;
              });
           },
        }
    }
</script>
