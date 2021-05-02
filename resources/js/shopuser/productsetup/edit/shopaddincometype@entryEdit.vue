<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Income Type</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="incomeTypeDataUpdate()">
              <div class="form-group">
                  <label>Income Type Name</label>
                  <input type="text" v-model="form.shopIncomeTypeName"  name="shopIncomeTypeName" :class="{ 'is-invalid': form.errors.has('shopIncomeTypeName') }" placeholder="Shop Income Type Name" class="form-control">
                  <has-error :form="form" field="shopIncomeTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Income Type Status</label>
                 <select v-model="form.shopIncomeTypeStatus" name="shopIncomeTypeStatus" :class="{ 'is-invalid': form.errors.has('shopIncomeTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopIncomeTypeStatus"></has-error>
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
    export default {
        data () {
            return {
                form: new Form({
                    shopIncomeTypeName : '',
                    shopIncomeTypeStatus: '',
                }),
            }
        },

        mounted() {
            this.getIncomeTypeData();
        },

        methods:{
            getIncomeTypeData(){
                axios.get('/shopIncomeTypeEntry/'+this.$route.params.shopIncomeTypeId+ '/edit').then( res => {
                    this.form.fill(res.data.editData);
                })
            },

            incomeTypeDataUpdate(){
                this.form.put('/shopIncomeTypeEntry/'+this.$route.params.shopIncomeTypeId)
                    .then(res=>{
                          if (res.data.changeIncomeType) {
                              Toast.fire({
                                icon: 'error',
                                title: 'Change Income Type Name'
                              })
                          }
                          else{
                              Toast.fire({
                                  icon: 'success',
                                  title: 'Income Type Data Updated successfully'
                              })
                              this.$router.push('/shopaddincometype@entry')
                          }

                    })
            }
        }
    }
</script>

<style scoped>

</style>
