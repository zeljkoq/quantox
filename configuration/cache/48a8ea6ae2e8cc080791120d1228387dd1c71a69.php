<?php $__env->startSection('content'); ?>

<div class="row mt-3">
    <div class="col-sm-12">
        <form action="userlogin" method="get" class="form-signin">
            <h1 class="lead h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-sm btn-primary btn-block" type="submit">Sign in</button>
            <small><a href="register">Register?</a></small>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>