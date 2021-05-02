<template id="">
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/salarysheet@report">Salary Sheet Report</router-link></li>
      </ol>
    </nav>
    <div class="card main-card  element-block-example">
      <div class="card-header salaryStatement" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h4 style="color:black;">
            <span v-if="employeeName.shop_employee_name"> Name : {{ employeeName.shop_employee_name.fullName }} </span><br>
            <span v-if="employeeName.shop_employee_name"> Phone Number : {{ employeeName.shop_employee_name.phoneNumber }} </span>
           </h4>
      </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                   <th>SN</th>
                   <th>Employee Job Department</th>
                   <th>Salary Grade Name</th>
                   <th>Salary Grade Amount</th>
                   <th>Salary Start Date</th>
                   <th>Payment Month</th>
                   <th colspan="2" scope="colgroup">Payment Status</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(employeeSalaryDetail, index) in employeeSalaryDetails">
                  <td>{{ index+1 }}</td>
                  <td>{{ employeeSalaryDetail.job_departments.jobDepartmentName }}</td>
                  <td>{{ employeeSalaryDetail.grade_entry_list.gradeName	}}</td>
                  <td>{{ employeeSalaryDetail.grade_entry_list.gradeAmount	}}</td>
                  <td>{{ employeeSalaryDetail.startDate }}</td>
                  <td>
                      <span v-if="employeeSalaryDetail.monthDate == '01'">
                          January
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '02'">
                          February
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '03'">
                          March
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '04'">
                          April
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '05'">
                          May
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '06'">
                          June
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '07'">
                          July
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '08'">
                          August
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '09'">
                          September
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '10'">
                          October
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '11'">
                          November
                      </span>
                      <span v-if="employeeSalaryDetail.monthDate == '12'">
                          December
                      </span>
                  </td>
                  <td scope="col">
                       <div v-if="employeeSalaryDetail.paymentStatus == 1">
                           <button type="button"  @click="paymentStatus(employeeSalaryDetail.salarySetupId)" class="btn btn-hover-shine btn-success">Paid</button>
                       </div>
                       <div v-else class="text-center">
                          0
                       </div>
                  </td>
                  <td scope="col">
                      <div v-if="employeeSalaryDetail.paymentStatus == 0">
                         <button type="button"  @click="paymentStatus(employeeSalaryDetail.salarySetupId)" class="btn btn-hover-shine btn-danger">Unpaid</button>
                      </div>
                      <div v-else class="text-center">
                         0
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
        data(){
           return{
             employeeName: {},
             employeeSalaryDetails: {},
           }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.employeeSalaryDetail();
        },
        methods:{
            employeeSalaryDetail(){
                axios.get('/salarySheetStatement/'+this.$route.params.employeEntryId).then(res =>{
                    this.employeeSalaryDetails = res.data.employeeSalaryDetails
                    this.employeeName = res.data.employeeName
              })
            },
            paymentStatus(salarySetupId){
                axios.get('/salaryPaymentStatus/'+salarySetupId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Salary Payment Status Change Successfully'
                    })
                    this.employeeSalaryDetail();
                })
            },
        },
    }
</script>
<style media="screen">
.salaryStatement {
    padding: 40px 20px;
    font-size: 16px;
}
</style>
