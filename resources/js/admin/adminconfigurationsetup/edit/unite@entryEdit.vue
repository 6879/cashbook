<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Unite Name Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="update()">
              <div class="form-group">
                  <label>Unite Name</label>
                  <input v-model="form.uniteEntryName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('uniteEntryName') }" placeholder="Unite Name" class="form-control">
                  <has-error :form="form" field="uniteEntryName"></has-error>
              </div>

                <div class="form-group">
                 <label>Unite Status</label>
                 <select v-model="form.uniteEntryStatus" name="uniteEntryStatus" :class="{ 'is-invalid': form.errors.has('uniteEntryStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="uniteEntryStatus"></has-error>
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
                    uniteEntryName : '',
                    uniteEntryStatus: '',
                }),

            }
        },
        mounted(){
            this.getData();
        },
        methods:{

            getData(){
                axios.get('/uniteEntry/'+this.$route.params.uniteEntryId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                    })
            },

            update(){
                this.form.put('/uniteEntry/'+this.$route.params.uniteEntryId)
                    .then(res=>{
                      if (res.data.success) {
                          Toast.fire({
                            icon: 'success',
                            title: 'Unite Name Updated Successfully'
                          })
                          this.$router.push('/unite@entry')
                      }
                      else{
                          Toast.fire({
                            icon: 'error',
                            title: 'Please Change Unite Name'
                          })
                      }
                  })
              }
        }
    }
</script>
