<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Purchase Invoice Repot</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Purchase Date</th>
               <th>Invoice No</th>
               <th>Purchase Type</th>
               <th>Supplier Name</th>
               <th>Total Purchase</th>
               <th>Carriage Inward</th>
               <th>Total Amount</th>
               <th>Discount</th>
               <th>Supplier Payable</th>
               <th>Other Cost</th>
               <th>Damage_And Warranty</th>
               <th>Total  Cost</th>
               <th>Previous Due</th>
               <th>Current Payable</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(purchaseInvoiceReport, index) in purchaseInvoiceReports.data">
                <td>{{ index+1 }}</td>
                <td>{{ purchaseInvoiceReport.purchaseDate }}</td>
                <td>{{ purchaseInvoiceReport.purchaseInvoiceNo }}</td>
                <td>{{ purchaseInvoiceReport.purchase_type.purchaseTypeName }}</td>
                <td>{{ purchaseInvoiceReport.product_supplier_name.productSupplierName }}</td>
                <td>{{ purchaseInvoiceReport.totalPurchaseValue }}</td>
                <td>
                    <span v-if="purchaseInvoiceReport.carriageInward">
                      {{ purchaseInvoiceReport.carriageInward }}
                    </span>
                    <span v-else>---</span>
                </td>
                <td>{{ purchaseInvoiceReport.totalAmount }}</td>
                <td>
                    <span v-if="purchaseInvoiceReport.discount">
                       {{ purchaseInvoiceReport.discount }}
                    </span>
                    <span v-else>---</span>
                </td>
                <td>{{ purchaseInvoiceReport.supplierPayable }}</td>
                <td>
                    <span v-if="purchaseInvoiceReport.otherCost">
                       {{ purchaseInvoiceReport.otherCost }}
                    </span>
                    <span v-else>---</span>
                </td>
                <td>
                   <span v-if="purchaseInvoiceReport.damageAndWarranty">
                      {{ purchaseInvoiceReport.damageAndWarranty }}
                   </span>
                   <span v-else>---</span>
                <td>{{ purchaseInvoiceReport.totalProductCost }}</td>
                <td>
                  <span v-if="purchaseInvoiceReport.previousPayableDue">{{ purchaseInvoiceReport.previousPayableDue }}</span>
                  <span v-else>---</span>
                </td>
                <td>{{ purchaseInvoiceReport.currentPayable }}</td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="purchaseInvoiceReports" :limit="limit"  @pagination-change-page="getPaginateList">
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
                purchaseInvoiceReports:{},
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
              axios.get('/purchaseInvoiceReport').then(res =>{
                  this.purchaseInvoiceReports = res.data.purchaseInvoiceReports

              })
            },
            getPaginateList(page = 1){
              axios.get('/purchaseInvoiceReport?page=' + page)
              .then(response => {
                  this.purchaseInvoiceReports = response.data.purchaseInvoiceReports;
              });
            },
         }
      }
</script>
