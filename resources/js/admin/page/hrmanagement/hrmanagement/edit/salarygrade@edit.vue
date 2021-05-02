<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Salary Grade Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="gradeUpdate()">
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
                    gradeName : '',
                    gradeAmount: '',
                    gradeStatus: '',
                }),
            }
        },
        mounted(){
          this.golidayEntryShow();
        },
        methods:{
            gradeUpdate(){
                this.form.put('/salaryGradeEntry/'+this.$route.params.gradeEntryId).then(res =>{
                    if (res.data.changeName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Grade Name'
                        })
                    }
                    else{
                      Toast.fire({
                        icon: 'success',
                        title: 'Grade  Update Successfully '
                      })
                      this.$router.push('/salarygrade@entry')
                    }
                })
            },
            golidayEntryShow(){
              axios.get('/salaryGradeEntry/'+this.$route.params.gradeEntryId+'/edit').then(res =>{
                  this.form.fill(res.data.gradeSingleShow)
              })
            },
        }
    }

</script>
