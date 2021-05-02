<template id="">
  <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Add Product Brand</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="productBrandCreate()">

              <div class="form-group" v-if="authInfo.role == 1 || authInfo.role == 2" >
                 <label>Select Shop Type </label>
                 <select v-model="form.shopTypeId" name="shopTypeId" :class="{ 'is-invalid': form.errors.has('productBrandStatus') }" class="form-control" @change.prevent="adminShopTypeIdSelect()">
                   <option value="">Select One</option>
                   <option  v-for="shopTypeName in shopTypeNames" :value="shopTypeName.shopTypeEntryId">{{ shopTypeName.shopTypeName }} </option>
                 </select>
                  <has-error :form="form" field="productBrandStatus"></has-error>
              </div>


               <div class="form-group">
                 <label>Product Brand Name</label>
                 <input type="text" v-model="form.productBrandName" name="productBrandName"  placeholder="Brand Name" class="form-control" :class="{ 'is-invalid': form.errors.has('productBrandName') }">
                   <has-error :form="form" field="productBrandName"></has-error>
               </div>

                 <div class="form-group">
                 <label>Product Brand Position</label>
                   <input type="text" disabled v-model="form.productBrandPosition" name="productBrandPosition"  placeholder="Product Brand Position" :class="{ 'is-invalid': form.errors.has('productBrandPosition') }" class="form-control">
                     <has-error :form="form" field="productBrandPosition"></has-error>
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
                   <th v-if="authInfo.role == 1 || authInfo.role == 2">Shop Type Name</th>
                   <th>Product Brand Name</th>
                   <th>Product Brand Status</th>
                   <th>Action</th>
                 </tr>
                </thead>

                <tbody v-if="authInfo.role == 1 || authInfo.role == 2">
                  <tr v-for="(adminProductBrandList, index) in adminProductBrandLists">
                    <td>{{ index+1 }}</td>
                    <td>{{ adminProductBrandList.shop_type_name.shopTypeName }}</td>
                    <td>{{ adminProductBrandList.productBrandName }}</td>
                    <td>
                        <div v-if="adminProductBrandList.productBrandStatus == 1">
                          <button type="button"  @click="changeStatus(adminProductBrandList.productBrandEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(adminProductBrandList.productBrandEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                      <router-link :to="`/shopproductbrand@entryEdit${adminProductBrandList.productBrandEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                      <!-- <button @click.prevent="deleteProductBrand(showDatas.productBrandEntryId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button> -->
                   </td>
                 </tr>
               </tbody>

                <tbody v-else>
                  <tr v-for="(shopProductBrandList, index) in shopProductBrandLists">
                    <td>{{ index+1 }}</td>
                    <td>{{ shopProductBrandList.productBrandName }}</td>
                    <td>
                        <div v-if="shopProductBrandList.productBrandStatus == 1">
                          <button type="button"  @click="changeStatus(shopProductBrandList.productBrandEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(shopProductBrandList.productBrandEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                      <router-link :to="`/shopproductbrand@entryEdit${shopProductBrandList.productBrandEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
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
                    shopTypeId: '',
                    productBrandPosition: '',
                }),
                adminProductBrandLists:{},
                shopProductBrandLists:{},
                shopTypeNames:{},
                authInfo:{},

            }
        },

        mounted() {
            this.ShowDataLists()
            this.shopTypeNameShow();
            this.condition();
            this.productBrandPosition();
        },

        methods: {
            productBrandCreate() {
                this.form.post('/shopproductBrandEntry').then(res => {
                    if (res.data.changeProductBrandName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change your Product Brand Name'
                        })
                    }
                    else {
                        this.form.reset()
                        Toast.fire({
                            icon: 'success',
                            title: 'Product Brand Entry Successfully'
                        })
                        this.ShowDataLists()
                        this.productBrandPosition()
                    }
                });
            },

            ShowDataLists() {
              axios.get('/shopproductBrandEntry').then(res => {
                this.adminProductBrandLists = res.data.adminProductBrandList
                this.shopProductBrandLists = res.data.shopProductBrandList
              })
            },
            shopTypeNameShow() {
                axios.get('/category/create').then(res => {
                    this.shopTypeNames = res.data.shopTypeNames;
                });
            },
            adminShopTypeIdSelect(){
                axios.get('/adminProductBrandPosition/'+this.form.shopTypeId).then(res => {
                    this.form.productBrandPosition = res.data.productBrandIncrement;
                });
            },
            productBrandPosition(){
                axios.get('/shopProductBrandPosition').then(res=>{
                    this.form.productBrandPosition = res.data.productBrandIncrement;
                })
            },
            changeStatus(productBrandEntryId){
              axios.get("/shopproductBrandEntry/"+productBrandEntryId).then(res=>{
                Toast.fire({
                  icon: 'success',
                  title: 'Product Brand Status Change Successfully'
                })
                this.ShowDataLists()
              })
            },
            condition(){
                axios.get('/condition').then(res =>{
                    this.authInfo = res.data.authInfo
                })
            },
            // deleteProductBrand(productBrandEntryId){
            //     axios.delete('/shopproductBrandEntry/'+productBrandEntryId)
            //         .then( res=>{
            //             Toast.fire({
            //                 icon: 'success',
            //                 title: 'Deleted Product BrandEntry successfully'
            //             })
            //             this.ShowDataList();
            //         })
            // }
        }
    }
</script>
