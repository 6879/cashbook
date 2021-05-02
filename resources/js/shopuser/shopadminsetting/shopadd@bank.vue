<template>
   <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Bank Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="create()">
              <div class="form-group">
                 <label>Bank Type Name</label>
                  <select v-model="form.bankTypeEntryId" name="bankTypeEntryId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankTypeEntryId') }" @change.prevent="bankTypeIdCatch()">
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
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

   <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Bank Entry List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Bank Type</th>
               <th>Bank Name</th>
               <th>Bank Branch</th>
               <th>Account Name</th>
               <th>Account Number</th>
               <th>Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(shopBankAllData, index) in shopBankAllDatas">
                <td>{{ index+1 }}</td>
                <td v-if="shopBankAllData.bank_type_entry">
                    {{ shopBankAllData.bank_type_entry.bankTypeEntryName }}
                </td>
                <td v-else></td>
                <td v-if="shopBankAllData.bank_entry">
                   {{ shopBankAllData.bank_entry.bankName }}
                </td>
                <td v-else></td>
                <td>{{ shopBankAllData.bankBranch }}</td>
                <td>{{ shopBankAllData.bankAccountName }}</td>
                <td>{{ shopBankAllData.bankAccountNumber }}</td>
                <td>
                    <div v-if="shopBankAllData.status == 1">
                          <button type="button"  @click="changeStatus(shopBankAllData.bankId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                          <button type="button"  @click="changeStatus(shopBankAllData.bankId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/shopadd@bankEdit${shopBankAllData.bankId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="deleteBankEntry(shopBankAllData.bankId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                    bankTypeEntryId: '',
                    bankEntryId: '',
                    bankBranch: '',
                    bankAccountName: '',
                    bankAccountNumber: '',
                    status: '',
                }),
                // showDataEntrys:[],
                showBankTypeDatas:[],
                showBankNames: [],
                shopBankAllDatas: [],
            }

        },
        mounted() {
            this.getData();
            this.showBankType();
        },
        methods: {
            create() {
                this.form.post('/addBank').then(res => {
                    if (res.data.changebankName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Bank Name'
                        })
                  }
                  else{
                      Toast.fire({
                          icon: 'success',
                          title: 'Bank Entry Successfully'
                      })
                      this.form.reset()
                      this.getData();
                  }
                });
            },
            getData() {
                axios.get('/addBank')
                    .then(res => {
                        this.shopBankAllDatas = res.data.showData

                    })
            },
            showBankType() {
              axios.get('/bankTypeEntryList').then(res => {
                    this.showBankTypeDatas = res.data.show
                })
            },
            bankTypeIdCatch() {
                axios.get('/bankNameList/'+this.form.bankTypeEntryId).then(res => {
                    this.showBankNames = res.data.show
                })
            },

            deleteBankEntry(bankId){
                axios.delete('/addBank/'+bankId)
                    .then( res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Shop BankEntry Deleted Successfully'
                        })
                        this.getData();
                    })
            },

            changeStatus(bankId){
                axios.get('/addBank/'+bankId).then( res => {
                    Toast.fire({
                        icon: 'success',
                        title: 'Shop Bank Status Changed Successfully'
                    })
                    this.getData();
                });
            },
        }
    }
</script>
