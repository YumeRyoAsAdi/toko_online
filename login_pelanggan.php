<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login Pelanggan</title>
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="Logoh.png" style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Login Pelanggan</h4>
                </div>

                <form action="proses_login_pelanggan.php" method="post">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                    <input type="text" name="nama" class="form-control" required>
                    <label class="form-label" for="nama">Nama</label>
                  </div>
                    
                  <div class="form-outline mb-4">
                    <input type="text" name="telp" class="form-control" required>
                    <label class="form-label" for="telp">Telepon</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button type="submit" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Login</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Already have an account?</p>
                    <a href="login.php">
                      <button type="button" class="btn btn-outline-danger">Login as Staff</button>
                    </a>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="tambah_pelanggan.php">
                      <button type="button" class="btn btn-outline-success">Register</button>
                    </a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Welcome to Shoppo</h4>
                <p class="small mb-0">We are glad to have you here. Please login to access our products and services.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
