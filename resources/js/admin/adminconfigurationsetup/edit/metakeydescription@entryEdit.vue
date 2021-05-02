<template>
     <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Update Meta Key</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form @submit.prevent="metaKeyDescriptionUpdate()">
              <div class="form-group">
                  <label>Meta Key</label>
                  <input v-model="form.metaKey" type="text" name="metaKey" :class="{ 'is-invalid': form.errors.has('metaKey') }" placeholder="Enter Meta key" class="form-control">
                  <has-error :form="form" field="metaKey"></has-error>
              </div>
               <div class="form-group">
                    <label>Meta  Description</label>
                    <textarea class="form-control" v-model="form.metaDescription"  rows="3" :class="{ 'is-invalid': form.errors.has('metaDescription') }" placeholder="Meta Description">

                    </textarea>
                   <has-error :form="form" field="metaDescription"></has-error>
               </div>

              <div class="form-group">
                 <label>Meta Status</label>
                 <select v-model="form.metaStatus" name="metaStatus" :class="{ 'is-invalid': form.errors.has('metaStatus') }" class="form-control">
                   <option value="">Select One</option>
                   <option value="1">Publish</option>
                   <option value="0">Unpublish</option>
                  </select>
                  <has-error :form="form" field="metaStatus"></has-error>
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
        data() {
            return {
                form: new Form({
                    metaKey: '',
                    metaDescription: '',
                    metaStatus: '',
                })
            }
        },
        mounted() {
            this.getData();
        },
        methods:{
            getData() {
                axios.get('/adminMetaKeyDescription/' + this.$route.params.metaKeyId + '/edit')
                    .then(res => {
                        this.form.fill(res.data.editData)

                    })
            },
            metaKeyDescriptionUpdate(){
                this.form.put('/adminMetaKeyDescription/'+this.$route.params.metaKeyId)
                    .then(res=>{
                        Toast.fire({
                            icon: 'success',
                            title: 'MetaKey Description  Updated successfully'
                        })
                        this.$router.push('/metakeydescription@entry')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
