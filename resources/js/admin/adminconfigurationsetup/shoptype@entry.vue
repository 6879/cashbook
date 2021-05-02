<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Type Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="shopTpyeCreate()">
              <div class="form-group">
                  <label>Shop Type Name</label>
                  <input v-model="form.shopTypeName" type="text" name="" :class="{ 'is-invalid': form.errors.has('shopTypeName') }" placeholder="Shop Type Name" class="form-control">
                  <has-error :form="form" field="shopTypeName"></has-error>
              </div>              
              
              <div class="form-group">
                  <label>Shop Code No</label>
                  <input v-model="form.shopTypeCode" type="text" name="" :class="{ 'is-invalid': form.errors.has('shopTypeCode') }" placeholder="Shop Type Code" class="form-control">
                  <has-error :form="form" field="shopTypeCode"></has-error>
              </div>

                <div class="form-group">
                 <label>Shop Type Status</label>
                 <select v-model="form.shopTypeStatus" name="shopTypeStatus" :class="{ 'is-invalid': form.errors.has('shopTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopTypeStatus"></has-error>
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
        <h3 style="color:black">Shop Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Type Name</th>
               <th>Shop Type Code</th>
               <th>Shop Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(ShopData, index) in shopTpyeData">
                <td>{{ index+1 }}</td>
                <td>{{ ShopData.shopTypeName }}</td>
                <td>{{ ShopData.shopTypeCode }}</td>
                <td>
                    <div v-if="ShopData.shopTypeStatus == 1">
                      <button type="button"  @click="changeStatus(ShopData.shopTypeEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(ShopData.shopTypeEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                     <router-link :to="`/shopType@entryEdit${ShopData.shopTypeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(ShopData.shopTypeEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                    shopTypeName : '',
                    shopTypeCode : '',
                    shopTypeStatus: '',
                }),
                shopTpyeData:'',

            }
        },
        mounted(){
            this.getData();
        },

        //
        methods:{
            shopTpyeCreate(){
                this.form.post('/shopTypeEntry').then(res=>{
                    if (res.data.changeShopTypeName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Shop Type Entry'
                        })
                    }
                    if (res.data.changeShopTypeCode){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Shop Type Code'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Shop Type Entry Successfully'
                        })
                        this.form.reset();
                        this.getData();
                    }
                })
            },
            getData(){
                axios.get('/shopTypeEntry').then(res =>{
                    this.shopTpyeData = res.data.data;
                })
            },
            changeStatus(shopTypeEntryId){
                axios.get("shopTypeEntry/"+shopTypeEntryId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Status Change Successfully'
                        })
                        this.getData();
                    })
            },

            distroy(shopTypeEntryId){
              axios.delete("shopTypeEntry/"+shopTypeEntryId)
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
