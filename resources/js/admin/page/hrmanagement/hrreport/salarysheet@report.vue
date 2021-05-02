<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color:#01B0F1;border:1px solid rgba(0, 0, 0, 0.05)">
           <h3 style="color:black;">Salary Sheet Report</h3>
      </div>
        <form  @submit.prevent="serchEmployeeSalary()">
          <div class="row  mx-2 my-2">
            <div class="form-group row m-0 mb-0">
                <label class="col-sm-4">Employee Name</label>
                <div class="col-sm-8">
                    <select v-model="form.employeEntryId" name="employeEntryId" class="form-control" >
                      <option value="">Select One</option>
                      <option value="all">All</option>
                      <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-0 mb-0">
                <label class="col-sm-4">Payment Status</label>
                <div class="col-sm-8">
                    <select v-model="form.paymentStatus" name="paymentStatus"  class="form-control" >
                      <option value="">Select One</option>
                      <option value="all">All</option>
                      <option value="1">Paid</option>
                      <option value="0">Unpaid</option>
                    </select>
                </div>
            </div>
           <div class="form-group row m-0 mb-0">
                <label class="col-sm-4">Monthly Payment</label>
                <div class="col-sm-8">
                    <select v-model="form.monthlyPayment" name="monthlyPayment"  class="form-control">
                      <option value="">Select One</option>
                      <option value="all">All</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
               </div>
            </div>
            <div class="text-right">
              <button type="submit" class="ml-3 mt-1 btn-pill btn-hover-shine btn btn-primary">Search</button>
            </div>
         </div>
        </form>

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
                   <th>Payment Status</th>
                   <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(salarySheetReport, index) in salarySheetReports.data" v-if="recode">
                  <td>{{ index+1 }}</td>
                  <td >{{ salarySheetReport.shop_employee_name.fullName }}</td>
                  <td >{{ salarySheetReport.job_departments.jobDepartmentName }}</td>
                  <td >{{ salarySheetReport.grade_entry_list.gradeName	}}</td>
                  <td >{{ salarySheetReport.grade_entry_list.gradeAmount	}}</td>
                  <td >{{ salarySheetReport.startDate }}</td>
                  <td>
                    <div v-if="salarySheetReport.paymentStatus == 1">
                      <button type="button"  @click="paymentStatus(salarySheetReport.salarySetupId)" class="btn btn-hover-shine btn-success">Paid</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="paymentStatus(salarySheetReport.salarySetupId)" class="btn btn-hover-shine btn-danger">Unpaid</button>
                    </div>
                  </td>
                  <td>
                    <router-link :to="`/salarysheet@statement${salarySheetReport.employeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class="fa fa-eye mr-2"></i>Statement</router-link>
                  </td>
                </tr>

                <tr class="text-center" v-if="noRecode">
                    <td colspan="8">No Record Available</td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer" v-if="recode">
           <pagination :data="salarySheetReports" :limit="limit"  @pagination-change-page="getPaginateReport">
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
             form: new Form({
                 employeEntryId : '',
                 paymentStatus : '',
                 monthlyPayment : '',

             }),
             employeeNames:{},
             salarySheetReports: {},
             recode: true,
             noRecode: false,
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
            this.salarySheetReport();
            this.getPaginateReport();
        },
        methods:{
            employeeNameList(){
               axios.get('/employeeName').then(res =>{
                 this.employeeNames = res.data.employeeName;
               })
            },
            salarySheetReport(){
                axios.get('/salarySheetReport').then(res =>{
                    this.salarySheetReports = res.data.salarySheetReports
              })
            },
            getPaginateReport(page = 1) {
                axios.get('/salarySheetReport?page=' + page).then(response => {
                    this.salarySheetReports = response.data.salarySheetReports;
                });
            },
            paymentStatus(salarySetupId){
                axios.get('/salaryPaymentStatus/'+salarySetupId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Salary Payment Status Change Successfully'
                    })
                    this.salarySheetReport();
                })
            },
            serchEmployeeSalary(){
                this.form.post('/serchEmployeeSalary').then(res =>{
                     if (res.data.all) {
                         this.recode = true;
                         this.noRecode = false;
                         this.salarySheetReport();
                     }
                     else if (res.data.noRecode) {
                           this.recode = false;
                           this.noRecode = true;
                     }
                     else if (res.data.salarySheetReports) {
                           this.recode = true;
                           this.noRecode = false;
                           this.salarySheetReports = res.data.salarySheetReports
                     }
                });
            },
        },
    }
</script>
