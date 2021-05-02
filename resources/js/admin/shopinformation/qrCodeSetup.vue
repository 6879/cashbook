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
            QR Code Setup
            <div class="page-title-subheading">
              QR Code Setup
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
         <h4> Add Information </h4>
        </div>
      </div>


<form @submit.prevent="addQrCodeInformation"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
            <div class="form-group">
              <label> Show in Invoice <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.invoiceShowStatus"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('invoiceShowStatus') }"
              >
                <option value="">Select Status</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
              <has-error :form="form" field="invoiceShowStatus"></has-error>
            </div>
              <!-- <small v-if="exit==true" class="text-danger"> this is already exist. </small> -->
              

            <div class="form-group">
              <label> After Scan Information <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>

              <img src="images/ex-small.png" data-toggle="modal" data-target="#exampleModal">
              <!-- Button trigger modal --> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Preview Image </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="images/ex-big.png" class="img img-thumbnail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



              <textarea
                v-model="form.scanInformation"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('scanInformation') }"
              ></textarea>
              <has-error :form="form" field="scanInformation"></has-error>
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
                <th>ID</th>
                
                <th>After Scan Information</th>
                <th> Show / Hide </th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(qrCodeSetup, index) in qrCodeSetups" :key="qrCodeSetup.id">
                <td>{{ ++index }}</td>
                <td>{{ qrCodeSetup.scanInformation }}</td>
                <td>
                  <div v-if="qrCodeSetup.invoiceShowStatus == 1">
                    <span
                      type="button"
                      @click="
                        changeStatus(qrCodeSetup.id)
                      "
                      class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for deactive"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Deactive"
                    >
                      Active
                    </span>
                  </div>
                  <div v-else>
                    <span
                      type="button"
                      @click="
                        changeStatus(qrCodeSetup.id)
                      "
                      class="badge badge-pill badge-danger btn-hover-shine"
                                title="Click for Active"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Active"
                    >
                      Deactive
                    </span>
                  </div>
                </td>
                <td>
                  <router-link
                    :to="`/qrCodeSetup@Edit${qrCodeSetup.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i>Edit</router-link
                  >
                </td>
                <td>
                  <button 
                    @click.prevent="deletePost(qrCodeSetup.id)"
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

<script>
export default {

  
  data() {
    return {
      qrCodeSetups: [],

      image: "",
      form: new Form({
        invoiceShowStatus: "",
        scanInformation: "",
      }),
      qrCodeSetup: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {
    this.view();
  },
  methods: {
    view() {
      let url = "api/qrCodeSetup";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.qrCodeSetups = response.data;
        });
    },

        changeStatus(id){
          let uri = `api/qrCodeSetup/changeStatus/${id}`;
        axios.get(uri).then(response=>{
            Toast.fire({
                icon: 'success',
                title: 'Status Change Successfully'
            })
            this.view();
        })
    },

    deletePost(id) {
      let uri = `api/qrCodeSetup/${id}`;
      axios.delete(uri).then((response) => {
        Toast.fire({
                icon: 'success',
                title: 'Delete Successfull.'
            })
        this.view();
      });
    },
 
 

    addQrCodeInformation() {
      this.form.post("api/qrCodeSetup").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
              background: '#c9f4c9', //green
            title: "QR Code Setup Successfull.",
          }),
            this.view();
          this.form.reset();
          
      });
    },
  },
};
</script>