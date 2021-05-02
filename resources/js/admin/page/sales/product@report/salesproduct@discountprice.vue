<template>
  <span>
    <div class="card">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Sales Product Discount Price List</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Product_Name</th>
                 <th>MRP_Price</th>
                 <th>MRP_Discount_Start_Date</th>
                 <th>MRP_Discount_Expired_Date</th>
                 <th>Sales_Price</th>
                 <th>Sales_Discount_Start_Date</th>
                 <th>Sales_Discount_Expired_Date</th>
                 <th>Wholesale_Price</th>
                 <th>Wholesale_Discount_Start_Date</th>
                 <th>Wholesale_Discount_Expired_Date</th>
                 <th>Special_Price</th>
                 <th>Special_Discount_Start_Date</th>
                 <th>Special_Discount_Expired_Date</th>
                 <th>E-Commerce_Price</th>
                 <th>E-Commerce_Discount_Start_Date</th>
                 <th>E-Commerce_Discount_Expired_Date</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(salesProductDiscountPriceReport, index) in salesProductDiscountPriceReports.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ salesProductDiscountPriceReport.product_name.productName }}</td>
                  <td>{{ salesProductDiscountPriceReport.mrpPrice }}</td>
                  <td>{{ salesProductDiscountPriceReport.mrpStartDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.mrpExpiredDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.salesPrice }}</td>
                  <td>{{ salesProductDiscountPriceReport.salesStartDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.salesExpiredDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.wholesalePrice }}</td>
                  <td>{{ salesProductDiscountPriceReport.wholesaleStartDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.wholesaleExpiredDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.specialPrice }}</td>
                  <td>{{ salesProductDiscountPriceReport.specialStartDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.specialExpiredDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.eCommercePrice }}</td>
                  <td>{{ salesProductDiscountPriceReport.eCommerceStartDate }}</td>
                  <td>{{ salesProductDiscountPriceReport.eCommerceExpiredDate }}</td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="salesProductDiscountPriceReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
              salesProductDiscountPriceReports:{},
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
            this.salesProductDiscountPriceList()
        },
        methods:{
          salesProductDiscountPriceList() {
              axios.get('/salesProductDiscountPriceReport').then(res => {
                    this.salesProductDiscountPriceReports = res.data.salesProductDiscountPriceReports
              })
          },
          getPaginateList(page = 1){
            axios.get('/salesProductDiscountPriceReport?page=' + page)
            .then(response => {
                 this.salesProductDiscountPriceReports = response.data.salesProductDiscountPriceReports;
            });
          },
       }
    }

</script>
