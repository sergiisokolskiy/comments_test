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
                            <li id="li-comment-<?php echo e($comment->id); ?>" class="comment">
                                <div id="comment-<?php echo e($comment->id); ?>" class="comment-container">
                                    <div class="comment-meta commentmetadata">
                                        <div class="intro">
                                            <div class="commentDate">
                                                <?php echo e(is_object($comment->created_at) ? $comment->created_at->format('d.m.Y в H:i') : ''); ?>

                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>
                                                <a href='<?php echo e(route('api.blog.comments.show', ['post'=>$comment->post_id,'comment' => $comment->id])); ?>'>
                                                    ID: <?php echo e($comment->id); ?> </a></p>
                                            <span class="border border-2"> <?php echo e($comment->content); ?> </span>
                                            <p> Parent_id:<?php echo e($comment->parent_id); ?></p>


                                            
                                        </div>


                                        <ul class="nav justify-content-lg-start">
                                            <li class="nav-item">

                                                
                                                <form method="GET" action="">
                                                    <?php echo csrf_field(); ?>

                                                    

                                                    <button type="submit" class="btn btn-link">Ответить</button>

                                                </form>
                                            </li>

                                            
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   href="">
                                                    Редактировать</a>
                                            </li>


                                            
                                            <li class="nav-item">
                                                

                                            </li>

                                        </ul>

                                    </div>
                                </div>

                                

                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/comments/form.blade.php ENDPATH**/ ?>