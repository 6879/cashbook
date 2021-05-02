<template>
    <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Update Loan Provider Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="loanProviderEntryUpdate()">
               <div class="form-group">
                 <label>Loan Provider Name</label>
                 <input type="text" v-model="form.loanProviderName" name="loanProviderName"  placeholder="Loan Provider Name" class="form-control" :class="{ 'is-invalid': form.errors.has('loanProviderName') }">
                   <has-error :form="form" field="loanProviderName"></has-error>
               </div>
              <div class="form-group">
                 <label>Loan Provider Phone</label>
                 <input type="text" v-model="form.loanProviderPhone" name="loanProviderPhone"  placeholder="Loan Provider Phone" class="form-control" :class="{ 'is-invalid': form.errors.has('loanProviderPhone') }">
                   <has-error :form="form" field="loanProviderPhone"></has-error>
               </div>
              <div class="form-group">
                    <label>Loan Provider Address</label>
                    <textarea class="form-control" v-model="form.loanProviderAddress"  rows="3" :class="{ 'is-invalid': form.errors.has('loanProviderAddress') }" placeholder="Loan Provider Address">
                    </textarea>
                   <has-error :form="form" field="loanProviderAddress"></has-error>
               </div>


              <div class="form-group">
                 <label>Loan Provider Status</label>
                 <select v-model="form.loanProviderStatus" name="loanProviderStatus" :class="{ 'is-invalid': form.errors.has('loanProviderStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="loanProviderStatus"></has-error>
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
        data(){
            return{
                form: new Form({
                    loanProviderName:'',
                    loanProviderPhone: '',
                    loanProviderAddress: '',
                    loanProviderStatus: '',
                }),
            }
        },
        mounted() {
            this.getData();
        },
        methods: {
            getData() {
                axios.get('/shopLoanProviderEntry/' + this.$route.params.loanProviderId + '/edit').then(res => {
                    this.form.fill(res.data.editData)
                })
            },

            loanProviderEntryUpdate(){
                this.form.put('/shopLoanProviderEntry/'+this.$route.params.loanProviderId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Loan Provider  Updated successfully'
                        })
                        this.$router.push('/shoploanprovider@entry')
                    })
            }

        }
    }
</script>

<style scoped>

</style>
