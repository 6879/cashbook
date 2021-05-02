<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Asset Status</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-8 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="addAsset()">
                <div class="form-group">
                      <label>Select Product Name/Code</label>
                      <select v-model="form.shopAssetEntryId" name="shopAssetEntryId" :class="{ 'is-invalid': form.errors.has('shopAssetEntryId') }" class="form-control" @change.prevent="assetEntryIdCatch()">
                          <option value="">Select One</option>
                          <option :value="shopAssetEntryList.shopAssetEntryId" v-for="shopAssetEntryList in shopAssetEntryLists">{{ shopAssetEntryList.asset_code_name.assetPorductName }} / {{ shopAssetEntryList.asset_code_name.assetPorductCode }}</option>
                      </select>
                   <has-error :form="form" field="shopAssetEntryId"></has-error>
               </div>
                <div class="form-group">
                     <label>Asset Supplier Name</label>
                     <input disabled v-model="form.assetSupplierId" type="text" name="assetSupplierId" placeholder="Asset Supplier Name" :class="{ 'is-invalid': form.errors.has('assetSupplierId') }" class="form-control">
                     <has-error :form="form" field="assetSupplierId"></has-error>
                </div>
                <div class="form-group">
                     <label>Asset Brand Name</label>
                     <input disabled v-model="form.assetBrandId" type="text" name="assetBrandId" placeholder="Asset Brand Name" :class="{ 'is-invalid': form.errors.has('assetBrandId') }" class="form-control">
                     <has-error :form="form" field="assetBrandId"></has-error>
                </div>
                <div class="form-group">
                     <label>Purchase Date</label>
                     <input disabled v-model="form.purchasedate" type="date" name="purchasedate" :class="{ 'is-invalid': form.errors.has('purchasedate') }" class="form-control">
                     <has-error :form="form" field="purchasedate"></has-error>
                </div>
                <div class="form-group">
                     <label>Mfg Date</label>
                     <input disabled v-model="form.mfgDate" type="date" name="mfgDate" :class="{ 'is-invalid': form.errors.has('mfgDate') }" class="form-control">
                     <has-error :form="form" field="mfgDate"></has-error>
                </div>
                <div class="form-group">
                     <label>Expiry Date</label>
                     <input disabled v-model="form.expiryDate" type="date" name="expiryDate" :class="{ 'is-invalid': form.errors.has('expiryDate') }" class="form-control">
                     <has-error :form="form" field="expiryDate"></has-error>
                </div>
                <div class="form-group">
                     <label>Invoice No</label>
                     <input disabled v-model="form.invoiceNo" type="text" name="invoiceNo" :class="{ 'is-invalid': form.errors.has('invoiceNo') }" placeholder="Invoice No" class="form-control">
                     <has-error :form="form" field="invoiceNo"></has-error>
                </div>
                <div class="form-group">
                     <label>Model No</label>
                     <input disabled v-model="form.modelNo" type="text" name="modelNo" :class="{ 'is-invalid': form.errors.has('modelNo') }" placeholder="Model No" class="form-control">
                     <has-error :form="form" field="modelNo"></has-error>
                </div>
                <div class="form-group">
                     <label>Product Quantity</label>
                     <input disabled v-model="form.productQuantity" type="text" name="productQuantity" :class="{ 'is-invalid': form.errors.has('productQuantity') }" placeholder="Product Quantity" class="form-control">
                     <has-error :form="form" field="productQuantity"></has-error>
                </div>
                <div class="form-group">
                     <label>Product Cost</label>
                     <input disabled v-model="form.productCost" type="text" name="productCost"  :class="{ 'is-invalid': form.errors.has('productCost') }" placeholder="Product Cost" class="form-control">
                     <has-error :form="form" field="productCost"></has-error>
                </div>
                <div class="form-group">
                     <label>Total Product Cost</label>
                     <input disabled v-model="form.totalProductCost" type="text" name="totalProductCost" :class="{ 'is-invalid': form.errors.has('totalProductCost') }" placeholder="Total Product Cost" class="form-control">
                     <has-error :form="form" field="totalProductCost"></has-error>
                </div>
                <div class="form-group">
                     <label>Current Payable</label>
                     <input disabled v-model="form.currentPayable" type="text" name="currentPayable" :class="{ 'is-invalid': form.errors.has('currentPayable') }" placeholder="Current Payable" class="form-control">
                     <has-error :form="form" field="currentPayable"></has-error>
                </div>
                <div class="form-group">
                     <label>Depreciation</label>
                     <div class="form-row">
                         <div class="col-md-4">
                            <input disabled v-model="form.depreciationYear"  type="number" name="depreciationYear" :class="{ 'is-invalid': form.errors.has('depreciationYear') }" placeholder="Enter Years" class="form-control">
                            <has-error :form="form" field="depreciationYear"></has-error>
                         </div>
                         <div class="col-md-4">
                            <input disabled  v-model="form.depreciationMonth"  type="number" name="depreciationMonth" :class="{ 'is-invalid': form.errors.has('depreciationMonth') }" placeholder="Enter Month" class="form-control">
                            <has-error :form="form" field="depreciationMonth"></has-error>
                         </div>
                         <div class="col-md-4">
                            <input disabled  v-model="form.depreciationDay"  type="number" name="depreciationDay" :class="{ 'is-invalid': form.errors.has('depreciationDay') }" placeholder="Enter Day" class="form-control">
                            <has-error :form="form" field="depreciationDay"></has-error>
                         </div>
                         <input disabled v-model="form.checkDepreciation" type="hidden" name="checkDepreciation"   class="form-control">
                         <div class="col-md-12 mt-2">
                            <input disabled v-model="form.totalDepreciation" type="text" name="totalDepreciation"   class="form-control">
                         </div>
                    </div>
                </div>
                <div class="form-group">
                     <label>Warranty</label>
                     <div class="form-row">
                         <div class="col-md-6">
                           <input disabled v-model="form.warranty" type="number" name="warranty" :class="{ 'is-invalid': form.errors.has('warranty') }" placeholder="Warranty" class="form-control">
                         </div>
                         <div class="col-md-6">
                            <select disabled v-model="form.selectMothOrYearWarranty" name="selectMothOrYearWarranty" class="form-control">
                                <option value="">Select One</option>
                                <option value="1">Day</option>
                                <option value="2">Month</option>
                                <option value="3">Years</option>
                            </select>
                         </div>
                     </div>
                     <has-error :form="form" field="warranty"></has-error>
                </div>
                <div class="form-group">
                     <label>Guarantee</label>
                     <div class="form-row">
                         <div class="col-md-6">
                           <input  disabled v-model="form.guarantee" type="number" name="guarantee" :class="{ 'is-invalid': form.errors.has('guarantee') }" placeholder="Guarantee" class="form-control">
                         </div>
                         <div class="col-md-6">
                            <select disabled  v-model="form.selectMothOrYearGuarantee" name="selectMothOrYearGuarantee" class="form-control">
                                <option value="">Select One</option>
                                <option value="1">Day</option>
                                <option value="2">Month</option>
                                <option value="3">Years</option>
                            </select>
                         </div>
                     </div>
                     <has-error :form="form" field="guarantee"></has-error>
                </div>
                <div class="form-group">
                  <label>Color</label>
                  <input disabled v-model="form.color" type="text" name="color" :class="{ 'is-invalid': form.errors.has('color') }" placeholder="Color" class="form-control">
                  <has-error :form="form" field="color"></has-error>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <vue-editor disabled v-model="form.size" type="text" name="Size"  :class="{ 'is-invalid': form.errors.has('Size') }" placeholder="Size"></vue-editor>
                    <has-error :form="form" field="Size"></has-error>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <vue-editor disabled v-model="form.description" type="text" name="description"  :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Description" ></vue-editor>
                    <has-error :form="form" field="description"></has-error>
                </div>
            </form>
          </div>
        </div>
       </div>

      <div class="card mt-5">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Status</h3>
        </div>
        <div class="supplier-entry py-4 px-2">
          <div class="col-lg-8 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
              <form action="" @submit.prevent="addStatus()">
                <div class="form-group">
                        <label>Type Select</label>
                        <select v-model="form.typeSelectId"  name="typeSelectId" :disabled="typeSelect ? true : false " :class="{ 'is-invalid': form.errors.has('typeSelectId') }" class="form-control" @change.prevent="typeSelectFunction()">
                            <option value="">Select One</option>
                            <option value="1" v-if="typeValueSend">Send</option>
                            <option value="2" v-if="typeValueReceive">Receive</option>
                        </select>
                     <has-error :form="form" field="typeSelectId"></has-error>
                 </div>
                 <div class="form-group" v-if="sendRemark">
                      <label>Remark (Send Time)</label>
                      <textarea v-model="form.remarkSendTime" :disabled="remarkSendTimedis ? true : false " name="remarkSendTime" :class="{ 'is-invalid': form.errors.has('remarkSendTime') }" cols="3" class="form-control">
                     </textarea>
                      <has-error :form="form" field="remarkSendTime"></has-error>
                 </div>
                 <div class="form-group" v-if="receiveRemark">
                      <label>Remark (Receive Time)</label>
                      <textarea v-model="form.remarkReceiveTime" :disabled="remarkReceiveTimeDis ? true : false " name="remarkReceiveTime" :class="{ 'is-invalid': form.errors.has('remarkReceiveTime') }" cols="3" class="form-control">
                     </textarea>
                      <has-error :form="form" field="remarkReceiveTime"></has-error>
                 </div>
                 <div class="ml-2" v-if="sendProductList">
                       <div class="form-group">
                          <input type="checkbox" :disabled="sendProductDis ? true : false" v-model="form.damageId"  name="damageId" value="2" class="form-check-input" >
                          <label class="form-check-label">Damage</label>
                      </div>
                       <div class="form-group">
                          <input type="checkbox" :disabled="sendProductDis ? true : false"  v-model="form.warantyId" name="warantyId" value="3" class="form-check-input" >
                          <label class="form-check-label">Waranty</label>
                      </div>
                       <div class="form-group">
                          <input type="checkbox" :disabled="sendProductDis ? true : false"  v-model="form.guaranteeId" name="guaranteeId" value="4" class="form-check-input" >
                          <label class="form-check-label">Guarantee</label>
                      </div>
                       <div class="form-group">
                          <input type="checkbox" :disabled="sendProductDis ? true : false"  v-model="form.unusedId" name="unusedId" value="5" class="form-check-input" >
                          <label class="form-check-label">Unused</label>
                      </div>
                       <div class="form-group">
                          <input type="checkbox" :disabled="sendProductDis ? true : false" v-model="form.theftId" name="theftId" value="6" class="form-check-input" >
                          <label class="form-check-label">Theft</label>
                      </div>
                 </div>

                 <div class="text-right pt-3">
                   <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
                 </div>
            </form>
           </div>
         </div>
       </div>

    </span>
</template>
<script>
import { VueEditor } from "vue2-editor";

    export default {
        data () {
            return {
                form: new Form({
                    shopAssetEntryId : '',
                    assetSupplierId : '',
                    assetBrandId : '',
                    purchasedate : '',
                    mfgDate: '',
                    expiryDate: '',
                    invoiceNo: '',
                    modelNo: '',
                    productQuantity: '',
                    productCost: '',
                    totalProductCost: '',
                    currentPayable: '',
                    warranty: '',
                    selectMothOrYearWarranty: '',
                    guarantee: '',
                    selectMothOrYearGuarantee: '',
                    color: '',
                    size: '',
                    description: '',
                    depreciationDay: '',
                    depreciationMonth: '',
                    depreciationYear: '',
                    checkDepreciation:'',
                    totalDepreciation:'',

                    // Second form
                    typeSelectId:'',
                    remarkSendTime:'',
                    remarkReceiveTime:'',
                    damageId:'',
                    warantyId:'',
                    guaranteeId:'',
                    unusedId:'',
                    theftId:'',
                }),
                shopAssetEntryLists:{},

                typeSelect:true,
                sendProductList:false,
                sendRemark:false,
                receiveRemark:false,
                sendProductDis:false,
                receiveProductDis:false,

                remarkSendTimedis:false,
                remarkReceiveTimeDis:false,

                typeValueSend:false,
                typeValueReceive:false,

            }
        },
        components: {
          VueEditor,
        },
        mounted(){
            this.assetCodeEntryList();
        },
        methods:{
            addStatus(){
                this.form.post('/assetStatus').then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Asset Status Entry Successfully'
                    })
                    this.typeSelect = true;
                    this.sendProductList = false;
                    this.sendRemark = false;
                    this.receiveRemark = false;
                    this.typeValueSend = false;
                    this.typeValueReceive = false;
                    this.form.reset();
                })
            },
            assetCodeEntryList(){
                axios.get('/assetStatus/create').then(res =>{
                      this.shopAssetEntryLists = res.data.shopAssetEntryLists
                })
            },
            assetEntryIdCatch(){
                axios.get('/assetStatus/'+this.form.shopAssetEntryId).then(res =>{
                      if (res.data.assetSingleData == null) {
                           this.form.reset();
                      }
                      else{
                           this.typeSelect = false;
                           this.form.fill(res.data.assetSingleData);
                           this.form.totalDepreciation = res.data.assetSingleData.depreciation;
                           this.form.assetBrandId = res.data.assetSingleData.asset_brand_name.assetBrandName
                           this.form.assetSupplierId = res.data.assetSingleData.supplier_name.assetSupplierName

                           if (res.data.productReceive) {

                               this.typeValueSend = true;
                           }
                           else if (res.data.productSend) {

                                 this.sendProductDis = true;
                                 this.remarkSendTimedis = true;
                                 this.typeValueReceive = true;
                                 this.typeValueSend = false;

                                 if (res.data.dateInfo.typeOptionId == 2) {
                                     this.form.damageId = res.data.dateInfo.typeOptionId
                                 }
                                 else if (res.data.dateInfo.typeOptionId == 3) {
                                     this.form.warantyId = res.data.dateInfo.typeOptionId
                                 }
                                 else if (res.data.dateInfo.typeOptionId == 4) {

                                     this.form.guaranteeId = res.data.dateInfo.typeOptionId
                                 }
                                 else if (res.data.dateInfo.typeOptionId == 5) {
                                     this.form.unusedId = res.data.dateInfo.typeOptionId

                                 }
                                 else if (res.data.dateInfo.typeOptionId == 6) {
                                     this.form.theftId = res.data.dateInfo.typeOptionId
                                 }
                           }
                           else{
                                this.typeValueSend = true;
                           }
                      }
                })
            },
            typeSelectFunction(){
               if (this.form.typeSelectId == 1) {
                    this.sendRemark = true;
                    this.sendProductList = true;
               }
               if (this.form.typeSelectId == 2) {
                   this.receiveRemark = true;
                   this.sendProductList = true;
               }
            }
        }
    }

</script>
