<template id="">
  <span>
    <div class="card">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black"> Website Information </h3>
      </div>
      <div class="supplier-entry py-4 px-2">
        <div class="col-lg-7 px-lg-5 col-sm-8 offset-sm-2 col-12  supplier-border">
          <form  @submit.prevent="websiteInfo()">

                        <div class="form-group">
                          <label>Name :</label>
                          <input type="text" class="form-control" v-model="website.name">
                        </div>

                        <div class="form-group">
                          <label>Link :</label>
                          <input type="text" class="form-control" v-model="website.link">
                        </div>

                        <div class="form-group">
                          <label>Description :</label>
                          <input type="text" class="form-control" v-model="website.description">
                        </div>
                            
             
 
               
              <div class="text-right pt-3">
                <button type="submit" class="mr-2 btn btn-pill btn-hover-shine  btn-primary">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="card main-card  element-block-example mt-5">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Website Information List</h3>
      </div>
      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
             <tr style="background:rgba(242, 242, 242, 0.47)">
               <th> SN</th>
               <th> Name </th>
               <th> Link </th>
               <th> Description </th> 
               <th> Action</th>
             </tr>
            </thead>
               <tbody>
               
                <tr v-for="website in websites" :key="website.id">
                <td>{{ website.id }}</td>
                <td>{{website.name}}</td>
                <td>{{website.link}}</td>
                <td>{{website.description}}</td>
                <td>
                  <router-link class="btn btn-hover-shine  btn-primary"><i class=" fa fa-edit"></i>Edit</router-link>
                  <button type="button"  class="btn btn-hover-shine btn-danger"><i class=" fa fa-trash"></i>Delete</button>
                </td>

             </tr>
            </tbody>
         </table>
       </div>
     </div>

  </span>
</template>
<script>
    export default {
        data(){
        return {
          website:{},
          websites:[],
        }
    },
            mounted(){
            this.websiteShow();
        },
    methods: {
      websiteInfo(){
    let uri = 'website/create';
    axios.post(uri, this.website).then((response) => {
       this.$router.push({name: 'websiteInfos'});
    });
},
 websiteShow(){
                axios.get('websiteInfo').then(res =>{
                    this.websites = res.data;
                })
            },
    }
  }
</script>