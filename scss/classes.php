<?php
  session_start();
  include 'conn.php';

  //defined functions
  function getRoom($conn, $roomID){
    $query = $conn->prepare("SELECT * FROM rooms WHERE roomID = ?");
    $query->execute(array($roomID));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function getRooms($conn){
    $query = $conn->prepare("SELECT * FROM rooms");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
  }

  function getHalls($conn){
    $query = $conn->prepare("SELECT * FROM halls");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
  }

  function getEvents($conn){
    $query = $conn->prepare("SELECT * FROM events");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
  }

  function featuredEvents($conn){
    $query = $conn->prepare("SELECT * FROM events a LEFT JOIN halls b ON a.eventHall = b.hallID WHERE a.eventEnd > ? AND a.eventStatus = ? LIMIT 3");
    $query->execute(array(time(), "active"));
    $result = $query->fetchAll();

    return $result;
  }

  function getEvent($conn, $id){
    $query = $conn->prepare("SELECT * FROM events a LEFT JOIN halls b ON a.eventHall = b.hallID WHERE a.eventID = ? AND a.eventStatus = ?");
    $query->execute(array($id, "active"));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function deleteEvent($conn, $id){
    $query = $conn->prepare("DELETE FROM events WHERE eventID=?");
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function getInvoice($conn, $id){
    $query = $conn->prepare("SELECT * FROM invoices WHERE invoiceID = ?");
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function getInvoices($conn){
    $query = $conn->prepare("SELECT * FROM invoices");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
  }

  function getInvoicesct($conn){
    $query = $conn->prepare("SELECT * FROM invoices");
    $query->execute();
    $result = $query->rowCount();

    return $result;
  }

  function getPost($conn, $id){
    $query = $conn->prepare("SELECT * FROM posts WHERE postID = ? AND postStatus = ?");
    $query->execute(array($id, "active"));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function deletePost($conn, $id){
    $query = $conn->prepare("DELETE FROM posts WHERE postID=?");
    $query->execute(array($id));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function checkAddress($conn, $userID){
    $query = $conn->prepare("SELECT * FROM addresses WHERE userID = ?");
    $query->execute(array($userID));
    $result = $query->rowCount();

    return $result;
  }

  function getUser($conn, $userID){
    $query = $conn->prepare("SELECT * FROM users WHERE userID = ? OR uname = ? OR email = ?");
    $query->execute(array($userID,$userID,$userID));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function addAddress($conn, $userID, $company, $address, $city, $country){
    $query = $conn->prepare("INSERT INTO addresses(userID,companyName,address,city,country) VALUES (?,?,?,?,?)");
    $query->execute(array($userID,$company,$address,$city,$country));
  }

  function checkLogin($conn, $uname, $pword){
    $lquery = $conn->prepare("SELECT * FROM users WHERE (uname=? OR email=?) AND pword=?");
    $lquery->execute(array($uname, $uname, md5($pword)));
    $lcount = $lquery->rowCount();

    return $lcount;
  }

  //Predefined contents
  if(isset($pageType) && ($pageType == "homepage" || $pageType == "adminBackend")){
    $getHomeValq = $conn->prepare("SELECT * FROM caesars_advert WHERE chpID = ?");
    $getHomeValq->execute(array("1"));
    $getHomeVal = $getHomeValq->fetch(PDO::FETCH_ASSOC);
  }
  $getRoomVal = $conn->prepare("SELECT * FROM rooms WHERE roomID = ?");

  $getHallVal = $conn->prepare("SELECT* FROM halls WHERE hallID = ?");

  $getPSVal = $conn->prepare("SELECT* FROM photoscape");
  $getPSVal->execute();
  $getPS = $getPSVal->fetchAll();


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
      if(getUser($conn,$_SESSION['tlcAdmin'])['userPriv'] == "admin"){
        header("Location: dashboard.php");
      } else if(getUser($conn,$_SESSION['tlcAdmin'])['userPriv'] == "editor"){
        header("Location: blog.php");
      }
      
    } else { echo "<script> alert('Incorrect username or password'); </script>"; }
  }

  // SESSION VALIDATION
  if(isset($pageType) && $pageType == "userBackend"){
    if(!isset($_SESSION['tlcUser'])){
      header("Location: ./");
    }
  } else if(isset($pageType) && $pageType == "adminBackend"){
    if(!isset($_SESSION['tlcAdmin'])){
      header("Location: ./");
    }
  }

  // User Statistics
  if(isset($_SESSION['tlcUser'])){
    // User Details
    $userDetailsq = $conn->prepare("SELECT * FROM users a LEFT JOIN addresses b ON a.userID = b.userID WHERE a.uname = ?");
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
    $days = $_SESSION['departure'];
    $diff1 = strtotime("+".$days." days", strtotime($_SESSION['arrival']));
    $_SESSION['adults'] = $_POST['adults'];
    $_SESSION['children'] = $_POST['children'];

    $_SESSION['room1-price'] = (getRoom($conn,$_POST['room1ID'])['roomRate'] * $_POST['room1']) * $days;
    $_SESSION['room2-price'] = (getRoom($conn,$_POST['room2ID'])['roomRate'] * $_POST['room2']) * $days;
    $_SESSION['room3-price'] = (getRoom($conn,$_POST['room3ID'])['roomRate'] * $_POST['room3']) * $days;

    $_SESSION['totalPrice'] = $_SESSION['room1-price'] + $_SESSION['room2-price'] + $_SESSION['room3-price'];

    $_SESSION['room'] = "";
    if($_POST['room1'] > 0){ $_SESSION['room'] .=  $_POST['room1']." ".getRoom($conn,$_POST['room1ID'])['roomName'].", "; }
    if($_POST['room2'] > 0){ $_SESSION['room'] .=  $_POST['room2']." ".getRoom($conn,$_POST['room2ID'])['roomName'].", "; }
    if($_POST['room3'] > 0){ $_SESSION['room'] .=  $_POST['room3']." ".getRoom($conn,$_POST['room3ID'])['roomName'].", "; }

    $_SESSION['room'] = rtrim($_SESSION['room'], ", \t\n");

    $totalPrice = $_SESSION['totalPrice'];

    $_SESSION['cofname'] = $_POST['fname'];
    $_SESSION['colname'] = $_POST['lname'];

    if(isset($_SESSION['tlcUser'])){
      $couserID = $userDetails['userID'];
      if(checkAddress($conn,$couserID) == 0){
        $query = $conn->prepare("INSERT INTO addresses(userID,companyName,city,country) VALUES (?,?,?,?)");
        $query->execute(array($userDetails['userID'],$_POST['company'],$_POST['city'],$_POST['country']));
      }
    } else { $couserID = 0; }

    $descr = $_SESSION['room']." accomodation from ".date("d/m/Y", strtotime($_SESSION['arrival']))." to ".date("d/m/Y", $diff1)." (".$days." days) ";

    $_SESSION['descr'] = $descr;

    $newBilling = $conn->prepare("INSERT INTO billings (resID,userID,firstName,lastName,companyName,address,city,country,email,phone,otherNotes,paymentType) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
    $newBilling->execute(array($Rid, $couserID, $_POST['fname'],$_POST['lname'],$_POST['company'],$_POST['saddress'],$_POST['city'],$_POST['country'],$_POST['email'],$_POST['phone'],$_POST['note'],$_POST['payment']));

    $newRes = $conn->prepare("INSERT INTO reservations (resID, userID, section,description,startDate,endDate,amount,resTime,resStatus) VALUES (?,?,?,?,?,?,?,?,?)");
    $newRes->execute(array($Rid, $couserID, "Room Booking", $descr, date("m/d/Y", strtotime($_SESSION['arrival'])), date("m/d/Y", $diff1), $totalPrice, time(), "pending"));

    $msg1 = "New Order Reservation #".$Rid." Details: \r\n\r\nName(First Last): ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg1 .="Company: ".$_POST['company']."\r\nAddress: ".$_POST['saddress']."\r\nCity, Country: ".$_POST['city'].", ".$_POST['country']."\r\n";
    $msg1 .="Email: ".$_POST['email']."\r\nPhone No.: ".$_POST['phone']."\r\nNote: ".$_POST['note']."\r\n\r\nDuration: ".$days." night, ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", $diff1)."\r\n";
    $msg1 .="Room(s): ".$_SESSION['room']."\r\nAmount: N".number_format($totalPrice,0);

    $msg2 = "Your Caesar's Hotel Room Reservation #".$Rid." Details: \r\n\r\nName: ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg2 .="Duration: ".$days." night(s), ".date("d M, Y", strtotime($_SESSION['arrival']))." to ".date("d M, Y", $diff1)."\r\n";
    $msg2 .="Room(s): ".$_SESSION['room']."\r\nAmount: N".number_format($totalPrice,0)."\r\n\r\nSigned (Caesar's by TLC).";

    $mailAdmin = mail("info@caersarsbytlc.com", "New Reservation Order", $msg1, "FROM: booking@caersarsbytlc.com");
    $mailCustomer = mail($_POST['email'], "Your Caesars Reservation #".$Rid, $msg2, "FROM: booking@caersarsbytlc.com");

    $_SESSION['ResEmail'] = $_POST['email'];

    if($newBilling && $newRes){
      $_SESSION['rID'] = $Rid;
      $_SESSION['cname'] = $_POST['fname']." ".$_POST['lname'];
      if($_POST['payment'] == "card"){
        header("Location: room-reservation-2.php?payment=card");
      } else if($_POST['payment'] == "transfer"){
        header("Location: room-reservation-2.php");
      }
    }
  }

  // Make Hall Reservation Function
  if(isset($_POST['reserveHall'])){
    $Rid = time();

    $getHallq = $conn->prepare("SELECT * FROM halls WHERE hallName = ?");
    $getHallq->execute(array($_POST['hall']));
    $getHall = $getHallq->fetch(PDO::FETCH_ASSOC);

    $days = $_POST['departure'];
    $diff1 = strtotime("+".$days." days", strtotime($_POST['arrive']));

    $_SESSION['days'] = $days;
    $_SESSION['hall'] = $_POST['hall'];

    $_SESSION['totalPrice'] = $getHall['hallPrice'] * $days;
    $totalPrice = $_SESSION['totalPrice'];

    $_SESSION['cofname'] = $_POST['fname'];
    $_SESSION['colname'] = $_POST['lname'];
    $_SESSION['arrival'] = $_POST['arrive'];
    $_SESSION['departure'] = date("m/d/Y", $diff1);

    if(isset($_SESSION['tlcUser'])){
      $couserID = $userDetails['userID'];
    } else { $couserID = 0; }

    $descr = $days." days ".$_POST['hall']." reservation from ".date("d/m/Y", strtotime($_SESSION['arrival']))." to ".date("d/m/Y", $diff1)." (".$days." days)";
    $_SESSION['descr'] = $descr;

    $newBilling = $conn->prepare("INSERT INTO billings (resID,firstName,lastName,companyName,address,city,country,email,phone,otherNotes,paymentType) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $newBilling->execute(array($Rid, $_POST['fname'],$_POST['lname'],$_POST['company'],$_POST['apartment']." ".$_POST['saddress'],$_POST['city'],$_POST['country'],$_POST['email'],$_POST['phone'],$_POST['note'],$_POST['payment']));

    $newRes = $conn->prepare("INSERT INTO reservations (resID, userID, section,description,startDate,endDate,amount,resTime,resStatus) VALUES (?,?,?,?,?,?,?,?,?)");
    $newRes->execute(array($Rid, $couserID, "Hall Booking", $descr, date("m/d/Y", strtotime($_SESSION['arrival'])), date("m/d/Y", $diff1), $totalPrice, time(), "pending"));

    $msg1 = "New Order Reservation #".$Rid." Details: \r\n\r\nName(First Last): ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg1 .="Company: ".$_POST['company']."\r\nAddress: ".$_POST['apartment']." ".$_POST['saddress']."\r\nCity, Country: ".$_POST['city'].", ".$_POST['country']."\r\n";
    $msg1 .="Email: ".$_POST['email']."\r\nPhone No.: ".$_POST['phone']."\r\nNote: ".$_POST['note']."\r\n\r\nDuration: ".$days." day(s), ".date("d M, Y", strtotime($_POST['arrive']))." to ".date("d M, Y", $diff1)."\r\n";
    $msg1 .="Hall: ".$getHall['hallName']."\r\nAmount: N".number_format($totalPrice,0);

    $msg2 = "Your Hall Reservation #".$Rid." Details: \r\n\r\nName: ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg2 .="Duration: ".$days." day(s), ".date("d M, Y", strtotime($_POST['arrive']))." to ".date("d M, Y", $diff1)."\r\n";
    $msg2 .="Hall: ".$getHall['hallName']."\r\nAmount: N".number_format($totalPrice,0)."\r\n\r\nWarm regards,\r\nThe Lekki Coliseum.";

    $mailAdmin = mail("info@thelekkicoliseum.com", "New Reservation Order", $msg1, "FROM: reservation@thelekkicoliseum.com");
    $mailCustomer = mail($_POST['email'], "Your Hall Reservation #".$Rid, $msg2, "FROM: reservation@thelekkicoliseum.com");

    $_SESSION['ResEmail'] = $_POST['email'];

    if($newBilling && $newRes){
      $_SESSION['rID'] = $Rid;
      $_SESSION['cname'] = $_POST['fname']." ".$_POST['lname'];
      if($_POST['payment'] == "card"){
        header("Location: hall-reservation-step-2.php?payment=card");
      } else if($_POST['payment'] == "transfer"){
        header("Location: hall-reservation-step-2.php");
      }
    }
  }

  // Make PS Reservation Function
  if(isset($_POST['reservePS'])){
    $Rid = time();

    $totalPrice = ($_POST['price1'] * $_POST['qty1']) + ($_POST['price2'] * $_POST['qty2']) + ($_POST['price3'] * $_POST['qty3']) + ($_POST['price4'] * $_POST['qty4']) + ($_POST['price5'] * $_POST['qty5']);


    $_SESSION['cofname'] = $_POST['fname'];
    $_SESSION['colname'] = $_POST['lname'];

    if(isset($_SESSION['tlcUser'])){
      $couserID = $userDetails['userID'];
    } else { $couserID = 0; }

    $descr = "Booking for the following services <br />";
    $descr .= $_POST['qty1']." ".$_POST['service1'].", <br />";
    $descr .= $_POST['qty2']." ".$_POST['service2'].", <br />";
    $descr .= $_POST['qty3']." ".$_POST['service3'].", <br />";
    $descr .= $_POST['qty4']." ".$_POST['service4'].", <br />";
    $descr .= $_POST['qty5']." ".$_POST['service5'].", <br />";
    $descr .= "on the following date ".date("d M, Y", strtotime($_POST['arrive']));

    $_SESSION['descr'] = $descr;



    $newBilling = $conn->prepare("INSERT INTO billings (resID,firstName,lastName,companyName,address,city,country,email,phone,otherNotes,paymentType) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
    $newBilling->execute(array($Rid, $_POST['fname'],$_POST['lname'],$_POST['company'],$_POST['apartment']." ".$_POST['saddress'],$_POST['city'],$_POST['country'],$_POST['email'],$_POST['phone'],$_POST['note'],$_POST['payment']));

    $newRes = $conn->prepare("INSERT INTO reservations (resID, userID, section,description,startDate,amount,resTime,resStatus) VALUES (?,?,?,?,?,?,?,?)");
    $newRes->execute(array($Rid, $couserID, "Photoscape", $descr, $_POST['arrive'], $totalPrice, time(), "pending"));

    $msg1 = "New Order Reservation #".$Rid." Details: \r\n\r\nName(First Last): ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg1 .="Company: ".$_POST['company']."\r\nAddress: ".$_POST['apartment']." ".$_POST['saddress']."\r\nCity, Country: ".$_POST['city'].", ".$_POST['country']."\r\n";
    $msg1 .="Email: ".$_POST['email']."\r\nPhone No.: ".$_POST['phone']."\r\nNote: ".$_POST['note']."\r\n\r\n";
    $msg1 .="Description: ".$descr."\r\nAmount: N".number_format($totalPrice,0);

    $msg2 = "Your Photoscape Session Reservation #".$Rid." Details: \r\n\r\nName: ".$_POST['fname']." ".$_POST['lname']."\r\n";
    $msg2 .="Description: ".$descr."\r\n";
    $msg2 .="Amount: N".number_format($totalPrice,0)."\r\n\r\nWarm regards,\r\nThe Lekki Coliseum.";

    $mailAdmin = mail("info@caersarsbytlc.com", "New Reservation Order", $msg1, "FROM: reservation@caersarsbytlc.com");
    $mailCustomer = mail($_POST['email'], "Your Photoscape Session Reservation #".$Rid, $msg2, "FROM: reservation@caersarsbytlc.com");

    $_SESSION['ResEmail'] = $_POST['email'];

    if($newBilling && $newRes){
      $_SESSION['rID'] = $Rid;
      $_SESSION['cname'] = $_POST['fname']." ".$_POST['lname'];
      if($_POST['payment'] == "card"){
        header("Location: ps-reservation-step-4.php?payment=card");
      } else if($_POST['payment'] == "transfer"){
        header("Location: ps-reservation-step-4.php");
      }
    }
  }

  //Change Advert Image
  if(isset($_POST['changeAd'])){
    if($_FILES['item-pix']['error'] > 0) { echo 'Error during uploading, try again'; }
    $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
    $extUpload = strtolower( substr( strrchr($_FILES['item-pix']['name'], '.') ,1) ) ;
    if (in_array($extUpload, $extsAllowed) ) {
    $name = "ad.jpg";
    $dir = "../images/".$name;
    $result = move_uploaded_file($_FILES['item-pix']['tmp_name'], $dir);
    if($result){
      $uppStat = $conn->prepare("UPDATE caesars_advert SET adImage = ?, addTime = ?");
      $uppStat->execute(array($name,time()));
      if($uppStat){
        echo "<script> alert('Advert updated successfully!'); window.location = 'caesars-homepage.php'; </script>";
      } else { echo "<script> alert('Update Error!'); </script>"; }
    }
    } else { echo 'File is not valid. Please try again'; }
  }

  // Update Ad 1 Information
  if(isset($_POST['updateAd1'])){
    $uppStat = $conn->prepare("UPDATE caesars_advert SET ad1title = ?, ad1text = ?");
    $uppStat->execute(array($_POST['ad1title'],$_POST['ad1text']));
    if($uppStat){
      echo "<script> alert('Advert updated successfully!'); window.location = 'caesars-homepage.php'; </script>";
    } else { echo "<script> alert('Update Error!'); </script>"; }
  }

  // Update Ad 2 Information
  if(isset($_POST['updateAd2'])){
    $uppStat = $conn->prepare("UPDATE caesars_advert SET ad2title = ?, ad2text = ?");
    $uppStat->execute(array($_POST['ad2title'],$_POST['ad2text']));
    if($uppStat){
      echo "<script> alert('Advert updated successfully!'); window.location = 'caesars-homepage.php'; </script>";
    } else { echo "<script> alert('Update Error!'); </script>"; }
  }

  // Update Room Information
  if(isset($_POST['upRoom'])){
    $uppStat = $conn->prepare("UPDATE rooms SET roomName = ?, roomRate = ? WHERE roomID = ?");
    $uppStat->execute(array($_POST['roomName'],$_POST['roomRate'], $_POST['roomID']));
    if($uppStat){
      echo "<script> alert('Room updated successfully!'); window.location = 'caesars-rooms.php'; </script>";
    } else { echo "<script> alert('Update Error!'); </script>"; }
  }

  // Update Photoscape Service Information
  if(isset($_POST['upPs'])){
    $uppStat = $conn->prepare("UPDATE photoscape SET psServices = ?, psDescriptions = ?, psPrices = ? WHERE psID = ?");
    $uppStat->execute(array($_POST['psName'],$_POST['psDesc'],$_POST['psPrice'],$_POST['psID']));
    if($uppStat){
      echo "<script> alert('Photoscape service updated successfully!'); window.location = 'photoscape.php'; </script>";
    } else { echo "<script> alert('Update Error!'); </script>"; }
  }

  // Update Hall Information
  if(isset($_POST['upHall'])){
    $uppStat = $conn->prepare("UPDATE halls SET hallName = ?, hallCapacity = ?, hallPrice = ? WHERE hallID = ?");
    $uppStat->execute(array($_POST['psName'],$_POST['psDesc'],$_POST['psPrice'],$_POST['psID']));
    if($uppStat){
      echo "<script> alert('Hall updated successfully!'); window.location = 'halls.php'; </script>";
    } else { echo "<script> alert('Update Error!'); </script>"; }
  }

?>
