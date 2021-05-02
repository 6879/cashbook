<template>
   <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Price Setup</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-8 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="productPriceSetup()">
              <div class="form-group">
                 <label>Select Category </label>
                  <select v-model="form.categoryId" name="categoryId" @change.prevent="categoryIdCatch()" class="form-control" :class="{ 'is-invalid': form.errors.has('categoryId') }">
                      <option value="">Select One</option>
                      <option v-for="categoryListShow in categoryListShows" :value="categoryListShow.categoryId"> {{ categoryListShow.categoryName }}</option>
                  </select>
                  <has-error :form="form" field="categoryId"></has-error>
              </div>
              <div class="form-group">
                <label>Select Product </label>
                 <select v-model="form.productNameId" name="productNameId" @change.prevent="productIdCatch()" class="form-control" :class="{ 'is-invalid': form.errors.has('productNameId') }">
                     <option value="">Select One</option>
                     <option v-for="productListShow in productListShows" :value="productListShow.productNameId" v-if="productListShow.product_name"> {{ productListShow.product_name.productName}} ({{ productListShow.product_name.productCode }})</option>
                 </select>
                 <has-error :form="form" field="productNameId"></has-error>
              </div>
              <div class="form-group">
                <label>Select Brand </label>
                 <select v-model="form.productBrandId" name="productBrandId" class="form-control" :class="{ 'is-invalid': form.errors.has('productBrandId') }">
                     <option value="">Select One</option>
                     <option v-for="shopProductBrandList in shopProductBrandLists" :value="shopProductBrandList.productBrandEntryId" > {{ shopProductBrandList.productBrandName }}</option>
                 </select>
                 <has-error :form="form" field="productBrandId"></has-error>
              </div>
              <div class="form-group">
                  <label>Batch No</label>
                  <input  type="text" v-model="form.batchNo"  name="batchNo" :class="{ 'is-invalid': form.errors.has('batchNo') }" placeholder="Enter Batch No" class="form-control">
                  <has-error :form="form" field="batchNo"></has-error>
              </div>
              <div class="form-group">
                <label>Model No</label>
                <input  type="text" v-model="form.modelNo"  name="modelNoId" :class="{ 'is-invalid': form.errors.has('modelNo') }" placeholder="Enter Model No" class="form-control">
                <has-error :form="form" field="modelNo"></has-error>
              </div>
              <div class="form-group">
                  <label>MFG Date</label>
                  <input  type="date" v-model="form.mfgDate"  name="mfgDate" :class="{ 'is-invalid': form.errors.has('mfgDate') }"  placeholder="Enter MFG Date" class="form-control">
                  <has-error :form="form" field="mfgDate"></has-error>
              </div>
              <div class="form-group">
                  <label>EXP Date</label>
                   <input  type="date" v-model="form.expDate"  name="expDate" :class="{ 'is-invalid': form.errors.has('expDate') }"  placeholder="Enter EXP Date" class="form-control">
                  <has-error :form="form" field="expDate"></has-error>
              </div>
              <div class="form-group" v-if="unitePriceShow">
                <label>Unite Price</label>
                <input disabled type="text" v-model="form.unitePrice"  name="unitePrice"  class="form-control">
                <has-error :form="form" field="unitePrice"></has-error>
              </div>
              <div class="form-group">
                <label>MRP</label>
                <input  type="text" :disabled="mrpShow ?  disabled : '' " v-model="form.mrp" @keyup.prevent="mrpShowKey()" name="mrp" :class="{ 'is-invalid': form.errors.has('mrp') }" placeholder="Enter MRP" class="form-control">
                <has-error :form="form" field="mrp"></has-error>
              </div>
              <div class="form-group" >
                <label>Sales Price</label>
                <input  type="text" :disabled="salesPriceShow ?  disabled : '' " v-model="form.salesPrice" @keyup.prevent="salesPriceShowKey()" name="salesPrice" :class="{ 'is-invalid': form.errors.has('salesPrice') }" placeholder="Enter Sales Price" class="form-control">
                <has-error :form="form" field="salesPrice"></has-error>
              </div>
              <div class="form-group" >
                <label>Hole Sales Price</label>
                <input  type="text" :disabled="holeSalesPriceShow ?  disabled : '' " v-model="form.holeSalesPrice" @keyup.prevent="holeSalesPriceShowKey()" name="holeSalesPrice" :class="{ 'is-invalid': form.errors.has('holeSalesPrice') }" placeholder="Enter Hole Sales Price" class="form-control">
                <has-error :form="form" field="holeSalesPrice"></has-error>
              </div>
              <div class="form-group" >
                <label>Relative Price</label>
                <input  type="text" :disabled="relativePriceShow ?  disabled : '' " v-model="form.relativePrice" @keyup.prevent="relativePriceShowKey()" name="relativePrice" :class="{ 'is-invalid': form.errors.has('relativePrice') }" placeholder="Enter Relative Price" class="form-control">
                <has-error :form="form" field="relativePrice"></has-error>
              </div>
              <div class="form-group">
                  <label>Warranty</label>
                  <input  type="text" v-model="form.warranty"  name="metaKey" :class="{ 'is-invalid': form.errors.has('warranty') }" placeholder="Enter Warranty" class="form-control">
                  <has-error :form="form" field="warranty"></has-error>
              </div>
              <div class="form-group">
                  <label>Guranty</label>
                  <input  type="text" v-model="form.guranty"  name="guranty" :class="{ 'is-invalid': form.errors.has('guranty') }" placeholder="Enter Guranty" class="form-control">
                  <has-error :form="form" field="guranty"></has-error>
              </div>
              <div class="form-group">
                  <label>Notification</label>
                  <input  type="text" v-model="form.notification"  name="notification" :class="{ 'is-invalid': form.errors.has('notification') }" placeholder="Enter Notification" class="form-control">
                  <has-error :form="form" field="notification"></has-error>
              </div>
              <div class="form-group">
                  <label>Condition</label>
                  <ckeditor v-model="form.condition"  name="condition" :class="{ 'is-invalid': form.errors.has('condition') }" placeholder="Enter Condition"  :editor="editor"  :config="editorConfig"></ckeditor>
                  <has-error :form="form" field="condition"></has-error>
              </div>
              <div class="form-group">
                  <label>Advantage</label>
                  <ckeditor v-model="form.advantage"  name="advantage" :class="{ 'is-invalid': form.errors.has('advantage') }" placeholder="Enter Advantage"  :editor="editor"  :config="editorConfig"></ckeditor>
                  <has-error :form="form" field="advantage"></has-error>
              </div>
              <div class="form-group">
                  <label>Detail</label>
                  <ckeditor v-model="form.detail"  name="detail" :class="{ 'is-invalid': form.errors.has('detail') }" placeholder="Enter Detail"  :editor="editor"  :config="editorConfig"></ckeditor>
                  <has-error :form="form" field="detail"></has-error>
              </div>
              <div class="form-group">
                  <label>Use System</label>
                  <ckeditor v-model="form.useSystem"  name="useSystem" :class="{ 'is-invalid': form.errors.has('useSystem') }" placeholder="Enter Use System"  :editor="editor"  :config="editorConfig"></ckeditor>
                  <has-error :form="form" field="useSystem"></has-error>
              </div>
             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

  <div class="card main-card  element-block-example mt-5">
    <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Price  Setup List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Category Name</th>
               <th>Product Name</th>
               <th>Brand Name</th>
               <th>BatchNo</th>
               <th>Model No</th>
               <th>Mfg Date</th>
               <th>ExpDate</th>
               <th>MRP</th>
               <th>Sales Price</th>
               <th>HoleSales Price</th>
               <th>Relative Price</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productPriceSetupListShow, index) in productPriceSetupListShows.data">
                <td>{{ index+1 }}</td>
                <td v-if="productPriceSetupListShow.category_name">{{ productPriceSetupListShow.category_name.categoryName }}</td>
                <td v-if="productPriceSetupListShow.product_name">{{ productPriceSetupListShow.product_name.productName }}</td>
                <td v-if="productPriceSetupListShow.product_brand_name">{{ productPriceSetupListShow.product_brand_name.productBrandName }}</td>
                <td>{{ productPriceSetupListShow.batchNo }}</td>
                <td>{{ productPriceSetupListShow.modelNo }}</td>
                <td>{{ productPriceSetupListShow.mfgDate }}</td>
                <td>{{ productPriceSetupListShow.expDate }}</td>
                <td>{{ productPriceSetupListShow.mrp }}</td>
                <td>{{ productPriceSetupListShow.salesPrice }}</td>
                <td>{{ productPriceSetupListShow.holeSalesPrice }}</td>
                <td>{{ productPriceSetupListShow.relativePrice }}</td>
                <td>
                   <!-- <router-link :to="`/shopproductpricesetup@edit${productPriceSetupListShow.productPriceSetupid}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link> -->
                   <button type="button" @click="destroy(productPriceSetupListShow.productPriceSetupid)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="productPriceSetupListShows" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        data(){
            return{
                form: new Form({
                  categoryId : '',
                  productNameId : '',
                  productBrandId : '',
                  batchNo : '',
                  mfgDate : '',
                  expDate : '',
                  modelNo : '',
                  warranty : '',
                  guranty : '',
                  notification : '',
                  unitePrice : '',
                  mrp : '',
                  salesPrice : '',
                  holeSalesPrice : '',
                  relativePrice : '',
                  condition : '',
                  advantage : '',
                  detail : '',
                  useSystem : '',
                }),
                categoryListShows : {},
                productListShows : {},
                shopProductBrandLists : {},
                productPriceSetupListShows : {},
                // editor Data
                editor: ClassicEditor,
                editorConfig: {

                },
                unitePriceShow: false,
                mrpShow : true,
                salesPriceShow : true,
                holeSalesPriceShow : true,
                relativePriceShow : true,
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
           this.categoryLists();
           this.productPriceSetupList();
           this.getPaginateList();
        },
        methods:{
          productPriceSetup(){
            this.form.post('/productPriceSetup').then(res =>{
              if (res.data.productAdd) {
                  Toast.fire({
                    icon: 'error',
                    title: 'The product price setup has already been taken'
                  })
              }
              else{
                  Toast.fire({
                    icon: 'success',
                    title: 'Product Price Setup Successfully'
                  })
                  this.productPriceSetupList();
                  this.form.reset();
                  this.unitePriceShow = false;
              }
            })
          },
          productPriceSetupList(){
            axios.get('/productPriceSetup').then(res =>{
                this.productPriceSetupListShows =  res.data.productPriceSetupList
            })
          },
          getPaginateList(page = 1){
            axios.get('/productPriceSetup?page=' + page)
            .then(response => {
              this.productPriceSetupListShows = response.data.productPriceSetupList;
            });
          },
          categoryLists(){
            axios.get('/productCategoryLists').then( res=>{
               this.categoryListShows = res.data.categoryLists;
               this.shopProductBrandLists = res.data.shopProductBrandList;
            })
          },
          categoryIdCatch(){
            axios.get('/productCategoryIdCatch/'+this.form.categoryId).then( res=>{
               this.productListShows = res.data.categoryWishProductList;
            })
          },
          productIdCatch(){
            axios.get('/productNameIdCatch/'+this.form.productNameId).then( res=>{
               if (res.data.productEntryUnitPrice != 0) {
                   this.form.unitePrice = res.data.productEntryUnitPrice;
                   this.unitePriceShow = true;
               }
               else {
                  this.unitePriceShow = false;
               }
            })
          },
          mrpShowKey(){
              if (parseFloat(this.form.unitePrice) <= parseFloat(this.form.mrp)) {
                    this.salesPriceShow  = true;
                    this.holeSalesPriceShow  = true;
                    this.relativePriceShow  = true;
              }
              else{
                  if (this.form.mrp == "") {
                    this.salesPriceShow  = true;
                    this.holeSalesPriceShow  = true;
                    this.relativePriceShow  = true;
                  }
                  else{
                    this.salesPriceShow  = false;
                    this.holeSalesPriceShow  = false;
                    this.relativePriceShow  = false;
                  }
              }
          },
          salesPriceShowKey(){
            if (parseFloat(this.form.unitePrice) <= parseFloat(this.form.salesPrice)) {
                  this.mrpShow  = true;
                  this.holeSalesPriceShow  = true;
                  this.relativePriceShow  = true;
            }
            else{
                if (this.form.salesPrice == "") {
                  this.mrpShow  = true;
                  this.holeSalesPriceShow  = true;
                  this.relativePriceShow  = true;
                }
                else{
                  this.mrpShow  = false;
                  this.holeSalesPriceShow  = false;
                  this.relativePriceShow  = false;
                }
            }
          },
          holeSalesPriceShowKey(){
            if (parseFloat(this.form.unitePrice) <= parseFloat(this.form.holeSalesPrice)) {
                  this.mrpShow  = true;
                  this.salesPriceShow  = true;
                  this.relativePriceShow  = true;
            }
            else{
                if (this.form.holeSalesPrice == "") {
                  this.mrpShow  = true;
                  this.salesPriceShow  = true;
                  this.relativePriceShow  = true;
                }
                else{
                  this.mrpShow  = false;
                  this.salesPriceShow  = false;
                  this.relativePriceShow  = false;
                }
            }
          },
          relativePriceShowKey(){
            if (parseFloat(this.form.unitePrice) <= parseFloat(this.form.relativePrice)) {
                  this.mrpShow  = true;
                  this.salesPriceShow  = true;
                  this.holeSalesPriceShow  = true;
            }
            else{
                if (this.form.relativePrice == "") {
                  this.mrpShow  = true;
                  this.salesPriceShow  = true;
                  this.holeSalesPriceShow  = true;
                }
                else{
                  this.mrpShow  = false;
                  this.salesPriceShow  = false;
                  this.holeSalesPriceShow  = false;
                }
            }
          },
          destroy(productPriceSetupid){
            axios.delete('/productPriceSetup/'+productPriceSetupid).then( res=>{
                Toast.fire({
                  icon: 'success',
                  title: 'Product Price Setup Item Delete Successfully'
                })
                this.productPriceSetupList();
            })
          },
        },
    }
</script>
