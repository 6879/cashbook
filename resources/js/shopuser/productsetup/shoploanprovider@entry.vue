<template>
    <span>
      <div class="card">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Loan Provider Entry</h3>
          </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="loanProviderEntry()">
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
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
         </div>
       </div>
     </div>

      <div class="card mt-5">
          <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
            <h3 style="color:black">Loan Provider List</h3>
          </div>
          <div class="table-responsive bg-white">
            <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                   <th>SN</th>
                   <th>Loan Provider Name</th>
                   <th>Loan Provider Phone</th>
                   <th>Loan Provider Address</th>
                   <th>Loan Provider Status</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                  <tr v-for="(showDatas, index) in showDataEntry">
                    <td>{{ index+1 }}</td>
                    <td>{{ showDatas.loanProviderName }}</td>
                    <td>{{ showDatas.loanProviderPhone }}</td>
                    <td>{{ showDatas.loanProviderAddress }}</td>
                    <td>
                        <div v-if="showDatas.loanProviderStatus == 1">
                          <button type="button"  @click="changeStatus(showDatas.loanProviderId)" class="btn btn-hover-shine btn-success">Published</button>
                        </div>
                        <div v-else>
                          <button type="button"  @click="changeStatus(showDatas.loanProviderId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                        </div>
                    </td>
                    <td>
                         <router-link :to="`/shoploanprovider@Editentry${showDatas.loanProviderId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                         <button @click.prevent="deleteLoanProvider(showDatas.loanProviderId)"  class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                    loanProviderName:'',
                    loanProviderPhone: '',
                    loanProviderAddress: '',
                    loanProviderStatus: '',
                }),
                showDataEntry:[],
            }
        },
        mounted() {
            this.ShowDataList();
        },
        methods:{
            loanProviderEntry(){
                this.form.post('/shopLoanProviderEntry').then(res => {
                    this.form.reset()
                    Toast.fire({
                        icon: 'success',
                        title: 'Saved Loan Provider Entry successfully'
                    })
                    this.ShowDataList();
                })
            },
            ShowDataList() {
                axios.get('/shopLoanProviderEntry').then(res => {
                        this.showDataEntry = res.data.data
                    })
            },

            changeStatus(loanProviderId){
                axios.get('/shopLoanProviderEntry/'+loanProviderId).then( res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Loan Provider status successfully'
                    })
                    this.ShowDataList();
                });
            },

            deleteLoanProvider($loanProviderId){
              axios.delete('/shopLoanProviderEntry/'+$loanProviderId).then( res => {
                  Toast.fire({
                      icon: 'success',
                      title: 'Loan Provider Deleted successfully'
                  })
                  this.ShowDataList();
              })
            }

        }
    }
</script>

<style scoped>

</style>
