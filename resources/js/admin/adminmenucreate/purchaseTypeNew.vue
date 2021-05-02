<template id="">
  <span>
    <div class="card">
      <div
        class="card-header"
        style="
          background: rgba(221, 221, 221, 0.2);
          border: 1px solid rgba(0, 0, 0, 0.05);
        "
      >
        <h3 style="color: black">New Purchase Type</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border"
        >
          <form @submit.prevent="addPurchaseType">
            <div class="form-group">
              <label> Purchase Type :</label>

              <input
                type="text"
                v-model="form.purchaseType"
                name="purchaseType"
                placeholder="Purchase Type"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('purchaseType') }"
              />
              <!-- <small v-if="exit==true" class="text-danger"> this is already exist. </small> -->
              <has-error :form="form" field="purchaseType"></has-error>
            </div>

            <!-- <div class="form-group">
                 <label> Image :</label>

                 <div class="col-md-3" v-if="image">
                              <img :src="image" class="img-responsive" height="70" >
                           </div>

            <input type="file"
             v-on:change="onImageChange" 
             name="pImage"
             placeholder="image"
             class="form-control" 
             :class="{ 'is-invalid': form.errors.has('pImage') }">
                   <small v-if="exit==true" class="text-danger"> this is already exist. </small>  
                  <has-error :form="form" field="pImage"></has-error>
              </div> -->

            <div class="form-group">
              <label> Status :</label>
              <select
                v-model="form.status"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('status') }"
              >
                <option value="">Select Status</option>
                <option value="0">Active</option>
                <option value="1">Inactive</option>
              </select>
              <has-error :form="form" field="status"></has-error>
            </div>

            <div class="text-right pt-3">
              <button
                type="submit"
                class="mr-2 btn btn-pill btn-hover-shine btn-primary"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card mt-5">
      <div
        class="card-header"
        style="
          background: rgba(221, 221, 221, 0.2);
          border: 1px solid rgba(0, 0, 0, 0.05);
        "
      >
        <h3 style="color: black">Purchase Type Information</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-12 col-12 supplier-border">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Purchase Type</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(get, index) in gets" :key="get.id">
                <td>{{ ++index }}</td>
                <td>{{ get.purchaseType }}</td>
                <td>
                  <div v-if="get.status == 0">
                    <button
                      type="button"
                      @click="
                        changeStatus(get.id)
                      "
                      class="btn btn-hover-shine btn-success"
                    >
                      Active
                    </button>
                  </div>
                  <div v-else>
                    <button
                      type="button"
                      @click="
                        changeStatus(get.id)
                      "
                      class="btn btn-hover-shine btn-danger"
                    >
                      Deactive
                    </button>
                  </div>
                </td>
                <td>
                  <router-link
                    :to="`/purchasetype@Edit${get.id}`"
                    class="btn btn-hover-shine btn-primary"
                    ><i class="fa fa-edit"></i>Edit</router-link
                  >
                </td>
                <td>
                  <button
                    class="btn btn-hover-shine btn-danger"
                    @click.prevent="deletePost(get.id)"
                  >
                    Delete
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
      gets: [],

      image: "",
      form: new Form({
        purchaseType: "",
        status: "",
      }),
      purchaseType: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {
    this.view();
  },
  methods: {
    view() {
      let url = "api/purchaseType";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.gets = response.data;
        });
    },

        changeStatus(id){
          let uri = `api/purchaseStatusChange/${id}`;
        axios.get(uri).then(response=>{
            Toast.fire({
                icon: 'success',
                title: 'Status Change Successfully'
            })
            this.view();
        })
    },

    deletePost(id) {
      let uri = `api/purchase/delete/${id}`;
      axios.get(uri).then((response) => {
        this.view();
      });
    },

    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    addPurchaseType() {
      this.form.post("api/purchaseType/create").then((response) => {
        if (response.data.changePurchaseType) {
          this.exit = true;
          this.mess = response.data.changePurchaseType;
          // Toast.fire({
          //     icon: 'error',
          //     title: 'Change Your Admin Type Name'
          // })
        } else {
          Toast.fire({
            icon: "success",
            title: "Admin Type Successfully",
          }),
            this.view();
          this.form.reset();
          // this.$router.push('purchaseTypeNew');
        }
      });
    },
  },
};
</script>