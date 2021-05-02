 <template id="">
  <span>

 
    <div class="card">


     <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Purchase Invoice </h4>
          </div>




      <div class="card-body">
        

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice"  onclick="jQuery('#invoice').print()"  class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
        </div>
        <hr>
    </div>
        
        
        
        
        <div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header  :style="'border-bottom-color:'+gets.themeColor">
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img :src="'images/'+ gets.logo" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <!-- <h2 class="name">
                            <a target="_blank" href="#">
                            
                            </a>
                        </h2> -->
                        <div>  {{gets.address}} </div>
                        <!-- <div>(123) 456-789</div>
                        <div>company@example.com</div> -->
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">  Supplier Informatioin </div>
                        <h2 class="to"> {{ supplierInfo.productSupplierName }} </h2>
                        <div class="address">{{ supplierInfo.productSupplierAddress }}</div>
                        <div class="email">
                          <a 
                          :href="'mailto:'+ supplierInfo.productSupplierMail " 
                         :style="'color:'+gets.themeColor">
                          {{ supplierInfo.productSupplierMail }}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id"  :style="'color:'+gets.themeColor"> {{gets.titleText}} {{invoiceInfo.purchaseInvoiceNo}} </h1>
                        <div class="date"> Purchase Date: {{ invoiceInfo.purchaseDate }}</div>
                        <!-- <div class="date">Due Date: 30/10/2018</div> -->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">UNIT PRICE</th>
                            <th class="text-right">UNIT</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="invoiceProductList,index in invoiceProductLists">
                            <td class="no" :style="'background:'+gets.themeColor">{{++index}}</td>
                            <td class="text-left">
                              {{invoiceProductList.productId}}
                              <h3 
                              :style="'color:'+gets.themeColor"
                              v-for="purchaseProductLists in purchaseProductList"
                              v-if="purchaseProductLists.productNameId==invoiceProductList.productId"
                              >
                              {{purchaseProductLists.productName}}</h3>
                            </td>
                            <td class="unit"> {{invoiceProductList.quantity}} </td>
                            <td class="qty"> {{invoiceProductList.unitPrice}} </td>
                            <td class="total" :style="'background:'+gets.themeColor">{{invoiceProductList.totalPrice}}</td>
                        </tr>
                         
                    </tbody>
                    <tfoot>
                        <tr> 
                            <td colspan="4"> {{ gets.subTotal }} </td>
                            <td> {{ invoiceInfo.totalPurchaseValue }} </td>
                        </tr>
                        <tr> 
                            <td colspan="4"> Carrage Inward </td>
                            <td> {{ invoiceInfo.carriageInward }} </td>
                        </tr>
                        <tr> 
                            <td colspan="4"> Total Amount </td>
                            <td> {{ invoiceInfo.totalAmount }} </td>
                        </tr>
                        <tr> 
                            <td colspan="4"> Discount </td>
                             <td class="bg-light"> {{ invoiceInfo.discount }} </td>
                        </tr>
                        <tr> 
                            <td  colspan="4"> Supplier Payable </td>
                             <td class="bg-light"> {{ invoiceInfo.supplierPayable }} </td>
                        </tr>
                        <tr> 
                            <td colspan="4"> Other Cost </td>
                             <td> {{ invoiceInfo.otherCost }} </td>
                        </tr> 
                        <tr> 
                            <td colspan="4"> Damage & Warrenty </td>
                             <td> {{ invoiceInfo.damageAndWarranty }} </td>
                        </tr> 
                        <tr> 
                            <td colspan="4"> Total Product Cost </td>
                             <td> {{ invoiceInfo.totalProductCost }} </td>
                        </tr> 
                        <tr>
                        <tr> 
                            <td colspan="4"> Current Payable </td>
                             <td class="bg-light"> {{ invoiceInfo.currentPayable }} </td>
                        </tr> 
                        <!-- <tr>
                            <td colspan="2"></td>
                            <td colspan="2"  :style="'color:'+gets.themeColor">  {{ gets.grandTotal }}  </td>
                            <td  :style="'color:'+gets.themeColor">$6,500.00</td>
                        </tr> -->
                    </tfoot>
                </table>
                <div class="thanks">  {{ gets.thankyou }}  </div>
                <div class="notices" :style="'border-color:'+gets.themeColor">
                    <div> {{ gets.noticeTitle }} </div>
                    <div class="notice"> {{ gets.noticeDetails }} </div>
                </div>
            </main>
            <footer >
                {{gets.generatedFrom }}  
                 
                        </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>





    </div>
    </div>

  
  </span>
</template>

 

<script>


 



export default {
  data() {
    return {
      form: new Form({
        supplier_id: "",
        scanInformation: "",
      }),
      gets:'',
      invoiceInfo:'',
      invoiceProductLists:[],
      purchaseProductList:[],
      supplierInfo:'', 
      
    };
  },
 
  mounted(){
    this.getInvoiceSetupInformation();
    this.getInvoiceInformation();
    this.getSupplyerInformation();
    this.getProductList();
     
  },

  methods: {

    getInvoiceSetupInformation() {
    let uri = `getInvoiceSetupInformation`;
    axios.get(uri).then((response) => {
      this.gets = response.data.data;
    });
  },

    getInvoiceInformation() {
    let uri = `getInvoiceInformation/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
      this.supplier_id = response.data.data.productSupplierId;
      this.invoiceInfo = response.data.data;
      this.invoiceProductLists = response.data.invoiceProductLists;
      this.supplierInfo = response.data.supplierInfo;
      this.purchaseProductList = response.data.purchaseProductList;
    });
  },

 


  },
};

 
</script>