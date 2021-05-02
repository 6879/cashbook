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
            Product Brand Report
            <div class="page-title-subheading">
             Product Brand Report
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/productbrand@list"
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


 
    <div class="card main-card  element-block-example">
        <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Product Brand Report  </h4> 
        </div>
        
        
              <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-bordered bordered">

            <tbody v-for="(shopTypelist) in shopTypelists" :key="shopTypelist.shopTypeEntryId"
             v-if="(myGuard=='web') || (myGuard=='admin' && (authInfos.shopTypeId==shopTypelist.shopTypeEntryId))">
              <tr>
                <th colspan="12" class="text-center alert-success"> <h4> {{shopTypelist.shopTypeName}}  </h4> </th>
              </tr>
              <tr>
                <td colspan="2" class="text-center alert-light">
                 <span class="badge badge-success"> Owner </span>
                </td>
              </tr>
              <tr v-for="(productBrandReportList, index) in productBrandReportLists"
               :key="productBrandReportList.productBrandEntryId" 
              v-if="productBrandReportList.shopTypeId==shopTypelist.shopTypeEntryId">
                <td> {{ ++index }} </td>
                <td> {{ productBrandReportList.productBrandName }} </td>
              </tr>

              <tr>
                <td colspan="2" class="text-center alert-light">
                  <span class="badge badge-success"> Global </span>
                </td>
              </tr>
              <tr v-for="(productBrandReportList1, index) in productBrandReportLists1"
               :key="productBrandReportList1.productBrandEntryId" 
              v-if="productBrandReportList1.shopTypeId==shopTypelist.shopTypeEntryId">
                <td> {{ ++index }} </td>
                <td> {{ productBrandReportList1.productBrandName }} </td>
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
              myGuard:'',
              authInfos: [],
              shopTypelists: [],
                productBrandReportLists:{},
                productBrandReportLists1:{},
            }
        },

        mounted(){
            this.shopIncomeTypeReportList();
            this.shopIncomeTypeReportList1();
            this.getShopType();
            this.getMyGuard();
            this.getAuthInfo();
        },
        methods:{

      getAuthInfo(){
        let url = "getAuthInfo";
        fetch(url)
            .then((response) => response.json())
            .then((response) => {
            this.authInfos = response.data; 
        
            });
           
        },
          
    getShopType() {
      let url = "shopTypeEntry";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.shopTypelists = response.data;
        });
    },

            getMyGuard(){
                axios.get('/getMyGuard').then(res =>{
                 
                    this.myGuard = res.data.myGuard;
 
                })
            },
            
            shopIncomeTypeReportList(){
                axios.get('/shopProductBrandReportList/'+1).then(res =>{
                 
                    this.productBrandReportLists = res.data.owneProductBrandReport;
 
                })
            },
            shopIncomeTypeReportList1(){
                axios.get('/shopProductBrandReportList/'+2).then(res =>{
                   
                    this.productBrandReportLists1 = res.data.globalProductBrandReport;
                  
                })
            },

        }
    }

</script>
