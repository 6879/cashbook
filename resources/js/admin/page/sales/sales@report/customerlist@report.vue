<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">  Customer List Report</h3>
      </div>
      <form  @submit.prevent="serchCustomerInfo()">
          <div class="row  mx-2 my-2">
            <div class="form-row col-5">
                <label class="col-4">Customer Type</label>
                <div class="col-8">
                  <multiselect v-model="form.customerTypeId" :options="customerTypeLists" :custom-label="customerType"   placeholder="Select one" >
                  </multiselect>
                </div>
            </div>
            <div class="form-row col-5">
                <label class="col-4">Customer Phone Number</label>
                <div class="col-8">
                  <multiselect v-model="form.customerPhoneNumber" :options="customerPhoneLists" :custom-label="customerPhoneNumber"   placeholder="Select one" >
                  </multiselect>
                </div>
            </div>
            <div class="text-right">
              <button type="submit" class="ml-3 mt-1 btn-pill btn-hover-shine btn btn-primary">Search</button>
            </div>
          </div>
        </form>

        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                   <th>SN</th>
                   <th>Customer Type Name</th>
                   <th>Customer Name</th>
                   <th>Customer Email</th>
                   <th>Customer Phone</th>
                   <th>Customer Imo Number</th>
                   <th>Customer Facebook ID</th>
                   <th>Customer Address</th>
                   <th>Reference Name</th>
                   <th>Reference Email</th>
                   <th>Reference Phone</th>
                   <th>Customer Status</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(customerReport, index) in customerReports">
                    <!-- <td>{{ customerList.salesCustomerEntryId }}</td> -->
                    <td>{{ index+1 }}</td>
                    <td v-if="customerReport.shop_customer_type_name">{{ customerReport.shop_customer_type_name.shopCustomerName }}</td>
                    <td>{{ customerReport.customerName }}</td>
                    <td>{{ customerReport.customerEmail }}</td>
                    <td>{{ customerReport.customerPhone }}</td>
                    <td>{{ customerReport.customerImoNumber }}</td>
                    <td>{{ customerReport.customerFacebookID }}</td>
                    <td>{{ customerReport.customerAddress }}</td>
                    <td>{{ customerReport.referenceName }}</td>
                    <td>{{ customerReport.referenceEmail }}</td>
                    <td>{{ customerReport.referencePhone }}</td>
                    <td>
                      <div v-if="customerReport.customerStatus == 1">
                          <button type="button" @click="changeCustomerStatus(customerReport.salesCustomerEntryId)"  class="btn btn-hover-shine btn-success">Active</button>
                      </div>
                      <div v-else>
                          <button type="button" @click="changeCustomerStatus(customerReport.salesCustomerEntryId)"  class="btn btn-hover-shine btn-danger">Deactive</button>
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
import Multiselect from 'vue-multiselect'
    export default {
        data(){
           return{
             form: new Form({
                 customerTypeId:'',
                 customerPhoneNumber:'',
             }),
             customerReports: {},
             customerTypeLists: [],
             customerPhoneLists: [],
           }
        },
        components: {
          Multiselect
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.customerInfoListReport();
        },
        methods:{
            customerInfoListReport() {
                axios.get('/salesCustomerListReport').then(res => {
                    this.customerTypeLists = res.data.customerTypeLists
                    this.customerPhoneLists = res.data.customerPhoneLists
                    this.customerReports = res.data.customerReports
                })
            },
            serchCustomerInfo(){
              this.form.post('/serchCustomerInfo').then(res => {
                  this.customerReports = res.data.customerReports
              })
            },
            changeCustomerStatus(salesCustomerEntryId){
                axios.get('/salesProductEntry/'+salesCustomerEntryId).then(res => {
                     this.customerInfoListReport();
                })
            },
            customerType ({shopCustomerName}) {
               return `${shopCustomerName}`
            },
            customerPhoneNumber ({customerPhone}) {
                return `${customerPhone}`
            },
        },
    }
</script>
