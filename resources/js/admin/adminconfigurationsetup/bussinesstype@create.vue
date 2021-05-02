<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bussiness Type Create</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="bussinessTypeCreate()">
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
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

  <div class="card main-card  element-block-example mt-5">
    <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Bussiness Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Bussiness Type Name</th>
               <th>Bussiness Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(bussinessTypeShow, index) in bussinessTypeShows.data">
                <td>{{ index+1 }}</td>
                <td>{{ bussinessTypeShow.bussinessTypeName	 }}</td>
                <td>
                    <div v-if="bussinessTypeShow.bussinessTypeStatus == 1">
                      <button type="button"  @click="changeStatus(bussinessTypeShow.bussinessTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(bussinessTypeShow.bussinessTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/bussinesstype@edit${bussinessTypeShow.bussinessTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(bussinessTypeShow.bussinessTypeId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                 </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="bussinessTypeShows" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
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
                bussinessTypeShows:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
           this.bussinessTypeShow();
           this.getPaginateList();
        },
        methods:{
          bussinessTypeCreate(){
            this.form.post('/adminBussinessType').then(res =>{
                if (res.data.changebussinessTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Bussiness Type Name'
                    })
                }
                else{
                Toast.fire({
                  icon: 'success',
                  title: 'Bussiness Type Create Successfully'
                })
                    this.form.reset();
                }
                this.bussinessTypeShow();
            })
          },
          bussinessTypeShow(){
            axios.get('/adminBussinessType').then(res =>{
                this.bussinessTypeShows = res.data.AdminBussinessTypeShow
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminBussinessType?page=' + page)
            .then(response => {
                this.bussinessTypeShows = response.data.AdminBussinessTypeShow
            });
          },
          changeStatus(bussinessTypeId){
           axios.get('/adminBussinessType/'+bussinessTypeId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Bussiness Type Status Change Successfully'
               })
               this.bussinessTypeShow();
           })
         },
         distroy(bussinessTypeId){
           axios.delete('/adminBussinessType/'+bussinessTypeId).then(res =>{
              this.bussinessTypeShow();
           })
         }

      },
  }

</script>
