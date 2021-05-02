<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Name Entry</h3>
      </div>
      <div class="product-entry">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-8 col-12 offset-lg-2 brand-border" >
              <form  action="" method="post" @submit.prevent="addProductName()">
                <div class="form-row">
                    <div class="col-sm-4 col-12">
                       <label class="p-0">Category</label>
                    </div>
                    <div class="col-sm-8 col-12">
                      <select  v-model="form.category"  @change.prevent="categorySelect()" name="category" class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                          <option value="">Select One</option>
                          <option  v-for="cateorySelectList in cateorySelectLists" :value="cateorySelectList.categoryId"> {{ cateorySelectList.categoryName }} </option>
                      </select>
                      <has-error :form="form" field="category"></has-error>
                    </div>
                </div>
                <div class="form-row pt-2" v-if="subShow">
                   <div class="col-sm-4 col-12">
                      <label class="p-0">Sub Category</label>
                   </div>
                    <div class="col-sm-8 col-12">
                        <select  v-model="form.subCategory" @change.prevent="subCategorySelect()" name="subCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="subCategorySelectList in subCategorySelectLists" :value="subCategorySelectList.categoryId">{{ subCategorySelectList.categoryName }}</option>
                        </select>
                     </div>
                </div>
                <div class="form-row pt-2" v-if="thirdShow">
                    <div class="col-sm-4 col-12">
                        <label class="p-0">Third Category</label>
                     </div>
                    <div class="col-sm-8 col-12">
                      <select  v-model="form.thirdCategory" @change.prevent="thirdCategorySelect()" name="thirdCategory" class="form-control">
                        <option value="">Select One</option>
                        <option v-for="thirdCategorySelectList in thirdCategorySelectLists" :value="thirdCategorySelectList.categoryId">{{ thirdCategorySelectList.categoryName }}</option>
                      </select>
                    </div>
                </div>
                <div class="form-row pt-2" v-if="fourShow">
                   <div class="col-sm-4 col-12">
                       <label class="p-0">Four Category</label>
                    </div>
                    <div class="col-sm-8 col-12">
                      <select  v-model="form.fourCategory" @change.prevent="fourCategorySelect()" name="fourCategory" class="form-control">
                        <option value="">Select One</option>
                        <option v-for="fourCategorySelectList in fourCategorySelectLists" :value="fourCategorySelectList.categoryId">{{ fourCategorySelectList.categoryName }}</option>
                      </select>
                    </div>
                </div>
                <div class="form-row pt-2" v-if="fiveShow">
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Five Category</label>
                     </div>
                     <div class="col-sm-8 col-12">
                        <select  v-model="form.fiveCategory" @change.prevent="fiveCategorySelect()" name="fiveCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="fiveCategorySelectList in fiveCategorySelectLists" :value="fiveCategorySelectList.categoryId">{{ fiveCategorySelectList.categoryName }}</option>
                        </select>
                     </div>
                </div>
                <div class="form-row pt-2" v-if="sixShow">
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Six Category</label>
                     </div>
                     <div class="col-sm-8 col-12">
                        <select  v-model="form.sixCategory" @change.prevent="sixCategorySelect()" name="sixCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="sixCategorySelectList in sixCategorySelectLists" :value="sixCategorySelectList.categoryId">{{ sixCategorySelectList.categoryName }}</option>
                        </select>
                     </div>
                </div>
                <div class="form-row pt-2" v-if="sevenShow">
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Seven Category</label>
                     </div>
                     <div class="col-sm-8 col-12">
                        <select  v-model="form.sevenCategory" name="sevenCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="sevenCategorySelectList in sevenCategorySelectLists" :value="sevenCategorySelectList.categoryId">{{ sevenCategorySelectList.categoryName }}</option>
                        </select>
                     </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Product Name</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <input type="text"  v-model="form.productName" name="productName" :class="{ 'is-invalid': form.errors.has('productName') }" class="form-control" placeholder="Product Name">
                        <has-error :form="form" field="productName"></has-error>
                    </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Product Code</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <input type="text" disabled v-model="form.productCode" name="productCode" :class="{ 'is-invalid': form.errors.has('productCode') }" class="form-control" placeholder="Product Code">
                        <has-error :form="form" field="productCode"></has-error>
                    </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Product QR Number</label>
                  </div>
                    <div class="col-sm-8 col-12">
                        <input type="text" v-model="form.productQRNumber" name="productQRNumber" :class="{ 'is-invalid': form.errors.has('productQRNumber') }" class="form-control" placeholder="Product QR Number">
                          <has-error :form="form" field="productQRNumber"></has-error>
                    </div>
                </div>
                <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                 <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Product</button>
               </div>
              </form>
           </div>
          </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Product Name List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Product Name</th>
               <th>Product Code</th>
               <th>Product QR Number</th>
               <th>Category Name</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productNameList, index) in productNameLists">
                <td>{{ index+1 }}</td>
                <td v-if="productNameList.shop_type_name">{{ productNameList.shop_type_name.shopTypeName }}</td>
                <td>{{ productNameList.productName }}</td>
                <td>{{ productNameList.productCode }}</td>
                <td>{{ productNameList.productQRNumber }}</td>
                <td v-if="productNameList.product_category">
                  <span v-for="poductCategoryId in productNameList.product_category" v-if="poductCategoryId.productNameId == productNameList.productNameId">
                    <span v-for="categoryList in categoryLists" v-if="categoryList.categoryId == poductCategoryId.categoryId" class="btn-hover-shine btn-success mr-1">
                        {{ categoryList.categoryName }}
                    </span>
                  </span>
                </td>
                <td>
                    <!-- <button class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-primary">Edit</button> -->
                    <button @click.prevent="destroy(productNameList.productNameId)" class="mb-2 mr-2 btn-hover-shine btn btn-shadow btn-danger">Delete</button>
                </td>
              </tr>
           </tbody>
         </table>
       </div>
     </div>
  </span>
</template>
<script>
    export default {
      data () {
          return {
              form: new Form({
                  category : '',
                  subCategory : '',
                  thirdCategory : '',
                  fourCategory: '',
                  fiveCategory: '',
                  sixCategory: '',
                  sevenCategory: '',
                  productName: '',
                  productCode: '',
                  productQRNumber: '',
              }),
              subShow : false,
              thirdShow : false,
              fourShow : false,
              fiveShow : false,
              sixShow : false,
              sevenShow : false,
              cateorySelectLists:{},
              subCategorySelectLists:{},
              thirdCategorySelectLists:{},
              fourCategorySelectLists:{},
              fiveCategorySelectLists:{},
              sixCategorySelectLists:{},
              sevenCategorySelectLists:{},
              // productNameLists
              productNameLists:{},
              categoryLists:{},
          }
      },
      mounted(){
        this.categoryList();
        this.productListShows();
      },
      methods:{
          addProductName() {
            this.form.post('/productName').then(res => {
                  if (res.data.changeProductQR) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Change product QR Number'
                    })
                  }
                  else{
                      Toast.fire({
                          icon: 'success',
                          title: 'Product Name Successfully'
                      })
                      this.form.reset();
                      this.subShow = false;
                      this.thirdShow = false;
                      this.fourShow = false;
                      this.fiveShow = false;
                      this.sixShow = false;
                      this.sevenShow = false;
                      this.productListShows()
                  }
             });
          },
          productListShows(){
            axios.get('/productName').then(res =>{
                  this.productNameLists = res.data.productNameList;
                  this.categoryLists = res.data.categoryLists;
                  this.form.productCode = res.data.productCodeCountIncre;
            });
          },
          categoryList(){
            axios.get('/productCateorySelectList').then(res =>{
                  this.cateorySelectLists = res.data.categoryList;
            });
          },
          categorySelect(){
            axios.get('/productCategoryId/'+this.form.category).then(res =>{
                  this.subCategorySelectLists = res.data.subCategoryList;
                  if (res.data.subCategoryList == "") {
                      this.subShow = false;
                  }
                  else {
                     this.subShow = true;
                  }
            });
          },
          subCategorySelect(){
            axios.get('/productSubCategoryId/'+this.form.subCategory).then(res =>{
                  this.thirdCategorySelectLists = res.data.thirdCategoryList;
                  if (res.data.thirdCategoryList == "") {
                      this.thirdShow = false;
                  }
                  else {
                     this.thirdShow = true;
                  }
            });
          },
          thirdCategorySelect(){
            axios.get('/productThirdCategoryId/'+this.form.thirdCategory).then(res =>{
                  this.fourCategorySelectLists = res.data.fourCategoryList;
                  if (res.data.fourCategoryList == "") {
                      this.fourShow = false;
                  }
                  else {
                     this.fourShow = true;
                  }
            });
          },
          fourCategorySelect(){
            axios.get('/productFourCategoryId/'+this.form.fourCategory).then(res =>{
                  this.fiveCategorySelectLists = res.data.fiveCategoryList;
                  if (res.data.fiveCategoryList == "") {
                      this.fiveShow = false;
                  }
                  else {
                     this.fiveShow = true;
                  }
            });
          },
          fiveCategorySelect(){
            axios.get('/productFiveCategoryId/'+this.form.fiveCategory).then(res =>{
                  this.sixCategorySelectLists = res.data.sixCategoryList;
                  if (res.data.sixCategoryList == "") {
                      this.sixShow = false;
                  }
                  else {
                     this.sixShow = true;
                  }
            });
          },
          sixCategorySelect(){
            axios.get('/productSixCategoryId/'+this.form.sixCategory).then(res =>{
                  this.sevenCategorySelectLists = res.data.sevenCategoryList;
                  if (res.data.sevenCategoryList == "") {
                      this.sevenShow = false;
                  }
                  else {
                     this.sevenShow = true;
                  }
            });
          },
          destroy(productNameId){
            axios.delete('/productName/'+productNameId).then(res => {
                Toast.fire({
                    icon: 'success',
                    title: 'Product Name Delete Successfully'
                })
                this.productListShows()
            });
          },
      }

    }
</script>
