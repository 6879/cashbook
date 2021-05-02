<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Meta Key Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="metaKeyCreate()">
              <div class="form-group">
                  <label>Meta Key</label>
                  <input  type="text" v-model="form.metaKey"  name="metaKey" :class="{ 'is-invalid': form.errors.has('metaKey') }" placeholder="Enter Meta key" class="form-control">
                  <has-error :form="form" field="metaKey"></has-error>
              </div>
               <div class="form-group">
                    <label>Meta  Description</label>
                    <textarea class="form-control" v-model="form.metaDescription"  rows="3" :class="{ 'is-invalid': form.errors.has('metaDescription') }" placeholder="Enter Meta Description">
                    </textarea>
                   <has-error :form="form" field="metaDescription"></has-error>
               </div>

              <div class="form-group">
                 <label>Meta Status</label>
                 <select v-model="form.metaStatus" name="metaStatus" :class="{ 'is-invalid': form.errors.has('metaStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="metaStatus"></has-error>
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
        <h3 style="color:black">Meta Key List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Meta Key</th>
               <th>Meta  Description</th>
               <th>Meta Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(showData, index) in showDataentry.data">
                <td>{{ index+1 }}</td>
                <td>{{ showData.metaKey }}</td>
                <td>{{ showData.metaDescription }}</td>
                <td>
                    <div v-if="showData.metaStatus == 1">
                      <button type="button"  @click="changeStatus(showData.metaKeyId)" class="btn btn-hover-shine btn-success">Published</button>
                    </div>
                    <div v-else>
                      <button type="button"  @click="changeStatus(showData.metaKeyId)" class="btn btn-hover-shine btn-danger">Unpublish</button>
                    </div>
                </td>
                <td>
                  <router-link :to="`/metakeydescription@entryEdit${showData.metaKeyId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button type="button"  @click.prevent="deleteMetaDescription(showData.metaKeyId)" class="btn-hover-shine btn btn-shadow btn btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="showDataentry" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
       </span>
     </div>
  </span>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    metaKey: '',
                    metaDescription: '',
                    metaStatus: '',
                }),
                showDataentry:{},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted() {
            this.showDataList();
            this.getPaginateList();
        },
        methods: {
            metaKeyCreate() {
                this.form.post('/adminMetaKeyDescription').then(res => {
                    if (res.data.changeMetakey){
                        Toast.fire({
                            icon: 'error',
                            title: 'Please Change MetaKey Description'
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'success',
                            title: 'MetaKey Description Entry Successfully'
                        })
                            this.form.reset()
                            this.showDataList();
                        }
                  });
                },
                showDataList() {
                    axios.get('/adminMetaKeyDescription').then(res => {
                          this.showDataentry = res.data.show
                      })
                },
                getPaginateList(page = 1){
                  axios.get('/adminMetaKeyDescription?page=' + page)
                  .then(response => {
                    this.showDataentry = response.data.show;
                  });
                },
                changeStatus($metaKeyId){
                  axios.get("adminMetaKeyDescription/"+$metaKeyId).then(res=>{
                      Toast.fire({
                          icon: 'success',
                          title: 'Meta Status Change Successfully'
                      })
                      this.showDataList()
                  })
                },
                deleteMetaDescription(metaKeyId) {
                    axios.delete('/adminMetaKeyDescription/' + metaKeyId)
                      .then(res => {
                          Toast.fire({
                              icon: 'success',
                              title: 'Deleted MetaDescription successfully'
                          })
                          this.showDataList()
                    })
                }
            },
       }
</script>
