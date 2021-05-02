<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Basic Information </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="basicInfoCreate()">
              <div class="form-group"  :class="{ 'has-error': form.errors.has('fullName') }">
                 <label>Full Name </label>
                 <input type="text"  v-model="form.fullName" name="fullName"  placeholder="Full Name" class="form-control" :class="{ 'is-invalid': form.errors.has('fullName') }">
                  <has-error :form="form" field="fullName"></has-error>
              </div>

              <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                 <label> Email </label>
                 <input type="text"   v-model="form.email"  name="email"  placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                 <has-error :form="form" field="email"></has-error>
              </div>

              <div class="form-group" :class="{ 'has-error': form.errors.has('phone') }">
                 <label>Phone No </label>
                 <input type="text"   v-model="form.phone"  name="phone"  placeholder="Phone No" class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                 <has-error :form="form" field="phone"></has-error>
              </div>
              
              <div class="form-group" :class="{ 'has-error': form.errors.has('religious') }">
                <label> Religious </label>
                <select   v-model="form.religious" name="religious"  class="form-control" :class="{ 'is-invalid': form.errors.has('religious') }">
                  <option value=""> Select Religious </option>
                 </select>
                 <has-error :form="form" field="religious"></has-error>
             </div>

              <div class="form-group" :class="{ 'has-error': form.errors.has('image') }">
                 <label> Image </label>
                 <input type="file"  placeholder="" name="image"  class="form-control" :class="{ 'is-invalid': form.errors.has('image') }">
                  <has-error :form="form" field="image"></has-error>
              </div>

              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Basic Information</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th> SN</th>
               <th> Full Name</th>
               <th> Email</th>
               <th> Phone No</th>
               <th> Religious </th>
               <th> Image </th>
               <th> Status </th>
               <th> Action </th>
             </tr>
            </thead>
               <tbody>
              <tr  :v-for="(basicInfo, index) in basicInfos">
                <td>{{ index+1 }}</td>
                <td>{{basicInfo.fullName}}</td>
                <td>{{basicInfo.email}}</td>
                <td>{{basicInfo.phone}}</td>
                <td>{{basicInfo.religious}}</td>
                <td><img src="" class="img img-thumbnail"> </td>
                <td>
                  <div v-if="basicInfo.status == 1">
                      <button type="button"  @click="changeStatus(basicInfo.id)" class="btn btn-hover-shine btn-success">Inactive</button>
                  </div>
                  <div v-else>
                      <button type="button"  @click="changeStatus(basicInfo.id)" class="btn btn-hover-shine btn-danger">Active</button>
                  </div>
                </td>
                
                <td>

                  <router-link :to="`/basicInfoEdit${basicInfo.id}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button type="button" @click="distroy(basicInfo.id)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
        data () {
            return {
                form: new Form({
                    fullName : '',
                    email: '',
                    phone: '',
                    religious: '',
                    image: '',
                }),
                basicInfos:[],
                submenulistshows:{},

            }
        },
     
        mounted(){
          this.basicInfo();
          this.submenuListShow();
          this.getPaginateList();
        },
        methods:{
          basicInfoCreate(){
              this.form.post('/api/basicInfo/create').then(res=>{
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
          basicInfo(){
            axios.get('/adminSubMenu/create').then(res =>{
              this.basicInfos = res.data.basicInfo;
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

