<template id="">
  <span>
    <div class="card p-0 col-10  offset-1">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Setting</h3>
      </div>
      <div class="setting p-md-5 p-3">
        <form  @submit.prevent="profileDateUpdate()">
            <div class="row pb-2">
              <div class="col  pr-0">
                <label>Full Name</label>
              </div>
              <div class="col pl-0">
                <input type="text" v-model="form.name" name="name" class="form-control" >
              </div>
            </div>
            <div class="row pb-2">
              <div class="col  pr-0">
                <label>Email</label>
              </div>
              <div class="col pl-0">
                <input type="text" v-model="form.email"  name="email" class="form-control">
              </div>
            </div>
            <div class="row pb-2">
              <div class="col  pr-0">
                <label>Phone</label>
              </div>
              <div class="col pl-0">
                <input type="text" v-model="form.phone" name="phone" class="form-control">
              </div>
            </div>

            <div class="row pb-2">
              <div class="col  pr-0">
                <label>Address</label>
              </div>
              <div class="col pl-0">
                <input type="text" v-model="form.address" name="address" class="form-control">
              </div>
            </div>
            <div class="mt-3">
              <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </span>
</template>
<script>
    export default {
        data(){
            return {
                form: new Form({
                    name : '',
                    email: '',
                    phone: '',
                    address: '',
                }),
            }
        },
        mounted() {
            this.profileDatashow();
        },
        methods:{
            profileDatashow(){
                axios.get('/settingsProfile').then(res =>{
                    this.form.fill(res.data.settingProfile)
                })
            },

            profileDateUpdate(){
                this.form.post('/settingsProfile').then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Profile  Updated successfully'
                    })

                })
            },

        }
    }
</script>
<style media="screen">
  .setting label{
    font-size:15px;
    margin-top:7px;
  }
</style>
