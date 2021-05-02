<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bank Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="bankTypeEntryUpdate()">
              <div class="form-group">
                  <label>Bank Type Name</label>
                  <input v-model="form.bankTypeEntryName" type="text" name="bankTypeEntryName" :class="{ 'is-invalid': form.errors.has('bankTypeEntryName') }" placeholder="Bank Type Name" class="form-control">
                  <has-error :form="form" field="bankTypeEntryName"></has-error>
              </div>

                <div class="form-group">
                 <label>Bank Type Status</label>
                 <select v-model="form.bankTypeEntryStatus" name="bankTypeEntryStatus" :class="{ 'is-invalid': form.errors.has('bankTypeEntryStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="bankTypeEntryStatus"></has-error>
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
        data() {
            return {
                form: new Form({
                    bankTypeEntryName: '',
                    bankTypeEntryStatus: '',
                })
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
              axios.get('/bankTypeEntry/' + this.$route.params.bankTypeEntryId + '/edit')
                  .then(res => {
                      this.form.fill(res.data.editData)

                  })
            },
            bankTypeEntryUpdate(){
              this.form.put('/bankTypeEntry/'+this.$route.params.bankTypeEntryId)
                  .then(res =>{
                      if (res.data.success) {
                          Toast.fire({
                            icon: 'success',
                            title: 'Bank Type Updated Successfully'
                          })
                          this.$router.push('/banktype@entry')
                      }
                      else{
                          Toast.fire({
                            icon: 'error',
                            title: 'Change Your Bank Type Name'
                          })
                      }
                  })
             }

        }
    }
</script>
