<template id="">
  <span>
      <div class="card">
        <form action="" @submit.prevent="addPurchaseInvoice()">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">New Purchase Entry</h3>
        </div>

        <div class="purchase-entery purchase-border p-3 ">
          <div class="row m-0" >
            <div class="col-auto pl-lg-auto purcha-border p-3">
              <div class="table-responsive bg-white">
                <table class=" table-hover  mb-0">
                  <tr>
                    <td class="title-name">Purchase Date</td>
                    <td>
                        <div class="input-group">
                         <div class="input-group-prepend datepicker-trigger">
                             <div class="input-group-text">
                                 <i class="fa fa-calendar-alt"></i>
                             </div>
                         </div>
                         <input type="text" v-model="form.purchaseDate" name="purchaseDate" class="form-control" data-toggle="datepicker-icon" placeholder="Data"/>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Purchase Invoice No</td>
                    <td>
                        <div>
                          <input disabled type="text"  v-model="form.purchaseInvoiceNo" name="purchaseInvoiceNo" class="form-control" placeholder="Invoice No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Product Supplier Name</td>
                    <td>
                        <div>
                          <select class="form-control" v-model="form.productSupplierId"
                           :class="{ 'is-invalid': form.errors.has('productSupplierId') }"
                            @change.prevent="productSupplierId()" name="productSupplierId">
                            <option value="">Select One</option>
                            <option v-for="productSupplierList in productSupplierLists" 
                            :value="productSupplierList.productSupplierId">{{ productSupplierList.productSupplierName }}</option>
                          </select>
                          <has-error :form="form" field="productSupplierId"></has-error>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Moblie No</td>
                    <td>
                        <div>
                          <input disabled type="text"  v-model="form.moblieNo" name="moblieNo" class="form-control" placeholder="Moblie No">
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Address</td>
                    <td >
                        <div>
                          <textarea disabled v-model="form.address" name="address"  placeholder="Address" class="form-control" style="height:80px"></textarea>
                        </div>
                     </td>
                  </tr>
                  <tr>
                    <td class="title-name">Purchase Type</td>
                     <td>
                        <div v-for="purchaseType in purchaseTypes" style="float: left;margin-right: 10px;" >
                          <input type="checkbox" v-model="form.purchaseTypeId"  name="purchaseTypeId" :value="purchaseType.id">
                          {{ purchaseType.purchaseType }}
                        </div>
                          <has-error :form="form" field="purchaseTypeId"></has-error>
                     </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>


        <div class="product-page pl-2 purcha-border" style="background:#E7F1E8">
             <form action="" @submit.prevent="addProduct()">
               <div class="form-row">
                 <div class="form-group col-sm-2 col-6">
                   <label>Product Name</label>
                     <select class="form-control" v-model="form.productId" name="productId">
                        <option value="">Select One</option>
                        <option v-for="productNameList in productNameLists" :value="productNameList.productNameId">
                            {{ productNameList.productName }}  ({{ productNameList.productCode }})
                        </option>
                     </select>
                 </div>
                 <div class="form-group  col-sm-2  col-6">
                     <label>Brand Name</label>
                     <select class="form-control" v-model="form.brandId" name="brandId">
                        <option value="">Select One</option>
                        <option v-for="brandList in brandLists" :value="brandList.brandId">
                            {{ brandList.brandName }}
                        </option>
                     </select>
                 </div>
                 <div class="form-group  col-sm-2 col-6">
                   <label>Unit</label>
                   <select  v-model="form.unitId" name="unitId" class="form-control">
                     <option value="">Select One</option>
                     <option  v-for="unitNameShow in unitNameShows" :value="unitNameShow.uniteEntryId">{{ unitNameShow.uniteEntryName }}</option>
                   </select>
                 </div>
                 <div class="form-group  col-sm-1 col-6">
                   <label>Quantity</label>
                   <input type="text" v-model="form.quantity" @keyup.prevent="unitPrice()" name="quantity" placeholder="Quantity" class="form-control">
                 </div>
                 <div class="form-group  col-sm-1 col-6">
                   <label>Unit Price</label>
                   <input type="text" v-model="form.unitPrice"  @keyup.prevent="unitPrice()" name="unitPrice" placeholder="Unit Price" class="form-control">
                 </div>
                 <div class="form-group  col-sm-1 col-6">
                   <label>Discount</label>
                   <input type="text" v-model="form.percetage"  @keyup.prevent="percetage()" name="percetage" placeholder="Percetage" class="form-control">
                 </div>
                 <div class="form-group  col-sm-2 col-6">
                   <label>Total Price</label>
                   <input type="text" disabled v-model="form.totalPrice"  name="totalPrice" placeholder="Total Price" class="form-control">
                 </div>
                 <input type="hidden" disabled v-model="form.percetagePrice"  name="percetagePrice" class="form-control">
                 <div class="btn-mr">
                    <label></label>
                    <button type="submit" class="btn btn-info btn-padding">Add</button>
                 </div>
               </div>
             </form>
         </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered mb-0">
              <thead>
                 <tr style="background:rgba(242, 242, 242, 0.47)">
                    <th>SN</th>
                    <th>Product Name</th>
                    <th>Brand Name</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                 <tr v-for="(purchaseProductList, index) in purchaseProductLists" v-if="cusPurchaseInvoice == purchaseProductList.purchaseInvoiceNo">
                   <td>{{ index+1 }}</td>
                   <td v-if="purchaseProductList.product_name">{{ purchaseProductList.product_name.productName }} ({{ purchaseProductList.product_name.productCode }})</td>
                   <td v-if="purchaseProductList.brand_name">{{ purchaseProductList.brand_name.brandName }}</td>
                   <td v-if="purchaseProductList.unit_name">{{ purchaseProductList.unit_name.uniteEntryName }}</td>
                   <td>{{ purchaseProductList.quantity }}</td>
                   <td>{{ purchaseProductList.unitPrice }}</td>
                   <td>{{ purchaseProductList.totalPrice }}</td>
                   <td>
                      <button type="button" @click="distroy(purchaseProductList.purchaseProductId)"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                      <button type="button" class="btn btn-hover-shine  btn-success" data-toggle="modal" @click="purchaseProductIdCatch(purchaseProductList.purchaseProductId)" :data-target="'#productId'+purchaseProductList.purchaseProductId">
                         Add  Details
                      </button>
                   </td>
                   <!-- Modal -->
                   <div class="modal fade" :id="'productId'+purchaseProductList.purchaseProductId" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLongTitle">Add Product More Detalis</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                          <form>
                             <div class="modal-body">
                               <div class="purchase-entry py-4 px-2">
                                 <div class="col-12  supplier-border shadow-custom">
                                    <div class="form-row">
                                      <input  v-model="form.purchaseProductIdCatch"  type="hidden" name="purchaseProductIdCatch" class="form-control">

                                         <div class="form-group col-md-6">
                                             <label><b>Model No </b></label>
                                             <input  v-model="form.modelNo" type="text" name="modelNo"  placeholder="Model No" class="form-control">
                                         </div>
                                         <div class="form-group col-md-6">
                                             <label><b>Batch No </b></label>
                                             <input  v-model="form.batchNo" type="text" name="batchNo"  placeholder="Batch No" class="form-control">
                                         </div>
                                     </div>

                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label><b>Mfg Date </b></label>
                                              <input  v-model="form.mfgDate" type="date" name="mfgDate" class="form-control">
                                          </div>
                                         
                                        <div class="form-group col-md-6">
                                              <label><b>Expiry Date </b></label>
                                              <input  v-model="form.expiryDate" type="date" name="expiryDate"  class="form-control">
                                          </div>
                                         
                                     </div>


                                     <div class="form-row">
                                        <div class="form-group col-md-6">
                                              <label><b>Mfg License No </b></label>
                                              <input  v-model="form.mfgLicenseNO" type="text" name="mfgLicenseNO"  placeholder="Mfg License No" class="form-control">
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label><b>QR Code </b></label>
                                              <input  v-model="form.qrCode" type="text" name="qrCode"  placeholder="QR Code" class="form-control">
                                          </div>
                                      </div>

                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label><b>Warranty </b></label>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                  <input  v-model="form.warranty" type="number" name="warranty"  placeholder="Warranty" class="form-control">
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
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label><b>Guarantee </b></label>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                  <input  v-model="form.guarantee" type="number" name="guarantee"  placeholder="Guarantee" class="form-control">
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
                                        </div>
                                      </div>
                                     
                                      <div class="form-row">
                                          <div class="form-group col-md-6">
                                              <label><b>Tax  </b> <hr> </label>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="customRadioInline1" v-model="form.tax" name="tax" class="custom-control-input" value="1" @click.submit="taxYes()">
                                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                              </div>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                  <input type="radio" id="customRadioInline2" v-model="form.tax" name="tax" class="custom-control-input" value="0" @click.submit="taxNo()">
                                                  <label class="custom-control-label" for="customRadioInline2">No</label>
                                              </div>
                                              <div class="form-group mb-0 mt-3" v-if="taxAmountTypeShow">
                                                 <div class="input-group">
                                                     <input  v-model="form.taxAmount" type="text" name="taxAmount" placeholder="Tax Amount"  class="form-control">
                                                     <div class="input-group-prepend">
                                                       <select  v-model="form.taxAmountType" name="taxAmountType" class="input-group-text">
                                                           <option value="">Select One</option>
                                                           <option value="1">Taka</option>
                                                           <option value="2">Percetage</option>
                                                       </select>
                                                     </div>
                                                 </div>
                                              </div>
                                          </div>
                                          <div class="form-group col-md-6">
                                              <label><b>Quality Type</b> <hr></label>
                                              <div class="custom-radio custom-control-inline p-0 m-0">
                                                  <input type="radio" id="customRadioInline3" v-model="form.quantityType" name="quantityType" class="custom-control-input" value="1">
                                                  <label class="custom-control-label" for="customRadioInline3">Low</label>
                                              </div>
                                              <div class="custom-radio custom-control-inline p-0 m-0">
                                                  <input type="radio" id="customRadioInline4" v-model="form.quantityType" name="quantityType" class="custom-control-input" value="2">
                                                  <label class="custom-control-label" for="customRadioInline4">Medium</label>
                                              </div>
                                              <div class="custom-radio custom-control-inline p-0 m-0">
                                                  <input type="radio" id="customRadioInline5" v-model="form.quantityType" name="quantityType" class="custom-control-input" value="3">
                                                  <label class="custom-control-label" for="customRadioInline5">High</label>
                                              </div>
                                          </div>
                                     </div>

                                     <div class="form-group">
                                         <label><b>Quantity Notification </b></label>
                                         <input  v-model="form.quantityNoti" type="number" name="quantityNoti" placeholder="Quantity Notification" class="form-control">
                                     </div>
                                     <!-- Add More Field -->
                                     <div class="form-group">
                                       <button type="button" class="btn btn-hover-shine btn-primary" @click.submit="addMoreField()" name="button">Add More Field</button>
                                     </div>


                                     <div class="moreFieldForEdit">

                                      

                                     <div class="form-row" v-if="fieldNameOneShow">
                                         <div class="form-group col-md-5">
                                             <label>Field Name</label>
                                             <input type="text" v-model="form.fieldNameOne"  name="fieldNameOne" placeholder="Enter Name" class="form-control">
                                         </div>
                                         <div class="form-group col-md-5">
                                             <label>Field Work</label>
                                             <input type="text" v-model="form.workOne"  name="workOne" placeholder="Enter Work" class="form-control">
                                         </div>
                                         <div class="form-group col-md-2">
                                             <label>Delete</label>
                                             <button type="button" class="btn btn-hover-shine btn-danger" @click.submit="oneFieldDelete(fieldNameOneShow)" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                         </div>
                                    </div>
                                    <div class="form-row" v-if="fieldNameTwoShow">
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.fieldNameTwo"  name="fieldNameTwo" placeholder="Enter Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.workTwo"  name="workTwo" placeholder="Enter Work" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <button type="button" class="btn btn-hover-shine btn-danger" @click.submit="twoFieldDelete(fieldNameTwoShow)" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-row" v-if="fieldNameThreeShow">
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.fieldNameThree"  name="fieldNameThree" placeholder="Enter Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.workThree"  name="workThree" placeholder="Enter Work" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <button type="button" class="btn btn-hover-shine btn-danger" @click.submit="threeFieldDelete(fieldNameThreeShow)" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-row" v-if="fieldNameFourShow">
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.fieldNameFour"  name="fieldNameFour" placeholder="Enter Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-5">
                                          <input type="text"  v-model="form.workFour"  name="workFour" placeholder="Enter Work" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                          <button type="button" class="btn btn-hover-shine btn-danger" @click.submit="fourFieldDelete(fieldNameFourShow)" ><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <small class="text-danger"> Maximum field limit 4. </small>
                                    </div>


                                 </div>
                                 <div class="col-12 supplier-border mt-5 shadow-custom">
                                     <div class="form-group">
                                         <label><b> Product Description </b></label>
                                         <vue-editor v-model="form.proDescription" type="text" name="proDescription"   placeholder="Product Description" ></vue-editor>
                                     </div>
                                      <div class="form-group">
                                         <label><b> Product Advantage </b></label>
                                         <vue-editor v-model="form.proAdvantage" type="text" name="proAdvantage"  placeholder="Product Advantage" ></vue-editor>
                                      </div>
                                 </div>
                               </div>
                             </div>
                             <div class="modal-footer">
                               <button type="button" class="btn btn-hover-shine btn-danger" data-dismiss="modal">Close</button>
                               <button  class="btn btn-hover-shine btn-success" @click.prevent="purchaseProductDetailsAdd()" data-dismiss="modal" >Add Detalis</button>
                             </div>
                         </form>
                       </div>
                     </div>
                   </div>
                 </tr>
               </tbody>
            </table>
          </div>


         <div class="purchase-entery purchase-border p-3">
           <div class="row m-0">
             <div class="col-auto ml-auto purcha-border p-3">
               <div class="table-responsive bg-white">
                 <table class=" table-hover  mb-0">
                   <tr>
                     <td class="title-name">Total Purchase Value </td>
                     <td>
                       <input type="hidden" disabled v-model="form.totalProductQuantity" name="totalProductQuantity" class="form-control"  placeholder="Total Product Quantity">
                       <div>
                         <input type="text" disabled v-model="form.totalPurchaseValue" name="totalPurchaseValue" class="form-control"  placeholder="Total Purchase Value">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Carriage Inward</td>
                     <td>
                         <div>
                           <input type="text"  v-model="form.carriageInward" @keyup.prevent="carriageInward()" name="carriageInward"  class="form-control" placeholder="Carriage Inward">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Amount</td>
                     <td>
                       <div>
                         <input type="text" disabled v-model="form.totalAmount" name="totalAmount" class="form-control" placeholder="Total Amount">
                       </div>
                      </td>
                   </tr>
                   <tr>
                     <td colspan="2"> <hr> </td>
                   </tr>
                   <tr>
                     <td class="title-name">Discount </td>
                     <td>
                         <div>
                           <input type="text" v-model="form.discount" @keyup.prevent="discount()" name="discount" class="form-control" placeholder="Discount">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Supplier Payable </td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.supplierPayable"  name="supplierPayable" class="form-control" placeholder="Supplier Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td colspan="2"> <hr> </td>
                   </tr>
                   <tr>
                     <td class="title-name">Other Cost </td>
                     <td>
                         <div>
                           <input type="text" v-model="form.otherCost" @keyup.prevent="otherCosts()" name="otherCost" class="form-control" placeholder="Other Cost">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Damage &amp; Warranty</td>
                     <td>
                         <div>
                           <input type="text" v-model="form.damageAndWarranty" @keyup.prevent="damageAndWarrantys()" name="damageAndWarranty" class="form-control" placeholder="Damage And Warranty">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td colspan="2"> <hr> </td>
                   </tr>
                   <tr>
                     <td class="title-name">Total Product Cost</td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.totalProductCost" name="totalProductCost" class="form-control" placeholder="Total Product Cost">
                         </div>
                         <input type="hidden" disabled v-model="form.totalDiscount" name="totalDiscount" class="form-control" placeholder="Total Product Cost">
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Previous Payable</td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.previousPayable" name="previousPayable" class="form-control" placeholder="Previous Payable">
                         </div>
                      </td>
                   </tr>
                   <tr>
                     <td class="title-name">Current Payable </td>
                     <td>
                         <div>
                           <input type="text" disabled v-model="form.currentPayable" name="currentPayable" class="form-control" placeholder="Current Payable">
                         </div>
                      </td>
                   </tr>
                   <!-- <tr>
                     <td class="title-name">Payable</td>
                     <td>
                         <div>
                           <input type="text" v-model="form.payable" name="payable" class="form-control" placeholder="Payable ">
                         </div>
                      </td>
                   </tr> -->
                   <tr>
                     <td>
                     </td>
                     <td>
                       <button type="submit" class="mt-3 mr-2 btn-pill btn-hover-shine btn btn-primary"> Submit </button>
                     </td>
                   </tr>
                  </table>
                </div>
             </div>
           </div>
         </div>
       </form>
      </div>

      <div class="card main-card  element-block-example mt-5">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Purchase Invoice List</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered mb-0">
            <thead>
               <tr style="background:rgba(242, 242, 242, 0.47)">
                 <th>SN</th>
                 <th>Purchase Date</th>
                 <th>Purchase Invoice No</th>
                 <th>Supplier Name</th>
                 <th>Purchase Type</th>
                 <th>Total Purcase Value</th>
                 <th>Total Purcase Cost</th>
                 <th> View </th>
                 <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(purchaseInvoiceList, index) in purchaseInvoiceLists">
                  <td>{{ index+1 }}</td>
                  <td>{{ purchaseInvoiceList.purchaseDate }}</td>
                  <td>{{ purchaseInvoiceList.purchaseInvoiceNo }}</td>
                  <td v-if="purchaseInvoiceList.product_supplier_name">{{ purchaseInvoiceList.product_supplier_name.productSupplierName }}</td>
                  <td>
                    <span v-for="purchaseTypeId in purchaseInvoiceList.purchaseTypeId">
                       <span v-for="adminPurchaseTypeList in adminPurchaseTypeLists" v-if="purchaseTypeId == adminPurchaseTypeList.purchaseTypeId">
                         {{ adminPurchaseTypeList.purchaseTypeName }}
                       </span>
                    </span>
                  </td>
                  <td>{{ purchaseInvoiceList.totalPurchaseValue }}</td>
                  <td>{{ purchaseInvoiceList.totalProductCost }}</td>
                  <td>
                    <router-link :to="`/ProductInvoiceView${purchaseInvoiceList.purchaseInvoiceId}`" class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"><i class=" fa fa-eye mr-1"></i> View</router-link>
                  </td>
                  <td>
                    <router-link :to="`/purchase@entryEdit${purchaseInvoiceList.purchaseInvoiceId}`" class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"><i class=" fa fa-edit"></i>Edit</router-link>
                  </td>
                </tr>
              </tbody>
           </table>
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
                  purchaseDate : '',
                  purchaseInvoiceNo : '',
                  productSupplierId : '',
                  moblieNo : '',
                  address : '',
                  // Product Field
                  purchaseTypeId : [],
                  productId : '',
                  brandId : '',
                  unitId : '',
                  quantity : '',
                  unitPrice : '',
                  percetage : '',
                  totalPrice : '',
                  percetagePrice : '',
                  // Total calculation
                  totalProductQuantity : '',
                  totalPurchaseValue : '',
                  carriageInward : '',
                  totalAmount : '',
                  discount : '',
                  supplierPayable : '',
                  otherCost : '',
                  damageAndWarranty : '',
                  totalProductCost : '',
                  totalDiscount : '',
                  previousPayable : '',
                  currentPayable : '',
                  // payable : '',

                  // Modal Form
                  purchaseProductIdCatch : '',
                  modelNo : '',
                  batchNo : '',
                  qrCode : '',
                  mfgLicenseNO : '',
                  warranty : '',
                  selectMothOrYearWarranty : '',
                  guarantee : '',
                  selectMothOrYearGuarantee : '',
                  mfgDate : '',
                  expiryDate : '',
                  tax : '',
                  taxAmount : '',
                  taxAmountType : '',
                  quantityType : '',
                  quantityNoti : '',
                  proDescription : '',
                  proAdvantage : '',
                  // Add More Field
                  fieldNameOne:'',
                  fieldNameTwo:'',
                  fieldNameThree:'',
                  fieldNameFour:'',
                  workOne:'',
                  workTwo:'',
                  workThree:'',
                  workFour:'',

              }),
                productSupplierLists:{},
                purchaseTypes:{},
                brandLists:{},
                unitNameShows:{},
                productNameLists:{},
                purchaseProductLists:{},
                purchaseInvoiceNumber:{},
                cusPurchaseInvoice:{},
                cusPreviousPayable:{},
                purchaseInvoiceLists:{},
                adminPurchaseTypeLists:{},
                invoiceProductMoreDetailss:{},
                invoiceProductMoreField1:[],
                invoiceProductMoreField2:[],
                invoiceProductMoreField3:[],
                invoiceProductMoreField4:[],

                taxAmountTypeShow:false,
                fieldNameOneShow:false,
                fieldNameTwoShow:false,
                fieldNameThreeShow:false,
                fieldNameFourShow:false,

          }
      },
      components: {
        VueEditor,
      },
      mounted(){
         this.purchaseInvoiceNo();
         this.productSupplierList();
         this.purchaseTypeShow();
         this.unitNameShow();
         this.productNameShow();
         this.productList();
         this.totalPurchaseValue()
         this.purchaseInvoiceList()
      },

      methods:{
          addMoreField(){
               this.fieldNameOneShow = true;
               if (this.form.fieldNameOne != "" && this.form.workOne != "") {
                   this.fieldNameTwoShow = true;
               }
               if (this.form.fieldNameTwo != "" && this.form.workTwo != "") {
                   this.fieldNameThreeShow = true;
               }
               if (this.form.fieldNameThree != "" && this.form.workThree != "") {
                   this.fieldNameFourShow = true;
               }
          },
          oneFieldDelete(id){
            axios.get('/purchaseProductMoreFieldDelete/'+id).then(res => {
                          if(res.data.delete==1){
               this.fieldNameOneShow = false;
               if (this.form.fieldNameOne != null) {
                   this.form.fieldNameOne = [];
                   this.form.workOne = [];
               }
                            }else{
                               Toast.fire({
                                    icon: 'error',
                                    title: 'Data not delete',
                                })
                            }
                        });
          },
          twoFieldDelete(id){
            axios.get('/purchaseProductMoreFieldDelete/'+id).then(res => {
                          if(res.data.delete==1){
               this.fieldNameTwoShow = false;
               if (this.form.fieldNameTwo != null) {
                   this.form.fieldNameTwo = [];
                   this.form.workTwo = [];
               }
                            }else{
                               Toast.fire({
                                    icon: 'error',
                                    title: 'Data not delete',
                                })
                            }
                        });
          },
          threeFieldDelete(id){
            axios.get('/purchaseProductMoreFieldDelete/'+id).then(res => {
                          if(res.data.delete==1){
               this.fieldNameThreeShow = false;
               if (this.form.fieldNameThree != null) {
                   this.form.fieldNameThree = [];
                   this.form.workThree = [];
               }
                            }else{
                               Toast.fire({
                                    icon: 'error',
                                    title: 'Data not delete',
                                })
                            }
                        });
          },
          fourFieldDelete(id){
                        axios.get('/purchaseProductMoreFieldDelete/'+id).then(res => {
                          if(res.data.delete==1){
                                this.fieldNameFourShow = false;
                            if (this.form.fieldNameFour != null) {
                                this.form.fieldNameFour = [];
                                this.form.workFour = [];
                            }
                            }else{
                               Toast.fire({
                                    icon: 'error',
                                    title: 'Data not delete',
                                })
                            }
                        });
              
          },
          purchaseProductDetailsAdd(){
               if (this.form.productSupplierId == "") {
                   Toast.fire({
                       icon: 'error',
                       title: 'Select Product Supplier Name'
                   })
               }
               else{
                   this.form.post('/purchaseProductDetails').then(res =>{
                       if (res.data.noEntry) {
                           Toast.fire({
                             icon: 'error',
                             title: 'Enter Your Information'
                           })
                       }
                       else{
                           if (res.data.alreadyEntry) {
                               Toast.fire({
                                 icon: 'success',
                                 title: 'Update Poroduct Description'
                               })
                           }
                           else{
                               Toast.fire({
                                 icon: 'success',
                                 title: 'Product Details Entry Successfully'
                               })
                               this.form.taxAmountTypeShow = false;
                               this.form.fieldNameOneShow = false;
                               this.form.fieldNameTwoShow = false;
                               this.form.fieldNameThreeShow = false;
                               this.form.fieldNameFourShow = false;

                               this.form.purchaseProductIdCatch = '';
                               this.form.modelNo = '';
                               this.form.batchNo = '';
                               this.form.qrCode = '';
                               this.form.mfgLicenseNO = '';
                               this.form.warranty = '';
                               this.form.selectMothOrYearWarranty = '';
                               this.form.guarantee = '';
                               this.form.selectMothOrYearGuarantee = '';
                               this.form.mfgDate = '';
                               this.form.expiryDate = '';
                               this.form.tax = '';
                               this.form.taxAmount = '';
                               this.form.taxAmountType = '';;
                               this.form.quantityType = '';
                               this.form.quantityNoti = '';
                               this.form.proDescription = '';
                               this.form.proAdvantage = '';
                               // Add More Field
                               this.form.fieldNameOne = '';
                               this.form.fieldNameTwo = '';
                               this.form.fieldNameThree = '';
                               this.form.fieldNameFour = '';
                               this.form.workOne = '';
                               this.form.workTwo = '';
                               this.form.workThree = '';
                               this.form.workFour = '';
                           }
                       }
                   });
               }
          },

          purchaseProductIdCatch(purchaseProductId){
              this.form.purchaseProductIdCatch  = purchaseProductId;
               
               axios.get('/invoiceProductMoreDetails/'+this.form.purchaseProductIdCatch+'/'+this.form.purchaseInvoiceNo).then(res => {
                 this.form.modelNo = res.data.invoiceProductMoreDetailss.modelNo;
                 this.form.batchNo = res.data.invoiceProductMoreDetailss.batchNo;
                 this.form.qrCode = res.data.invoiceProductMoreDetailss.qrCode;
                 this.form.mfgLicenseNO = res.data.invoiceProductMoreDetailss.mfgLicenseNO;
                 this.form.warranty = res.data.invoiceProductMoreDetailss.warranty;
                 this.form.selectMothOrYearWarranty = res.data.invoiceProductMoreDetailss.selectMothOrYearWarranty;
                 this.form.guarantee = res.data.invoiceProductMoreDetailss.guarantee;
                 this.form.selectMothOrYearGuarantee = res.data.invoiceProductMoreDetailss.selectMothOrYearGuarantee;
                 this.form.mfgDate = res.data.invoiceProductMoreDetailss.mfgDate;
                 this.form.expiryDate = res.data.invoiceProductMoreDetailss.expiryDate;
                 this.form.tax = res.data.invoiceProductMoreDetailss.tax;
                 this.form.taxAmount = res.data.invoiceProductMoreDetailss.taxAmount;
                 this.form.taxAmountType = res.data.invoiceProductMoreDetailss.taxAmountType;
                 this.form.quantityType = res.data.invoiceProductMoreDetailss.quantityType;
                 this.form.quantityNoti = res.data.invoiceProductMoreDetailss.quantityNoti;
                 this.form.proDescription = res.data.invoiceProductMoreDetailss.proDescription;
                 this.form.proAdvantage = res.data.invoiceProductMoreDetailss.proAdvantage;




// Add More Field
                               this.form.fieldNameOne = '';
                               this.form.fieldNameTwo = '';
                               this.form.fieldNameThree = '';
                               this.form.fieldNameFour = '';
                               this.form.workOne = '';
                               this.form.workTwo = '';
                               this.form.workThree = '';
                               this.form.workFour = '';



                  if(res.data.invoiceProductMoreField1.serialId == 1){
                    this.fieldNameOneShow = res.data.invoiceProductMoreField1.purchaseProductMoreFieldId;
                    this.form.fieldNameOne = res.data.invoiceProductMoreField1.optionName;
                    this.form.workOne = res.data.invoiceProductMoreField1.optionWork;
                  }
                  

                  if(res.data.invoiceProductMoreField2.serialId == 2){
                    this.fieldNameTwoShow = res.data.invoiceProductMoreField2.purchaseProductMoreFieldId;
                    this.form.fieldNameTwo = res.data.invoiceProductMoreField2.optionName;
                    this.form.workTwo = res.data.invoiceProductMoreField2.optionWork;
                  }
                  
                              
                  if(res.data.invoiceProductMoreField3.serialId == 3){
                    this.fieldNameThreeShow = res.data.invoiceProductMoreField3.purchaseProductMoreFieldId;
                    this.form.fieldNameThree = res.data.invoiceProductMoreField3.optionName;
                    this.form.workThree = res.data.invoiceProductMoreField3.optionWork;
                  }
                  

                  if(res.data.invoiceProductMoreField4.serialId == 4){
                    this.fieldNameFourShow = res.data.invoiceProductMoreField4.purchaseProductMoreFieldId;
                    this.form.fieldNameFour = res.data.invoiceProductMoreField4.optionName;
                    this.form.workFour = res.data.invoiceProductMoreField4.optionWork;
                  }
                  
            });
          },

          purchaseInvoiceNo(){
            axios.get('/purchaseInvoiceShow').then(res => {
                 this.form.purchaseInvoiceNo = res.data.purchaseInvoiceIncrement;
                 this.cusPurchaseInvoice = res.data.purchaseInvoiceIncrement;
                 this.form.purchaseDate = res.data.currentDate;
            });
          },
          productSupplierList(){
              axios.get('/shopWishProductSupplier').then(res => {
                 this.productSupplierLists = res.data.productSupplierList;
              });
          },
          productSupplierId(){
             axios.get('/shopWishProductSupplierId/'+this.form.productSupplierId).then(res => {
                this.form.moblieNo = res.data.productSupplierPhone;
                this.form.address = res.data.productSupplierAddress;
                if (res.data.previousBill != '') {
                    this.form.previousPayable = res.data.previousBill;
                    this.cusPreviousPayable = res.data.previousBill;
                }
             });
             this.totalPurchaseValue()
          },
          purchaseTypeShow(){
             axios.get('/purchaseTypeShow').then(res => {
                  this.purchaseTypes = res.data.purchaseType;
             });
          },
          unitNameShow(){
             axios.get('/unitNameShow').then(res => {
                  this.unitNameShows = res.data.unitNameShow;
                  this.brandLists = res.data.brandLists;
             });
          },
          productNameShow(){
             axios.get('/productNameShow').then(res => {
                  this.productNameLists = res.data.productNameList;
             });
          },
          unitPrice(){
              let quantity = this.form.quantity;
              let unitPrice = this.form.unitPrice;
              let totalPrice = quantity * unitPrice;
              this.form.totalPrice = totalPrice;
              this.form.percetagePrice = totalPrice;
         },
         percetage(){
              if (this.form.percetage != '') {
                  let discountDiv  = parseFloat(this.form.percetage) * parseFloat(this.form.percetagePrice) / parseFloat(100);
                  let discount = parseFloat(this.form.percetagePrice) - parseFloat(discountDiv)
                  this.form.totalPrice  = discount;
              }
              else{
                 this.unitPrice();
              }
          },
         addProduct(){

            if (this.form.productSupplierId != "") {
                this.form.post('/productEntry').then(res => {
                    if (res.data.alreadyEntry) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Already Product Entry!',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Product Quantity Update'
                          }).then( res => {
                            this.form.post('/productQuantityUpdate').then(res => {
                                Swal.fire(
                                  'Successfully!',
                                  'Product Quantity has been Updated',
                                )
                                this.productList();
                                this.form.productId = '';
                                this.form.brandId = '';
                                this.form.quantity = '';
                                this.form.unitId = '';
                                this.form.unitPrice = '';
                                this.form.totalPrice = '';
                                this.form.percetage = '';
                                this.form.percetagePrice = '';
                            });
                        })
                    }
                    else {
                        Toast.fire({
                          icon: 'success',
                          title: 'Product Entry Successfully'
                        })
                        this.form.productId = '';
                        this.form.brandId = '';
                        this.form.quantity = '';
                        this.form.unitId = '';
                        this.form.unitPrice = '';
                        this.form.totalPrice = '';
                        this.form.percetage = '';
                        this.form.percetagePrice = '';
                        this.productList();
                    }
                 });
            }
            else{
                Toast.fire({
                    icon: 'error',
                    title: 'Select Product Supplier Name'
                })
            }

         },
         productList(){
           axios.get('/productList').then(res => {
                this.purchaseProductLists = res.data.purchaseProductList;
                this.totalPurchaseValue();
           });
         },
         totalPurchaseValue(){
           axios.get('/totalPurchaseValue/'+this.cusPurchaseInvoice).then(res => {
                 let sum = 0;
                 let quantity = 0;
                 res.data.purchaseProductList.forEach(productPrice => {
                     sum += parseFloat(productPrice.totalPrice)
                     quantity += parseFloat(productPrice.quantity)
                 });
                 this.form.totalProductQuantity = quantity;
                 this.form.totalPurchaseValue = sum;
                 this.form.totalAmount = sum;
                 this.form.supplierPayable = sum;
                 this.form.totalProductCost = sum;
                 this.form.totalDiscount = sum;
                 this.form.currentPayable = sum;
                 if (this.cusPreviousPayable > 0) {
                   let totalcurrant =  (this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                   this.form.currentPayable = totalcurrant;
                 }
           })
         },
         carriageInward(){
           if (this.form.carriageInward == "") {
                this.totalPurchaseValue();
           }
           else{
                let totalAmount = parseFloat(this.form.carriageInward) + parseFloat(this.form.totalPurchaseValue);
                this.form.totalAmount  = totalAmount;
                this.form.supplierPayable = totalAmount;
                this.form.totalProductCost = totalAmount;
                this.form.totalDiscount = totalAmount;
                this.form.currentPayable = totalAmount;
                if (this.cusPreviousPayable > 0) {
                  let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                  this.form.currentPayable = totalcurrant;
                }
           }
         },
         discount(){
             if (this.form.discount == "") {
                this.carriageInward();
             }
             else{
                let discount = parseFloat(this.form.totalAmount) - parseFloat(this.form.discount);
                this.form.supplierPayable = discount;
                this.form.totalProductCost = discount;
                this.form.totalDiscount = discount;
                this.form.currentPayable = discount;
                if (this.cusPreviousPayable > 0) {
                  let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                  this.form.currentPayable = totalcurrant;
                }
             }
         },
         otherCosts(){
            if(this.form.otherCost == ""){
              if (this.form.otherCost == "" && this.form.damageAndWarranty =="") {
                 this.discount();
              }
            }
            else{
               let otherCost = parseFloat(this.form.totalDiscount) + parseFloat(this.form.otherCost);
               this.form.totalProductCost = otherCost;
               this.form.currentPayable = otherCost;
               if (this.cusPreviousPayable > 0) {
                 let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                 this.form.currentPayable = totalcurrant;
               }
            }
         },
         damageAndWarrantys(){
            if(this.form.damageAndWarranty == ""){
              if (this.form.otherCost == "" && this.form.damageAndWarranty == "") {
                 this.discount();
              }
            }
            else{
              let damageAndWarranty = parseFloat(this.form.totalDiscount) + parseFloat(this.form.damageAndWarranty);

              let otherCost = parseFloat(damageAndWarranty) + parseFloat(this.form.otherCost);
              this.form.totalProductCost = otherCost;
              this.form.currentPayable = otherCost;

               if (this.cusPreviousPayable > 0) {
                 let totalcurrant =  parseFloat(this.cusPreviousPayable) +  parseFloat(this.form.currentPayable)
                 this.form.currentPayable = totalcurrant;
               }
            }
         },
         addPurchaseInvoice(){
           this.form.post('/purchaseInvoice').then(res =>{
               Toast.fire({
                   icon: 'success',
                   title: 'Purchase Invoice Add Successfully'
               })
               this.form.productSupplierId = [],
               this.form.moblieNo = [],
               this.form.address = [],
               this.form.purchaseTypeId = [],
               this.form.totalPurchaseValue = [];
               this.form.totalAmount = [];
               this.form.supplierPayable = [];
               this.form.totalProductCost = [];
               this.form.currentPayable = [];
               this.form.reset();
               this.purchaseInvoiceNo();
               this.purchaseInvoiceList();
           });
         },
         purchaseInvoiceList(){
            axios.get('/purchaseInvoice').then(res =>{
                this.purchaseInvoiceLists = res.data.purchaseInvoiceList;
                this.adminPurchaseTypeLists = res.data.adminPurchaseTypeList;
            });
         },
         distroy(purchaseProductId){
           axios.delete('/purchaseInvoice/'+purchaseProductId).then(res => {
               Toast.fire({
                   icon: 'success',
                   title: 'Product Delete Successfully'
               })
               this.productList();
           });
         },
       taxYes(){
          this.taxAmountTypeShow = true;
       },
       taxNo(){
          this.taxAmountTypeShow = false;
          this.form.taxAmountType = [];
          this.form.taxAmount = [];
       },

     },

  }
</script>
<style media="screen">
  .purchase-entry label{
      margin-right: 20px;
      display: block;
  }
  .shadow-custom{
      box-shadow: 0 2px 5px rgba(0,0,0,0.15) !important;
  }
  button.btn.btn-hover-shine.btn-primary {
      font-size: 13px;
  }
  .purchase-entry .custom-control-inline{
      padding-left: 25px;
  }

</style>
