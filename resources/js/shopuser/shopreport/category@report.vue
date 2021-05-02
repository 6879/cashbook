<template id="">
  <span>
     <div class="card main-card  element-block-example">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Category Report</h3>
        </div>

          <div class="table-responsive bg-white" v-if="myGuard=='web'">
           <table class="table table-hover table-bordered table-striped">
             <thead>
                <tr>
                  <th>SN</th>
                  <th>Shop Type</th>
                  <th>Category Name</th>
                </tr>
               </thead>
              <tbody >
                <tr v-for="(adminShopDataShow ,index) in adminShopDataShows">
                  <td>{{ index+1 }}</td>
                  <td v-if="adminShopDataShow.shop_type_name">{{ adminShopDataShow.shop_type_name.shopTypeName }}</td>
                  <td>
                    <div v-for="adminShopDatalabel in adminShopDatalabels" v-if="adminShopDatalabel.shopTypeId == adminShopDataShow.shopTypeId" class="mr-1 float-left display-inline-css">
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${1}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 1">
                        Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${2}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 2">
                        Sub Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${3}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 3">
                        Third Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${4}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 4">
                        Four Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${5}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Five Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${6}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Six Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${7}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Seven Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${8}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Eight Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${adminShopDataShow.shopTypeId}${9}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Nine Category
                      </router-link>
                      <router-link :to="`/adminCategory@list${10}`" class="btn-hover-shine btn-success" v-if="adminShopDatalabel.label == 5">
                        Ten Category
                      </router-link>
                    </div>
                  </td>
                </tr>
              </tbody>
           </table>
         </div>

           <div class="table-responsive bg-white" v-else>
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Shop Type</th>
                   <th>Category Name</th>
                 </tr>
                </thead>
               <tbody>
                <tr v-for="(shopOwnerTypeShow ,index) in shopOwnerTypeShows">
                  <td>{{ index+1 }}</td>
                  <td>{{ shopOwnerTypeShow.shop_type_name.shopTypeName }} (Owner) </td>
                  <td>
                    <div  class="mr-1 float-left display-inline-css">
                        <router-link v-if="category       != 0 " :to="`/category@Ownerlist${1}`"  class="btn-hover-shine btn-success">Category ({{ category  }})</router-link>
                        <router-link v-if="subcategory    != 0 " :to="`/category@Ownerlist${2}`"  class="btn-hover-shine btn-success">Sub Category ({{ subcategory  }})</router-link>
                        <router-link v-if="thirdCategory  != 0 " :to="`/category@Ownerlist${3}`"  class="btn-hover-shine btn-success">Third Category ({{ thirdCategory  }})</router-link>
                        <router-link v-if="foreCategory   != 0 " :to="`/category@Ownerlist${4}`"  class="btn-hover-shine btn-success">Four Category ({{ foreCategory  }})</router-link>
                        <router-link v-if="fiveCategory   != 0 " :to="`/category@Ownerlist${5}`"  class="btn-hover-shine btn-success">Five Category ({{ fiveCategory  }})</router-link>
                        <router-link v-if="sixCategory    != 0 " :to="`/category@Ownerlist${6}`"  class="btn-hover-shine btn-success">Six Category ({{ sixCategory  }})</router-link>
                        <router-link v-if="sevenCategory  != 0 " :to="`/category@Ownerlist${7}`"  class="btn-hover-shine btn-success">Seven Category ({{ sevenCategory  }})</router-link>
                        <router-link v-if="eightCategory  != 0 " :to="`/category@Ownerlist${8}`"  class="btn-hover-shine btn-success">Eight Category ({{ eightCategory  }})</router-link>
                        <router-link v-if="nineCategory   != 0 " :to="`/category@Ownerlist${9}`"  class="btn-hover-shine btn-success">Nine Category ({{ nineCategory  }})</router-link>
                        <router-link v-if="tenCategory    != 0 " :to="`/category@Ownerlist${10}`"  class="btn-hover-shine btn-success">Ten Category ({{  tenCategory }})</router-link>
                    </div>
                   </td>
                </tr>
                <tr v-for="(shopGlobalTypeShow ,index1) in shopGlobalTypeShows">
                  <td>{{ index1+1 }}</td>
                  <td>{{ shopGlobalTypeShow.shop_type_name.shopTypeName }}  (Global)</td>
                  <td>
                    <div  class="mr-1 float-left display-inline-css">
                        <router-link v-if="globalCategoryCount       != 0 " :to="`/category@Globallist${1}`"  class="btn-hover-shine btn-success">Category ({{ globalCategoryCount  }})</router-link>
                        <router-link v-if="globalSubcategoryCount    != 0 " :to="`/category@Globallist${2}`"  class="btn-hover-shine btn-success">Sub Category ({{ globalSubcategoryCount  }})</router-link>
                        <router-link v-if="globalThirdCategoryCount  != 0 " :to="`/category@Globallist${3}`"  class="btn-hover-shine btn-success">Third Category ({{ globalThirdCategoryCount  }})</router-link>
                        <router-link v-if="globalForeCategoryCount   != 0 " :to="`/category@Globallist${4}`"  class="btn-hover-shine btn-success">Four Category ({{ globalForeCategoryCount  }})</router-link>
                        <router-link v-if="globalFiveCategoryCount   != 0 " :to="`/category@Globallist${5}`"  class="btn-hover-shine btn-success">Five Category ({{ globalFiveCategoryCount  }})</router-link>
                        <router-link v-if="globalSixCategoryCount    != 0 " :to="`/category@Globallist${6}`"  class="btn-hover-shine btn-success">Six Category ({{ globalSixCategoryCount  }})</router-link>
                        <router-link v-if="globalSevenCategoryCount  != 0 " :to="`/category@Globallist${7}`"  class="btn-hover-shine btn-success">Seven Category ({{ globalSevenCategoryCount  }})</router-link>
                        <router-link v-if="globalEightCategoryCount  != 0 " :to="`/category@Globallist${8}`"  class="btn-hover-shine btn-success">Eight Category ({{ globalEightCategoryCount  }})</router-link>
                        <router-link v-if="globalNineCategoryCount   != 0 " :to="`/category@Globallist${9}`"  class="btn-hover-shine btn-success">Nine Category ({{ globalNineCategoryCount  }})</router-link>
                        <router-link v-if="globalTenCategoryCount    != 0 " :to="`/category@Globallist${10}`"  class="btn-hover-shine btn-success">Ten Category ({{  globalTenCategoryCount }})</router-link>
                    </div>
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
        data(){
            return{
                myGuard:'',
                adminShopDataShows:{},
                adminShopDatalabels:{},
                shopOwnerTypeShows:{},
                shopGlobalTypeShows:{},


                authInfo:{},
                category:{},
                subcategory:{},
                thirdCategory:{},
                foreCategory:{},
                fiveCategory:{},
                sixCategory:{},
                sevenCategory:{},
                eightCategory:{},
                nineCategory:{},
                tenCategory:{},


                globalCategoryCount:{},
                globalSubcategoryCount:{},
                globalThirdCategoryCount:{},
                globalForeCategoryCount:{},
                globalFiveCategoryCount:{},
                globalSixCategoryCount:{},
                globalSevenCategoryCount:{},
                globalEightCategoryCount:{},
                globalNineCategoryCount:{},
                globalTenCategoryCount:{},
            }
        },
        mounted(){
            this.getShopTypeData();
            this.getCategoryData();
            this.condition();
            this.categoryGlobalCount();
            this.getMyGuard();
        },
        methods:{


                      getMyGuard(){
                axios.get('/getMyGuard').then(res =>{
                 
                    this.myGuard = res.data.myGuard;
 
                })
            },


            getShopTypeData(){
                axios.get('/shopTypeNameList').then(res =>{
                    this.adminShopDataShows = res.data.adminShopDataShow;
                    this.adminShopDatalabels = res.data.adminShopDatalabel;
                    this.shopOwnerTypeShows = res.data.shopOwnerTypeShow;
                    this.shopGlobalTypeShows = res.data.shopGlobalTypeShow;
                })
            },
            getCategoryData(){
                axios.get('/categoryNameList').then(res=>{
                    this.category = res.data.category;
                    this.subcategory = res.data.subcategory;
                    this.thirdCategory = res.data.thirdCategory;
                    this.foreCategory = res.data.foreCategory;
                    this.fiveCategory = res.data.fiveCategory;
                    this.sixCategory = res.data.sixCategory;
                    this.sevenCategory = res.data.sevenCategory;
                    this.eightCategory = res.data.eightCategory;
                    this.nineCategory = res.data.nineCategory;
                    this.tenCategory = res.data.tenCategory;
                })
            },
            condition(){
                axios.get('/condition').then(res =>{
                    this.authInfo = res.data.authInfo
                })
            },
            categoryGlobalCount(){
                axios.get('/categoryGlobalCount').then(res =>{
                    this.globalCategoryCount = res.data.globalCategoryCount;
                    this.globalSubcategoryCount = res.data.globalSubcategoryCount;
                    this.globalThirdCategoryCount = res.data.globalThirdCategoryCount;
                    this.globalForeCategoryCount = res.data.globalForeCategoryCount;
                    this.globalFiveCategoryCount = res.data.globalFiveCategoryCount;
                    this.globalSixCategoryCount = res.data.globalSixCategoryCount;
                    this.globalSevenCategoryCount = res.data.globalSevenCategoryCount;
                    this.globalEightCategoryCount = res.data.globalEightCategoryCount;
                    this.globalNineCategoryCount = res.data.globalNineCategoryCount;
                    this.globalTenCategoryCount = res.data.globalTenCategoryCount;
                })
            },
        }
    }

</script>
