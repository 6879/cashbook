<template id="">
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/adminmenu@permissionlist">Menu Permission List</router-link></li>
      </ol>
    </nav>
    <div class="card">
       <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Menu Permission Information</h3>
       </div>
        <div class="supplier-entry py-4 px-2">
          <form>
            <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
               <div class="form-group">
                  <label>Admin Name</label>
                  <input type="text"  id="adminId"    class="form-control">

               </div>
              <div class="form-group">
                <label>Admin Type Name</label>
                <input type="text"   id="adminTypeId"  class="form-control">

              </div>
              <div class="form-group">
                <label>Admin Menu Name</label>
                <input type="text"   id="adminMenuId"  class="form-control">
              </div>
            </div>
         </form>
       </div>
        <div class="my-3 px-3">
            <div class="table-responsive bg-white">
               <table class="table table-hover table-bordered mb-0">
                   <tr>
                     <th> Module </th>
                     <th> Full Access </th>
                     <th> View </th>
                     <th> Add </th>
                     <th> Edit </th>
                 </tr>
                 <tbody>
                     <tr v-for="subMenuShow in subMenuShowLists" >
                         <td>{{ subMenuShow.admin_sub_name.adminSubMenuName }}</td>
                         <td>
                            <span v-if="subMenuShow.fullAccess == 1" class=" btn-hover-shine btn-success">
                                Active
                            </span>
                         </td>
                         <td>
                           <span v-if="subMenuShow.viewAccess == 1" class=" btn-hover-shine btn-success">
                               Active
                           </span>
                         </td>
                         <td>
                           <span v-if="subMenuShow.addAccess == 1" class=" btn-hover-shine btn-success">
                               Active
                           </span>
                         </td>
                         <td>
                           <span v-if="subMenuShow.editAccess == 1" class=" btn-hover-shine btn-success">
                               Active
                           </span>
                         </td>
                     </tr>
                    <tr v-for="subMenuAllShow in subMenuAllShows">
                      {{ subMenuAllShow.adminSubMenuName }}
                    </tr>
               </tbody>
             </table>
           </div>
        </div>
    </div>
  </span>
</template>

<script>
    export default {
      data(){
        return {
             fullAccess:[],
             viewAccess:[],
             addAccess:[],
             editAccess:[],
             subMenuAllShows:[],
             subMenuShowLists:[],
          }
       },
        mounted(){
          this.adminMenuEditInfo()
          this.adminSubmenuInfo()
        },
        methods:{
         adminMenuEditInfo(){
             axios.get('/adminMenuShow/'+this.$route.params.adminId+'/'+this.$route.params.menuId)
             .then(res =>{
                 $.each(res.data.menuShows, function(key,value) {
                      $('#adminId').val(value.admin_entry_name.name);
                      $('#adminTypeId').val(value.admin_type_name.adminTypeName);
                      $('#adminMenuId').val(value.admin_menu_name.adminMenuName);
                  });
             });
         },
         adminSubmenuInfo(){
           axios.get('/adminSingleSubMenuShow/'+this.$route.params.adminId+'/'+this.$route.params.menuId)
           .then(res =>{
                this.subMenuShowLists = res.data.singleSubMenuList;
           });
         },

     }
  }
</script>

<style media="screen">
  span.btn-hover-shine.btn-success {
    padding: 6px 11px;
    border-radius: 3px;
  }
  li.breadcrumb-item {
      font-size: 17px;
  }
</style>
