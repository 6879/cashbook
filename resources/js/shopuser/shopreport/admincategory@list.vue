<template>
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/category@report">Category Report</router-link></li>
      </ol>
    </nav>
     <div class="card main-card  element-block-example">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Category List </h3>
        </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0 ">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th v-if="this.$route.params.labelId == 1">Category</th>
               <th v-if="this.$route.params.labelId == 2">Sub Category</th>
               <th v-if="this.$route.params.labelId == 3">Third Category</th>
               <th v-if="this.$route.params.labelId == 4">Fore Category</th>
               <th v-if="this.$route.params.labelId == 5">Five Category</th>
               <th v-if="this.$route.params.labelId == 6">Six Category</th>
               <th v-if="this.$route.params.labelId == 7">Seven Category</th>
               <th v-if="this.$route.params.labelId == 8">Eight Category</th>
               <th v-if="this.$route.params.labelId == 9">Nine Category</th>
               <th v-if="this.$route.params.labelId == 10">Ten Category</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(adminCategoryList ,index) in adminCategoryLists">
                  <td>{{ index+1 }}</td>
                  <td>{{ adminCategoryList.categoryName }}</td>
            </tr>
          </tbody>
       </table>
     </div>
   </div>


  </span>

</template>

<script>
    export default {
        data () {
            return {
                adminCategoryLists:{},
            }
        },

        mounted(){
           this.adminCategoryListShow()
        },
        methods: {
            adminCategoryListShow() {
                axios.get('/adminCategoryListShow/'+this.$route.params.shopType+"/"+this.$route.params.labelId).then(res => {
                    this.adminCategoryLists = res.data.adminCategoryList
                    console.log(res.data);
                })
            },
        }
    }
</script>

<style scoped>

</style>
