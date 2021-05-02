<template id="">
  <span>
     <div class="card main-card  element-block-example">
         <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h3 style="color:black">Asset Supplier Report</h3>
          </div>
          <div class="table-responsive bg-white" v-if="authInfo.role != 1 && authInfo.role != 2">
           <table class="table table-hover table-bordered table-striped">
             <thead>
                <tr>
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
                <tr v-for="(assetSupplierGetData , index) in  assetSupplierGetDatas.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierName }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierCode }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierPhone }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierHotLine }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierMail }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierFb }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierWeb }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierImo }}</td>
                  <td>{{ assetSupplierGetData.assetSupplierAddress }}</td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="assetSupplierGetDatas" :limit="limit"  @pagination-change-page="getPaginateList">
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
                assetSupplierGetDatas:{},
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
              axios.get('/assetSupplierList').then(res =>{
                  this.assetSupplierGetDatas = res.data.assetSupplierGetData;
              })
            },
            getPaginateList(page = 1){
              axios.get('/assetSupplierList?page=' + page)
              .then(response => {
                  this.assetSupplierGetDatas = response.data.assetSupplierGetData;
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
