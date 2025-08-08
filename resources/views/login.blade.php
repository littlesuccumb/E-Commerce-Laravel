<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">
    <title>Sign In / Sign Up</title>
</head>
<body>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="header">Sign Up</div>
        <br>
        <div class="button-input-group">
          <div class="group input-group">
            <input type="text" placeholder="Name" name="name" autocomplete="off" required>
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="group input-group">
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="group input-group">
            <input type="password" placeholder="Password" name="password" required pattern=".{8,}">
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="group input-group">
            <input type="password" placeholder="Confirm Password" name="password_confirmation" required pattern=".{8,}">
            @error('password_confirmation')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="group input-group">
            <input type="file" name="photo" style="padding:10px">
            @error('photo')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
            <!-- Tampilan register.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <div class="group button-group">
            <button class="signup-btn">Sign Up</button>
          </div>
          <div class="log__in___adata">
            <h5 class="" onclick="myFunction___ad()"> LogIn this web</h5>
          </div>
        </div>
      </form>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-container sign-in-container" id="sign__in">
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="header">Sign In</div>
        <div class="social__media__container">
          <a href="#" target="_blank" class="social codepen">
            <i class="fa fa-github" aria-hidden="true"></i>
          </a>
          <a href="#" class="social google">
            <i class="fa fa-google-plus-official" aria-hidden="true"></i>
          </a>
          <a href="#" target="_blank" class="social instagram">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
        </div>
        <br>
        <div class="button-input-group">
          <div class="group input-group">
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="group input-group">
            <input type="password" placeholder="Password" name="password" required pattern=".{8,}">
            @error('password')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="alert-text signup__alert">
            <span class="help__text">Minimal 8 karakter !</span>
          </div>
          <div class="form-link forgot">
            <a href="#" class="login-link">Forgot your password?</a>
          </div>
          <div class="group button-group">
            <button class="signin-btn">Sign in</button>
          </div>
          <footer>
            <p>Kembali ke Home <a href="{{ ('/') }}">-> disini <-</a></p>
          </footer>
          <div class="log__in___adata">
            <h5 class="" onclick="myFunction___hi()"> SignUp this web</h5>
          </div>
        </div>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back! alProject</h1>
          <p>Please login to your personal info</p>
          <div class="group button-group">
            <button class="ghost" id="signIn">Sign in</button>
          </div>
          <footer>
            <p>Inspired by <a href="#">alProject</a></p>
          </footer>
        </div>

        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start your journey with us</p>
          <div class="group button-group">
            <button class="ghost" id="signUp">Sign up</button>
          </div>
          <footer>
            <p>Inspired by <a href="#">alProject</a></p>
          </footer>
        </div>
      </div>
    </div>
  </div>
  <script>
    const signUpButton = document.getElementById("signUp");
    const signInButton = document.getElementById("signIn");
    const container = document.getElementById("container");

    signUpButton.addEventListener("click", () => {
      container.classList.add("right-panel-active");
    });

    signInButton.addEventListener("click", () => {
      container.classList.remove("right-panel-active");
    });

    function myFunction___ad() {
      var signIn = document.getElementById("container");
      signIn.classList.toggle("sign-in-container__show");
      signIn.classList.remove("sign-up-container__show");
    }

    function myFunction___hi() {
      var signUp = document.getElementById("container");
      signUp.classList.toggle("sign-up-container__show");
      signUp.classList.remove("sign-in-container__show");
    }
  </script>
</body>
</html>
