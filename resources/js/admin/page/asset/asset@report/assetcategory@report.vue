<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Category Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>Type</th>
               <th>Asset Category</th>
             </tr>
            </thead>
            <tbody>
              <tr>
                <td>Owner</td>
                <td>
                  <div  class="mr-1 float-left display-inline-css">
                      <router-link v-if="category       != 0 " :to="`/assetcategory@ownerreport${1}`"  class="btn-hover-shine btn-success">Category ({{ category  }})</router-link>
                      <router-link v-if="subcategory    != 0 " :to="`/assetcategory@ownerreport${2}`"  class="btn-hover-shine btn-success">Sub Category ({{ subcategory  }})</router-link>
                      <router-link v-if="thirdCategory  != 0 " :to="`/assetcategory@ownerreport${3}`"  class="btn-hover-shine btn-success">Third Category ({{ thirdCategory  }})</router-link>
                      <router-link v-if="foreCategory   != 0 " :to="`/assetcategory@ownerreport${4}`"  class="btn-hover-shine btn-success">Four Category ({{ foreCategory  }})</router-link>
                      <router-link v-if="fiveCategory   != 0 " :to="`/assetcategory@ownerreport${5}`"  class="btn-hover-shine btn-success">Five Category ({{ fiveCategory  }})</router-link>
                      <router-link v-if="sixCategory    != 0 " :to="`/assetcategory@ownerreport${6}`"  class="btn-hover-shine btn-success">Six Category ({{ sixCategory  }})</router-link>
                      <router-link v-if="sevenCategory  != 0 " :to="`/assetcategory@ownerreport${7}`"  class="btn-hover-shine btn-success">Seven Category ({{ sevenCategory  }})</router-link>
                      <router-link v-if="eightCategory  != 0 " :to="`/assetcategory@ownerreport${8}`"  class="btn-hover-shine btn-success">Eight Category ({{ eightCategory  }})</router-link>
                      <router-link v-if="nineCategory   != 0 " :to="`/assetcategory@ownerreport${9}`"  class="btn-hover-shine btn-success">Nine Category ({{ nineCategory  }})</router-link>
                      <router-link v-if="tenCategory    != 0 " :to="`/assetcategory@ownerreport${10}`"  class="btn-hover-shine btn-success">Ten Category ({{  tenCategory }})</router-link>
                  </div>
                 </td>
              </tr>
              <tr>
                <td>Global</td>
                <td>
                  <div  class="mr-1 float-left display-inline-css">
                      <router-link v-if="globalCategoryCount       != 0 " :to="`/assetcategory@globalreport${1}`"  class="btn-hover-shine btn-success">Category ({{ globalCategoryCount  }})</router-link>
                      <router-link v-if="globalSubcategoryCount    != 0 " :to="`/assetcategory@globalreport${2}`"  class="btn-hover-shine btn-success">Sub Category ({{ globalSubcategoryCount  }})</router-link>
                      <router-link v-if="globalThirdCategoryCount  != 0 " :to="`/assetcategory@globalreport${3}`"  class="btn-hover-shine btn-success">Third Category ({{ globalThirdCategoryCount  }})</router-link>
                      <router-link v-if="globalForeCategoryCount   != 0 " :to="`/assetcategory@globalreport${4}`"  class="btn-hover-shine btn-success">Four Category ({{ globalForeCategoryCount  }})</router-link>
                      <router-link v-if="globalFiveCategoryCount   != 0 " :to="`/assetcategory@globalreport${5}`"  class="btn-hover-shine btn-success">Five Category ({{ globalFiveCategoryCount  }})</router-link>
                      <router-link v-if="globalSixCategoryCount    != 0 " :to="`/assetcategory@globalreport${6}`"  class="btn-hover-shine btn-success">Six Category ({{ globalSixCategoryCount  }})</router-link>
                      <router-link v-if="globalSevenCategoryCount  != 0 " :to="`/assetcategory@globalreport${7}`"  class="btn-hover-shine btn-success">Seven Category ({{ globalSevenCategoryCount  }})</router-link>
                      <router-link v-if="globalEightCategoryCount  != 0 " :to="`/assetcategory@globalreport${8}`"  class="btn-hover-shine btn-success">Eight Category ({{ globalEightCategoryCount  }})</router-link>
                      <router-link v-if="globalNineCategoryCount   != 0 " :to="`/assetcategory@globalreport${9}`"  class="btn-hover-shine btn-success">Nine Category ({{ globalNineCategoryCount  }})</router-link>
                      <router-link v-if="globalTenCategoryCount    != 0 " :to="`/assetcategory@globalreport${10}`"  class="btn-hover-shine btn-success">Ten Category ({{  globalTenCategoryCount }})</router-link>
                  </div>
                 </td>
              </tr>
          </tbody>
        </table>
      </div>
     </div>

     <!-- <div class="card main-card  element-block-example mt-5">
       <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
         <h3 style="color:black">Asset Category List (Global)</h3>
       </div>
       <div class="table-responsive bg-white">
         <table class="table table-hover table-bordered mb-0">
           <thead>
              <tr style="background:rgba(242, 242, 242, 0.47)">
                <th>Asset Category name</th>
              </tr>
             </thead>
             <tbody>

           </tbody>
         </table>
       </div>
      </div> -->
  </span>
</template>
<script>
    export default {
      data () {
          return {
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
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.assetCategoryListShow();

      },
      methods:{
        assetCategoryListShow(){
          axios.get('/shopAssetCategoryReportOwner').then(res => {
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
          });
          axios.get('/shopAssetCategoryReportGlobal').then(res => {
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
          });

        },
      }
    }
</script>
