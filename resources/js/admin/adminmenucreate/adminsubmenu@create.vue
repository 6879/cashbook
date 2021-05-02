<template id="">
  <span>



    <!-- ------------------- page title  -->
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
          </div>
          <div>
            Admin Sub Menu
            <div class="page-title-subheading">
              Admin Sub Menu
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/adminsubmenu@create"
            type="button"
            class="btn-shadow mr-3 btn btn-warning"
            title=""
            data-placement="bottom"
            data-toggle="tooltip"
            data-original-title="Refresh"
            
          >
            <i class="fa fa-undo text-white"></i>
          </router-link>
          <div class="d-inline-block dropdown">
            <button
              type="button"
              class="btn-shadow btn btn-info"
              onclick="window.history.back()"
            >
              
                <span class="lnr lnr-arrow-left"></span>
              Back
            </button>
            
          </div>
        </div>
      </div>
    </div>

<!-- ------------------- // page title  -->





    <div class="card">
     
     

           <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Add Information </h4>
        </div>
      </div>

         <form  @submit.prevent="subMenuCreate()">
       
       <div class="supplier-entry py-4 px-2 comm-form-back-img">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color">
       


            <div class="form-group">
                <label>Menu Title Name</label>
                <select  
                class="form-control" 
                v-model="form.adminMenuTitleId" 
                :class="{ 'is-invalid': form.errors.has('adminMenuTitleId') }" 
                @change.prevent="menuNameShow()">
                  <option value="">Select One</option>
                  <option v-for="menuTitleName in menuTitleNameShows" :value="menuTitleName.adminMenuTitleId">{{ menuTitleName.adminMenuTitleName }}</option>
                 </select>
                 <has-error :form="form" field="adminMenuTitleId"></has-error>
              </div>



              <div class="form-group">
                 <label>Menu Name <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> </label>
                  <select class="form-control"  v-model="form.adminMenuId " :class="{ 'is-invalid': form.errors.has('adminMenuId') }" @change.prevent="menuChangePosition()">
                    <option value="">Select One</option>
                    <option v-for="show in  menulistshows"  :value="show.adminMenuId">{{show.adminMenuName}}</option>
                  </select>
                  <has-error :form="form" field="adminMenuId"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Name <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> </label>
                <input v-model="form.adminSubMenuName" type="text" name="adminSubMenuName"  :class="{ 'is-invalid': form.errors.has('adminSubMenuName') }" placeholder="Sub Menu Name" class="form-control">
                <has-error :form="form" field="adminSubMenuName"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Url <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
                <input v-model="form.adminSubMenuUrl" type="text" name="adminSubMenuUrl"  :class="{ 'is-invalid': form.errors.has('adminSubMenuUrl') }" placeholder="Sub Menu Url" class="form-control">
                <has-error :form="form" field="adminSubMenuUrl"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Position <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
                <input disabled v-model="form.adminSubMenuePosition" type="text" name="adminSubMenuePosition" :class="{ 'is-invalid': form.errors.has('adminSubMenuePosition') }" placeholder="Sub Menu Position" class="form-control">
                <has-error :form="form" field="adminSubMenuePosition"></has-error>
              </div>
              <div class="form-group">
                <label>Sub Menu Status <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> </label>
                <select v-model="form.adminSubMenueStatus" name="adminSubMenueStatus" :class="{ 'is-invalid': form.errors.has('adminSubMenueStatus') }" class="form-control">
                  <option value="">Select One</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                 </select>
                 <has-error :form="form" field="adminSubMenueStatus"></has-error>
             </div>
                </div>
                            </div>




               <!-- -----------------------------   card footer  -->
 
<div class="d-block pt-3 pb-4 card-footer overflow-hidden">
<div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12">


                                <button type="reset" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-outline-danger btn-lg float-left">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-undo "></i>
                                    </span>
                                    <span class="mr-1"> Clear </span>
                                </button>

                                <button type="submit" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg float-right">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-paper-plane"></i>
                                    </span>
                                    <span class="mr-1"> Add New Entry </span>
                                </button>


                            </div>
                            </div>
 
<!-- -----------------------------   // card footer  -->  




      
        </form>
        </div>
     







  <div class="card main-card  element-block-example mt-5">
      
      
      <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          View Information </h4>
      </div>

    <div class="card-body table-responsive bg-white">
      
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Menu</th>
               <th>Sub Menu Name</th>
               <th>Sub Menu Url</th>
               <th>Sub Menu Position</th>
               <th>Sub Menu Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(submenulist, index) in submenulistshows.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="submenulist.admin_menu_relation">{{ submenulist.admin_menu_relation.adminMenuName }}</td>
                  <td v-else></td>
                  <td>{{ submenulist.adminSubMenuName }}</td>
                  <td >{{ submenulist.adminSubMenuUrl }}</td>
                  <td>{{ submenulist.adminSubMenuePosition  }}</td>
                  <td>
                      <div v-if="submenulist.adminSubMenueStatus == 1">
                        <span  @click="changeStatus(submenulist.adminSubMenuId)" class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for Unpublish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Unpublish"> Published </span>
                      </div>
                      <div v-else>
                        <span @click="changeStatus(submenulist.adminSubMenuId)" class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for Publish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Publish">Unpublish</span>
                      </div>
                 </td>
                  <td>
                      <router-link :to="`/adminsubmenu@Edit${submenulist.adminSubMenuId}`"  class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i>Edit</router-link>
                      <button  @click.prevent="adminSubMenuDelete(submenulist.adminSubMenuId)" class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                >
                  <i class="fa fa-trash"></i>Delete</button>
                  </td>
              </tr>
            </tbody>
          </table>
       </div>
       
       
       
       
       
       
       <!-- <span class="card_footer">
         <pagination :data="submenulistshows" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span> -->






     </div>
  </span>
</template>
<script>
  export default {
        data () {
            return {
                form: new Form({
                    adminMenuId : '',
                    adminSubMenuName: '',
                    adminSubMenuUrl: '',
                    adminSubMenuePosition: '',
                    adminSubMenueStatus: '',
                }),
                menulistshows:[],
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
          this.menuListShow();
          this.submenuListShow();
          this.getPaginateList();
          this.menuTitleNameShow();
        },
        methods:{
          
          menuNameShow(){
            axios.get('/adminMenulistById/'+this.form.adminMenuTitleId).then(res =>{
               this.menulistshows = res.data.adminMenuTitle;
            })
          },
          
          menuTitleNameShow(){
            axios.get('/adminMenuTitlelist').then(res =>{
               this.menuTitleNameShows = res.data.adminMenuTitle;
            })
          },


          subMenuCreate(){
              this.form.post('/adminSubMenu').then(res=>{
                if (res.data.inactive) {
                    Toast.fire({
                      icon: 'error',
                      title: 'Admin Menu SubMenuStatus Inactive'
                    })
                }

              else {
                  if (res.data.changePosition){
                      Toast.fire({
                        icon: 'error',
                        title: 'Change Your SubMenu Position'
                      })
                   }
                  else if (res.data.changeSubmenuName)
                  {
                      Toast.fire({
                          icon: 'error',
                          title: 'Change Your SubMenu Name'
                      })
                  }
                  else {
                      Toast.fire({
                        icon: 'success',
                        title: 'SubMenu Create Successfully'
                      })
                      this.form.reset();
                      this.submenuListShow();
                   }
                }
            })
          },
          menuChangePosition(){
            axios.get('/adminMenuPositionSelect/'+this.form.adminMenuId).then(res =>{
                this.form.adminSubMenuePosition = res.data.adminSubMenuPositionInc;
            })
          },
          menuListShow(){
            axios.get('/adminSubMenu/create').then(res =>{
              this.menulistshows = res.data.adminmenulist;
            })
          },
           submenuListShow(){
            axios.get('/adminSubMenu').then(res =>{
              this.submenulistshows = res.data.adminsubmenulist;
            })
          },
          getPaginateList(page = 1){
            axios.get('/adminSubMenu?page=' + page)
            .then(response => {
               this.submenulistshows = response.data.adminsubmenulist;
            });
          },
          changeStatus(adminSubMenuId){
            axios.get('adminSubMenueStatus/'+adminSubMenuId).then(res =>{
                Toast.fire({
                  icon: 'success',
                  title: 'SubMenu Status Change Successfully'
                })
                this.submenuListShow();
            })
          },
          adminSubMenuDelete(adminSubMenuId){
            axios.delete('/adminSubMenu/'+adminSubMenuId).then(res =>{

              Toast.fire({
                icon: 'success',
                title: 'SubMenu Delete Successfully'
              })
                this.submenuListShow();
              this.submenuListShow();
                this.submenuListShow();
                this.submenuListShow()
                Toast.fire({
                  icon: 'success',
                  title: 'SubMenu Delete Successfully'
                })

            });
          },
        }

    }

</script>
