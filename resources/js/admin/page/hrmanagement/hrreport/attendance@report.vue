<template id="">
  <span>
   <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Employee Attendance Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Employee____Name</th>
               <th v-for="num in 31">
                  {{ num }}
               </th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(employeeName, index) in employeeNames">
                <td>{{ index+1 }}</td>
                <td>{{ employeeName.fullName }}</td>
                <td v-for="(num, index) in number" >
                    <span v-for="attendanceReport in attendanceReports"  :title="'In Time :'+attendanceReport.employeeInTime + ' Out Time :'+attendanceReport.employeeOutTime"  v-if="attendanceReport.employeEntryId == employeeName.shopEmployeeEntryId && attendanceReport.employeeInDate.split('-')[0] == num">
                      {{ attendanceReport.attendanceStatus }}
                    </span>
                </td>

              </tr>
            </tbody>
          </table>
        </div>
     </div>
  </span>
</template>
<script>
import moment from 'moment'
    export default {
        data () {
            return {
                employeeNames:{},
                attendanceReports:{},
                currentDateMonth: {},
                momentFormat: {},
                momentFormatMonth: {},
                momentFormatDate: {},
                number:[
                          '01','02','03','04','05','06','07','08','09','10',
                          '11','12','13','14','15','16','17','18','19','20',
                          '21','22','23','24','25','26','27','28','29','30',
                          '31'
                      ],
            }
        },
        mounted(){
            this.employeeLeaveEntryList();

        },
        methods:{
            employeeLeaveEntryList(){
                axios.get('/employeeAttendanceReport').then(res =>{
                    this.employeeNames = res.data.employeeNames;
                    this.attendanceReports = res.data.attendanceReports;

                    this.currentDateMonth = new Date().toLocaleString();

                    this.momentFormat = moment(String(this.currentDateMonth)).format('MM/DD/YYYY');
                    this.momentFormatMonth = this.momentFormat.split('/')[0];
                    this.momentFormatDate = this.momentFormat.split('/')[1];

              })
            },
        },
    }
</script>
