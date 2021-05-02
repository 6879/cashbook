<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Unit Name Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="uniteEntryCreate()">
              <div class="form-group">
                  <label> Unit Name</label>
                  <input v-model="form.uniteEntryName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('uniteEntryName') }" placeholder="Unite Name" class="form-control">
                  <has-error :form="form" field="uniteEntryName"></has-error>
              </div>

                <div class="form-group">
                 <label>Unit Status</label>
                 <select v-model="form.uniteEntryStatus" name="uniteEntryStatus" :class="{ 'is-invalid': form.errors.has('uniteEntryStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="uniteEntryStatus"></has-error>
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
        <h3 style="color:black">Unit Name</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Unit Name</th>
               <th>Unit Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(uniteData, index) in uniteEntryData">
                <td>{{ index+1 }}</td>
                <td>{{ uniteData.uniteEntryName }}</td>
                <td>
                    <div v-if="uniteData.uniteEntryStatus == 1">
                      <button type="button"  @click="changeStatus(uniteData.uniteEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(uniteData.uniteEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                     <router-link :to="`/unite@entryEdit${uniteData.uniteEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(uniteData.uniteEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>

              </tr>

            </tbody>
         </table>
       </div>
     </div>
  </span>
</template>
<script>
    export default {
        data () {
            return {
                form: new Form({
                    uniteEntryName : '',
                    uniteEntryStatus: '',
                }),
                uniteEntryData:'',

            }
        },
        mounted(){
            this.getData();
        },


        methods:{
            uniteEntryCreate(){
                this.form.post('/uniteEntry').then(res=>{
                    if (res.data.changeUniteEntryName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change Unite Name'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Unite Name Entry Successfully'
                        })
                        this.form.reset();
                        this.getData();
                    }
                })
            },

            getData(){
                axios.get('/uniteEntry').then(res =>{
                    this.uniteEntryData = res.data.data;
                })
            },

            changeStatus(uniteEntryId){
                axios.get("uniteEntry/"+uniteEntryId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Unite Status Change Successfully'
                        })
                        this.getData();
                        // console.log(res.data)
                    })
              },
            distroy(uniteEntryId){
              axios.delete("uniteEntry/"+uniteEntryId)
                  .then(res=>{
                      Toast.fire({
                          icon: 'success',
                          title: 'Unite Name Delete Successfully'
                      })
                      this.getData();
                  })
            },
        }
    }

</script>
