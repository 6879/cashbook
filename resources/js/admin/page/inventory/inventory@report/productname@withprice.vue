<template id="">
  <span>
    <div class="card main-card  element-block-example" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Product Name With Price</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Product Name</th>
               <th>MRP Price</th>
               <th>Sales Price</th>
               <th>Wholesale Price</th>
               <th>Special Price</th>
               <th>E-Commerce Price</th>
               <th>Created Date</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(salesProductPriceReport, index) in salesProductPriceReports.data">
                <td>{{ index+1 }}</td>
                <td>{{ salesProductPriceReport.product_name.productName }} ({{ salesProductPriceReport.product_name.productCode }})</td>
                <td>{{ salesProductPriceReport.mrpPrice }}</td>
                <td>{{ salesProductPriceReport.salesPrice }}</td>
                <td>{{ salesProductPriceReport.wholesalePrice }}</td>
                <td>{{ salesProductPriceReport.specialPrice }}</td>
                <td>{{ salesProductPriceReport.eCommercePrice }}</td>
                <td>{{ salesProductPriceReport.created_at }}</td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="salesProductPriceReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
             salesProductPriceReports:{},
             role:{},
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.productPriceSetupList();
         this.getPaginateList();
         this.conditon();
      },
      methods:{
          productPriceSetupList(){
            axios.get('/inventoryProductNameWithPrice').then(res =>{
                this.salesProductPriceReports =  res.data.salesProductPriceReports
            })
          },
          getPaginateList(page = 1){
            axios.get('/inventoryProductNameWithPrice?page=' + page).then(response => {
              this.salesProductPriceReports = response.data.salesProductPriceReports;
            });
          },
          conditon(){
              axios.get('/condition').then(res =>{
                 this.role = res.data.authInfo;
              })
          },
      }
    }
</script>
