<template>
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bussiness Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="bussinessTypeUpdate()">
              <div class="form-group">
                  <label>Bussiness Type Name</label>
                  <input type="text" v-model="form.bussinessTypeName"  name="bussinessTypeName" :class="{ 'is-invalid': form.errors.has('bussinessTypeName') }" placeholder="Bussiness Type Name" class="form-control">
                  <has-error :form="form" field="bussinessTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Bussiness Type Status</label>
                 <select v-model="form.bussinessTypeStatus" name="bussinessTypeStatus" :class="{ 'is-invalid': form.errors.has('bussinessTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="bussinessTypeStatus"></has-error>
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
              bussinessTypeName : '',
              bussinessTypeStatus: '',
          }),
          bussinessTypeShows:[],
       }
    },
    mounted(){
      this.bussinessTypeShow();
    },
     methods:{
       bussinessTypeShow(){
         axios.get('/adminBussinessType/'+this.$route.params.bussinessTypeId+'/edit').then(res =>{
            this.form.fill(res.data.adminBussinessInfo);
         })
       },
       bussinessTypeUpdate(){
           this.form.put('/adminBussinessType/'+this.$route.params.bussinessTypeId).then(res=>{
               if (res.data.changeBussinessTypeName) {
                   Toast.fire({
                       icon: 'error',
                       title: 'Change Your Bussiness Type Name'
                   })
               }
               else{
                   Toast.fire({
                       icon: 'success',
                       title: 'Bussiness Type Update Successfully'
                   })
                   this.$router.push('/bussinesstype@create')
               }
           })
       },
   },

 }
</script>
