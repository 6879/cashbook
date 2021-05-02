 <template id="">
  <span>
    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Edit Account Setup </h4>
        </div>
      </div>


<form @submit.prevent="editChartOfAccount"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
          <div class="form-group">
              <label>  Placement Type  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
  
              <select
                v-model="form.placementType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('placementType') }"
                @change="accountSetupHeadNameList()"
              >
                <option value="0"> Select </option>
                <option v-for="placementTypeList in placementTypeLists" 
                :value="placementTypeList.id"> {{placementTypeList.id}}. {{placementTypeList.name}} </option> 
              </select>
              <has-error :form="form" field="placementType"></has-error>
            </div>


            <div class="form-group">
              <label> Head Name <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headName') }"
              >>
                <option value=""> Select </option>
                <option v-for="accountSetupHeadNameList in accountSetupHeadNameLists"
                 :value="accountSetupHeadNameList.id"> {{accountSetupHeadNameList.name}} </option> 
              </select>
              <has-error :form="form" field="headName"></has-error>
            </div>
 
              

            <div class="form-group">
              <label> Head Code <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.headCode"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headCode') }"
              >
              <has-error :form="form" field="headCode"></has-error>
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
      placementTypeLists: [],
      accountSetups: [],
      accountSetupHeadNameLists: [],

      image: "",
      form: new Form({
                        placementType: "",
                        headCode: "",
                        headName: "",
      }), 
      exit: false, 
    };
  },
  mounted() {
    this.view();
    this.placementTypeList(); 
  },
      methods: {

        view() {
        let uri = `accountSetupInfo/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data.data);
            this.accountSetupHeadNameLists = response.data.accountSetupHeadNameList;
        });

      },

        
    placementTypeList(){

          let uri = `placementTypeList`;
        axios.get(uri).then(response=>{
          this.placementTypeLists = response.data.placementTypeList;
        })

    },
 
        editAccountSetup() {
          let uri = `accountSetupInfo/${this.$route.params.id}`;
          axios.put(uri, this.form).then((response) => {

                        Toast.fire({
                        icon: 'success',
                        title: 'Update Successfull'
                    }),

            this.$router.push('accountSetup');
          });
        }

      }
    }
</script>