<template>
   <span>
  <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Shop Address Location</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th>Shop Name </th>
               <th>Country Name</th>
               <th>Division Name</th>
               <th>District Name</th>
               <th>Thana Name</th>
               <th>Union Name</th>
               <th>World Name</th>
               <th>Address1</th>
               <th>Address2</th>
               <th>Shop Front</th>
               <th>Shop Book</th>
               <th>Shop Left</th>
               <th>Shop Right</th>
               <th>Shop Size By Sqft</th>
               <th>Market Name</th>
               <th>shop No</th>
               <th>Web site Url</th>
               <th>Facebook Url</th>
               <th>Youtube Url</th>
               <th>Action</th>
             </tr>
            </thead>
<!--            <tbody>-->
<!--              <tr v-for="(showDataEntry, index) in showDataEntrys">-->
<!--                <td>{{ index+1 }}</td>-->
<!--                <td v-if="showDataEntry.bank_type_entry">{{ showDataEntry.bank_type_entry.bankTypeEntryName }}</td>-->
<!--                <td v-else=""></td>-->
<!--                <td>{{ showDataEntry.bankName }}</td>-->
<!--                <td>-->
<!--                   <router-link :to="`/bank@entryEdit${showDataEntry.bankEntryId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>-->
<!--                    <button type="button" @click="deleteBankEntry(showDataEntry.bankEntryId)" class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>-->
<!--                </td>-->
<!--              </tr>-->
<!--            </tbody>-->
         </table>
       </div>
     </div>
  </span>
</template>

<script>
    export default {
        data(){
            return{
                showShopInformationLists: [],
            }

        },
        mounted() {
            this.showShopInformationList();
        },
        methods: {
            showShopInformationList() {
                axios.get('/adminshopInformation').then(res => {
                        console.log(res.data.data)
                        // this.shopAddressLocationInfo = res.data.data
                    })
            },

        }
    }
</script>
