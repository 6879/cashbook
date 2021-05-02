<template>
  <div class="row" data-toggle="isotope">

    <!-- <div class="col-xs-12 col-md-3"></div> -->
    <div
      class="col-xs-12 col-md-12 boxborder bg-white panel-body panel panel-default"
      style="padding-left: 0; padding-right: 0"
    >
      <h1
        style="
          background: skyblue;
          margin: 0;
          padding: 10px;
          color: white;
          text-align: center;
        "
      >
       Customer List
      </h1>
    <div v-for="(inf,index) in thns" :key="inf.id">
         <div>
        

<b-button    v-b-toggle="'accordionG' + index"     @click="getInformation(inf.thanaId)" variant="primary">
        <span v-for="division in divisions" v-if="division.id==inf.divisionId">
        {{division.name}}</span> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
        <span v-for="district in allDistricts" v-if="district.id==inf.districtId"> 
        {{district.name}} </span>
        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> 
        <span v-for="thana in allThanas" v-if="thana.id==inf.thanaId">
        {{thana.name}} </span>
</b-button>


   <b-collapse v-bind:id="'accordionG' + index" class="mt-2">
    <b-card>
      <div >
     <div class="table-responsive">
        <table
          data-toggle=""
          class="table table-responsive"
          cellspacing="1"
          width="200%"
        >
          <thead style="background: #e4e6ed">
            <tr>
              <th>ID</th>
              <th>Registered_date</th>
              <th>Name</th>
              <th>Full_Name</th>
              <th>Father_Name</th>
              <th>Mother_name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>NID</th>
              <th>Date_of_Birth</th>
              <th>Sponsor</th>
              <th>Image</th>
              <th>Present_Address</th>
              <th>Premanent_Address</th>
             
            </tr>
          </thead>
          <tbody>
            <tr v-for="info in infos.data" :key="info.id" v-if="info.divisionId==inf.divisionId">
              <td>{{ index + 1 }}</td>
                <td>{{ moment(info.created_at).format("DD-MM-YYYY") }}</td>
              <td>
                {{ info.name }}
              </td>
              <td>{{info.fullname}}</td>
              <td>
                {{ info.fname }}
              </td>
              <td>
                {{ info.mname }}
              </td>
              <td>
                {{ info.email }}
              </td>
              <td>
                  {{ info.pnone }}
              </td>
              <td>
                  {{ info.nid }}
              </td>
              <td>
                  {{ info.dob }}
              </td>
              <td>
                  {{ info.sponsorId }}
              </td>
              <td> <img
                  :src="'/customerImage/' + info.image"
                  class="img-responsive"
                  height="35"
                  width="70"
                /></td>
              <td>{{ info.presentAddress }}</td>
              <td>{{ info.permanentAddress }}</td>
                
           
            </tr>
          </tbody> 
        
          
        </table>
       
         <pagination :data="infos" @pagination-change-page="getInf"></pagination>
      </div>
    </div>
    </b-card>
   </b-collapse>
</div>
   
     
     
    </div>
  
    <!-- <div class="col-xs-12 col-md-3"></div> -->
  </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  data() {
    return {
        divisions: [],
      allThanas: [],
      allDistricts: [],   
      infos: [],
      getId:'',
      thns: [],
     moment: moment,
 
    };
  },
  mounted() {
    this.viewInfo();
     this.allThana();
    this.division();
    this.allDistrict();
  
  },
  methods: {
  
    
    viewInfo() {
      axios.get(`customer`)
   
        .then((res) => {
        
          this.thns = res.data.thana;
        })
        .catch((err) => console.log(err));
    },
 
    getInformation(id,page=1) {
      axios.get(`customer/${id}?page=`+ page)
   
        .then((res) => {
       (this.infos = res.data.customer);
        return this.getId=id
        })
        .catch((err) => console.log(err));
    },
 
    getInf(page=1) {
      axios.get(`customer/${this.getId}?page=`+ page)
   
        .then((res) => {
       return (this.infos = res.data.customer);
        
        })
        .catch((err) => console.log(err));
    },
 
   allDistrict() {
      axios.get("/allDistrict").then((res) => {
        this.allDistricts = res.data.allDistrict;
      });
    },
    division() {
      axios.get("/division").then((res) => {
        this.divisions = res.data.division;
      });
    },
    allThana() {
      axios.get("/allThana").then((res) => {
        this.allThanas = res.data.allThana;
      });
    },
  
   
  

    
  },
};
</script>