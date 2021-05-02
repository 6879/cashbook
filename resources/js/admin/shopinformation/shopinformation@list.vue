<template>
   <span>
     <div class="card main-card  element-block-example mt-5">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Shop Information</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Name</th>
               <th>Shop Serial Id</th>
               <th>Shop User Name</th>
               <th>Password</th>
               <th>Last LoginIp</th>
               <th>ReferType</th>
               <th>Refer UserId</th>
               <th>Shop TypeId</th>
               <th>Shop Status</th>
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
               <tr v-for="(shopInformation, index) in shopInformations">
                 <td>{{ index+1 }}</td>
                 <td>{{ shopInformation.shopName }}</td>
                 <td>{{ shopInformation.shopSerialId }}</td>
                 <td>{{ shopInformation.shopUserName }}</td>
                 <td>{{ shopInformation.password }}</td>
                 <td>{{ shopInformation.lastLoginIp }}</td>
                 <td>{{ shopInformation.referType }}</td>
                 <td>{{ shopInformation.referUserId }}</td>
                 <td>{{ shopInformation.shopTypeId }}</td>
                 <td>{{ shopInformation.shopStatus }}</td>
                 <td>
                    <router-link :to="`/bank@entryEdit${shopInformation.shopInfoId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                     <button type="button" @click="deleteBankEntry(shopInformation.shopInfoId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
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
                shopInformations: [],
            }

        },
        mounted() {
            this.showShopInformationList();
        },
        methods: {
            showShopInformationList() {
                axios.get('/adminshopInformation').then(res => {
                    this.shopInformations = res.data.shopInformations
                })
            },

        }
    }
</script>
