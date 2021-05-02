<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Add Product Supplier</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="addProductSupplierCreate()">

              <div class="form-group">
                  <label> Product Supplier Name</label>
                  <input v-model="form.productSupplierName" type="text" name="productSupplierName" :class="{ 'is-invalid': form.errors.has('productSupplierName') }" placeholder="Product Supplier Name" class="form-control">
                  <has-error :form="form" field="productSupplierName"></has-error>
              </div>

               <div class="form-group">
                  <label> Product Supplier Code</label>
                  <input disabled v-model="form.productSupplierCode" type="text" name="productSupplierCode" :class="{ 'is-invalid': form.errors.has('productSupplierCode') }" placeholder="Product Supplier Code" class="form-control">
                  <has-error :form="form" field="productSupplierCode"></has-error>
              </div>

               <div class="form-group">
                  <label> Product Supplier Phone Number</label>
                  <input v-model="form.productSupplierPhone" type="text" name="productSupplierPhone" :class="{ 'is-invalid': form.errors.has('productSupplierPhone') }" placeholder="Product Supplier Phone" class="form-control">
                  <has-error :form="form" field="productSupplierPhone"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Hot Line</label>
                  <input v-model="form.productSupplierHotLine" type="text" name="productSupplierHotLine" :class="{ 'is-invalid': form.errors.has('productSupplierHotLine') }" placeholder="Product Supplier Hot Line" class="form-control">
                  <has-error :form="form" field="productSupplierHotLine"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Mail</label>
                  <input v-model="form.productSupplierMail" type="text" name="productSupplierMail" :class="{ 'is-invalid': form.errors.has('productSupplierMail') }" placeholder="Product Supplier Mail..." class="form-control">
                  <has-error :form="form" field="productSupplierMail"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Facebook</label>
                  <input v-model="form.productSupplierFb" type="text" name="productSupplierFb" :class="{ 'is-invalid': form.errors.has('productSupplierFb') }" placeholder="Product Supplier Facebook..." class="form-control">
                  <has-error :form="form" field="productSupplierFb"></has-error>
              </div>

              <div class="form-group">
                  <label> Product Supplier Web</label>
                  <input v-model="form.productSupplierWeb" type="text" name="productSupplierWeb" :class="{ 'is-invalid': form.errors.has('productSupplierWeb') }" placeholder="Product Supplier Web..." class="form-control">
                  <has-error :form="form" field="productSupplierWeb"></has-error>
              </div>


                 <div class="form-group">
                  <label> Product Supplier Imo</label>
                  <input v-model="form.productSupplierImo" type="text" name="productSupplierImo" :class="{ 'is-invalid': form.errors.has('productSupplierImo') }" placeholder="Product Supplier Imo..." class="form-control">
                  <has-error :form="form" field="productSupplierImo"></has-error>
              </div>

              <div class="form-group">
                  <label>Address</label>
                  <textarea v-model="form.productSupplierAddress" type="text" name="productSupplierAddress"  :class="{ 'is-invalid': form.errors.has('productSupplierAddress') }" placeholder="Product Supplier Address" class="form-control"></textarea>
                  <has-error :form="form" field="productSupplierAddress"></has-error>
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
        <h3 style="color:black">Shop Product Supplier List</h3>
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
               <th>Create Date</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(productSupplierAllData, index) in productSupplierAllDatas.data">
                <td>{{ index+1 }}</td>
                <td>{{ productSupplierAllData.productSupplierName }}</td>
                <td>{{ productSupplierAllData.productSupplierCode }}</td>
                <td>{{ productSupplierAllData.productSupplierPhone }}</td>
                <td>{{ productSupplierAllData.productSupplierHotLine }}</td>
                <td>{{ productSupplierAllData.productSupplierMail }}</td>
                <td>{{ productSupplierAllData.productSupplierWeb }}</td>
                <td>{{ productSupplierAllData.productSupplierFb }}</td>
                <td>{{ productSupplierAllData.productSupplierImo }}</td>
                <td>{{ productSupplierAllData.productSupplierAddress }}</td>
                <td>{{ productSupplierAllData.created_at }}</td>
                <td>
                     <router-link :to="`/shopproductsupplier@entryEdit${productSupplierAllData.productSupplierId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                     <button type="button" @click="distroy(productSupplierAllData.productSupplierId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>
              </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="productSupplierAllDatas" :limit="limit"  @pagination-change-page="getPaginateList">
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
                    productSupplierName : '',
                    productSupplierCode: '',
                    productSupplierPhone: '',
                    productSupplierHotLine: '',
                    productSupplierMail: '',
                    productSupplierWeb: '',
                    productSupplierFb: '',
                    productSupplierImo: '',
                    productSupplierAddress: '',
                }),
                productSupplierAllDatas: {},
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
            addProductSupplierCreate(){
                this.form.post('/addProductSupplier').then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Product Supplier Entry Successfully'
                    })
                    this.form.reset();
                    this.getData();
                    this.autoIncrementCode();
                })
            },

            getData(){
                axios.get('/addProductSupplier').then(res =>{
                    this.productSupplierAllDatas = res.data.productSupplierGetData;
                })
            },
            getPaginateList(page = 1){
              axios.get('/addProductSupplier?page=' + page)
              .then(response => {
                 this.productSupplierAllDatas = response.data.productSupplierGetData;
              });
            },
            autoIncrementCode(){
                axios.get('/addProductSupplier/create').then(res =>{
                    this.form.productSupplierCode = res.data.autoIncrementCode;
                })
            },

            distroy(productSupplierId){
                axios.delete('/addProductSupplier/'+productSupplierId).then(res=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Delete Succuss'
                    })
                    this.getData();
                })
            },
        }

    }

</script>
