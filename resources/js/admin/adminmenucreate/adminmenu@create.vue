<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Menu Create</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="menucreate()">
              <div class="form-group">
                <label>Menu Title Name</label>
                <select  class="form-control" v-model="form.adminMenuTitleId" :class="{ 'is-invalid': form.errors.has('adminMenuTitleId') }" @change.prevent="titleChangePosition()">
                  <option value="">Select One</option>
                  <option v-for="menuTitleName in menuTitleNameShows" :value="menuTitleName.adminMenuTitleId">{{ menuTitleName.adminMenuTitleName }}</option>
                 </select>
                 <has-error :form="form" field="adminMenuTitleId"></has-error>
              </div>
               <div class="form-group">
                 <label>Menu Name</label>
                 <input type="text" v-model="form.adminMenuName" name="adminMenuName" :class="{ 'is-invalid': form.errors.has('adminMenuName') }"  placeholder="Menu Name" class="form-control">
                  <has-error :form="form" field="adminMenuName"></has-error>
               </div>
                <div class="form-group">
                  <label>Menu Position</label>
                  <input type="text" disabled v-model="form.adminMenuPosition" name="adminMenuPosition" :class="{ 'is-invalid': form.errors.has('adminMenuPosition') }" placeholder="Menu Position" class="form-control" >
                  <has-error :form="form" field="adminMenuPosition"></has-error>
                </div>
               <div class="form-group">
                 <label>Menu Url</label>
                 <input type="text" v-model="form.adminMenuUrl" name="adminMenuUrl"  placeholder="Menu Url" class="form-control">
               </div>
               <div class="form-group">
                 <label>Menu Icon</label>
                 <input type="text" v-model="form.adminMenuIcon" name="adminIcon"  placeholder="Menu Icon" class="form-control">
               </div>
               <div class="form-group">
                 <label>Menu Status</label>
                 <select v-model="form.adminMenuStatus" name="adminMenuStatus" :class="{ 'is-invalid': form.errors.has('adminMenuStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="adminMenuStatus"></has-error>
              </div>
              <div class="form-group">
                 <input type="checkbox" v-model="form.adminSubMenuStatus" name="adminSubMenuStatus" value="1" class="form-check-input" >
                 <label class="form-check-label">SubMenu Status</label>
              </div>
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card main-card  element-block-example  mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Menu List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Menu Title Name</th>
               <th>Menu Name</th>
               <th>Menu Position</th>
               <th>Menu Url</th>
               <th>Menu Icon</th>
               <th>Menu Status</th>
               <th>SubMenu Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(menulist, index) in menuListshows.data">
                <td>{{ index+1 }}</td>
                <td v-if="menulist.admin_menu_title_name">{{ menulist.admin_menu_title_name.adminMenuTitleName }}</td>
                <td v-else=""></td>
                <td>{{ menulist.adminMenuName }}</td>
                <td>{{ menulist.adminMenuPosition }}</td>
                <td>{{ menulist.adminMenuUrl }}</td>
                <td>{{ menulist.adminMenuIcon }}</td>
                <td>
                  <div v-if="menulist.adminMenuStatus == 1">
                      <button type="button"  @click="changeStatus(menulist.adminMenuId)" class="btn btn-hover-shine btn-success">Published</button>
                   </div>
                   <div v-else>
                      <button type="button"  @click="changeStatus(menulist.adminMenuId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                   </div>
                </td>
				        <td>
                    <div v-if="menulist.adminSubMenuStatus == 1">
                        <button type="button"   class="btn btn-hover-shine btn-success">Active</button>
                    </div>
                    <div v-else>
                       <button type="button"   class="btn btn-hover-shine btn-danger">Deactive</button>
                    </div>
                </td>
                <td>
                   <router-link :to="`/adminmenu@Edit${menulist.adminMenuId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                   <button type="button" @click="distroy(menulist.adminMenuId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>

       <span class="card_footer">
         <pagination :data="menuListshows" @pagination-change-page="getPaginateList">
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
                  adminMenuTitleId: '',
                  adminMenuName: '',
                  adminMenuPosition: '',
                  adminMenuUrl: '',
                  adminMenuIcon: '',
                  adminMenuStatus: '',
                  adminSubMenuStatus: '',
                }),
                 menuListshows:{},
                 menuTitleNameShows:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
          this.menuListshow();
          this.menuTitleNameShow();
          this.getPaginateList();
        },
        methods:{
          menucreate(){
            this.form.post('/adminMenu').then(res =>{
                if (res.data.changePosition){
                    Toast.fire({
                      icon: 'error',
                      title: 'Change Your Menu Position'
                    })
                }
                else if (res.data.changeMenuName){
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Menu  Name'
                    })
                }
                else {
                    Toast.fire({
                      icon: 'success',
                      title: 'Menu Create Successfully'
                    })
                    this.form.reset();
                    this.menuListshow();
                }
            })
          },
          menuListshow(){
            axios.get('/adminMenu').then(res =>{
               this.menuListshows = res.data.adminmenulist;
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminMenu?page=' + page)
            .then(response => {
               this.menuListshows = response.data.adminmenulist;
            });
          },
          menuTitleNameShow(){
            axios.get('/adminMenuTitlelist').then(res =>{
               this.menuTitleNameShows = res.data.adminMenuTitle;
            })
          },
          titleChangePosition(){
            axios.get('/adminMenuTitlePositionSelect/'+this.form.adminMenuTitleId).then(res =>{
                this.form.adminMenuPosition = res.data.adminMenuPositionInc;
            })
          },
          distroy(adminMenuId){
             axios.delete("/adminMenu/"+adminMenuId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Admin Menu Title Delete Successfully'
                  })
                  this.menuListshow();
              })
            },
           changeStatus(adminMenuId){
              axios.get("/statusChangeEventMenu/"+adminMenuId).then(res=>{
                  Toast.fire({
                      icon: 'success',
                      title: 'Admin Menu Status Change Successfully'
                  })
                  this.menuListshow();
              })
           },
        }
     }
</script>
