<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Menu Permission</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
              <div class="form-group">
                 <label>Admin Name</label>
                 <select  v-model="adminId"   class="form_control" @change.prevent="adminTypeShow()">
                       <option value="">Select One</option>
                       <option  v-for="adminNameShow in adminNameShows"  :value="adminNameShow.adminId" v-if="adminNameShow.admin_entry_relation">
                         {{ adminNameShow.admin_entry_relation.name }}
                       </option>
                  </select>
              </div>
              <div class="form-group">
                 <label>Admin Type</label>
                 <select class="form_control" v-model="adminTypeId" @change.prevent="permissionMenuSubMenuStatus()">
                      <option value="">Select One</option>
                       <option v-for="adminTypeShow in adminTypeShows"   :value="adminTypeShow.adminTypeId" v-if="adminTypeShow.admin_type_relation">
                         {{ adminTypeShow.admin_type_relation.adminTypeName }}
                       </option>
                  </select>
              </div>
        </div>
     </div>
     </div>



      <div class="container">
        <div class="accordion" id="accordionExample">
          <div class="card" v-for="adminMenuTitleShow in adminMenuTitleShows">

             <div class="card-header collapsed" data-toggle="collapse" :data-target="`#collapseOne${adminMenuTitleShow.adminMenuTitleId}`" aria-expanded="false" >
                <span class="title">{{ adminMenuTitleShow.adminMenuTitleName }}</span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
              </div>

              <!-- Menu Name + SubMenu Name -->
              <div :id="`collapseOne${adminMenuListShow.adminMenuTitleId}`"  class="collapse"  data-parent="#accordionExample" v-for="(adminMenuListShow,index) in adminMenuListShows" v-if="adminMenuListShow.adminMenuTitleId == adminMenuTitleShow.adminMenuTitleId" >
                <div class="permission-card-body">
                   <div class="accordion" id="accordionSecond" v-if="adminMenuListShow.adminSubMenuStatus == 1">
                      <div class="menuCollapsed collapsed " data-toggle="collapse" :data-target="`#collapseTwo${adminMenuListShow.adminMenuId}`" aria-expanded="false" >
                         <h6 class="title">{{ adminMenuListShow.adminMenuName }}</h6>
                         <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div class="table-responsive">
                       <table class="table table-hover table-bordered mb-0">
                          <tr colspan="3" :id="`collapseTwo${adminSubMenuShow.adminMenuId}`" class="collapse p-0" data-parent="#accordionSecond"  v-for="(adminSubMenuShow, index) in adminSubMenuShows" v-if="adminSubMenuShow.adminMenuId == adminMenuListShow.adminMenuId">
                            <td class="p-0">
                              <table class="table table-hover table-bordered mb-0">
                                  <tr v-if="index+1 == 1">
                                    <th> Module </th>
                                    <th> Full Access </th>
                                    <th> View </th>
                                    <th> Add </th>
                                    <th> Edit </th>
                                  </tr>
                                  <tr id="width">
                                      <td>{{ adminSubMenuShow.adminSubMenuName }}</td>
                                      <td>
                                          <input type="checkbox" v-model="fullAccess"  :value="adminSubMenuShow.adminSubMenuId">
                                          <span v-for="subMenuPermissionid in subMenuPermissionids" v-if="subMenuPermissionid.subMenuId == adminSubMenuShow.adminSubMenuId">
                                               <span v-if="subMenuPermissionid.fullAccess == 1" @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                               <span v-if="subMenuPermissionid.fullAccess == 0" @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                           </span>
                                     </td>
                                      <td>
                                          <input type="checkbox" v-model="viewAccess"  :value="adminSubMenuShow.adminSubMenuId">
                                          <span v-for="subMenuPermissionid in subMenuPermissionids" v-if="subMenuPermissionid.subMenuId == adminSubMenuShow.adminSubMenuId">
                                              <span v-if="subMenuPermissionid.viewAccess == 1"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                              <span v-if="subMenuPermissionid.viewAccess == 0"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                           </span>
                                      </td>
                                      <td>
                                           <input type="checkbox" v-model="addAccess"  :value="adminSubMenuShow.adminSubMenuId">
                                           <span v-for="subMenuPermissionid in subMenuPermissionids" v-if="subMenuPermissionid.subMenuId == adminSubMenuShow.adminSubMenuId">
                                              <span v-if="subMenuPermissionid.addAccess == 1"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                              <span v-if="subMenuPermissionid.addAccess == 0"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                           </span>
                                      </td>
                                      <td>
                                          <input type="checkbox" v-model="editAccess"  :value="adminSubMenuShow.adminSubMenuId">
                                          <span v-for="subMenuPermissionid in subMenuPermissionids" v-if="subMenuPermissionid.subMenuId == adminSubMenuShow.adminSubMenuId">
                                            <span v-if="subMenuPermissionid.editAccess == 1"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                            <span v-if="subMenuPermissionid.editAccess == 0"  @click.prevent="adminSubMenuStatusChange(adminSubMenuShow.adminSubMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                          </span>
                                      </td>
                                  </tr>
                               </table>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div v-else>
                         <table class="table table-hover table-bordered mb-0">
                            <tr id="width">
                                <td colspan="5">
                                    <h6 class="title ml">{{ adminMenuListShow.adminMenuName }}</h6>
                                </td>
                                <td>
                                  <input type="checkbox" v-model="adminMenuId"  :value="adminMenuListShow.adminMenuId">
                                  <span v-for="menuPermissionid in menuPermissionids" v-if="menuPermissionid.menuId == adminMenuListShow.adminMenuId">
                                      <span v-if="menuPermissionid.permissionStatus == 1" @click.prevent="adminMenuStatusChange(adminMenuListShow.adminMenuId)" class="badge badge-primary btn-hover-shine menuActive"> Active </span>
                                      <span v-else  @click.prevent="adminMenuStatusChange(adminMenuListShow.adminMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                  </span>
                               </td>
                            </tr>
                         </table>
                      </div>
                  </div>
               </div>
             </div>
          </div>
        </div>
      <div class="card">
        <div class="p-3">
          <button  @click.prevent="adminMenuPermissionCreate()" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
        </div>
      </div>
  </span>
</template>

<script>
    export default {
        data(){
            return{
                adminId:'',
                adminNameShows:[],
                adminTypeShows:[],
                adminMenuTitleShows:[],
                adminMenuListShows:[],
                adminSubMenuShows:[],
                // Value Catch
                adminTypeId:[],
                adminMenuId:[],
                fullAccess:[],
                viewAccess:[],
                addAccess:[],
                editAccess:[],
                // Menu Submenu Status Variable
                menuPermissionids:[],
                subMenuPermissionids:[],

            }
        },
        mounted(){
            this.adminSetupNameShow()
            this.adminTitleNameShow()
            this.adminMenulistShow()
            this.adminSubMenuShow()
        },
        methods:{
            adminSetupNameShow(){
                axios.get('/adminMenuPermission').then(res =>{
                    this.adminNameShows =  res.data.adminSetup;
                })
            },
            adminTypeShow(){
                axios.get('/adminTypeShow/'+this.adminId).then(res =>{
                    this.adminTypeShows  = res.data.adminTypeName;
                })
            },
            adminTitleNameShow(){
                axios.get('/adminMenuTitle').then(res =>{
                    this.adminMenuTitleShows = res.data.adminMenuTitle;
                })
            },
            adminMenulistShow(){
              axios.get('/adminSubMenu/create').then(res =>{
                this.adminMenuListShows = res.data.adminmenulist;
              })
            },
            adminSubMenuShow(){
                axios.get('/adminSubMenuShow').then(res =>{
                    this.adminSubMenuShows = res.data.subMenuList;
                })
            },
            adminMenuPermissionCreate(){
                axios.post('/adminMenuPermission',{
                    adminId : this.adminId,
                    adminTypeId : this.adminTypeId,
                    adminMenuId : this.adminMenuId,
                    fullAccess : this.fullAccess,
                    viewAccess : this.viewAccess,
                    addAccess : this.addAccess,
                    editAccess : this.editAccess,
                })
                  .then(res =>{
                      this.adminId = [],
                          this.adminTypeId = [],
                          this.adminMenuId = [],
                          this.fullAccess = [],
                          this.viewAccess = [],
                          this.addAccess = [],
                          this.editAccess = [],
                          Toast.fire({
                              icon: 'success',
                              title: 'Menu Permission Successfully'
                          })
                  })
                  .catch(error =>{
                    Toast.fire({
                        icon: 'error',
                        title: 'Something Worng'
                    })
               })
            },
            permissionMenuSubMenuStatus(){
                axios.get('/adminPermissionMenus/'+this.adminId+'/'+this.adminTypeId).then(res =>{
                    this.menuPermissionids =  res.data.menuPermissionid;
                })
                axios.get('/adminPermissionSubMenus/'+this.adminId+'/'+this.adminTypeId).then(res =>{
                    this.subMenuPermissionids =  res.data.subMenuPermissionid;
                })

            },
            adminMenuStatusChange(adminMenuStatusId){
                axios.get('/adminMenuPermissionChange/'+this.adminId+'/'+this.adminTypeId+'/'+adminMenuStatusId).then(res =>{
                    if (res.data.Unactive) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Menu Permission Unactive'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Menu Permission Active'
                        })
                    }
                })
                this.permissionMenuSubMenuStatus();
            },
            adminSubMenuStatusChange(adminSubMenuStatusId){
                axios.get('/adminSubMenuPermissionChange/'+this.adminId+'/'+this.adminTypeId+'/'+adminSubMenuStatusId).then(res =>{
                    if (res.data.Unactive) {
                        Toast.fire({
                            icon: 'success',
                            title: 'SubMenu Permission Unactive'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'SubMenu Permission Active'
                        })
                    }
                })
                this.permissionMenuSubMenuStatus();
            },
        }
    }
</script>
