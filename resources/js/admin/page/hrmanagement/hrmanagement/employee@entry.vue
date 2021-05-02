<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Information Entry</h3>
      </div>
      
       <div class="employee-entery p-3">
         <div class="card-header-part" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h6>Identification Information</h6>
           </div>
            <form  method="post" @submit.prevent="employeeInformationEntry()">
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
                   <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
                 </div>
              </div>
           </div>
        </form>
       </div>
      </div>
      <div class="card mt-3 py-3">
         <div class="card-body">
           <ul id="myTab" class="nav nav-tabs">
               <li class="nav-item"><a class="nav-link active" href="#Education" data-toggle="tab">Education Information</a></li>
               <li class="nav-item"><a class="nav-link" href="#Professional" data-toggle="tab">Professional Information</a></li>
               <li class="nav-item"><a class="nav-link" href="#Skill" data-toggle="tab">Skill Information</a></li>
               <li class="nav-item"><a class="nav-link" href="#Banking" data-toggle="tab">Banking Information</a></li>
           </ul>
           <div id="myTabContent" class="tab-content">
             <div class="tab-pane fade in active" id="Education">
               <div class="col-lg-7 col-md-7">
                 <div class="border active p-3">
                  <form  action="" method="post" @submit.prevent="educationEntry()">
                     <div class="form-row pt-2">
                       <div class="col-sm-4 col-12">
                         <label class="p-0 ">Employer Name</label>
                       </div>
                        <div class="col-sm-8 col-12">
                          <select class="form-control" v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }">
                            <option value="">Select One</option>
                            <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                          </select>
                          <has-error :form="form" field="employeEntryId"></has-error>
                        </div>
                     </div>
                     <div class="form-row pt-2">
                       <div class="col-sm-4 col-12">
                         <label class="p-0 ">Name Of Institute</label>
                       </div>
                       <div class="col-sm-8 col-12">
                         <select class="form-control" v-model="form.nameOfInstituteId" name="nameOfInstituteId" :class="{ 'is-invalid': form.errors.has('nameOfInstituteId') }">
                           <option value="">Select One</option>
                           <option  v-for="instituteList in instituteLists" :value="instituteList.nameOfInstituteId">{{ instituteList.nameOfInstitute }}</option>
                         </select>
                         <has-error :form="form" field="nameOfInstituteId"></has-error>
                       </div>
                     </div>
                     <div class="form-row pt-2">
                       <div class="col-sm-4 col-12">
                         <label class="p-0 ">Name Of Degree</label>
                       </div>
                         <div class="col-sm-8 col-12">
                           <select class="form-control" v-model="form.nameOfDegreeId" name="nameOfDegreeId" :class="{ 'is-invalid': form.errors.has('nameOfDegreeId') }">
                             <option value="">Select One</option>
                             <option  v-for="degreeList in degreeLists" :value="degreeList.nameOfDegreeId">{{ degreeList.nameOfDegree }}</option>
                           </select>
                           <has-error :form="form" field="nameOfDegreeId"></has-error>
                         </div>
                     </div>
                     <div class="form-row pt-2">
                       <div class="col-sm-4 col-12">
                          <label class="p-0 ">Grade</label>
                       </div>
                         <div class="col-sm-8 col-12">
                           <select class="form-control" v-model="form.gradeId" name="gradeId" :class="{ 'is-invalid': form.errors.has('gradeId') }">
                             <option value="">Select One</option>
                             <option  v-for="gradeList in gradeLists" :value="gradeList.gradeId">{{ gradeList.grade }}</option>
                           </select>
                           <has-error :form="form" field="gradeId"></has-error>
                         </div>
                     </div>
                     <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                       <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                    </div>
                  </form>
                 </div>
               </div>
             </div>

             <div class="tab-pane fade" id="Professional">
               <div class="col-lg-7 col-md-7">
                 <div class="border p-3">
                   <form  action="" method="post" @submit.prevent="professionalEntry()">
                       <div class="form-row pt-2">
                         <div class="col-sm-4 col-12">
                           <label class="p-0 ">Employer Name</label>
                         </div>
                          <div class="col-sm-8 col-12">
                            <select class="form-control" v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }">
                              <option value="">Select One</option>
                              <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                            </select>
                            <has-error :form="form" field="employeEntryId"></has-error>
                          </div>
                       </div>
                      <div class="form-row pt-2">
                        <div class="col-sm-4 col-12">
                          <label class="p-0">Organization Name</label>
                        </div>
                        <div class="col-sm-8 col-12">
                          <input type="text" class="form-control" v-model="form.organizationName" :class="{ 'is-invalid': form.errors.has('organizationName') }" name="organizationName" placeholder="Organization Name">
                          <has-error :form="form" field="organizationName"></has-error>
                        </div>
                      </div>
                      <div class="form-row pt-2">
                        <div class="col-sm-4 col-12">
                          <label class="p-0">Designation</label>
                        </div>
                        <div class="col-sm-8 col-12">
                           <input type="text" class="form-control" v-model="form.designation" :class="{ 'is-invalid': form.errors.has('designation') }" name="designation" placeholder="Designation">
                           <has-error :form="form" field="designation"></has-error>
                        </div>
                      </div>
                      <div class="form-row pt-2">
                        <div class="col-sm-4 col-12">
                           <label class="p-0 ">Year Of Exprience</label>
                        </div>
                        <div class="col-sm-8 col-12">
                           <input type="text" class="form-control" v-model="form.yearOfExprience" :class="{ 'is-invalid': form.errors.has('yearOfExprience') }" name="yearOfExprience" placeholder="Year Of Exprience">
                           <has-error :form="form" field="yearOfExprience"></has-error>
                        </div>
                      </div>
                      <div class="form-row pt-2">
                        <div class="col-sm-4 col-12">
                           <label class="p-0 ">Address</label>
                        </div>
                        <div class="col-sm-8 col-12">
                           <textarea class="form-control" v-model="form.address" name="address" :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Address" style="height:100px"></textarea>
                           <has-error :form="form" field="address"></has-error>
                        </div>
                      </div>
                      <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                        <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                     </div>
                    </form>
                  </div>
               </div>
             </div>

             <div class="tab-pane fade" id="Skill">
               <div class="col-lg-7 col-md-7">
                  <div class="border p-3">
                     <form  action="" method="post" @submit.prevent="skillEntry()">
                         <div class="form-row pt-2">
                           <div class="col-sm-4 col-12">
                             <label class="p-0 ">Employer Name</label>
                           </div>
                            <div class="col-sm-8 col-12">
                              <select class="form-control" v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }">
                                <option value="">Select One</option>
                                <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                              </select>
                              <has-error :form="form" field="employeEntryId"></has-error>
                            </div>
                         </div>
                         <div class="form-row pt-2">
                            <div class="col-sm-4 col-12">
                              <label class="p-0">Skill Type</label>
                            </div>
                            <div class="col-sm-8 col-12">
                              <input type="text" v-model="form.skillType" name="skillType" :class="{ 'is-invalid': form.errors.has('skillType') }" class="form-control" placeholder="Skill Type">
                              <has-error :form="form" field="skillType"></has-error>
                            </div>
                          </div>
                          <div class="form-row pt-2">
                            <div class="col-sm-4 col-12">
                              <label class="p-0">Name Of Institute</label>
                            </div>
                            <div class="col-sm-8 col-12">
                               <input type="text" v-model="form.nameOfInstitute" name="nameOfInstitute" :class="{ 'is-invalid': form.errors.has('nameOfInstitute') }" class="form-control"  placeholder="Name Of Institute">
                               <has-error :form="form" field="nameOfInstitute"></has-error>
                            </div>
                          </div>
                          <div class="form-row pt-2">
                            <div class="col-sm-4 col-12">
                              <label class="p-0">Duration Of Skill</label>
                            </div>
                            <div class="col-sm-8 col-12">
                               <input type="text" v-model="form.durationOfSkill" name="durationOfSkill" :class="{ 'is-invalid': form.errors.has('durationOfSkill') }" class="form-control" placeholder="Duration Of Skill">
                               <has-error :form="form" field="durationOfSkill"></has-error>
                            </div>
                          </div>
                          <div class="form-row pt-2">
                            <div class="col-sm-4 col-12">
                              <label class="p-0">Skill Grade</label>
                            </div>
                            <div class="col-sm-8 col-12">
                              <select class="form-control" v-model="form.skillGradeId" name="skillGradeId" :class="{ 'is-invalid': form.errors.has('skillGradeId') }">
                                <option value="">Select One</option>
                                <option v-for="skillGradeList in skillGradeLists" :value="skillGradeList.skillGradeId">{{ skillGradeList.skillGrade }}</option>
                              </select>
                              <has-error :form="form" field="skillGradeId"></has-error>
                            </div>
                          </div>
                          <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                            <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                         </div>
                     </form>
                   </div>
                 </div>
               </div>

             <div class="tab-pane fade" id="Banking">
               <div class="col-lg-7 col-md-7">
                  <div class="border p-3">
                    <form  action="" method="post" @submit.prevent="bankingEntry()">
                        <div class="form-row pt-2">
                          <div class="col-sm-4 col-12">
                            <label class="p-0 ">Employer Name</label>
                          </div>
                           <div class="col-sm-8 col-12">
                             <select class="form-control" v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }">
                               <option value="">Select One</option>
                               <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                             </select>
                             <has-error :form="form" field="employeEntryId"></has-error>
                           </div>
                        </div>
                        <div class="form-row pt-2">
                           <div class="col-sm-4 col-12">
                             <label class="p-0">Bank Type Name</label>
                           </div>
                           <div class="col-sm-8 col-12">
                             <select v-model="form.bankTypeId" name="bankTypeId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankTypeId') }" @change.prevent="bankTypeSelect()">
                                 <option value="">Select One</option>
                                 <option v-for="bankTypeList in bankTypeLists" :value="bankTypeList.bankTypeEntryId">{{ bankTypeList.bank_type_entry.bankTypeEntryName }}</option>
                             </select>
                             <has-error :form="form" field="bankTypeId"></has-error>
                           </div>
                         </div>
                         <div class="form-row pt-2">
                           <div class="col-sm-4 col-12">
                             <label class="p-0">Bank Name</label>
                           </div>
                           <div class="col-sm-8 col-12">
                             <select v-model="form.bankNameId" name="bankNameId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankNameId') }">
                                 <option value="">Select One</option>
                                 <option v-for="bankNameList in bankNameLists" :value="bankNameList.bankEntryId"> {{ bankNameList.bankName }}</option>
                             </select>
                             <has-error :form="form" field="bankNameId"></has-error>
                           </div>
                         </div>
                         <div class="form-row pt-2">
                           <div class="col-sm-4 col-12">
                             <label class="p-0">A/C Name</label>
                           </div>
                           <div class="col-sm-8 col-12">
                              <input type="text" v-model="form.accountName" :class="{ 'is-invalid': form.errors.has('accountName') }" name="accountName" class="form-control" placeholder="A/C Name">
                              <has-error :form="form" field="accountName"></has-error>
                           </div>
                         </div>
                         <div class="form-row pt-2">
                           <div class="col-sm-4 col-12">
                              <label class="p-0">A/C Number</label>
                           </div>
                           <div class="col-sm-8 col-12">
                              <input type="text" v-model="form.accountNumber" :class="{ 'is-invalid': form.errors.has('accountNumber') }" name="accountNumber" class="form-control" placeholder="Account Number">
                              <has-error :form="form" field="accountNumber"></has-error>
                           </div>
                         </div>
                         <div class="text-sm-right pr-sm-4 pr-md-5 pr-lg-4 text-right">
                           <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                        </div>
                    </form>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>

      <div class="card main-card  element-block-example mt-5">
          <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
            <h3 style="color:black">Employee List</h3>
          </div>
          <div class="table-responsive bg-white ">
            <table class="table table-hover table-bordered table-striped">
              <thead>
                 <tr>
                   <th>SN</th>
                   <th>Employee Type</th>
                   <th>Job Department</th>
                   <th>User Name</th>
                   <th>Password</th>
                   <th>Full_Name</th>
                   <th>Father_Name</th>
                   <th>Mother_Name</th>
                   <th>Date_Of_Birth</th>
                   <th>Phone Number</th>
                   <th>Religion</th>
                   <th>Sex</th>
                   <th>Marital Status</th>
                   <th>Nid Number</th>
                   <th>Nationality</th>
                   <th>Present Address</th>
                   <th>Permanent Address</th>
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
                    <td>{{ employeeList.nidNumber	 }}</td>
                    <td>{{ employeeList.nationality	 }}</td>
                    <td>{{ employeeList.presentAddress	 }}</td>
                    <td>{{ employeeList.permanentAddress	 }}</td>
                    <td>
                        <div class="btn-group">
                          <router-link :to="`/employee@details${employeeList.shopEmployeeEntryId}`" class="btn btn-hover-shine  btn-info"><i class=" fa fa-eye"></i>View</router-link>
                          <router-link :to="`/employee@edit${employeeList.shopEmployeeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                        </div>
                    </td>
                  </tr>
                </tbody>
             </table>
           </div>
           <span class="card_footer">
             <pagination :data="employeeLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
                  // Education Entry
                  employeEntryId: '',
                  nameOfInstituteId: '',
                  nameOfDegreeId: '',
                  gradeId: '',
                  // Professional Entry
                  employeEntryId: '',
                  organizationName: '',
                  designation: '',
                  yearOfExprience: '',
                  address: '',
                  // Skill Entry
                  skillType: '',
                  nameOfInstitute: '',
                  durationOfSkill: '',
                  skillGradeId: '',
                  // Banking Entry
                  bankTypeId: '',
                  bankNameId: '',
                  accountName: '',
                  accountNumber: '',
              }),
              employeeLists:{},
              bankTypeLists:{},
              bankNameLists:{},
              employeeTypeLists:{},
              jobDepartmentLists:{},
              employeeNames:{},
              instituteLists:{},
              degreeLists:{},
              gradeLists:{},
              skillGradeLists:{},
          }
      },
      props:{
          limit: {
              type: Number,
              default: 2
          }
      },
      mounted() {
          this.employeeList();
          this.getPaginateList();
          this.employeeTypeList();
          this.employeeNameList();
          this.educationInformation();
          this.showBankType();
      },
      methods:{
        employeeInformationEntry(){
            this.form.post('/shopEmployeeEntry').then(res =>{
              Toast.fire({
                  icon: 'success',
                  title: 'Shop Employee Entry Successfully'
              })
                this.form.reset();
                this.employeeList();
                this.employeeNameList();
            })
         },
         employeeList(){
             axios.get('/shopEmployeeEntry').then(res =>{
                this.employeeLists = res.data.employeeList
                //this.employeeList();
                this.employeeNameList();
            })
         },
         getPaginateList(page = 1) {
             axios.get('/shopEmployeeEntry?page=' + page).then(response => {
                 this.employeeLists = response.data.employeeList;
             });
         },
         showBankType() {
           axios.get('/bankTypeLists').then(res => {
             this.bankTypeLists = res.data.bankTypeList
           })
         },
         bankTypeSelect() {
           axios.get('/bankNameLists/'+this.form.bankTypeId).then(res => {
             this.bankNameLists = res.data.bankNameList
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
         employeeNameList(){
           axios.get('/employeeNameList').then(res =>{
              this.employeeNames = res.data.employeeName;
           })
         },
         educationInformation(){
            axios.get('/educationInformation').then(res =>{
              this.instituteLists = res.data.instituteList
              this.degreeLists = res.data.degreeList
              this.gradeLists = res.data.gradeList
              this.skillGradeLists = res.data.skillGradeList
           })
         },
         educationEntry(){
            this.form.post('/educationEntry').then(res => {
                  if (res.data.employeeAlreadyEntry) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Already Employee Education Information Entry'
                    })
                  }
                  else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Education Entry Successfully'
                    })
                    this.form.reset();
                  }
            });
          },
         professionalEntry(){
            this.form.post('/professionalEntry').then(res => {
                  if (res.data.employeeAlreadyEntry) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Already Employee Professional Information Entry'
                    })
                  }
                  else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Education Entry Successfully'
                    })
                    this.form.reset();
                  }
            });
          },
         skillEntry(){
            this.form.post('/skillEntry').then(res => {
                  if (res.data.employeeAlreadyEntry) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Already Employee Professional Information Entry'
                    })
                  }
                  else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Education Entry Successfully'
                    })
                    this.form.reset();
                  }
            });
          },
         bankingEntry(){
            this.form.post('/bankingEntry').then(res => {
                  if (res.data.employeeAlreadyEntry) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Already Employee Banking Information Entry'
                    })
                  }
                  else{
                    Toast.fire({
                        icon: 'success',
                        title: 'Education Entry Successfully'
                    })
                    this.form.reset();
                  }
            });
          },
       }
    }
</script>

<style media="screen">
  .nav-tabs a{
    color: #495057;
  }
  button.btn-pill.btn-hover-shine.btn.btn-primary {
    font-size: 13px;
  }
  a.btn.btn-hover-shine.btn-primary{
    margin-bottom: 0px;
  }
</style>
