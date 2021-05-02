<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Job Department Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="jobDepartmentCreate()">
              <div class="form-group">
                  <label>Employee Type</label>
                  <select class="form-control" v-model="form.employeeTypeId" :class="{ 'is-invalid': form.errors.has('employeeTypeId') }" name="employeeTypeId">
                     <option value="">Select One</option>
                     <option  v-for="employeeTypeList in employeeTypeLists" :value="employeeTypeList.shopEmployeeTypeId">{{ employeeTypeList.shopEmployeeTypeName }}</option>
                  </select>
                  <has-error :form="form" field="employeeTypeId"></has-error>
              </div>
              <div class="form-group">
                  <label>Job Department Name</label>
                  <input type="text" v-model="form.jobDepartmentName"  name="jobDepartmentName" :class="{ 'is-invalid': form.errors.has('jobDepartmentName') }" placeholder="Job Department Name" class="form-control">
                  <has-error :form="form" field="jobDepartmentName"></has-error>
              </div>
              <div class="form-group">
                 <label>Job Department Status</label>
                 <select v-model="form.jobDepartmentStatus" name="jobDepartmentStatus" :class="{ 'is-invalid': form.errors.has('jobDepartmentStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="jobDepartmentStatus"></has-error>
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
        <h3 style="color:black">Job Department List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Employee Type Name</th>
               <th>Job Department Name</th>
               <th>Job Department Status</th>
               <th v-if="role.role == 1 || role.role == 2" >Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(showData, index) in showDatas.data">
                <td>{{ index+1 }}</td>
                <td>{{ showData.employee_type_name.shopEmployeeTypeName	 }}</td>
                <td>{{ showData.jobDepartmentName	 }}</td>
                <td>
                    <div v-if="showData.jobDepartmentStatus == 1">
                      <button type="button"  @click="changeStatus(showData.jobDepartmentEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(showData.jobDepartmentEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td v-if="role.role == 1 || role.role == 2">
                  <router-link :to="`/jobdepartment@entryEdit${showData.jobDepartmentEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button  @click="distroy(showData.jobDepartmentEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
               </td>
              </tr>
            </tbody>
         </table>
       </div>

       <span class="card_footer">
         <pagination :data="showDatas" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    employeeTypeId: '',
                    jobDepartmentName : '',
                    jobDepartmentStatus: '',
                }),
                showDatas:{},
                employeeTypeLists:{},
                role:{},
            }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.jobDepartmentShow();
            this.employeeTypeList();
            this.conditon();
        },
        methods:{
            employeeTypeList(){
               axios.get('/jobDepartmentEntry/create').then(res =>{
                 this.employeeTypeLists = res.data.employeeTypeList;
              })
            },
            jobDepartmentCreate(){
                this.form.post('/jobDepartmentEntry').then(res =>{
                    if (res.data.changeJobDepartmentName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Job Department Name'
                        })
                    }
                    else {
                        this.form.reset();
                        Toast.fire({
                            icon: 'success',
                            title: 'Job Department Save Successfully'
                        })
                        this.jobDepartmentShow();
                    }

                })
            },
            jobDepartmentShow(){
                axios.get('/jobDepartmentEntry').then(res =>{
                    this.showDatas = res.data.show
              })
            },
            getPaginateList(page = 1) {
                axios.get('jobDepartmentEntry?page=' + page).then(response => {
                    this.ShowData = response.data.show;
              });
            },
            changeStatus(jobDepartmentEntryId){
                axios.get('/jobDepartmentEntry/'+jobDepartmentEntryId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Job Department Status Change Successfully'
                    })
                    this.jobDepartmentShow();
                })
            },
            distroy(jobDepartmentEntryId){
                axios.delete('/jobDepartmentEntry/'+jobDepartmentEntryId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Job Department Deleted Successfully'
                    })
                    this.jobDepartmentShow();
                })
            },
            conditon(){
                axios.get('/condition').then(res =>{
                   this.role = res.data.authInfo;
                })
            },
        },
    }

</script>
