 <template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Shop Branch Update </h3>
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
  
              <has-error :form="form" field="shopName"></has-error>
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


              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary"> Update </button>
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
             howManyBranch:true,
            form: new Form({
                  formType: 'update',
                  shopName: '',
                  totalBranch: '',
                  haveBranch: '',
                }),
        
        }
      },
      created() {
        let uri = `shopInformation/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data);
        });
      },
      methods: {

     haveBranch(){
      if(this.form.haveBranch == 1){
        this.howManyBranch = true;
      }else{
        this.howManyBranch = false;
      }
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