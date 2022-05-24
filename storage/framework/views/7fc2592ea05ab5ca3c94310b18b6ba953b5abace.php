<?php $__env->startSection('content'); ?>

    <?php /** @var  \App\Models\Comment $comment */  ?>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="<?php echo e(route('api.blog.posts.index')); ?>"><h2>Главная</h2></a>
                </nav>
            </div>
        </div>

        <?php echo $__env->make('blog.post.includes.result_messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($comment->exists): ?>
            <form method="POST" action="">
            <?php echo method_field('PATCH'); ?>
        <?php else: ?>
            <form method="POST" action="<?php echo e(route('api.blog.comments.store')); ?>">
        <?php endif; ?>

        <?php echo csrf_field(); ?>

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <?php echo $__env->make('blog.post.includes.post_edit_main_col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
            </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/post/edit.blade.php ENDPATH**/ ?>