<template id="">
  <span>



        <!-- ------------------- page title  -->
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
          </div>
          <div>
            Branch Setup
            <div class="page-title-subheading">
              Branch Setup
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/qrCodeSetup"
            type="button"
            class="btn-shadow mr-3 btn btn-warning"
            title=""
            data-placement="bottom"
            data-toggle="tooltip"
            data-original-title="Refresh"
          >
          <i class="fa fa-undo text-white"></i>
          </router-link>
          <div class="d-inline-block dropdown">
            <button
              type="button"
              class="btn-shadow btn btn-info"
              onclick="window.history.back()"
            >
              
                <span class="lnr lnr-arrow-left"></span>
              Back
            </button>
            
          </div>
        </div>
      </div>
    </div>

<!-- ------------------- // page title  -->






    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Update Information </h4>
        </div>
      </div>


<form @submit.prevent="updateBranchInformation"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
            
               <div class="form-group">
                 <label> Branch Name </label>
                 <input type="text" v-model="form.branchName" name="branchName"  placeholder="Branch Name" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchName') }">
                   <has-error :form="form" field="branchName"></has-error>
               </div>
            
              
            
               <div class="form-group">
                 <label> Branch Code </label>
                 <input type="text" readonly v-model="form.branchCode" name="branchCode"  placeholder="Branch Code" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchCode') }">
                   <has-error :form="form" field="branchCode"></has-error>
               </div> 
            
               <div class="form-group">
                 <label> Branch Mobile No </label>
                 <input type="text" v-model="form.branchMobileNo" name="branchMobileNo"  placeholder="Branch Mobile No" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchMobileNo') }">
                   <has-error :form="form" field="branchMobileNo"></has-error>
               </div>
            
               <div class="form-group">
                 <label> Representative Name </label>
                 <input type="text" v-model="form.branchRepresentativeName" name="branchRepresentativeName"  placeholder="Representive Name" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchRepresentativeName') }">
                   <has-error :form="form" field="branchRepresentativeName"></has-error>
               </div>
            
               <div class="form-group">
                 <label> Representative Mobile No </label>
                 <input type="text" v-model="form.branchRepresentativeMobileNo" name="branchRepresentativeMobileNo"  placeholder="Representive Mobile No" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchRepresentativeMobileNo') }">
                   <has-error :form="form" field="branchRepresentativeMobileNo"></has-error>
               </div>
            
               <div class="form-group">
                 <label> Address </label>
                 <textarea type="text" v-model="form.branchAddress" name="branchAddress"  placeholder="Branch Address" class="form-control"
                  :class="{ 'is-invalid': form.errors.has('branchAddress') }"></textarea>
                   <has-error :form="form" field="branchAddress"></has-error>
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
                                    <span class="mr-1"> Update </span>
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
                 form: new Form({
                    branchName: "",
                    branchCode: "",
                    branchMobileNo: "",
                    branchRepresentativeName: "",
                    branchRepresentativeMobileNo: "",
                    branchAddress: "",
                }),
        
        }
      },
      created() {
        let uri = `api/BranchInformation/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data);
        });
      },
      methods: {
        updateBranchInformation() {
          let uri = `api/BranchInformation/${this.$route.params.id}`;
          axios.put(uri, this.form).then((response) => {

                        Toast.fire({
                            icon: 'success',
                            title: 'Update Successfull'
                        }),

            this.$router.push('branchSetup');
          });
        }
      }
    }
</script>