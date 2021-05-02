<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Expired Date Over Product Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>Product Name</th>
               <th>Mfg Date</th>
               <th>Exp Date</th>
               <th>Expired Date Over</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="expireDateOverProductList in expireDateOverProductLists.data" >
                 <td v-if="expireDateOverProductList.product_name">{{ expireDateOverProductList.product_name.productName }} ({{ expireDateOverProductList.product_name.productCode }})</td>
                 <td v-if="expireDateOverProductList.mfgDate">{{ expireDateOverProductList.mfgDate }}</td>
                 <td v-if="expireDateOverProductList.expiryDate">{{ expireDateOverProductList.expiryDate }}</td>
                 <td>
                   <div>
                       <button  class="border py-1 px-2 btn-hover-shine btn-danger">Date Expired</button>
                   </div>
                 </td>
               </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="expireDateOverProductLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
             expireDateOverProductLists:{},
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
         this.expireDateOverProductList();
         this.getPaginateList();
         this.conditon();
      },
      methods:{
          expireDateOverProductList(){
            axios.get('/expireDateOverProductList').then(res =>{
                this.expireDateOverProductLists =  res.data.expireDateOverProductLists
            })
          },
          getPaginateList(page = 1){
             axios.get('/expireDateOverProductList?page=' + page).then(response => {
               this.expireDateOverProductLists = response.data.expireDateOverProductLists;
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
