<template id="">
  <span>
     <div class="card main-card  element-block-example">
         <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h3 style="color:black">Product Supplier Report</h3>
          </div>
          <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered  table-striped ">
             <thead>
                <tr>
                  <th>SN</th>
                  <th>Supplier Name</th>
                  <th>Supplier Code</th>
                  <th>Supplier Phone</th>
                  <th>Supplier HotLine</th>
                  <th>Supplier Mail</th>
                  <th>Supplier Fb</th>
                  <th>Supplier Web</th>
                  <th>Supplier Imo</th>
                  <th>Supplier Address</th>
                  <th>Total_Purchase Item</th>
                  <th>T.Purchase Amount</th>
                  <th>Action</th>
                </tr>
               </thead>
              <tbody >
                <tr v-for="(productSupplierReport , index) in  productSupplierReports.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ productSupplierReport.productSupplierName }}</td>
                  <td>{{ productSupplierReport.productSupplierCode }}</td>
                  <td>{{ productSupplierReport.productSupplierPhone }}</td>
                  <td>{{ productSupplierReport.productSupplierHotLine }}</td>
                  <td>{{ productSupplierReport.productSupplierMail }}</td>
                  <td>{{ productSupplierReport.productSupplierFb }}</td>
                  <td>{{ productSupplierReport.productSupplierWeb }}</td>
                  <td>{{ productSupplierReport.productSupplierImo }}</td>
                  <td>{{ productSupplierReport.productSupplierAddress }}</td>
                  <td>
                      <span v-for="totalQuantityReport in totalQuantityReports" v-if="totalQuantityReport.productSupplierId == productSupplierReport.productSupplierId">
                        <span v-if="totalQuantityReport.totalQuantity">
                           {{ totalQuantityReport.totalQuantity }}
                        </span>
                        <span v-else>---</span>
                      </span>
                  </td>
                  <td>
                      <span v-for="totalQuantityReport in totalQuantityReports" v-if="totalQuantityReport.productSupplierId == productSupplierReport.productSupplierId">
                        <span v-if="totalQuantityReport.totalPrice">
                           {{ totalQuantityReport.totalPrice }}
                        </span>
                        <span v-else>---</span>
                      </span>
                  </td>
                  <td>
                    <router-link :to="`/supplierinvoice@details${productSupplierReport.productSupplierId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-eye"></i>View Invoice</router-link>
                  </td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="productSupplierReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
                productSupplierReports:{},
                totalQuantityReports:{},
            }
        },
        props:{
          limit: {
            type: Number,
            default: 2
          }
        },
        mounted(){
            this.productSupplierList();
            this.getPaginateList();
        },
        methods:{
            productSupplierList(){
              axios.get('/productSupplierReport').then(res =>{
                  this.productSupplierReports = res.data.productSupplierReports
                  this.totalQuantityReports = res.data.totalQuantityReports
              })
            },
            getPaginateList(page = 1){
              axios.get('/productSupplierReport?page=' + page)
              .then(response => {
                  this.productSupplierGetDatas = response.data.productSupplierGetData;
              });
            },

        }
    }

</script>
