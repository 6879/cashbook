<template>
  <span>
    <div class="card">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Sales Product Price Report</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
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
                  <td>{{ salesProductPriceReport.product_name.productName }}</td>
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
        data(){
            return{
              salesProductPriceReports:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
            this.getPaginateList()
            this.salesProductPriceReport()
        },
        methods:{
          salesProductPriceReport() {
              axios.get('/salesProductPriceReport').then(res => {
                    this.salesProductPriceReports = res.data.salesProductPriceReports
              })
          },
          getPaginateList(page = 1){
            axios.get('/salesProductPriceReport?page=' + page)
            .then(response => {
                 this.salesProductPriceReports = response.data.salesProductPriceReports;
            });
          },
       }
    }

</script>
