<template>
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Expired Date Soon Product Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>Product Name</th>
               <th>Mfg Date</th>
               <th>Exp Date</th>
               <th>Expired Date Soon</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="expireDateSoonProductList in expireDateSoonProductLists.data">
                 <td v-if="expireDateSoonProductList.product_name">{{ expireDateSoonProductList.product_name.productName }} ({{ expireDateSoonProductList.product_name.productCode }})</td>
                 <td v-if="expireDateSoonProductList.mfgDate">{{ expireDateSoonProductList.mfgDate }}</td>
                 <td v-if="expireDateSoonProductList.expiryDate">{{ expireDateSoonProductList.expiryDate }}</td>
                 <td>
                     <span v-if="parseFloat(expireDateSoonProductList.expiryDate.split('-')[1]) - parseFloat(currentDateMonth.split('/')[0])">
                       <button  class="border py-1 px-2 btn-hover-shine btn-danger">{{ parseFloat(expireDateSoonProductList.expiryDate.split('-')[1]) - parseFloat(currentDateMonth.split('/')[0]) }} Month</button>
                     </span>
                     <span v-if="parseFloat(expireDateSoonProductList.expiryDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) ">
                       <button  class="border py-1 px-2 btn-hover-shine btn-danger">{{ parseFloat(expireDateSoonProductList.expiryDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) }} Day</button>
                     </span>
                     <span v-if="parseFloat(expireDateSoonProductList.expiryDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) == 0">
                        <button  class="border py-1 px-2 btn-hover-shine btn-danger">0 Day</button>
                     </span>
                 </td>
               </tr>
            </tbody>
         </table>
       </div>
       <span class="card_footer">
         <pagination :data="expireDateSoonProductLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
             expireDateSoonProductLists:{},
             currentDateMonth:{},
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
         this.expireDateSoonProductList();
         this.getPaginateList();
         this.conditon();
      },
      methods:{
          expireDateSoonProductList(){
            axios.get('/expireDateSoonProductList').then(res =>{
                this.expireDateSoonProductLists =  res.data.expireDateSoonProductLists
                this.currentDateMonth = new Date().toLocaleString().split(',')[0];
            })
          },
          getPaginateList(page = 1){
             axios.get('/expireDateSoonProductList?page=' + page).then(response => {
               this.expireDateSoonProductLists = response.data.expireDateSoonProductLists;
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
