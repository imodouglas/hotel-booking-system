<div class="col-sm-3" style="margin-bottom:10px">
  <div style="padding:10px; color:#fff; background:#333" align="center">
    RESERVATIONS OVERVIEW
  </div>
  <div style="border:#333 thin solid;">
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> All Reservations: </span>
      <?php echo $allReservationsct; ?>
      <a href="view-reservations.php?p=all"><span style="float:right; padding:3px 5px 0px 6px; color: #C49509; border-radius:3px; background:#333"> <strong> > </strong> </span></a>
    </div>
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> All Approved Reservations </span>
      <?php echo $allApprovedReservationsct; ?>
      <a href="view-reservations.php?p=approved"><span style="float:right; padding:3px 5px 0px 6px; color: #C49509; border-radius:3px; background:#333"> <strong> > </strong> </span></a>
    </div>
    <div style="padding:10px; border-bottom:#333 thin solid; color:#333">
      <span style="font-size:12px"> All Pending Reservations </span>
      <?php echo $allPendingReservationsct; ?>
      <a href="view-reservations.php?p=pending"><span style="float:right; padding:3px 5px 0px 6px; color: #C49509; border-radius:3px; background:#333"> <strong> > </strong> </span></a>
    </div>
    <div style="padding:10px; color:#333">
      <span style="font-size:12px"> All Cancelled Reservations </span>
      <?php echo $allCancelledReservationsct; ?>
      <a href="view-reservations.php?p=cancelled"><span style="float:right; padding:3px 5px 0px 6px; color: #C49509; border-radius:3px; background:#333"> <strong> > </strong> </span></a>
    </div>
  </div>
</div>
