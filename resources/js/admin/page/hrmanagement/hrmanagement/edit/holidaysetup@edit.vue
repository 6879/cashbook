<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Holiday Setup Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="holidaySetupUpdate()">
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
                 <label>Holiday Setup Status </label>
                 <select v-model="form.holidaySetupStatus" name="holidaySetupStatus" :class="{ 'is-invalid': form.errors.has('holidaySetupStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="holidaySetupStatus"></has-error>
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
                  holidayTypeId : '',
                  holidayStartDate: '',
                  holidayEndDate: '',
                  holidaySetupStatus: '',
              }),
                holidayTypeShows:[],
            }
        },
        mounted(){
          this.holidayTypeShow();
          this.holidaySetupShow();
        },
        methods:{
          holidaySetupUpdate(){
            this.form.put('/holidaySetup/'+this.$route.params.holidaySetupId).then(res =>{
                if (res.data.changeholidayTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Holiday Type Name'
                    })
                }
                else{
                  Toast.fire({
                    icon: 'success',
                    title: 'Holiday Setup Update Successfully'
                  })
                  this.$router.push('/holiday@setup')
                }
            })
          },
          holidayTypeShow(){
             axios.get('/holidaySetup/create').then(res =>{
                 this.holidayTypeShows = res.data.AdminHolidayType
             })
          },
          holidaySetupShow(){
            axios.get('/holidaySetup/'+this.$route.params.holidaySetupId+'/edit').then(res =>{
                this.form.fill(res.data.adminHolidaySetup)
            })
          },
      },
  }

</script>
