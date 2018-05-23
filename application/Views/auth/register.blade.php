@extends ('base')


@section ('content')




<div class="row mt-3">
    <div class="col-sm-12">
        <form action="userregister" method="post" class="form-signin">
            <h1 class="lead h3 mb-3 font-weight-normal">Registration form</h1>

            <label for="name" class="sr-only">Full name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Full name" required autofocus>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

            <label for="inputPassword2" class="sr-only">Confirm Password</label>
            <input type="password" id="inputPassword2" name="confirm_password" class="form-control" placeholder="Confirm Password" required>

            <button class="btn btn-sm btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</div>

@endsection