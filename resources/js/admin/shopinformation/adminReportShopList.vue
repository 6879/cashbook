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
            Shop Report
            <div class="page-title-subheading">
               Shop Report
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/qrCodeSetup"
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




    <div class="card mt-5">
      <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Shop Report </h4>
      </div>

      <div class="supplier-entry py-4 px-2">
         <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered"
        >
              <tr>
                <th colspan="12" class="text-center"> 
                  <center>
                    <form method="" @submit.prevent="shopListSearch()">
                      <table class="">
                        <tr>
                            <td> <input v-model="form.searchBox" type="text" class="form-control" placeholder="Shop Name Or ID"> </td>
                            <td> <input type="submit" class="btn btn-primary"> </td>
                            <td> <input type="reset" class="btn btn-primary"
                            @click="view()"> 
                            </td>
                        </tr>
                      </table>
                  </form>
                  </center> 
                   </th>
              </tr>
          
            <tbody v-for="(shopTypelist) in shopTypelists" :key="shopTypelist.shopTypeEntryId" v-if="tableDefault">
              <tr>
                <th colspan="12" class="text-center"> <h4> {{shopTypelist.shopTypeName}}  </h4> </th>
              </tr>
              <tr>
                <th> SL </th>
                <th> Registration Date </th>
                <th> Billing Date </th>
                <th> Shop ID </th>
                <th> Shop Reffered By </th>
                <th> Shop Name </th>
                <th> User Name </th>
                <th> Shop Status </th>
                <th> Branch Permit </th>
                <th> Payment Status </th>
                <th> Statement </th>
                <th> Action </th>
              </tr>
            
            
              <tr v-for="(shopList, index) in shopLists" :key="shopList.id" v-if="shopList.shopTypeId==shopTypelist.shopTypeEntryId">
                <td> {{ ++index }} </td>
                <td>{{ moment(shopList.created_at).format("DD-MM-YYYY") }}</td>
                <td>{{ moment(shopList.updated_at).format("DD-MM-YYYY") }}</td>
                <td>{{ shopList.shopSirialId }}</td>
                <td>
                    <span v-for="userList in userLists" v-if="userList.id==shopList.refferUserId">
                        {{ userList.name }}
                    </span>
                     
                </td>
                <td>{{ shopList.shopName }}</td>
                <td>{{ shopList.email }}</td>
                <td>
                  <span v-for="shopStatus in shopStatuss" v-if="shopStatus.id==shopList.status">
                  {{ shopStatus.statusName }}
                  </span>
                  </td>
                <td>{{ shopList.totalBranch }}</td> 
                <td>
                  <span v-for="paymentStatusList in paymentStatuss" v-if="paymentStatusList.id==shopList.paymentStatus">
                  {{ paymentStatusList.paymentStatusName }}
                  </span>
                  </td>
                <td>
                  <router-link
                    :to="`/qrCodeSetup@Edit${qrCodeSetup.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> Statement </router-link
                  >
                  <router-link
                    :to="`/shopBranch@update${shopList.id}`" 
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine">
                      Update </router-link>
                      <br>
                      <router-link
                    :to="`/shopBillDate@Update${shopList.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine">
                      Billing Date </router-link>
                </td>
                <td>
                  <router-link
                    :to="`/qrCodeSetup@Edit${qrCodeSetup.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> View </router-link
                  >
                </td>
                 
              </tr>
            </tbody>




            
            <tbody v-if="tableSearch">
              <tr>
                <th> SL sddsds</th>
                <th> Registration Date </th>
                <th> Billing Date </th>
                <th> Shop ID </th>
                <th> Shop Reffered By </th>
                <th> Shop Name </th>
                <th> User Name </th>
                <th> Shop Status </th>
                <th> Branch Permit </th>
                <th> Payment Status </th>
                <th> Statement </th>
                <th> Action </th>
              </tr>
            
            
              <tr v-for="(shopListSearch, index) in shopListSearchs" :key="shopListSearch.id">
                <td> {{ ++index }} </td>
                <td>{{ moment(shopListSearch.created_at).format("DD-MM-YYYY") }}</td>
                <td>{{ moment(shopListSearch.updated_at).format("DD-MM-YYYY") }}</td>
                <td>{{ shopListSearch.shopSirialId }}</td>
                <td>
                    <span v-for="userList in userLists" v-if="userList.id==shopListSearch.refferUserId">
                        {{ userList.name }}
                    </span>
                     
                </td>
                <td>{{ shopListSearch.shopName }}</td>
                <td>{{ shopListSearch.email }}</td>
                <td>
                  <span v-for="shopStatus in shopStatuss" v-if="shopStatus.id==shopListSearch.status">
                  {{ shopStatus.statusName }}
                  </span>
                  </td>
                <td>{{ shopListSearch.totalBranch }}</td> 
                <td>
                  <span v-for="paymentStatusList in paymentStatuss" v-if="paymentStatusList.id==shopListSearch.paymentStatus">
                  {{ paymentStatusList.paymentStatusName }}
                  </span>
                  </td>
                <td>
                  <router-link
                    :to="`/shopBranchUpdate${shopListSearch.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> Statement </router-link>
                  <router-link
                    :to="`/shopBranchUpdate${shopListSearch.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine">
                      Update </router-link>
                  <router-link
                    :to="`/shopBillDateUpdate${shopListSearch.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine">
                      Billing Date </router-link>
                </td>
                <td>
                  <router-link
                    :to="`/qrCodeSetup@Edit${qrCodeSetup.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> View </router-link
                  >





                </td>
                 
              </tr>
              <tr v-if="resultNotFound">
                <td colspan="16">
                  <center> Result Not Found. </center>
                </td>
              </tr>
            </tbody>
 
          </table>

          
  
  




  



        </div>
      </div>
    </div>
  </span>
</template>

<script>
import moment from 'moment';
export default {

  
  data() {
    return {
      tableDefault:true,
      tableSearch:false,
      qrCodeSetups: [],
      shopTypelists: [],
      shopLists: [],
      userLists: [],
      shopStatuss: [],
      paymentStatuss: [],
      shopListSearchs: [],
      resultNotFound: false,
      moment: moment,

      image: "",
      form: new Form({
        searchBox: "",
      }),
      qrCodeSetup: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {
    this.view();
    this.getpaymentStatus();
    this.getShopStatus();
    this.getShopType();
    this.getUserInfo();
  },
  methods: {


    view() {
      this.form.searchBox = '';
      this.tableDefault = true;
      this.tableSearch = false;

      let url = "shopInformation";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.shopLists = response.data;
        });
    },

    shopListSearch() {
      this.tableDefault = false;
      this.tableSearch = true;
      let url = 'shopInformationSearch/'+this.form.searchBox;
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          if(response.data == ''){
            this.resultNotFound = true;
          }
          
            this.shopListSearchs = response.data;
        
          
        });
    },


    getShopStatus() {
      let url = "shopStatus";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.shopStatuss = response.data;
        });
    },
    getpaymentStatus() {
      let url = "paymentStatus";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.paymentStatuss = response.data;
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


    getUserInfo() {
      let url = "getUserInfo";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.userLists = response.data;
        });
    },


    
  },
};
</script>