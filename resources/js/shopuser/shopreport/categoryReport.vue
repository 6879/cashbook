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
            Category Report
            <div class="page-title-subheading"> Category Report </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link
            to="/productbrand@list"
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

    <div class="card main-card element-block-example">
      <div class="card-header-tab card-header alert-info">
        <h4>
          <i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          Category Report
        </h4>
      </div>

      <div class="card-body table-responsive bg-white">
        



        <table
          style="width: 100%"
          id="example"
          class="table table-hover table-bordered bordered"
        >
          <tbody
            v-for="shopTypelist in shopTypelists"
            :key="shopTypelist.shopTypeEntryId"
            v-if="
              myGuard == 'web' ||
              (myGuard == 'admin' &&
                authInfos.shopTypeId == shopTypelist.shopTypeEntryId)
            "
          >
            <tr>
              <th colspan="12" class="text-center alert-success">
                <h4>{{ shopTypelist.shopTypeName }}</h4>
              </th>
            </tr>
            
            
            
            <tr
              v-for="(categoryReportList, index) in categoryReportLists"
              :key="categoryReportList.categoryId"
              v-if="categoryReportList.shopTypeId == shopTypelist.shopTypeEntryId"
            >
              <td>{{ ++index }}</td>
              <td>
                
                
                        
        <div id="test" class="tree">
          <ul>
            <li class="parent_li">
              <span v-if="authInfos.shopId==categoryReportList.createBy" class="text-danger"> {{ categoryReportList.categoryName }}  </span>
              <span v-else="" class="opacity-3"> {{ categoryReportList.categoryName }}  </span>
                    <ul>
                        <li class="parent_li"
                        v-for="ownSubCategoryReportList in ownSubCategoryReportLists"
                        :key="ownSubCategoryReportList.categoryId"
                        v-if="categoryReportList.categoryId == ownSubCategoryReportList.previousId"
                        >
                        <span v-if="authInfos.shopId==ownSubCategoryReportList.createBy" class="text-danger">
                             {{ ownSubCategoryReportList.categoryName }}  </span>
                        <span v-else="" class="opacity-3"> {{ ownSubCategoryReportList.categoryName }}  </span>




                        <ul>
                        <li class="parent_li"
                        v-for="ownThirdCategoryReportList in ownThirdCategoryReportLists"
                        :key="ownThirdCategoryReportList.categoryId"
                        v-if="ownSubCategoryReportList.categoryId == ownThirdCategoryReportList.previousId"
                        >
                        <span v-if="authInfos.shopId==ownThirdCategoryReportList.createBy" class="text-danger">
                             {{ ownThirdCategoryReportList.categoryName }}  </span>
                        <span v-else="" class="opacity-3"> {{ ownThirdCategoryReportList.categoryName }}  </span>
                        </li>
                    </ul>

                    
                        </li>
                    </ul>
              
            </li>
          </ul>
        </div>
 
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
  data() {
    return {
      myGuard: "",
      authInfos: [],
      shopTypelists: [],

      categoryReportLists: {},
      categoryReportLists1: {},
      ownSubCategoryReportLists: {},
      ownThirdCategoryReportLists: {},
      ownFourthCategoryReportLists: {},
      ownFifthCategoryReportLists: {},
      ownSixCategoryReportLists: {},
      ownSevenCategoryReportLists: {},
      ownEightCategoryReportLists: {},
      ownNineCategoryReportLists: {},
      ownTenCategoryReportLists: {},

      globalSubCategoryReportLists: {},
      globalThirdCategoryReportLists: {},
      globalFourthCategoryReportLists: {},
      globalFifthCategoryReportLists: {},
      globalSixCategoryReportLists: {},
      globalSevenCategoryReportLists: {},
      globalEightCategoryReportLists: {},
      globalNineCategoryReportLists: {},
      globalTenCategoryReportLists: {},
    };
  },

  mounted() {
    this.shopIncomeTypeReportList();
    this.shopIncomeTypeReportList1();
    this.getShopType();
    this.getMyGuard();
    this.getAuthInfo();
    this.ownSubCategoryReportList();
    this.globalSubCategoryReportList();
  },
  methods: {
    getAuthInfo() {
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

    getMyGuard() {
      axios.get("/getMyGuard").then((res) => {
        this.myGuard = res.data.myGuard;
      });
    },

    shopIncomeTypeReportList() {
      axios.get("/shopcategoryReportList/" + 1).then((res) => {
        this.categoryReportLists = res.data.shopcategoryReportList;
      });
    },

    ownSubCategoryReportList() {
      axios.get("/ownSubCategoryReportList/"+1).then((res) => {
        this.ownSubCategoryReportLists = res.data.ownSubCategoryReportList;
        this.ownThirdCategoryReportLists = res.data.ownThirdCategoryReportLists;
        this.ownFourthCategoryReportLists = res.data.ownFourthCategoryReportLists;
        this.ownFifthCategoryReportLists = res.data.ownFifthCategoryReportLists;
        this.ownSixCategoryReportLists = res.data.ownSixCategoryReportLists;
        this.ownSevenCategoryReportLists = res.data.ownSevenCategoryReportLists;
        this.ownEightCategoryReportLists = res.data.ownEightCategoryReportLists;
        this.ownNineCategoryReportLists = res.data.ownNineCategoryReportLists;
        this.ownTenCategoryReportLists = res.data.ownTenCategoryReportLists;
      });
    },
    

    globalSubCategoryReportList() {
      axios.get("/ownSubCategoryReportList/"+2).then((res) => {
        this.globalSubCategoryReportLists = res.data.globalSubCategoryReportList;
        this.globalThirdCategoryReportLists = res.data.globalThirdCategoryReportLists;
        this.globalFourthCategoryReportLists = res.data.globalFourthCategoryReportLists;
        this.globalFifthCategoryReportLists = res.data.globalFifthCategoryReportLists;
        this.globalSixCategoryReportLists = res.data.globalSixCategoryReportLists;
        this.globalSevenCategoryReportLists = res.data.globalSevenCategoryReportLists;
        this.globalEightCategoryReportLists = res.data.globalEightCategoryReportLists;
        this.globalNineCategoryReportLists = res.data.globalNineCategoryReportLists;
        this.globalTenCategoryReportLists = res.data.globalTenCategoryReportLists;
      });
    },

    shopIncomeTypeReportList1() {
      axios.get("/shopcategoryReportList/" + 2).then((res) => {
        this.categoryReportLists1 = res.data.categoryReportLists1;
      });
    },
  },
};
</script>








<style>
.tree {
    min-height:20px; 
    
}
.tree li {
    list-style-type:none;
    margin:0;
    padding:10px 5px 0 5px;
    position:relative
}
.tree li::before, .tree li::after {
    content:'';
    left:-20px;
    position:absolute;
    right:auto
}
.tree li::before {
    border-left:1px solid #999;
    bottom:50px;
    height:100%;
    top:0;
    width:1px
}
.tree li::after {
    border-top:1px solid #999;
    height:20px;
    top:25px;
    width:25px
}
.tree li span:not(.glyphicon) {
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    display:inline-block;
    padding:4px 9px;
    text-decoration:none
}
.tree li.parent_li>span:not(.glyphicon) {
    cursor:pointer
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0
}
.tree li:last-child::before {
    height:30px
}
.tree li.parent_li>span:not(.glyphicon):hover, .tree li.parent_li>span:not(.glyphicon):hover+ul li span:not(.glyphicon) {
    background:#eee;
    border:1px solid #999;
    padding:3px 8px;
    color:#000
}    
</style>
