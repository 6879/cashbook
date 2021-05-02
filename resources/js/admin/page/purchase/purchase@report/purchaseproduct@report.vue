<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Purchase Product Repot</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered  table-striped">
           <thead>
              <tr>
                 <th>SN</th>
                 <th>Product Name</th>
                 <th>Last Purchase Date</th>
                 <th>Quantity</th>
                 <th>Total Price</th>
                 <th>Action</th>
               </tr>
            </thead>
            <tbody>
              <tr v-for="(purchaseProductReport, index) in purchaseProductReports.data">
                <td>{{ index+1 }}</td>
                <td v-if="purchaseProductReport.product_name">{{ purchaseProductReport.product_name.productName }} ({{ purchaseProductReport.product_name.productCode }})</td>
                <td>{{ purchaseProductReport.created_at }}</td>
                <td>{{ purchaseProductReport.totalQuantity }}</td>
                <td>{{ purchaseProductReport.totalPrice }}</td>
                <td>
                  <router-link :to="`/purchaseproduct@reportList${purchaseProductReport.productId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-eye pr-2"></i>View Details</router-link>
                </td>
              </tr>
            </tbody>
        </table>
       </div>
       <span class="card_footer">
         <pagination :data="purchaseProductReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
            purchaseProductReports:{},
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
            axios.get('/purchaseProductReport').then(res =>{
                this.purchaseProductReports = res.data.purchaseProductReports
            })
          },
          getPaginateList(page = 1){
            axios.get('/purchaseProductReport?page=' + page).then(response => {
                this.purchaseProductReports = response.data.purchaseProductReports;
            });
          },
       }
  }
</script>
