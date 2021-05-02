<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Add Asset Supplier </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="addAssetSupplierCreate()">

              <div class="form-group">
                  <label> Asset Supplier Name</label>
                  <input v-model="form.assetSupplierName" type="text" name="assetSupplierName" :class="{ 'is-invalid': form.errors.has('assetSupplierName') }" placeholder="Asset Supplier Name" class="form-control">
                  <has-error :form="form" field="assetSupplierName"></has-error>
              </div>

               <div class="form-group">
                  <label> Asset Supplier Code</label>
                  <input disabled v-model="form.assetSupplierCode" type="text" name="assetSupplierCode" :class="{ 'is-invalid': form.errors.has('assetSupplierCode') }" placeholder="Asset Supplier Code" class="form-control">
                  <has-error :form="form" field="assetSupplierCode"></has-error>
              </div>

               <div class="form-group">
                  <label> Asset Supplier Phone Number</label>
                  <input v-model="form.assetSupplierPhone" type="text" name="assetSupplierPhone" :class="{ 'is-invalid': form.errors.has('assetSupplierPhone') }" placeholder="Asset Supplier Phone" class="form-control">
                  <has-error :form="form" field="assetSupplierPhone"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Hot Line</label>
                  <input v-model="form.assetSupplierHotLine" type="text" name="assetSupplierHotLine" :class="{ 'is-invalid': form.errors.has('assetSupplierHotLine') }" placeholder="Asset Supplier Hot Line" class="form-control">
                  <has-error :form="form" field="assetSupplierHotLine"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Mail</label>
                  <input v-model="form.assetSupplierMail" type="text" name="assetSupplierMail" :class="{ 'is-invalid': form.errors.has('assetSupplierMail') }" placeholder="Asset Supplier Mail..." class="form-control">
                  <has-error :form="form" field="assetSupplierMail"></has-error>
              </div>

                <div class="form-group">
                  <label> Asset Supplier Facebook</label>
                  <input v-model="form.assetSupplierFb" type="text" name="assetSupplierFb" :class="{ 'is-invalid': form.errors.has('assetSupplierFb') }" placeholder="Asset Supplier Facebook..." class="form-control">
                  <has-error :form="form" field="assetSupplierFb"></has-error>
              </div>

              <div class="form-group">
                  <label> Asset Supplier Web</label>
                  <input v-model="form.assetSupplierWeb" type="text" name="assetSupplierWeb" :class="{ 'is-invalid': form.errors.has('assetSupplierWeb') }" placeholder="Asset Supplier Web..." class="form-control">
                  <has-error :form="form" field="assetSupplierWeb"></has-error>
              </div>

               <div class="form-group">
                  <label> Asset Supplier IMO</label>
                  <input v-model="form.assetSupplierImo" type="text" name="assetSupplierImo" :class="{ 'is-invalid': form.errors.has('assetSupplierImo') }" placeholder="Asset Supplier IMO..." class="form-control">
                  <has-error :form="form" field="assetSupplierImo"></has-error>
              </div>

              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.assetSupplierAddress" type="text" name="assetSupplierAddress"  :class="{ 'is-invalid': form.errors.has('assetSupplierAddress') }" placeholder="Asset Supplier Address" class="form-control"></textarea>
                  <has-error :form="form" field="assetSupplierAddress"></has-error>
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
        <h3 style="color:black">Shop Asset Supplier List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Supplier Name</th>
               <th>Supplier Code</th>
               <th>Supplier Phone</th>
               <th>Supplier Hot Line</th>
               <th>Supplier Mail</th>
               <th>Supplier Web</th>
               <th>Supplier Facebook</th>
               <th>Supplier Imo</th>
               <th>Supplier Address</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(assetSupplierAllData, index) in assetSupplierAllDatas.data">
                <td>{{ index+1 }}</td>
                <td>{{ assetSupplierAllData.assetSupplierName }}</td>
                <td>{{ assetSupplierAllData.assetSupplierCode }}</td>
                <td>{{ assetSupplierAllData.assetSupplierPhone }}</td>
                <td>{{ assetSupplierAllData.assetSupplierHotLine }}</td>
                <td>{{ assetSupplierAllData.assetSupplierMail }}</td>
                <td>{{ assetSupplierAllData.assetSupplierWeb }}</td>
                <td>{{ assetSupplierAllData.assetSupplierFb }}</td>
                <td>{{ assetSupplierAllData.assetSupplierImo }}</td>
                <td>{{ assetSupplierAllData.assetSupplierAddress }}</td>
                <td>
                    <router-link :to="`/assetsupplier@entryEdit${assetSupplierAllData.assetSupplierId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                    <button type="button" @click="distroy(assetSupplierAllData.assetSupplierId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="assetSupplierAllDatas" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    assetSupplierName : '',
                    assetSupplierCode: '',
                    assetSupplierPhone: '',
                    assetSupplierHotLine: '',
                    assetSupplierMail: '',
                    assetSupplierWeb: '',
                    assetSupplierFb: '',
                    assetSupplierImo: '',
                    assetSupplierAddress: '',
                }),
                assetSupplierAllDatas: {},
            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
            this.getData();
            this.getPaginateList();
            this.autoIncrementCode();
        },
        methods:{
            addAssetSupplierCreate(){
                this.form.post('/addAssetSupplier').then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Asset Supplier Entry Successfully'
                    })
                    this.form.reset();
                    this.getData();
                    this.autoIncrementCode();
                })
            },
            getData(){
                axios.get('/addAssetSupplier').then(res =>{
                    this.assetSupplierAllDatas = res.data.assetSupplierGetData;
                })
            },
            getPaginateList(page = 1){
              axios.get('/addAssetSupplier?page=' + page)
              .then(response => {
                   this.assetSupplierAllDatas = response.data.assetSupplierGetData;
              });
            },
            autoIncrementCode(){
                axios.get('/addAssetSupplier/create').then(res =>{
                    this.form.assetSupplierCode = res.data.autoIncrementCode;
                })
            },
            distroy(assetSupplierId){
                    axios.delete('/addAssetSupplier/'+assetSupplierId).then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Delete Succuss'
                        })
                        this.getData();

                    })
            }
        }

    }

</script>
