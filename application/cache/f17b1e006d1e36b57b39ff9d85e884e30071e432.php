<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MINI</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="<?php echo e(URL); ?>/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">MINI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
                <?php if(\App\Models\User::isLogged()): ?>
                    <a class="nav-item nav-link" href="<?php echo e(route('songs')); ?>">Songs</a>
                    
                    <a class="nav-item nav-link" href="<?php echo e(URL); ?>logout">Logout</a>
                <?php else: ?>
                    <a class="nav-item nav-link" href="login">Login</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</div>

<div class="container">
    <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <?php echo e($_SESSION['message']); ?>

        </div>
    <?php elseif(isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo e($_SESSION['message']); ?>

        </div>
    <?php else: ?>
    <?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>
</div>




<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>


<script>
    var url = "<?php echo e(URL); ?>";
</script>
<!--<script src="https:w Plyr('#player');</script>-->
<script src="<?php echo e(URL); ?>/js/application.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>