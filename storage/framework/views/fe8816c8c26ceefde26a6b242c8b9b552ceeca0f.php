<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                       <li id="li-comment-<?php echo e($item->id); ?>" class="comment">
                            <div id="comment-<?php echo e($item->id); ?>" class="comment-container">
                                <div class="comment-meta commentmetadata">
                                    <div class="intro">
                                        <div class="commentDate">
                                            <?php echo e(is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''); ?>

                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p><a href='<?php echo e(route('api.blog.comments.show', ['post'=>$item->post_id,'comment' => $item->id])); ?>'> ID: <?php echo e($item->id); ?> </a></p>
                                        <span class="border border-2"> <?php echo e($item->content); ?> </span>
                                        <p> Parent_id:<?php echo e($item->parent_id); ?></p>


                                    
                                    </div>


                                    <ul class="nav justify-content-lg-start">
                                        <li class="nav-item">

                                    
                                    <form method="GET" action="">
                                        <?php echo csrf_field(); ?>

                                      

                                        <button type="submit" class="btn btn-link">Ответить</button>

                                    </form>
                                        </li>

                                        
                                        <li class="nav-item">
                                        <a class="nav-link active" href=""> Редактировать</a>
                                        </li>


                                        
                                        <li class="nav-item">
                                            

                                        </li>

                                    </ul>

                                </div>
                            </div>

                         <?php if(isset($item->children)): ?>
                               <ul>
                                   <?php echo $__env->make('blog.comments.comment',['comments' => $item->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                               </ul>
                         <?php endif; ?>

                       </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/comments/comment.blade.php ENDPATH**/ ?>