<?php
    /** @var \App\Models\Comment $comment  */

?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if($comment ->is_published): ?>
                    Опубликовано
                <?php else: ?>
                    Черновик
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="card-title">         </div>
                <div class="card-subtitle mb-2 text-muted"> </div>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                                <label for="content_raw">Ваш комментарий:</label>
                                <textarea name="content_raw"
                                    id="content_raw"
                                    class="form-control"
                                    rows="5"> <?php echo e(old('content', $comment->content)); ?>

                                </textarea>
                        </div>
                        

                        <div class="form-group">
                            <input name="post_id"
                                   type="hidden"
                                   value="<?php echo e($comment->post_id); ?>"
                                   id="post_id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <input name="parent_id"
                                   type="hidden"
                                   value="<?php echo e($comment->parent_id); ?>"
                                   id="parent_id"
                                   class="form-control">
                        </div>
                    </div>


                        <div class="form-check">
                                <input name="is_published"
                                       type="hidden"
                                       value="0">

                                <input name="is_published"
                                       type="checkbox"
                                       class="form-check-input"
                                       value="1"

                                    <?php if($comment ->is_published): ?>
                                       checked="checked"
                                    <?php endif; ?>
                                >
                                <label class="form-check-label" for="is_published"> Опубликовано </label>

                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/post/includes/post_edit_main_col.blade.php ENDPATH**/ ?>