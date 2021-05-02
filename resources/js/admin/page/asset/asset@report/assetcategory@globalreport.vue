<template>
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/assetcategory@report">Asset Category Report</router-link></li>
      </ol>
    </nav>
     <div class="card main-card  element-block-example">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Asset Category Global List</h3>
        </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0 ">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th v-if="this.$route.params.assetCategorylabelId == 1">Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 2">Sub Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 3">Third Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 4">Fore Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 5">Five Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 6">Six Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 7">Seven Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 8">Eight Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 9">Nine Category</th>
               <th v-if="this.$route.params.assetCategorylabelId == 10">Ten Category</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(assetCategoryListShow,index) in assetCategoryListShows">
                  <td>{{index+1}}</td>
                  <td>{{assetCategoryListShow.assetCategoryName}}</td>
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
                assetCategoryListShows:{},
            }
        },

        mounted(){
           this.assetCategoryList()
        },
        methods: {
            assetCategoryList() {
                axios.get('/shopAssetCategoryReportGlobalShow/'+this.$route.params.assetCategorylabelId).then(res => {
                    this.assetCategoryListShows = res.data.assetCategoryList
                })
            },
        }
    }
</script>

<style scoped>

</style>
