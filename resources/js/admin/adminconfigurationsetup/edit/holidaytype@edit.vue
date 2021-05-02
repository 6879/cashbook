<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Holiday Type Update </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="holidayTypeUpdate()">
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
                    holidayTypeName : '',
                    holidayTypeStatus: '',
                }),
            }
        },
        mounted(){
          this.holidayTypeShow();
        },
        methods:{
          holidayTypeUpdate(){
            this.form.put('/adminHolidayType/'+this.$route.params.holidayTypeId).then(res =>{
                if (res.data.changeholidayTypeName) {
                    Toast.fire({
                      icon: 'error',
                      title: 'Change Your Holiday Type Name'
                    })
                }
                else{
                  Toast.fire({
                    icon: 'success',
                    title: 'Holiday Type Update Successfully'
                  })
                  this.$router.push('/adminholiday@entry')
                }
            })
          },
          holidayTypeShow(){
            axios.get('/adminHolidayType/'+this.$route.params.holidayTypeId+'/edit').then(res =>{
                this.form.fill(res.data.adminHolidayTypeshow)
            })
          },
      }
  }

</script>
