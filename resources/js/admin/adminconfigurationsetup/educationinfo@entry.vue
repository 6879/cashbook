<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Education Information Entry</h3>
      </div>
      <div class="row p-5">
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="border active p-3">
             <form  @submit.prevent="addInformation()">
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0">Name Of Institute</label>
                  </div>
                  <div class="col-sm-8 col-12">
                    <input type="text" v-model="form.nameOfInstitute" name="nameOfInstitute" class="form-control" placeholder="Name Of Institute">
                  </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Status</label>
                  </div>
                    <div class="col-sm-8 col-12">
                      <select class="form-control" v-model="form.instituteStatus" name="instituteStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                </div>
                <div class="text-right pt-3">
                  <button type="submit" class="btn-pill btn-hover-shine btn btn-primary" >Submit</button>
               </div>
             </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="border active p-3">
             <form   @submit.prevent="addInformation()">
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Name Of Degree</label>
                  </div>
                  <div class="col-sm-8 col-12">
                    <input type="text" v-model="form.nameOfDegree" name="nameOfDegree" class="form-control" placeholder="Name Of Degree">
                  </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Status</label>
                  </div>
                    <div class="col-sm-8 col-12">
                      <select class="form-control" v-model="form.degreeStatus" name="degreeStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                </div>
                <div class="text-right pt-3">
                  <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
               </div>
             </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="border active p-3">
             <form   @submit.prevent="addInformation()">
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Grade</label>
                  </div>
                  <div class="col-sm-8 col-12">
                    <input type="text" v-model="form.grade" name="grade" class="form-control" placeholder="Grade">
                  </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Status</label>
                  </div>
                    <div class="col-sm-8 col-12">
                      <select class="form-control" v-model="form.gradeStatus" name="gradeStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                </div>
                <div class="text-right pt-3">
                  <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
               </div>
             </form>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="border active p-3">
             <form  @submit.prevent="addInformation()">
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Skill Grade</label>
                  </div>
                  <div class="col-sm-8 col-12">
                    <input type="text" v-model="form.skillGrade" name="skillGrade" class="form-control" placeholder="Skill Grade">
                  </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Status</label>
                  </div>
                    <div class="col-sm-8 col-12">
                      <select class="form-control" v-model="form.skillGradeStatus" name="skillGradeStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                </div>
                <div class="text-right pt-3">
                  <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
               </div>
             </form>
            </div>
          </div>
        </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
       <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Education Information  List</h3>
        </div>

        <div class="row m-0">
          <div class="table-responsive bg-white col-lg-6 col-md-6 my-3">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Name Of Institute</th>
                   <th>Institute Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                    <tr v-for="(instituteList, index) in instituteLists.data">
                      <td>{{ index+1 }}</td>
                      <td>{{ instituteList.nameOfInstitute	}}</td>
                      <td>
                          <div v-if="instituteList.instituteStatus == 1">
                            <button type="button"  @click="instituteChangeStatus(instituteList.nameOfInstituteId)" class="btn btn-hover-shine btn-success">Published</button>
                          </div>
                          <div v-else>
                            <button type="button"  @click="instituteChangeStatus(instituteList.nameOfInstituteId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                          </div>
                      </td>
                      <td>
                          <router-link :to="`/nameofinstitute@edit${instituteList.nameOfInstituteId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                          <button type="button" @click="instituteDistroy(instituteList.nameOfInstituteId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                       </td>
                    </tr>
                </tbody>
             </table>
           </div>

           <div class="table-responsive bg-white col-lg-6 col-md-6 my-3">
             <table class="table table-hover table-bordered mb-0">
               <thead>
                  <tr style="background:rgba(242, 242, 242, 0.47)">
                    <th>SN</th>
                    <th>Name Of Degree</th>
                    <th>Degree Status</th>
                    <th>Action</th>
                  </tr>
                 </thead>
                 <tbody>
                     <tr v-for="(degreeList, index) in degreeLists.data">
                       <td>{{ index+1 }}</td>
                       <td>{{ degreeList.nameOfDegree	 }}</td>
                       <td>
                           <div v-if="degreeList.degreeStatus == 1">
                             <button type="button"  @click="degreeChangeStatus(degreeList.nameOfDegreeId)" class="btn btn-hover-shine btn-success">Published</button>
                           </div>
                           <div v-else>
                             <button type="button"  @click="degreeChangeStatus(degreeList.nameOfDegreeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                           </div>
                       </td>
                       <td>
                           <router-link :to="`/nameofdegree@edit${degreeList.nameOfDegreeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                           <button type="button" @click="degreeDistroy(degreeList.nameOfDegreeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                        </td>
                     </tr>
                 </tbody>
              </table>
            </div>

            <div class="table-responsive bg-white col-lg-6 col-md-6">
              <table class="table table-hover table-bordered mb-0">
                <thead>
                   <tr style="background:rgba(242, 242, 242, 0.47)">
                     <th>SN</th>
                     <th>Grade</th>
                     <th>Grade Status</th>
                     <th>Action</th>
                   </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(gradeList, index) in gradeLists.data">
                        <td>{{ index+1 }}</td>
                        <td>{{ gradeList.grade	 }}</td>
                        <td>
                            <div v-if="gradeList.gradeStatus == 1">
                              <button type="button"  @click="gradeChangeStatus(gradeList.gradeId)" class="btn btn-hover-shine btn-success">Published</button>
                            </div>
                            <div v-else>
                              <button type="button"  @click="gradeChangeStatus(gradeList.gradeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                            </div>
                        </td>
                        <td>
                            <router-link :to="`/grade@edit${gradeList.gradeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                            <button type="button" @click="gradeDistroy(gradeList.gradeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                         </td>
                      </tr>
                  </tbody>
               </table>
             </div>


             <div class="table-responsive bg-white col-lg-6 col-md-6">
               <table class="table table-hover table-bordered mb-0">
                 <thead>
                    <tr style="background:rgba(242, 242, 242, 0.47)">
                      <th>SN</th>
                      <th>Skill Grade</th>
                      <th>Skill Grade Status</th>
                      <th>Action</th>
                    </tr>
                   </thead>
                   <tbody>
                       <tr v-for="(skillGradeList, index) in skillGradeLists.data">
                         <td>{{ index+1 }}</td>
                         <td>{{ skillGradeList.skillGrade	 }}</td>
                         <td>
                             <div v-if="skillGradeList.skillGradeStatus == 1">
                               <button type="button"  @click="skillGradeChangeStatus(skillGradeList.skillGradeId)" class="btn btn-hover-shine btn-success">Published</button>
                             </div>
                             <div v-else>
                               <button type="button"  @click="skillGradeChangeStatus(skillGradeList.skillGradeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                             </div>
                         </td>
                         <td>
                             <router-link :to="`/skillGrade@edit${skillGradeList.skillGradeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                             <button type="button" @click="skillGradeDistroy(skillGradeList.skillGradeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                          </td>
                       </tr>
                   </tbody>
                </table>
              </div>
              <span class="card_footer">
                <pagination :data="skillGradeLists" :limit="limit"  @pagination-change-page="getPaginateList">
                  <span slot="prev-nav">&lt; Previous</span>
                  <span slot="next-nav">Next &gt;</span>
                </pagination>
              </span>

           </div>
      </div>

   </span>
</template>
<script>
    export default {
        data () {
            return {
                form: new Form({
                    nameOfInstitute: '',
                    instituteStatus: '',

                    nameOfDegree: '',
                    degreeStatus: '',

                    grade: '',
                    gradeStatus: '',

                    skillGrade: '',
                    skillGradeStatus: '',
                }),
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
        mounted(){
          this.educationList();
          this.getPaginateList();
        },
        methods:{
          addInformation(){
            this.form.post('/adminEducationEntry').then(res =>{
                if (res.data.changeNameInstitute){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Name Of Institute'
                    })
                }
                else if (res.data.changeNameDegree) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Name Of Degree'
                    })
                }
                else if (res.data.changeGrade) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Grade'
                    })
                }
                else if (res.data.changeSkillGrade) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Skill Grade'
                    })
                }
                else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Information Entry Successfully'
                    })
                    this.form.reset();
                }
                this.educationList();
            })
          },
          educationList(){
            axios.get('/adminEducationEntry').then(res =>{
                this.instituteLists = res.data.instituteList
                this.degreeLists = res.data.degreeList
                this.gradeLists = res.data.gradeList
                this.skillGradeLists = res.data.skillGradeList
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminEducationEntry?page=' + page)
            .then(response => {
                this.instituteLists = response.data.instituteList
                this.degreeLists = response.data.degreeList
                this.gradeLists = response.data.gradeList
                this.skillGradeLists = response.data.skillGradeList
            });
          },
         instituteChangeStatus(nameOfInstituteId){
           axios.get('/adminEducationEntry/'+nameOfInstituteId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Name Of Institute Status Change Successfully'
               })
               this.educationList();
           })
         },
         degreeChangeStatus(nameOfDegreeId){
           axios.get('/degreeChangeStatus/'+nameOfDegreeId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Name Of Degree Status Change Successfully'
               })
               this.educationList();
           })
         },
         gradeChangeStatus(gradeId){
           axios.get('/gradeChangeStatus/'+gradeId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Grade Status Change Successfully'
               })
               this.educationList();
           })
         },
         skillGradeChangeStatus(skillGradeId){
           axios.get('/skillGradeChangeStatus/'+skillGradeId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Skill Grade Status Change Successfully'
               })
               this.educationList();
           })
         },
        instituteDistroy(nameOfInstituteId){
          axios.delete('/adminEducationEntry/'+nameOfInstituteId).then(res =>{
              Toast.fire({
                icon: 'success',
                title: 'Name Of Institute Delete Successfully'
              })
              this.educationList();
          })
        },
        degreeDistroy(nameOfDegreeId){
          axios.get('/degreeDistroy/'+nameOfDegreeId).then(res =>{
              Toast.fire({
                icon: 'success',
                title: 'Skill Grade Status Change Successfully'
              })
              this.educationList();
          })
        },
        gradeDistroy(gradeId){
          axios.get('/gradeDistroy/'+gradeId).then(res =>{
              Toast.fire({
                icon: 'success',
                title: 'Skill Grade Status Change Successfully'
              })
              this.educationList();
          })
        },
        skillGradeDistroy(skillGradeId){
          axios.get('/skillGradeDistroy/'+skillGradeId).then(res =>{
              Toast.fire({
                icon: 'success',
                title: 'Skill Grade Status Change Successfully'
              })
              this.educationList();
          })
        },
     }
  }

</script>
