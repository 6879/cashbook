<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">  Category Update  </h3>
      </div>
      <div class="py-5 category">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  category-border" >
            <form  action="" method="post" @submit.prevent="updateCategory()">

                <div class="form-row" v-if="myGuard=='web'">
                   <div class="col-md-4 col-12">
                      <label> Select Shop Type </label>
                    </div>
                    <div class="col-md-8 col-12">
                       <select class="form-control" v-model="form.shopTypeId" name="shopTypeId" @change.prevent="adminShopTypeIdSelect()">
                         <option value="">Select One </option>
                         <option  v-for="shopTypeName in shopTypeNames" :value="shopTypeName.shopTypeEntryId">{{ shopTypeName.shopTypeName }} </option>
                       </select>
                     </div>
                 </div>

                 <div class="form-row" v-if="catShow">
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Category {{form.category}}</label>
                     </div>
                     <div class="col-sm-8 col-12">
                       <select  v-model="form.category"  @change.prevent="categorySelect()" name="category" class="form-control" :class="{ 'is-invalid': form.errors.has('category') }">
                           <option value=""> Select One </option>
                           <option  v-for="categorySelectList in categorySelectLists" 
                           :value="categorySelectList.categoryId"> {{ categorySelectList.categoryName }} </option>
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
                    <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update Category</button>
                 </div>
              </form>
           </div>
         </div>
      </div>
    </div>

  </span>
</template>
<script>
    export default {
      data () {
          return {
            myGuard:'',
              form: new Form({
                  shopTypeId : '',
                  category: '',
                  subCategory: '',
                  thirdCategory: '',
                  fourCategory: '',
                  fiveCategory: '',
                  sixCategory: '',
                  sevenCategory: '',

                  categoryName : '',
                  categoryStatus: '',
                  categoryPosition : '',
                  subCategoryStatus: '',

              }),

              catShow : true,
              subShow : true,
              thirdShow : true,
              fourShow : true,
              fiveShow : true,
              sixShow : true,
              sevenShow : true,

              categorySelectLists:{},
              subCategorySelectLists:{},
              thirdCategorySelectLists:{},
              fourCategorySelectLists:{},
              fiveCategorySelectLists:{},
              sixCategorySelectLists:{},
              sevenCategorySelectLists:{},

              shopTypeNames:{},
              role:{},
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.catgorySingleData();
         this.allCategoryShow();
         this.shopTypeNameShow();
         this.getMyGuard();

      },
      methods:{

                
            getMyGuard(){
                axios.get('/getMyGuard').then(res =>{
                 
                    this.myGuard = res.data.myGuard;
 
                })
            },


          catgorySingleData(){
              axios.get('/category/'+this.$route.params.categoryId+'/edit').then(res=>{
                    this.form.fill(res.data.categorySingleInfo)

                    if (res.data.categoryInfo.label === 8 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.form.thirdCategory = res.data.thirdCategoryName.categoryId
                        this.form.fourCategory = res.data.fourCategoryName.categoryId
                        this.form.fiveCategory = res.data.fiveCategoryName.categoryId
                        this.form.sixCategory = res.data.sixCategoryName.categoryId
                        this.form.sevenCategory = res.data.sevenCategoryName.categoryId
                    }
                    else if (res.data.categoryInfo.label === 7 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.form.thirdCategory = res.data.thirdCategoryName.categoryId
                        this.form.fourCategory = res.data.fourCategoryName.categoryId
                        this.form.fiveCategory = res.data.fiveCategoryName.categoryId
                        this.form.sixCategory = res.data.sixCategoryName.categoryId
                        this.sevenShow = false
                    }
                    else if (res.data.categoryInfo.label === 6 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.form.thirdCategory = res.data.thirdCategoryName.categoryId
                        this.form.fourCategory = res.data.fourCategoryName.categoryId
                        this.form.fiveCategory = res.data.fiveCategoryName.categoryId
                        this.sixShow = false
                        this.sevenShow = false
                    }
                    else if (res.data.categoryInfo.label === 5 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.form.thirdCategory = res.data.thirdCategoryName.categoryId
                        this.form.fourCategory = res.data.fourCategoryName.categoryId
                        this.fiveShow = false
                        this.sixShow = false
                        this.sevenShow = false
                    }
                    else if (res.data.categoryInfo.label === 4 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.form.thirdCategory = res.data.thirdCategoryName.categoryId
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    else if (res.data.categoryInfo.label === 3 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.form.subCategory = res.data.subCategoryName.categoryId
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    else if (res.data.categoryInfo.label === 2 ) {
                        this.form.category    = res.data.categoryName.categoryId
                        this.subShow = false;
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    else if (res.data.categoryInfo.label === 1 ) {
                        this.catShow = false;
                        this.subShow = false;
                        this.subShow = false;
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }

              })
          },
          allCategoryShow(){
             axios.get('/categoryEdit/allCategory').then(res =>{
                    this.categorySelectLists = res.data.assetCategoryLists;
                    this.subCategorySelectLists = res.data.assetSubCategoryLists;
                    this.thirdCategorySelectLists = res.data.assetThirdCategoryLists;
                    this.fourCategorySelectLists = res.data.assetFourCategoryLists;
                    this.fiveCategorySelectLists = res.data.assetFiveCategoryLists;
                    this.sixCategorySelectLists = res.data.assetSixCategoryLists;
                    this.sevenCategorySelectLists = res.data.assetSevenCategoryLists;
             });
          },
          updateCategory(){
              this.form.put('/category/'+this.$route.params.categoryId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Update Successfully'
                  })
                  this.$router.push('/add@category')
              })
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
        shopTypeNameShow() {
          axios.get('/category/create').then(res => {
             this.shopTypeNames = res.data.shopTypeNames;
             this.role = res.data.role;
          });
        },



      }
    }
</script>
