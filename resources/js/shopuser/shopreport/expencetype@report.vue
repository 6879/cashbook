<template id="">
  <span>
     <div class="card main-card  element-block-example">
         <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
           <h3 style="color:black">Expence Type Report (Owner)</h3>
          </div>
          <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered mb-0">
             <thead>
                <tr style="background:rgba(242, 242, 242, 0.47)">
                  <th>SN</th>
                  <th>Shop Expence Type Name</th>
                  <th>Shop Expence Type Status</th>
                </tr>
               </thead>
              <tbody >
                <tr v-for="(shopExpenceTypeOwnerReport , index) in  shopExpenceTypeOwnerReports.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ shopExpenceTypeOwnerReport.shopExpenceTypeName }}</td>
                  <td>
                      <div v-if="shopExpenceTypeOwnerReport.shopExpenceTypeStatus == 1">
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
           <pagination :data="shopExpenceTypeOwnerReports" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
      </div>
      <div class="card main-card  element-block-example mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Expence Type Report (Global)</h3>
           </div>
           <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Shop Expence Type Name</th>
                   <th>Shop Expence Type Status</th>
                 </tr>
                </thead>
               <tbody >
                 <tr v-for="(shopExpenceTypeGlobalReport , index) in  shopExpenceTypeGlobalReports.data">
                   <td>{{ index+1 }}</td>
                   <td>{{ shopExpenceTypeGlobalReport.shopExpenceTypeName }}</td>
                   <td>
                       <div v-if="shopExpenceTypeGlobalReport.shopExpenceTypeStatus == 1">
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
            <pagination :data="shopExpenceTypeGlobalReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
                authInfo:{},
                shopExpenceTypeOwnerReports:{},
                shopExpenceTypeGlobalReports:{},
            }
        },
        props:{
          limit: {
            type: Number,
            default: 2
          }
        },
        mounted(){
            this.shopExpenceTypeReport();
            this.getPaginateList();
        },
        methods:{
            shopExpenceTypeReport(){
              axios.get('/shopExpenceTypeReport').then(res =>{
                  this.shopExpenceTypeOwnerReports = res.data.shopExpenceTypeOwnerReport;
                  this.shopExpenceTypeGlobalReports = res.data.shopExpenceTypeGlobalReport;
              })
            },
            getPaginateList(page = 1){
              axios.get('/shopExpenceTypeReport?page=' + page)
              .then(response => {
                  this.shopExpenceTypeOwnerReports = response.data.shopExpenceTypeOwnerReport;
              });
            },
            condition(){
                axios.get('/condition').then(res =>{
                    this.authInfo = res.data.authInfo
                })
            },
        }
    }

</script>
