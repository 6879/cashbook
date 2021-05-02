<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bank Entry Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="bankEntryUpdate()">
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
                    bankName: '',
                    bankTypeEntryId: '',
                }),
                showBankTypeDatas: [],
            }
        },
        mounted() {
          this.getData();
          this.showBankType();
        },
        methods:{
            getData() {
              axios.get('/bankEntry/'+this.$route.params.bankEntryId +'/edit')
                .then(res => {
                    this.form.fill(res.data.editData)
              })
            },
            showBankType() {
                axios.get('/bankEntry/create').then(res => {
                    this.showBankTypeDatas = res.data.bankTypeEntry
                })
            },
            bankEntryUpdate(){
                this.form.put('/bankEntry/'+this.$route.params.bankEntryId).then(res=>{
                    if (res.data.changebankName) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Bank Name'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'BankEntry Updated Successfully'
                        })
                        this.$router.push('/bank@entry')
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>
