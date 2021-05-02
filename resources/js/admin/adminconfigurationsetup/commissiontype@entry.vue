<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Commission Type Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="commissionTypeCreate()">

              <div class="form-group">
                  <label> Commission Type Name</label>
                  <input v-model="form.commissionTypeEntryName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('commissionTypeEntryName') }" placeholder="Commission Type Name" class="form-control">
                  <has-error :form="form" field="commissionTypeEntryName"></has-error>
              </div>

                <div class="form-group">
                 <label>Commission Type Status</label>
                 <select v-model="form.commissionTypeEntryStatus" name="commissionTypeEntryStatus" :class="{ 'is-invalid': form.errors.has('commissionTypeEntryStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="commissionTypeEntryStatus"></has-error>
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
        <h3 style="color:black">Commission Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Commission Type Name</th>
               <th>Commission Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(CommissionData, index) in commissionTypeData.data">
                <td>{{ index+1 }}</td>
                <td>{{ CommissionData.commissionTypeEntryName }}</td>
                <td>
                    <div v-if="CommissionData.commissionTypeEntryStatus == 1">
                      <button type="button"  @click="changeStatus(CommissionData.commissionTypeEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(CommissionData.commissionTypeEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                     <router-link :to="`/commissiontype@entryEdit${CommissionData.commissionTypeEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button TYPE="button" @click="distroy(CommissionData.commissionTypeEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="commissionTypeData" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
     </div>
  </span>
</template>
<script>
    export default {
        data() {
            return {
                form: new Form({
                    commissionTypeEntryName: '',
                    commissionTypeEntryStatus: '',
                }),
                commissionTypeData: {},
            }
        },
        props:{
          limit: {
            type: Number,
            default: 2
          }
        },
        mounted(){
            this.getData();
            this.getPaginateList();
        },
        methods:{
            commissionTypeCreate(){
                this.form.post('/commissionTypeEntry').then(res=>{
                    if (res.data.changecommissionTypeEntryName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Commission Type'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'CommissionType Save Successfully'
                        })
                        this.form.reset();
                    }
                    this.getData();
                })
            },
            getData(){
                axios.get('/commissionTypeEntry').then(res=>{
                     this.commissionTypeData = res.data.data;
               })
            },
            getPaginateList(page = 1){
              axios.get('/commissionTypeEntry?page=' + page)
              .then(response => {
                  this.commissionTypeData = response.data.data;
              });
            },
            changeStatus(commissionTypeEntryId){
                axios.get("commissionTypeEntry/"+commissionTypeEntryId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Status Change Successfully'
                    })
                    this.getData();
                })
            },
            distroy(commissionTypeEntryId){
                axios.delete("commissionTypeEntry/"+commissionTypeEntryId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'CommissionType Delete Successfully'
                    })
                    this.getData();
                })
            },

        }

    }

</script>
