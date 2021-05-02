<template>
     <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Update Loan Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="loanEntryUpdate()">
                <div class="form-group">
                 <label>Loan Provider Name</label>
                  <select v-model="form.loanProviderId" name="loanProviderId" class="form-control" :class="{ 'is-invalid': form.errors.has('loanProviderId') }">
                      <option value="">Select One</option>
                      <option v-for="LoanProviderNameShows in LoanProviderNameShow" :value="LoanProviderNameShows.loanProviderId">{{ LoanProviderNameShows.loanProviderName }}</option>
                  </select>
                  <has-error :form="form" field="loanProviderId"></has-error>
              </div>
              <div class="form-group">
                 <label>Loan Amount</label>
                 <input type="text" v-model="form.loanAmount" name="loanAmount"  placeholder="Loan Amount" class="form-control" :class="{ 'is-invalid': form.errors.has('loanAmount') }">
                   <has-error :form="form" field="loanAmount"></has-error>
               </div>
              <div class="form-group">
                 <label>Loan Condition</label>
                 <input type="text" v-model="form.loanCondition" name="loanCondition"  placeholder="Loan Condition" class="form-control" :class="{ 'is-invalid': form.errors.has('loanCondition') }">
                   <has-error :form="form" field="loanCondition"></has-error>
               </div>
              <div class="form-group">
                 <label>Loan Commitment</label>
                 <input type="text" v-model="form.loanCommitment" name="loanCommitment"  placeholder="Loan Commitment" class="form-control" :class="{ 'is-invalid': form.errors.has('loanCommitment') }">
                   <has-error :form="form" field="loanCommitment"></has-error>
               </div>
              <div class="form-group">
                 <label>Loan Status</label>
                 <select v-model="form.loanStatus" name="loanProviderStatus" :class="{ 'is-invalid': form.errors.has('loanStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                 </select>
                  <has-error :form="form" field="loanStatus"></has-error>
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
                    loanProviderId: '',
                    loanAmount: '',
                    loanCondition: '',
                    loanCommitment: '',
                    loanStatus: '',
                }),
                LoanProviderNameShow:[],
            }
        },
        mounted() {
            this.getLoanData();
            this.ShowLoanProviderName();
        },

        methods:{
            ShowLoanProviderName() {
                axios.get('/shopLoanEntry/create').then(res => {
                    this.LoanProviderNameShow = res.data.showProviderName
                })
            },
            getLoanData(){
                axios.get('/shopLoanEntry/'+this.$route.params.loanEntryId+ '/edit').then( res => {
                        this.form.fill(res.data.loanEditData);
                })
            },

            loanEntryUpdate(){
                this.form.put('/shopLoanEntry/'+this.$route.params.loanEntryId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'LoanEntry Updated successfully'
                        })
                        this.$router.push('/shoploan@entry')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
