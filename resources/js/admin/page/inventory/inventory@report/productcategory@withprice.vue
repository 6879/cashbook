<template>
  <span>
    <div class="card main-card  element-block-example" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Product Category With Price</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
            <tbody>
               <tr  v-for="(productPriceSetupCategory, index) in productPriceSetupCategorys.data">
                  <th  class="text-center px-0 " v-if="productPriceSetupCategory.category_name"><h5>{{ productPriceSetupCategory.category_name.categoryName }}</h5>
                    <tr style="background:rgba(242, 242, 242, 0.47)">
                      <th>SN</th>
                      <th>Product Name</th>
                      <th>Brand Name</th>
                      <th>Batch No</th>
                      <th>Model No</th>
                      <th>Mfg Date</th>
                      <th>Exp Date</th>
                      <th>MRP</th>
                      <th>Sales Price</th>
                      <th>Whole Sales Price</th>
                      <th>Relative Sales Price</th>
                      <th>Notification</th>
                    </tr>
                    <tr v-for="(productPriceSetupProduct, index) in productPriceSetupProducts" v-if="productPriceSetupCategory.categoryId == productPriceSetupProduct.categoryId">
                        <td>{{ index+1 }}</td>
                        <td v-if="productPriceSetupProduct.product_name">{{ productPriceSetupProduct.product_name.productName }}</td>
                        <td v-if="productPriceSetupProduct.product_brand_name">{{ productPriceSetupProduct.product_brand_name.productBrandName }}</td>
                        <td>{{ productPriceSetupProduct.batchNo }}</td>
                        <td>{{ productPriceSetupProduct.modelNo }}</td>
                        <td>{{ productPriceSetupProduct.mfgDate }}</td>
                        <td>{{ productPriceSetupProduct.expDate }}</td>
                        <td>{{ productPriceSetupProduct.mrp }}</td>
                        <td>{{ productPriceSetupProduct.salesPrice }}</td>
                        <td>{{ productPriceSetupProduct.holeSalesPrice }}</td>
                        <td>{{ productPriceSetupProduct.relativePrice }}</td>
                        <td>{{ productPriceSetupProduct.notification }}</td>
                   </tr>
                </th>
             </tr>
           </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="productPriceSetupCategorys" :limit="limit"  @pagination-change-page="getPaginateList">
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
          return {
              productPriceSetupCategorys: {},
              productPriceSetupProducts: {},
              role: {},
          }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        mounted(){
           this.categoryList();
           this.getPaginateList();
           this.conditon();
        },
        methods:{
            categoryList(){
                axios.get('/invetoryCategoryWithPriceList').then(res =>{
                   this.productPriceSetupCategorys = res.data.productPriceSetupCategory;
                   this.productPriceSetupProducts = res.data.productPriceSetupProduct;
                })
            },
            getPaginateList(page = 1){
              axios.get('/invetoryCategoryWithPriceList?page=' + page).then(response => {
                 this.productPriceSetupCategorys = response.data.productPriceSetupCategory;
              });
            },
            conditon(){
                axios.get('/condition').then(res =>{
                   this.role = res.data.authInfo;
                })
            },
        },
    }
</script>
