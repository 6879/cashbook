<template id="">
  <span>



        <!-- ------------------- page title  -->
    <div class="app-page-title">
      <div class="page-title-wrapper">
        <div class="page-title-heading">
          <div class="page-title-icon">
            <i class="pe-7s-menu icon-gradient bg-mean-fruit"></i>
          </div>
          <div>
            Shop Registration
            <div class="page-title-subheading">
              Shop Registration
            </div>
          </div>
        </div>
        <div class="page-title-actions">
          <router-link to="/qrCodeSetup"
            type="button"
            class="btn-shadow mr-3 btn btn-warning"
            title=""
            data-placement="bottom"
            data-toggle="tooltip"
            data-original-title="Refresh"
            
          >
            <i class="fa fa-undo text-white"></i>
          </router-link>
          <div class="d-inline-block dropdown">
            <button
              type="button"
              class="btn-shadow btn btn-info"
              onclick="window.history.back()"
            >
              
                <span class="lnr lnr-arrow-left"></span>
              Back
            </button>
            
          </div>
        </div>
      </div>
    </div>

<!-- ------------------- // page title  -->





    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Shop Registration </h4>
        </div>
      </div>


<form @submit.prevent="addShopInformation"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-10 px-lg-10 col-sm-11 offset-sm-1 col-12 supplier-border comm-form-box-back-color"
        >
          
            <div class="row">

            <div class="col-lg-6 col-12">
            
            
            <div class="form-group">
              <label> Show Type
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.shopTypeId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopTypeId') }"
                @change="getShopId()"
              >
                <option value=""> Select Shop Type </option>
                <option
                  v-for="shopTypeList in shopTypeLists"
                  :key="shopTypeList.shopTypeEntryId"
                  :value="shopTypeList.shopTypeEntryId"
                >
                  {{ shopTypeList.shopTypeName }}
                </option>
              </select>
              <has-error :form="form" field="shopTypeId"></has-error>
            </div>


            <div class="form-group">
              <label> Shop ID
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.shopSirialId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopSirialId') }"
                disabled
              >  
              <has-error :form="form" field="shopSirialId"></has-error>
            </div>
            

            <div class="form-group">
              <label> Shop Name
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.shopName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopName') }"
              >  
              <has-error :form="form" field="shopName"></has-error>
            </div>
            
               


            <div class="form-group">
              <label> Shop User Name
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.email"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('email') }"
                @change="checkUserName()"
              >
              <has-error :form="form" field="email"></has-error>
              <span class="text-danger" v-if="userNameExist"> This user name allready exist. </span>
            </div>
            
               <div class="form-group">
              <label> If Your Need branch
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.haveBranch"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('haveBranch') }"
                @change="haveBranch()"
              >
                <option value=""> Select have branch </option>
                <option value="1"> Yes </option>
                <option value="2"> No </option>
                 
              </select>
              <has-error :form="form" field="haveBranch"></has-error>
            </div>

<!-- 
            <div class="form-group">
              <label> Shop Password
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="password"
                v-model="form.password"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('password') }"
              >
              <has-error :form="form" field="password"></has-error>
            </div> -->
            
              

            
            </div>


          <!------------------     ----------------------->

          
            <div class="col-lg-6 col-12">
            
            
            

            <div class="form-group">
              <label> Shop Reffer By
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.refferUserId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('refferUserId') }"
              >
                <option value="">Select User Name </option>
                 <option
                  v-for="userList in userLists"
                  :key="userList.id"
                  :value="userList.id"
                >
                  {{ userList.name }}
                </option>
              </select>
              <has-error :form="form" field="refferUserId"></has-error>
            </div>

                           

            <div class="form-group">
              <label> Shop Website Link
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.website"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('website') }"
              >
              <has-error :form="form" field="website"></has-error>
            </div>
               
                           

            <div class="form-group">
              <label> Shop Facebook Link
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.facebook"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('facebook') }"
              >
              <has-error :form="form" field="facebook"></has-error>
            </div>
                           

            <div class="form-group">
              <label> Shop Youtube Link
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.youtube"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('youtube') }"
              >
              <has-error :form="form" field="youtube"></has-error>
            </div>
                           

            <div class="form-group" v-if="howManyBranch">
              <label> How Many Branch Software Need?
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.totalBranch"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('totalBranch') }"
              >
              <has-error :form="form" field="totalBranch"></has-error>
            </div>
               
            </div>



            </div>



            
 
          
        </div>





       <!-- ============================================================ -->
       <!-- ===================== shop owner information =============== -->
       <!-- ============================================================ -->
         <div
          class="col-lg-10 px-lg-10 col-sm-11 offset-sm-1 col-12 supplier-border comm-form-box-back-color mt-5"
        >

          <div class="row">

              <div class="col-12">
                  <h5> Shop Owner Information </h5>
                  <hr>
              </div>
              </div>

          
            <div class="row">

            <div class="col-lg-6 col-12">
             

            <div class="form-group">
              <label> Owner Name
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.shopOwnerName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopOwnerName') }"
              >  
              <has-error :form="form" field="shopOwnerName"></has-error>
            </div>
            
              


            <div class="form-group">
              <label> Owner Mobile No
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i>
                 </label>
 
              <input type="text"
                v-model="form.shopOwnerMobileNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopOwnerMobileNo') }"
              >  
              <has-error :form="form" field="shopOwnerMobileNo"></has-error>
            </div>
            
              


            <div class="form-group">
              <label> Owner Email
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.shopOwnerEmail"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopOwnerEmail') }"
              >
              <has-error :form="form" field="shopOwnerEmail"></has-error>
            </div>
            
            
              

            
            </div>


          <!------------------     ----------------------->

          
            <div class="col-lg-6 col-12">
            
            
               

            <div class="form-group">
              <label> Owner Address
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <textarea
                v-model="form.shopOwnerAddress"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopOwnerAddress') }"
              ></textarea>
              <has-error :form="form" field="shopOwnerAddress"></has-error>
            </div>
            
               

            <div class="form-group">
              <label> Owner Phone No
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.shopOwnerPhoneNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopOwnerPhoneNo') }"
              >
              <has-error :form="form" field="shopOwnerPhoneNo"></has-error>
            </div>
               
            </div>



            </div>
 
        </div>




       <!-- ============================================================ -->
       <!-- ================== // shop owner information =============== -->
       <!-- ============================================================ -->




       <!-- ===================================================================== -->
       <!-- ===================== shop Contact Person information =============== -->
       <!-- ===================================================================== -->
         <div
          class="col-lg-10 px-lg-10 col-sm-11 offset-sm-1 col-12 supplier-border comm-form-box-back-color mt-5"
        >

          <div class="row">

              <div class="col-12">
                  <h5> Shop Contact Person </h5>
                  <p> 
                    <input type="checkbox" id="ownerAsContactPerson"
                     @change="ownerAsContactPerson($event)"
                     >
                      <label for="ownerAsContactPerson"> 
                    Shop owner is Contact Person </label></p>
                  <hr>
              </div>
              </div>

          
            <div class="row">

            <div class="col-lg-6 col-12">
             

            <div class="form-group">
              <label> Name
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.CPName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('CPName') }"
              >  
              <has-error :form="form" field="CPName"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Mobile No
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i>
                 </label>
 
              <input type="text"
                v-model="form.CPMobileNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('CPMobileNo') }"
              >  
              <has-error :form="form" field="CPMobileNo"></has-error>
            </div>
            
              


            <div class="form-group">
              <label> Email
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.CPEmail"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('CPEmail') }"
              >
              <has-error :form="form" field="CPEmail"></has-error>
            </div>
             
            </div>


          <!------------------   ----------------------->

          
            <div class="col-lg-6 col-12">
            
            
               

            <div class="form-group">
              <label>  Address
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <textarea
                v-model="form.CPAddress"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('CPAddress') }"
              ></textarea>
              <has-error :form="form" field="CPAddress"></has-error>
            </div>
            
               

            <div class="form-group">
              <label>  Phone No
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.CPPhoneNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('CPPhoneNo') }"
              >
              <has-error :form="form" field="CPPhoneNo"></has-error>
            </div>
               
            </div>



            </div>
 
        </div>




       <!-- ===================================================================== -->
       <!-- ================== // shop Contact person information =============== -->
       <!-- ===================================================================== -->





       <!-- ===================================================================== -->
       <!-- ===================== shop representative information =============== -->
       <!-- ===================================================================== -->
         <div
          class="col-lg-10 px-lg-10 col-sm-11 offset-sm-1 col-12 supplier-border comm-form-box-back-color mt-5"
        >

          <div class="row">

              <div class="col-12">
                  <h5> Shop Representative </h5>
                  <p> <input type="checkbox" id="ownerAsRepresentative"
                  @change="ownerAsRepresentative($event)"
                  > <label for="ownerAsRepresentative"> 
                    Shop owner is Representative </label></p>
                  <hr>
              </div>
              </div>

          
            <div class="row">

            <div class="col-lg-6 col-12">
             

            <div class="form-group">
              <label>  Name
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.SRName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('SRName') }"
              >  
              <has-error :form="form" field="SRName"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Mobile No
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i>
                 </label>
 
              <input type="text"
                v-model="form.SRMobileNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('SRMobileNo') }"
              >  
              <has-error :form="form" field="SRMobileNo"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Email
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.SREmail"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('SREmail') }"
              >
              <has-error :form="form" field="SREmail"></has-error>
            </div>
            
            
              

            
            </div>


          <!------------------     ----------------------->

          
            <div class="col-lg-6 col-12">
            
            
               

            <div class="form-group">
              <label>  Address
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <textarea
                v-model="form.SRAddress"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('SRAddress') }"
              ></textarea>
              <has-error :form="form" field="SRAddress"></has-error>
            </div>
            
               

            <div class="form-group">
              <label>  Phone No
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.SRPhoneNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('SRPhoneNo') }"
              >
              <has-error :form="form" field="SRPhoneNo"></has-error>
            </div>
               
            </div>



            </div>
 
        </div>




       <!-- ===================================================================== -->
       <!-- ================== // shop representative information =============== -->
       <!-- ===================================================================== -->






       <!-- ===================================================================== -->
       <!-- ===================== shop Address information =============== -->
       <!-- ===================================================================== -->
         <div
          class="col-lg-10 px-lg-10 col-sm-11 offset-sm-1 col-12 supplier-border comm-form-box-back-color mt-5"
        >

          <div class="row">

              <div class="col-12">
                  <h5> Shop Address & Location </h5>
                  <hr>
              </div>
              </div>

          
            <div class="row">

            <div class="col-lg-6 col-12">
             

            <div class="form-group">
              <label> Currency
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.currencyId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('currencyId') }"
                name="currencyId"
              >
                <option value=""> Select Currency  </option>
                <option
                  v-for="currencyList in currencyLists"
                  :key="currencyList.id"
                  :value="currencyList.id"
                >
                  {{ currencyList.code }}
                </option>
                 
              </select>  
              <has-error :form="form" field="currencyId"></has-error>
            </div>
            
             

            <div class="form-group">
              <label> Country 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.countryId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('countryId') }"
                name="countryId"
                @change.prevent="divisionShow()"
              >
                <option value=""> Select Country  </option>
                <option
                  v-for="countryList in countryLists"
                  :key="countryList.id"
                  :value="countryList.id"
                >
                  {{ countryList.name }}
                </option>
                 
              </select>  
              <has-error :form="form" field="countryId"></has-error>
            </div>
            

             <div class="form-group">
              <label> District 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.districtId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('districtId') }"
                @change.prevent="upazillaShow()"
              >
                <option value=""> Select District  </option>
                <option
                  v-for="districtList in districtLists"
                  :key="districtList.id"
                  :value="districtList.id"
                >
                  {{ districtList.district_name }}
                </option>
                </select>
              <has-error :form="form" field="districtId"></has-error>
            </div>
            
            
            <div class="form-group">
              <label> Union 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.unionId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('unionId') }"
                @change.prevent="wardShow()"
              >
                <option value=""> Select Union  </option>
                <option
                  v-for="unionList in unionLists"
                  :key="unionList.id"
                  :value="unionList.id"
                >
                  {{ unionList.union_name }}
                </option>
                </select>
              <has-error :form="form" field="unionId"></has-error>
            </div>
            
            
            
              


            <div class="form-group">
              <label>  Address 1
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i>
                 </label>
 
              <textarea 
                v-model="form.addressLine1"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('addressLine1') }"
              ></textarea>
              <has-error :form="form" field="addressLine1"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Front Side
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.front"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('front') }"
              >
              <has-error :form="form" field="front"></has-error>
            </div>
            
            
              


            <div class="form-group">
              <label>  Left Side
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.left"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('left') }"
              >
              <has-error :form="form" field="left"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Shop Size
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.shopSize"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopSize') }"
              >
              <has-error :form="form" field="shopSize"></has-error>
            </div>


            <div class="form-group">
              <label>  Shop No
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.shopNo"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopNo') }"
              >
              <has-error :form="form" field="shopNo"></has-error>
            </div>
            
            
              

            
            </div>


          <!------------------     ----------------------->

          
            <div class="col-lg-6 col-12">
             
            
            
            <div class="form-group">
              <label> Division 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.divisionId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('divisionId') }"
                @change.prevent="districtShow()"
              >
                <option value=""> Select Division  </option>
                <option
                  v-for="divisionList in divisionLists"
                  :key="divisionList.id"
                  :value="divisionList.id"
                >
                  {{ divisionList.division_name }}
                </option>
                </select>
              <has-error :form="form" field="divisionId"></has-error>
            </div>
            
             
            
             
            
            
            <div class="form-group">
              <label> Upazilla 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.thanaId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('thanaId') }"
                @change.prevent="unionShow()"
              >
                <option value=""> Select Upazila  </option>
                <option
                  v-for="upazillaList in upazillaLists"
                  :key="upazillaList.id"
                  :value="upazillaList.id"
                >
                  {{ upazillaList.upazila_name }}
                </option>
                </select>
              <has-error :form="form" field="thanaId"></has-error>
            </div>
            
            
             
            <div class="form-group">
              <label> Ward 
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
  
              <select
                v-model="form.wardId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('wardId') }"
              >
                <option value=""> Select Ward  </option>
                <option
                  v-for="wardList in wardLists"
                  :key="wardList.id"
                  :value="wardList.id"
                >
                  {{ wardList.ward_name }}
                </option>
                </select>
              <has-error :form="form" field="wardId"></has-error>
            </div>
            
            
              

            <div class="form-group">
              <label>  Address 2
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <textarea 
                v-model="form.addressLine2"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('addressLine2') }"
              ></textarea>
              <has-error :form="form" field="addressLine2"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Back Side
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.back"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('back') }"
              >
              <has-error :form="form" field="back"></has-error>
            </div>
            
            
              


            <div class="form-group">
              <label> Right Side 
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.right"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('right') }"
              >
              <has-error :form="form" field="right"></has-error>
            </div>
            
              


            <div class="form-group">
              <label>  Market Name
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.marketName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('marketName') }"
              >
              <has-error :form="form" field="marketName"></has-error>
            </div>


            <div class="form-group">
              <label>  Area Knone Name
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.areaKnownName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('areaKnownName') }"
              >
              <has-error :form="form" field="areaKnownName"></has-error>
            </div>
            
            
              

            
            </div>



            </div>
 
        </div>




       <!-- ===================================================================== -->
       <!-- ==================== // shop address information ==================== -->
       <!-- ===================================================================== -->



        </div>




        <!-- -----------------------------   card footer  -->
 
<div class="d-block pt-3 pb-4 card-footer overflow-hidden">
<div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12">


                                <button type="reset" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-outline-danger btn-lg float-left">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-undo "></i>
                                    </span>
                                    <span class="mr-1"> Clear </span>
                                </button>

                                <button type="submit" class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg float-right">
                                    <span class="mr-2 opacity-7">
                                        <i class="fa fa-paper-plane"></i>
                                    </span>
                                    <span class="mr-1"> Add New Entry </span>
                                </button>


                            </div>
                            </div>
 
<!-- -----------------------------   // card footer  --> 


        
        </form>
 
    </div>

    <div class="card mt-5">
      <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          View Information {{rate}} sdfsddsfd</h4>
      </div>

      <div class="supplier-entry py-4 px-2">
         <div class="card-body table-responsive bg-white">
        <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                
                <th>Shop ID</th>
                <th>Shop Name</th>
                <th> Shop User Name </th>
                <th> Shop Password </th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(shopInformation, index) in shopInformations" :key="shopInformation.shopInfoId">
                <td>{{ ++index }}</td>
                <td>{{ shopInformation.shopSirialId }}</td>
                <td>{{ shopInformation.shopName }}</td>
                <td>{{ shopInformation.email }}</td>
                <td>{{ shopInformation.pass }}</td>
                <td>
                  <div v-if="shopInformation.status == 1">
                    <span
                      type="button"
                      @click="
                        changeStatus(shopInformation.id)
                      "
                      class="badge badge-pill badge-success btn-hover-shine"
                                title="Click for pending"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for pending"
                    >
                      Approved
                    </span>
                  </div>
                  <div v-else>
                    <span
                      type="button"
                      @click="
                        changeStatus(shopInformation.id)
                      "
                      class="badge badge-pill badge-danger btn-hover-shine"
                                title="Click for Approve"
                                data-placement="top"
                                data-toggle="tooltip"
                                data-original-title="Click for Approve"
                    >
                      Pending
                    </span>
                  </div>
                </td>
                <td>
                  <router-link
                    :to="`/shopRegistration@Edit${shopInformation.id}`"
                    class="btn-wide btn-pill btn btn-outline-primary btn-hover-shine"
                  ><i class="fa fa-edit"></i> Edit </router-link
                  >
                </td>
                <td>
                  <button 
                    @click.prevent="deletePost(shopInformation.id)"
                    class="btn-wide btn-pill btn btn-outline-danger btn-hover-shine"
                >
                  <i class="fa fa-trash"></i>Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <button @click="alertRate()"> click me </button>
        </div>
      </div>
    </div>
  </span>
</template>

<script>

export default {

  
  data() {
    return {
      userLists: [],
      shopTypeLists: [],
      countryLists: [],
      currencyLists: [],
      divisionLists: [],
      districtLists: [],
      upazillaLists: [],
      unionLists: [],
      wardLists: [],
      userNameExist: false,


      image: "",
      form: new Form({
        
        shopTypeId: "",
        shopSirialId: "",
        shopName: "",
        email: "",
        refferUserId: "",
        website: "",
        facebook: "",
        youtube: "",
        haveBranch: "",
        totalBranch: "0",


        shopOwnerName: "",
        shopOwnerMobileNo: "",
        shopOwnerEmail: "",
        shopOwnerAddress: "",
        shopOwnerPhoneNo: "",

        CPName: "",
        CPMobileNo: "",
        CPEmail: "",
        CPAddress: "",
        CPPhoneNo: "",

        SRName: "",
        SRMobileNo: "",
        SREmail: "",
        SRAddress: "",
        SRPhoneNo: "",
 
        currencyId: "",
        countryId: "",
        divisionId: "",
        districtId: "",
        thanaId: "",
        unionId: "",
        wardId: "",

        addressLine1: "",
        front: "",
        left: "",
        shopSize: "",
        shopNo: "",

        addressLine2: "",
        back: "",
        right: "",
        marketName: "",
        areaKnownName: "",

      }),

      rate: '',
      sms: {},
      shopInformations: {},
      exit: false,
      howManyBranch: false,
      mess: "",
    };
  },

  mounted() {
 
    this.userList();
    this.shopTypeList();
    this.counryList();
    this.currencyList();
    this.view();
    this.getCurrentRate();

  },

  methods: {

  getCurrentRate(){
    let url = 'https://free.currconv.com/api/v7/convert?q=USD_PHP&compact=ultra&apiKey=21eba4f4ff74e127cda2'
    // let url = 'http://sms.doofazit.com/api/v1/send?api_key=44515814867233291581486723&contacts=01812454358&senderid=8801844532643&msg=tst-api'
    axios.get(url).then(response=>{
      this.rate = response.data;
    });
    
  }, 
  alertRate(){
    alert(this.rate.USD_PHP);
  },

      ownerAsContactPerson($event){

        // alert($event.target.checked);
    if ($event.target.checked){
      this.form.CPName = this.form.shopOwnerName;
      this.form.CPMobileNo = this.form.shopOwnerMobileNo;
      this.form.CPEmail = this.form.shopOwnerEmail;
      this.form.CPAddress = this.form.shopOwnerAddress;
      this.form.CPPhoneNo = this.form.shopOwnerPhoneNo;
    }
    else{
      this.form.CPName = '';
      this.form.CPMobileNo = '';
      this.form.CPEmail = '';
      this.form.CPAddress = '';
      this.form.CPPhoneNo = '';
    }

  },

 

      ownerAsRepresentative($event){

        // alert($event.target.checked);
    if ($event.target.checked){
      this.form.SRName = this.form.shopOwnerName;
      this.form.SRMobileNo = this.form.shopOwnerMobileNo;
      this.form.SREmail = this.form.shopOwnerEmail;
      this.form.SRAddress = this.form.shopOwnerAddress;
      this.form.SRPhoneNo = this.form.shopOwnerPhoneNo;
    }
    else{
      this.form.SRName = '';
      this.form.SRMobileNo = '';
      this.form.SREmail = '';
      this.form.SRAddress = '';
      this.form.SRPhoneNo = '';
    }

  },

    view() {
      let url = "api/shopInformation";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.shopInformations = response.data;
        });
    },

    shopTypeList() {
      let uri = `api/shopTypeEntry`;
      axios.get(uri).then((response) => {
        this.shopTypeLists = response.data.data;
      });
    },

    userList() {
      let uri = `getUserInfo`;
      axios.get(uri).then((response) => {
        this.userLists = response.data.data;
      });
    },

    currencyList() {
      let uri = `api/currencyList`;
      axios.get(uri).then((response) => {
        this.currencyLists = response.data.currencyList;
      });
    },

    counryList() {
      let uri = `api/countryList`;
      axios.get(uri).then((response) => {
        this.countryLists = response.data.countryList;
      });
    },

    divisionShow() {
      axios.get("api/divisionListById/" + this.form.countryId).then((res) => {
        this.divisionLists = res.data.divisionList; 
        // alert(this.form.countryId);
      });
    },

    districtShow() {
      axios.get("api/districtListById/" + this.form.divisionId).then((res) => {
        this.districtLists = res.data.districtList; 
        // alert(this.form.countryId);
      });
    },

    upazillaShow() {
      axios.get("api/upazilaListById/" + this.form.districtId).then((res) => {
        this.upazillaLists = res.data.upazillaList; 
        // alert(this.form.countryId);
      });
    },

    unionShow() {
      axios.get("api/unionListById/" + this.form.thanaId).then((res) => {
        this.unionLists = res.data.unionList; 
        // alert(this.form.countryId);
      });
    },

    wardShow() {
      axios.get("api/wardListById/" + this.form.unionId).then((res) => {
        this.wardLists = res.data.wardList; 
        // alert(this.form.countryId);
      });
    },

        changeStatus(id){
          let uri = `api/shopInformation/changeStatus/${id}`;
        axios.get(uri).then(response=>{
        
        let text_message = "Welcome to cashbook. your shop user name :"
                           +response.data.email+" and password :"
                           +response.data.password;
        let mobileNo = response.data.mobileNo;
        let smsStatus = response.data.smsStatus;
        
        Toast.fire({
                icon: 'success',
                title: 'Status Change Successfully'
            })
            
            if(smsStatus == 1){
              let smsurl= "http://sms.doofazit.com/api/v1/send?api_key=44515814867233291581486723&contacts="+mobileNo+"&senderid=8801844532643&msg="+text_message;
              // axios.get(smsurl).then(res =>{
              //     alert(res.data);
              // }) 
            //  fetch(smsurl).then(response=>{console.log(response.data.results)});
            fetch(smsurl);
              // const data = await res.json();
              // this.sms = data;
            }


            this.view();
        })
    },

    getShopId(){
      axios.get(`api/getShopId/`+this.form.shopTypeId).then(res =>{
          this.form.shopSirialId = res.data.data;
      })
    },
    haveBranch(){
      if(this.form.haveBranch == 1){
        this.howManyBranch = true;
      }else{
        this.howManyBranch = false;
      }
    },

    checkUserName(){
      axios.get(`api/checkemail/`+this.form.email).then(res =>{
          if(res.data.exist == 'Allready exist.'){
            this.userNameExist = true;
          }else{
            this.userNameExist = false;
          }
      })
    },

    deletePost(id){
      let uri = `api/qrCodeSetup/${id}`;
      axios.delete(uri).then((response) => {
        Toast.fire({
                icon: 'success',
                title: 'Delete Successfull.'
            })
        this.view();
      });
    },
 
 

    addShopInformation() {
      this.form.post("api/shopInformation").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
            background: '#c9f4c9', //green
            title: "Shop Add Successfull.",
          }),
            this.view();

            $('#ownerAsContactPerson').prop( "checked", false );
            $('#ownerAsRepresentative').prop( "checked", false );

            this.form.reset(); 
          
      });
    },
  },
};
</script>