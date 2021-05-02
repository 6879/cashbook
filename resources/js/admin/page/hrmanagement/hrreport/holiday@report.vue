<template id="">
  <span>
    <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Holiday Setup Report (Owner)</h3>
      </div>
        <div class="table-responsive bg-white">
          <table class="table table-hover table-bordered table-striped">
            <thead>
               <tr>
                 <th>SN</th>
                 <th>Holiday Type Name</th>
                 <th>Holiday Start Date </th>
                 <th>Holiday End Date </th>
                 <th>Holiday Setup Status</th>
               </tr>
              </thead>
              <tbody>
                <tr v-for="(holidaySetupOWnerList, index) in holidaySetupOWnerLists.data">
                  <td>{{ index+1 }}</td>
                  <td v-if="holidaySetupOWnerList.admin_holiday_type_relation">{{ holidaySetupOWnerList.admin_holiday_type_relation.holidayTypeName	 }}</td>
                  <td v-else></td>
                  <td>{{ holidaySetupOWnerList.holidayStartDate	 }}</td>
                  <td>{{ holidaySetupOWnerList.holidayEndDate	 }}</td>
                  <td>
                      <div v-if="holidaySetupOWnerList.holidaySetupStatus == 1">
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
           <pagination :data="holidaySetupOWnerLists" :limit="limit"  @pagination-change-page="getPaginateList">
             <span slot="prev-nav">&lt; Previous</span>
             <span slot="next-nav">Next &gt;</span>
           </pagination>
        </span>
     </div>

     <div class="card main-card  element-block-example mt-5">
       <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
         <h3 style="color:black">Holiday Setup Report (Global)</h3>
       </div>
         <div class="table-responsive bg-white">
           <table class="table table-hover table-bordered mb-0">
             <thead>
                <tr style="background:rgba(242, 242, 242, 0.47)">
                  <th>SN</th>
                  <th>Holiday Type Name</th>
                  <th>Holiday Start Date </th>
                  <th>Holiday End Date </th>
                  <th>Holiday Setup Status</th>
                </tr>
               </thead>
               <tbody>
                 <tr v-for="(holidaySetupGlobalList, index) in holidaySetupGlobalLists.data">
                   <td>{{ index+1 }}</td>
                   <td v-if="holidaySetupGlobalList.admin_holiday_type_relation">{{ holidaySetupGlobalList.admin_holiday_type_relation.holidayTypeName	 }}</td>
                   <td v-else></td>
                   <td>{{ holidaySetupGlobalList.holidayStartDate	 }}</td>
                   <td>{{ holidaySetupGlobalList.holidayEndDate	 }}</td>
                   <td>
                       <div v-if="holidaySetupGlobalList.holidaySetupStatus == 1">
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
            <pagination :data="holidaySetupGlobalLists" :limit="limit"  @pagination-change-page="getPaginateList">
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
                holidaySetupOWnerLists:{},
                holidaySetupGlobalLists:{},
            }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.holidaySetupReport();
            this.getPaginateList();
        },
        methods:{
            holidaySetupReport(){
              axios.get('/holidaySetupReport').then(res =>{
                  this.holidaySetupOWnerLists = res.data.holidaySetupOWnerList
                  this.holidaySetupGlobalLists = res.data.holidaySetupGlobalList
              })
            },
            getPaginateList(page = 1){
              axios.get('/holidaySetupReport?page=' + page).then(response => {
                  this.holidaySetupOWnerLists = response.data.holidaySetupOWnerList;
                  this.holidaySetupGlobalLists = response.data.holidaySetupGlobalList;
              });
            },
        }
    }

</script>
