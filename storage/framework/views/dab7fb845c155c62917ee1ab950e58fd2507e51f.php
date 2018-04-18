<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">ADD Post</div>
                    <div class="panel-heading"><a href="<?php echo e(url('/all-post')); ?>">All Post</a></div>

                    <div class="panel-body">
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success text-center">
                                <?php echo e(session()->get('success')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="post"

                              <?php if(isset($post)): ?>action="<?php echo e(url('/update-post/'.$post->id)); ?>"
                              <?php else: ?> action="<?php echo e(url('/store-post')); ?>"
                            <?php endif; ?>
                        >
                            <?php echo e(csrf_field()); ?>

                            <div class=" col-md-6">
                                <div class="form-group <?php echo e($errors->has('text') ? ' has-error' : ''); ?>">
                                    <label for="text">text 1 *</label>
                                    <input type="text" id="text" name="text"
                                           <?php if(isset($post)): ?> value="<?php echo e($post->test); ?>"
                                           <?php else: ?> value="<?php echo e(old('text')); ?>"
                                           <?php endif; ?> class="form-control" required="">
                                    <?php if($errors->has('text')): ?>
                                        <span class="help-block">
                                                      <small class="text-danger"><?php echo e($errors->first('text')); ?></small>
                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username">Submit BTN*</label>
                                    <input type="submit" class="form-control btn-primary" value="Submit">
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>