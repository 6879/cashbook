<template id="">
  <span>
    <div class="card main-card  element-block-example">
        <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
          <h3 style="color:black">Salary Grade Report (Owner)</h3>
        </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Grade Name</th>
                 <th>Grade Amount</th>
                 <th>Grade Status</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(gradeList, index) in gradeLists.data">
                  <td>{{ index+1 }}</td>
                  <td>{{ gradeList.gradeName	 }}</td>
                  <td>{{ gradeList.gradeAmount	 }}</td>
                  <td>
                      <div v-if="gradeList.gradeStatus == 1">
                        <button type="button"  class="btn btn-hover-shine btn-success">Published</button>
                      </div>
                      <div v-else>
                        <button type="button"  class="btn btn-hover-shine btn-danger">Unpublish</button>
                      </div>
                  </td>
                </tr>
              </tbody>
           </table>
         </div>
         <span class="card_footer">
           <pagination :data="gradeLists" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
      </div>
  </span>
</template>

<script>
    export default {
        data(){
           return{
             gradeLists: {},
           }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.gradeReport();
            this.getPaginateList();
        },
        methods:{
            gradeReport(){
                axios.get('/salaryGradeReport').then(res =>{
                    this.gradeLists = res.data.gradeLists
              })
            },
            getPaginateList(page = 1) {
                axios.get('/salaryGradeReport?page=' + page).then(response => {
                    this.gradeLists = response.data.gradeLists;
                });
            },
        }
    }

</script>
