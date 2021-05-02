<template id="">
  <span>
    <div class="card main-card  element-block-example">
       <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
         <h3 style="color:black">Salary Grade Setup Report (Owner)</h3>
       </div>
       <div class="table-responsive bg-white">
         <table class="table table-hover table-bordered table-striped">
           <thead>
              <tr>
                <th>SN</th>
                <th>Employee Type Name</th>
                <th>Job Department</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Employee Name</th>
                <th>NID Number</th>
                <th>Present Address</th>
                <th>Salary Grade Name</th>
                <th>Salary Grade Amount</th>
                <th>Salary Grade Setup Status</th>
              </tr>
             </thead>
             <tbody>
               <tr v-for="(salaryGradeSetupList, index) in salaryGradeSetupLists.data">
                 <td>{{ index+1 }}</td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">
                   <span v-for="employeeTypeList in employeeTypeLists" v-if="employeeTypeList.shopEmployeeTypeId == salaryGradeSetupList.shop_employee_list.employeeTypeId">
                      {{ employeeTypeList.shopEmployeeTypeName }}
                   </span>
                 </td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">
                   <span v-for="jobDepartmentList in jobDepartmentLists" v-if="jobDepartmentList.jobDepartmentEntryId == salaryGradeSetupList.shop_employee_list.jobDepartmentId">
                     {{ jobDepartmentList.jobDepartmentName }}
                   </span>
                 </td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.userName	}}</td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.password	}}</td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.fullName	}}</td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.nidNumber	}}</td>
                 <td v-if="salaryGradeSetupList.shop_employee_list">{{ salaryGradeSetupList.shop_employee_list.presentAddress	}}</td>
                 <td v-if="salaryGradeSetupList.grade_list">{{ salaryGradeSetupList.grade_list.gradeName }}</td>
                 <td v-if="salaryGradeSetupList.grade_list">{{ salaryGradeSetupList.grade_list.gradeAmount	 }}</td>
                 <td>
                     <div v-if="salaryGradeSetupList.salaryGradeSetupStatus == 1">
                       <button type="button"  class="btn btn-hover-shine btn-success">Published</button>
                     </div>
                     <div v-else>
                       <button type="button"  class="btn btn-hover-shine btn-danger">Unpublish</button>
                     </div>
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
        data(){
           return{
             salaryGradeSetupLists: {},
             employeeTypeLists: {},
             jobDepartmentLists: {},
           }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
          this.salaryGradeSetupList();
          this.getPaginateList();
        },
        methods:{
          salaryGradeSetupList(){
              axios.get('/salaryGradeSetupReport').then(res =>{
                  this.employeeTypeLists = res.data.employeeTypeList
                  this.jobDepartmentLists = res.data.jobDepartmentList
                  this.salaryGradeSetupLists = res.data.salaryGradeSetupList
            })
          },
          getPaginateList(page = 1) {
              axios.get('/salaryGradeSetupReport?page=' + page).then(response => {
                  this.salaryGradeSetupLists = response.data.salaryGradeSetupList;
              });
          },
        }
    }

</script>
