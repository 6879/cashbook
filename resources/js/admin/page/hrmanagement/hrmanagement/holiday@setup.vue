<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Holiday Setup</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="holidaySetupCreate()">
              <div class="form-group">
                  <label>Holiday Type Name</label>
                  <select v-model="form.holidayTypeId" name="holidayTypeId" :class="{ 'is-invalid': form.errors.has('holidayTypeId') }" class="form-control">
                      <option value="">Select One</option>
                      <option v-for="holidayTypeShow in holidayTypeShows"  :value="holidayTypeShow.holidayTypeId">{{ holidayTypeShow.holidayTypeName }}</option>
                   </select>
                   <has-error :form="form" field="holidayTypeId"></has-error>
              </div>
              <div class="form-group">
                  <label>Holiday Start Date</label>
                  <input type="date" v-model="form.holidayStartDate"  name="holidayStartDate" :class="{ 'is-invalid': form.errors.has('holidayStartDate') }" class="form-control">
                  <has-error :form="form" field="holidayStartDate"></has-error>
              </div>
              <div class="form-group">
                  <label>Holiday Start Date</label>
                  <input type="date" v-model="form.holidayEndDate"  name="holidayEndDate" :class="{ 'is-invalid': form.errors.has('holidayEndDate') }" class="form-control">
                  <has-error :form="form" field="holidayEndDate"></has-error>
              </div>
              <div class="form-group">
                 <label>Holiday Setup Status</label>
                 <select v-model="form.holidaySetupStatus" name="holidaySetupStatus" :class="{ 'is-invalid': form.errors.has('holidaySetupStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="holidaySetupStatus"></has-error>
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
        <h3 style="color:black">Holiday Setup List</h3>
      </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Holiday Type Name</th>
                 <th>Holiday Start Date </th>
                 <th>Holiday End Date </th>
                 <th>Holiday Setup Status</th>
                 <th v-if="role.role == 1 || role.role == 2">Action</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(holidaySetupShow, index) in holidaySetupShows.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="holidaySetupShow.admin_holiday_type_relation">{{ holidaySetupShow.admin_holiday_type_relation.holidayTypeName	 }}</td>
                  <td v-else></td>
                  <td>{{ holidaySetupShow.holidayStartDate	 }}</td>
                  <td>{{ holidaySetupShow.holidayEndDate	 }}</td>
                  <td>
                      <div v-if="holidaySetupShow.holidaySetupStatus == 1">
                        <button type="button"  @click="changeStatus(holidaySetupShow.holidaySetupId)" class="btn btn-hover-shine btn-success">Published</button>
                      </div>
                      <div v-else>
                        <button type="button"  @click="changeStatus(holidaySetupShow.holidaySetupId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                      </div>
                  </td>
                  <td  v-if="role.role == 1 || role.role == 2">
                      <router-link :to="`/holiday@setupedit${holidaySetupShow.holidaySetupId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                      <button type="button" @click="distroy(holidaySetupShow.holidaySetupId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                   </td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="holidaySetupShows" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    holidayTypeId : '',
                    holidayStartDate: '',
                    holidayEndDate: '',
                    holidaySetupStatus: '',
                }),
                holidayTypeShows:{},
                holidaySetupShows:{},
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
            this.holidayTypeShow();
            this.holidaySetupShow();
            this.getPaginateList();
            this.conditon();
        },
        methods:{
          holidaySetupCreate(){
            this.form.post('/holidaySetup').then(res =>{
                if (res.data.changeholidayTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Holiday Type Name'
                    })
                }
                else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Holiday Setup Create Successfully'
                    })
                    this.form.reset();
                }
                this.holidaySetupShow();
            })
          },
          holidayTypeShow(){
            axios.get('/holidaySetup/create').then(res =>{
                this.holidayTypeShows = res.data.AdminHolidayType
            })
          },
          holidaySetupShow(){
            axios.get('/holidaySetup').then(res =>{
                this.holidaySetupShows = res.data.adminHolidaySetup
            })
          },
          getPaginateList(page = 1){
            axios.get('/holidaySetup?page=' + page)
            .then(response => {
                this.holidaySetupShows = response.data.adminHolidaySetup;
            });
          },
          changeStatus(holidaySetupId){
           axios.get('/holidaySetup/'+holidaySetupId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Holiday Setup Status Change Successfully'
               })
               this.holidaySetupShow();
           })
         },
         distroy(holidaySetupId){
           axios.delete('/holidaySetup/'+holidaySetupId).then(res =>{
                 Toast.fire({
                   icon: 'success',
                   title: 'Holiday Setup Delete Successfully'
                 })
                this.holidaySetupShow();
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
