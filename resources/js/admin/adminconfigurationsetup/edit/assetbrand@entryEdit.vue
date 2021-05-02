<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Brand  Update</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="update()">

              <div class="form-group">
                  <label>Asset Brand Name</label>
                  <input v-model="form.assetBrandName" type="text" name="uniteEntryName" :class="{ 'is-invalid': form.errors.has('assetBrandName') }" placeholder="Asset Brand Name" class="form-control">
                  <has-error :form="form" field="assetBrandName"></has-error>
              </div>

                <div class="form-group">
                 <label>Asset Brand Status</label>
                 <select v-model="form.assetBrandStatus" name="assetBrandStatus" :class="{ 'is-invalid': form.errors.has('assetBrandStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="assetBrandStatus"></has-error>
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
                    assetBrandName : '',
                    assetBrandStatus: '',
                }),

            }
        },
        mounted(){
            this.getData();
        },
        methods:{

            getData(){
                axios.get('/assetBrandEntry/'+this.$route.params.assetBrandEntryId+'/edit')
                    .then(res=>{
                        this.form.fill(res.data.data)
                    })
            },

            update(){
                this.form.put('/assetBrandEntry/'+this.$route.params.assetBrandEntryId).then(res=>{
                    if (res.data.changeAssetBrandName) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Change Your Asset Brand Name'
                        })
                    }
                    else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Asset Brand Entry Update Successfully'
                        })
                        this.$router.push('/adminassetbrand@entry')
                    }
               })
            }
        }
    }
</script>
