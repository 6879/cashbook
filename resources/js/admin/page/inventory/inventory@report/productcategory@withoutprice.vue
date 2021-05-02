<template>
  <span>
    <div class="card main-card  element-block-example" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.46);border:1px solid rgba(0, 0, 0, 0.12)">
        <h3 style="color:black">Product Category Without Price</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
            <tbody>
               <tr  v-for="(productPriceSetupCategory, index) in productPriceSetupCategorys.data">
                   <th  class="text-center px-0 " v-if="productPriceSetupCategory.category_name"><h5>{{ productPriceSetupCategory.category_name.categoryName }}</h5>
                   <tr v-for="productPriceSetupCategoryProduct in  productPriceSetupCategoryProducts" v-if="productPriceSetupCategory.categoryId == productPriceSetupCategoryProduct.categoryId">

                        <th>
                          <tr v-for="productName in  productNames" v-if="productPriceSetupCategoryProduct.productNameId == productName.productNameId">
                              <td v-if="productPriceSetupCategoryProduct.productNameId != productName.productNameId">
                                {{ productName.productName }}
                              </td>
                          </tr>
                      </th>
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
              productPriceSetupCategoryProducts: {},
              productPriceSetupProducts: {},
              productNames: {},
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
                axios.get('/invetoryCategoryWithoutPriceList').then(res =>{
                   this.productPriceSetupCategorys = res.data.productPriceSetupCategory;
                   this.productPriceSetupCategoryProducts = res.data.productPriceSetupCategoryProduct;
                   this.productPriceSetupProducts = res.data.productPriceSetupProduct;
                   this.productNames = res.data.productName;
                })
            },
            getPaginateList(page = 1){
              axios.get('/invetoryCategoryWithoutPriceList?page=' + page).then(response => {
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
