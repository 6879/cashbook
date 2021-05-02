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
            Admin Menu Title
            <div class="page-title-subheading">
              Admin menu title means modiul of menu.
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/adminmenu@title"
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

      <form @submit.prevent="adminMenuTitleNameCreate()">

      <div class="supplier-entry py-4 px-2 comm-form-back-img">
        <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
            <div class="form-group">
              <label>Menu Title Name</label>
              <input
                type="text"
                v-model="form.adminMenuTitleName"
                name="adminMenuTitleName"
                placeholder="Menu Title Name"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('adminMenuTitleName') }"
              />
              <has-error :form="form" field="adminMenuTitleName"></has-error>
            </div>
            <div class="form-group">
              <label>Menu Title Position</label>
              <input
                type="text"
                v-model="form.adminMenuTitlePosition"
                name="adminMenuTitlePosition"
                placeholder="Menu Title Position"
                class="form-control"
                :class="{
                  'is-invalid': form.errors.has('adminMenuTitlePosition'),
                }"
              />
              <has-error
                :form="form"
                field="adminMenuTitlePosition"
              ></has-error>
            </div>
            <div class="form-group">
              <label>Menu Title Icon</label>
              
              <input
                type="text"
                v-model="form.adminMenuTitleIcon"
                name="adminMenuTitleIcon"
                placeholder="Menu Title Icon"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('adminMenuTitleIcon') }"
              />
              <has-error :form="form" field="adminMenuTitleIcon"></has-error>
            </div>

            <div class="form-group">
              <label>Menu Title Status</label>
              <select
                v-model="form.adminMenuTitleStatus"
                name="adminMenuTitleStatus"
                :class="{
                  'is-invalid': form.errors.has('adminMenuTitleStatus'),
                }"
                class="form-control"
              >
                <option value="">Select One</option>
                <option value="1">Publish</option>
                <option value="0">Unpublish</option>
              </select>
              <has-error :form="form" field="adminMenuTitleStatus"></has-error>
            </div>
            <div class="form-group">
              <label>Menu Title Permission</label>
              <select
                v-model="form.adminMenuTitlePermission"
                name="adminMenuTitlePermission"
                :class="{
                  'is-invalid': form.errors.has('adminMenuTitlePermission'),
                }"
                class="form-control"
              >
                <option value="">Select One</option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
              </select>
              <has-error
                :form="form"
                field="adminMenuTitlePermission"
              ></has-error>
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

    <div class="card main-card element-block-example mt-5">
           <div class="card-header-tab card-header alert-success">
         
          <h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          View Information </h4>

        </div>
      </div>
      <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
          <thead>
            <tr style="background: rgba(242, 242, 242, 0.47)">
              <th>SN</th>
              <th>Menu Title Name</th>
              <th>Menu Title Position</th>
              <th>Menu Title Icon</th>
              <th>Menu Title Status</th>
              <th>Menu Title Permission</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(adminMenuTitleShow, index) in adminMenuTitleShows">
              <td>{{ index + 1 }}</td>
              <td>{{ adminMenuTitleShow.adminMenuTitleName }}</td>
              <td>{{ adminMenuTitleShow.adminMenuTitlePosition }}</td>
              <td>{{ adminMenuTitleShow.adminMenuTitleIcon }}</td>
              <td>
                <div v-if="adminMenuTitleShow.adminMenuTitleStatus == 1">
                  <span
                    type="button"
                    @click="changeStatus(adminMenuTitleShow.adminMenuTitleId)"
                    class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for unpublish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for unpublish"
                  >
                    Published
                  </span>
                </div>
                <div v-else>
                  <span
                    type="button"
                    @click="changeStatus(adminMenuTitleShow.adminMenuTitleId)"
                    class="badge badge-pill badge-danger btn-hover-shine"
                                title="Click for publish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for publish"
                  >
                    Unpublish
                  </span>
                </div>
              </td>
              <td>
                <div v-if="adminMenuTitleShow.adminMenuTitlePermission == 1">
                  <span
                    type="button"
                    @click="
                      changePermission(adminMenuTitleShow.adminMenuTitleId)
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
                      changePermission(adminMenuTitleShow.adminMenuTitleId)
                    "
                    class="badge badge-pill badge-danger btn-hover-shine"
                                title="Click for active"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for active"
                  >
                    Deactive
                  </span>
                </div>
              </td>
              <td>
                <router-link
                  :to="`/adminmenu@titleEdit${adminMenuTitleShow.adminMenuTitleId}`"
                  class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i>Edit</router-link
                >
                <button
                  type="button"
                  @click="distroy(adminMenuTitleShow.adminMenuTitleId)"
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
  </span>
</template>
<script>
export default {
  data() {
    return {
      form: new Form({
        adminMenuTitleId: "",
        adminMenuTitleName: "",
        adminMenuTitlePosition: "",
        adminMenuTitleIcon: "",
        adminMenuTitleStatus: "",
        adminMenuTitlePermission: "",
      }),
      adminMenuTitleShows: [],
    };
  },
  mounted() {
    this.adminMenuTitle();
  },
  methods: {
    adminMenuTitleNameCreate() {
      this.form.post("/adminMenuTitle").then((res) => {
        if (res.data.changeTitleName) {
          Toast.fire({
            icon: "error",
            title: "Change Your Menu Title Name",
          });
        } else if (res.data.error) {
          Toast.fire({
            icon: "error",
            title: "Change Your Menu Title Position",
          });
        } else if (res.data.sameNameError) {
          Toast.fire({
            icon: "error",
            title: "Change Your Menu Title Name",
          });
        } else {
          Toast.fire({
            icon: "success",
            title: "Admin Menu Title Create Successfully",
          });
          this.form.reset();
          this.adminMenuTitle();
        }
      });
    },
    adminMenuTitle() {
      axios.get("/adminMenuTitle").then((res) => {
        this.adminMenuTitleShows = res.data.adminMenuTitle;
      });
    },

    distroy(adminMenuTitleId) {
      axios.delete("adminMenuTitle/" + adminMenuTitleId).then((res) => {
        Toast.fire({
          icon: "success",
          title: "Admin Menu Title Delete Successfully",
        });
        this.adminMenuTitle();
      });
    },
    changeStatus(adminMenuTitleId) {
      axios.get("statusChangeEvent/" + adminMenuTitleId).then((res) => {
        Toast.fire({
          icon: "success",
          title: "Admin Menu Status Change Successfully",
        });
        this.adminMenuTitle();
      });
    },
    changePermission(adminMenuTitleId) {
      axios.get("adminMenuTitle/" + adminMenuTitleId).then((res) => {
        Toast.fire({
          icon: "success",
          title: "Admin Menu Permission Change Successfully",
        });
        this.adminMenuTitle();
      });
    },
  },
};
</script>
