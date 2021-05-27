<?php
  session_start();
  include 'conn.php';

  // User Registration Function
  if(isset($_POST['register'])){
    $newReg = $conn->prepare("INSERT INTO users (fname,uname,email,phone,pword,userPriv,status) VALUES (?,?,?,?,?,?,?)");
    $newReg->execute(array($_POST['fname'],$_POST['uname'],$_POST['email'],$_POST['phone'],md5($_POST['pword']),"user","active"));
    if($newReg){
      $_SESSION['tlcUser'] = $_POST['uname'];
      header("Location: welcome-to-tlc.php");
    }
  }

  // User Login Function
  if(isset($_POST['login'])){
    $lquery = $conn->prepare("SELECT * FROM users WHERE uname=? AND pword=?");
    $lquery->execute(array($_POST['uname'], md5($_POST['pword'])));
    $lcount = $lquery->rowCount();
    $lvalue = $lquery->fetch(PDO::FETCH_ASSOC);
    if($lcount == 1){
      $_SESSION['tlcUser'] = $_POST['uname'];
      header("Location: home.php");
    } else { echo "<script> alert('Incorrect username or password'); </script>"; }
  }

  // Admin Login Function
  if(isset($_POST['alogin'])){
    $lquery = $conn->prepare("SELECT * FROM users WHERE uname=? AND pword=?");
    $lquery->execute(array($_POST['uname'], md5($_POST['pword'])));
    $lcount = $lquery->rowCount();
    $lvalue = $lquery->fetch(PDO::FETCH_ASSOC);
    if($lcount == 1){
      $_SESSION['tlcAdmin'] = $_POST['uname'];
      header("Location: dashboard.php");
    } else { echo "<script> alert('Incorrect username or password'); </script>"; }
  }

  // SESSION VALIDATION
  if(isset($pageType) && $pageType == "userBackend"){
    if(!isset($_SESSION['tlcUser'])){
      header("Location: ./");
    }
  } else if(isset($pageType) && $pageType == "adminBackend"){
    if(!isset($_SESSION['tlcAdmin'])){
      header("Location: ./tlc-admin/dashboard.php");
    }
  }

  // User Statistics
  if(isset($_SESSION['tlcUser'])){
    // User Details
    $userDetailsq = $conn->prepare("SELECT * FROM users WHERE uname = ?");
    $userDetailsq->execute(array($_SESSION['tlcUser']));
    $userDetails = $userDetailsq->fetch(PDO::FETCH_ASSOC);

    $allReservations = $conn->prepare("SELECT * FROM reservations WHERE userID = ?");
    $allReservations->execute(array($userDetails['userID']));
    $allReservationsct = $allReservations->rowCount();

    $allApprovedReservations = $conn->prepare("SELECT * FROM reservations WHERE userID = ? AND resStatus = ?");
    $allApprovedReservations->execute(array($userDetails['userID'], "approved"));
    $allApprovedReservationsct = $allApprovedReservations->rowCount();

    $allPendingReservations = $conn->prepare("SELECT * FROM reservations WHERE userID = ? AND resStatus = ?");
    $allPendingReservations->execute(array($userDetails['userID'], "pending"));
    $allPendingReservationsct = $allPendingReservations->rowCount();

    $allCancelledReservations = $conn->prepare("SELECT * FROM reservations WHERE userID = ? AND resStatus = ?");
    $allCancelledReservations->execute(array($userDetails['userID'], "cancelled"));
    $allCancelledReservationsct = $allCancelledReservations->rowCount();
  }

  // Admin Statistics
  if(isset($_SESSION['tlcAdmin'])){
    // Admin Details
    $adminDetailsq = $conn->prepare("SELECT * FROM users WHERE uname = ?");
    $adminDetailsq->execute(array($_SESSION['tlcAdmin']));
    $adminDetails = $adminDetailsq->fetch(PDO::FETCH_ASSOC);

    $allReservations = $conn->prepare("SELECT * FROM reservations");
    $allReservations->execute();
    $allReservationsct = $allReservations->rowCount();

    $allApprovedReservations = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ?");
    $allApprovedReservations->execute(array("approved"));
    $allApprovedReservationsct = $allApprovedReservations->rowCount();

    $allPendingReservations = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ?");
    $allPendingReservations->execute(array("pending"));
    $allPendingReservationsct = $allPendingReservations->rowCount();

    $allCancelledReservations = $conn->prepare("SELECT * FROM reservations WHERE resStatus = ?");
    $allCancelledReservations->execute(array("cancelled"));
    $allCancelledReservationsct = $allCancelledReservations->rowCount();
  }

  // Make Reservation Function
  if(isset($_POST['placeOrder'])){
    $Rid = time();
    $diff1 = strtotime($_SESSION['departure']) - strtotime($_SESSION['arrival']);
    $days = round($diff1 / (60*60*24));
    $totalPrice = $_SESSION['roomPrice'] * $days;

    $_SESSION['cofname'] = $_POST['fname'];
    $_SESSION['colname'] = $_POST['lname'];

    if(isset($_SESSION['tlcUser'])){
      $couserID = $userDetails['userID'];
    } else { $couserID = 0; }

    $descr = $days." days ".$_SESSION['room']." accomodation from ".$_SESSION['arrival']." to ".$_SESSION['departure'];

    $newBilling = $conn->prepare("INSERT INTO billings (resID,firstName,lastName,companyName,address,city,country,email,phone,otherNotes,paymentType) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $newBilling->execute(array($Rid, $_POST['fname'],$_POST['lname'],$_POST['company'],$_POST['apartment']." ".$_POST['saddress'],$_POST['city'],$_POST['country'],$_POST['email'],$_POST['phone'],$_POST['note'],$_POST['payment']));

    $newRes = $conn->prepare("INSERT INTO reservations (resID, userID, section,description,startDate,endDate,amount,resTime,resStatus) VALUES (?,?,?,?,?,?,?,?,?)");
    $newRes->execute(array($Rid, $couserID, "Room Booking", $descr, $_SESSION['arrival'], $_SESSION['departure'], $totalPrice, time(), "pending"));

    $msg1 = "New Order Reservation #".$Rid." Details: \r\n\r\nName(First Last): ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg1 .="Company: ".$_POST['company']."\r\nAddress: ".$_POST['apartment']." ".$_POST['saddress']."\r\nCity, Country: ".$_POST['city'].", ".$_POST['country']."\r\n";
    $msg1 .="Email: ".$_POST['email']."\r\nPhone No.: ".$_POST['phone']."\r\nNote: ".$_POST['note']."\r\n\r\nDuration: ".$days." night, ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", strtotime($_SESSION['departure']))."\r\n";
    $msg1 .="Room: ".$_SESSION['room']."\r\nAmount: N".number_format($totalPrice,0);

    $msg2 = "Your Order Reservation #".$Rid." Details: \r\n\r\nName: ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg2 .="Duration: ".$days." night, ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", strtotime($_SESSION['departure']))."\r\n";
    $msg2 .="Room: ".$_SESSION['room']."\r\nAmount: N".number_format($totalPrice,0)."\r\n\r\nWarm regards,\r\nCaesar's by TLC.";

    $mailAdmin = mail("info@caersarsbytlc.com", "New Reservation Order", $msg1, "FROM: reservation@caersarsbytlc.com");
    $mailCustomer = mail($_POST['email'], "Your Caesars Reservation #".$Rid, $msg2, "FROM: reservation@caersarsbytlc.com");

    if($newBilling && $newRes){
      $_SESSION['rID'] = $Rid;
      $_SESSION['cname'] = $_POST['fname']." ".$_POST['lname'];
      header("Location: reservation-step-4.php");
    }
  }

?>
