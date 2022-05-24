<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>
<br>
<?php if($comment ->exists): ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    ID: <?php echo e($comment ->id); ?>

                </div>
            </div>
        </div>
    </div>
    <br>
   
    </div>
    <br>
<?php endif; ?>
<?php /**PATH D:\OpenServer\domains\comments_test\resources\views/blog/post/includes/post_edit_add_col.blade.php ENDPATH**/ ?>