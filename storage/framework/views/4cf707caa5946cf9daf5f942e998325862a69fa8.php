<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="<?php echo e(route('api.blog.posts.index')); ?>"><h1>Главная</h1></a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <?php /**@var \App\Models\Post $posts */ ?>
                                <?php echo csrf_field(); ?>
                            <thead>
                                <tr>
                                   <h1> <b> <?php echo e($posts->title); ?> </b></h1>
                                </tr>
                            </thead>
                                <tr>
                                   <?php echo e($posts->content); ?>

                                </tr>
                                <tr>
                                    <td>
                                       <i> Дата публикации: </i><?php echo e($posts->created_at->format('d.m.Y в H:i')); ?>

                                    </td>
                                    <td>
                                        <i>Автор:</i> Имя Пользователя
                                    </td>
                                </tr>
                                <tr>
                        </table>
                        <h5><i> Посмотреть <a href="<?php echo e(route('api.blog.comments.index', $posts->id)); ?>">комментарии</a></i>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/post/index.blade.php ENDPATH**/ ?>