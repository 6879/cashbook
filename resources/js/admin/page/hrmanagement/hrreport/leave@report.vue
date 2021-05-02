<template id="">
  <span>
   <div class="card main-card  element-block-example">
      <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Employee Leave Report</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered table-striped">
          <thead>
             <tr>
               <th>SN</th>
               <th>Employee Name</th>
               <th>Leave Start Date</th>
               <th>Leave End Date</th>
               <th>Date Remain</th>
               <th>Commitment</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(leaveEntryList, index) in leaveEntryLists.data">
                <td>{{ index+1 }}</td>
                <td>{{ leaveEntryList.employee_name.fullName	 }}</td>
                <td>{{ leaveEntryList.startDate	 }}</td>
                <td>{{ leaveEntryList.endDate	 }}</td>
                <td>
                    <span v-if="parseFloat(leaveEntryList.endDate.split('-')[1]) - parseFloat(currentDateMonth.split('/')[0])">
                      {{ parseFloat(leaveEntryList.endDate.split('-')[1]) - parseFloat(currentDateMonth.split('/')[0]) }} Month
                    </span>
                    <span v-if="parseFloat(leaveEntryList.endDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) ">
                      {{ parseFloat(leaveEntryList.endDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) }} Day
                    </span>
                    <span v-if="parseFloat(leaveEntryList.endDate.split('-')[2]) - parseFloat(currentDateMonth.split('/')[1]) == 0">
                       0 Day
                    </span>
                </td>
                <td>{{ leaveEntryList.commitment	| shortlength('110', '...') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
       <span class="card_footer">
         <pagination :data="leaveEntryLists" :limit="limit"  @pagination-change-page="getPaginateList">
           <span slot="prev-nav">&lt; Previous</span>
           <span slot="next-nav">Next &gt;</span>
         </pagination>
      </span>
     </div>
  </span>
</template>
<script>
    export default {
        data () {
            return {
                employeeNames:{},
                leaveEntryLists:{},
                currentDateMonth:{},
            }
        },
        props:{
            limit: {
                type: Number,
                default: 2
            }
        },
        mounted(){
            this.employeeNameList();
            this.employeeLeaveEntryList();

        },
        methods:{
            employeeNameList(){
               axios.get('/employeeName').then(res =>{
                 this.employeeNames = res.data.employeeName;
              })
            },
            employeeLeaveEntryList(){
                axios.get('/leaveReport').then(res =>{
                    this.leaveEntryLists = res.data.leaveReportLists;
                    this.currentDateMonth = new Date().toLocaleString().split(',')[0];
              })
            },
            getPaginateList(page = 1) {
                axios.get('leaveReport?page=' + page).then(response => {
                    this.leaveEntryLists = response.data.leaveReportLists;
              });
            },
        },
    }
</script>
