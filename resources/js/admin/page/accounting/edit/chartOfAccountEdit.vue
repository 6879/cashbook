 <template id="">
  <span>
    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Edit Chart Of Accounts </h4>
        </div>
      </div>


<form @submit.prevent="editChartOfAccount"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
          <div class="form-group">
              <label> Head Up Link <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
  
              <select
                v-model="form.pre_code"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('pre_code') }"
                disabled
              >
                <option value="0"> Select </option>
                <option v-for="chartOfAccount in chartOfAccounts" :value="chartOfAccount.headCode"> {{chartOfAccount.headName}} </option> 
              </select>
              <has-error :form="form" field="pre_code"></has-error>
            </div>


            <div class="form-group">
              <label> Head Level <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headLavel"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headLavel') }"
                disabled
              >
                <option value="">Select Level</option>
                <option value="1">Level 1</option>
                <option value="2">Level 2</option>
                <option value="3">Level 3</option>
                <option value="4">Level 4</option>
                <option value="5">Level 5</option>
                <option value="6">Level 6</option>
                <option value="7">Level 7</option>
                <option value="8">Level 8</option>
                <option value="9">Level 9</option>
                <option value="10">Level 10</option>
              </select>
              <has-error :form="form" field="headLavel"></has-error>
            </div>
              <!-- <small v-if="exit==true" class="text-danger"> this is already exist. </small> -->
              

            <div class="form-group">
              <label> Head Name <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.headName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headName') }"
              >
              <has-error :form="form" field="headName"></has-error>
            </div>
 
              

            <div class="form-group">
              <label> Head Code <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.headCode"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headCode') }"
                disabled
              >
              <has-error :form="form" field="headCode"></has-error>
            </div>

            
            <div class="form-group">
              <label> Account Type <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.dr_cr"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('dr_cr') }"
                >
                <option value="">Select Account Type</option>
                <option value="1"> Debit </option>
                <option value="2"> Credit </option>
              </select>
              <has-error :form="form" field="dr_cr"></has-error>
            </div>

            
            
            
            <div class="form-group">
              <label> Type 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headGroupId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headGroupId') }"
                >
                <option value="">Select Head Group</option>
                <option
                v-for="accountGroup in accountGroups"
                 :value="accountGroup.id"> {{accountGroup.groupName}}  </option>
              </select>
              <has-error :form="form" field="headGroupId"></has-error>
            </div>

            
            <div class="form-group">
              <label> Ladger/Register 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headGroupType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headGroupType') }"
                >
                <option value=""> ------- </option>
                <option 
                v-for="accountGroupType in accountGroupTypes" 
                :value="accountGroupType.id">  {{accountGroupType.name}}  </option> 
              </select>
              <has-error :form="form" field="headGroupType"></has-error>
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

  
  </span>
</template>

<script>
    export default {

      data() {
        return {
                    accountGroups: [],
                    chartOfAccounts: [],
                    accountGroupTypes: [],
                    newChartOfAccounts: [],
            form: new Form({
                       pre_code: "",
                        headGroupType: "",
                        headGroupId: "",
                        dr_cr: "",
                        headCode: "",
                        headName: "",
                        headLavel: "",
                }),
        
        }
      },
  mounted() {
    this.view();
    this.getAccountGroup();
    this.getaccountGroupTypes();
    this.getUplinkInformation();
  },
      methods: {

        view() {
        let uri = `chartOfAccount/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data.data);
        });


        let url = "chartOfAccount";
      axios.get(url)
        .then((response) => {
          this.chartOfAccounts = response.data.chartOfAccounts;
        });


      },

       

        getAccountGroup(){
          let uri = `getAccountGroup`;
        axios.get(uri).then(response=>{
            this.accountGroups = response.data.accountGroups;
        })
    },
    
    getaccountGroupTypes(){
          let uri = `accountGroupTypes`;
        axios.get(uri).then(response=>{
            this.accountGroupTypes = response.data.accountGroupTypes;
        })
    },
 


        editChartOfAccount() {
          let uri = `chartOfAccount/${this.$route.params.id}`;
          axios.put(uri, this.form).then((response) => {

                        Toast.fire({
                        icon: 'success',
                        title: 'Update Successfull'
                    }),

            this.$router.push('chartOfAccounts');
          });
        }
      }
    }
</script>