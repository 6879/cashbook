<template id="">
  <span>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Asset Code Report</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
              <tbody>
                <tr  v-for="(assetCategoryIdList, index) in assetCategoryIdLists.data" >
                   <th colspan="5" class="text-center"> <h4>{{ assetCategoryIdList.asset_category_name.assetCategoryName }}</h4>
                       <tr>
                         <th style="width:330px">Asset Product Name</th>
                         <th style="width:330px">Asset Product Code</th>
                         <th style="width:330px">Asset Code Status</th>
                       </tr>
                       <tr v-for="(assetCodeEntryReport, index) in  assetCodeEntryReports" v-if="assetCodeEntryReport.assetCategoryId == assetCategoryIdList.assetCategoryId">

                           <td>{{ assetCodeEntryReport.assetPorductName  }}</td>
                           <td>{{ assetCodeEntryReport.assetPorductCode  }}</td>
                           <td>
                               <div v-if="assetCodeEntryReport.assetCodeStatus == 1">
                                 <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                               </div>
                               <div v-else>
                                 <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                               </div>
                           </td>
                       </tr>
                   </th>
                </tr>
             </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="assetCategoryIdLists" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
         </span>
      </div>

   </span>
</template>
<script>
    export default {
        data(){
            return{
                assetCategoryIdLists:{},
                assetCodeEntryReports:{},
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
            this.shopIncomeTypeReport();
        },
        methods:{
            shopIncomeTypeReport(){
                axios.get('/assetCodeReport').then(res =>{
                    this.assetCodeEntryReports = res.data.assetCodeEntryReports;
                    this.assetCategoryIdLists = res.data.assetCategoryIdLists;
                })
            },
            getPaginateList(page = 1){
              axios.get('/assetCodeReport?page=' + page).then(response => {
                   this.assetCategoryIdLists = response.data.assetCategoryIdLists;
              });
            },
        }
    }

</script>
