<template id="">
  <span>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Employee Report</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered  table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Employee_Type</th>
                 <th>Job_Department</th>
                 <th>User_Name</th>
                 <th>Password</th>
                 <th>Full_Name</th>
                 <th>Father_Name</th>
                 <th>Mother_Name</th>
                 <th>Date_Of_Birth</th>
                 <th>Phone Number</th>
                 <th>Religion</th>
                 <th>Sex</th>
                 <th>Marital Status</th>
                 <th>Nid_Number</th>
                 <th>Nationality</th>
                 <th>Present Address</th>
                 <th>Permanent Address</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(employeeList, index) in employeeLists.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="employeeList.shop_employee_types">{{ employeeList.shop_employee_types.shopEmployeeTypeName	 }}</td>
                  <td v-if="employeeList.job_departments">{{ employeeList.job_departments.jobDepartmentName	 }}</td>
                  <td>{{ employeeList.userName	 }}</td>
                  <td>{{ employeeList.password	 }}</td>
                  <td>{{ employeeList.fullName	 }}</td>
                  <td>{{ employeeList.fatherName	 }}</td>
                  <td>{{ employeeList.motherName	 }}</td>
                  <td>{{ employeeList.dateOfBirth	 }}</td>
                  <td>{{ employeeList.phoneNumber	 }}</td>
                  <td>
                      <span v-if="employeeList.religion == 1">
                        Islam
                      </span>
                      <span v-if="employeeList.religion == 2">
                        Hindu
                      </span>
                      <span v-if="employeeList.religion == 3">
                        Ohter
                      </span>
                  </td>
                  <td>
                      <span v-if="employeeList.sex == 1">
                        Male
                      </span>
                      <span v-if="employeeList.sex == 2">
                        Female
                      </span>
                  </td>
                  <td>
                      <span v-if="employeeList.maritalStatus == 1">
                        Single
                      </span>
                      <span v-if="employeeList.maritalStatus == 2">
                        Married
                      </span>
                  </td>
                  <td>{{ employeeList.nidNumber	}}</td>
                  <td>{{ employeeList.nationality }}</td>
                  <td>{{ employeeList.presentAddress	}}</td>
                  <td>{{ employeeList.permanentAddress }}</td>
                  <td>
                     <div v-if="employeeList.status == 1">
                        <button type="button"  @click="changeStatus(employeeList.shopEmployeeEntryId)" class="btn btn-hover-shine btn-success">
                          Unsuspend
                        </button>
                     </div>
                     <div v-else>
                        <button type="button"  @click="changeStatus(employeeList.shopEmployeeEntryId)" class="btn btn-hover-shine btn-danger">
                           Suspend
                        </button>
                     </div>
                  </td>
                  <td>
                     <router-link :to="`/employee@details${employeeList.shopEmployeeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-eye"></i>View</router-link>
                  </td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="employeeLists" :limit="limit"  @pagination-change-page="getPaginateReport">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
      </div>
  </span>
</template>

<script>
    export default {
        data(){
           return{
             employeeLists: {},
           }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.employeeReport();
            this.getPaginateReport();
        },
        methods:{
            employeeReport(){
                axios.get('/employeeReport').then(res =>{
                    this.employeeLists = res.data.employeeList
              })
            },
            getPaginateReport(page = 1) {
                axios.get('/employeeReport?page=' + page).then(response => {
                    this.employeeLists = response.data.employeeList;
                });
            },
            changeStatus(shopEmployeeEntryId){
                axios.get('/employeeSuspendUnsuspend/'+shopEmployeeEntryId).then(res => {
                    this.employeeReport();
             });
           }
        }
    }
</script>
