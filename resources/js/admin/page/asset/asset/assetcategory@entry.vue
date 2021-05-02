<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Category Entry</h3>
      </div>
      <div class="py-5 category">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  asset-border" >
            <form  action="" method="post" @submit.prevent="addAssetCategory()">
                 <div class="form-row">
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

                 <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Asset Category</button>
                </div>
              </form>
           </div>
         </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Category List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Asset Category name</th>
               <th>Asset Category Position</th>
               <th>Asset Category Type</th>
               <th>Asset CategoryStatus</th>
               <th>Asset Sub Category Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(shopAssetCategoryList, index) in shopAssetCategoryLists.data">
                <td>{{ index+1 }}</td>
                <td>{{ shopAssetCategoryList.assetCategoryName }}</td>
                <td>{{ shopAssetCategoryList.assetCategoryPosition }}</td>
                <td>
                  <div v-if="shopAssetCategoryList.label == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 2">
                    <button type="button"   class="btn btn-hover-shine btn-success">Sub Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 3">
                    <button type="button"   class="btn btn-hover-shine btn-success">Third Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 4">
                    <button type="button"   class="btn btn-hover-shine btn-success">Four Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 5">
                    <button type="button"   class="btn btn-hover-shine btn-success">Five Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 6">
                    <button type="button"   class="btn btn-hover-shine btn-success">Six Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 7">
                    <button type="button"   class="btn btn-hover-shine btn-success">Seven Category</button>
                  </div>
                  <div v-if="shopAssetCategoryList.label == 8">
                    <button type="button"   class="btn btn-hover-shine btn-success">Eight Category</button>
                  </div>
                </td>
                <td>
                  <div v-if="shopAssetCategoryList.assetCategoryStatus == 1">
                    <button type="button" @click.prevent="changeStatus(shopAssetCategoryList.assetCategoryId)"  class="btn btn-hover-shine btn-success">Publish</button>
                  </div>
                  <div v-else>
                    <button type="button" @click.prevent="changeStatus(shopAssetCategoryList.assetCategoryId)"  class="btn btn-hover-shine btn-danger">Unpublish</button>
                  </div>
                </td>
                <td>
                  <div v-if="shopAssetCategoryList.assetSubCategoryStatus == 1">
                    <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                  </div>
                  <div v-else>
                    <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                  </div>
                </td>
                <td>
                   <router-link :to="`/assetcategory@Edit${shopAssetCategoryList.assetCategoryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
            </tr>
          </tbody>
        </table>
      </div>
       <span class="card_footer">
         <pagination :data="shopAssetCategoryLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
              subShow : false,
              thirdShow : false,
              fourShow : false,
              fiveShow : false,
              sixShow : false,
              sevenShow : false,
              shopAssetCategoryLists:{},

              assetCategoryLists:{},
              assetSubCategorySelectLists:{},
              assetThirdCategorySelectLists:{},
              assetFourCategorySelectLists:{},
              assetFiveCategorySelectLists:{},
              assetSixCategorySelectLists:{},
              assetSevenCategorySelectLists:{},
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.assetCategoryListShow();
         this.getPaginateList();
         this.assetCategoryListSelect();
      },
      methods:{
          addAssetCategory() {
            this.form.post('/shopAssetCategory').then(res => {
              if (res.data.changeAssetName) {
                Toast.fire({
                    icon: 'error',
                    title: 'Change Your Asset Category Name'
                })
              }
              else {
                  Toast.fire({
                      icon: 'success',
                      title: 'Category Create Successfully'
                  })
                  this.form.reset()
                  this.assetCategoryListShow();
                  this.assetCategoryListSelect();
                  this.subShow = false;
                  this.thirdShow = false;
                  this.fourShow = false;
                  this.fiveShow = false;
                  this.sixShow = false;
                  this.sevenShow = false;
              }
             });
          },
          assetCategoryListShow(){
            axios.get('/shopAssetCategory').then(res => {
              this.shopAssetCategoryLists = res.data.shopAssetCategoryLists;
            });
          },
          getPaginateList(page = 1){
            axios.get('/shopAssetCategory?page=' + page).then(response => {
              this.adminAssetCategoryLists = response.data.adminAssetCategoryLists;
              this.shopAssetCategoryLists = response.data.shopAssetCategoryLists;
            });
          },
          assetCategoryListSelect(){
            axios.get('/assetCateorySelectList').then(res =>{
                  this.assetCategoryLists = res.data.shopAssetCategoryList;
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
            });
          },
          assetCategorySelect(){
            axios.get('/assetCategoryId/'+this.form.assetCategory).then(res =>{
                  this.assetSubCategorySelectLists = res.data.assetSubCategoryList;
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
                  if (res.data.assetSubCategoryList != "") {
                      this.subShow = true;
                  }
                  else {
                      this.subShow = false;
                  }
            });
          },
          assetSubCategorySelect(){
            axios.get('/assetSubCategoryId/'+this.form.assetSubCategory).then(res =>{
                  this.assetThirdCategorySelectLists = res.data.assetThirdCategoryList;
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
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
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
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
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
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
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
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
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
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
                  this.form.assetCategoryPosition = res.data.assetCategoryPositionIncre;
            });
        },
        changeStatus(assetCategoryId){
            axios.get("/shopAssetCategory/"+assetCategoryId).then(res=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Status Change Successfully'
                })
                this.assetCategoryListShow();
            })
        },
      }
    }
</script>
