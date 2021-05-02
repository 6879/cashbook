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
            Brand Entry
            <div class="page-title-subheading">
              Brand Entry
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/brand@entry"
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


 <form @submit.prevent="create()">


       <div class="supplier-entry py-4 px-2 comm-form-back-img">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color">
         
               <div class="form-group">
                   <label>Brand Name</label>
                   <input type="text" v-model="form.brandName" name="brandName"  placeholder="Brand Name" class="form-control" :class="{ 'is-invalid': form.errors.has('brandName') }">
                   <has-error :form="form" field="brandName"></has-error>
               </div>

              <div class="form-group">
                 <label>Brand Status</label>
                  <select v-model="form.brandStatus" name="brandStatus" :class="{ 'is-invalid': form.errors.has('brandStatus') }" class="form-control">
                     <option value="">Select One</option>
                     <option value="1">Publish</option>
                     <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="brandStatus"></has-error>
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






    <div class="card mt-5">
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
                 <th>Brand Name</th>
                 <th>Brand Status</th>
                 <th>Edit</th>
                 <th> Delete </th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(showDatas, index) in showDataentry">
                  <td>{{ index+1 }}</td>
                  <td>{{ showDatas.brandName }}</td>
                  <td> 
                     <div v-if="showDatas.brandStatus == 1">
                    <span
                      type="button"
                      @click="
                        changeStatus(showDatas.brandId)
                      "
                      class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for Unpublish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Unpublish"
                    >
                      Publish
                    </span>
                  </div>
                  <div v-else>
                    <span
                      type="button"
                      @click="changeStatus(showDatas.brandId)"
                      class="badge badge-pill badge-danger btn-hover-shine"
                                title="Click for Publish"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Publish"
                    >
                      Unpublish
                    </span>
                  </div>
                  </td>
                  
                  <td>
                 <router-link :to="`/brand@entryEdit${showDatas.brandId}`" class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i>Edit</router-link>
                  </td>
                  <td>
                 <button @click.prevent="deleteBrandProduct(showDatas.brandId)" class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                >
                  <i class="fa fa-trash"></i>Delete</button>
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
        data(){
            return{
                form: new Form({
                    brandName:'',
                    brandStatus: '',
                }),
                showDataentry:{},
            }
        },
        mounted() {
            this.ShowDataList()
        },
        methods: {
            create() {
                this.form.post('/purchaseBrandEntry').then(res => {
                    if (res.data.changedBrandName) {
                        Toast.fire({
                          icon: 'error',
                          title: 'Changed Your Brand Name'
                        })
                    }
                    else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Brand Entry successfully'
                        })
                        this.form.reset()
                        this.ShowDataList()
                    }
                });
            },
            ShowDataList() {
                axios.get('/purchaseBrandEntry').then(res => {
                    this.showDataentry = res.data.showdata
                })
            },
                    changeStatus(id){
          let uri = `purchaseBrandEntry/changeStatus/${id}`;
        axios.get(uri).then(response=>{
            Toast.fire({
                icon: 'success',
                title: 'Status Change Successfully'
            })
            this.ShowDataList();
        })
    },
            deleteBrandProduct($brandId){
                axios.delete('/purchaseBrandEntry/'+$brandId)
                    .then( res =>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Deleted BrandEntry successfully'
                        })
                        this.ShowDataList();
                    })
            }
        }
    }
</script>
