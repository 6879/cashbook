<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Holiday Type Entry </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="holidayTypeCreate()">
              <div class="form-group">
                  <label>Holiday Type Name</label>
                  <input type="text" v-model="form.holidayTypeName"  name="holidayTypeName" :class="{ 'is-invalid': form.errors.has('holidayTypeName') }" placeholder="Holiday Type Name" class="form-control">
                  <has-error :form="form" field="holidayTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Holiday Type Status</label>
                 <select v-model="form.holidayTypeStatus" name="holidayTypeStatus" :class="{ 'is-invalid': form.errors.has('holidayTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="holidayTypeStatus"></has-error>
              </div>

             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

  <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Holiday Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Holiday Type Name</th>
               <th>Holiday Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(holidayTypeShow, index) in holidayTypeShows.data">
                <td>{{ index+1 }}</td>
                <td>{{ holidayTypeShow.holidayTypeName	 }}</td>
                <td>
                    <div v-if="holidayTypeShow.holidayTypeStatus == 1">
                      <button type="button"  @click="changeStatus(holidayTypeShow.holidayTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(holidayTypeShow.holidayTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/adminholidaytype@edit${holidayTypeShow.holidayTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(holidayTypeShow.holidayTypeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                 </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="holidayTypeShows" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    holidayTypeName : '',
                    holidayTypeStatus: '',
                }),
                holidayTypeShows:{},
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
          this.getPaginateList();
        },
        methods:{
          holidayTypeCreate(){
            this.form.post('/adminHolidayType').then(res =>{
                if (res.data.changeholidayTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Holiday Type Name'
                    })
                }else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Holiday Type Create Successfully'
                    })
                    this.form.reset();
                }
                this.holidayTypeShow();
            })
          },
          holidayTypeShow(){
            axios.get('/adminHolidayType').then(res =>{
                this.holidayTypeShows = res.data.AdminHolidayType
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminHolidayType?page=' + page)
            .then(response => {
                this.holidayTypeShows = response.data.AdminHolidayType;
            });
          },
          changeStatus(holidayTypeId){
           axios.get('/adminHolidayType/'+holidayTypeId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Holiday Type Status Change Successfully'
               })
               this.holidayTypeShow();
           })
         },
         distroy(holidayTypeId){
           axios.delete('/adminHolidayType/'+holidayTypeId).then(res =>{
              this.holidayTypeShow();
           })
         }

      },
  }

</script>
