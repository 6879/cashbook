<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Employee Leave Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="updateLeaveEntry()">
              <div class="form-group">
                 <label>Employee Name</label>
                 <select v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }" class="form-control">
                   <option value="">Select One</option>
                   <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                 </select>
                 <has-error :form="form" field="employeEntryId"></has-error>
              </div>
              <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" v-model="form.startDate"  name="startDate" :class="{ 'is-invalid': form.errors.has('startDate') }" placeholder="Job Department Name" class="form-control">
                  <has-error :form="form" field="startDate"></has-error>
              </div>
              <div class="form-group">
                  <label>End Date</label>
                  <input type="date" v-model="form.endDate"  name="endDate" :class="{ 'is-invalid': form.errors.has('endDate') }"  class="form-control">
                  <has-error :form="form" field="endDate"></has-error>
              </div>
              <div class="form-group">
                  <label>Commitment</label>
                  <textarea v-model="form.commitment"  name="commitment" class="form-control" placeholder="Commitment" :class="{ 'is-invalid': form.errors.has('commitment') }" style="height:130px">
                  </textarea>
                  <has-error :form="form" field="commitment"></has-error>
              </div>
             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
             </div>
          </form>
        </div>
      </div>
     </div>
  </span>
</template>
<script>
    export default {
        data () {
            return {
                form: new Form({
                    employeEntryId: '',
                    startDate : '',
                    endDate : '',
                    commitment: '',
                }),
                employeeNames:{},
            }
        },
        mounted(){
            this.employeeNameList();
            this.employeeLeaveEntryInfor();
        },
        methods:{
            employeeNameList(){
               axios.get('/employeeName').then(res =>{
                 this.employeeNames = res.data.employeeName;
              })
            },
            employeeLeaveEntryInfor(){
               axios.get('/employeeLeaveEntry/'+this.$route.params.leaveEntryId+'/edit').then(res =>{
                  this.form.fill(res.data);
              })
            },
            updateLeaveEntry(){
                this.form.put('/employeeLeaveEntry/'+this.$route.params.leaveEntryId).then(res =>{
                    if (res.data.alreadyEntry) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Already Employee Leave Entry'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Employee Leave Update Successfully'
                        })
                        this.$router.push('/leave@entry')
                    }
                })
            },
        }
    }

</script>
