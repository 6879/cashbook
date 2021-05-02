<template>
   <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Shop Employee Login Time Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="employeeLoginTimeEntry()">
               <div class="form-group">
                 <label>Shop Employee Name</label>
                  <select v-model="form.shopEmployeeEntryId" name="shopEmployeeEntryId" class="form-control" :class="{ 'is-invalid': form.errors.has('shopEmployeeEntryId') }">
                      <option value="">Select One</option>
                      <option v-for="employeeNameShow in employeeNameShows" :value="employeeNameShow.shopEmployeeEntryId">{{ employeeNameShow.fullName }}</option>
                  </select>
                  <has-error :form="form" field="shopEmployeeEntryId"></has-error>
              </div>
              <div class="form-group">
                 <label>Login Time Start</label>
                 <input type="text" v-model="form.employeeLoginTimeStart" name="employeeLoginTimeStart"  placeholder="Enter Employee Login Start Time" class="form-control" :class="{ 'is-invalid': form.errors.has('employeeLoginTimeStart') }">
                   <has-error :form="form" field="employeeLoginTimeStart"></has-error>
               </div>
              <div class="form-group">
                 <label>Login Time End</label>
                 <input type="text" v-model="form.employeeLoginTimeEnd" name="employeeLoginTimeEnd"  placeholder="Enter Employee Login End Time" class="form-control" :class="{ 'is-invalid': form.errors.has('employeeLoginTimeEnd') }">
                   <has-error :form="form" field="employeeLoginTimeEnd"></has-error>
               </div>

              <div class="form-group">
                 <label>Login Off Day</label>
                 <input type="text" v-model="form.employeeLoginOffDay" name="employeeLoginOffDay"  placeholder="Enter Employee Login Offday" class="form-control" :class="{ 'is-invalid': form.errors.has('employeeLoginOffDay') }">
                   <has-error :form="form" field="employeeLoginOffDay"></has-error>
               </div>
              <div class="form-group">
                 <label>Status</label>
                 <select v-model="form.employeeLoginStatus" name="employeeLoginStatus" :class="{ 'is-invalid': form.errors.has('employeeLoginStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="employeeLoginStatus"></has-error>
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
            <h3 style="color:black">Shop Employee Login Time Entry List</h3>
          </div>
          <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Employee Name</th>
                   <th>Login Time Start</th>
                   <th>Login Time End</th>
                   <th>Login Off Day</th>
                   <th>Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr v-for="(showDatas, index) in showDataEntry">
                    <td>{{ index+1 }}</td>
                    <td v-if="showDatas.shop_employee_entry == null"></td>
                    <td v-else="showDatas.shop_employee_entry">{{ showDatas.shop_employee_entry.fullName }}</td>
                    <td>{{ showDatas.employeeLoginTimeStart }}</td>
                    <td>{{ showDatas.employeeLoginTimeEnd }}</td>
                    <td>{{ showDatas.employeeLoginOffDay }}</td>
                    <td>
                        <div v-if="showDatas.employeeLoginStatus == 1">
                          <button type="button"  @click="changeStatus(showDatas.employeeLoginTimeId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(showDatas.employeeLoginTimeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                         <router-link :to="`/shopemployeelogintime@setupEdit${showDatas.employeeLoginTimeId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                         <button @click.prevent="deleteLoginTimeEntry(showDatas.employeeLoginTimeId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                    shopEmployeeEntryId:'',
                    employeeLoginTimeStart: '',
                    employeeLoginTimeEnd: '',
                    employeeLoginOffDay: '',
                    employeeLoginStatus: '',
                }),
                employeeNameShows: [],
                showDataEntry: [],
            }
        },
        mounted() {
            this.employeeNameShow();
            this.getData();
        },
        methods:{
            employeeNameShow() {
                axios.get('/ShopEmployeeLoginTimeEntry/create').then(res => {
                    this.employeeNameShows = res.data
                })
            },
            employeeLoginTimeEntry() {
                this.form.post('/ShopEmployeeLoginTimeEntry').then(res => {
                    this.form.reset()
                    Toast.fire({
                        icon: 'success',
                        title: 'Saved ShopEmployeeLoginTime Entry successfully'
                    })
                    this.getData();
                })
            },
            getData() {
                axios.get('/ShopEmployeeLoginTimeEntry').then(res => {
                    this.showDataEntry = res.data.showData
                })
            },
            deleteLoginTimeEntry(employeeLoginTimeId) {
                axios.delete('/ShopEmployeeLoginTimeEntry/' + employeeLoginTimeId).then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Login Time Entry Deleted successfully'
                    })
                    this.getData();
                })
            },
            changeStatus(employeeLoginTimeId) {
                axios.get('/ShopEmployeeLoginTimeEntry/' + employeeLoginTimeId).then(res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Employee LoginTime status successfully'
                    })
                    this.getData();
                });
            },
        }
    }
</script>

<style scoped>

</style>
