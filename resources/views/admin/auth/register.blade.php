<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
   <meta name="csrf-token" content="{{ csrf_token()}}">

  <title>Tạo Tài Khoản</title>

  <!-- Custom fonts for this template-->
  <base href="/assets/admin/">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">TẠO TÀI KHOẢN!</h1>
              </div>
              @if( $errors->any())
                    <div class="alert alert-warning">
                      <ul>
                      @foreach ($errors->all() as $error)
                        <li>  {{ $error }}  </li>
                      @endforeach
                      </ul>
                    </div>
                  @endif
            <form class="user" method="POST" action="{{ route('admin.postregister') }}">
                <div class="form-group row">
                    @csrf
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Họ Và Tên" name="fullName">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Số Điện Thoại" name="numberPhone">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="email">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tên Đăng Nhập" name="userName">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Password" name="passWord">
                  </div>
                  <div class="col-sm-6">
                 
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Password" name="repeatPassWord">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Tạo
                </button>
                <hr>
                
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
