<template id="">
  <span>
    <div class="card p-0 col-10 col-sm-8 col-md-7  offset-md-3 offset-sm-2 offset-1">
      <div class="card-header" style="background:rgba(221, 221, 221, 0.20);border:1px solid rgba(0, 0, 0, 0.05)">
        <h3 style="color:black">Refer &amp; Get Up Taka</h3>
      </div>
      <div class="refer-taka p-md-5 p-3 ">
        <form>
            <div class="form-group">
              <label>Full Name</label>
              <input type="text" class="form_control"  placeholder="Full Name">
            </div>
            <div class="form-group">
              <label>Shop Name</label>
              <input type="text" class="form_control"  placeholder="Shop Name">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form_control"  placeholder="Email">
            </div>
            <div class="form-group">
              <label>Phone Number</label>
              <input type="text" class="form_control"  placeholder="Phone Number">
            </div>
            <div class="form-group">
              <label>Address</label>
              <textarea name="name" class="form_control" placeholder="Address" style="height: 80px;"></textarea>
            </div>
            <div class="">
              <button type="button" class="mr-2 btn-pill btn-hover-shine btn btn-primary">Add Information</button>
              <button type="button" class="btn-pill btn-hover-shine btn btn-light">Clear</button>
            </div>
        </form>
      </div>
    </div>
  </span>
</template>
<script>
    export default {

    }
</script>
<style media="screen">
  .refer-taka label{
    font-size:17px;
  }
</style>
