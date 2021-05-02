<template id="">
  <span>
    <div class="card main-card  element-block-example">
       <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
         <h3 style="color:black">Asset Theft Report</h3>
       </div>
       <div class="table-responsive bg-white">
         <table class="table table-hover table-bordered table-striped ">
           <thead>
              <tr>
                <th>SN</th>
                <th>Asset__Category__Name </th>
                <th>Asset__Product__Name </th>
                <th>Asset__Supplier__Name</th>
                <th>Asset__Brand__Name</th>
                <th>Purchase__Date__Name</th>
                <th>Mfg__Date</th>
                <th>Expiry__Date</th>
                <th>Invoice__No</th>
                <th>Model__No</th>
                <th>Depreciation</th>
                <th>Warranty</th>
                <th>Guarantee</th>
                <th>Color</th>
                <th>Size</th>
                <th>Description</th>
              </tr>
             </thead>
             <tbody>
               <tr v-for="(shopAssetEntryReport, index) in shopAssetEntryReports.data">
                 <td>{{ index+1 }}</td>
                 <td v-if="shopAssetEntryReport.asset_category_name">{{ shopAssetEntryReport.asset_category_name.assetCategoryName }}</td>
                 <td v-if="shopAssetEntryReport.asset_code_name">{{ shopAssetEntryReport.asset_code_name.assetPorductName }}/{{ shopAssetEntryReport.asset_code_name.assetPorductCode }}</td>
                 <td v-if="shopAssetEntryReport.supplier_name">{{ shopAssetEntryReport.supplier_name.assetSupplierName }}</td>
                 <td v-if="shopAssetEntryReport.asset_brand_name">{{ shopAssetEntryReport.asset_brand_name.assetBrandName }}</td>
                 <td>{{ shopAssetEntryReport.purchasedate }}</td>
                 <td>{{ shopAssetEntryReport.mfgDate }}</td>
                 <td>{{ shopAssetEntryReport.expiryDate }}</td>
                 <td>{{ shopAssetEntryReport.invoiceNo }}</td>
                 <td>{{ shopAssetEntryReport.modelNo }}</td>
                 <td>{{ shopAssetEntryReport.depreciation }}</td>
                 <td>{{ shopAssetEntryReport.warranty }}</td>
                 <td>{{ shopAssetEntryReport.guarantee }}</td>
                 <td>{{ shopAssetEntryReport.color }}</td>
                 <td>{{ shopAssetEntryReport.size | shortlength(50,'...') }}</td>
                 <td>{{ shopAssetEntryReport.description | shortlength(50,'...') }}</td>
               </tr>
             </tbody>
          </table>
        </div>
        <span class="card_footer">
          <pagination :data="shopAssetEntryLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
                shopAssetEntryReports: {},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
            this.assetEntryList();
            this.getPaginateList();
        },
        methods:{
            assetEntryList(){
                axios.get('/shopAssetTheftReport').then(res =>{
                      this.shopAssetEntryReports = res.data.shopAssetEntryReports
                })
            },
            getPaginateList(page = 1){
                axios.get('/shopAssetTheftReport?page=' + page).then(response => {
                     this.shopAssetEntryReports = response.data.shopAssetEntryReports;
                });
            }
        }
    }
</script>
