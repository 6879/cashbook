<template id="">
  <span>
    <div class="card p-0 col-10 col-sm-8 col-md-6  offset-md-3 offset-sm-2 offset-1">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Profile</h3>
      </div>
      <div class="profile-entry p-md-5 p-3">
        <div class="profile-img">
            <img  class="rounded-circle" src="dashboard/assets/images/avatars/1.jpg" alt="">
            <h4 class="mt-2">Md.Rubel Khan</h4>
        </div>
        <div class="profile-status mt-2">
           <ul>
             <li>
                 <i class="fa fa-map-marker" aria-hidden="true"></i>
                 <span class="profile-icon">
                    Form
                 </span>
                 <span class="float-right font-weight-bold">
                    Bangladesh
                 </span>
             </li>
             <li>
                 <i class="fa fa-user"></i>
                 <span class="profile-icon">
                    Member Since
                 </span>
                 <span class="float-right font-weight-bold">
                    Nov 2013
                 </span>
             </li>
             <li>
                 <i class="fa fa-user"></i>
                 <span class="profile-icon">
                    Recent Delivery
                 </span>
                 <span class="float-right font-weight-bold">
                    Almost 5 years
                 </span>
             </li>
           </ul>
        </div>
      </div>
    </div>
  </span>
</template>
<script>
    export default {

    }
</script>
<style media="screen">
  .profile-entry label{
    font-size:17px;
  }
  .profile-img{
    text-align:center
  }
  .profile-img img{
    width: 130px;
    height: 130px;
  }
  .profile-status ul{
    list-style-type:none;
    padding-left:0px;
    margin-bottom:0px;
  }
  .profile-status ul li{
    font-size:16px;
  }
  .profile-status ul li i{
    width:20px;
  }
</style>
