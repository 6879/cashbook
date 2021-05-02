<template id="">
  <span>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Asset Brand Report (Owner)</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Asset Brand Name</th>
                 <th>Asset Brand Status</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(assetBrandReportOwner, index) in assetBrandReportOwners">
                  <td>{{ index+1 }}</td>
                  <td>{{ assetBrandReportOwner.assetBrandName }}</td>
                  <td>
                    <div v-if="assetBrandReportOwner.assetBrandStatus == 1">
                      <button type="button"  class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                  </td>
                </tr>
              </tbody>
           </table>
         </div>
     </div>

     <div class="card main-card  element-block-example mt-5">
         <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h3 style="color:black">Asset Brand Report (Global)</h3>
         </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered table-striped">
             <thead>
                <tr>
                  <th>SN</th>
                  <th>Asset Brand Name</th>
                  <th>Asset Brand Status</th>
                </tr>
               </thead>
               <tbody>
                 <tr v-for="(assetBrandReportGlobal, index) in assetBrandReportGlobals">
                   <td>{{ index+1 }}</td>
                   <td>{{ assetBrandReportGlobal.assetBrandName }}</td>
                   <td>
                     <div v-if="assetBrandReportGlobal.assetBrandStatus == 1">
                       <button type="button"  class="btn btn-hover-shine btn-success">Published</button>
                     </div>
                     <div v-else>
                       <button type="button"  class="btn btn-hover-shine btn-danger">Unpublish</button>
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
                assetBrandReportOwners:{},
                assetBrandReportGlobals:{},
            }
        },

        mounted(){
            this.shopIncomeTypeReport();
        },
        methods:{
            shopIncomeTypeReport(){
                axios.get('/shopAssetBrandReport').then(res =>{
                    this.assetBrandReportOwners = res.data.assetBrandReportOwner;
                    this.assetBrandReportGlobals = res.data.assetBrandReportGlobal;
                })
            },

        }
    }

</script>
