<template>
    <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Expence Type</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="expenceTypeDataUpdate()">
              <div class="form-group">
                  <label>Expence Type Name</label>
                  <input type="text" v-model="form.shopExpenceTypeName"  name="shopExpenceTypeName" :class="{ 'is-invalid': form.errors.has('shopExpenceTypeName') }" placeholder="Shop Expence Type Name" class="form-control">
                  <has-error :form="form" field="shopExpenceTypeName"></has-error>
              </div>
              <div class="form-group">
                 <label>Expence Type Status</label>
                 <select v-model="form.shopExpenceTypeStatus" name="shopExpenceTypeStatus" :class="{ 'is-invalid': form.errors.has('shopExpenceTypeStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="shopExpenceTypeStatus"></has-error>
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
                    shopExpenceTypeName : '',
                    shopExpenceTypeStatus: '',
                }),
            }
        },

        mounted() {
            this.getExpenceTypeData();
        },

        methods:{
            getExpenceTypeData(){
                axios.get('/shopExpenceTypeEntry/'+this.$route.params.shopExpenceTypeId+ '/edit').then( res => {
                    this.form.fill(res.data.editData);
                })
            },

            expenceTypeDataUpdate(){
                this.form.put('/shopExpenceTypeEntry/'+this.$route.params.shopExpenceTypeId)
                  .then(res=>{
                      if (res.data.changeExpenceType) {
                          Toast.fire({
                            icon: 'error',
                            title: 'Change Expence Type Name'
                          })
                      }
                      else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Expence Type Data Updated successfully'
                        })
                        this.$router.push('/shopaddexpencetype@entry')
                      }

                })
            }
        }
    }
</script>

<style scoped>

</style>
