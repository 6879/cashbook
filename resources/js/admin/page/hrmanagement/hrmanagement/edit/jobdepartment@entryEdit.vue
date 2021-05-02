<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Job Department</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="jobDepartmentUpdate()">
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
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
             </div>
          </form>
        </div>
      </div>
    </div>
  </span>

</template>

<script>
    export default {
        data () {
            return {
                form: new Form({
                    jobDepartmentName : '',
                    jobDepartmentStatus: '',
                }),
            }
        },
        mounted() {
            this.getData();
        },
        methods:{
            getData() {
                axios.get('/jobDepartmentEntry/' + this.$route.params.jobDepartmentEntryId + '/edit')
                    .then(res => {
                        this.form.fill(res.data.editData)

                    })
            },
            jobDepartmentUpdate(){
                this.form.put('/jobDepartmentEntry/'+this.$route.params.jobDepartmentEntryId)
                    .then(res=>{
                      if (res.data.changeName) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Job Department Name'
                        })
                      }
                      else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Job Department  Updated successfully'
                        })
                        this.$router.push('/jobdepartment@entry')
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
