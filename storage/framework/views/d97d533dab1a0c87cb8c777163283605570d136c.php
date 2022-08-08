<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('dashboard.blog.create')); ?>" class="btn btn-primary">Add post</a>
<table class="table table-light my-2">
    <thead>
      <tr>
        <th scope="col">№</th>
        <th scope="col">Thumb</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Author</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($posts->firstItem() + $loop->index); ?></th>
            <td><img width="90" src="<?php echo e(url('storage/images/post_images/'.$post->image)); ?>" alt="Post Image"></td>
            <td><?php echo e($post->title); ?></td>
            <td><?php echo e($post->desc); ?></td>
            <td><?php echo e($post->author->name.' '.$post->author->surname); ?></td>
            <td>
                <a href="<?php echo e(route('dashboard.blog.show',$post->id)); ?>" class="btn btn-info">Info</a>
                <a href="<?php echo e(route('dashboard.blog.edit',$post->id)); ?>" class="btn btn-primary">Edit</a>
                <form id="del-form" action="<?php echo e(route('dashboard.blog.destroy', $post->id)); ?>" method="post" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <a onclick="document.querySelector('#del-form').submit()" class="btn btn-danger">Delete</a>
                </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    <?php echo e($posts->links()); ?>

</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\jamil\Code\TestCapital\resources\views/blog/index.blade.php ENDPATH**/ ?>