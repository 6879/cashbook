<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category Entry  {{myGuard}} </h3>
      </div>
      <div class="py-5 category">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  category-border" >
            <form  action="" method="post" @submit.prevent="addCategory()">

                <div class="form-row" v-if="myGuard == 'web'">
                    <div class="col-md-4 col-12">
                      <label>Select Shop Type </label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select class="form-control" v-model="form.shopTypeId" name="shopTypeId" 
                       @change.prevent="adminShopTypeIdSelect()">
                         <option value=""> Select One </option>
                         <option  v-for="shopTypeName in shopTypeNames" :value="shopTypeName.shopTypeEntryId">{{ shopTypeName.shopTypeName }} </option>
                       </select>
                     </div>
                 </div>

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
                         <select  v-model="form.sevenCategory" @change.prevent="sevenCategorySelect()" name="sevenCategory" class="form-control">
                           <option value="">Select One</option>
                           <option v-for="sevenCategorySelectList in sevenCategorySelectLists" :value="sevenCategorySelectList.categoryId">{{ sevenCategorySelectList.categoryName }}</option>
                         </select>
                      </div>
                 </div>

                 <div class="form-row">
                   <div class="col-md-4 col-12">
                      <label>Category Name</label>
                    </div>
                    <div class="col-md-8 col-12">
                        <input type="text" v-model="form.categoryName" name="categoryName" :class="{ 'is-invalid': form.errors.has('categoryName') }" class="form-control" placeholder="Category Name" >
                        <has-error :form="form" field="categoryName"></has-error>
                    </div>
                 </div>

                 <div class="form-row">
                    <div class="col-md-4 col-12">
                      <label>Category Position</label>
                    </div>
                    <div class="col-md-8 col-12">

                        <input type="text" disabled v-model="form.categoryPosition" name="categoryPosition" :class="{ 'is-invalid': form.errors.has('categoryPosition') }" class="form-control" placeholder="Category Position">
                        <has-error :form="form" field="categoryPosition"></has-error>
                    </div>
                 </div>

                 <div class="form-row">
                    <div class="col-md-4 col-12">
                      <label>Category Status</label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select v-model="form.categoryStatus" name="categoryStatus"  class="form-control" :class="{ 'is-invalid': form.errors.has('categoryStatus') }">
                          <option value="">Select One</option>
                          <option value="1">Publish</option>
                          <option value="0">Unpublish</option>
                       </select>
                         <has-error :form="form" field="categoryStatus"></has-error>
                    </div>
                 </div>

                 <div class="form-row">
                    <div class="col-md-4 col-12">
                    </div>
                    <div class="col-md-8 col-12">
                         <input type="checkbox" v-model="form.subCategoryStatus" name="subCategoryStatus" value="1" class="form-check-input" >
                         <label class="form-check-label">Sub Category Status</label>
                    </div>
                 </div>

                 <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Category</button>
                </div>
              </form>
           </div>
         </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5" v-if="role.role == 1 || role.role == 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Category List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Category name</th>
               <th>Category Position</th>
               <th>Category Type</th>
               <th>Sub Category Status	</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminCategoryList, index) in adminCategoryLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="adminCategoryList.shop_type_name">{{ adminCategoryList.shop_type_name.shopTypeName }}</td>
                <td>{{ adminCategoryList.categoryName }}</td>
                <td>{{ adminCategoryList.categoryPosition }}</td>
                <td>
                  <div v-if="adminCategoryList.label == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 2">
                    <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 3">
                    <button type="button"   class="btn btn-hover-shine btn-success">Third Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 4">
                    <button type="button"   class="btn btn-hover-shine btn-success">Four Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 5">
                    <button type="button"   class="btn btn-hover-shine btn-success">Five Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 6">
                    <button type="button"   class="btn btn-hover-shine btn-success">Six Category</button>
                  </div>
                  <div v-if="adminCategoryList.label == 7">
                    <button type="button"   class="btn btn-hover-shine btn-success">Seven Category</button>
                  </div>
                </td>
                <td>
                  <div v-if="adminCategoryList.subCategoryStatus == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                  </div>
                  <div v-else>
                    <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                  </div>
                </td>
                <td>
                   <router-link :to="`/category@Edit${adminCategoryList.categoryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
<!--                   <button type="button" @click="distroy(adminCategoryList.categoryId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>-->
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="adminCategoryLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>


    <div class="card main-card  element-block-example mt-5" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Category List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Category name</th>
               <th>Category Position</th>
               <th>Category Type</th>
               <th>Sub Category Status	</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(shopCategoryList, index) in shopCategoryLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="shopCategoryList.shop_type_name">{{ shopCategoryList.shop_type_name.shopTypeName }}</td>
                <td>{{ shopCategoryList.categoryName }}</td>
                <td>{{ shopCategoryList.categoryPosition }}</td>
                <td>
                  <div v-if="shopCategoryList.label == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 2">
                    <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 3">
                    <button type="button"   class="btn btn-hover-shine btn-success">Third Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 4">
                    <button type="button"   class="btn btn-hover-shine btn-success">Four Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 5">
                    <button type="button"   class="btn btn-hover-shine btn-success">Five Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 6">
                    <button type="button"   class="btn btn-hover-shine btn-success">Six Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 7">
                    <button type="button"   class="btn btn-hover-shine btn-success">Seven Category</button>
                  </div>
                  <div v-if="shopCategoryList.label == 8">
                    <button type="button"   class="btn btn-hover-shine btn-success">Eight Category</button>
                  </div>
                </td>
                <td>
                  <div v-if="shopCategoryList.subCategoryStatus == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                  </div>
                  <div v-else>
                    <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                  </div>
                </td>
                <td>
                   <router-link :to="`/category@Edit${shopCategoryList.categoryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
<!--                   <button type="button" @click="distroy(shopCategoryList.categoryId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>-->
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="shopCategoryLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>
<script>
    export default {
      data () {
          return {
              form: new Form({
                  shopTypeId : '',
                  category : '',
                  subCategory : '',
                  thirdCategory : '',
                  fourCategory: '',
                  fiveCategory: '',
                  sixCategory: '',
                  sevenCategory: '',

                  categoryName : '',
                  categoryPosition: '',
                  categoryStatus: '',
                  subCategoryStatus: '',
              }),
              adminCategoryLists:{},
              shopCategoryLists:{},
              shopTypeNames:{},
              role:{},
              myGuard:'',

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
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.categoryListSelect();
         this.categoryListShow();
         this.getPaginateList();
         this.shopTypeNameShow();
         this.getMyGuard();
      },
      methods:{

        
            getMyGuard(){
                axios.get('/getMyGuard').then(res =>{
                 
                    this.myGuard = res.data.myGuard;
 
                })
            },


          addCategory() {
            this.form.post('/category').then(res => {
              if (res.data.changeCategoryName) {
                Toast.fire({
                    icon: 'error',
                    title: 'Change Your Category Name'
                })
              }
              else {
                  Toast.fire({
                      icon: 'success',
                      title: 'Category Create Successfully'
                  })
                  this.form.reset()
                  this.categoryListShow();
                  this.categoryListSelect();
                  this.subShow = false;
                  this.thirdShow = false;
                  this.fourShow = false;
                  this.fiveShow = false;
                  this.sixShow = false;
                  this.sevenShow = false;
              }
             });
          },
          shopTypeNameShow() {
            axios.get('/category/create').then(res => {
              this.shopTypeNames = res.data.shopTypeNames;
              this.role = res.data.role;
            });
          },
          adminShopTypeIdSelect(){
            axios.get('/adminShopTypeIdSelect/'+this.form.shopTypeId).then(res => {
                this.cateorySelectLists = res.data.categoryList;
                this.form.categoryPosition = res.data.categoryPositionIncre;
            });
          },
          categoryListShow(){
            axios.get('/category').then(res => {
              this.adminCategoryLists = res.data.adminCategoryLists;
              this.shopCategoryLists = res.data.shopCategoryLists;
            });
          },
          getPaginateList(page = 1){
            axios.get('/category?page=' + page)
            .then(response => {
              this.categoryLists = response.data.categoryLists;
            });
          },
          categoryListSelect(){
            axios.get('/cateorySelectList').then(res =>{
                  this.cateorySelectLists = res.data.categoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
            });
          },
          categorySelect(){
            axios.get('/categoryId/'+this.form.category).then(res =>{
                  this.subCategorySelectLists = res.data.subCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.subCategoryList != "") {
                       this.subShow = true;
                  }
                  else {
                       this.subShow = false;
                  }
            });
          },
          subCategorySelect(){
            axios.get('/subCategoryId/'+this.form.subCategory).then(res =>{
                  this.thirdCategorySelectLists = res.data.thirdCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.thirdCategoryList != "") {
                      this.thirdShow = true;
                  }
                  else {
                      this.thirdShow = false;
                  }
            });
          },
          thirdCategorySelect(){
            axios.get('/thirdCategoryId/'+this.form.thirdCategory).then(res =>{
                  this.fourCategorySelectLists = res.data.fourCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.fourCategoryList != "") {
                      this.fourShow = true;
                  }
                  else {
                      this.fourShow = false;
                  }
            });
          },
          fourCategorySelect(){
            axios.get('/fourCategoryId/'+this.form.fourCategory).then(res =>{
                  this.fiveCategorySelectLists = res.data.fiveCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.fiveCategoryList != "") {
                     this.fiveShow = true;
                  }
                  else {
                     this.fiveShow = false;
                  }
            });
          },
          fiveCategorySelect(){
            axios.get('/fiveCategoryId/'+this.form.fiveCategory).then(res =>{
                  this.sixCategorySelectLists = res.data.sixCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.sixCategoryList != "") {
                      this.sixShow = true;
                  }
                  else {
                     this.sixShow = false;
                  }
            });
          },
          sixCategorySelect(){
            axios.get('/sixCategoryId/'+this.form.sixCategory).then(res =>{
                  this.sevenCategorySelectLists = res.data.sevenCategoryList;
                  this.form.categoryPosition = res.data.categoryPositionIncre;
                  if (res.data.sevenCategoryList != "") {
                      this.sevenShow = true;
                  }
                  else {
                     this.sevenShow = false;
                  }
            });
          },
          sevenCategorySelect(){
            axios.get('/sevenCategoryId/'+this.form.sevenCategory).then(res =>{
                this.form.categoryPosition = res.data.categoryPositionIncre;
          });
        },
        distroy(categoryId){
          axios.delete('/category/'+categoryId).then(res => {
                Toast.fire({
                    icon: 'success',
                    title: 'Category Delete Successfully'
                })
                this.categoryList();
           });
        },
      }
    }
</script>
