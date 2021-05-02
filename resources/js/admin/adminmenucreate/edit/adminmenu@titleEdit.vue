<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Menu Title Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="update()">
              <div class="form-group">
                 <label>Menu Title Name</label>
                 <input type="text" v-model="form.adminMenuTitleName" name="adminMenuTitleName" placeholder="Menu Title Name" class="form-control"  :class="{ 'is-invalid': form.errors.has('adminMenuTitleName') }">
                 <has-error :form="form" field="adminMenuTitleName"></has-error>
              </div>
              <div class="form-group">
                 <label>Menu Title Position</label>
                 <input type="text" v-model="form.adminMenuTitlePosition" name="adminMenuTitlePosition" placeholder="Menu Title Position" class="form-control"  :class="{ 'is-invalid': form.errors.has('adminMenuTitlePosition') }">
                 <has-error :form="form" field="adminMenuTitlePosition"></has-error>
              </div>
              <div class="form-group">
                 <label>Menu Title Icon</label>
                 <input type="text" v-model="form.adminMenuTitleIcon" name="adminMenuTitleIcon" placeholder="Menu Title Icon" class="form-control"  :class="{ 'is-invalid': form.errors.has('adminMenuTitleIcon') }">
                 <has-error :form="form" field="adminMenuTitleIcon"></has-error>
              </div>

              <div class="form-group">
                <label>Menu Title Status</label>
                <select v-model="form.adminMenuTitleStatus" name="adminMenuTitleStatus"  :class="{ 'is-invalid': form.errors.has('adminMenuTitleStatus') }" class="form-control">
                  <option value="">Select One</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                 </select>
                 <has-error :form="form" field="adminMenuTitleStatus"></has-error>
             </div>
             <div class="form-group">
               <label>Menu Title Permission</label>
               <select v-model="form.adminMenuTitlePermission" name="adminMenuTitlePermission"  :class="{ 'is-invalid': form.errors.has('adminMenuTitlePermission') }" class="form-control">
                 <option value="">Select One</option>
                 <option value="1">Active</option>
                 <option value="0">Deactive</option>
                </select>
                <has-error :form="form" field="adminMenuTitlePermission"></has-error>
            </div>
            <div class="text-right pt-3">
              <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary">Update</button>
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
                  adminMenuTitleId: '',
                  adminMenuTitleName: '',
                  adminMenuTitlePosition: '',
                  adminMenuTitleIcon: '',
                  adminMenuTitleStatus: '',
                  adminMenuTitlePermission: '',
                }),

            }

        },
      mounted() {
            this.getData();
      },
      methods:{

            getData(){
                axios.get('/adminMenuTitle/'+this.$route.params.adminMenuTitleId+'/edit')
                .then(res=>{
                    this.form.fill(res.data.data)
                })
            },

            update(){
                this.form.put('/adminMenuTitle/'+this.$route.params.adminMenuTitleId)
                  .then(res =>{
                    if (res.data.success) {
                        Toast.fire({
                          icon: 'success',
                          title: 'Admin Menu Title Update Successfully'
                        })
                        this.$router.push('/adminmenu@title')
                    }
                    else{
                        Toast.fire({
                          icon: 'error',
                          title: 'Change Your Admin Menu Title Name'
                        })
                    }
                })
            }
        }
    }
</script>
