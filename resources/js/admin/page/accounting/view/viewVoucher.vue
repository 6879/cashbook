 <template id="">
  <span>

 
    <div class="card">


     <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Voucher Information </h4>
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
                        <a target="_blank" href="#">
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
                  <div class="col-12">
                  <center> <h4> <u>
                    <span v-for="voucherTypeList in voucherTypeLists" v-if="voucherTypeList.id==voucherInformation.voucherType">
                    {{ voucherTypeList.name }}
                  </span>
                  </u> </h4> </center>
                  </div>

                    <div class="col invoice-to"> 
                        <div class="to"> Voucher No :{{ voucherInformation.voucherNo }} </div>
                        <div class="address">Payment to :  {{ voucherInformation.paymentTo }}</div>
                        <div class="address">Mobile No :  {{ voucherInformation.mobileNo }}</div>
                        
                    </div>
                    <div class="col invoice-details">
                        
                         <div class="date"> Voucher Date: <br> {{ voucherInformation.voucherDate }}</div>
                        <!-- <div class="date">Due Date: 30/10/2018</div> -->
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>A/C Code </th>
                            <th class="text-left">Particulars </th>
                            <th class="text-right">Taka </th>
                            <th class="text-right">Ps. </th> 
                        </tr> 
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td class="text-left">{{voucherInformation.accountCodeCredit}}</td>
                            <td class="text-left">{{headName}}</td>
                            <td class="text-right">{{voucherInformation.voucherAmount}} </td>
                            <td class="text-right">.00 </td>
                        </tr>
                        
                        <tr>
                            <td class="text-left"> </td>
                            <td class="text-right"> {{voucherInformation.particular}} </td>
                            <td class="text-left"> </td>
                            <td class="text-left"> </td>
                        </tr>
                         

                         <tr> 
                            <td colspan="2" class="text-right"> Grand Total </td>
                            <td class="text-right"> {{ voucherInformation.voucherAmount }} </td>
                            <td class="text-right"> .00 </td>
                        </tr>
                         <tr> 
                            <td colspan="4" class="text-left"> 
                              <b>In Words :</b> One Thousand Taka Only. 
                               </td>
                        </tr>
                    </tbody>
                     
                </table>
                 
            </main>
            
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
      voucherTypeLists: [],
      headName: '',
      form: new Form({
        supplier_id: "",
        scanInformation: "",
      }),
      gets:'',
      invoiceInfo:'',
      voucherInformation:'',
      invoiceProductLists:[],
      purchaseProductList:[],
      supplierInfo:'', 
      
    };
  },
 
  mounted(){
    this.getInvoiceSetupInformation();
    this.getVoucherInformation();
     
  },

  methods: {

    getInvoiceSetupInformation() {
    let uri = `getInvoiceSetupInformation`;
    axios.get(uri).then((response) => {
      this.gets = response.data.data;
    }); 
  },

    getVoucherInformation() { 
    let uri = `getVoucherEntryInformationById/${this.$route.params.id}`;
    axios.get(uri).then((response) => {
     
      this.voucherInformation = response.data.voucherInformation;
      this.headName = response.data.headName;

    });


      let url = "voucherEntryInformation";
      axios.get(url)
        .then((response) => {
          this.voucherTypeLists = response.data.list;
        });
  },

 


  },
};

 
</script>