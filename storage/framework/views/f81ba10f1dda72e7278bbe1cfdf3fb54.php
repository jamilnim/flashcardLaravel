<?php $__env->startSection('title', 'Name Manager'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <h2>Enter Name and Color</h2>

  <?php if(session('success')): ?>
    <div class="message success"><?php echo e(session('success')); ?></div>
  <?php endif; ?>
  <?php if(session('error')): ?>
    <div class="message error"><?php echo e(session('error')); ?></div>
  <?php endif; ?>

  <form action="<?php echo e(isset($edit_id) ? route('name.update', $edit_id) : route('name.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php if(isset($edit_id)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?php echo e(old('name', $edit_name ?? '')); ?>">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-text"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <label for="color">Color</label>
    <input type="text" name="color" id="color" value="<?php echo e(old('color', $edit_color ?? '')); ?>">
    <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="error-text"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <label for="category">Category</label>
    <select name="category" id="category">
      <option value="personal">Personal</option>
      <option value="work">Work</option>
      <option value="hobby">Hobby</option>
    </select>

    <button type="submit"><?php echo e(isset($edit_id) ? 'Update' : 'Submit'); ?></button>
  </form>

  <?php if(!empty($names)): ?>
  <h3>Stored Names</h3>
  <ul>
    <?php $__currentLoopData = $names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
      <span style="color: <?php echo e($entry['color']); ?>"><?php echo e($entry['name']); ?></span>
      <span style="color: <?php echo e($entry['color']); ?>"><?php echo e($entry['category']); ?></span>
      <div>
        <a href="<?php echo e(route('name.edit', $index)); ?>">Edit</a>
        <form action="<?php echo e(route('name.destroy', $index)); ?>" method="POST" style="display:inline;">
          <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
          <button type="submit" class="delete-btn">Delete</button>
        </form>
      </div>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.name-layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/s2500148/Herd/NameApp/resources/views/name.blade.php ENDPATH**/ ?>