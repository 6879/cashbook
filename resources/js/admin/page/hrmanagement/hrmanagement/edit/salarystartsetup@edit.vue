<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Salary Start Setup</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="salaryStartSetupUpdate()">
             <div class="form-group">
                <label>Employee Name</label>
                <select v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }" class="form-control" @change.prevent="employeeEntryId()">
                  <option value="">Select One</option>
                  <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                </select>
                <has-error :form="form" field="employeEntryId"></has-error>
             </div>
              <div class="form-group">
                  <label>Employee Department</label>
                  <input type="text" disabled v-model="form.employeeDepartment"  name="employeeDepartment" :class="{ 'is-invalid': form.errors.has('employeeDepartment') }" placeholder="Employee Department Name" class="form-control">
                  <has-error :form="form" field="employeeDepartment"></has-error>
              </div>
              <div class="form-group">
                  <label>Grade Name</label>
                  <input type="text" disabled v-model="form.gradeName"  name="gradeName" :class="{ 'is-invalid': form.errors.has('gradeName') }" placeholder="Grade Name" class="form-control">
                  <has-error :form="form" field="gradeName"></has-error>
              </div>
              <div class="form-group">
                  <label>Grade Amount</label>
                  <input type="text" disabled v-model="form.gradeAmount"  name="gradeAmount" :class="{ 'is-invalid': form.errors.has('gradeAmount') }" placeholder="Grade Amount" class="form-control">
                  <has-error :form="form" field="gradeAmount"></has-error>
              </div>
              <div class="form-group">
                  <label>Start Salary Date</label>
                  <input type="date" v-model="form.startDate"  name="startDate" :class="{ 'is-invalid': form.errors.has('startDate') }" class="form-control">
                  <has-error :form="form" field="startDate"></has-error>
              </div>

              <input type="hidden"  v-model="form.gradeEntryId"  name="gradeEntryId"  class="form-control">

              <div class="form-group">
                 <label>Salary Setup Status</label>
                 <select v-model="form.salarySetupStatus" name="salarySetupStatus" :class="{ 'is-invalid': form.errors.has('salarySetupStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="salarySetupStatus"></has-error>
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
                    employeEntryId : '',
                    employeeDepartment : '',
                    gradeEntryId : '',
                    gradeName : '',
                    gradeAmount : '',
                    startDate : '',
                    salarySetupStatus: '',
                }),
                employeeNames:{},
                salarySetupLists:{},
            }
        },
        mounted(){
            this.employeeNameList();
            this.singleDataShow();
        },
        methods:{
            employeeNameList(){
               axios.get('/employeeName').then(res =>{
                 this.employeeNames = res.data.employeeName;
              })
            },
            employeeEntryId(){
               axios.get('/salaryGradeName/'+this.form.employeEntryId).then(res =>{
                   this.form.gradeEntryId = res.data.salaryGradeinfo.gradeEntryId;
                   this.form.gradeName = res.data.salaryGradeinfo.gradeName;
                   this.form.gradeAmount = res.data.salaryGradeinfo.gradeAmount;
                   this.form.employeeDepartment = res.data.jobDepartmentinfo.jobDepartmentName;
               })
            },
            singleDataShow(){
                axios.get('/salaryStartSetup/'+this.$route.params.salarySetupId+'/edit' ).then(res =>{
                   this.form.fill(res.data.startSalarySetupList)
                   this.form.employeeDepartment = res.data.startSalarySetupList.job_departments.jobDepartmentName
                   this.form.gradeName = res.data.startSalarySetupList.grade_entry_list.gradeName
                   this.form.gradeAmount = res.data.startSalarySetupList.grade_entry_list.gradeAmount
                   this.form.gradeAmount = res.data.startSalarySetupList.grade_entry_list.gradeAmount
               })
            },
            salaryStartSetupUpdate(){
                this.form.put('/salaryStartSetup/'+this.$route.params.salarySetupId).then(res =>{
                    if (res.data.alreadySetup) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Already Employee Salary Setup'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Salary Setup Update Successfully'
                        })
                        this.$router.push('/salarystart@setup')
                    }
                })
            },
        }
    }

</script>
