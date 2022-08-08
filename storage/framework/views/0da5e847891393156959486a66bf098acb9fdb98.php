<?php $__env->startSection('content'); ?>
    <div class="card col-lg-6 col-md-12 m-auto">
        <div class="card-header">
            <?php echo e($post->title); ?>

        </div>
        <img class="card-img-top" width="200" src="<?php echo e(url('storage/images/post_images/'.$post->image)); ?>" alt="Post image">
        <div class="card-body">
            <h4 class="card-title"><?php echo e($post->title); ?></h4>
            <p class="card-text"><?php echo e($post->desc); ?></p>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <em><i class="fas fa-pencil"></i> <?php echo e($post->author->name.' '.$post->author->surname); ?></em>
            <em><i class="fas fa-calendar"></i> <?php echo e(Carbon\Carbon::parse($post->created_at)->format('d.m.Y, H:i:s')); ?></em>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jamil\Code\TestCapital\resources\views/blog/show.blade.php ENDPATH**/ ?>