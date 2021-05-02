<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Expence Type Create</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="expenceTypeCreate()">
              <div class="form-group">
                  <label>Expence Type Name</label>
                  <input type="text" v-model="form.shopExpenceTypeName"  name="shopExpenceTypeName" :class="{ 'is-invalid': form.errors.has('shopExpenceTypeName') }" placeholder="Shop Expence Type Name" class="form-control">
                  <has-error :form="form" field="shopExpenceTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Expence Type Status</label>
                 <select v-model="form.shopExpenceTypeStatus" name="shopExpenceTypeStatus" :class="{ 'is-invalid': form.errors.has('shopExpenceTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopExpenceTypeStatus"></has-error>
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
        <h3 style="color:black">Expence Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Expence Type Name</th>
               <th>Expence Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(ShowDatas, index) in ShowData">
                <td>{{ index+1 }}</td>
                <td>{{ ShowDatas.shopExpenceTypeName }}</td>
                <td>
                    <div v-if="ShowDatas.shopExpenceTypeStatus == 1">
                      <button type="button"  @click="changeStatus(ShowDatas.shopExpenceTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(ShowDatas.shopExpenceTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/shopaddexpencetype@Editentry${ShowDatas.shopExpenceTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <div v-if="ShowValues.role == 1">
                    <button  @click="distroy(ShowDatas.shopExpenceTypeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                    </div>
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
                    shopExpenceTypeName : '',
                    shopExpenceTypeStatus: '',

                }),
                ShowData:[],
                ShowValues:{},
            }
        },
        mounted(){
            this.expenceTypeShow();
            this.getAuthData();
        },
        methods:{
            expenceTypeCreate(){
              this.form.post('/shopExpenceTypeEntry').then(res =>{
                  if (res.data.changeExpenceType) {
                      Toast.fire({
                        icon: 'error',
                        title: 'Change Expence Type Name'
                      })
                  }
                  else{
                      Toast.fire({
                        icon: 'success',
                        title: 'Shop Expence Type Save Successfully'
                      })
                      this.form.reset();
                      this.expenceTypeShow();
                  }
              })
            },
            expenceTypeShow(){
                axios.get('/shopExpenceTypeEntry').then(res =>{
                    this.ShowData = res.data.show
                })
            },

            getAuthData(){
                axios.get('/shopExpenceTypeEntry').then(res =>{
                    this.ShowData =  res.data.show;
                    this.ShowValues =  res.data.value;
                })
            },
            changeStatus(shopExpenceTypeId){
                axios.get('/shopExpenceTypeEntry/'+shopExpenceTypeId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Expence Status Change Successfully'
                    })
                    this.expenceTypeShow();
                })
            },
            distroy(shopExpenceTypeId){
                axios.delete('/shopExpenceTypeEntry/'+shopExpenceTypeId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Expence Deleted Successfully'
                    })
                    this.expenceTypeShow();
                })
            }

        },
    }
</script>

<style scoped>

</style>
