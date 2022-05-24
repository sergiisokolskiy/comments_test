<?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <article>

        <a href="<?php echo e(route('blog.posts.show', $item->id )); ?>">
            <h1><?php echo e($item->title); ?></h1>
        </a>

        <p><?php echo e($item->content_raw); ?></p>
        <i>Дата создания: <?php echo e($item->created_at); ?></i>

    </article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p>Здесь пока ничего нет.</p>
    <?php endif; ?>
    <?php echo csrf_field(); ?>
    </posts>
<?php /**PATH D:\OpenServer\domains\comments_test\resources\views/post_list.blade.php ENDPATH**/ ?>