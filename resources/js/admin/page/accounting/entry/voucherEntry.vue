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


<form @submit.prevent="addChartOfAccount"> 
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
              > 
              <has-error :form="form" field="voucherDate"></has-error>
            </div>
            
            
            <div class="form-group">
              <label> Voucher Type <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.voucherType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherType') }"
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
                >
              <has-error :form="form" field="voucherNo"></has-error>
            </div>
            
            <div class="form-group">
              <label> Payment To
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherNo') }"
                >
              <has-error :form="form" field="voucherNo"></has-error>
            </div>
            
            <div class="form-group">
              <label> Mobile No
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherNo') }"
                >
              <has-error :form="form" field="voucherNo"></has-error>
            </div>
 
          </div>



            <div class="col-lg-6">
            <div class="form-group">
              <label> Head Of Cash Book <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherDate1"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherDate1') }"
              > 
              <has-error :form="form" field="voucherDate1"></has-error>
            </div>
            
            
            <div class="form-group">
              <label> Head Of Accounts <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.voucherType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherType') }"
                >
                <option value="">Select Voucher Type</option>
                <option value="1"> Debit </option> 
              </select>
              <has-error :form="form" field="voucherType"></has-error>
            </div>

            
             
            
            <div class="form-group">
              <label> Amount
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.voucherNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherNo') }"
                >
              <has-error :form="form" field="voucherNo"></has-error>
            </div>
            
            <div class="form-group">
              <label> Particular
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <textarea
                v-model="form.voucherNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('voucherNo') }"
                rows="5"
                ></textarea>
              <has-error :form="form" field="voucherNo"></has-error>
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
                <th>Head Code</th>
                <th>Head Name</th>
                <th>Level</th>
                <th>Type</th>
                <th>Position</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr
              v-for="chartOfAccount in chartOfAccounts" 
              :key="chartOfAccount.id">
                <td>{{ chartOfAccount.headCode }}</td>
                <td class="pt-0 pb-0">
                  <div class="float-left mt-3"> {{ chartOfAccount.headName }} </div> </td>
                <td>Level {{ chartOfAccount.headLavel }}</td>
                <td>
                  <span v-for="accountGroup in accountGroups"
                  v-if="accountGroup.id==chartOfAccount.headGroupId"
                  >
                  {{ accountGroup.groupName }}
                  </span>
                  </td>
                <td>
                  <span v-for="accountGroupType in accountGroupTypes"
                  v-if="accountGroupType.id==chartOfAccount.headGroupType"
                  >
                  <span class="mt-2 ml-3"> {{ accountGroupType.name }} </span>
                  </span>
                  </td>
                
                <td>
                  <router-link
                    :to="`/qrCodeSetup@Edit${chartOfAccount.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i>Edit</router-link
                  >
                </td>
                <td>
                  <button 
                    @click.prevent="deletePost(chartOfAccount.id)"
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
      chartOfAccounts: [],
      accountGroupTypes: [],
      newChartOfAccounts: [],

      image: "",
      form: new Form({
                        voucherDate: new Date().toISOString().slice(0,10),
                        headGroupId: "",
                        dr_cr: "",
                        headCode: "",
                        headName: "",
                        headLavel: "",
      }),
      qrCodeSetup: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {
    this.view();
    this.voucherTypeLists();
  },
  methods: {
    view() {
      let url = "voucherEntryInformation";
      axios.get(url)
        .then((response) => {
          this.chartOfAccounts = response.data.chartOfAccounts;
        });
    },

    voucherTypeLists(){
          let uri = `voucherTypeList`;
        axios.get(uri).then(response=>{
          this.voucherTypeLists = response.data.list;
        });
        
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
 
 

    addChartOfAccount() {
      this.form.post("voucherEntryInformation").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
              background: '#c9f4c9', //green
            title: "Chart of account add Successfull.",
          }),

          this.view();
          this.form.reset();
          
      });
    },
  },
};
</script>