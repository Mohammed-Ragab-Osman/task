<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All Post</div>
                    <div class="panel-heading"><a href="<?php echo e(url('/add-post')); ?>">Add Post</a></div>
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success text-center">
                            <?php echo e(session()->get('success')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="panel-body">
                        <table class="table table-responsive">
                            <tr>
                                <th>User ID</th>
                                <th>Post 1</th>
                                <th>Delete</th>
                                <th>Edite</th>
                            </tr>


                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $postes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($postes->user_id); ?>

                                    </td>
                                    <td>
                                        <?php echo e($postes->test); ?>

                                    </td>

                                    <td>
                                        <a href="<?php echo e(url('/delete-post/'.$postes->id)); ?>">Delete</a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(url('/edite-post/'.$postes->id)); ?>">Edite</a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>