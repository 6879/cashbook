<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Salary Start Setup</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="salaryStartSetup()">
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
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

   <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Salary Grade Setup List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Employee Name</th>
               <th>Employee Job Department</th>
               <th>Salary Grade Name</th>
               <th>Salary Grade Amount</th>
               <th>Salary Start Date</th>
               <th>Salary Grade Setup Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(salarySetupList, index) in salarySetupLists.data">
                <td>{{ index+1 }}</td>
                <td >{{ salarySetupList.shop_employee_name.fullName }}</td>
                <td >{{ salarySetupList.job_departments.jobDepartmentName }}</td>
                <td >{{ salarySetupList.grade_entry_list.gradeName	}}</td>
                <td >{{ salarySetupList.grade_entry_list.gradeAmount	}}</td>
                <td >{{ salarySetupList.startDate }}</td>
                <td>
                    <div v-if="salarySetupList.salarySetupStatus == 1">
                      <button type="button"  @click="changeStatus(salarySetupList.salarySetupId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(salarySetupList.salarySetupId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/salarystartsetup@edit${salarySetupList.salarySetupId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="salarySetupLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
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
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.employeeNameList();
            this.getPaginateList();
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
            salaryStartSetup(){
                this.form.post('/salaryStartSetup').then(res =>{
                    if (res.data.alreadySetup) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Already Employee Salary Setup'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Salary Setup Successfully'
                        })
                        this.form.reset();
                        this.salaryGradeSetupList();
                    }
                })
            },
            salaryGradeSetupList(){
                axios.get('/salaryStartSetup').then(res =>{
                    this.salarySetupLists = res.data.salarySetupLists
              })
            },
            getPaginateList(page = 1) {
                axios.get('/salaryStartSetup?page=' + page).then(response => {
                    this.salarySetupLists = response.data.salarySetupLists;
                });
            },
            changeStatus(salarySetupId){
                axios.get('/salaryStartSetup/'+salarySetupId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Salary Setup Status Change Successfully'
                    })
                    this.salaryGradeSetupList();
                })
            },
        }
    }

</script>
