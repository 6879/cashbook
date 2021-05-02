<template id="">
  <span>
      <div class="card">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
             <h3 style="color:black">Sales Product Discount Price Entry</h3>
         </div>
         <form @submit.prevent="productDiscountPriceEntry()">
            <div class="product-discount py-4 px-2">
               <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
                     <div class="form-group">
                         <label>Product Name/Code</label>
                         <select  v-model="form.purchaseProductId"  name="purchaseProductId" class="form-control" @change.prevent="productIdCatch()">
                            <option value="">Select One</option>
                            <option v-for="purchaseProductList in purchaseProductLists" :value="purchaseProductList.purchaseProductId">{{ purchaseProductList.product_name.productName }} ({{ purchaseProductList.product_name.productCode }})</option>
                         </select>
                         <has-error :form="form" field="purchaseProductId"></has-error>
                     </div>
                </div>
            </div>
           <div class="py-4 px-2">
            <div class="offset-sm-1 col-12 col-sm-10 pl-sm-5 supplier-border product-discount">
                  <input type="hidden"   v-model="form.inputCheck" name="inputCheck">
                  <div class="form-row">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Product Name</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text" disabled v-model="form.productNameId" name="productNameId" :class="{ 'is-invalid': form.errors.has('productNameId') }" class="form-control" placeholder="Product Name">
                        <has-error :form="form" field="productNameId"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Purchase Unit Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <input type="text" disabled v-model="form.unitPrice" name="unitPrice" :class="{ 'is-invalid': form.errors.has('unitPrice') }" class="form-control" placeholder="Purchase Unit Price">
                        <has-error :form="form" field="unitPrice"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">MRP Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <div class="input-group">
                          <input type="text" disabled v-model="form.mrpPrice" name="mrpPrice" :class="{ 'is-invalid': form.errors.has('mrpPrice') }" class="form-control" placeholder="MRP Price">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><input v-model="form.mrpCheckInputValue" name="mrpCheckInputValue" :value="1" @click.submit="mrpCheckInputFun()" class="form-check-input" type="checkbox"></div>
                          </div>
                        </div>
                        <div class="input-group mt-3" v-if="mrpPriceBoxShow">
                          <input type="text"  v-model="form.mrpDiscountAmount" @keyup.prevent="mrpDiscountCal()" name="mrpDiscountAmount" class="form-control" placeholder="MRP Discount Price">
                          <div class="input-group-prepend">
                            <select  v-model="form.mrpDiscountType" @change.prevent="mrpDiscountCal()" name="mrpDiscountType" class="input-group-text">
                                <option value="">Select One</option>
                                <option value="1">Taka</option>
                                <option value="2">Percetage</option>
                            </select>
                          </div>
                        </div>
                        <div class="row  mt-2" v-if="mrpPriceBoxShow">
                            <div class="col">
                              <label>Start Date</label>
                              <datepicker  v-model="form.mrpStartDate" name="mrpStartDate" :format="customFormatter"  placeholder="Start Date"></datepicker>
                            </div>
                            <div class="col">
                              <label>Expired Date</label>
                              <datepicker  v-model="form.mrpExpiredDate" name="mrpExpiredDate" :format="customFormatter" placeholder="Expired Date"></datepicker>
                            </div>
                        </div>
                        <has-error :form="form" field="mrpDiscountAmount"></has-error>
                      </div>
                   </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Sales Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <div class="input-group">
                          <input type="text" disabled v-model="form.salesPrice" name="salesPrice" :class="{ 'is-invalid': form.errors.has('salesPrice') }" class="form-control" placeholder="Sales Price">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><input v-model="form.salesCheckInputValue" name="salesCheckInputValue" :value="1" @click.submit="salesCheckInputFun()" class="form-check-input" type="checkbox"></div>
                          </div>
                        </div>
                        <div class="input-group mt-3" v-if="salesPriceBoxShow">
                          <input type="text"  v-model="form.salesDiscountAmount" @keyup.prevent="salesDiscountCal()" name="salesDiscountAmount" class="form-control" placeholder="Sales Discount Price">
                          <div class="input-group-prepend">
                            <select  v-model="form.salesDiscountType" @change.prevent="salesDiscountCal()" name="salesDiscountCal" class="input-group-text">
                                <option value="">Select One</option>
                                <option value="1">Taka</option>
                                <option value="2">Percetage</option>
                            </select>
                          </div>
                        </div>
                        <div class="row  mt-2" v-if="salesPriceBoxShow">
                            <div class="col">
                              <label>Start Date</label>
                              <datepicker  v-model="form.salesStartDate" name="salesStartDate" :format="customFormatter"  placeholder="Start Date"></datepicker>
                            </div>
                            <div class="col">
                              <label>Expired Date</label>
                              <datepicker  v-model="form.salesExpiredDate" name="salesExpiredDate" :format="customFormatter" placeholder="Expired Date"></datepicker>
                            </div>
                        </div>
                        <has-error :form="form" field="salesPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Wholesale Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <div class="input-group">
                          <input type="text" disabled v-model="form.wholesalePrice" name="wholesalePrice" :class="{ 'is-invalid': form.errors.has('wholesalePrice') }" class="form-control" placeholder="Whole sale Price">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><input v-model="form.wholesaleCheckInputValue" name="wholesaleCheckInputValue" :value="1" @click.submit="wholesaleCheckInputFun()" class="form-check-input" type="checkbox"></div>
                          </div>
                        </div>
                        <div class="input-group mt-3" v-if="wholesalePriceBoxShow">
                          <input type="text"  v-model="form.wholesaleDiscountAmount" @keyup.prevent="wholesaleDiscountCal()" name="wholesaleDiscountAmount" class="form-control" placeholder="Sales Discount Price">
                          <div class="input-group-prepend">
                            <select  v-model="form.wholesaleDiscountType" @change.prevent="wholesaleDiscountCal()" name="wholesaleDiscountType" class="input-group-text">
                                <option value="">Select One</option>
                                <option value="1">Taka</option>
                                <option value="2">Percetage</option>
                            </select>
                          </div>
                        </div>
                        <div class="row  mt-2" v-if="wholesalePriceBoxShow">
                            <div class="col">
                              <label>Start Date</label>
                              <datepicker  v-model="form.wholesaleStartDate" name="wholesaleStartDate" :format="customFormatter"  placeholder="Start Date"></datepicker>
                            </div>
                            <div class="col">
                              <label>Expired Date</label>
                              <datepicker  v-model="form.wholesaleExpiredDate" name="wholesaleExpiredDate" :format="customFormatter" placeholder="Expired Date"></datepicker>
                            </div>
                        </div>
                        <has-error :form="form" field="wholesalePrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">Special Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <div class="input-group">
                          <input type="text" disabled v-model="form.specialPrice" name="specialPrice" :class="{ 'is-invalid': form.errors.has('specialPrice') }" class="form-control" placeholder="Special Price">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><input  v-model="form.specialCheckInputValue" name="specialCheckInputValue" :value="1" @click.submit="specialCheckInputFun()" class="form-check-input" type="checkbox" ></div>
                          </div>
                        </div>
                        <div class="input-group mt-3" v-if="specialPriceBoxShow">
                          <input type="text"  v-model="form.specialDiscountAmount" @keyup.prevent="specialDiscountCal()" name="specialDiscountAmount" class="form-control" placeholder="Special Discount Price">
                          <div class="input-group-prepend">
                            <select  v-model="form.specialDiscountType" @change.prevent="specialDiscountCal()" name="specialDiscountType" class="input-group-text">
                                <option value="">Select One</option>
                                <option value="1">Taka</option>
                                <option value="2">Percetage</option>
                            </select>
                          </div>
                        </div>
                        <div class="row  mt-2" v-if="specialPriceBoxShow">
                            <div class="col">
                              <label>Start Date</label>
                              <datepicker  v-model="form.specialStartDate" name="specialStartDate" :format="customFormatter"  placeholder="Start Date"></datepicker>
                            </div>
                            <div class="col">
                              <label>Expired Date</label>
                              <datepicker  v-model="form.specialExpiredDate" name="specialExpiredDate" :format="customFormatter" placeholder="Expired Date"></datepicker>
                            </div>
                        </div>
                        <has-error :form="form" field="specialPrice"></has-error>
                      </div>
                  </div>
                  <div class="form-row pt-3">
                      <div class="col-sm-3 col-6 mt-2">
                        <label class="p-0">E-Commerce Price</label>
                      </div>
                      <div class="col-sm-8 col-12">
                        <div class="input-group">
                          <input type="text" disabled  v-model="form.eCommercePrice" name="eCommercePrice" :class="{ 'is-invalid': form.errors.has('eCommercePrice') }" class="form-control" placeholder="E-Commerce Price">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><input  v-model="form.eCommerceCheckInputValue" name="eCommerceCheckInputValue" :value="1" @click.submit="eCommerceCheckInputFun()" class="form-check-input" type="checkbox" ></div>
                          </div>
                        </div>
                        <div class="input-group mt-3" v-if="eCommercePriceBoxShow">
                          <input type="text"  v-model="form.eCommerceDiscountAmount" @keyup.prevent="eCommerceDiscountCal()" name="eCommerceDiscountAmount" class="form-control" placeholder="E-Commerce Discount Price">
                          <div class="input-group-prepend">
                            <select  v-model="form.eCommerceDiscountType" @change.prevent="eCommerceDiscountCal()" name="eCommerceDiscountType" class="input-group-text">
                                <option value="">Select One</option>
                                <option value="1">Taka</option>
                                <option value="2">Percetage</option>
                            </select>
                          </div>
                        </div>
                        <div class="row  mt-2" v-if="eCommercePriceBoxShow">
                            <div class="col">
                              <label>Start Date</label>
                              <datepicker  v-model="form.eCommerceStartDate" name="eCommerceStartDate" :format="customFormatter"  placeholder="Start Date"></datepicker>
                            </div>
                            <div class="col">
                              <label>Expired Date</label>
                              <datepicker  v-model="form.eCommerceExpiredDate" name="eCommerceExpiredDate" :format="customFormatter" placeholder="Expired Date"></datepicker>
                            </div>
                        </div>
                        <has-error :form="form" field="eCommercePrice"></has-error>
                      </div>
                  </div>
                  <div class="col-11 text-right pr-0 pt-3">
                    <button type="submit" class="btn-pill btn-hover-shine btn btn-primary">Submit</button>
                  </div>
             </div>
           </div>
       </form>
     </div>

     <div class="card mt-5">
         <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
           <h3 style="color:black">Sales Product Discount Price List</h3>
         </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered table-striped">
             <thead>
                <tr>
                  <th>SN</th>
                  <th>Product_Name</th>
                  <th>MRP_Price</th>
                  <th>MRP_Discount_Start_Date</th>
                  <th>MRP_Discount_Expired_Date</th>
                  <th>Sales_Price</th>
                  <th>Sales_Discount_Start_Date</th>
                  <th>Sales_Discount_Expired_Date</th>
                  <th>Wholesale_Price</th>
                  <th>Wholesale_Discount_Start_Date</th>
                  <th>Wholesale_Discount_Expired_Date</th>
                  <th>Special_Price</th>
                  <th>Special_Discount_Start_Date</th>
                  <th>Special_Discount_Expired_Date</th>
                  <th>E-Commerce_Price</th>
                  <th>E-Commerce_Discount_Start_Date</th>
                  <th>E-Commerce_Discount_Expired_Date</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
                 <tr v-for="(salesProductDiscountPriceList, index) in salesProductDiscountPriceLists.data">
                   <td>{{ index+1 }}</td>
                   <td>{{ salesProductDiscountPriceList.product_name.productName }}</td>
                   <td>{{ salesProductDiscountPriceList.mrpPrice }}</td>
                   <td>{{ salesProductDiscountPriceList.mrpStartDate }}</td>
                   <td>{{ salesProductDiscountPriceList.mrpExpiredDate }}</td>
                   <td>{{ salesProductDiscountPriceList.salesPrice }}</td>
                   <td>{{ salesProductDiscountPriceList.salesStartDate }}</td>
                   <td>{{ salesProductDiscountPriceList.salesExpiredDate }}</td>
                   <td>{{ salesProductDiscountPriceList.wholesalePrice }}</td>
                   <td>{{ salesProductDiscountPriceList.wholesaleStartDate }}</td>
                   <td>{{ salesProductDiscountPriceList.wholesaleExpiredDate }}</td>
                   <td>{{ salesProductDiscountPriceList.specialPrice }}</td>
                   <td>{{ salesProductDiscountPriceList.specialStartDate }}</td>
                   <td>{{ salesProductDiscountPriceList.specialExpiredDate }}</td>
                   <td>{{ salesProductDiscountPriceList.eCommercePrice }}</td>
                   <td>{{ salesProductDiscountPriceList.eCommerceStartDate }}</td>
                   <td>{{ salesProductDiscountPriceList.eCommerceExpiredDate }}</td>
                   <td>
                   <router-link :to="`/productdiscountprice@entryEdit${salesProductDiscountPriceList.salesProductDiscountPriceId}`" class="mr-2 btn-hover-shine btn btn-shadow btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                </td>
              </tr>
             </tbody>
          </table>
        </div>
        <span class="card_footer">
          <pagination :data="salesProductDiscountPriceLists" :limit="limit"  @pagination-change-page="getPaginateList">
            <span slot="prev-nav">&lt; Previous</span>
            <span slot="next-nav">Next &gt;</span>
          </pagination>
       </span>
      </div>
  </span>

</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'

    export default {
        data(){
            return{
                form: new Form({
                    purchaseProductId:'',
                    productNameId:'',
                    productId:'',
                    unitPrice:'',
                    mrpPrice:'',
                    salesPrice:'',
                    wholesalePrice: '',
                    specialPrice:'',
                    eCommercePrice:'',

                    inputCheck:'',

                    mrpDiscountAmount:'',
                    mrpDiscountType:'',
                    mrpCheckInputValue:'',
                    mrpStartDate:'',
                    mrpExpiredDate:'',

                    salesDiscountAmount:'',
                    salesDiscountType:'',
                    salesCheckInputValue:'',
                    salesStartDate:'',
                    salesExpiredDate:'',

                    wholesaleDiscountAmount:'',
                    wholesaleDiscountType:'',
                    wholesaleCheckInputValue:'',
                    wholesaleStartDate:'',
                    wholesaleExpiredDate:'',

                    specialDiscountAmount:'',
                    specialDiscountType:'',
                    specialCheckInputValue:'',
                    specialStartDate:'',
                    specialExpiredDate:'',

                    eCommerceDiscountAmount:'',
                    eCommerceDiscountType:'',
                    eCommerceCheckInputValue:'',
                    eCommerceStartDate:'',
                    eCommerceExpiredDate:'',

                }),
                purchaseProductLists:{},
                salesProductDiscountPriceLists:{},

                mrpPriceBoxShow:false,
                salesPriceBoxShow:false,
                wholesalePriceBoxShow:false,
                specialPriceBoxShow:false,
                eCommercePriceBoxShow:false,

            }
        },
        props:{
             limit: {
               type: Number,
               default: 2
           }
        },
        components: {
          Datepicker
        },
        mounted() {
            this.getPaginateList()
            this.salesProductNameList()
            this.salesProductDiscountPriceList()
        },
        methods: {
            customFormatter(date) {
              return moment(date).format('DD-MM-YYYY');
            },
            salesProductNameList() {
                axios.get('/salesProductNameShow').then(res => {
                     this.purchaseProductLists = res.data.purchaseProductLists
                })
            },
            productIdCatch() {
                axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                     this.form.unitPrice = res.data.productUnitePrice.unitPrice
                     this.form.productNameId = res.data.productUnitePrice.product_name.productName
                     this.form.productId = res.data.productUnitePrice.productId
                     this.form.mrpPrice = res.data.salesProductPrice.mrpPrice
                     this.form.salesPrice = res.data.salesProductPrice.salesPrice
                     this.form.wholesalePrice = res.data.salesProductPrice.wholesalePrice
                     this.form.specialPrice = res.data.salesProductPrice.specialPrice
                     this.form.eCommercePrice = res.data.salesProductPrice.eCommercePrice

                })
            },
            productDiscountPriceEntry() {
                if (this.form.inputCheck == 1) {
                    this.form.post('/salesProductDiscountPriceEntry').then(res => {
                        if (res.data.alReadyEntry) {
                            Toast.fire({
                              icon: 'error',
                              title: 'Already Sales Product Price Entry'
                            })
                        }
                        else{
                            Toast.fire({
                              icon: 'success',
                              title: 'Sales Product Price Entry'
                            })
                            this.form.reset()
                            this.mrpPriceBoxShow = false;
                            this.salesPriceBoxShow = false;
                            this.wholesalePriceBoxShow = false;
                            this.specialPriceBoxShow = false;
                            this.eCommercePriceBoxShow = false;
                            this.salesProductDiscountPriceList();
                        }
                    });
                }
                else {
                    Toast.fire({
                      icon: 'error',
                      title: 'Enter Your Discount Amount'
                    })
                }
            },
            salesProductDiscountPriceList() {
                axios.get('/salesProductDiscountPriceEntry').then(res => {
                      this.salesProductDiscountPriceLists = res.data.salesProductDiscountPriceLists
                })
            },
            getPaginateList(page = 1){
              axios.get('/salesProductDiscountPriceEntry?page=' + page)
              .then(response => {
                   this.salesProductDiscountPriceLists = response.data.salesProductDiscountPriceLists;
              });
            },
            mrpCheckInputFun(){
                if (this.form.mrpPrice != "") {
                    if (this.form.mrpCheckInputValue == "") {
                          this.mrpPriceBoxShow = true;
                    }
                    else{
                          this.mrpPriceBoxShow = false;
                          this.form.mrpDiscountAmount = "";
                          this.form.mrpDiscountType = "";
                          this.form.mrpStartDate = "";
                          this.form.mrpExpiredDate = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.mrpPrice = res.data.salesProductPrice.mrpPrice
                          })
                    }
                }
            },
            salesCheckInputFun(){
                if (this.form.salesPrice != "") {
                    if (this.form.salesCheckInputValue == "") {
                          this.salesPriceBoxShow = true;
                    }
                    else{
                          this.salesPriceBoxShow = false;
                          this.form.salesDiscountAmount = "";
                          this.form.salesDiscountType = "";
                          this.form.salesStartDate = "";
                          this.form.salesExpiredDate = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.salesPrice = res.data.salesProductPrice.salesPrice
                          })
                    }
                }
            },
            wholesaleCheckInputFun(){
                if (this.form.wholesalePrice != "") {
                    if (this.form.wholesaleCheckInputValue == "") {
                          this.wholesalePriceBoxShow = true;
                    }
                    else{
                          this.wholesalePriceBoxShow = false;
                          this.form.wholesaleDiscountAmount = "";
                          this.form.wholesaleDiscountType = "";
                          this.form.wholesaleStartDate = "";
                          this.form.wholesaleExpiredDate = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.wholesalePrice = res.data.salesProductPrice.wholesalePrice
                          })
                    }
                }
            },
            specialCheckInputFun(){
                if (this.form.specialPrice != "") {
                    if (this.form.specialCheckInputValue == "") {
                          this.specialPriceBoxShow = true;
                    }
                    else{
                          this.specialPriceBoxShow = false;
                          this.form.specialDiscountAmount = "";
                          this.form.specialDiscountType = "";
                          this.form.specialStartDate = "";
                          this.form.specialExpiredDate = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.specialPrice = res.data.salesProductPrice.specialPrice
                          })
                    }
                }
            },
            eCommerceCheckInputFun(){
                if (this.form.eCommercePrice != "") {
                    if (this.form.eCommerceCheckInputValue == "") {
                          this.eCommercePriceBoxShow = true;
                    }
                    else{
                          this.eCommercePriceBoxShow = false;
                          this.form.eCommerceDiscountAmount = "";
                          this.form.eCommerceDiscountType = "";
                          this.form.eCommerceStartDate = "";
                          this.form.eCommerceExpiredDate = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.eCommercePrice = res.data.salesProductPrice.eCommercePrice
                          })
                    }
                }
            },
            mrpDiscountCal(){
                 if (this.form.mrpDiscountType == 1) {
                      if (this.form.mrpDiscountAmount != "") {
                          this.form.inputCheck = 1;
                          let mrpPriceDiscount = parseFloat (this.form.mrpPrice) - parseFloat(this.form.mrpDiscountAmount);
                          this.form.mrpPrice =  mrpPriceDiscount;
                      }
                      else {
                          this.form.mrpDiscountAmount = "";
                          this.form.mrpDiscountType = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.mrpPrice = res.data.salesProductPrice.mrpPrice
                          })
                      }
                 }
                else if (this.form.mrpDiscountType == 2){
                      if (this.form.mrpDiscountAmount != "") {
                         this.form.inputCheck = 1;
                         let mrpPriceCalculation = parseFloat (this.form.mrpPrice) * parseFloat(this.form.mrpDiscountAmount) / 100;
                         this.form.mrpPrice =  parseFloat(this.form.mrpPrice) - parseFloat(mrpPriceCalculation);
                      }
                      else {
                          this.form.mrpDiscountAmount = "";
                          this.form.mrpDiscountType = "";
                          axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                               this.form.mrpPrice = res.data.salesProductPrice.mrpPrice
                          })
                      }
                 }
           },
           salesDiscountCal(){
                if (this.form.salesDiscountType == 1) {
                     if (this.form.salesDiscountAmount != "") {
                         this.form.inputCheck = 1;
                         let salesPriceDiscount = parseFloat (this.form.salesPrice) - parseFloat(this.form.salesDiscountAmount);
                         this.form.salesPrice =  salesPriceDiscount;
                     }
                     else {
                         this.form.salesDiscountAmount = "";
                         this.form.salesDiscountType = "";
                         axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                              this.form.salesPrice = res.data.salesProductPrice.salesPrice
                         })
                     }
                }
               else if (this.form.salesDiscountType == 2){
                     if (this.form.salesDiscountAmount != "") {
                        this.form.inputCheck = 1;
                        let salesPriceCalculation = parseFloat (this.form.salesPrice) * parseFloat(this.form.salesDiscountAmount) / 100;
                        this.form.salesPrice =  parseFloat(this.form.salesPrice) - parseFloat(salesPriceCalculation);
                     }
                     else {
                         this.form.salesDiscountAmount = "";
                         this.form.salesDiscountType = "";
                         axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                              this.form.salesPrice = res.data.salesProductPrice.salesPrice
                         })
                     }
                }
          },

          wholesaleDiscountCal(){
               if (this.form.wholesaleDiscountType == 1) {
                    if (this.form.wholesaleDiscountAmount != "") {
                        this.form.inputCheck = 1;
                        let wholesalePriceDiscount = parseFloat (this.form.wholesalePrice) - parseFloat(this.form.wholesaleDiscountAmount);
                        this.form.wholesalePrice =  wholesalePriceDiscount;
                    }
                    else {
                        this.form.wholesaleDiscountAmount = "";
                        this.form.wholesaleDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.wholesalePrice = res.data.salesProductPrice.wholesalePrice
                        })
                    }
               }
              else if (this.form.wholesaleDiscountType == 2){
                    if (this.form.wholesaleDiscountAmount != "") {
                       this.form.inputCheck = 1;
                       let wholesalePriceCalculation = parseFloat (this.form.wholesalePrice) * parseFloat(this.form.wholesaleDiscountAmount) / 100;
                       this.form.wholesalePrice =  parseFloat(this.form.wholesalePrice) - parseFloat(wholesalePriceCalculation);
                    }
                    else {
                        this.form.wholesaleDiscountAmount = "";
                        this.form.wholesaleDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.wholesalePrice = res.data.salesProductPrice.wholesalePrice
                        })
                    }
               }
          },
          specialDiscountCal(){
               if (this.form.specialDiscountType == 1) {
                    if (this.form.specialDiscountAmount != "") {
                        this.form.inputCheck = 1;
                        let specialPriceDiscount = parseFloat (this.form.specialPrice) - parseFloat(this.form.specialDiscountAmount);
                        this.form.specialPrice =  specialPriceDiscount;
                    }
                    else {
                        this.form.specialDiscountAmount = "";
                        this.form.specialDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.specialPrice = res.data.salesProductPrice.specialPrice
                        })
                    }
               }
              else if (this.form.specialDiscountType == 2){
                    if (this.form.specialDiscountAmount != "") {
                       this.form.inputCheck = 1;
                       let specialPriceCalculation = parseFloat (this.form.specialPrice) * parseFloat(this.form.specialDiscountAmount) / 100;
                       this.form.specialPrice =  parseFloat(this.form.specialPrice) - parseFloat(specialPriceCalculation);
                    }
                    else {
                        this.form.specialDiscountAmount = "";
                        this.form.specialDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.specialPrice = res.data.salesProductPrice.specialPrice
                        })
                    }
               }
           },
          eCommerceDiscountCal(){
               if (this.form.eCommerceDiscountType == 1) {
                    if (this.form.eCommerceDiscountAmount != "") {
                        this.form.inputCheck = 1;
                        let eCommercePriceDiscount = parseFloat (this.form.eCommercePrice) - parseFloat(this.form.eCommerceDiscountAmount);
                        this.form.eCommercePrice =  eCommercePriceDiscount;
                    }
                    else {
                        this.form.eCommerceDiscountAmount = "";
                        this.form.eCommerceDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.eCommercePrice = res.data.salesProductPrice.eCommercePrice
                        })
                    }
               }
              else if (this.form.eCommerceDiscountType == 2){
                    if (this.form.eCommerceDiscountAmount != "") {
                       this.form.inputCheck = 1;
                       let eCommercePriceCalculation = parseFloat (this.form.eCommercePrice) * parseFloat(this.form.eCommerceDiscountAmount) / 100;
                       this.form.eCommercePrice =  parseFloat(this.form.eCommercePrice) - parseFloat(eCommercePriceCalculation);
                    }
                    else {
                        this.form.eCommerceDiscountAmount = "";
                        this.form.eCommerceDiscountType = "";
                        axios.get('/productPriceEntryInfo/'+this.form.purchaseProductId).then(res => {
                             this.form.eCommercePrice = res.data.salesProductPrice.eCommercePrice
                        })
                    }
               }
           },

        }
    }
</script>
<style media="screen">
  .product-discount .input-group-text{
      padding: 0px 20px;
  }
  .product-discount .form-check-input {
    margin-left: -5px;
  }
  .product-discount input{
      background-color: #fff;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      padding: 8px 20px;
  }
</style>
