<?php 
  session_start();
  include '../files/temp.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-auto" href="#">Admin Page</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="users.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="items.php">Items</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="transaction.php">Transaction</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarChangePass" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarChangePass">
              <li><a class="dropdown-item" href="change-password.php">Change Password</a></li>
              <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
            </ul>
          </li>

      </ul>
    </div>
  </div>
</nav>

<!-- <div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePass" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePass">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating">
  <input type="password" class="form-control" id="oldPass" placeholder="Current Password">
  <label for="oldPass">Current Password</label>
</div>

<div class="form-floating mt-4">
  <input type="password" class="form-control" id="newPass1" placeholder="New Password">
  <label for="newPass1">New Password</label>
</div>

<div class="form-floating mt-4">
  <input type="password" class="form-control" id="newPass2" placeholder="New Password Confirm">
  <label for="newPass2">New Password Confirm</label>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" id="changeNow">Change Password</button>
      </div>
    </div>
  </div>
</div> -->

<script>
  $(document).ready(function(){
    
    $('#changeNow').on('click',function(){
      alert('click');
      console.log('click');
      // event.preventDefault();
      //   var oldPass = $('#oldPass').val();
      //   var newPass = $('#newPass1').val();
      //   var renPass = $('#newPass2').val();
      //   if (oldPass != '' && newPass != '' && renPass != '') {
      //     if (newPass == renPass) {
      //       $.ajax({
      //                     type: 'POST',
      //                     url: '../Files/config.php',
      //                     data: {
      //                         editPassword: 'editPass',
      //           oldPass: oldPass,
      //           newPass: newPass,
      //           renPass: renPass
      //                     }
      //                 }).done(function(data){
      //                     $('#notifyEditPassword').html(data);
      //                     $("#oldPassword").val('');
      //                     $("#newPassword").val('');
      //                     $("#renPassword").val('');
      //                     alert('Password Changed');
      //                 });
      //     } else {
      //       alert('Different Password');
      //     }
      //   } else {
      //     alert('Please Input Your Password');
      //   }
      });
  });
</script>

</body>
</html>