<template id="">
  <span>
     <div class="card main-card  element-block-example mt-5">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Menu Permission List</h3>
        </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Admin Name</th>
               <th>Admin Type</th>
               <th>Menu Name</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(permissionListShow ,index) in permissionListShows">
                <td>{{ index+1 }}</td>
                <td v-if="permissionListShow.admin_entry_name">{{ permissionListShow.admin_entry_name.name }}</td>
                <td v-else></td>
                <td v-if="permissionListShow.admin_type_name">{{ permissionListShow.admin_type_name.adminTypeName}}</td>
                <td v-else></td>
                <td>
                  <div v-for="permissionMenu in permissionMenuShows" v-if="permissionMenu.adminId == permissionListShow.adminId" class="mr-1 float-left">
                    <router-link :to="`/adminmenu@permission@edit${permissionMenu.adminId}${permissionMenu.menuId}`"  class="btn-hover-shine btn-success">{{  permissionMenu.admin_menu_name.adminMenuName }}</router-link>
                  </div>
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
        data(){
          return{
               permissionListShows:[],
               permissionMenuShows:[],
          }
        },
        mounted(){
            this.permissionNameShow();
            this.permissionMenuShow();
        },
        methods:{
            permissionNameShow(){
              axios.get('/adminMenuPermission/create').then(res =>{
                  this.permissionListShows = res.data.adminMenuPermissionList;
              })
            },
            permissionMenuShow(){
              axios.get('/permissionmenushow').then(res =>{
                  this.permissionMenuShows = res.data.permissionMenuShow;
              })
            },
            distroy(menuPermissionId){
              axios.delete('/adminMenuPermission/'+menuPermissionId).then(res =>{
                  Toast.fire({
                    icon: 'success',
                    title: 'Menu Permission Delete Successfully'
                  })
                  this.permissionNameShow();
              })
            }
        }
    }

</script>

<style media="screen">
a.btn-success {
  text-decoration: none;
  padding: 4px 10px;
  border-radius: 15px;
}
</style>
