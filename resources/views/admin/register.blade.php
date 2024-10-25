@include('admin.layouts.head')

<body class="login">
    <div class="login_wrapper">
        <div>
            <div id="register" class="animate form ">
                <section class="login_content">
                    <form method="POST" action="{{route('admin.store')}}">
                        @csrf
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" name="name" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="{{route('login')}}" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    @include('admin.layouts.footerlink')
