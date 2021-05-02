 <template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Top-Up </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
        


        <form @submit.prevent="addToupBalance()">
              
              

                <div class="form-group">
              <label> Your Current Balance : {{accountInfos.topupCurrentBalance}} {{authInfos.code}}
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
               
            </div>
              

                



           <div class="form-group">
              <label> Payment Method
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <select
                v-model="form.paymetMethod"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('paymetMethod') }"
              >
                <option value=""> Select Payment Method </option>
                <option value="1"> Bkash </option>
                <option value="2"> Card </option>
                 
              </select>
              <has-error :form="form" field="paymetMethod"></has-error>
            </div>

              
               
              
            
            <div class="form-group">
              <label> Top-up Amount
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.amount"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('amount') }"
              >
              <has-error :form="form" field="amount"></has-error>
            </div>


              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary"> Submit </button>
              </div>
          </form>
        </div>
      </div>
    </div>

  
  </span>
</template>

<script>
    export default {

      data() {
        return {
             authInfos:[],
             accountInfos:[],
             howManyBranch:true,
            form: new Form({
                  paymetMethod: '',
                  amount: '',
                }),
        
        }
      },
  mounted() {
    this.getAccountInfoById();
    this.getAuthInfo(); 
  },
      methods: {

          getAuthInfo(){
      let url = "getAuthInfo";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
          this.authInfos = response.data;
        });
    },
 

                getAccountInfoById(){
      let url = "getAccountInfoById";
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
      this.accountInfos = response.data;
        });
    },





 

        addToupBalance() {        
      this.form.post("topupBalance").then((response) => {
        
          Toast.fire({
            icon: "success",
            title: "Successfull.",
          }),
                
                // this.addBranchInformation = false;
               
                // this.getTotalBranchCreate();
                // this.getBranchCode();
                // this.view();
                this.form.reset();
                this.$router.push('shop');
          
      });
        },
      }
    }
</script>