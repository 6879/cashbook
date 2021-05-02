<template id="">
  <span>



    <div class="app-page-title"><div class="page-title-wrapper"><div class="page-title-heading">
      <div class="page-title-icon">
      <i class="pe-7s-keypad icon-gradient bg-grow-early"></i></div> <div>
            Invoice Setup
            <div class="page-title-subheading">
              Invoice Setup
            </div></div></div> <div class="page-title-actions">
              <a href="/invoiceSetup" class="btn-shadow mr-3 btn btn-warning router-link-exact-active router-link-active" type="button" title="" data-placement="bottom" data-toggle="tooltip" data-original-title="Refresh"><i class="fa fa-undo text-white"></i></a> <div class="d-inline-block dropdown"><button type="button" onclick="window.history.back()" class="btn-shadow btn btn-info"><span class="lnr lnr-arrow-left"></span>
              Back
            </button></div></div></div></div>




    <div class="card">
      
      <div class="card-header-tab card-header alert-info">
        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i class="header-icon lnr-pencil icon-gradient bg-premium-dark"></i> <h4> Add Information </h4></div></div>

<form @submit.prevent="addInvoiceSetupInformation">
      <div class="supplier-entry py-4 px-2 comm-form-back-img-small">
        <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
            <div class="form-group">
              <label> Invoice For <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>

              <select
                v-model="form.invoiceForId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('invoiceForId') }"
              >
                <option value="">Select Status</option>
                <option
                  v-for="invoiceForList in invoiceForLists"
                  :key="invoiceForList.id"
                  :value="invoiceForList.id"
                >
                  {{ invoiceForList.name }}
                </option>
              </select>
              <has-error :form="form" field="invoiceForId"></has-error>
            </div>

            <div class="form-group">
              <label> Invoice Type <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>

              <select
                v-model="form.invoiceTypeId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('invoiceTypeId') }"
                @change="cascade"
              >
                <option value="">Select Status</option>
                <option
                  v-for="invoiceTypeList in invoiceTypeLists"
                  :key="invoiceTypeList.id"
                  :value="invoiceTypeList.id"
                >
                  {{ invoiceTypeList.name }}
                </option>
              </select>
              <has-error :form="form" field="invoiceTypeId"></has-error>
            </div>

            <div id="app" v-if="showName">
              <h4>Printer Invoice Formate </h4>

              <div class="section">
                <div class="row form-group">

                  <has-error :form="form" field="invoiceFormetId"></has-error>

                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-2"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(1, 'invoice_print')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="1"
                      v-model="form.invoiceFormetId"
                      value="1"
                    />
                    <label class="label" for="1" @click="invoice_for_printer_box_function(1,2)">
                      <img
                        for="c"
                        src="images/invoice_print/1.png"
                        class="img img-thumbnail"
                        alt="1.png"
                      />
                    </label>
                  </div>

                  


                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-2"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(2, 'invoice_print')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="2"
                      v-model="form.invoiceFormetId"
                      value="2"
                      disabled
                    />
                    <label class="label" for="2">
                      <img
                        for="c"
                        src="images/invoice_print/2.png"
                        class="img img-thumbnail"
                        alt="2.png"
                      />
                    </label>
                  </div>
                  


                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-3"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(3, 'invoice_print')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="3"
                      v-model="form.invoiceFormetId"
                      value="3"
                      disabled
                    />
                    <label class="label" for="3">
                      <img
                        for="c"
                        src="images/invoice_print/3.png"
                        class="img img-thumbnail"
                        alt="1.png"
                      />
                    </label>
                  </div>

                  
                </div>
              </div>

              
            </div>




            <div id="app" v-if="showName1">
              <h4>POS Invoice Formate </h4>

              <div class="section">
                <div class="row">

                  
                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-2"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(1, 'invoice_pos')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="4"
                      v-model="form.invoiceFormetId"
                      value="4"
                    />
                    <label class="label" for="4" @click="invoice_for_pos_box_function(1,2)">
                      <img
                        src="images/invoice_pos/1.png"
                        class="img img-thumbnail"
                        alt="1.png"
                      />
                    </label>
                  </div>

                  


                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-2"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(2, 'invoice_pos')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="5"
                      v-model="form.invoiceFormetId"
                      value="5"
                      disabled
                    />
                    <label class="label" for="5">
                      <img
                        for="c"
                        src="images/invoice_pos/2.png"
                        class="img img-thumbnail"
                        alt="2.png"
                      />
                    </label>
                  </div>
                  


                  <div class="col-md-4">
                    <center>
                      <span
                        class="badge badge-primary mb-3"
                        data-toggle="modal"
                        data-target="#exampleModal"
                        @click="addToCount(3, 'invoice_pos')"
                      >
                        <i class="fa fa-eye" aria-hidden="true"></i> Preview
                      </span>
                    </center>

                    <input
                      type="radio"
                      id="6"
                      v-model="form.invoiceFormetId"
                      value="6"
                      disabled
                    />
                    <label class="label" for="6">
                      <img
                        for="c"
                        src="images/invoice_pos/3.png"
                        class="img img-thumbnail"
                        alt="1.png"
                      />
                    </label>
                  </div>

                  
                </div>
              </div>

              
            </div>






            

            <div class="form-group invoice_for_printer_box" v-if="invoice_for_printer_box">
              <p class="border p-2"> Printer Invoice Details :</p>


              <div class="row border">
                <table class="table border">
                   
                  <tr>
                    <td>
                      <label for="logo"> Logo </label> 
                      <img :src="form.logo"
                      class="img img-responsive"
                      height="100">
                      <input type="file" id="logo" @change="changeImage($event)" class="form-control">
                    </td> 
                    <td></td> 
                    <td>
                      <label for="Address"> Address </label> 
                      <textarea type="text" v-model="form.address" id="Address" class="form-control"></textarea>
                    </td> 
                  </tr>
                   
                  <tr>
                    <td>
                      <label for="invoiceto"> Invoice To </label> 
                      <input type="text" id="invoiceto" v-model="form.toText" class="form-control">
                    </td> 
                  <td></td> 
                    <td>
                      <label for="invoice3-2-1"> Invoice 3-2-1 </label> 
                      <input type="text" id="invoice3-2-1" v-model="form.titleText" class="form-control">
                    </td> 
                  </tr>
                   
                  <tr>
                    <td>
                      <label for="themecolor"> Theme Color </label> 
                      <input type="color" id="themecolor" v-model="form.themeColor"  class="form-control">
                    </td> 
                  
                    <td></td> 
                    <td></td> 
                  </tr>
                   
                  <tr>
                    <td>
                      <label for="thankyou"> Thank you </label> 
                      <input type="text" id="thankyou" v-model="form.thankyou "  class="form-control">
                    </td> 
                  <td></td> 
                    <td>
                      <label for="subtitle"> Sub Title </label> 
                      <input type="text" id="subtitle" v-model="form.subTotal"  class="form-control">
                      <label for="vat"> vat % </label> 
                      <input type="text" id="vat" v-model="form.vat"  class="form-control">
                      <label for="discount"> Discount % </label> 
                      <input type="text" id="discount" v-model="form.discount"  class="form-control"> 
                      <label for="grandTotal"> Grand Total </label> 
                      <input type="text" id="grandTotal" v-model="form.grandTotal"  class="form-control">
                    </td> 
                  </tr> 
                   
                  <tr>
                    <td>
                      <label for="notice"> Notice </label> 
                      <input type="text" id="notice"  v-model="form.noticeTitle"  class="form-control">
                      <textarea type="text"  v-model="form.noticeDetails"  class="form-control"></textarea>

                    </td> 
                  <td></td> 
                    <td>
                       
                    </td> 
                  </tr>
                   
                  <tr>
                    <td>
                      <label for="generatedFrom"> Invoice was created on a computer and is valid without the signature and seal.  </label> 
                      <textarea type="text" id="generatedFrom" v-model="form.generatedFrom" class="form-control"></textarea>

                    </td> 
                  <td></td> 
                    <td>
                       
                    </td> 
                  </tr>


                </table>
              </div>
            </div>




            <div class="form-group invoice_for_printer_box" v-if="invoice_for_pos_box">
              <p class="border p-2"> POS Invoice Details :</p>
              
              <div class="row border">
                <table class="table border">
                   
                  <tr>
                    <td>
                      <label for="posLogo"> Logo </label> 
                      <input type="file" id="posLogo" class="form-control">
                    </td> 
                    </tr>
                    <tr> 
                    <td>
                      <label for="posAddress"> Address </label> 
                      <input type="text" id="posAddress" v-model="form.address"  class="form-control">
                    </td> 
                  </tr>
                  <tr> 
                    <td>
                      <label for="posSubtitle"> Sub Total </label> 
                      <input type="text" id="posSubtitle" v-model="form.subTotal"  class="form-control">
                    </td>
                  </tr>
                  <tr> 
                    <td>
                      <label for="posVat"> Vat % </label> 
                      <input type="text" id="posVat" v-model="form.vat"  class="form-control">
                    </td>
                  </tr>
                  <tr> 
                    <td>
                      <label for="posDiscount"> Discount % </label> 
                      <input type="text" id="posDiscount" v-model="form.discount"  class="form-control">
                    </td>
                  </tr>
                  <tr> 
                    <td> 
                      <label for="posGrandTotal"> Grand Total </label> 
                      <input type="text" id="posGrandTotal" v-model="form.grandTotal" class="form-control">
                    </td> 
                  </tr> 
                  <tr> 
                    <td> 
                      <label for="posThankyou"> Thank you </label> 
                      <input type="text" id="trandtotal" v-model="form.thankyou" class="form-control">
                    </td> 
                  </tr> 

                  </table>
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




     <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th> Invoice For </th>
                <th> Invoice Type </th>
                <th> Invoice Formate </th>
                <th> Status </th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(invoiceSetup, index) in invoiceSetups"
                :key="invoiceSetup.id"
              >
                <td>{{ ++index }}</td>
                  <td><span  v-for="invoiceForList in invoiceForLists"
                    :key="invoiceForList.id" v-if="invoiceForList.id==invoiceSetup.invoiceForId">{{ invoiceForList.name }}</span></td>
                <td><span  v-for="invoiceTypeList in invoiceTypeLists"
                  :key="invoiceTypeList.id" v-if="invoiceTypeList.id==invoiceSetup.invoiceTypeId">{{ invoiceTypeList.name }}</span></td>
                
                <td>{{ invoiceSetup.invoiceFormetId }}</td>
                <td>
                  <div v-if="invoiceSetup.status == 1">
                    <span
                      @click="changeStatus(invoiceSetup.id)"
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
                      @click="changeStatus(invoiceSetup.id)"
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
                    :to="`/invoiceSetup@Edit${invoiceSetup.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                    ><i class="fa fa-edit"></i>Edit</router-link
                  >
                </td>
                <td>
                  <button
                    class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                    @click.prevent="deletePost(invoiceSetup.id)"
                  ><i class="fa fa-trash"></i>
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Preview Image</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img
              src="images/invoice_print/2.png"
              class="img img-thumbnail large_image"
            />
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </span>
</template>


<style type="text/css">

</style>

<script>
export default {
  data() {
    return {
      invoice_for_printer_box: false,
      invoice_for_pos_box: false,
      showName: false,
      showName1: false,
      invoiceSetups: [],
      invoiceForLists: [],
      invoiceTypeLists: [],

      image: "",
      form: new Form({
         
        invoiceForId: "",
        invoiceTypeId: "",
        invoiceFormetId: "",

        //invoice details fild

        logo : "",
        address : " ",
        toText : " ",
        titleText : " ",
        themeColor : "#3989c6",
        thankyou : " ",
        subTotal : " ",
        vat : " ",
        discount : " ",
        grandTotal : " ",
        noticeDetails : " ",
        generatedFrom : " ",


      }),
      qrCodeSetup: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {
    this.view();
    this.invoiceForList();
    this.invoiceTypeList();
  },
  methods: {
    
    invoice_for_printer_box_function(e, f) {
      
      this.invoice_for_printer_box = true;
    },
    
    invoice_for_pos_box_function(e, f) {
      
      this.invoice_for_pos_box = true;
    },

    addToCount(e, f) {
      
      $(".large_image").attr("src", "");
      $(".large_image").attr("src", "images/" + f + "/" + e + ".png");
    },
    cascade: function (e) {
      //console.log("Show "+e.target.value+ " fields")
      $('input[type="radio"]').prop('checked', false);
      this.invoice_for_printer_box = false;
      this.invoice_for_pos_box = false;
      if (e.target.value == "1") {
        this.showName = true;
        this.showName1 = false;
      } else if (e.target.value == "2") {
        this.showName1 = true;
        this.showName = false;
      }
    },
    view() {
      let url = "api/invoiceSetup";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.invoiceSetups = response.data;
        });
    },

    changeImage(event){
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = (event) => {
        this.form.logo = event.target.result;
        console.log(event.target.result);
      };
      reader.readAsDataURL(file);
    },

    changeStatus(id) {
      let uri = `api/invoiceSetup/changeStatus/${id}`;
      axios.get(uri).then((response) => {
        Toast.fire({
          icon: "success",
          title: "Status Change Successfully",
        });
        this.view();
      });
    },

    invoiceForList() {
      let uri = `api/invoiceForList`;
      axios.get(uri).then((response) => {
        this.invoiceForLists = response.data.invoiceForList;
      });
    },

    invoiceTypeList() {
      let uri = `api/invoiceTypeList`;
      axios.get(uri).then((response) => {
        this.invoiceTypeLists = response.data.invoiceTypeList;
      });
    },

    deletePost(id) {
      let uri = `api/invoiceSetup/${id}`;
      axios.delete(uri).then((response) => {

        Toast.fire({
          icon: "success",
          title: "Delete Successfully",
        });

        this.view();
      });
    },

    addInvoiceSetupInformation() {
      this.form.post("api/invoiceSetup").then((response) => {

      this.invoice_for_printer_box = false;
      this.invoice_for_pos_box = false;
      this.showName = false;
      this.showName1 = false;


        Toast.fire({
          icon: "success",
          //background: '#fcd8d8', red
          //background: "#c9f4c9", //green
          title: "Invoice Setup Successfull.",
        }),
          this.view();
        this.form.reset();
      });
    },
  },
};
</script>









