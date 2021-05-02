<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Type Entry</h3>
      </div>
      <div class="shopemployee-entry">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  shopemployee-border">
          <form  @submit.prevent="employeeTypeCreate()">
              <div class="form-group">
                 <label>Employee Type Name</label>
                 <input type="text" v-model="form.shopEmployeeTypeName" name="shopEmployeeTypeName"  placeholder="Employee Type Name" class="form-control"  :class="{ 'is-invalid': form.errors.has('shopEmployeeTypeName') }">
                 <has-error :form="form" field="shopEmployeeTypeName"></has-error>
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
        <h3 style="color:black">Employee Type List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Employee Type Name</th>
               <th>Employee Type Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr  v-for="(employeeTypeList, index) in employeeTypeLists.data">
                <td>{{ index+1 }}</td>
                <td>{{employeeTypeList.shopEmployeeTypeName}}</td>
                <td>
                    <div v-if="employeeTypeList.shopEmployeeTypeStatus == 1 ">
                          <button type="button"  @click="changeStatus(employeeTypeList.shopEmployeeTypeId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                         <button type="button"  @click="changeStatus(employeeTypeList.shopEmployeeTypeId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                 </td>
                 <td>
                    <router-link :to="`/shopemployee@typeEdit${employeeTypeList.shopEmployeeTypeId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button  class="btn btn-hover-shine btn-danger" @click.prevent="distroy(employeeTypeList.shopEmployeeTypeId)"><i class=" fa fa-trash"></i>Delete</button>
                 </td>
             </tr>
            </tbody>
          </table>
        </div>
        <span class="card_footer">
          <pagination :data="employeeTypeLists" @pagination-change-page="getPaginateList">
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
                  shopEmployeeTypeName: '',
                }),
                employeeTypeLists:{},
            }
        },
         mounted(){
          this.employeeTypeList();
          this.getPaginateList();
        },
        methods:{
          employeeTypeCreate(){
              this.form.post('/shopEmployeeType').then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Shop Employee Type Successfully'
                  })
                this.form.reset()
                this.employeeTypeList();
            })
          },
           employeeTypeList(){
              axios.get('/shopEmployeeType').then(res =>{
                this.employeeTypeLists = res.data.employeeTypeList;
             })
          },
          getPaginateList(page = 1){
            axios.get('/shopEmployeeType?page=' + page)
            .then(response => {
              this.employeeTypeLists = response.data.employeeTypeList;
            });
          },
          changeStatus(shopEmployeeTypeId){
            axios.get("shopEmployeeType/"+shopEmployeeTypeId)
              .then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Employee Type Status Change Successfully'
                  })
                  this.employeeTypeList();
              })
          },
          distroy(shopEmployeeTypeId){
              axios.delete("shopEmployeeType/"+shopEmployeeTypeId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Employee Type Delete Successfully'
                  })
                  this.employeeTypeList();
              })
           },
       }
    }
</script>
