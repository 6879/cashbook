<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bank Type Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="create()">
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
                 <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

   <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bank Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Bank Type Entry Name</th>
               <th>Bank Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(showData, index) in showDataentry.data">
                <td>{{ index+1 }}</td>
                <td>{{ showData.bankTypeEntryName }}</td>
                <td>
                    <div v-if="showData.bankTypeEntryStatus == 1">
                      <button type="button"  @click="changeStatus(showData.bankTypeEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(showData.bankTypeEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                  <router-link :to="`/banktype@entryEdit${showData.bankTypeEntryId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button type="button"  @click.prevent="deleteBankTypeEntry(showData.bankTypeEntryId)" class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="showDataentry" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    bankTypeEntryName:'',
                    bankTypeEntryStatus:'',
                }),
                showDataentry:{},
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
            this.getPaginateList();
        },
        methods: {
          create() {
            this.form.post('/bankTypeEntry').then(res => {
                  if (res.data.changebankTypeEntryName){
                      Toast.fire({
                          icon: 'error',
                          title: 'Change Your Brnk Type Name'
                      })
                  }
                  else {
                    this.form.reset()
                    Toast.fire({
                        icon: 'success',
                        title: 'BankType Entry Successfully'
                    })
                  }
                  this.showDataList()
             });
          },
          showDataList() {
              axios.get('/bankTypeEntry').then(res => {
                  this.showDataentry = res.data.show
              })
          },
          getPaginateList(page = 1){
            axios.get('/bankTypeEntry?page=' + page)
            .then(response => {
               this.showDataentry = response.data.show;
            });
          },
          changeStatus($bankTypeEntryId){
            axios.get("bankTypeEntry/"+$bankTypeEntryId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Bank Type Status Change Successfully'
                  })
                  this.showDataList()
              })
          },
          deleteBankTypeEntry(bankTypeEntryId){
            axios.delete('/bankTypeEntry/'+bankTypeEntryId).then( res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Deleted Bank Type Successfully'
                  })
                  this.showDataList()
              })
          },
        }
    }
</script>
