 <template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Bill Pay </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
        


        <form @submit.prevent="payBill()">
              
              

                <div class="form-group">
              <label> Your Current Balance : {{accountInfos.topupCurrentBalance}} {{authInfos.code}} </label>
              <label> Your Total Bill : {{currencyRate}} {{authInfos.code}} </label>
 
               
            </div>
              

                

 

              
               
              
            
            <div class="form-group">
              <label> Bill 
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text"
                v-model="form.bill"
                class="form-control"
                disabled
                :class="{ 'is-invalid': form.errors.has('bill') }"
              >
              <has-error :form="form" field="bill"></has-error>
            </div>   
              
      


              <div class="text-right pt-3">
                  <span class="badge badge-danger" v-if="accountInfos.topupCurrentBalance<currencyRate"> Insufficient Balance </span>
                <button type="submit" v-else="" class="mr-2 btn btn-pill btn-hover-shine  btn-primary"> Pay Now </button>
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
             currencyRate:'',
             authInfos:[],
             accountInfos:[],
             howManyBranch:true,
            form: new Form({
                  paymetMethod: '',
                  amount: '',
                  bill: '',
                }),
        
        }
      },
  mounted() {
    this.getAccountInfoById();
    this.getAuthInfo(); 
    this.getCurrencyRate(); 
  },
      methods: {


      getCurrencyRate(){
      let url = 'getCurrencyRate';
      axios.get(url)
        .then((response) => {
          this.currencyRate = response.data.data;
          this.form.bill = response.data.data;
        });
  },



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





 

        payBill() {        
      this.form.post("payBill").then((response) => {
        
          Toast.fire({
            icon: "success",
            title: "Successfull.",
          }),
            
                this.form.reset();
                this.$router.push('shop');
          
      });
        },
      }
    }
</script>