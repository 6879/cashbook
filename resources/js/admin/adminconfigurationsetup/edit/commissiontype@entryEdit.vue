<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Commission Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="update()">

              <div class="form-group">
                  <label> Commission Type Name</label>
                  <input v-model="form.commissionTypeEntryName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('commissionTypeEntryName') }" placeholder="Commission Type Name" class="form-control">
                  <has-error :form="form" field="commissionTypeEntryName"></has-error>
              </div>

              <div class="form-group">
                 <label>Commission Type Status</label>
                 <select v-model="form.commissionTypeEntryStatus" name="commissionTypeEntryStatus" :class="{ 'is-invalid': form.errors.has('commissionTypeEntryStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="commissionTypeEntryStatus"></has-error>
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
                    commissionTypeEntryName: '',
                    commissionTypeEntryStatus: '',
                }),

            }
        },
        mounted(){
            this.getData();
        },
        methods:{

            getData(){
                axios.get('/commissionTypeEntry/'+this.$route.params.commissionTypeEntryId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                        // console.log(res.data.data)
                    })
            },

            update(){
                this.form.put('/commissionTypeEntry/'+this.$route.params.commissionTypeEntryId)
                  .then(res =>{
                      if (res.data.changeCommissionType) {
                          Toast.fire({
                              icon: 'error',
                              title: 'Change Your Commission Type'
                          })
                      }
                      else{
                          Toast.fire({
                              icon: 'success',
                              title: 'Commission Type Entry Update Successfully'
                          })
                          this.$router.push('/commissiontype@entry')
                      }
                })
            }
        }
    }
</script>
