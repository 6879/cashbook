<template id="">
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/productsupplier@report">Product Supplier Report</router-link></li>
      </ol>
    </nav>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Purchase Invoice List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Purchase Date</th>
               <th>Purchase Invoice No</th>
               <th>Total Purchase Value</th>
               <th>Total Discount</th>
               <th>Total Purcase Cost</th>
               <th>Due</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(purchaseInvoiceReport, index) in purchaseInvoiceReports">
                <td>{{ index+1 }}</td>
                <td>{{ purchaseInvoiceReport.purchaseDate }}</td>
                <td>{{ purchaseInvoiceReport.purchaseInvoiceNo }}</td>
                <td>{{ purchaseInvoiceReport.totalPurchaseValue }}</td>
                <td>{{ purchaseInvoiceReport.discount }}</td>
                <td>{{ purchaseInvoiceReport.currentPayable }}</td>
                <td>
                    <span v-if="purchaseInvoiceReport.previousPayableDue">{{ purchaseInvoiceReport.previousPayableDue }}</span>
                    <span v-else>---</span>
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
                purchaseInvoiceReports:{},
            }
        },
        mounted(){
            this.productSupplierList();
        },
        methods:{
            productSupplierList(){
              axios.get('/supplierInvoiceDetails/'+this.$route.params.productSupplierId).then(res =>{
                  this.purchaseInvoiceReports = res.data.purchaseInvoiceReports

              })
            },
        }
      }
</script>
