<template>
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Name Of Institute Update</h3>
      </div>
      <div class="row p-5">
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12">
            <div class="border active p-3">
             <form  @submit.prevent="instituteUpdata()">
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0">Name Of Institute</label>
                  </div>
                  <div class="col-sm-8 col-12">
                    <input type="text" v-model="form.nameOfInstitute" name="nameOfInstitute" class="form-control" placeholder="Name Of Institute">
                  </div>
                </div>
                <div class="form-row pt-2">
                  <div class="col-sm-4 col-12">
                    <label class="p-0 ">Status</label>
                  </div>
                    <div class="col-sm-8 col-12">
                      <select class="form-control" v-model="form.instituteStatus" name="instituteStatus">
                        <option value="">Select One</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                </div>
                <div class="text-right pt-3">
                  <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Update</button>
               </div>
             </form>
            </div>
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
                  nameOfInstitute: '',
                  instituteStatus: '',
              }),
          }
      },
      mounted(){
        this.getData();
      },
      methods:{
        getData(){
          axios.get('/adminEducationEntry/'+this.$route.params.nameOfInstituteId+'/edit').then(res=>{
                this.form.fill(res.data.nameOfInstitute)
          })
        },
        instituteUpdata(){
          this.form.put('/adminEducationEntry/'+this.$route.params.nameOfInstituteId).then(res =>{
              if (res.data.changeNameInstitute){
                  Toast.fire({
                      icon: 'error',
                      title: 'Change Your Name Of Institute'
                  })
              }
              else{
                Toast.fire({
                  icon: 'success',
                  title: 'Name Of Institute Update Successfully '
                })
                this.$router.push('/educationinfo@entry')
              }
          })
        },
    }
}
</script>
