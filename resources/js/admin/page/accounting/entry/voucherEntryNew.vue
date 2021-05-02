<template id="">
  <span>

  

    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Voucher Entry </h4>
        </div>
      </div>


<form @submit.prevent="addNewVoucherInformation"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

     
         <div
          class="col-lg-8 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
            <div class="row">
            <div class="col-lg-6">
            <div class="form-group">
              <label> Date <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="date"
                v-model="form.voucherDate"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherDate') }"
                disabled
              > 
              <has-error :form="form" field="voucherDate"></has-error>
            </div>
            
            
            <div class="form-group">
              <label> Voucher Type <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.voucherType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherType') }"
                @change="getVoucherCode()"
                >
                <option value="">Select Voucher Type</option>
                <option v-for="voucherTypeList in voucherTypeLists" :value="voucherTypeList.id"> {{voucherTypeList.name}} </option> 
              </select>
              <has-error :form="form" field="voucherType"></has-error>
            </div>

            
             
            
            <div class="form-group">
              <label> Voucher No
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherNo') }"
                disabled
                >
              <has-error :form="form" field="voucherNo"></has-error>
            </div>
            
            <div class="downOfVoucherNo" v-if="paymentToStatus">
            <div class="form-group">
              <label> {{paymentTo}} (Person Name)
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.paymentTo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('paymentTo') }"
                >
              <has-error :form="form" field="paymentTo"></has-error>
            </div>
            
            <div class="form-group">
              <label> Mobile No
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.mobileNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('mobileNo') }"
                >
              <has-error :form="form" field="mobileNo"></has-error>
            </div>
            
            
            <div class="bankInfo" v-if="bankInfo">
                
            <div class="form-group">
              <label> Check Payment Type
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.checkPaymentType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('checkPaymentType') }"
                @change="checkPaymentType()"
                >
                <option value=""> Select </option>
                <option value="1"> Cash Check </option>
                <option value="2"> Account Payable Check </option>
              </select>
              <has-error :form="form" field="checkPaymentType"></has-error>
            </div>

            <div class="form-group" v-if="receiverBankAccountNameStatus">
              <label> Receiver Bank Account Name
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.receiverBankAccountName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('receiverBankAccountName') }"
                >
              <has-error :form="form" field="receiverBankAccountName"></has-error>
            </div>

            
            <div class="form-group">
              <label> Cheque No 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.chequeNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('chequeNo') }"
                >
              <has-error :form="form" field="chequeNo"></has-error>
            </div>
            
            <div class="form-group">
              <label> Cheque Date 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="date"
                v-model="form.chequeDate"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('chequeDate') }"
                >
              <has-error :form="form" field="chequeDate"></has-error>
            </div>
            </div>


            </div>
 
          </div>



            <div class="col-lg-6">
            <div class="form-group">
              <!-- there show register from chart of accounts -->
              <label> {{headOfCashBookTitle}} <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headOfCashBook"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headOfCashBook') }"
              >
              <option value=""> -------------- </option>
              <option v-for="headOfCashBookList in headOfCashBookLists"
              :value="headOfCashBookList.headCode"> {{headOfCashBookList.headName}} </option>
              </select>
              <has-error :form="form" field="headOfCashBook"></has-error>
            </div>
            
            
            <div class="form-group">
              <!-- there show sub ladger from chart of accounts -->
              <label> Head Of Accounts <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headOfAccounts"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headOfAccounts') }"
                @change="getSubHeadOfAccounts()"
                >
                <option value=""> ---------------- </option>
                <option v-for="headOfAccountList in headOfAccountLists" 
                :value="headOfAccountList.headCode"> {{headOfAccountList.headName}} </option> 
              </select>
              <has-error :form="form" field="headOfAccounts"></has-error>
            </div>
            
            
            <div class="form-group" v-if="subHeadStatus">
              <!-- there show register from chart of accounts -->
              <label> Sub Head  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.subHead"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('subHead') }"
                >
                <option v-for="subHeadOfAccountList in subHeadOfAccountLists" 
                :value="subHeadOfAccountList.headCode"> {{subHeadOfAccountList.headName}} </option> 
              </select>
              <has-error :form="form" field="subHead"></has-error>
            </div>

            
             
            
            <div class="form-group">
              <label> Amount
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherAmount"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherAmount') }"
                >
              <has-error :form="form" field="voucherAmount"></has-error>
            </div>
            
            <div class="form-group">
              <label> Particular
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <textarea
                v-model="form.particular"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('particular') }"
                rows="5"
                ></textarea>
              <has-error :form="form" field="particular"></has-error>
            </div>
            
          
 
          </div>
          </div>


        </div>
 
        

        
        </div>




        <!-- -----------------------------   card footer  -->
 
<div class="d-block pt-3 pb-4 card-footer overflow-hidden">
<div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12">


                                <button type="reset" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-outline-danger btn-lg float-left">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-undo "></i>
                                    </span>
                                    <span class="mr-1"> Clear </span>
                                </button>

                                <button type="submit" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg float-right">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-paper-plane"></i>
                                    </span>
                                    <span class="mr-1"> Add New Entry </span>
                                </button>


                            </div>
                            </div>
 
<!-- -----------------------------   // card footer  --> 


        
        </form>
 
    </div>

    <div class="card mt-5">
      <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          View Information </h4>
      </div>

      <div class="supplier-entry py-4 px-2">
         <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>SL</th>
                <th>Date</th>
                <th>Voucher No </th>
                <th>Voucher Type </th>
                <th> Amount </th>
                <th> View </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              <tr
              v-for="voucherInformationList,index in voucherInformationLists" 
              :key="voucherInformationList.id">
                <td>{{ ++index }}</td>
                <td>{{ voucherInformationList.voucherDate }}</td>
                <td>{{ voucherInformationList.voucherNo }}</td>
                <td>
                  <span v-for="voucherTypeList in voucherTypeLists" v-if="voucherTypeList.id==voucherInformationList.voucherType">
                    {{ voucherTypeList.name }}
                  </span>
                  </td>
                <td>{{ voucherInformationList.voucherAmount }}</td>
                 
                <td>
                  <router-link
                    :to="`/viewVoucher${voucherInformationList.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-eye"></i> View</router-link
                  >
                </td>
                <td>
                  <button 
                    @click.prevent="deletePost(voucherInformationList.id)"
                    class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                >
                  <i class="fa fa-trash"></i>Delete
                  </button>
                </td> 
              </tr>
            </tbody>
          </table>


 
        </div>
      </div>
    </div>
  </span>
</template>

<style>
.tree{
  width:1px;
  height: 51px;
  background: black;
  position: relative;
  float: left;
  margin-right: 30px;
  
}  
.tree1{
  width: 30px;
  height: 1px;
  background: rgb(0, 0, 0);
  margin-top: 25px;
}
</style>

<script>
export default {

  
  data() {
    return {
      voucherTypeLists: [],
      voucherInformationLists: [],
      paymentTo:'Pay by',
      paymentToStatus:true,
      bankInfo:false,
      receiverBankAccountNameStatus:false,
      headOfCashBookTitle:'Head Of Cash Book',
      headOfCashBookLists:[],
      headOfAccountLists:[],
      subHeadOfAccountLists:[],
      subHeadStatus:false,

 
      form: new Form({
                        voucherDate: new Date().toISOString().slice(0,10),
                        voucherType: "",
                        voucherNo: "",
                        paymentTo: "",
                        mobileNo: "",
                        checkPaymentType: "",
                        receiverBankAccountName: "",
                        chequeNo: "",
                        chequeDate: "",
                        headOfCashBook: "",
                        headOfAccounts: "",
                        subHead: "",
                        voucherAmount: "",
                        particular: "",
      }),
       
    };
  },
  mounted() {
    this.view(); 
  },
  methods: {
    view() {
      let url = "voucherEntryInformation";
      axios.get(url)
        .then((response) => {
          this.voucherInformationLists = response.data.voucherInformation;
          this.voucherTypeLists = response.data.list;
        });
    },

 getVoucherCode(){

   this.form.headOfCashBook='';
   this.form.headOfAccounts='';
   this.subHeadStatus=false;
   this.form.subHead='';
   this.headOfCashBookLists=[];
   this.headOfAccountLists=[];


let url = "getVoucherCode/"+this.form.voucherType;
      axios.get(url)
        .then((response) => {
          this.form.voucherNo = response.data.code;
        });


        


        if(this.form.voucherType == 1){
              this.paymentTo = 'Pay by';
              this.headOfCashBookTitle = 'Head Of Cash Book';
              this.paymentToStatus = true;
              this.bankInfo = false;


              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code

        }

        else if(this.form.voucherType == 2){
              this.paymentTo = 'Receive by';
              this.headOfCashBookTitle = 'Head Of Cash Book'
              this.paymentToStatus = true;
              this.bankInfo = false;


              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code

        }

        else if(this.form.voucherType == 3){
              this.paymentTo = 'Pay by';
              this.headOfCashBookTitle = 'Head Of Bank Book'
              this.paymentToStatus = true;
              this.bankInfo = true;

              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code
        }

        else if(this.form.voucherType == 4){
              this.paymentTo = 'Receive by';
              this.headOfCashBookTitle = 'Head Of Bank Book'
              this.paymentToStatus = true;
              this.bankInfo = true;

              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code
        }

        else if(this.form.voucherType == 5){
              this.paymentTo = 'Receive by';
              this.paymentToStatus = false;
              this.bankInfo = false;

              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code
        }

        else if(this.form.voucherType == 6){
              this.paymentTo = 'Receive by';
              this.paymentToStatus = false;
              this.bankInfo = false;

              // get voucher head code
                      let url = "getVoucherHeadCashbookCode/"+this.form.voucherType;
                      axios.get(url).then((response) => {
                        this.headOfCashBookLists = response.data.headOfCashBookList;
                        this.headOfAccountLists = response.data.headOfAccountList;
                      });
              // get voucher head code
        }
 },
getSubHeadOfAccounts(){
                // get voucher head code
                      let url = "getSubHeadOfAccounts/"+this.form.headOfAccounts;
                      axios.get(url).then((response) => {
                        this.subHeadStatus = true;
                        this.subHeadOfAccountLists = response.data.subHeadList;
                      });
              // get voucher head code
},
 checkPaymentType(){
     if(this.form.checkPaymentType==2){
     this.receiverBankAccountNameStatus = true;
     }else{
     this.receiverBankAccountNameStatus = false;
     }
 },
    
 

    deletePost(id) {
      let uri = `voucherEntryInformation/${id}`;
      axios.delete(uri).then((response) => {
        Toast.fire({
                icon: 'success',
                title: 'Delete Successfull.'
            })
        this.view();
      });
    },
 
 

    addNewVoucherInformation() {
      this.form.post("voucherEntryInformation").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
              background: '#c9f4c9', //green
            title: "Voucher Entry Successfull.",
          }),

          this.view();
          this.form.reset();
          
      });
    },
  },
};
</script>