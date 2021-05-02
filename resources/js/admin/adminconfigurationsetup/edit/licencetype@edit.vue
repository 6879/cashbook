<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Licence Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="licnceTypeUpdate()">
              <div class="form-group">
                  <label>Licence Type Name</label>
                  <input type="text" v-model="form.licenceTypeName"  name="licenceTypeName" :class="{ 'is-invalid': form.errors.has('licenceTypeName') }" placeholder="Licence Type Name" class="form-control">
                  <has-error :form="form" field="licenceTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Licence Type Status</label>
                 <select v-model="form.licenceTypeStatus" name="licenceTypeStatus" :class="{ 'is-invalid': form.errors.has('licenceTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="licenceTypeStatus"></has-error>
              </div>

             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
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
                    licenceTypeName : '',
                    licenceTypeStatus: '',
                }),
            }
        },
        mounted(){
          this.licenceTypeShow();
        },
        methods:{
          licnceTypeUpdate(){
            this.form.put('/adminLicenceType/'+this.$route.params.licenceTypesId).then(res =>{
                if (res.data.changeLicenceTypeName) {
                    Toast.fire({
                      icon: 'error',
                      title: 'Change Your Licence Type Name'
                    })
                }
                else{
                    Toast.fire({
                      icon: 'success',
                      title: 'Licence Type Update Successfully'
                    })
                    this.$router.push('/licencetype@entry')
                }
            })
          },
          licenceTypeShow(){
            axios.get('/adminLicenceType/'+this.$route.params.licenceTypesId+'/edit').then(res =>{
                this.form.fill(res.data.AdminlicenceTypehow)
            })
          },


      },
  }

</script>
