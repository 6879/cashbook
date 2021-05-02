<template>
  <span>
    <div class="card main-card  element-block-example" v-if="role.role != 1 && role.role != 2">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Brand With Product Shortage</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
            <tbody>
               <tr  v-for="(purchaseBrandList, index) in purchaseBrandLists.data">
                  <th  class="text-center px-0 " v-if="purchaseBrandList.brand_name"><h5>{{ purchaseBrandList.brand_name.brandName }}</h5>
                    <tr style="background:rgba(242, 242, 242, 0.47)">
                      <th style="width:330px">SN</th>
                      <th style="width:330px">Product Name</th>
                      <th style="width:330px">Unit</th>
                      <th style="width:330px">Quantity</th>
                      <th style="width:330px">Unit Price</th>
                      <th style="width:330px">Total Price</th>
                    </tr>
                    <tr v-for="(purchaseProductList, index) in purchaseProductLists" v-if="purchaseProductList.brandId == purchaseBrandList.brandId">
                        <td>{{ index+1 }}</td>
                        <td v-if="purchaseProductList.product_name">{{ purchaseProductList.product_name.productName }} ({{ purchaseProductList.product_name.productCode }})</td>
                        <td v-if="purchaseProductList.unit_name">{{ purchaseProductList.unit_name.uniteEntryName }}</td>
                        <td>{{ purchaseProductList.quantity }}</td>
                        <td>{{ purchaseProductList.unitPrice }}</td>
                        <td>{{ purchaseProductList.totalPrice }}</td>
                   </tr>
                </th>
             </tr>
           </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="purchaseBrandLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
              purchaseBrandLists: {},
              purchaseProductLists: {},
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
                axios.get('/brandWithProductShortage').then(res =>{
                   this.purchaseBrandLists = res.data.purchaseBrandLists;
                   this.purchaseProductLists = res.data.purchaseProductLists;
                })
            },
            getPaginateList(page = 1){
              axios.get('/brandWithProductShortage?page=' + page).then(response => {
                 this.purchaseBrandLists = response.data.purchaseBrandLists;
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
