<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Low Quantity Product Report </h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Product Name</th>
               <th>Product Quantity</th>
               <th>Product Unit Name</th>
               <th>Product Unit Price</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="(lowQuantityProductList, index) in lowQuantityProductLists.data">
                 <td>{{ index+1 }}</td>
                 <td v-if="lowQuantityProductList.product_name">{{ lowQuantityProductList.product_name.productName }}</td>
                 <td>
                   <div>
                       <button  class="border py-1 px-2 btn-hover-shine btn-danger">{{ lowQuantityProductList.quantity }}</button>
                   </div>
                 </td>
                 <td v-if="lowQuantityProductList.unit_name">{{ lowQuantityProductList.unit_name.uniteEntryName }}</td>
                 <td>{{ lowQuantityProductList.unitPrice }}</td>
               </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="lowQuantityProductLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
             lowQuantityProductLists:{},
             role:{},
          }
      },
      props:{
           limit: {
             type: Number,
             default: 2
         }
      },
      mounted(){
         this.lowQuantityProductList();
         this.getPaginateList();
         this.conditon();
      },
      methods:{
          lowQuantityProductList(){
            axios.get('/lowQuantityProductList').then(res =>{
                this.lowQuantityProductLists =  res.data.lowQuantityProductList
            })
          },
          getPaginateList(page = 1){
            axios.get('/lowQuantityProductList?page=' + page)
            .then(response => {
              this.lowQuantityProductLists = response.data.lowQuantityProductList;
            });
          },
          conditon(){
              axios.get('/condition').then(res =>{
                 this.role = res.data.authInfo;
              })
          },
      }
    }
</script>
