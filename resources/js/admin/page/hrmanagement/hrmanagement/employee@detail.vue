<template id="">
 <span>
   <nav aria-label="breadcrumb">
     <ol class="breadcrumb">
       <li class="breadcrumb-item"><router-link to="/employee@entry">Employee Information</router-link></li>
     </ol>
   </nav>
     <div class="card main-card  element-block-example mt-5">
       <div class="card-header text-center"  style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
         <h3 style="color:black">Name : {{ singleEmployeeInfo.fullName	}} </h3>
       </div>
         <div class="row m-0">
           <div class="employeeDetail  bg-white col-sm-6">
             <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h4 style="color:black">Identification Information</h4>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Employee Type</th>
               </div>
               <div class="col-md-6 col-12">
                 <th v-if="singleEmployeeInfo.shop_employee_types">{{ singleEmployeeInfo.shop_employee_types.shopEmployeeTypeName }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Job Department</th>
               </div>
               <div class="col-md-6 col-12">
                 <th v-if="singleEmployeeInfo.job_departments">{{ singleEmployeeInfo.job_departments.jobDepartmentName }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>User Name</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.userName }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Password</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.password }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Full Name</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.fullName	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Father Name</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.fatherName	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Mother Name</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.motherName	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Date Of Birth</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.dateOfBirth	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Phone Number</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.phoneNumber }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Religion</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.phoneNumber }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Sex</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>
                   <span v-if="singleEmployeeInfo.religion == 1">
                     Islam
                   </span>
                   <span v-if="singleEmployeeInfo.religion == 2">
                     Hindu
                   </span>
                   <span v-if="singleEmployeeInfo.religion == 3">
                     Ohter
                   </span>
                 </th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Marital Status</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>
                   <span v-if="singleEmployeeInfo.maritalStatus == 1">
                     Single
                   </span>
                   <span v-if="singleEmployeeInfo.maritalStatus == 2">
                     Married
                   </span>
                 </th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>NID Number</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.nidNumber	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Nationality</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.nationality	 }}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Present Address</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.presentAddress	}}</th>
               </div>
             </div>
             <div class="form-row">
               <div class="col-md-6 col-12">
                 <th>Permanent Address</th>
               </div>
               <div class="col-md-6 col-12">
                 <th>{{ singleEmployeeInfo.permanentAddress }}</th>
               </div>
             </div>
           </div>

           <div class="employeeDetail bg-white col-sm-6">
             <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h4 style="color:black">Education Information</h4>
             </div>
             <span v-for="singleEmployeeEducation in singleEmployeeEducations">
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Name Of Institute</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeEducation !== null && singleEmployeeEducation.name_of_institute">{{ singleEmployeeEducation.name_of_institute.nameOfInstitute	}}</th>
                 </div>
               </div>
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Name Of Degree</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeEducation !== null && singleEmployeeEducation.name_of_degree">{{ singleEmployeeEducation.name_of_degree.nameOfDegree	}}</th>
                 </div>
               </div>
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Grade</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeEducation !== null && singleEmployeeEducation.grade">{{ singleEmployeeEducation.grade.grade	}}</th>
                 </div>
               </div>
             </span>
           </div>

           <div class="employeeDetail bg-white col-sm-6">
             <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
               <h4 style="color:black">Professional Information</h4>
             </div>
             <span v-for="singleEmployeeProfessional in singleEmployeeProfessionals">
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Organization Name</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeProfessional !== null ">{{ singleEmployeeProfessional.organizationName	}}</th>
                 </div>
               </div>
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Professional Designation</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if=" singleEmployeeProfessional !== null ">{{ singleEmployeeProfessional.designation	}}</th>
                 </div>
               </div>
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Professional Year Of Exprience</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeProfessional !== null ">{{ singleEmployeeProfessional.yearOfExprience	}}</th>
                 </div>
               </div>
               <div class="form-row">
                 <div class="col-md-6 col-12">
                   <th>Professional Address</th>
                 </div>
                 <div class="col-md-6 col-12">
                   <th v-if="singleEmployeeProfessional !== null ">{{ singleEmployeeProfessional.address	}}</th>
                 </div>
               </div>
             </span>
           </div>

             <div class="employeeDetail bg-white col-sm-6">
               <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                 <h4 style="color:black">Skill Information</h4>
               </div>
               <span v-for="singleEmployeeSkill in singleEmployeeSkills">
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Skill Type</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeSkill !== null ">{{ singleEmployeeSkill.skillType	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Name Of Institute</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeSkill !== null ">{{ singleEmployeeSkill.nameOfInstitute	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Duration Of Skill</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeSkill !== null ">{{ singleEmployeeSkill.durationOfSkill	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Skill Grade</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeSkill !== null && singleEmployeeSkill.skill_grade">{{ singleEmployeeSkill.skill_grade.skillGrade	}}</th>
                   </div>
                 </div>
               </span>
             </div>

             <div class="employeeDetail bg-white col-sm-6">
               <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
                 <h4 style="color:black">Banking Information</h4>
               </div>
               <span v-for="singleEmployeeBanking in singleEmployeeBankings">
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Bank Type</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeBanking !== null && singleEmployeeBanking.bank_type_entry">{{ singleEmployeeBanking.bank_type_entry.bankTypeEntryName	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Bank Name</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeBanking !== null && singleEmployeeBanking.bank_entry">{{ singleEmployeeBanking.bank_entry.bankName	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Account Name</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeBanking !== null ">{{ singleEmployeeBanking.accountName	}}</th>
                   </div>
                 </div>
                 <div class="form-row">
                   <div class="col-md-6 col-12">
                     <th>Account Number</th>
                   </div>
                   <div class="col-md-6 col-12">
                     <th v-if="singleEmployeeBanking !== null ">{{ singleEmployeeBanking.accountNumber }}</th>
                   </div>
                 </div>
               </span>
             </div>
          </div>
      </div>
   </span>
</template>

<script>
export default {
    data(){
        return{
            singleEmployeeInfo: {},
            singleEmployeeEducations: {},
            singleEmployeeProfessionals: {},
            singleEmployeeSkills: {},
            singleEmployeeBankings: {},
        }
    },

    mounted(){
       this.employeeInfo();
    },
    methods:{
        employeeInfo() {
          axios.get('/employeeReportView/'+this.$route.params.employeeId).then(res => {
               this.singleEmployeeInfo = res.data.singleEmployeeInfo
               this.singleEmployeeEducations = res.data.singleEmployeeEducation
               this.singleEmployeeProfessionals = res.data.singleEmployeeProfessional
               this.singleEmployeeSkills = res.data.singleEmployeeSkill
               this.singleEmployeeBankings = res.data.singleEmployeeBanking

          })
        },
    }
 }
</script>
<style media="screen">
  .employeeDetail{
      margin: 20px 0px;
  }
  .employeeDetail .form-row{
    margin:0px
  }
  .employeeDetail .col-md-6.col-12 {
      padding: 10px;
      border: 1px solid #ddd;
  }
  .employeeDetail .col-md-6.col-12 {
     padding: 10px;
     border: 1px solid #ddd;
  }
</style>
