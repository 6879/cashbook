<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Asset Category Update</h3>
        </div>
        <div class="asset-entry category">
          <div class="row ml-2 mr-2" >
            <div class="col-lg-7 col-12 offset-lg-2 asset-border" >
                <form   method="post" @submit.prevent="updateAssetCategory()">
                  <div class="form-row" v-if="catShow">
                      <div class="col-sm-4 col-12">
                         <label class="p-0">Asset Category</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <select  v-model="form.assetCategory"  @change.prevent="assetCategorySelect()" name="assetCategory" class="form-control" :class="{ 'is-invalid': form.errors.has('assetCategory') }">
                            <option value="">Select One</option>
                            <option  v-for="assetCategoryList in assetCategoryLists" :value="assetCategoryList.assetCategoryId"> {{ assetCategoryList.assetCategoryName }} </option>
                        </select>
                        <has-error :form="form" field="assetCategory"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-2" v-if="subShow">
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Asset Sub Category</label>
                     </div>
                      <div class="col-sm-8 col-12">
                          <select  v-model="form.assetSubCategory" @change.prevent="assetSubCategorySelect()" name="assetSubCategory" class="form-control">
                            <option value="">Select One</option>
                            <option v-for="assetSubCategorySelectList in assetSubCategorySelectLists" :value="assetSubCategorySelectList.assetCategoryId">{{ assetSubCategorySelectList.assetCategoryName }}</option>
                          </select>
                       </div>
                  </div>
                  <div class="form-row pt-2" v-if="thirdShow">
                      <div class="col-sm-4 col-12">
                          <label class="p-0">Asset Third Category</label>
                       </div>
                      <div class="col-sm-8 col-12">
                        <select  v-model="form.assetThirdCategory" @change.prevent="assetThirdCategorySelect()" name="assetThirdCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="assetThirdCategorySelectList in assetThirdCategorySelectLists" :value="assetThirdCategorySelectList.assetCategoryId">{{ assetThirdCategorySelectList.assetCategoryName }}</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-row pt-2" v-if="fourShow">
                     <div class="col-sm-4 col-12">
                         <label class="p-0">Asset Four Category</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <select  v-model="form.assetFourCategory" @change.prevent="assetFourCategorySelect()" name="assetFourCategory" class="form-control">
                          <option value="">Select One</option>
                          <option v-for="assetFourCategorySelectList in assetFourCategorySelectLists" :value="assetFourCategorySelectList.assetCategoryId">{{ assetFourCategorySelectList.assetCategoryName }}</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-row pt-2" v-if="fiveShow">
                       <div class="col-sm-4 col-12">
                          <label class="p-0">Asset Five Category</label>
                       </div>
                       <div class="col-sm-8 col-12">
                          <select  v-model="form.assetFiveCategory" @change.prevent="assetFiveCategorySelect()" name="assetFiveCategory" class="form-control">
                            <option value="">Select One</option>
                            <option v-for="assetFiveCategorySelectList in assetFiveCategorySelectLists" :value="assetFiveCategorySelectList.assetCategoryId">{{ assetFiveCategorySelectList.assetCategoryName }}</option>
                          </select>
                       </div>
                  </div>
                  <div class="form-row pt-2" v-if="sixShow">
                       <div class="col-sm-4 col-12">
                          <label class="p-0">Asset Six Category</label>
                       </div>
                       <div class="col-sm-8 col-12">
                          <select  v-model="form.assetSixCategory" @change.prevent="assetSixCategorySelect()" name="assetSixCategory" class="form-control">
                            <option value="">Select One</option>
                            <option v-for="assetSixCategorySelectList in assetSixCategorySelectLists" :value="assetSixCategorySelectList.assetCategoryId">{{ assetSixCategorySelectList.assetCategoryName }}</option>
                          </select>
                       </div>
                  </div>
                  <div class="form-row pt-2" v-if="sevenShow">
                       <div class="col-sm-4 col-12">
                          <label class="p-0">Asset Seven Category</label>
                       </div>
                       <div class="col-sm-8 col-12">
                          <select  v-model="form.assetSevenCategory" @change.prevent="assetSevenCategorySelect()" name="assetSevenCategory" class="form-control">
                            <option value="">Select One</option>
                            <option v-for="assetSevenCategorySelectList in assetSevenCategorySelectLists" :value="assetSevenCategorySelectList.assetCategoryId">{{ assetSevenCategorySelectList.assetCategoryName }}</option>
                          </select>
                       </div>
                  </div>

                  <div class="form-row">
                    <div class="col-md-4 col-12">
                       <label>Asset Category Name</label>
                     </div>
                     <div class="col-md-8 col-12">
                         <input type="text" v-model="form.assetCategoryName" name="assetCategoryName" :class="{ 'is-invalid': form.errors.has('assetCategoryName') }" class="form-control" placeholder="Asset Category Name" >
                         <has-error :form="form" field="assetCategoryName"></has-error>
                     </div>
                  </div>

                  <div class="form-row">
                     <div class="col-md-4 col-12">
                       <label>Asset Category Position</label>
                     </div>
                     <div class="col-md-8 col-12">

                         <input type="text" disabled v-model="form.assetCategoryPosition" name="assetCategoryPosition" :class="{ 'is-invalid': form.errors.has('assetCategoryPosition') }" class="form-control" placeholder="Asset Category Position">
                         <has-error :form="form" field="assetCategoryPosition"></has-error>
                     </div>
                  </div>

                  <div class="form-row">
                     <div class="col-md-4 col-12">
                       <label>Asset Category Status</label>
                     </div>
                     <div class="col-md-8 col-12">
                        <select v-model="form.assetCategoryStatus" name="assetCategoryStatus"  class="form-control" :class="{ 'is-invalid': form.errors.has('assetCategoryStatus') }">
                           <option value="">Select One</option>
                           <option value="1">Publish</option>
                           <option value="0">Unpublish</option>
                        </select>
                          <has-error :form="form" field="assetCategoryStatus"></has-error>
                     </div>
                  </div>

                  <div class="form-row">
                     <div class="col-md-4 col-12">
                     </div>
                     <div class="col-md-8 col-12">
                          <input type="checkbox" v-model="form.assetSubCategoryStatus" name="assetSubCategoryStatus" value="1" class="form-check-input" >
                          <label class="form-check-label">Asset Sub Category Status</label>
                     </div>
                  </div>

                  <div class="text-sm-right  text-right">
                      <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update Asset Category</button>
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
        data(){
            return {
                form: new Form({

                    assetCategory : '',
                    assetSubCategory : '',
                    assetThirdCategory : '',
                    assetFourCategory: '',
                    assetFiveCategory: '',
                    assetSixCategory: '',
                    assetSevenCategory: '',

                    assetCategoryName : '',
                    assetCategoryPosition: '',
                    assetCategoryStatus: '',
                    assetSubCategoryStatus: '',

                }),

                catShow : true,
                subShow : true,
                thirdShow : true,
                fourShow : true,
                fiveShow : true,
                sixShow : true,
                sevenShow : true,

                assetCategoryLists:{},
                assetSubCategorySelectLists:{},
                assetThirdCategorySelectLists:{},
                assetFourCategorySelectLists:{},
                assetFiveCategorySelectLists:{},
                assetSixCategorySelectLists:{},
                assetSevenCategorySelectLists:{},

            }
        },
        mounted(){
            this.allCategoryShow()
            this.assetCodeSingleDate()
        },
        methods:{
            updateAssetCategory(){
                this.form.put('/shopAssetCategory/'+this.$route.params.assetCategoryId).then(res =>{
                    if (res.data.changeAssetName) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Asset Category Name'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Asset Category Update Successfully'
                         })
                         this.$router.push('/assetcategory@entry')
                    }

                });
            },
            allCategoryShow(){
               axios.get('/shopAssetCategory/create').then(res =>{
                      this.assetCategoryLists = res.data.assetCategoryLists;
                      this.assetSubCategorySelectLists = res.data.assetSubCategoryLists;
                      this.assetThirdCategorySelectLists = res.data.assetThirdCategoryLists;
                      this.assetFourCategorySelectLists = res.data.assetFourCategoryLists;
                      this.assetFiveCategorySelectLists = res.data.assetFiveCategoryLists;
                      this.assetSixCategorySelectLists = res.data.assetSixCategoryLists;
                      this.assetSevenCategorySelectLists = res.data.assetSevenCategoryLists;

               });
            },
            assetCodeSingleDate(){
               axios.get('/shopAssetCategory/'+this.$route.params.assetCategoryId+'/edit').then(res =>{
                    this.form.fill(res.data.assetCategorySingleInfo)

                    if (res.data.categoryInfo.label === 8 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                        this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                        this.form.assetFiveCategory = res.data.fiveCategoryName.assetCategoryId
                        this.form.assetSixCategory = res.data.sixCategoryName.assetCategoryId
                        this.form.assetSevenCategory = res.data.sevenCategoryName.assetCategoryId
                    }
                    if (res.data.categoryInfo.label === 7 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                        this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                        this.form.assetFiveCategory = res.data.fiveCategoryName.assetCategoryId
                        this.form.assetSixCategory = res.data.sixCategoryName.assetCategoryId
                        this.sevenShow = false
                    }
                    if (res.data.categoryInfo.label === 6 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                        this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                        this.form.assetFiveCategory = res.data.fiveCategoryName.assetCategoryId
                        this.sixShow = false
                        this.sevenShow = false
                    }
                    if (res.data.categoryInfo.label === 5 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                        this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                        this.fiveShow = false
                        this.sixShow = false
                        this.sevenShow = false
                    }
                    if (res.data.categoryInfo.label === 4 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    if (res.data.categoryInfo.label === 3 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    if (res.data.categoryInfo.label === 2 ) {
                        this.form.assetCategory    = res.data.categoryName.assetCategoryId
                        this.subShow = false;
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
                    if (res.data.categoryInfo.label === 1 ) {
                        this.catShow = false;
                        this.subShow = false;
                        this.subShow = false;
                        this.thirdShow = false;
                        this.fourShow = false;
                        this.fiveShow = false;
                        this.sixShow = false;
                        this.sevenShow = false;
                    }
               });
            },

            assetCategorySelect(){
                this.subShow = false;
                this.thirdShow = false;
                this.fourShow = false;
                this.fiveShow = false;
                this.sixShow = false;
                this.sevenShow = false;
                this.form.assetSubCategory = [];
                this.form.assetThirdCategory = [];
                this.form.assetFourCategory = [];
                this.form.assetFiveCategory = [];
                this.form.assetSixCategory = [];
                this.form.assetSevenCategory = [];

               axios.get('/assetCategoryId/'+this.form.assetCategory).then(res =>{
                     this.assetSubCategorySelectLists = res.data.assetSubCategoryList;

                     if (res.data.assetSubCategoryList != "") {
                         this.subShow = true;
                     }
                     else {
                         this.subShow = false;
                         this.thirdShow = false;
                         this.fourShow = false;
                         this.fiveShow = false;
                         this.sixShow = false;
                         this.sevenShow = false;
                     }
               });
             },
             assetSubCategorySelect(){
               axios.get('/assetSubCategoryId/'+this.form.assetSubCategory).then(res =>{
                     this.assetThirdCategorySelectLists = res.data.assetThirdCategoryList;

                     if (res.data.assetThirdCategoryList != "") {
                         this.thirdShow = true;
                     }
                     else {
                       this.thirdShow = false;
                     }
               });
             },
             assetThirdCategorySelect(){
               axios.get('/assetThirdCategoryId/'+this.form.assetThirdCategory).then(res =>{
                     this.assetFourCategorySelectLists = res.data.assetFourCategoryList;

                     if (res.data.assetFourCategoryList != "") {
                         this.fourShow = true;
                     }
                     else {
                        this.fourShow = false;
                     }
               });
             },
             assetFourCategorySelect(){
               axios.get('/assetFourCategoryId/'+this.form.assetFourCategory).then(res =>{
                     this.assetFiveCategorySelectLists = res.data.assetFiveCategoryList;

                     if (res.data.assetFiveCategoryList != "") {
                         this.fiveShow = true;
                     }
                     else {
                        this.fiveShow = false;
                     }
               });
             },
             assetFiveCategorySelect(){
               axios.get('/assetFiveCategoryId/'+this.form.assetFiveCategory).then(res =>{
                     this.assetSixCategorySelectLists = res.data.assetSixCategoryList;

                     if (res.data.assetSixCategoryList != "") {
                          this.sixShow = true;
                     }
                     else {
                         this.sixShow = false;
                     }
               });
             },
             assetSixCategorySelect(){
               axios.get('/assetSixCategoryId/'+this.form.assetSixCategory).then(res =>{
                     this.assetSevenCategorySelectLists = res.data.assetSevenCategoryList;
                     if (res.data.assetSevenCategoryList != "") {
                         this.sevenShow = true;
                     }
                     else {
                        this.sevenShow = false;
                     }
               });
             },
            assetSevenCategorySelect(){
               axios.get('/assetSevenCategoryId/'+this.form.assetSevenCategory).then(res =>{
            });
           },

       }
  }
</script>
