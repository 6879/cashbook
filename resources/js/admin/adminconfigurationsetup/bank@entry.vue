<template>
   <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bank Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="create()">
              <div class="form-group">
                 <label>Bank Type Name</label>
                  <select v-model="form.bankTypeEntryId" name="bankTypeEntryId" class="form-control" :class="{ 'is-invalid': form.errors.has('bankName') }">
                      <option value="">Select One</option>
                      <option v-for="showBankTypeData in showBankTypeDatas" :value="showBankTypeData.bankTypeEntryId" > {{ showBankTypeData.bankTypeEntryName }}</option>
                  </select>
                  <has-error :form="form" field="bankTypeEntryId"></has-error>
              </div>
              <div class="form-group">
                  <label>Bank Name</label>
                  <input v-model="form.bankName" type="text" name="bankName" :class="{ 'is-invalid': form.errors.has('bankName') }" placeholder="Bank Name" class="form-control">
                  <has-error :form="form" field="bankName"></has-error>
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
        <h3 style="color:black">Bank Entry List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Bank Type Name</th>
               <th>Bank Name</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(showDataEntry, index) in showDataEntrys.data">
                <td>{{ index+1 }}</td>
                <td v-if="showDataEntry.bank_type_entry">{{ showDataEntry.bank_type_entry.bankTypeEntryName }}</td>
                <td v-else=""></td>
                <td>{{ showDataEntry.bankName }}</td>
                <td>
                   <router-link :to="`/bank@entryEdit${showDataEntry.bankEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="deleteBankEntry(showDataEntry.bankEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="showDataEntrys" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
     </div>
  </span>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    bankName: '',
                    bankTypeEntryId: '',
                }),
                showBankTypeDatas:{},
                showDataEntrys:{},
            }

        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
            this.showDataList();
            this.showBankType();
            this.getPaginateList();
        },
        methods: {
            create() {
                this.form.post('/bankEntry').then(res => {
                    if (res.data.changebankName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Bank Name'
                        })
                    }
                    else{
                        this.form.reset()
                        Toast.fire({
                            icon: 'success',
                            title: 'Bank Entry Successfully'
                        })
                    }
                    this.showDataList();
                });
            },
            showDataList() {
                axios.get('/bankEntry').then(res => {
                    this.showDataEntrys = res.data.show
                })
            },
            getPaginateList(page = 1){
              axios.get('/bankEntry?page=' + page)
              .then(response => {
                 this.showDataEntrys = response.data.show;
              });
            },
            showBankType() {
                axios.get('/bankEntry/create').then(res => {
                    this.showBankTypeDatas = res.data.bankTypeEntry
                })
            },
            deleteBankEntry(bankEntryId){
                axios.delete('/bankEntry/'+bankEntryId).then( res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Bank Information Deleted Successfully'
                    })
                    this.showDataList()
                })
            }
        }
    }
</script>
