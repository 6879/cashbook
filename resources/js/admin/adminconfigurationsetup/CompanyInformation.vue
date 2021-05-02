<template lang="">
    <div>
     <form  @submit.prevent="add()">
  <div class="form-group">
    <label for="exampleInputEmail1"> Name</label>
    <input type="text" class="form-control" v-model="form.name" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" v-model="form.email" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Phone</label>
    <input type="text" class="form-control" v-model="form.phone" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1"> Address </label>
    <textarea type="text" class="form-control" v-model="form.address" name="address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address"></textarea>
    
  </div>
  
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    email: '',                  
                    phone: '',
                    address: '',
                }),
               
            }
        },
       
       
        mounted(){
            this.getData();
            this.getPaginateList();
        },
        methods:{
            add(){
                this.form.post('companyInfo').then(res=>{
                   
                        Toast.fire({
                            icon: 'success',
                            title: 'Company Information Save Successfully'
                        })
                        this.form.reset();
                  
                })
            },
            adminMenuTitle(){
                axios.get('/companyInfo').then(res =>{
                    this.companyInfos = res.data.adminMenuTitle;
                })
            },
         
         

        }

    }

</script>
