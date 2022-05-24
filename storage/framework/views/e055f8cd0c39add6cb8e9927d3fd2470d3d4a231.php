<!doctype html>

<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        article:not(:last-child) {
            padding-bottom: 10px;
            border-bottom: 2px dotted orange;
        }
    </style>
</head>
<body>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="<?php echo e(route('api.blog.posts.index')); ?>"><h2>Главная</h2></a>
                </nav>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <form method="GET" action="">

                                <?php echo csrf_field(); ?>

                                  
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Новый комментарий</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <br>
                    <?php /** @var  \App\Models\Comment $comments */  ?>

                    <posts>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <article>

                               <p> ID: <?php echo e($val->id); ?></p>
                                <p> Parent_Id: <?php echo e($val->parent_id); ?></p>

                                <p> <?php echo e($val->content); ?> </p>

                                <i>Дата создания: <?php echo e($val->created_at); ?></i>


                                <?php $__empty_1 = true; $__currentLoopData = $val->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php echo $__env->make('blog.comments.comment', ['item' => $item], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <?php endif; ?>




                                <br>
                            

                            </article>
                       
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php echo csrf_field(); ?>
                    </posts>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/comments/list.blade.php ENDPATH**/ ?>