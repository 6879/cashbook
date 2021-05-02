<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Setup</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="adminSetup()">

              <div class="form-group">
                 <label>Admin Name</label>
                  <select class="form-control"  v-model="form.adminId">
                    <option value="">Select One</option>
                    <option v-for="show in  adminshows"  :value="show.adminId">{{show.name}}</option>
                  </select>
              </div>

              <div class="form-group">
                 <label>Admin Type</label>
                  <select class="form-control"  v-model="form.adminTypeId">
                      <option value="">Select One</option>
                      <option v-for="view in  admintypeshows"  :value="view.adminTypeId">{{view.adminTypeName}}</option>
                  </select>
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
        <h3 style="color:black">Admin Setup List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Admin Name</th>
               <th>Admin Type</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminsetup, index) in adminsetupshows.data">
                <td>{{ index+1 }}</td>
                <td v-if="adminsetup.admin_entry_relation">{{ adminsetup.admin_entry_relation.name }}</td>
                <td v-else></td>
                <td v-if="adminsetup.admin_type_relation">{{ adminsetup.admin_type_relation.adminTypeName }}</td>
                <td v-else></td>
                <td>
                    <router-link  class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button  class="btn btn-hover-shine btn-danger" @click="distroy(adminsetup.adminSetupId)"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>

            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="adminsetupshows" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>
<script>
  export default {
        data () {
            return {
                // Create a new form instance
                form: new Form({
                    adminMenuId : '',
                    adminSubMenuName: '',
                    adminSubMenuUrl: '',
                    adminSubMenuePosition: '',

                }),
                adminshows:[],
                admintypeshows:[],
                adminsetupshows:{},
            }

        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
          this.adminshow();
          this.adminsetupshow();
          this.admintypeshow();
          this.getPaginateList();
        },
        methods:{
          adminSetup(){
              this.form.post('/adminSetup').then(res=>{
                if (res.data.changeAdminType){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Admin Setup'
                    })
                }
                else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Admin Setup Successfully'
                    })
                    this.form.reset()
                    this.adminsetupshow();
                }
              })
          },
          adminshow(){
            axios.get('/adminSetup/create').then(res =>{
               this.adminshows = res.data.adminEntry;
            })
          },
           admintypeshow(){
            axios.get('/admintypename').then(res =>{
                this.admintypeshows = res.data.adminTypeName;
            })
          },
          adminsetupshow(){
            axios.get('/adminSetup').then(res =>{
               this.adminsetupshows = res.data.adminSetup;
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminSetup?page=' + page)
            .then(response => {
               this.adminsetupshows = response.data.adminSetup;
            });
          },
          distroy(adminSetupId){
            axios.delete("adminSetup/"+adminSetupId).then(res=>{
                Toast.fire({
                    icon: 'success',
                    title: 'Delete Successfully'
                })
                  this.adminshow();
                  this.adminsetupshow();
             })
          },
        }
    }
</script>
