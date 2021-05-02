<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Customer Type Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="shopCustomerTpyeCreate()">
              <div class="form-group">
                  <label>Shop Customer Type Name</label>
                  <input v-model="form.shopCustomerName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('shopCustomerName') }" placeholder="Shop Customer Type Name" class="form-control">
                  <has-error :form="form" field="shopCustomerName"></has-error>
              </div>

                <div class="form-group">
                 <label>Shop Customer Type Status</label>
                 <select v-model="form.shopCustomerStatus" name="shopCustomerStatus" :class="{ 'is-invalid': form.errors.has('shopCustomerStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopCustomerStatus"></has-error>
              </div>

             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Shop Customer Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Customer Type Name</th>
               <th>Shop Customer Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(ShopCustomerData, index) in shopCustomerTpyeData">
                <td>{{ index+1 }}</td>
                <td>{{ ShopCustomerData.shopCustomerName }}</td>
                <td>
                    <div v-if="ShopCustomerData.shopCustomerStatus == 1">
                      <button type="button"  @click="changeStatus(ShopCustomerData.shopCustomerTypeEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(ShopCustomerData.shopCustomerTypeEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                     <router-link :to="`/shopCustomerType@entryEdit${ShopCustomerData.shopCustomerTypeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(ShopCustomerData.shopCustomerTypeEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
        data () {
            return {
                form: new Form({
                    shopCustomerName : '',
                    shopCustomerStatus: '',
                }),
                shopCustomerTpyeData:'',

            }
        },
        mounted(){
            this.getData();
        },

        //
        methods:{
        shopCustomerTpyeCreate(){
                this.form.post('/shopCustomerTypeEntry').then(res=>{
                    if (res.data.changeShopCustomerType){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Shop Customer Type'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Shop Customer Type Entry Successfully'
                        })
                        this.form.reset();
                        this.getData();
                    }
                })
            },
            getData(){
                axios.get('/shopCustomerTypeEntry').then(res =>{
                    this.shopCustomerTpyeData = res.data.data;
                })
            },
            changeStatus(shopCustomerTypeEntryId){
                axios.get("shopCustomerTypeEntry/"+shopCustomerTypeEntryId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Status Change Successfully'
                        })
                        this.getData();
                  })
            },
            distroy(shopCustomerTypeEntryId){
                axios.delete("shopCustomerTypeEntry/"+shopCustomerTypeEntryId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Delete Successfully'
                        })
                        this.getData();
                  })

            },

        }

    }

</script>
