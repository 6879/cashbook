<template id="">
  <span>
    <div class="card p-0 col-10 col-sm-8 col-md-7  offset-md-3 offset-sm-2 offset-1">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Password Change</h3>
      </div>
      <div class="change-password p-md-5 p-3 ">
        <form @submit.prevent="passwordChange()">

            <div class="form-group">
              <label>Old Password</label>
                  <input v-model="form.oldPassword" type="password" :class="{ 'is-invalid': form.errors.has('oldPassword') }" placeholder="Enter New Password" class="form-control">
                  <has-error :form="form" field="oldPassword"></has-error>
            </div>

              <div class="form-group">
              <label>New Password</label>
                  <input v-model="form.newPassword" type="password" :class="{ 'is-invalid': form.errors.has('newPassword') }" placeholder="Enter Old Password" class="form-control">
                  <has-error :form="form" field="newPassword"></has-error>
            </div>

                  <div class="form-group">
               <label>Confirm Password</label>
                  <input v-model="form.confirmPassword" type="password" :class="{ 'is-invalid': form.errors.has('confirmPassword') }" placeholder="Enter Confirm Password" class="form-control">
                  <has-error :form="form" field="confirmPassword"></has-error>
            </div>
            <div class="">
              <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update Password</button>
            </div>
        </form>
      </div>
    </div>
  </span>
</template>


<script>
    export default {
        data(){
            return{
                form: new Form({
                    oldPassword: '',
                    newPassword: '',
                    confirmPassword: '',
                })

            }
        },
        methods: {

            passwordChange(){
                this.form.post('/changePassword').then(res=>{
                    if (res.data.success){
                       Toast.fire({
                              icon: 'success',
                              title: 'Password Change Successfully'
                          })
                          this.form.reset()
                     }

                    else if (res.data.nomatch) {
                        Toast.fire({
                          icon: 'error',
                          title: 'New Password and Confirm Password Not Match'
                        })
                    }

                    else if (res.data.oldPassword){
                        Toast.fire({
                            icon: 'error',
                            title: 'Old Password Not Match'
                        })

                    }

                })
            },


        }

    }
</script>



<style media="screen">
  .change-password label{
    font-size:17px;
  }
</style>
