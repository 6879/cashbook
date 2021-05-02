<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Income Type Create</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="incomeTypeCreate()">
              <div class="form-group">
                  <label>Income Type Name</label>
                  <input type="text" v-model="form.shopIncomeTypeName"  name="shopIncomeTypeName" :class="{ 'is-invalid': form.errors.has('shopIncomeTypeName') }" placeholder="Shop Income Type Name" class="form-control">
                  <has-error :form="form" field="shopIncomeTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Income Type Status</label>
                 <select v-model="form.shopIncomeTypeStatus" name="shopIncomeTypeStatus" :class="{ 'is-invalid': form.errors.has('shopIncomeTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopIncomeTypeStatus"></has-error>
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
        <h3 style="color:black">Income Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Income Type Name</th>
               <th>Income Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(ShowDatas, index) in ShowData">
                <td>{{ index+1 }}</td>
                <td>{{ ShowDatas.shopIncomeTypeName }}</td>
                <td>
                    <div v-if="ShowDatas.shopIncomeTypeStatus == 1">
                      <button type="button"  @click="changeStatus(ShowDatas.shopIncomeTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(ShowDatas.shopIncomeTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/shopaddincometype@entryEdit${ShowDatas.shopIncomeTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <div v-if="ShowValues.role == 1">
                        <button  @click="distroy(ShowDatas.shopIncomeTypeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                    shopIncomeTypeName : '',
                    shopIncomeTypeStatus: '',
                }),
                ShowData:[],
                ShowValues:[],
            }
        },
        mounted(){
            this.incomeTypeShow();
        },
        methods:{
            incomeTypeCreate(){
                this.form.post('/shopIncomeTypeEntry').then(res =>{
                    if (res.data.changeIncomeType) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Change Income Type Name'
                        })
                    }
                    else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Income Type Entry Successfully'
                        })
                        this.form.reset();
                        this.incomeTypeShow();
                    }
                })
            },

            incomeTypeShow(){
                axios.get('/shopIncomeTypeEntry').then(res =>{
                    this.ShowData = res.data.show
                    this.ShowValues = res.data.value
                })
            },


            changeStatus(shopIncomeTypeId){
                axios.get('/shopIncomeTypeEntry/'+shopIncomeTypeId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Income Status Change Successfully'
                    })
                    this.incomeTypeShow();
                })
            },
            distroy(shopExpenceTypeId){
                axios.delete('/shopIncomeTypeEntry/'+shopExpenceTypeId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Income Deleted Successfully'
                    })
                    this.incomeTypeShow();
                })
            }

        },
    }
</script>

<style scoped>

</style>
