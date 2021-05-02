<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Salary Grade Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="gradeEntry()">
              <div class="form-group">
                  <label>Grade Name</label>
                  <input type="text" v-model="form.gradeName"  name="gradeName" :class="{ 'is-invalid': form.errors.has('gradeName') }" placeholder="Grade Name" class="form-control">
                  <has-error :form="form" field="gradeName"></has-error>
              </div>
              <div class="form-group">
                  <label>Grade Amount</label>
                  <input type="text" v-model="form.gradeAmount"  name="gradeAmount" :class="{ 'is-invalid': form.errors.has('gradeAmount') }" placeholder="Grade Amount" class="form-control">
                  <has-error :form="form" field="gradeAmount"></has-error>
              </div>
              <div class="form-group">
                 <label>Grade Status</label>
                 <select v-model="form.gradeStatus" name="gradeStatus" :class="{ 'is-invalid': form.errors.has('gradeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="gradeStatus"></has-error>
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
        <h3 style="color:black">Salary Grade List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Grade Name</th>
               <th>Grade Amount</th>
               <th>Grade Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(gradeList, index) in gradeLists.data">
                <td>{{ index+1 }}</td>
                <td>{{ gradeList.gradeName	 }}</td>
                <td>{{ gradeList.gradeAmount	 }}</td>
                <td>
                    <div v-if="gradeList.gradeStatus == 1">
                      <button type="button"  @click="changeStatus(gradeList.gradeEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(gradeList.gradeEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/salarygrade@edit${gradeList.gradeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="gradeLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    gradeName : '',
                    gradeAmount: '',
                    gradeStatus: '',
                }),
                gradeLists:{},
            }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.gradeList();
            this.getPaginateList();
        },
        methods:{
            gradeEntry(){
                this.form.post('/salaryGradeEntry').then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Grade Entry Successfully'
                    })
                    this.form.reset();
                    this.gradeList();
                })
            },
            gradeList(){
                axios.get('/salaryGradeEntry').then(res =>{
                    this.gradeLists = res.data.gradeLists
              })
            },
            getPaginateList(page = 1) {
                axios.get('/salaryGradeEntry?page=' + page).then(response => {
                    this.gradeLists = response.data.gradeLists;
                });
            },
            changeStatus(gradeEntryId){
                axios.get('/salaryGradeEntry/'+gradeEntryId).then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Grade Entry Status Change Successfully'
                    })
                    this.gradeList();
                })
            },
        }
    }

</script>
