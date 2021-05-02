<template id="">
  <span>
     <div class="card main-card  element-block-example">
         <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
           <h3 style="color:black">Product Supplier Report</h3>
          </div>
          <div class="table-responsive bg-white" v-if="authInfo.role != 1 && authInfo.role != 2">
           <table class="table table-hover table-bordered mb-0">
             <thead>
                <tr style="background:rgba(242, 242, 242, 0.47)">
                  <th>SN</th>
                  <th>Supplier Name</th>
                  <th>Supplier Code</th>
                  <th>Supplier Phone</th>
                  <th>Supplier HotLine</th>
                  <th>Supplier Mail</th>
                  <th>Supplier Fb</th>
                  <th>Supplier Web</th>
                  <th>Supplier Imo</th>
                  <th>Supplier Address</th>
                </tr>
               </thead>
              <tbody >
                <tr v-for="(productSupplierGetData , index) in  productSupplierGetDatas.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ productSupplierGetData.productSupplierName }}</td>
                  <td>{{ productSupplierGetData.productSupplierCode }}</td>
                  <td>{{ productSupplierGetData.productSupplierPhone }}</td>
                  <td>{{ productSupplierGetData.productSupplierHotLine }}</td>
                  <td>{{ productSupplierGetData.productSupplierMail }}</td>
                  <td>{{ productSupplierGetData.productSupplierFb }}</td>
                  <td>{{ productSupplierGetData.productSupplierWeb }}</td>
                  <td>{{ productSupplierGetData.productSupplierImo }}</td>
                  <td>{{ productSupplierGetData.productSupplierAddress }}</td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="productSupplierGetDatas" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
      </div>
  </span>
</template>
<script>
    export default {
        data(){
            return{
                authInfo:{},
                productSupplierGetDatas:{},
            }
        },
        props:{
          limit: {
            type: Number,
            default: 2
          }
        },
        mounted(){
            this.condition();
            this.productSupplierList();
            this.getPaginateList();
        },
        methods:{
            productSupplierList(){
              axios.get('/productSupplierList').then(res =>{
                  this.productSupplierGetDatas = res.data.productSupplierGetData
              })
            },
            getPaginateList(page = 1){
              axios.get('/productSupplierList?page=' + page)
              .then(response => {
                  this.productSupplierGetDatas = response.data.productSupplierGetData;
              });
            },
            condition(){
                axios.get('/condition').then(res =>{
                    this.authInfo = res.data.authInfo
                })
            },
        }
    }

</script>
