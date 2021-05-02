<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Menu Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="menuUpdate()">
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
                <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
              </div>
          </form>
        </div>
      </div>
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
                menuTitleNameShows:{},
            }

        },
      mounted() {
            this.getData();
          this.menuTitleNameShow();
      },
      methods:{
            getData(){
                axios.get('/adminMenu/'+this.$route.params.adminMenuId+'/edit')
                .then(res=>{
                    this.form.fill(res.data.data)
                })
            },
            menuUpdate(){
                this.form.put('/adminMenu/'+this.$route.params.adminMenuId)
                .then(res=>{
                    if (res.data.changeMenuName) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Change Your Admin Menu Name'
                        })
                    }
                    else{
                      Toast.fire({
                        icon: 'success',
                        title: 'Admin Menu Title Update Successfully'
                      })
                      this.$router.push('/adminmenu@create')
                    }
                })
            },
            titleChangePosition(){
              axios.get('/adminMenuTitlePositionSelect/'+this.form.adminMenuTitleId).then(res =>{
                  this.form.adminMenuPosition = res.data.adminMenuPositionInc;
              })
            },
            menuTitleNameShow(){
               axios.get('/adminMenuTitlelist').then(res =>{
                  this.menuTitleNameShows = res.data.adminMenuTitle;
              })
          },
      }
    }
</script>
