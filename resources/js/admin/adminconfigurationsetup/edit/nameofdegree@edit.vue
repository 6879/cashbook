<template>
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Name Of Degree Update</h3>
      </div>
      <div class="row p-5">
          <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12">
            <div class="border active p-3">
             <form  @submit.prevent="degreeUpdata()">
                 <div class="form-row pt-2">
                   <div class="col-sm-4 col-12">
                     <label class="p-0 ">Name Of Degree</label>
                   </div>
                   <div class="col-sm-8 col-12">
                     <input type="text" v-model="form.nameOfDegree" name="nameOfDegree" class="form-control" placeholder="Name Of Degree">
                   </div>
                   <input type="hidden" v-model="form.nameOfDegreeId"  name="nameOfDegreeId" class="form-control" placeholder="Name Of Degree">
                 </div>
                 <div class="form-row pt-2">
                   <div class="col-sm-4 col-12">
                     <label class="p-0 ">Status</label>
                   </div>
                     <div class="col-sm-8 col-12">
                       <select class="form-control" v-model="form.degreeStatus" name="degreeStatus">
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
                  nameOfDegree: '',
                  degreeStatus: '',
                  nameOfDegreeId: '',
              }),
          }
      },
      mounted(){
        this.getData();
      },
      methods:{
        getData(){
          axios.get('/nameOfDegreeEditData/'+this.$route.params.nameOfDegreeId).then(res=>{
                this.form.fill(res.data.nameOfDegree);
                this.nameOfDegreeId = this.$route.params.nameOfDegreeId
          })
        },
        degreeUpdata(){
          this.form.post('/nameOfDegreeUpdate').then(res =>{
              if (res.data.changeNameDegree){
                  Toast.fire({
                      icon: 'error',
                      title: 'Change Your Name Of Degree'
                  })
              }
              else{
                Toast.fire({
                  icon: 'success',
                  title: 'Name Of Degree Update Successfully '
                })
                this.$router.push('/educationinfo@entry')
              }
          })
        },
    }
}
</script>
