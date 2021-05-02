<template id="">
  <span>
    <div class="row m-0 help">
      <div class="col-6 col-sm-4 pb-2">
          <div class="card  py-5 text-center">
            <div class="icon-wrapper rounded-circle mb-2">
                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                <i class="lnr-laptop-phone text-dark opacity-8"></i>
             </div>
             <h5 >Help</h5>
             <div class="overly">
                <div class="content">
                  <h5>Help</h5>
                  <ul>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                  </ul>
                </div>
             </div>
          </div>
      </div>
      <div class="col-6 col-sm-4 pb-2">
          <div class="card  py-5 text-center">
             <div class="icon-wrapper rounded-circle mb-2">
                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                <i class="lnr-laptop-phone text-dark opacity-8"></i>
             </div>
             <h5>Help</h5>
             <div class="overly">
                <div class="content">
                  <h5>Help</h5>
                  <ul>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                  </ul>
                </div>
             </div>
          </div>
      </div>
      <div class="col-6 col-sm-4 pb-2">
          <div class="card  py-5 text-center">
             <div class="icon-wrapper rounded-circle mb-2">
                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                <i class="lnr-laptop-phone text-dark opacity-8"></i>
             </div>
             <h5>Help</h5>
             <div class="overly">
                <div class="content">
                  <h5>Help</h5>
                  <ul>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                    <li><a href="#">Asdfads</a></li>
                  </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="col-6 col-sm-4 pb-2">
           <div class="card  py-5 text-center">
              <div class="icon-wrapper rounded-circle mb-2">
                 <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                 <i class="lnr-laptop-phone text-dark opacity-8"></i>
              </div>
              <h5>Help</h5>
              <div class="overly">
                 <div class="content">
                   <h5>Help</h5>
                   <ul>
                     <li><a href="#">Asdfads</a></li>
                     <li><a href="#">Asdfads</a></li>
                     <li><a href="#">Asdfads</a></li>
                   </ul>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-6 col-sm-4 pb-2">
            <div class="card  py-5 text-center">
               <div class="icon-wrapper rounded-circle mb-2">
                  <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                  <i class="lnr-laptop-phone text-dark opacity-8"></i>
               </div>
               <h5>Help</h5>
               <div class="overly">
                  <div class="content">
                    <h5>Help</h5>
                    <ul>
                      <li><a href="#">Asdfads</a></li>
                      <li><a href="#">Asdfads</a></li>
                      <li><a href="#">Asdfads</a></li>
                    </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-6 col-sm-4 pb-2">
           <div class="card  py-5 text-center">
              <div class="icon-wrapper rounded-circle mb-2">
                 <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                 <i class="lnr-laptop-phone text-dark opacity-8"></i>
              </div>
              <h5>Help</h5>
              <div class="overly">
                 <div class="content">
                   <h5>Help</h5>
                   <ul>
                     <li><a href="#">Asdfads</a></li>
                     <li><a href="#">Asdfads</a></li>
                     <li><a href="#">Asdfads</a></li>
                   </ul>
                 </div>
              </div>
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
  .help-password label{
    font-size:17px;
  }
  .help .card{
    position: relative;
    height:200px;
  }
  .overly{
    position: absolute;
    width:100%;
    height:100%;
    background:white;
    top:0px;
    left:0px;
    z-index:999;
    text-align:left !important ;
    opacity:0;
    transition: 0.1s all linear;
  }
  .overly .content{
    padding:15px 20px;
  }

  .overly .content h5{
     color:black;
  }
  .overly .content ul {
     list-style-type:none;
     padding-left:5px;
  }
  .overly .content ul a{
    color: #1db873;
    font-size:15px;
  }
  .help .card:hover .overly{
    box-shadow:0px 0px 2px black;
    opacity:1;
  }
</style>
