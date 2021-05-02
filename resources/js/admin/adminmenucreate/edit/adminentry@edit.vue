<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Information Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="update()">
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
                  <input disabled v-model="form.password" type="text" name="password" :class="{ 'is-invalid': form.errors.has('password') }" placeholder="Password" class="form-control">
                  <has-error :form="form" field="password"></has-error>
              </div>
              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.address" type="text" name="address"  :class="{ 'is-invalid': form.errors.has('address') }" placeholder="Address" class="form-control"></textarea>
                  <has-error :form="form" field="address"></has-error>
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

            }
        },
        mounted(){
        this.getData();
        },
        methods:{
            getData(){
                axios.get('/adminEntry/'+this.$route.params.adminId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                    })
            },
            update(){
                this.form.put('/adminEntry/'+this.$route.params.adminId).then(res=>{
                    if (res.data.changeEmail) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Admin Email Address'
                        })
                    }
                    else if (res.data.changePhone) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Admin Phone Number'
                        })
                    }
                    else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Admin Information Update Successfully'
                        })
                        this.$router.push('/adminentry@create')
                    }
                })
              }
        }
    }
</script>

<style media="screen">
    .supplier-border{
      border: 1px solid rgba(0, 0, 0, 0.12);
      padding:20px 15px;
    }
   .btn{
     font-size:17px;
   }
   .text-sm-right{
     padding-top:30px;
   }
  .supplier-entry label{
    margin-right:40px;
  }


</style>
