<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Employee Information</h3>
      </div>
       <div class="employee-entery p-3">
         <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h6>Identification Information</h6>
           </div>
            <form  method="post" @submit.prevent="employeeInformationUpdate()">
              <div class="row m-0 border">
                <div class="col-lg-6  col-md-6  p-3">
                   <div class="table-responsive-custom bg-white">
                     <table class="table-hover col-lg-12  col-md-12 mb-0">
                       <tr>
                          <td class="title-name">Employee Type</td>
                          <td>
                             <div>
                               <select class="form-control" v-model="form.employeeTypeId" :class="{ 'is-invalid': form.errors.has('employeeTypeId') }" name="employeeTypeId" @change.prprevent="employeeTypeSelect()">
                                  <option value="">Select One</option>
                                  <option  v-for="employeeTypeList in employeeTypeLists" :value="employeeTypeList.employeeTypeId">{{ employeeTypeList.employee_type_name.shopEmployeeTypeName }}</option>
                               </select>
                              <has-error :form="form" field="employeeTypeId"></has-error>
                             </div>
                          </td>
                       </tr>
                       <tr>
                          <td class="title-name">Job Department</td>
                          <td>
                             <div>
                               <select class="form-control" v-model="form.jobDepartmentId" :class="{ 'is-invalid': form.errors.has('jobDepartmentId') }" name="jobDepartmentId">
                                  <option value="">Select One</option>
                                  <option  v-for="jobDepartmentList in jobDepartmentLists" :value="jobDepartmentList.jobDepartmentEntryId">{{ jobDepartmentList.jobDepartmentName }}</option>
                               </select>
                              <has-error :form="form" field="jobDepartmentId"></has-error>
                             </div>
                          </td>
                       </tr>
                       <tr>
                        <td class="title-name">User Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.userName" name="userName" :class="{ 'is-invalid': form.errors.has('userName') }" class="form-control" placeholder="User Name">
                            <has-error :form="form" field="userName"></has-error>
                          </div>
                         </td>
                       </tr>
                       <tr>
                        <td class="title-name">Password</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.password" name="password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" placeholder="password">
                            <has-error :form="form" field="password"></has-error>
                          </div>
                         </td>
                       </tr>
                       <tr>
                        <td class="title-name">Full Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.fullName" name="fullName" :class="{ 'is-invalid': form.errors.has('fullName') }" class="form-control" placeholder="Full Name">
                            <has-error :form="form" field="fullName"></has-error>
                          </div>
                         </td>
                       </tr>
                      <tr>
                        <td class="title-name">Father Name</td>
                        <td>
                            <div>
                              <input type="text" v-model="form.fatherName" name="fatherName" :class="{ 'is-invalid': form.errors.has('fatherName') }" class="form-control" placeholder="Father Name">
                              <has-error :form="form" field="fatherName"></has-error>
                            </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Mother Name</td>
                        <td>
                          <div>
                            <input type="text" v-model="form.motherName" name="motherName" :class="{ 'is-invalid': form.errors.has('motherName') }" class="form-control" placeholder="Mother Name">
                            <has-error :form="form" field="motherName"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Date of Birth</td>
                        <td>
                          <div>
                             <input type="date" v-model="form.dateOfBirth" name="dateOfBirth" :class="{ 'is-invalid': form.errors.has('dateOfBirth') }" class="form-control"  placeholder="Date of Birth">
                             <has-error :form="form" field="dateOfBirth"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Phone Number</td>
                        <td>
                          <div>
                             <input type="text" v-model="form.phoneNumber" name="phoneNumber" :class="{ 'is-invalid': form.errors.has('phoneNumber') }" class="form-control"  placeholder="Phone Number">
                             <has-error :form="form" field="phoneNumber"></has-error>
                          </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Religion</td>
                        <td>
                            <div>
                              <select class="form-control" v-model="form.religion" :class="{ 'is-invalid': form.errors.has('religion') }" name="religion">
                                <option value="">Select One</option>
                                <option value="1">Islam</option>
                                <option value="2">Hindu</option>
                                <option value="3">Ohter</option>
                              </select>
                              <has-error :form="form" field="religion"></has-error>
                            </div>
                         </td>
                      </tr>
                    </table>
                  </div>
               </div>

                <div class="col-lg-6 col-md-6 p-3">
                  <div class="table-responsive  bg-white">
                    <table class="table-hover col-lg-12  col-md-12 mb-0">
                      <tr>
                        <td class="title-name">Sex</td>
                        <td>
                          <div>
                            <select class="form-control" v-model="form.sex" :class="{ 'is-invalid': form.errors.has('sex') }" name="sex">
                              <option value="">Select One</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                            </select>
                            <has-error :form="form" field="sex"></has-error>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="title-name">Marital Status</td>
                        <td>
                          <div>
                            <select class="form-control" v-model="form.maritalStatus" :class="{ 'is-invalid': form.errors.has('maritalStatus') }" name="maritalStatus">
                              <option value="">Select One</option>
                              <option value="1">Single</option>
                              <option value="2">Married</option>
                            </select>
                            <has-error :form="form" field="maritalStatus"></has-error>
                          </div>
                        </td>
                      </tr>
                      <tr>
                         <td class="title-name">NID Number</td>
                         <td>
                           <div>
                             <input type="text" v-model="form.nidNumber" name="nidNumber" :class="{ 'is-invalid': form.errors.has('nidNumber') }" class="form-control" placeholder="NID Number">
                             <has-error :form="form" field="maritalStatus"></has-error>
                           </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Nationality</td>
                         <td>
                           <div>
                              <input type="text" v-model="form.nationality" name="nationality" :class="{ 'is-invalid': form.errors.has('nationality') }" class="form-control" placeholder="Nationality">
                              <has-error :form="form" field="maritalStatus"></has-error>
                           </div>
                         </td>
                      </tr>
                      <tr>
                        <td class="title-name">Present Address</td>
                        <td >
                            <div>
                              <textarea v-model="form.presentAddress" name="presentAddress" :class="{ 'is-invalid': form.errors.has('presentAddress') }" class="form-control" placeholder="Present Address"  style="height:120px;margin-top:2px"></textarea>
                              <has-error :form="form" field="presentAddress"></has-error>
                            </div>
                         </td>
                      </tr>
                      <tr>
                          <td class="title-name">Permanent Address</td>
                          <td >
                          <div>
                            <textarea v-model="form.permanentAddress" name="permanentAddress" :class="{ 'is-invalid': form.errors.has('permanentAddress') }"  class="form-control" placeholder="Permanent Address" style="height:120px;margin-top:5px"></textarea>
                            <has-error :form="form" field="permanentAddress"></has-error>
                          </div>
                       </td>
                    </tr>
                   </table>
                 </div>
                 <div class="text-right pt-3">
                   <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
                 </div>
              </div>
           </div>
        </form>
       </div>
      </div>
  </span>
</template>
<script>
    export default {
      data () {
          return {
              form: new Form({
                  employeeTypeId : '',
                  jobDepartmentId : '',
                  userName : '',
                  password : '',
                  fullName : '',
                  fatherName: '',
                  motherName: '',
                  dateOfBirth: '',
                  phoneNumber: '',
                  religion: '',
                  sex: '',
                  maritalStatus: '',
                  nidNumber: '',
                  nationality: '',
                  presentAddress: '',
                  permanentAddress: '',
              }),
              employeeTypeLists: {},
              employeeTypeLists:{},
              jobDepartmentLists:{},

          }
      },
      mounted() {
          this.employeeTypeList();
          this.employeeSingleInformation();
      },
      methods:{
        employeeInformationUpdate(){
            this.form.put('/shopEmployeeEntry/'+this.$route.params.employeeId).then(res =>{
                  if (res.data.userName) {
                      Toast.fire({
                          icon: 'error',
                          title: 'Please Change Employee User Name'
                      })
                  }
                  else {
                      Toast.fire({
                          icon: 'success',
                          title: 'Shop Employee Information Update Successfully'
                      })
                      this.$router.push('/employee@entry')
                  }


                  console.log(res.data);
            })
         },
         employeeSingleInformation(){
            axios.get('/shopEmployeeEntry/'+this.$route.params.employeeId+'/edit').then(res =>{
                 this.form.fill(res.data.singleShopEmployeeInfo);
                 this.jobDepartmentLists = res.data.jobDepartmentList;
           })
         },
         employeeTypeList(){
            axios.get('/shopEmployeeEntry/create').then(res =>{
              this.employeeTypeLists = res.data.employeeTypeList;
           })
         },
         employeeTypeSelect(){
           axios.get('/shopEmployeeEntry/'+this.form.employeeTypeId).then(res =>{
               this.jobDepartmentLists = res.data.jobDepartmentList;
           })
         },
       }
    }
</script>
