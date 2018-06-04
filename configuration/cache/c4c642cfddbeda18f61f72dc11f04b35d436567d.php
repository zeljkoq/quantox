<?php $__env->startSection('content'); ?>

<div id="home" class="row mt-3">
    <div class="col-sm-12">
        <div class="jumbotron">
            <h1 class="display-4">MINI</h1>
            <p class="lead">You are in the View: application/view/home/index.php (everything in the box comes from this file)</p>
            <hr class="my-4">
            <p>In a real application this could be the homepage.</p>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $('#songsListAdd').click(function() {
            // var artist = $('#artist').val();
            // var track = $('#track').va();
            // var link = $('#link').val();
            $.ajax({
                type: "post",
                url: '<?php echo e(route('songs')); ?>',
                success: function(response) {
                    $("#songsTable").load(" #songsTable");
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>