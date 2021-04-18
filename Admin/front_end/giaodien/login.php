<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang đăng nhập - Admin</title>

  <!-- Custom fonts for this template-->
  <link href="../thuvien/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../thuvien/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="margin-top: 50px ;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <div class="p-5" style="padding: 5rem !important;">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Đăng Nhập</h1>
                  </div>
                  <!-- <form action="../../back_end/Ajax_JS/checklogin.php" class="user" method="POST"> -->
                    <form  class="user" method="POST">
                    <?php
                     ob_start();
                     session_start();
                     if(isset($_SESSION['login']))
                    {
                        header("location:./waitingScreen.php");
                    }
                      $name = 'phuc27';
                      $pass = '123456';

                      if(isset($_POST['submit']))
                      {
                        if($name == $_POST['username'] && $pass == $_POST['password'])
                        {
                          $_SESSION['login'] = $name;
                          header("location:./waitingScreen.php");
                        }
                        else
                        {
                          if($_POST['username'] != "" && $_POST['password'] != "")
                          {
                            echo '<label style="color:red">Tài khoản hoặc mật khẩu không đúng</label>';
                          }
                        }
                      }
                  ?> 
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Tên đăng nhập" >
                        <?php   
                          if(isset($_POST['submit']))
                          {
                            if($_POST['username'] == "")
                            
                            echo '<label style="color:red">Tài khoản không được bỏ trống</label>';
                          }
                        ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Mật khẩu">
                      <?php   
                          if(isset($_POST['submit']))
                          {
                            if($_POST['password'] == "")
                              echo '<label style="color:red">Mật khẩu không được bỏ trống</label>';
                          }
                        ?>
                    </div>
                    </div>
                    <!-- <a id="login_admin" style="margin-bottom: 50px; margin-right: 10px;color: white; cursor: pointer;" class="btn btn-primary btn-user btn-block">
                      Đăng nhập
                  </a> -->
                  <input name="submit" value="Đăng nhập" type="submit" style="margin-bottom: 50px; margin-right: 10px;color: white; cursor: pointer;" class="btn btn-primary btn-user btn-block">
                  
                </div>
                  <div class="col-lg-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="../thuvien/vendor/jquery/jquery.min.js"></script>
  <scrip src="../thuvien/vendor/bootstrap/js/bootstrap.bundle.min.js"></scrip>

  <!-- Core plugin JavaScript-->
  <scrip src="../thuvien/vendor/jquery-easing/jquery.easing.min.js"></scrip>

  <!-- Custom scripts for all pages-->
  <scrip src="../thuvien/js/sb-admin-2.min.js"></scrip>

  <!-- <script>
      $("#login_admin").click(function()
      {
          var a = $("#username").val()
          var b = $("#password").val()
          if(a == "" || b == "")
          {
            alert ("Vui lòng nhập đầy đủ thông tin")
          }
          else
          {
              window.location = "http://localhost:88/DoAn_MaNguonMo/Admin/front_end/giaodien/waitingScreen.php";
          }
      });
  </script> -->
</body>

</html>
