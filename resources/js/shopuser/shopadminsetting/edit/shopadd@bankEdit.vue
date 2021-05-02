<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Shop Bank Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="ShopBankEntryUpdate()">
              <div class="form-group">
                 <label>Bank Type Name</label>
                  <select v-model="form.bankTypeEntryId" name="bankTypeEntryId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankTypeEntryId') }">
                      <option value="">Select One</option>
                      <option v-for="showBankTypeData in showBankTypeDatas" :value="showBankTypeData.bankTypeEntryId" > {{ showBankTypeData.bankTypeEntryName }}</option>
                  </select>
                  <has-error :form="form" field="bankTypeEntryId"></has-error>
              </div>

              <div class="form-group">
                 <label>Bank Name</label>
                  <select v-model="form.bankEntryId" name="bankEntryId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankEntryId') }">
                      <option value="">Select One</option>
                      <option v-for="showBankName in showBankNames" :value="showBankName.bankEntryId" > {{ showBankName.bankName }}</option>
                  </select>
                  <has-error :form="form" field="bankEntryId"></has-error>
              </div>

               <div class="form-group">
                  <label>Bank Branch</label>
                  <input v-model="form.bankBranch" type="text" name="bankBranch" :class="{ 'is-invalid': form.errors.has('bankBranch') }" placeholder="Bank Branch" class="form-control">
                  <has-error :form="form" field="bankBranch"></has-error>
              </div>

              <div class="form-group">
                  <label>Bank Account Name</label>
                  <input v-model="form.bankAccountName" type="text" name="bankAccountName" :class="{ 'is-invalid': form.errors.has('bankAccountName') }" placeholder="Bank Account Name" class="form-control">
                  <has-error :form="form" field="bankAccountName"></has-error>
              </div>

               <div class="form-group">
                  <label>Bank Account Number</label>
                  <input v-model="form.bankAccountNumber" type="text" name="bankAccountNumber" :class="{ 'is-invalid': form.errors.has('bankAccountNumber') }" placeholder="Bank Account Number" class="form-control">
                  <has-error :form="form" field="bankAccountNumber"></has-error>
              </div>

               <div class="form-group">
                <label>Status</label>
                <select v-model="form.status" name="status"  :class="{ 'is-invalid': form.errors.has('status') }" class="form-control">
                  <option value="">Select One</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                 </select>
                 <has-error :form="form" field="status"></has-error>
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
                    bankTypeEntryId: '',
                    bankEntryId: '',
                    bankBranch: '',
                    bankAccountName: '',
                    bankAccountNumber: '',
                    status: '',
                }),
                showBankTypeDatas:[],
                showBankNames: [],
            }

        },
        mounted() {
            this.getShopBankData();
            this.showBankType();
            this.showBankName();
        },
        methods:{
            showBankType() {
                axios.get('/bankTypeEntryList')
                    .then(res => {
                        this.showBankTypeDatas = res.data.show
                    })
            },
            showBankName() {
                axios.get('/bankNameList')
                    .then(res => {
                        this.showBankNames = res.data.show
                    })
            },
            getShopBankData(){
                axios.get('/addBank/'+this.$route.params.bankId+ '/edit').then( res => {
                    this.form.fill(res.data.editShopBankEntry);
                })
            },
            ShopBankEntryUpdate(){
                this.form.put('/addBank/'+this.$route.params.bankId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Shop BankEntry Updated successfully'
                        })
                        this.$router.push('/shopadd@bank')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
