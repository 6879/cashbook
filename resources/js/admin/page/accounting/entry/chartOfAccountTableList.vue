<template id="">
  <span>

  

    <div class="card">
      
      
            <div class="card-header-tab card-header alert-info">
        <div
          class="card-header-title font-size-lg text-capitalize font-weight-normal">
          <i
            class="header-icon lnr-pencil icon-gradient bg-premium-dark"
          ></i>
         <h4> Chart Of Accounts </h4>
        </div>
      </div>


<form @submit.prevent="addChartOfAccount"> 
      <div class="supplier-entry py-4 px-2 comm-form-back-img">

       
         <div
          class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12 supplier-border comm-form-box-back-color"
        >
          
          <div class="form-group">
              <label> Head Up Link <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headUpLink"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headUpLink') }"
                @change="getUplinkInformation()"
              >
                <option value="0">Select</option>
                <option v-for="chartOfAccount in chartOfAccounts" :value="chartOfAccount.id"> {{chartOfAccount.headName}} </option> 
              </select>
              <has-error :form="form" field="headUpLink"></has-error>
            </div>


            <div class="form-group">
              <label> Head Level <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headLavel"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headLavel') }"
                disabled
              >
                <option value="">Select Level</option>
                <option value="1">Level 1</option>
                <option value="2">Level 2</option>
                <option value="3">Level 3</option>
                <option value="4">Level 4</option>
                <option value="5">Level 5</option>
              </select>
              <has-error :form="form" field="headLavel"></has-error>
            </div>
              <!-- <small v-if="exit==true" class="text-danger"> this is already exist. </small> -->
              

            <div class="form-group">
              <label> Head Name <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.headName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headName') }"
              >
              <has-error :form="form" field="headName"></has-error>
            </div>
 
              

            <div class="form-group">
              <label> Head Code <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="text"
                v-model="form.headCode"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headCode') }"
                disabled
              >
              <has-error :form="form" field="headCode"></has-error>
            </div>

            
            <div class="form-group">
              <label> Account Type <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.dr_cr"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('dr_cr') }"
                >
                <option value="">Select Account Type</option>
                <option value="1"> Debit </option>
                <option value="2"> Credit </option>
              </select>
              <has-error :form="form" field="dr_cr"></has-error>
            </div>

            
            
            
            <div class="form-group">
              <label> Type 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headGroupId"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headGroupId') }"
                >
                <option value="">Select Head Group</option>
                <option
                v-for="accountGroup in accountGroups"
                 :value="accountGroup.id"> {{accountGroup.groupName}}  </option>
              </select>
              <has-error :form="form" field="headGroupId"></has-error>
            </div>

            
            <div class="form-group">
              <label> Ladger/Register 
                  <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.headGroupType"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('headGroupType') }"
                >
                <option value=""> ------- </option>
                <option 
                v-for="accountGroupType in accountGroupTypes" 
                :value="accountGroupType.id">  {{accountGroupType.name}}  </option> 
              </select>
              <has-error :form="form" field="headGroupType"></has-error>
            </div>
 
          
        </div>
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

    <div class="card mt-5" style="word-wrap: normal;">
      <div class="card-header-tab card-header alert-info">
<h4><i
            class="header-icon lnr-laptop-phone icon-gradient bg-premium-dark"
          ></i>
          View Information </h4>
      </div>

      <div class="supplier-entry py-4 px-2">
         <div class="card-body bg-white">
       

              

                  
 
<div class="row">
   
   <div class="col-md-4">
      <ul id="tree1">
         <li
         v-for="(chartOfAccount) in chartOfAccounts" 
         :key="chartOfAccount.id"
         :class="`obj-`+chartOfAccount.id"
         >
             <span @click="showDownRow(chartOfAccount.id)">
                {{ chartOfAccount.headName }} </span> 
                 </li>
      </ul>
   </div>
</div>
                                     
                                     
                                     
 

          
        </div>
      </div>
    </div>
  </span>
</template>

<script>
export default {

  
  data() {
    return {
      accountGroups: [],
      chartOfAccounts: [],
      accountGroupTypes: [],
      newChartOfAccounts: [],
      dorpdownStatus: 1,

      image: "",
      form: new Form({
                        headUpLink: "",
                        headGroupType: "",
                        headGroupId: "",
                        dr_cr: "",
                        headCode: "",
                        headName: "",
                        headLavel: "",
      }),
      qrCodeSetup: {},
      exit: false,
      mess: "",
    };
  },
  mounted() {


    
      $("#li").on('click', function(event){
        alert('li');
      });
   

    $.fn.extend({
    treed: function (o) {

      var openedClass = 'fa fa-minus-circle';
      var closedClass = 'fa fa-plus-circle';

      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };

        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

$('#tree1').treed();

$('#tree2').treed({openedClass:'fa-folder-open', closedClass:'fa-folder'});









 
    this.view();
    this.getAccountGroup();
    this.getaccountGroupTypes();
    this.getUplinkInformation();
  },
  methods: {
    
    view() {
      let url = "chartOfAccount";
      axios.get(url)
        .then((response) => {
          this.chartOfAccounts = response.data.chartOfAccounts;
        });
    },
showDownRow(e){
let uri = `getDownlinkInformation/`+e;
        axios.get(uri).then(response=>{
            $('.obj-'+e).html(response.data.downlink);
        })
},

getFeni(){
  alert('feni');
},

    getUplinkInformation(){
      if(this.form.headUpLink == ''){
        this.form.headUpLink = 0;
      }
      // alert('blank');
          let uri = `getUplinkInformation/`+this.form.headUpLink;
          //$( "#headLavel" ).prop( "disabled", true );
        axios.get(uri).then(response=>{
          this.form.headLavel = response.data.lavel;
          this.form.headCode = response.data.code;
        })
        
    },

    getAccountGroup(){
          let uri = `getAccountGroup`;
        axios.get(uri).then(response=>{
            this.accountGroups = response.data.accountGroups;
        })
    },
    
    getaccountGroupTypes(){
          let uri = `accountGroupTypes`;
        axios.get(uri).then(response=>{
            this.accountGroupTypes = response.data.accountGroupTypes;
        })
    },

    deletePost(id) {
      let uri = `api/qrCodeSetup/${id}`;
      axios.delete(uri).then((response) => {
        Toast.fire({
                icon: 'success',
                title: 'Delete Successfull.'
            })
        this.view();
      });
    },
 
 

    addChartOfAccount() {
      this.form.post("chartOfAccount").then((response) => {
        
          Toast.fire({
            icon: "success",
            //background: '#fcd8d8', red
              background: '#c9f4c9', //green
            title: "Chart of account add Successfull.",
          }),

          
          this.form.reset();
          this.form.headUpLink = 0;

          this.view();
          this.getAccountGroup();
          this.getaccountGroupTypes();
          
      });
    },
  },
};
</script>


 