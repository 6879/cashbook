<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Employee Leave Entry</h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="employeeLeaveEntry()">
              <div class="form-group">
                 <label>Employee Name</label>
                 <select v-model="form.employeEntryId" name="employeEntryId" :class="{ 'is-invalid': form.errors.has('employeEntryId') }" class="form-control">
                   <option value="">Select One</option>
                   <option v-for="employeeName in employeeNames" :value="employeeName.shopEmployeeEntryId">{{ employeeName.fullName }}</option>
                 </select>
                 <has-error :form="form" field="employeEntryId"></has-error>
              </div>
              <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" v-model="form.startDate"  name="startDate" :class="{ 'is-invalid': form.errors.has('startDate') }" placeholder="Job Department Name" class="form-control">
                  <has-error :form="form" field="startDate"></has-error>
              </div>
              <div class="form-group">
                  <label>End Date</label>
                  <input type="date" v-model="form.endDate"  name="endDate" :class="{ 'is-invalid': form.errors.has('endDate') }"  class="form-control">
                  <has-error :form="form" field="endDate"></has-error>
              </div>
              <div class="form-group">
                  <label>Commitment</label>
                  <textarea v-model="form.commitment"  name="commitment" class="form-control" placeholder="Commitment" :class="{ 'is-invalid': form.errors.has('commitment') }" style="height:130px">
                  </textarea>
                  <has-error :form="form" field="commitment"></has-error>
              </div>
             <div class="text-right pt-3">
               <button type="submit" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
      </div>
    </div>

  <div class="card main-card  element-block-example mt-5">
    <div class="card-header" style="background-color: rgb(1, 176, 241); border: 1px solid rgba(0, 0, 0, 0.05);">
        <h3 style="color:black">Employee Leave List</h3>
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
               <th>Action</th>
             </tr>
            </thead>
            <tbody>
              <tr v-for="(leaveEntryList, index) in leaveEntryLists.data">
                <td>{{ index+1 }}</td>
                <td v-if="leaveEntryList.employee_name">{{ leaveEntryList.employee_name.fullName	 }}</td>
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
                <td>{{ leaveEntryList.commitment	| shortlength('80', '...') }}</td>
                <td>
                  <router-link :to="`/leave@entryEdit${leaveEntryList.employeeLeaveId}`" class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
               </td>
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
                form: new Form({
                    employeEntryId: '',
                    startDate : '',
                    endDate : '',
                    commitment: '',
                }),
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
            this.employeeLeaveList();

        },
        methods:{
            employeeNameList(){
               axios.get('/employeeLeaveEntry/create').then(res =>{
                  this.employeeNames = res.data.employeeNames;
                  this.currentDateMonth = new Date().toLocaleString().split(',')[0];
              })
            },
            employeeLeaveEntry(){
                this.form.post('/employeeLeaveEntry').then(res =>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Employee Leave Entry Successfully'
                    })
                    this.form.reset();
                    this.employeeLeaveList();
                })
            },
            employeeLeaveList(){
                axios.get('/employeeLeaveEntry').then(res =>{
                    this.leaveEntryLists = res.data.leaveEntryLists;
              })
            },
            getPaginateList(page = 1) {
                axios.get('employeeLeaveEntry?page=' + page).then(response => {
                    this.leaveEntryLists = response.data.leaveEntryLists;
              });
            },
        },
    }

</script>
