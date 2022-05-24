<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><h3>Заголовок</h3></th>
                                <th>Дата публикации:</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <a href="<?php echo e(route('api.blog.posts.show', $item->id )); ?>">
                                        <h3><?php echo e($item->title); ?></h3>
                                     </a>
                                </td>
                                <td>
                                    <i><?php echo e($item->created_at); ?></i>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/post/post_list.blade.php ENDPATH**/ ?>