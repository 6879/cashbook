<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Menu Permission</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
              <div class="form-group">
                 <label>Employee Name</label>
                 <select  class="form-control" v-model="employeeEntryId"  @change.prevent="selectShopEmployeeEntryId()">
                       <option value="">Select One</option>
                       <option  v-for="shopEmployeeEntryList in shopEmployeeEntryLists"  :value="shopEmployeeEntryList.shopEmployeeEntryId" >
                         {{ shopEmployeeEntryList.fullName }}
                       </option>
                  </select>
              </div>

              <div class="form-group">
                 <label>Employee Type</label>
                 <select class="form-control" v-model="employeeTypeId" @change.prevent="shopMenuPermissionShow()">
                      <option value="">Select One</option>
                      <option :value="shopEmployeeTypeName.employeeTypeId" v-if="shopEmployeeTypeName.shop_employee_types">{{ shopEmployeeTypeName.shop_employee_types.shopEmployeeTypeName  }}</option>
                  </select>
              </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="accordion" id="accordionExample">
          <div class="card" v-for="shopMenuTittleShow in shopMenuTittleShows">
             <div class="card-header collapsed" data-toggle="collapse" :data-target="`#collapseOne${shopMenuTittleShow.adminMenuTitleId}`" aria-expanded="false" >
                <span class="title">{{ shopMenuTittleShow.adminMenuTitleName }}</span>
                <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
              </div>

              <!-- Menu Name + SubMenu Name -->
              <div :id="`collapseOne${shopMenuShow.adminMenuTitleId}`"  class="collapse"  data-parent="#accordionExample" v-for="(shopMenuShow,index) in shopMenuShows" v-if="shopMenuShow.adminMenuTitleId == shopMenuTittleShow.adminMenuTitleId" >
                <div class="permission-card-body">
                   <div class="accordion" id="accordionSecond" v-if="shopMenuShow.adminSubMenuStatus == 1">
                      <div class="menuCollapsed collapsed " data-toggle="collapse" :data-target="`#collapseTwo${shopMenuShow.adminMenuId}`" aria-expanded="false" >
                         <h6 class="title">{{ shopMenuShow.adminMenuName }}</h6>
                         <span class="accicon"><i class="fas fa-angle-down rotate-icon"></i></span>
                      </div>
                      <div class="table-responsive">
                       <table class="table table-hover table-bordered mb-0">
                          <tr colspan="3" :id="`collapseTwo${shopSubMenuShow.adminMenuId}`" class="collapse p-0" data-parent="#accordionSecond"  v-for="(shopSubMenuShow, index) in shopSubMenuShows" v-if="shopSubMenuShow.adminMenuId == shopMenuShow.adminMenuId">
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
                                      <td>{{ shopSubMenuShow.adminSubMenuName }}</td>
                                      <td>
                                          <input type="checkbox" v-model="fullAccess"  :value="shopSubMenuShow.adminSubMenuId">
                                          <span v-for="shopSubMenuPermissionid in shopSubMenuPermissionids" v-if="shopSubMenuPermissionid.subMenuId == shopSubMenuShow.adminSubMenuId">
                                                <span v-if="shopSubMenuPermissionid.fullAccess == 1" @click.prevent="shopSubMenuStatusDeactive(shopSubMenuPermissionid.subMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                                <span v-if="shopSubMenuPermissionid.fullAccess == 0" @click.prevent="shopSubMenuStatusActiveFullAccess(shopSubMenuPermissionid.subMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                           </span>
                                     </td>
                                      <td>
                                          <input type="checkbox" v-model="viewAccess"  :value="shopSubMenuShow.adminSubMenuId">
                                          <span v-for="shopSubMenuPermissionid in shopSubMenuPermissionids" v-if="shopSubMenuPermissionid.subMenuId == shopSubMenuShow.adminSubMenuId">
                                                <span v-if="shopSubMenuPermissionid.viewAccess == 1" @click.prevent="shopSubMenuStatusDeactive(shopSubMenuPermissionid.subMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                                <span v-if="shopSubMenuPermissionid.viewAccess == 0" @click.prevent="shopSubMenuStatusActiveViewAccess(shopSubMenuPermissionid.subMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                           </span>

                                      </td>
                                      <td>
                                           <input type="checkbox" v-model="addAccess"  :value="shopSubMenuShow.adminSubMenuId">
                                           <span v-for="shopSubMenuPermissionid in shopSubMenuPermissionids" v-if="shopSubMenuPermissionid.subMenuId == shopSubMenuShow.adminSubMenuId">
                                                 <span v-if="shopSubMenuPermissionid.addAccess == 1" @click.prevent="shopSubMenuStatusDeactive(shopSubMenuPermissionid.subMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                                 <span v-if="shopSubMenuPermissionid.addAccess == 0" @click.prevent="shopSubMenuStatusActiveAddAccess(shopSubMenuPermissionid.subMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                            </span>
                                      </td>
                                      <td>
                                          <input type="checkbox" v-model="editAccess"  :value="shopSubMenuShow.adminSubMenuId">
                                          <span v-for="shopSubMenuPermissionid in shopSubMenuPermissionids" v-if="shopSubMenuPermissionid.subMenuId == shopSubMenuShow.adminSubMenuId">
                                                <span v-if="shopSubMenuPermissionid.editAccess == 1" @click.prevent="shopSubMenuStatusDeactive(shopSubMenuPermissionid.subMenuId)" class="badge badge-primary btn-hover-shine subMenuActive"> Active </span>
                                                <span v-if="shopSubMenuPermissionid.editAccess == 0" @click.prevent="shopSubMenuStatusActiveEditAccess(shopSubMenuPermissionid.subMenuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
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
                                    <h6 class="title ml">{{ shopMenuShow.adminMenuName }}</h6>
                                </td>
                                <td>
                                  <input type="checkbox" v-model="shopMenuId"  :value="shopMenuShow.adminMenuId">
                                  <span v-for="shopMenuPermissionid in shopMenuPermissionids" v-if="shopMenuPermissionid.menuId == shopMenuShow.adminMenuId">
                                      <span v-if="shopMenuPermissionid.permissionStatus == 1" @click.prevent="shopMenuStatusChange(shopMenuPermissionid.menuId)" class="badge badge-primary btn-hover-shine menuActive"> Active </span>
                                      <span v-else  @click.prevent="shopMenuStatusChange(shopMenuPermissionid.menuId)" class="badge badge-danger btn-hover-shine menuActive"> Deactive </span>
                                  </span>
                               </td>
                            </tr>
                         </table>
                      </div>
                  </div>
               </div>

             </div>
          </div>
          <div class="card">
            <div class="p-3">
              <button  @click.prevent="ShopMenuPermissionCreate()" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
            </div>
          </div>
      </div>
  </span>
</template>

<script>
    export default {
        data(){
            return{
              shopEmployeeEntryLists:[],
              shopEmployeeTypeName:[],
              shopMenuTittleShows:[],
              shopMenuShows:[],
              shopSubMenuShows:[],

              // value Catch
              employeeEntryId:'',
              employeeTypeId:[],
              shopMenuId:[],
              fullAccess:[],
              viewAccess:[],
              addAccess:[],
              editAccess:[],

              // Shop Menu Permission
              shopMenuPermissionids:[],
              shopSubMenuPermissionids:[],

            }
        },
        mounted(){
            this.shopEmployeeEntryList()
            this.shopMenuTittleShow()
            this.shopMenuShow()
            this.shopSubMenuShow()

        },
        methods:{
            shopEmployeeEntryList(){
                axios.get('/shopEmployeeEntryLists').then(res =>{
                    this.shopEmployeeEntryLists =  res.data.shopEmployeeEntryLists;
                })
            },
            selectShopEmployeeEntryId(){
                axios.get('/shopEmployeeTypeName/'+this.employeeEntryId).then(res =>{
                    this.shopEmployeeTypeName =  res.data.shopEmployeeTypeName;
                })
            },
            shopMenuTittleShow(){
                axios.get('/shopMenuTittleShow').then(res =>{
                    this.shopMenuTittleShows =  res.data.shopMenuTittleShows;
                })
            },
            shopMenuShow(){
                axios.get('/shopMenuShow').then(res =>{
                    this.shopMenuShows =  res.data.shopMenuShows;
              })
            },
            shopSubMenuShow(){
                axios.get('/shopSubMenuShow').then(res =>{
                    this.shopSubMenuShows =  res.data.shopSubMenuShows;
              })
            },
            ShopMenuPermissionCreate(){
                  axios.post('/shopMenuPermission',{
                      employeeEntryId : this.employeeEntryId,
                      employeeTypeId : this.employeeTypeId,
                      shopMenuId : this.shopMenuId,
                      fullAccess : this.fullAccess,
                      viewAccess : this.viewAccess,
                      addAccess  : this.addAccess,
                      editAccess : this.editAccess,
                  })
                  .then(res =>{
                          this.employeeEntryId = [],
                          this.employeeTypeId = [],
                          this.shopMenuId = [],
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
            shopMenuPermissionShow(){
                axios.get('/shopPermissionMenuShows/'+this.employeeEntryId+'/'+this.employeeTypeId).then(res =>{
                    this.shopMenuPermissionids =  res.data.shopMenuPermissionids;
                })
                axios.get('/shopPermissionSubMenuShows/'+this.employeeEntryId+'/'+this.employeeTypeId).then(res =>{
                    this.shopSubMenuPermissionids =  res.data.shopSubMenuPermissionids;
                })

            },
            shopMenuStatusChange(menuId){
              axios.get('/shopMenuPermissionChange/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+menuId).then(res =>{
                  if (res.data.Unactive) {
                      Toast.fire({
                          icon: 'success',
                          title: 'Menu Permission Deactive'
                      })
                  }
                  else {
                      Toast.fire({
                          icon: 'success',
                          title: 'Menu Permission Active'
                      })
                  }
              })
              this.shopMenuPermissionShow();
            },
            shopSubMenuStatusDeactive(shopSubMenuStatusId){
              axios.get('/shopSubMenuStatusDeactive/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+shopSubMenuStatusId).then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'SubMenu Permission Deactive'
                  })
              })
              this.shopMenuPermissionShow();
            },
            shopSubMenuStatusActiveFullAccess(shopSubMenuStatusId){
              axios.get('/shopSubMenuStatusActiveFullAccess/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+shopSubMenuStatusId).then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'SubMenu Permission Active'
                  })
              })
              this.shopMenuPermissionShow();
            },
            shopSubMenuStatusActiveViewAccess(shopSubMenuStatusId){
              axios.get('/shopSubMenuStatusActiveViewAccess/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+shopSubMenuStatusId).then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'SubMenu Permission Active'
                  })
              })
              this.shopMenuPermissionShow();
            },
            shopSubMenuStatusActiveAddAccess(shopSubMenuStatusId){
              axios.get('/shopSubMenuStatusActiveAddAccess/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+shopSubMenuStatusId).then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'SubMenu Permission Active'
                  })
              })
              this.shopMenuPermissionShow();
            },
            shopSubMenuStatusActiveEditAccess(shopSubMenuStatusId){
              axios.get('/shopSubMenuStatusActiveEditAccess/'+this.employeeEntryId+'/'+this.employeeTypeId+'/'+shopSubMenuStatusId).then(res =>{
                  Toast.fire({
                      icon: 'success',
                      title: 'SubMenu Permission Active'
                  })
              })
              this.shopMenuPermissionShow();
            },
         }
     }
</script>
