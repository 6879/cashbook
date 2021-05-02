<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Purchase Type Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="purchaseTypeEntry()">
              <div class="form-group">
                  <label>Purchase Type Name</label>
                  <input  type="text" v-model="form.purchaseTypeName"  name="purchaseTypeName" :class="{ 'is-invalid': form.errors.has('purchaseTypeName') }" placeholder="Purchase Type Name" class="form-control">
                  <has-error :form="form" field="purchaseTypeName"></has-error>
              </div>

              <div class="form-group">
                 <label>Purchase Type Status</label>
                 <select v-model="form.purchaseTypeStatus" name="purchaseTypeStatus" :class="{ 'is-invalid': form.errors.has('purchaseTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="purchaseTypeStatus"></has-error>
              </div>

             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

   <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Purchase Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Purchase Type Name</th>
               <th>Purchase Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminPurchaseType, index) in adminPurchaseTypes.data">
                <td>{{ index+1 }}</td>
                <td>{{ adminPurchaseType.purchaseTypeName }}</td>
                <td>
                    <div v-if="adminPurchaseType.purchaseTypeStatus == 1">
                      <button type="button"  @click="changeStatus(adminPurchaseType.purchaseTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(adminPurchaseType.purchaseTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                  <router-link :to="`/purchasetype@edit${adminPurchaseType.purchaseTypeId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button type="button"  @click.prevent="destroy(adminPurchaseType.purchaseTypeId)" class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="adminPurchaseTypes" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    purchaseTypeName: '',
                    purchaseTypeStatus: '',
                }),
                adminPurchaseTypes:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
            this.showDataList();
            this.getPaginateList();
        },
        methods: {
            purchaseTypeEntry() {
                this.form.post('/adminPurchaseType').then(res => {
                    if (res.data.changePurchaseType){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Purchase Type Name'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Purchase Type Name Entry successfully'
                        })
                            this.form.reset()
                            this.showDataList();
                        }
                  });
                },
                showDataList() {
                    axios.get('/adminPurchaseType').then(res => {
                           this.adminPurchaseTypes = res.data.adminPurchaseType
                      })
                },
                getPaginateList(page = 1){
                  axios.get('/adminPurchaseType?page=' + page)
                  .then(response => {
                    this.adminPurchaseTypes = response.data.adminPurchaseType;
                  });
                },
                changeStatus(purchaseTypeId){
                  axios.get("/adminPurchaseType/"+purchaseTypeId).then(res=>{
                      Toast.fire({
                          icon: 'success',
                          title: 'Purchase Type Status Change Successfully'
                      })
                      this.showDataList()
                  })
                },
                destroy(purchaseTypeId){
                  axios.delete("/adminPurchaseType/"+purchaseTypeId).then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Purchase Type Name Delete Successfully'
                        })
                        this.showDataList();
                    })
                },
            }
       }
</script>
