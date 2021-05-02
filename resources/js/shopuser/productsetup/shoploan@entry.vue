<template>
    <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Loan Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="createLoanEntry()">
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
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
         </div>
       </div>
     </div>

      <div class="card mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Loan Entry List</h3>
          </div>
          <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Loan Provider Name</th>
                   <th>Loan Amount</th>
                   <th>Loan Condition</th>
                   <th>Loan Commitment</th>
                   <th>Loan Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr v-for="(showDatas, index) in LoanDataShow">
                    <td>{{ index+1 }}</td>
                    <td v-if="showDatas.shop_loan_provider_entry == null">
                    </td>
                     <td v-else="showDatas.shop_loan_provider_entry">{{ showDatas.shop_loan_provider_entry.loanProviderName }}</td>
                    <td>{{ showDatas.loanAmount }}</td>
                    <td>{{ showDatas.loanCondition }}</td>
                    <td>{{ showDatas.loanCommitment }}</td>
                    <td>
                        <div v-if="showDatas.loanStatus == 1">
                          <button type="button"  @click="changeStatus(showDatas.loanEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(showDatas.loanEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                         <router-link :to="`/shoploan@Editentry${showDatas.loanEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                         <button @click.prevent="deleteLoanShow(showDatas.loanEntryId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                   </td>
                 </tr>
                </tbody>
             </table>
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
                LoanDataShow:[],
            }
        },
        mounted() {
            this.ShowLoanProviderName();
            this.LoanEntryDataShow();
        },
        methods:{
            ShowLoanProviderName() {
                axios.get('/shopLoanEntry/create').then(res => {
                    this.LoanProviderNameShow = res.data.showProviderName
                })
            },
            LoanEntryDataShow(){
                axios.get('/shopLoanEntry').then( res => {
                    this.LoanDataShow = res.data.showLoanData;
                })
            },
            createLoanEntry(){
                this.form.post('/shopLoanEntry').then( res => {
                    this.form.reset()
                    Toast.fire({
                        icon: 'success',
                        title: 'Saved ShopLoanEntry successfully'
                    })
                    this.LoanEntryDataShow();
                })
            },
            changeStatus(loanEntryId){
                axios.get('/shopLoanEntry/'+loanEntryId).then( res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Loan status successfully'
                    })
                    this.LoanEntryDataShow();
                });
            },

            deleteLoanShow(loanEntryId){
                axios.delete('/shopLoanEntry/'+loanEntryId).then( res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Loan Entry Deleted successfully'
                    })
                    this.LoanEntryDataShow();
                })
            }



        }
    }
</script>

<style scoped>

</style>
