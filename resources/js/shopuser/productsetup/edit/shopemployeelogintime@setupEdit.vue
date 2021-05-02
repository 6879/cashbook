<template>
    <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Update Shop Employee Login Time Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="shopEmployeeLoginTimeUpdate()">
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
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">update</button>
              </div>
          </form>
         </div>
       </div>
     </div>
  </span>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    fullName:'',
                    shopEmployeeEntryId: '',
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
            this.getData();
            this.employeeNameShow();
        },

        methods:{
            employeeNameShow() {
                axios.get('/ShopEmployeeLoginTimeEntry/create').then(res => {
                    this.employeeNameShows = res.data
                })
            },
            getData(){
                axios.get('/ShopEmployeeLoginTimeEntry/'+this.$route.params.employeeLoginTimeId+ '/edit').then( res => {
                    this.form.fill(res.data.editData);
                })
            },

            shopEmployeeLoginTimeUpdate(){
                this.form.put('/ShopEmployeeLoginTimeEntry/'+this.$route.params.employeeLoginTimeId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Shop Employee Login Time Updated successfully'
                        })
                        this.$router.push('/shopemployeelogintime@setup')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
