 <template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Edit QR Code Setup </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
        


        <form @submit.prevent="updatePurchaseType()">
              
              
              <div class="form-group">
                     <label> Show in Invoice :</label>
 
              <select
                v-model="form.invoiceShowStatus"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('invoiceShowStatus') }"
              >
                <option value="">Select Status</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
              <has-error :form="form" field="invoiceShowStatus"></has-error>
              </div>
              
               
              <div class="form-group">
                 <label> After Scan Information :</label>
              <textarea
                v-model="form.scanInformation"
                class="form-control"
                :class="{ 'is-invalid': form.errors.has('scanInformation') }"
              ></textarea>
              <has-error :form="form" field="scanInformation"></has-error>
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
            form: new Form({
                  invoiceShowStatus: '',
                  scanInformation: '',
                }),
        
        }
      },
      created() {
        let uri = `api/qrCodeSetup/${this.$route.params.id}/edit`;
        axios.get(uri).then((response) => {
            this.form.fill( response.data);
        });
      },
      methods: {
        updatePurchaseType() {
          let uri = `api/qrCodeSetup/${this.$route.params.id}`;
          axios.put(uri, this.form).then((response) => {

                        Toast.fire({
                        icon: 'success',
                        title: 'Update Successfull'
                    }),

            this.$router.push('qrCodeSetup');
          });
        }
      }
    }
</script>