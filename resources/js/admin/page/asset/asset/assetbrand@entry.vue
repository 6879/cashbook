<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Brand Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="assetBrandCreate()">
              <div class="form-group">
                  <label> Brand Name</label>
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
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

  <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Brand List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Asset Brand Name</th>
               <th>Asset Brand Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(brandData, index) in assetBrandData.data">
                <td>{{ index+1 }}</td>
                <td>{{ brandData.assetBrandName }}</td>
                <td>
                    <div v-if="brandData.assetBrandStatus == 1">
                      <button type="button"  @click="changeStatus(brandData.assetBrandEntryId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(brandData.assetBrandEntryId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                   <router-link :to="`/assetBrand@entryEdit${brandData.assetBrandEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="assetBrandData" @pagination-change-page="getPaginateList">
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
                    assetBrandName : '',
                    assetBrandStatus: '',
                }),
                assetBrandData:{},
            }
        },

        props:{
            limit: {
                type: Number,
                default: 2
            }
        },

        mounted(){
            this.getShopAssetData();
            this.getPaginateList();
        },
        methods:{

            assetBrandCreate(){
                this.form.post('/shopAssetBrandEntry').then(res=>{
                    if (res.data.changeAssetBrandName){
                        Toast.fire({
                            icon: 'error',
                            title: 'Change Your Asset Brand Name'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'Asset Brand Entry Successfully'
                        })
                        this.form.reset();
                    }
                    this.getShopAssetData();
                })

            },
            getShopAssetData(){
                axios.get('/shopAssetBrandEntry').then(res=>{
                    this.assetBrandData = res.data.assetBrandList;
                })

            },

            getPaginateList(page = 1){
                axios.get('/shopAssetBrandEntry?page=' + page)
                    .then(response => {
                        this.assetBrandData = response.data.assetBrandList;
                    });
            },
            changeStatus(assetBrandEntryId){
                axios.get("/assetBrandEntry/"+assetBrandEntryId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Status Change Successfully'
                    })
                    this.getShopAssetData();
                })
            },

            distroy(assetBrandEntryId){
                axios.delete("assetBrandEntry/"+assetBrandEntryId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Delete Successfully'
                    })
                    this.getShopAssetData();
                })
            },

        }
    }
</script>
