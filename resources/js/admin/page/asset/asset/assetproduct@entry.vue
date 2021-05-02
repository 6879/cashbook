<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Product Entry</h3>
      </div>
      <div class="asset-entry">
        <div class="row ml-2 mr-2" >
          <div class="col-lg-7 col-12 offset-lg-2 asset-border" >
              <form   method="post" @submit.prevent="addAssetCode()">
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
                <div class="form-row pt-2" >
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Asset Product Name</label>
                     </div>
                     <div class="col-sm-8 col-12">
                          <input  type="text" v-model="form.assetPorductName" name="assetPorductName" :class="{ 'is-invalid': form.errors.has('assetPorductName') }" placeholder="Enter Product Name" class="form-control">
                          <has-error :form="form" field="assetPorductName"></has-error>
                     </div>
                 </div>
                <div class="form-row pt-2" >
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Asset Product Code</label>
                     </div>
                     <div class="col-sm-8 col-12">
                          <input  type="text" v-model="form.assetPorductCode" name="assetPorductCode" :class="{ 'is-invalid': form.errors.has('assetPorductCode') }" placeholder="Enter Product Code" class="form-control">
                          <has-error :form="form" field="assetPorductCode"></has-error>
                     </div>
                 </div>
                <div class="form-row pt-2" >
                     <div class="col-sm-4 col-12">
                        <label class="p-0">Asset Code Status</label>
                     </div>
                     <div class="col-sm-8 col-12">
                       <select v-model="form.assetCodeStatus" name="assetCodeStatus" :class="{ 'is-invalid': form.errors.has('assetCodeStatus') }" class="form-control">
                         <option value="">Select One</option>
                         <option value="1">Publish</option>
                         <option value="0">Unpublish</option>
                        </select>
                        <has-error :form="form" field="assetCodeStatus"></has-error>
                     </div>
                 </div>

                <div class="text-sm-right  text-right">
                    <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Asset Code</button>
               </div>
              </form>
           </div>
          </div>
      </div>
    </div>

    <div class="card mt-5">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Asset Product List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped ">
          <thead>
             <tr>
               <th>SN</th>
               <th>Asset Category Name</th>
               <th>Asset Product Name</th>
               <th>Asset Product Code</th>
               <th>Asset Code Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="(assetCodeEntryList, index) in assetCodeEntryLists.data">
                 <td>{{ index+1 }}</td>
                 <td v-if="assetCodeEntryList.asset_category_name">{{ assetCodeEntryList.asset_category_name.assetCategoryName }}</td>
                 </td>
                 <td>{{ assetCodeEntryList.assetPorductName }}</td>
                 <td>{{ assetCodeEntryList.assetPorductCode }}</td>
                 <td>
                   <div v-if="assetCodeEntryList.assetCodeStatus == 1">
                     <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                   </div>
                   <div v-else>
                     <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                   </div>
                 </td>
                 <td>
                      <router-link :to="`/assetproduct@edit${assetCodeEntryList.assetCodeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                 </td>
               </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="assetCodeEntryLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>

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

                  assetPorductName : '',
                  assetPorductCode : '',
                  assetCodeStatus : '',

              }),
              subShow : false,
              thirdShow : false,
              fourShow : false,
              fiveShow : false,
              sixShow : false,
              sevenShow : false,

              assetCodeEntryLists:{},

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
          this.getPaginateList();
          this.assetCodeEntryList();
          this.assetCategoryListSelect();
       },
       methods:{
           addAssetCode(){
              this.form.post('/assetCodeEntry').then(res =>{
                if (res.data.changeName) {
                    Toast.fire({
                      icon: 'error',
                      title: 'Change Product Name And Product Code'
                    })
                }
                else{
                    Toast.fire({
                      icon: 'success',
                      title: 'Asset Code Entry Successfully'
                    })
                    this.subShow = false;
                    this.thirdShow = false;
                    this.fourShow = false;
                    this.fiveShow = false;
                    this.sixShow = false;
                    this.sevenShow = false;
                    this.form.reset();
                    this.assetCodeEntryList();
                }
              })
           },
           assetCodeEntryList(){
             axios.get('/assetCodeEntry').then(res =>{
                   this.assetCodeEntryLists = res.data.assetCodeEntryLists;
                   console.log(res.data.assetCodeEntryLists);
             });
           },
           getPaginateList(page = 1){
             axios.get('/assetCodeEntry?page=' + page).then(response => {
                this.assetCodeEntryLists = response.data.assetCodeEntryLists;
             });
           },
           assetCategoryListSelect(){
             axios.get('/assetCateorySelectList').then(res =>{
                   this.assetCategoryLists = res.data.shopAssetCategoryList;
             });
           },
           assetCategorySelect(){
             axios.get('/assetCategoryId/'+this.form.assetCategory).then(res =>{
                   this.assetSubCategorySelectLists = res.data.assetSubCategoryList;

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
<style media="screen">
  .asset-entry{
      padding:50px 0px;
  }
.asset-border{
     border: 1px solid rgba(0, 0, 0, 0.12);
     padding: 40px 30px;
  }

</style>
