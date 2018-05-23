<?php $__env->startSection('content'); ?>


<div class="row mt-4">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Add a song
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="/updatesong/<?php echo e($song->id); ?>" method="POST">
                        <div class="form-row">
                            <div class="col-4">
                                <input type="text" name="artist" class="form-control" placeholder="" value="<?php echo e($song->artist); ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="track" class="form-control" placeholder="" value="<?php echo e($song->track); ?>">
                            </div>
                            <div class="col">
                                <input type="text" name="link" class="form-control" placeholder="" value="<?php echo e($song->link); ?>">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit_update_song">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>