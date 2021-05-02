<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Asset</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-8 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="updateAsset()">

                <div class="form-group">
                     <label class="p-0">Asset Category</label>
                      <select  v-model="form.assetCategory"  @change.prevent="assetCategorySelect()" name="assetCategory" class="form-control" :class="{ 'is-invalid': form.errors.has('assetCategory') }">
                          <option value="">Select One</option>
                          <option  v-for="assetCategoryList in assetCategoryLists" :value="assetCategoryList.assetCategoryId"> {{ assetCategoryList.assetCategoryName }} </option>
                      </select>
                      <has-error :form="form" field="assetCategory"></has-error>
                </div>
                <div class="form-group" v-if="subShow">
                    <label>Asset Sub Category</label>
                    <select  v-model="form.assetSubCategory" @change.prevent="assetSubCategorySelect()" name="assetSubCategory" class="form-control">
                      <option value="">Select One</option>
                      <option v-for="assetSubCategorySelectList in assetSubCategorySelectLists" :value="assetSubCategorySelectList.assetCategoryId">{{ assetSubCategorySelectList.assetCategoryName }}</option>
                    </select>
                </div>
                <div class="form-group" v-if="thirdShow">
                      <label>Asset Third Category</label>
                      <select  v-model="form.assetThirdCategory" @change.prevent="assetThirdCategorySelect()" name="assetThirdCategory" class="form-control">
                        <option value="">Select One</option>
                        <option v-for="assetThirdCategorySelectList in assetThirdCategorySelectLists" :value="assetThirdCategorySelectList.assetCategoryId">{{ assetThirdCategorySelectList.assetCategoryName }}</option>
                      </select>
                </div>
                <div class="form-group" v-if="fourShow">
                      <label>Asset Four Category</label>
                      <select  v-model="form.assetFourCategory" @change.prevent="assetFourCategorySelect()" name="assetFourCategory" class="form-control">
                        <option value="">Select One</option>
                        <option v-for="assetFourCategorySelectList in assetFourCategorySelectLists" :value="assetFourCategorySelectList.assetCategoryId">{{ assetFourCategorySelectList.assetCategoryName }}</option>
                      </select>
                </div>
                <div class="form-group" v-if="fiveShow">
                    <label>Asset Five Category</label>
                    <select  v-model="form.assetFiveCategory" @change.prevent="assetFiveCategorySelect()" name="assetFiveCategory" class="form-control">
                      <option value="">Select One</option>
                      <option v-for="assetFiveCategorySelectList in assetFiveCategorySelectLists" :value="assetFiveCategorySelectList.assetCategoryId">{{ assetFiveCategorySelectList.assetCategoryName }}</option>
                    </select>
                </div>
                <div class="form-group" v-if="sixShow">
                      <label>Asset Six Category</label>
                      <select  v-model="form.assetSixCategory" @change.prevent="assetSixCategorySelect()" name="assetSixCategory" class="form-control">
                        <option value="">Select One</option>
                        <option v-for="assetSixCategorySelectList in assetSixCategorySelectLists" :value="assetSixCategorySelectList.assetCategoryId">{{ assetSixCategorySelectList.assetCategoryName }}</option>
                      </select>
                </div>
                <div class="form-group" v-if="sevenShow">
                    <label>Asset Seven Category</label>
                    <select  v-model="form.assetSevenCategory" @change.prevent="assetSevenCategorySelect()" name="assetSevenCategory" class="form-control">
                      <option value="">Select One</option>
                      <option v-for="assetSevenCategorySelectList in assetSevenCategorySelectLists" :value="assetSevenCategorySelectList.assetCategoryId">{{ assetSevenCategorySelectList.assetCategoryName }}</option>
                    </select>
               </div>
               <div class="form-group">
                     <label>Select Product Name/Code</label>
                     <select v-model="form.assetProductId" name="assetProductId" :class="{ 'is-invalid': form.errors.has('assetProductId') }" class="form-control">
                         <option value="">Select One</option>
                         <option :value="assetCodeEntryList.assetCodeEntryId" v-for="assetCodeEntryList in assetCodeEntryLists">{{ assetCodeEntryList.assetPorductName }}/{{ assetCodeEntryList.assetPorductCode }}</option>
                     </select>
                  <has-error :form="form" field="assetProductId"></has-error>
              </div>
              <div class="form-group">
                    <label>Select Supplier Name</label>
                    <select v-model="form.assetSupplierId" name="assetSupplierId" :class="{ 'is-invalid': form.errors.has('assetSupplierId') }" class="form-control" @change.prevent="assetSupplierIdCatch()">
                         <option value="">Select One</option>
                         <option :value="assetSupplierList.assetSupplierId" v-for="assetSupplierList in assetSupplierLists">{{ assetSupplierList.assetSupplierName }}</option>
                    </select>
                    <has-error :form="form" field="assetSupplierId"></has-error>
              </div>
              <div class="form-group">
                    <label>Select Brand Name</label>
                    <select v-model="form.assetBrandId" name="assetBrandId" :class="{ 'is-invalid': form.errors.has('assetBrandId') }" class="form-control">
                         <option value="">Select One</option>
                         <option :value="assetBrandList.assetBrandEntryId" v-for="assetBrandList in assetBrandLists">{{ assetBrandList.assetBrandName }}</option>
                    </select>
                    <has-error :form="form" field="assetBrandId"></has-error>
                </div>
                <div class="form-group">
                     <label>Purchase Date</label>
                     <input  v-model="form.purchasedate" type="date" name="purchasedate" :class="{ 'is-invalid': form.errors.has('purchasedate') }" class="form-control">
                     <has-error :form="form" field="purchasedate"></has-error>
                </div>
                <div class="form-group">
                     <label>Mfg Date</label>
                     <input  v-model="form.mfgDate" type="date" name="mfgDate" :class="{ 'is-invalid': form.errors.has('mfgDate') }" class="form-control">
                     <has-error :form="form" field="mfgDate"></has-error>
                </div>
                <div class="form-group">
                     <label>Expiry Date</label>
                     <input  v-model="form.expiryDate" type="date" name="expiryDate" :class="{ 'is-invalid': form.errors.has('expiryDate') }" class="form-control">
                     <has-error :form="form" field="expiryDate"></has-error>
                </div>
                <div class="form-group">
                     <label>Invoice No</label>
                     <input  v-model="form.invoiceNo" type="text" name="invoiceNo" :class="{ 'is-invalid': form.errors.has('invoiceNo') }" placeholder="Invoice No" class="form-control">
                     <has-error :form="form" field="invoiceNo"></has-error>
                </div>
                <div class="form-group">
                     <label>Model No</label>
                     <input  v-model="form.modelNo" type="text" name="modelNo" :class="{ 'is-invalid': form.errors.has('modelNo') }" placeholder="Model No" class="form-control">
                     <has-error :form="form" field="modelNo"></has-error>
                </div>
                <div class="form-group">
                     <label>Product Quantity</label>
                     <input  v-model="form.productQuantity" type="text" name="productQuantity" :class="{ 'is-invalid': form.errors.has('productQuantity') }" placeholder="Product Quantity" class="form-control">
                     <has-error :form="form" field="productQuantity"></has-error>
                </div>
                <div class="form-group">
                     <label>Product Cost</label>
                     <input  v-model="form.productCost" type="text" name="productCost" @keyup.prevent="totalProductCostCal()" :class="{ 'is-invalid': form.errors.has('productCost') }" placeholder="Product Cost" class="form-control">
                     <has-error :form="form" field="productCost"></has-error>
                </div>
                <div class="form-group" v-if="previousPayableBill">
                  <label>Previous Payable Due</label>
                  <input disabled v-model="form.previousPayableDue" type="text" name="previousPayableDue" :class="{ 'is-invalid': form.errors.has('previousPayableDue') }" placeholder="Previous Payable" class="form-control">
                  <has-error :form="form" field="previousPayableDue"></has-error>
                </div>
                <div class="form-group">
                     <label>Total Product Cost</label>
                     <input disabled v-model="form.totalProductCost" type="text" name="totalProductCost" :class="{ 'is-invalid': form.errors.has('totalProductCost') }" placeholder="Total Product Cost" class="form-control">
                     <has-error :form="form" field="totalProductCost"></has-error>
                </div>
                <div class="form-group">
                     <label>Current Payable</label>
                     <input  v-model="form.currentPayable" type="text" name="currentPayable" :class="{ 'is-invalid': form.errors.has('currentPayable') }" placeholder="Current Payable" class="form-control">
                     <has-error :form="form" field="currentPayable"></has-error>
                </div>
                <div class="form-group">
                     <label>Depreciation</label>
                     <div class="form-row">
                         <div class="col-md-4">
                            <input  v-model="form.depreciationYear" @keyup.prevent="checkData()" type="number" name="depreciationYear" :class="{ 'is-invalid': form.errors.has('depreciationYear') }" placeholder="Enter Years" class="form-control">
                            <has-error :form="form" field="depreciationYear"></has-error>
                         </div>
                         <div class="col-md-4">
                            <input  v-model="form.depreciationMonth" @keyup.prevent="checkData()" type="number" name="depreciationMonth" :class="{ 'is-invalid': form.errors.has('depreciationMonth') }" placeholder="Enter Month" class="form-control">
                            <has-error :form="form" field="depreciationMonth"></has-error>
                         </div>
                         <div class="col-md-4">
                            <input  v-model="form.depreciationDay" @keyup.prevent="checkData()" type="number" name="depreciationDay" :class="{ 'is-invalid': form.errors.has('depreciationDay') }" placeholder="Enter Day" class="form-control">
                            <has-error :form="form" field="depreciationDay"></has-error>
                         </div>
                         <input  v-model="form.checkDepreciation" type="hidden" name="checkDepreciation"   class="form-control">
                         <div class="col-md-12 mt-2">
                            <input disabled v-model="form.totalDepreciation" type="text" name="totalDepreciation"   class="form-control">
                         </div>
                    </div>
                </div>
                <div class="form-group">
                     <label>Warranty</label>
                     <div class="form-row">
                         <div class="col-md-6">
                           <input  v-model="form.warranty" type="number" name="warranty" :class="{ 'is-invalid': form.errors.has('warranty') }" placeholder="Warranty" class="form-control">
                         </div>
                         <div class="col-md-6">
                            <select  v-model="form.selectMothOrYearWarranty" name="selectMothOrYearWarranty" class="form-control">
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
                           <input  v-model="form.guarantee" type="number" name="guarantee" :class="{ 'is-invalid': form.errors.has('guarantee') }" placeholder="Guarantee" class="form-control">
                         </div>
                         <div class="col-md-6">
                            <select  v-model="form.selectMothOrYearGuarantee" name="selectMothOrYearGuarantee" class="form-control">
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
                  <input  v-model="form.color" type="text" name="color" :class="{ 'is-invalid': form.errors.has('color') }" placeholder="Color" class="form-control">
                  <has-error :form="form" field="color"></has-error>
                </div>
                <div class="form-group">
                    <label>Size</label>
                    <vue-editor v-model="form.size" type="text" name="Size"  :class="{ 'is-invalid': form.errors.has('Size') }" placeholder="Size"></vue-editor>
                    <has-error :form="form" field="Size"></has-error>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <vue-editor v-model="form.description" type="text" name="description"  :class="{ 'is-invalid': form.errors.has('description') }" placeholder="Description" ></vue-editor>
                    <has-error :form="form" field="description"></has-error>
                </div>

             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Update</button>
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
                    assetCategory : '',
                    assetSubCategory : '',
                    assetThirdCategory : '',
                    assetFourCategory: '',
                    assetFiveCategory: '',
                    assetSixCategory: '',
                    assetSevenCategory: '',

                    assetProductId : '',
                    assetSupplierId : '',
                    assetBrandId : '',
                    purchasedate : '',
                    mfgDate: '',
                    expiryDate: '',
                    invoiceNo: '',
                    modelNo: '',
                    productQuantity: '',
                    productCost: '',
                    previousPayableDue: '',
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

                }),
                assetBrandLists: {},
                assetSupplierLists: {},
                assetCodeEntryLists: {},
                shopAssetEntryLists: {},

                subShow : true,
                thirdShow : true,
                fourShow : true,
                fiveShow : true,
                sixShow : true,
                sevenShow : true,

                previousPayableBill: false,

                assetCategoryLists:{},
                assetSubCategorySelectLists:{},
                assetThirdCategorySelectLists:{},
                assetFourCategorySelectLists:{},
                assetFiveCategorySelectLists:{},
                assetSixCategorySelectLists:{},
                assetSevenCategorySelectLists:{},

            }
        },
        components: {
          VueEditor,
        },
        mounted(){
            this.allCategoryShow();
            this.brandAndCodeList();
            this.assetSingleDataShow();
            this.assetCategoryListSelect();
        },
        methods:{
            checkData(){
                this.form.checkDepreciation = 1;
                if (this.form.depreciationYear  != "" && this.form.depreciationMonth != "" && this.form.depreciationDay != "") {
                      let depreciationYear  = (this.form.depreciationYear * 12) * 30;
                      let depreciationMonth = (this.form.depreciationMonth * 30);
                      let depreciationDay   = (this.form.depreciationDay * 1);

                      let totalDay = parseFloat(depreciationYear) + parseFloat(depreciationMonth) + parseFloat(depreciationDay);
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationYear = [];
                          this.form.depreciationMonth = [];
                          this.form.depreciationDay = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(totalDay);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationYear != "" && this.form.depreciationMonth != "") {
                      let depreciationYear  = (this.form.depreciationYear * 12) * 30;
                      let depreciationMonth = (this.form.depreciationMonth * 30);

                      let totalDay = parseFloat(depreciationYear) + parseFloat(depreciationMonth);
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationYear = [];
                          this.form.depreciationMonth = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(totalDay);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationYear != "" && this.form.depreciationDay != "") {
                      let depreciationYear  = (this.form.depreciationYear * 12) * 30;
                      let depreciationDay = (this.form.depreciationDay * 1);

                      let totalDay = parseFloat(depreciationYear) + parseFloat(depreciationDay);
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationYear = [];
                          this.form.depreciationDay = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(totalDay);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationMonth != "" && this.form.depreciationDay != "") {
                      let depreciationMonth = (this.form.depreciationMonth * 30);
                      let depreciationDay   = (this.form.depreciationDay * 1);

                      let totalDay = parseFloat(depreciationMonth) + parseFloat(depreciationDay);
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationYear = [];
                          this.form.depreciationDay = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(totalDay);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationYear) {
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationYear = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let depreciationYear = (this.form.depreciationYear * 12) * 30;
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(depreciationYear);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationMonth) {
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationMonth = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let depreciationMonth = (this.form.depreciationMonth * 30);
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(depreciationMonth);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }
                else if (this.form.depreciationDay) {
                      if (this.form.productCost == "") {
                          alert('Please Enter Your Total Product Cost');
                          this.form.depreciationDay = [];
                          this.form.totalDepreciation = [];
                          this.totalDepreciationShow = false;
                      }
                      else{
                          let depreciationDay = (this.form.depreciationDay * 1);
                          let totalDevision = parseFloat(this.form.productCost) / parseFloat(depreciationDay);
                          this.form.totalDepreciation = (totalDevision).toFixed(3);
                      }
                }

           },
           allCategoryShow(){
              axios.get('assetEntryEdit/allCategoryShow').then(res =>{
                     this.assetCategoryLists = res.data.assetCategoryLists;
                     this.assetSubCategorySelectLists = res.data.assetSubCategoryLists;
                     this.assetThirdCategorySelectLists = res.data.assetThirdCategoryLists;
                     this.assetFourCategorySelectLists = res.data.assetFourCategoryLists;
                     this.assetFiveCategorySelectLists = res.data.assetFiveCategoryLists;
                     this.assetSixCategorySelectLists = res.data.assetSixCategoryLists;
                     this.assetSevenCategorySelectLists = res.data.assetSevenCategoryLists;

              });
           },
           assetSingleDataShow(){
              axios.get('/shopAssetEntry/'+this.$route.params.shopAssetEntryId+'/edit').then(res =>{
                   this.form.fill(res.data.assetSingleData)
                   this.assetSupplierIdCatch();

                   this.form.totalDepreciation  = res.data.assetSingleData.depreciation
                   this.form.assetSubCategory = res.data.assetSingleData.assetCategoryId
                   this.form.assetThirdCategory = res.data.assetSingleData.assetCategoryId
                   this.form.assetFourCategory = res.data.assetSingleData.assetCategoryId
                   this.form.assetFiveCategory = res.data.assetSingleData.assetCategoryId
                   this.form.assetSixCategory = res.data.assetSingleData.assetCategoryId
                   this.form.assetSevenCategory = res.data.assetSingleData.assetCategoryId

                   if (res.data.categoryInfo.label === 7 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                       this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                       this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                       this.form.assetFiveCategory = res.data.fiveCategoryName.assetCategoryId
                       this.form.assetSixCategory = res.data.sixCategoryName.assetCategoryId
                   }
                   if (res.data.categoryInfo.label === 6 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                       this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                       this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                       this.form.assetFiveCategory = res.data.fiveCategoryName.assetCategoryId
                       this.sevenShow = false
                   }
                   if (res.data.categoryInfo.label === 5 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                       this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                       this.form.assetFourCategory = res.data.fourCategoryName.assetCategoryId
                       this.sixShow = false
                       this.sevenShow = false
                   }
                   if (res.data.categoryInfo.label === 4 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                       this.form.assetThirdCategory = res.data.thirdCategoryName.assetCategoryId
                       this.fiveShow = false;
                       this.sixShow = false;
                       this.sevenShow = false;
                   }
                   if (res.data.categoryInfo.label === 3 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.form.assetSubCategory = res.data.subCategoryName.assetCategoryId
                       this.fourShow = false;
                       this.fiveShow = false;
                       this.sixShow = false;
                       this.sevenShow = false;
                   }
                   if (res.data.categoryInfo.label === 2 ) {
                       this.form.assetCategory    = res.data.categoryName.assetCategoryId
                       this.thirdShow = false;
                       this.fourShow = false;
                       this.fiveShow = false;
                       this.sixShow = false;
                       this.sevenShow = false;
                   }
                   if (res.data.categoryInfo.label === 1 ) {
                       this.form.assetCategory = res.data.assetSingleData.assetCategoryId
                       this.subShow = false;
                       this.thirdShow = false;
                       this.fourShow = false;
                       this.fiveShow = false;
                       this.sixShow = false;
                       this.sevenShow = false;
                   }


              });
           },

          updateAsset(){
              this.form.put('/shopAssetEntry/'+this.$route.params.shopAssetEntryId).then(res =>{
                    if (res.data.owed) {
                        Toast.fire({
                          icon: 'error',
                          title: 'You wrote more money than you owed'
                        })
                    }
                    else{
                        Toast.fire({
                          icon: 'success',
                          title: 'Asset Update Successfully'
                        })
                      this.$router.push('/asset@entry')
                  }
              })
            },
           assetSupplierIdCatch(){
                 this.previousPayableBill = false;
                 axios.get('/shopAssetEntry/'+this.form.assetSupplierId).then(res =>{
                      if (res.data.previousPayableDue) {
                          this.previousPayableBill = true;
                          this.form.previousPayableDue = res.data.previousPayableDue;
                      }
                      if (res.data.paidPayableBill) {
                          this.previousPayableBill = false;
                      }
                 })
            },
            brandAndCodeList(){
                axios.get('/shopAssetEntry/create').then(res =>{
                      this.assetBrandLists = res.data.assetBrandLists
                      this.assetSupplierLists = res.data.assetSupplierLists
                      this.assetCodeEntryLists = res.data.assetCodeEntryLists
                })
            },

            assetCategoryListSelect(){
              axios.get('/assetCateorySelectList').then(res =>{
                    this.assetCategoryLists = res.data.shopAssetCategoryList;
              });
            },
            assetCategorySelect(){
              this.subShow = false;
              this.thirdShow = false;
              this.fourShow = false;
              this.fiveShow = false;
              this.sixShow = false;
              this.sevenShow = false;
              this.form.assetSubCategory = [];
              this.form.assetThirdCategory = [];
              this.form.assetFourCategory = [];
              this.form.assetFiveCategory = [];
              this.form.assetSixCategory = [];
              this.form.assetSevenCategory = [];

              axios.get('/assetCategoryId/'+this.form.assetCategory).then(res =>{
                    this.assetSubCategorySelectLists = res.data.assetSubCategoryList;

                    if (res.data.assetSubCategoryList != "") {
                        this.subShow = true;
                    }
                    else {
                        this.subShow = false;
                    }
              });
            },
            assetSubCategorySelect(){
              axios.get('/assetSubCategoryId/'+this.form.assetSubCategory).then(res =>{
                    this.assetThirdCategorySelectLists = res.data.assetThirdCategoryList;

                    if (res.data.assetThirdCategoryList != "") {
                        this.thirdShow = true;
                    }
                    else {
                      this.thirdShow = false;
                    }
              });
            },
            assetThirdCategorySelect(){
              axios.get('/assetThirdCategoryId/'+this.form.assetThirdCategory).then(res =>{
                    this.assetFourCategorySelectLists = res.data.assetFourCategoryList;

                    if (res.data.assetFourCategoryList != "") {
                        this.fourShow = true;
                    }
                    else {
                       this.fourShow = false;
                    }
              });
            },
            assetFourCategorySelect(){
              axios.get('/assetFourCategoryId/'+this.form.assetFourCategory).then(res =>{
                    this.assetFiveCategorySelectLists = res.data.assetFiveCategoryList;

                    if (res.data.assetFiveCategoryList != "") {
                        this.fiveShow = true;
                    }
                    else {
                       this.fiveShow = false;
                    }
              });
            },
            assetFiveCategorySelect(){
              axios.get('/assetFiveCategoryId/'+this.form.assetFiveCategory).then(res =>{
                    this.assetSixCategorySelectLists = res.data.assetSixCategoryList;

                    if (res.data.assetSixCategoryList != "") {
                         this.sixShow = true;
                    }
                    else {
                        this.sixShow = false;
                    }
              });
            },
            assetSixCategorySelect(){
              axios.get('/assetSixCategoryId/'+this.form.assetSixCategory).then(res =>{
                    this.assetSevenCategorySelectLists = res.data.assetSevenCategoryList;
                    if (res.data.assetSevenCategoryList != "") {
                        this.sevenShow = true;
                    }
                    else {
                       this.sevenShow = false;
                    }
              });
            },
           assetSevenCategorySelect(){
              axios.get('/assetSevenCategoryId/'+this.form.assetSevenCategory).then(res =>{
           });
          },
        }
    }

</script>
