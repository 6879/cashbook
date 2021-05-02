<template id="">
  <span>
     <div class="card main-card  element-block-example">
         <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
           <h3 style="color:black">Income Type Report (Owner)</h3>
          </div>
          <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered mb-0">
             <thead>
                <tr style="background:rgba(242, 242, 242, 0.47)">
                  <th>SN</th>
                  <th>Shop Income Type Name</th>
                  <th>Shop Income Type Status</th>
                </tr>
               </thead>
              <tbody >
                <tr v-for="(shopIncomeTypeOwnerReport , index) in  shopIncomeTypeOwnerReports.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ shopIncomeTypeOwnerReport.shopIncomeTypeName }}</td>
                  <td>
                      <div v-if="shopIncomeTypeOwnerReport.shopIncomeTypeStatus == 1">
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
         <span class="card_footer">
           <pagination :data="shopIncomeTypeOwnerReports" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
      </div>



      <div class="card main-card  element-block-example mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Income Type Report (Global)</h3>
           </div>
           <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Shop Income Type Name</th>
                   <th>Shop Income Type Status</th>
                 </tr>
                </thead>
               <tbody >
                 <tr v-for="(shopIncomeTypeGlobalReport , index) in  shopIncomeTypeGlobalReports.data">
                   <td>{{ index+1 }}</td>
                   <td>{{ shopIncomeTypeGlobalReport.shopIncomeTypeName }}</td>
                   <td>
                       <div v-if="shopIncomeTypeGlobalReport.shopIncomeTypeStatus == 1">
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
          <span class="card_footer">
            <pagination :data="shopIncomeTypeGlobalReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
                shopIncomeTypeOwnerReports:{},
                shopIncomeTypeGlobalReports:{},
            }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.shopIncomeTypeReport();
            this.getPaginateList();
        },
        methods:{
            shopIncomeTypeReport(){
                axios.get('/shopIncomeTypeReport').then(res =>{
                    this.shopIncomeTypeOwnerReports = res.data.shopIncomeTypeOwnerReport;
                    this.shopIncomeTypeGlobalReports = res.data.shopIncomeTypeGlobalReport;
                })
            },
            getPaginateList(page = 1){
                axios.get('/shopIncomeTypeReport?page=' + page)
                    .then(res => {
                        this.shopIncomeTypeOwnerReports = res.data.shopIncomeTypeOwnerReport;
                        this.shopIncomeTypeGlobalReports = res.data.shopIncomeTypeGlobalReport;
                    });
            },
        }
    }

</script>
