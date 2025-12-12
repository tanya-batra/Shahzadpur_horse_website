<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
  <style>
    
/* login page */

        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }

        .login-container {
            width: 400px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
            position: relative;
        }

        .login-container h2 {
            text-align: center;
            color: var(--maroon);
            margin-bottom: 30px;
            font-weight: 700;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-control {
            width: 100%;
            padding: 15px 15px 15px 15px;
            border-radius: 50px;
            border: 2px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--maroon);
            box-shadow: 0 0 10px rgba(91, 10, 10, 0.4);
        }

        .form-label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #aaa;
            transition: all 0.2s ease;
            pointer-events: none;
        }

        .form-control:focus~.form-label,
        .form-control:not(:placeholder-shown)~.form-label {
            top: -10px;
            left: 15px;
            font-size: 0.85rem;
            color: #152238;
            background: #fff;
            padding: 0 5px;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            color:#152238 ;
            font-size: 1.2rem;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            border-radius: 50px;
            background: #152238;
            border: none;
            color: #fff;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: var(--gold);
            color: #fff;
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
            font-size: 0.9rem;
            color: var(--maroon);
            text-decoration: none;
        }

        .forgot-password:hover {
            color: var(--gold);
        }

        .error {
            color: red;
            margin-top: 10px;
            font-weight: 500;
            text-align: center;
        }
  
  </style>
</head>
<body>
  <div class="login-container">
     <a class="fw-bold d-flex align-items-center justify-content-center gap-2 mb-2" href="index.html">
      <img src="../assets/images/logo.png" alt="Shahzadpur Stables Logo" class="img-fluid" width="90px"  />
    </a>

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf

      <div class="form-group">
        <input type="email" class="form-control" name="email" placeholder=" " required>
        <label class="form-label">Email</label>
      </div>

      <div class="form-group password-wrapper">
        <input type="password" class="form-control" name="password" id="password" placeholder=" " required>
        <label class="form-label">Password</label>
        <i class="bi bi-eye-fill toggle-password" id="togglePassword"></i>
      </div>

      <a href="#" class="forgot-password">Forgot Password?</a>
      <button type="submit" class="btn btn-login mt-3">Login</button>

      @if ($errors->any())
        <div class="error">
          {{ $errors->first() }}
        </div>
      @endif
    </form>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', () => {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      togglePassword.classList.toggle('bi-eye-fill');
      togglePassword.classList.toggle('bi-eye-slash-fill');
    });
  </script>
</body>
</html>
