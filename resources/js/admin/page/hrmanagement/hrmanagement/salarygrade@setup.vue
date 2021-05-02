<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Salary Grade Setup </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="salaryGradeSetup()">
             <div class="form-group">
                <label>Employee Name</label>
                <select v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }" class="form-control">
                  <option value="">Select One</option>
                  <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                </select>
                <has-error :form="form" field="employeEntryId"></has-error>
             </div>
              <div class="form-group">
                  <label>Salary Grade Name</label>
                  <select v-model="form.gradeEntryId" name="gradeEntryId" @change.prevent="salaryGradeAmount()" :class="{ 'is-invalid': form.errors.has('gradeEntryId') }" class="form-control">
                    <option value="">Select One</option>
                    <option v-for="salaryGradeList in salaryGradeLists" :value="salaryGradeList.gradeEntryId">{{ salaryGradeList.gradeName }} ({{ salaryGradeList.gradeAmount }})</option>
                  </select>
                  <has-error :form="form" field="gradeEntryId"></has-error>
              </div>
              <div class="form-group">
                  <label>Salary Grade Amount</label>
                  <input type="text" disabled v-model="form.salaryGradeAmount"  name="salaryGradeAmount" :class="{ 'is-invalid': form.errors.has('salaryGradeAmount') }" placeholder="Salary Grade Amount" class="form-control">
                  <has-error :form="form" field="salaryGradeAmount"></has-error>
              </div>
              <div class="form-group">
                 <label>Salary Grade Setup Status</label>
                 <select v-model="form.salaryGradeSetupStatus" name="salaryGradeSetupStatus" :class="{ 'is-invalid': form.errors.has('salaryGradeSetupStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="salaryGradeSetupStatus"></has-error>
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
               <th>Salary Grade Name</th>
               <th>Salary Grade Amount</th>
               <th>Salary Grade Setup Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(salaryGradeSetupList, index) in salaryGradeSetupLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.fullName	}}</td>
                <td v-if="salaryGradeSetupList.grade_list">{{ salaryGradeSetupList.grade_list.gradeName }}</td>
                <td v-if="salaryGradeSetupList.grade_list">{{ salaryGradeSetupList.grade_list.gradeAmount	 }}</td>
                <td>
                    <div v-if="salaryGradeSetupList.salaryGradeSetupStatus == 1">
                      <button type="button"  @click="changeStatus(salaryGradeSetupList.salaryGradeSetupId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(salaryGradeSetupList.salaryGradeSetupId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/salarygradesetup@edit${salaryGradeSetupList.salaryGradeSetupId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="salaryGradeSetupLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    gradeEntryId : '',
                    salaryGradeAmount : '',
                    salaryGradeSetupStatus: '',
                }),
                employeeNames:{},
                salaryGradeLists:{},
                salaryGradeSetupLists:{},
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
            this.salaryGradeList();
            this.salaryGradeSetupList();
            this.getPaginateList();
        },
        methods:{
            employeeNameList(){
               axios.get('/employeeName').then(res =>{
                 this.employeeNames = res.data.employeeName;
              })
            },
            salaryGradeList(){
               axios.get('/salaryGradeList').then(res =>{
                 this.salaryGradeLists = res.data.salaryGradeList;
              })
            },
            salaryGradeAmount(){
               axios.get('/salaryGradeAmount/'+this.form.gradeEntryId).then(res =>{
                 this.form.salaryGradeAmount = res.data.salaryGradeAmount;
               })
            },
            salaryGradeSetup(){
                this.form.post('/salaryGradeSetup').then(res =>{
                    if (res.data.gradeSetup) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Already Salary Grade Setup'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Salary Grade Setup Successfully'
                        })
                        this.form.reset();
                        this.salaryGradeSetupList();
                    }
                })
            },
            salaryGradeSetupList(){
                axios.get('/salaryGradeSetup').then(res =>{
                    this.salaryGradeSetupLists = res.data.salaryGradeSetupList
              })
            },
            getPaginateList(page = 1) {
                axios.get('/salaryGradeSetup?page=' + page).then(response => {
                    this.salaryGradeSetupLists = response.data.salaryGradeSetupList;
                });
            },
            changeStatus(salaryGradeSetupId){
                axios.get('/salaryGradeSetup/'+salaryGradeSetupId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Salary Grade Setup Status Change Successfully'
                    })
                    this.salaryGradeSetupList();
                })
            },
        }
    }

</script>
