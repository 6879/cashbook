<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Type Create</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="adminTypeCreate()">
              <div class="form-group">
                 <label>Admin Type Name</label>
                 
                 <input type="text" 
                 v-model="form.adminTypeName" 
                 name="adminTypeName"  
                 placeholder="Admin Type Name" 
                 class="form-control"  
                 :class="{ 'is-invalid': form.errors.has('adminTypeName') }">


                 <has-error :form="form" field="adminTypeName"></has-error>
              </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5" >
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Admin Type Name</th>
               <th>Admin Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr  v-for="(show, index) in adminTypeName.data">
                <td>{{show.adminTypeId}}</td>
                <td>{{show.adminTypeName}}</td>
                  <td>
                      <div v-if="show.adminTypeStatus == 1 ">
                            <button type="button"  @click="changeStatus(show.adminTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                      </div>
                      <div v-else>
                           <button type="button"  @click="changeStatus(show.adminTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                      </div>
                  </td>
                <td>
                  <router-link :to="`/admintype@Edit${show.adminTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button  class="btn btn-hover-shine btn-danger" @click.prevent="distroy(show.adminTypeId)"><i class=" fa fa-trash"></i>Delete</button>
                </td>
             </tr>
            </tbody>
         </table>
       </div>
        <span class="card_footer">
          <pagination :data="adminTypeName" :limit="limit"  @pagination-change-page="getPaginateList">
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
                  adminTypeName: '',
                }),
                adminTypeName:{},
            }

        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
         mounted(){
          this.adminTypeNameShow();
          this.getPaginateList();
        },
        methods:{
          adminTypeCreate(){
              this.form.post('/adminTypeName').then(res =>{
                if (res.data.changeTypeName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Admin Type Name'
                    })
                }
                else {
                    Toast.fire({
                        icon: 'success',
                        title: 'Admin Type Successfully'
                    })
                }

                this.form.reset()
                this.adminTypeNameShow();
             })
           },
           adminTypeNameShow(){
              axios.get('/adminTypeName').then(res =>{
                this.adminTypeName = res.data.adminTypeName;
             })
           },
           getPaginateList(page = 1){
             axios.get('/adminTypeName?page=' + page)
             .then(response => {
                this.adminTypeName = response.data.adminTypeName;
             });
           },
          changeStatus(adminTypeId){
            axios.get("adminTypeName/"+adminTypeId)
              .then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Admin Status Change Successfully'
                  })
                  this.adminTypeNameShow();
              })
            },
            distroy(adminMenuId){
              axios.delete("adminMenu/"+adminMenuId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Admin Menu Title Delete Successfully'
                  })
                this.menuListshow();
              })
            },
            distroy(adminTypeId){
              axios.delete("adminTypeName/"+adminTypeId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Admin Tpye Delete Successfully'
                  })
                  this.adminTypeNameShow();
              })
            }
        },
    }
</script>
