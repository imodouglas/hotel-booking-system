<div class="col-sm-3" style="margin-bottom:20px">
  <div style="padding:10px; color:#fff; background:#333" align="center">
    MY ACCOUNT
  </div>
  <div style="border:#333 thin solid;">
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> Name: </span>  <br />
      <?php echo $adminDetails['fname']; ?>
    </div>
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> Username: </span>  <br />
      <?php echo $adminDetails['uname']; ?>
    </div>
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> Email: </span>  <br />
      <?php echo $adminDetails['email']; ?>
    </div>
    <div style="padding:10px; color:#333">
      <span style="font-size:12px"> Phone No.: </span>  <br />
      <?php echo $adminDetails['phone']; ?>
    </div>
  </div>
</div>
