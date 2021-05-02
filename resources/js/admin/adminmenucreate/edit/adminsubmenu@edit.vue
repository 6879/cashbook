<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Admin Sub Menu Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="subMenuUpdate()">
              <div class="form-group">
                 <label>Menu Name</label>
                  <select class="form-control"  v-model="form.adminMenuId " :class="{ 'is-invalid': form.errors.has('adminMenuId') }" @change.prevent="menuChangePosition()">
                    <option value="">Select One</option>
                    <option v-for="show in  menulistshows"  :value="show.adminMenuId">{{show.adminMenuName}}</option>
                  </select>
                  <has-error :form="form" field="adminMenuId"></has-error>
              </div>
              <div class="form-group">
                <label>Sub Menu Name</label>
                <input v-model="form.adminSubMenuName" type="text" name="adminSubMenuName"  :class="{ 'is-invalid': form.errors.has('adminSubMenuName') }" placeholder="Sub Menu Name" class="form-control">
                <has-error :form="form" field="adminSubMenuName"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Url</label>
                <input v-model="form.adminSubMenuUrl" type="text" name="adminSubMenuUrl"  :class="{ 'is-invalid': form.errors.has('adminSubMenuUrl') }" placeholder="Sub Menu Url" class="form-control">
                <has-error :form="form" field="adminSubMenuUrl"></has-error>
              </div>

              <div class="form-group">
                <label>Sub Menu Position</label>
                <input disabled v-model="form.adminSubMenuePosition" type="text" name="adminSubMenuePosition" :class="{ 'is-invalid': form.errors.has('adminSubMenuePosition') }" placeholder="Sub Menu Position" class="form-control">
                <has-error :form="form" field="adminSubMenuePosition"></has-error>
              </div>
              <div class="form-group">
                <label>Sub Menu Status</label>
                <select v-model="form.adminSubMenueStatus" name="adminSubMenueStatus" :class="{ 'is-invalid': form.errors.has('adminSubMenueStatus') }" class="form-control">
                  <option value="">Select One</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                 </select>
                 <has-error :form="form" field="adminSubMenueStatus"></has-error>
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
                    adminMenuId : '',
                    adminSubMenuName: '',
                    adminSubMenuUrl: '',
                    adminSubMenuePosition: '',
                    adminSubMenueStatus: '',
                }),
              menulistshows:[],
            }

        },
        mounted(){
          this.menuListShow();
          this.subMenuSingleShow();
        },
        methods:{
          subMenuUpdate(){
            this.form.put('/adminSubMenu/'+this.$route.params.adminSubMenuId).then(res =>{
                if (res.data.changeSubMenuName) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Change Your Admin Sub Menu Name'
                    })
                }
                else{
                  Toast.fire({
                    icon: 'success',
                    title: 'Admin SubMenu Title Update Successfully'
                  })
                  this.$router.push('/adminsubmenu@create')
               }
            });
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
          subMenuSingleShow(){
            axios.get('/adminSubMenu/'+this.$route.params.adminSubMenuId).then(res =>{
              this.form.fill(res.data.subMenuInfo);
            })
          },

        }

    }

</script>
