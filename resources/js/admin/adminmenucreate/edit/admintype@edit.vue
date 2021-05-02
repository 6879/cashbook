<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="adminTypeUpdate()">
              <div class="form-group">
                 <label>Admin Type Name</label>
                 <input type="text" v-model="form.adminTypeName" name="adminTypeName"  placeholder="Admin Type Name" class="form-control"  :class="{ 'is-invalid': form.errors.has('adminTypeName') }">
                 <has-error :form="form" field="adminTypeName"></has-error>
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
                  adminTypeName: '',
                }),
                adminTypeName:[],
            }
        },
         mounted(){
            this.getData();
        },
        methods:{
            getData(){
                axios.get('/adminTypeName/'+this.$route.params.adminTypeId+'/edit')
                .then(res=>{
                    this.form.fill(res.data.data)
                })
            },
            adminTypeUpdate(){
                this.form.put('/adminTypeName/'+this.$route.params.adminTypeId)
                .then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Admin Menu Title Update Successfully'
                    })
                    this.$router.push('/admintype@create')
                })
            }
        }
    }
</script>
