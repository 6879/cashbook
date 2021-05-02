 <template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Shop Billing Date Update </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
        


        <form @submit.prevent="updatePurchaseType()">
              
              

                <div class="form-group">
              <label> Shop Name 
                 <!-- <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i> -->
                 </label>
 
              <input type="text" disabled
                v-model="form.shopName"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('shopName') }"
              >
 
              <input type="text" disabled
                v-model="form.id"
                class="form-control"
              >
  
              <has-error :form="form" field="shopName"></has-error>
            </div>





           <div class="form-group">
              <label> Billing Date (Last Billing Date {{accountInfos.billingDate}})
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i></label>
 
              <input type="date"
                v-model="form.billingDate"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('billingDate') }"
              > 
              <has-error :form="form" field="billingDate"></has-error>
            </div>

              
               
              
            
            <div class="form-group">
              <label> Message
                 <i class="fa fa-star text-danger text-10 cursor-pointer" title="Mendatory Field" data-placement="top" data-toggle="tooltip" data-original-title="Mendatory Field"></i>
                 </label>
 
              <textarea type="text"
                v-model="form.message"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('message') }"
              ></textarea>
              <has-error :form="form" field="message"></has-error>
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
import moment from 'moment';
    export default {

      data() {
        return {
             accountInfos:[],
             howManyBranch:true,

             moment: moment,

            form: new Form({
                  formType: 'update',
                  id: '',
                  shopName: '',
                  billingDate: '',
                  message: '',
                }),
        
        }
      },
      created() {
        let uri = `shopInformation/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data);
        });
        this.getAccountInfoByShopId();
      },
      
      methods: {

    

    
      getAccountInfoByShopId(){
      let url = "getAccountInfoByShopId/"+this.form.id;
      fetch(url)
        .then((response) => response.json())
        .then((response) => {
      this.accountInfos = response.data;
        });
    },


        updatePurchaseType() {
          let uri = `shopInformation/${this.$route.params.id}`;
          axios.put(uri, this.form).then((response) => {
              if(response.data.haveBranchMess){

                    Toast.fire({
                        icon: 'error',
                        title: "You allready have branch, can't change this option."
                    })

              }
            else if(response.data.totalBranchMess){

                    Toast.fire({
                        icon: 'error',
                        title: 'Minimum Total Branch '+response.data.totalBranchMess+'.'
                    })

              }
              else{
                        Toast.fire({
                        icon: 'success',
                        title: 'Update Successfull'
                    }),
            this.$router.push('adminReportShopList');
              }
          });
        }
      }
    }
</script>