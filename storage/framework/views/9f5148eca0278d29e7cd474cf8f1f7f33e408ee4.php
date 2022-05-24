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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="maindata" role="tabpanel">
                               <form method="GET" action="">

                                    <?php echo csrf_field(); ?>

                                     <input name="post_id"
                                            type="hidden"
                                            value="<?php echo e($post_id); ?>"
                                            class="form-control">
                                     <input name="parent_id"
                                            type="hidden"
                                            value="<?php echo e($parent_id = NULL); ?>"
                                            class="form-control">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Новый комментарий</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <?php /** @var  \App\Models\Comment $comments */  ?>
                                <posts>
                                    <div id="comments">
                                        <ol>
                                            <?php if(isset($comments)): ?>
                                                    <?php echo $__env->make('blog.comments.comment', ['$comments' => $comments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <p>Здесь пока ничего нет.</p>
                                            <?php endif; ?>

                                            <?php echo csrf_field(); ?>
                                        </ol>
                                    </div>
                                </posts>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/comments/comments_block.blade.php ENDPATH**/ ?>