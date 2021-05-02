<template>
  <span>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><router-link to="/category@report">Category Report</router-link></li>
      </ol>
    </nav>
     <div class="card main-card  element-block-example">
        <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
          <h3 style="color:black">Category List</h3>
        </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0 ">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th>SN</th>
               <th v-if="this.$route.params.categorylabelId == 1">Category</th>
               <th v-if="this.$route.params.categorylabelId == 2">Sub Category</th>
               <th v-if="this.$route.params.categorylabelId == 3">Third Category</th>
               <th v-if="this.$route.params.categorylabelId == 4">Fore Category</th>
               <th v-if="this.$route.params.categorylabelId == 5">Five Category</th>
               <th v-if="this.$route.params.categorylabelId == 6">Six Category</th>
               <th v-if="this.$route.params.categorylabelId == 7">Seven Category</th>
               <th v-if="this.$route.params.categorylabelId == 8">Eight Category</th>
               <th v-if="this.$route.params.categorylabelId == 9">Nine Category</th>
               <th v-if="this.$route.params.categorylabelId == 10">Ten Category</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(CategoryListShow,index) in CategoryListShows">
                  <td>{{index+1}}</td>
                  <td>{{CategoryListShow.categoryName}}</td>
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
                CategoryListShows:{},
            }
        },

        mounted(){
           this.CategoryGetData()
        },
        methods: {

            CategoryGetData() {
                axios.get('/categoryOwnerShow/'+this.$route.params.categorylabelId).then(res => {
                    this.CategoryListShows = res.data.categoryListData
                })
            },
        }
    }
</script>

<style scoped>

</style>
