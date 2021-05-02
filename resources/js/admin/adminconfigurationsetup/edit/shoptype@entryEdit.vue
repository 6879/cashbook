<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Type Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="update()">
              <div class="form-group">
                  <label>Shop Type Name</label>
                  <input v-model="form.shopTypeName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('shopTypeName') }" placeholder="Shop Type Name" class="form-control">
                  <has-error :form="form" field="shopTypeName"></has-error>
              </div>
              <div class="form-group">
                  <label>Shop Type Code</label>
                  <input v-model="form.shopTypeCode" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('shopTypeCode') }" placeholder="Shop Type Name" class="form-control">
                  <has-error :form="form" field="shopTypeCode"></has-error>
              </div>
              <div class="form-group">
                 <label>Shop Type Status</label>
                  <select v-model="form.shopTypeStatus" name="shopTypeStatus" :class="{ 'is-invalid': form.errors.has('shopTypeStatus') }" class="form-control">
                     <option value="">Select One</option>
                     <option value="1">Publish</option>
                     <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopTypeStatus"></has-error>
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
                    shopTypeName : '',
                    shopTypeCode : '',
                    shopTypeStatus: '',
                }),

            }
        },
        mounted(){
            this.getData();
        },
        methods:{
            getData(){
              axios.get('/shopTypeEntry/'+this.$route.params.shopTypeEntryId+'/edit')
                .then(res=>{
                    this.form.fill(res.data.data)
                    // console.log(res.data.data)
                })
            },

            update(){
              this.form.put('/shopTypeEntry/'+this.$route.params.shopTypeEntryId)
                .then(res =>{
                    if (res.data.changeShopTypeName) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Shop Type Name'
                        })
                    }
                     else {
                       Toast.fire({
                           icon: 'success',
                           title: 'Shop Type Update Successfully'
                       })
                       this.$router.push('/shoptype@entry')
                     }
                })
            }
        }
    }
</script>
