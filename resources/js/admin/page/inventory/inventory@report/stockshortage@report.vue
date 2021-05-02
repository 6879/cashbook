<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Stock Shortage Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Product Name</th>
               <th>Unit Price</th>
               <th>Total Price</th>
               <th>Alert Quantity</th>
               <th>Current Quantity</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(lowQuantityReport, index) in lowQuantityReports.data">
                <td>{{ index+1 }}</td>
                <td>{{ lowQuantityReport.product_name.productName }} ({{ lowQuantityReport.product_name.productCode }})</td>
                <td v-if="lowQuantityReport.purchase_product_info">{{ lowQuantityReport.purchase_product_info.unitPrice }}</td>
                <td v-else></td>
                <td v-if="lowQuantityReport.purchase_product_info">{{ lowQuantityReport.purchase_product_info.totalPrice }}</td>
                <td v-else></td>
                <td>
                  <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-danger">{{ lowQuantityReport.quantityNoti }}</button>
                </td>
                <td v-if="lowQuantityReport.purchase_product_info">
                    <div><button :class=" lowQuantityReport.purchase_product_info.quantity <=  lowQuantityReport.quantityNoti? 'mr-2 btn-pill btn-hover-shine btn btn-danger': 'mr-2 btn-pill btn-hover-shine btn btn-primary'">{{ lowQuantityReport.purchase_product_info.quantity }}</button></div>
                </td>
                <td v-else></td>
              </tr>
            </tbody>
         </table>
        </div>
        <span class="card_footer">
          <pagination :data="lowQuantityReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
           lowQuantityReports:{},
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
       this.purchaseProductReport();
    },
    methods:{
        purchaseProductReport(){
          axios.get('/stockShortageProductReport').then(res => {
               this.lowQuantityReports = res.data.lowQuantityReports;
          });
        },
        getPaginateList(page = 1){
          axios.get('/stockShortageProductReport?page=' + page).then(response => {
            this.lowQuantityReports = response.data.lowQuantityReports;
          });
       },
     }
  }

</script>
