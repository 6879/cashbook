<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Licence Type Create </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="licnceTypeCreate()">
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

  <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Licence Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Licence Type Name</th>
               <th>Licence Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(licenceTypeShow, index) in licenceTypeShows.data">
                <td>{{ index+1 }}</td>
                <td>{{ licenceTypeShow.licenceTypeName	}}</td>
                <td>
                    <div v-if="licenceTypeShow.licenceTypeStatus == 1">
                      <button type="button"  @click="changeStatus(licenceTypeShow.licenceTypesId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(licenceTypeShow.licenceTypesId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                    <router-link :to="`/licencetype@edit${licenceTypeShow.licenceTypesId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(licenceTypeShow.licenceTypesId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                 </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="licenceTypeShows" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    licenceTypeName : '',
                    licenceTypeStatus: '',
                }),
                licenceTypeShows:[],
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
          this.licenceTypeShow();
          this.getPaginateList();
        },
        methods:{
          licnceTypeCreate(){
            this.form.post('/adminLicenceType').then(res =>{
                if (res.data.changeLicenceTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Please Change Licence Type Name'
                    })
                }
                else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Licence Type Create Successfully'
                    })
                    this.form.reset();
                    this.licenceTypeShow();
                }
            })
          },
          licenceTypeShow(){
            axios.get('/adminLicenceType').then(res =>{
                this.licenceTypeShows = res.data.AdminlicenceType
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminLicenceType?page=' + page)
            .then(response => {
              this.licenceTypeShows = response.data.AdminlicenceType;
            });
          },
          changeStatus(licenceTypesId){
           axios.get('/adminLicenceType/'+licenceTypesId).then(res =>{
               Toast.fire({
                 icon: 'success',
                 title: 'Licence Type Status Change Successfully'
               })
               this.licenceTypeShow();
           })
         },
         distroy(licenceTypesId){
           axios.delete('/adminLicenceType/'+licenceTypesId).then(res =>{
              this.licenceTypeShow();
           })
         }

      },
  }

</script>
