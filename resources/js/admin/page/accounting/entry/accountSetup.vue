<template id="">
  <span>

  

    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Accounts Setup </h4>
        </div>
      </div>


<form @submit.prevent="addAccountsSetup"> 
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
              <label> Head Code 
                <span class="badge badge-primary">ladger</span>
                <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
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
                
                <th> SL </th>
                <th> Placement Type </th>
                <th>Head Name</th>
                <th>Head Code</th>
                
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              
              <tr 
              v-for="(accountSetupInfo,index) in accountSetups" 
              :key="accountSetupInfo.id"
              >
               
                <td>{{ ++index }}</td>
                <td>
                  <span v-for="placementTypeList in placementTypeLists"
                  v-if="placementTypeList.id==accountSetupInfo.placementType"
                  >
                  {{ placementTypeList.id }}, 
                  {{ placementTypeList.name }}
                  </span>
                  </td>
                <td>
                  <span v-for="viewAccountSetupHeadNameList in viewAccountSetupHeadNameLists"
                  v-if="viewAccountSetupHeadNameList.id==accountSetupInfo.headName"
                  >
                  {{ viewAccountSetupHeadNameList.id }}, 
                  {{ viewAccountSetupHeadNameList.name }}
                  </span>
                  </td>
                
                <td>{{ accountSetupInfo.headCode }}</td>
                <td>
                  <router-link
                    :to="`/accountSetupEdit${accountSetupInfo.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> 
                  </router-link>
                </td>
                <td>
                  <button 
                    @click.prevent="deletePost(accountSetupInfo.id)"
                    class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                >
                  <i class="fa fa-trash"></i> 
                  </button>
                </td> 
              </tr>

              <!-- empty row -->
              <!-- <tr>
                <td> . </td>
              </tr> -->
              <!-- empty row -->


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
  height: 70px;
  background: black;
  position: relative;
  float: left;
  margin-right: 20px;
  
}  
.tree1{
  width: 20px;
  height: 1px;
  background: rgb(0, 0, 0);
  margin-top: 28px;
}
</style>

<script>
export default {

  
  data() {
        return {
        placementTypeLists: [],
        accountSetups: [],
        accountSetupHeadNameLists: [],
        viewAccountSetupHeadNameLists: [],

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
      let uri = "accountSetupInfo";
      axios.get(uri)
        .then((response) => {
          this.accountSetups = response.data.accountSetup;
          this.viewAccountSetupHeadNameLists = response.data.viewAccountSetupHeadNameList;
        });
    },
 

    placementTypeList(){

          let uri = `placementTypeList`;
          //$( "#headLavel" ).prop( "disabled", true );
        axios.get(uri).then(response=>{
          this.placementTypeLists = response.data.placementTypeList; 
        })

    },

    accountSetupHeadNameList(){
          let uri = `accountSetupHeadNameList/`+this.form.placementType;
        axios.get(uri).then(response=>{
            this.accountSetupHeadNameLists = response.data.accountSetupHeadNameList;
        })
    },

    deletePost(id) {
      let uri = `accountSetupInfo/${id}`;
      axios.delete(uri).then((response) => {
        Toast.fire({
                icon: 'success',
                title: 'Delete Successfull.'
            })
        this.view();
      });
    },
 
 

    addAccountsSetup() {
      this.form.post("accountSetupInfo").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
              background: '#c9f4c9', //green
            title: "Account Setup add Successfull.",
          }),

          
          this.form.reset();
          this.view();
          
      });
    },
  },
};
</script>