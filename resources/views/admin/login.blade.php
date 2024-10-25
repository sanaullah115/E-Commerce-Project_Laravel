@include('admin.layouts.head')

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="{{route('loginsuccess')}}">
            @csrf
            <h1>Login Form</h1>
            @include('error')
            <div>
              <input type="email" name="email" class="form-control" placeholder="email" required="" />
            </div>
            <div>
              <input type="password" name="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <button class="btn btn-default submit" type="submit">Log in</button>
              <a class="reset_pass" href="#">Lost your password?</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="{{route('admin.register')}}" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div>


    </div>
  </div>
  @include('admin.layouts.footerlink')