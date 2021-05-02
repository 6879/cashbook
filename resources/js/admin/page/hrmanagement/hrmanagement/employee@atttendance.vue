<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Attendance</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border" id="employeeAttend">

          <div v-if="buttonShow">
              <button type="submit" @click.prevent="clickForAttendance()" class="mr-2 btn-pill btn-hover-shine btn btn-success">Please Click For Attendance</button>
          </div>

          <form  @submit.prevent="employeeAttendanceEntry()" v-if="formShow">
              <div class="form-group">
                 <label>Employee Name</label>
                 <select v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }" class="form-control" @change.prevent="employeEntryIdCatch()">
                   <option value="">Select One</option>
                   <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                 </select>
                 <has-error :form="form" field="employeEntryId"></has-error>
              </div>
              <div class="form-group" v-if="hideCheckbox">
                 <input type="checkbox" :disabled="attendance ? true : false" v-model="form.employeeInTime" name="employeeInTime" :class="{ 'is-invalid': form.errors.has('employeeInTime') }" value="1" class="form-check-input">
                 <label class="form-check-label">Employee In Time</label>
                 <has-error :form="form" field="employeeInTime"></has-error>
              </div>
              <div class="form-group" v-if="hideCheckbox">
                 <input type="checkbox" :disabled="notAttendance ? true : false" v-model="form.employeeOutTime" name="employeeOutTime" :class="{ 'is-invalid': form.errors.has('employeeOutTime') }" value="1" class="form-check-input">
                 <label class="form-check-label">Employee Out Time</label>
                 <has-error :form="form" field="employeeOutTime"></has-error>
              </div>
              <div class="form-group" v-if="employeeLeave">
                 The Employee is on Leave
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
        <h3 style="color:black">Employee Attendance List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Employee Name</th>
               <th>Employee In Date</th>
               <th>Employee In Time</th>
               <th>Employee Out Date</th>
               <th>Employee Out Time</th>
               <th>Attendance Status </th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(attendanceList, index) in attendanceLists.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="attendanceList.employee_name">{{ attendanceList.employee_name.fullName }}</td>
                  <td v-if="attendanceList.employeeInDate">{{ attendanceList.employeeInDate	}}</td>
                  <td v-else></td>
                  <td v-if="attendanceList.employeeInTime">{{ attendanceList.employeeInTime	}}</td>
                  <td v-else></td>
                  <td v-if="attendanceList.employeeOutDate">{{ attendanceList.employeeOutDate	}}</td>
                  <td v-else></td>
                  <td v-if="attendanceList.employeeOutTime">{{ attendanceList.employeeOutTime	}}</td>
                  <td v-else></td>
                  <td v-if="attendanceList.attendanceStatus">{{ attendanceList.attendanceStatus }}</td>
              </tr>
            </tbody>
          </table>
        </div>

       <span class="card_footer">
         <pagination :data="attendanceLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
     </div>

  </span>
</template>
<script>
import moment from 'moment'
    export default {
        data () {
            return {
                form: new Form({
                    employeEntryId: '',
                    employeeInTime : '',
                    employeeOutTime : '',
                }),
                employeeNames:{},
                attendanceLists:{},
                employeeInDate: {},
                currentDateMonth: {},
                momentFormat: {},

                attendance: false,
                notAttendance: true,
                employeeLeave: false,
                hideCheckbox: true,
                buttonShow: true,
                formShow: false,
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
            this.attendanceList();
            this.getPaginateList();

        },
        methods:{
            employeeNameList(){
               axios.get('/employeeAttendance/create').then(res =>{
                  this.employeeNames = res.data.employeeNames;
              })
            },
            employeeAttendanceEntry(){
                this.form.post('/employeeAttendance').then(res =>{

                    if (res.data.inTime) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Employee In Time Entry Successfully'
                        })
                        this.form.reset();
                        this.attendance = false
                        this.notAttendance = true
                    }
                    if (res.data.outTime) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Employee Out Time Entry Successfully'
                        })
                        this.form.reset();
                        this.attendance = false
                        this.notAttendance = true
                    }
                    if(res.data.error){
                        Toast.fire({
                            icon: 'error',
                            title: 'Select Employee Name and In Time Or Out Time'
                        })
                        this.form.reset();
                    }
                   this.attendanceList();
                })
            },
            employeEntryIdCatch(){
               axios.get('/employeeAttendance/'+this.form.employeEntryId).then(res =>{
                     if (res.data.employeeLeave) {
                         this.employeeLeave = true
                         this.hideCheckbox = false
                     }
                     else {
                           this.employeeLeave = false
                           this.hideCheckbox = true
                           this.attendance = false;
                           this.notAttendance = true;

                           if (res.data.attendanceTime) {
                                 this.attendance = true;
                                 this.notAttendance = false;
                                 this.employeeLeave = false
                                 this.hideCheckbox = true
                           }
                           if (res.data.inTimeAndOutTime) {
                                 this.attendance = true;
                                 this.notAttendance = true;
                                 this.employeeLeave = false
                                 this.hideCheckbox = true
                           }
                           if (res.data.noEntry) {
                                 this.attendance = false;
                                 this.notAttendance = true;
                                 this.employeeLeave = false
                                 this.hideCheckbox = true
                           }
                     }
                })
            },
            attendanceList(){
                axios.get('/employeeAttendance').then(res =>{
                      this.attendanceLists = res.data.attendanceLists;
                      this.employeeInDate = res.data.employeeInDate.employeeInDate;
                      this.currentDateMonth = new Date().toLocaleString();


                      this.momentFormat = moment(String(this.currentDateMonth)).format('DD-MM-YYYY');

                      console.log(this.employeeInDate);
                      console.log(this.momentFormat);

                      if (this.employeeInDate >= this.momentFormat) {
                          this.buttonShow = false;
                          this.formShow = true;
                      }
                      else{
                           this.buttonShow = true;
                           this.formShow = false;
                      }

                })
            },
            getPaginateList(page = 1) {
                axios.get('employeeAttendance?page=' + page).then(response => {
                     this.attendanceLists = response.data.attendanceLists;
                });
            },
            clickForAttendance(){
                axios.get('/clickForAttendanceLeave').then(res =>{
                     this.attendanceList();
                })
                axios.get('/clickForAttendanceAbsent').then(res =>{
                     this.attendanceList();
                })
            },
        },
    }

</script>

<style media="screen">
#employeeAttend input[type="checkbox"] {
      box-sizing: border-box;
      padding: 0;
      padding: 20px;
      width: 30px;
      height: 18px;
      padding-right: 20px;
  }
#employeeAttend .form-check-label  {
     margin-left: 38px;
     font-size: 15px;
  }
</style>
