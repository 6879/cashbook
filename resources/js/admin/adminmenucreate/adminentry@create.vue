<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Information Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="adminEntryCreate()">
              <div class="form-group">
                  <label> Name</label>
                  <input v-model="form.name" type="text" name="name" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name" class="form-control">
                  <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input v-model="form.email" type="text" name="email" :class="{ 'is-invalid': form.errors.has('email') }" placeholder="Email" class="form-control">
                  <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                  <label>Phone </label>
                  <input v-model="form.phone" type="text" name="phone"  :class="{ 'is-invalid': form.errors.has('phone') }" placeholder="Phone" class="form-control">
                  <has-error :form="form" field="phone"></has-error>
              </div>

              <div class="form-group">
                  <label>User ID</label>
                  <input disabled v-model="form.userId" type="text" name="userId" :class="{ 'is-invalid': form.errors.has('userId') }" placeholder="User Id" class="form-control">
                  <has-error :form="form" field="userId"></has-error>
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input  v-model="form.password" type="text" name="password" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" class="form-control">
                  <has-error :form="form" field="password"></has-error>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.address" type="text" name="address"  :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Address" class="form-control" style="height:100px" ></textarea>
                  <has-error :form="form" field="address"></has-error>
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
        <h3 style="color:black">Admin Entry List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>User Id</th>
               <th>Password</th>
               <th>Address</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminentry, index) in adminentryshows.data">
                <td>{{ index+1 }}</td>
                <td>{{ adminentry.name }}</td>
                <td>{{ adminentry.email }}</td>
                <td>{{ adminentry.phone }}</td>
                <td>{{ adminentry.userId }}</td>
                <td>{{ adminentry.password }}</td>
                <td>{{ adminentry.address }}</td>
                <td>
                    <router-link :to="`/adminentry@Edit${adminentry.adminId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(adminentry.adminId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>

                </td>
              </tr>
            </tbody>
         </table>
       </div>

       <span class="card_footer">
         <pagination :data="adminentryshows" :limit="limit"  @pagination-change-page="getPaginateList">
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
                form: new Form({
                    name : '',
                    email: '',
                    phone: '',
                    userId: '',
                    password: '',
                    address: '',

                }),
                adminentryshows:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
        this.adminEntryShow();
        this.adminEntryUserId();
        this.getPaginateList();
        },
        methods:{
           adminEntryCreate(){
              this.form.post('/adminEntry').then(res=>{
                  if (res.data.changeeMail){
                      Toast.fire({
                          icon: 'error',
                          title: 'The email has already been taken'
                      })
                  }
                 else {
                   if (res.data.changePhone) {
                     Toast.fire({
                       icon: 'error',
                       title: 'Change Your Admin Phone Number'
                     })
                   }
                   else {
                       Toast.fire({
                         icon: 'success',
                         title: 'Admin Information Entry Successfully'
                       })
                       this.form.reset()
                       this.adminEntryShow();
                       this.adminEntryUserId();
                   }
                }
             })
          },
           adminEntryShow(){
            axios.get('/adminEntry').then(res =>{
               this.adminentryshows = res.data.adminEntry;
            })
          },

          getPaginateList(page = 1){
            axios.get('/adminEntry?page=' + page)
            .then(response => {
               this.adminentryshows = response.data.adminEntry;
            });
          },

          adminEntryUserId(){
            axios.get('/adminEntryUserId').then(res =>{
               this.form.userId = res.data.incrementUserId;
            })
          },

          distroy(adminId){
             axios.delete("adminEntry/"+adminId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Admin Delete Successfully'
                    })
                    this.adminEntryShow();
              })
           },
        }
    }

</script>
