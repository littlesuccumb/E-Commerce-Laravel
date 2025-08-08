<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Website</title>
  <!-- Bootstrap CSS -->
  <link href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/bootstrap-vue@2.0.0-rc.23/dist/bootstrap-vue.min.css" rel="stylesheet">

</head>

<body>
  <div id='app'>
    <div id='navbar-home'>
      <b-navbar toggleable="lg" type="dark" variant="dark">
        <b-navbar-brand href="#">alProject</b-navbar-brand>
        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item href="#">Home</b-nav-item>
            <b-nav-item href="#">Profil</b-nav-item>
            <b-nav-item href="#">About</b-nav-item>
            <b-nav-item href="#">Others</b-nav-item>
          </b-navbar-nav>
          <b-navbar-nav class="ml-auto">
            <b-nav-item-dropdown text="Join Now" right>
              <b-dropdown-item href="{{ route('login') }}">Sign In</b-dropdown-item>
              <b-dropdown-item href="{{ route('login') }}">Sign Up</b-dropdown-item>
              <b-dropdown-item href="#">Settings</b-dropdown-item>
              <b-dropdown-item href="#">Log Out</b-dropdown-item>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <div id='carousel-home'>
      <b-carousel id="carousel-fade" :interval="4000" style="text-shadow: 0px 0px 2px #000" fade indicators
        img-width="1024" img-height="400">
        <b-carousel-slide img-src="{{ asset('images/bg.jpg') }}" alt="Gambar">
          <h1>Hello Nakama</h1>
        </b-carousel-slide>

        <b-carousel-slide img-src="{{ asset('images/bg3.jpg') }}" alt="Gambar">
          <h1>海賊王に俺はなる</h1>
        </b-carousel-slide>

        <b-carousel-slide img-src="{{ asset('images/bg4.jpg') }}" alt="Gambar">
          <p>Zehahahahaha</p>
        </b-carousel-slide>
      </b-carousel>
    </div>
    <div id='members'>
      <b-container fluid class="p-4 bg-dark">
        <h1 style="text-align:center; color:white">
          Member
        </h1>
        <b-card-group columns>
          <b-card  title="Vinsmoke Sanji"
            img-src="{{ asset('images/sanji.jpg') }}" img-alt="Image" img-top>
            <b-card-text>
              This is a wider card with supporting text below as a natural lead-in to additional content. This content is
              a little bit longer.
            </b-card-text>
            <div slot="footer"><small class="text-muted">Last updated 3 mins ago</small></div>
          </b-card>

          <b-card  title="Monkey D. Luffy"
            img-src="{{ asset('images/luffy.jpg') }}" img-alt="Image" img-top >
            <b-card-text>
              This is a wider card with supporting text below as a natural lead-in to additional content. This content is
              a little bit longer.
            </b-card-text>
            <div slot="footer"><small class="text-muted">Last updated 3 mins ago</small></div>
          </b-card>

          <b-card  title="Roronoa Zoro"
            img-src="{{ asset('images/zoro.jpg') }}" img-alt="Image" img-top>
            <b-card-text>
              This is a wider card with supporting text below as a natural lead-in to additional content. This content is
              a little bit longer.
            </b-card-text>
            <div slot="footer"><small class="text-muted">Last updated 3 mins ago</small></div>
          </b-card>
        </b-card-group>
      </b-container>
    </div>
  </div>

  <!-- Bootstrap JS dependencies (jQuery, Popper.js, Bootstrap JS) -->
  <script src="https://unpkg.com/vue@2.6.10/dist/vue.min.js"></script>
  <script src="https://unpkg.com/bootstrap-vue@2.0.0-rc.23/dist/bootstrap-vue.min.js"></script>
  <script>
    let app = new Vue({
  el:'#app',
  }
)
</script>
</body>

</html>
