<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Type Update</h3>
      </div>
      <div class="shopemployee-entry">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  shopemployee-border">
          <form  @submit.prevent="employeeTypeUpdate()">
              <div class="form-group">
                 <label>Employee Type Name</label>
                 <input type="text" v-model="form.shopEmployeeTypeName" name="shopEmployeeTypeName"  placeholder="Employee Type Name" class="form-control"  :class="{ 'is-invalid': form.errors.has('shopEmployeeTypeName') }">
                 <has-error :form="form" field="shopEmployeeTypeName"></has-error>
              </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary">Update</button>
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
                  shopEmployeeTypeName: '',
                }),
                employeeTypeLists:{},
            }
        },
        mounted(){
          this.employeeTypeShow()
        },
        methods:{
          employeeTypeShow(){
              axios.get('/shopEmployeeType/'+this.$route.params.shopEmployeeTypeId+'/edit').then(res =>{
                this.form.fill(res.data);
            })
          },
          employeeTypeUpdate(){
            this.form.put('/shopEmployeeType/'+this.$route.params.shopEmployeeTypeId).then(res =>{
                if (res.data.changeName) {
                  Toast.fire({
                      icon: 'error',
                      title: 'Change Your Employee Type Name'
                  })
                }
                else{
                  Toast.fire({
                      icon: 'success',
                      title: 'Shop Employee Type Successfully'
                  })
                  this.$router.push('/shopemployee@typecreate');
                }
            })
          },
       }
    }
</script>
