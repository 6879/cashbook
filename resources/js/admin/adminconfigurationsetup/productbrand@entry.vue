<template id="">
  <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Product Brand Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="productBrandCreate()">
               <div class="form-group">
                 <label>Product Brand Name</label>
                 <input type="text" v-model="form.productBrandName" name="productBrandName"  placeholder="Brand Name" class="form-control" :class="{ 'is-invalid': form.errors.has('productBrandName') }">
                   <has-error :form="form" field="productBrandName"></has-error>
               </div>

              <div class="form-group">
                 <label>Product Brand Status</label>
                 <select v-model="form.productBrandStatus" name="productBrandStatus" :class="{ 'is-invalid': form.errors.has('productBrandStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="productBrandStatus"></has-error>
              </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
         </div>
       </div>
     </div>

      <div class="card mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Product Brand List</h3>
          </div>
          <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Product Brand Name</th>
                   <th>Product Brand Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr v-for="(showDatas, index) in showDataentry">
                    <td>{{ index+1 }}</td>
                    <td>{{ showDatas.productBrandName }}</td>
                    <td>
                        <div v-if="showDatas.productBrandStatus == 1">
                          <button type="button"  @click="changeStatus(showDatas.productBrandEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(showDatas.productBrandEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                     <router-link :to="`/productbrand@entryEdit${showDatas.productBrandEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                     <button @click.prevent="deleteProductBrand(showDatas.productBrandEntryId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
        data(){
            return{
                form: new Form({
                    productBrandName:'',
                    productBrandStatus: '',
                }),
                showDataentry:[],
            }
        },

        mounted() {
            this.ShowDataList()
        },

        methods: {
            productBrandCreate() {
                this.form.post('/productBrandEntry').then(res => {
                    if (res.data.changeProductBrandName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Your Product Brand Name'
                        })
                    }
                    else {
                        this.form.reset()
                        Toast.fire({
                            icon: 'success',
                            title: 'Product Brand Entry Successfully'
                        })
                        this.ShowDataList()
                    }
                });
            },
            changeStatus($productBrandEntryId){
                axios.get("productBrandEntry/"+$productBrandEntryId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Product Brand Status Change Successfully'
                    })
                    this.ShowDataList()
                })
            },


            ShowDataList() {
                axios.get('/productBrandEntry')
                    .then(res => {
                        this.showDataentry = res.data.productBrandEntry
                    })
            },

            deleteProductBrand(productBrandEntryId){
              axios.delete('/productBrandEntry/'+productBrandEntryId)
                .then( res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Deleted Product Brand Successfully'
                    })
                    this.ShowDataList();
                })
            }
        }
    }
</script>
