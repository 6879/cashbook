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
          Product Brand Report (Owner)   </h4> 
        </div>
        
        
              <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">

            <thead>
               <tr>
                 <th>SN </th>
                 <th>Product Brand</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(productBrandReportList, index) in productBrandReportLists">
                   <td>{{ index+1 }}</td>
                   <td>{{ productBrandReportList.productBrandName }}</td>
                </tr>
              </tbody>
           </table>
         </div>
     </div>


 
    <div class="card main-card  element-block-example mt-5">
        <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Product Brand Report (Global)   </h4> 
        </div>
        
        
              <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">

            <thead>
               <tr>
                 <th>SN </th>
                 <th>Product Brand</th>
                 <th> Shop Name  </th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(productBrandReportList1, index1) in productBrandReportLists1">
                   <td>{{ index1+1 }}</td>
                   <td>{{ productBrandReportList1.productBrandName }}</td>
                   <td>
                     <!-- {{ productBrandReportList1.createBy }} -->
                     <span  v-for="userInfo in userInfos"
                    :key="userInfo.id" v-if="userInfo.id==productBrandReportList1.createBy">
                    {{ userInfo.name }}
                    <br>
                    </span>

                     <span  v-for="shopInfo in shopInfos"
                    :key="shopInfo.shopInfoId" v-if="shopInfo.shopInfoId==productBrandReportList1.createBy">
                   
                    <br>
                    <font class="badge badge-outline-pill badge-success btn-hover-shine"> {{ shopInfo.shopTypeName }} </font>
                    </span>
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
                productBrandReportLists:{},
                productBrandReportLists1:{},
                userInfos:{},
                shopInfos:{},
            }
        },

        mounted(){
            this.shopIncomeTypeReportList();
            this.shopIncomeTypeReportList1();
            this.getUserInfo();
            this.getShopInfo();
        },
        methods:{
            shopIncomeTypeReportList(){
                axios.get('/shopProductBrandReportListForAdmin/'+1).then(res =>{
                    this.productBrandReportLists = res.data.owneProductBrandReport;
                })
            },
            shopIncomeTypeReportList1(){
                axios.get('/shopProductBrandReportListForAdmin/'+2).then(res =>{
                    this.productBrandReportLists1 = res.data.globalProductBrandReport;
                })
            },
            getUserInfo(){
              // alert(productBrandReportLists1.createBy);
                axios.get('getUserInfo/').then(res =>{
                    this.userInfos = res.data.data;
                })
            },
            getShopInfo(){
              // alert(productBrandReportLists1.createBy);
                axios.get('getUserInfoWtihShopType/').then(res =>{
                    this.shopInfos = res.data.data;
                })
            },

        }
    }

</script>
