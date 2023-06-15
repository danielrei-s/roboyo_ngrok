<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="<?php echo e(url('/')); ?>" class="app-brand-link">
      <span class="app-brand-logo demo">
        <img src="<?php echo e(asset('assets/img/icons/brands/roboyo_R_12.jpg')); ?>">
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2"><?php echo e(config('variables.templateName')); ?></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-autod-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <?php $__currentLoopData = $menuData[0]->menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Menus defined in verticalMenu.json! -->

    
    

    <?php if(isset($menu->menuHeader)): ?>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text"><?php echo e($menu->menuHeader); ?></span>
    </li>

    <?php else: ?>
      <?php if(!Auth::check() && in_array($loop->iteration, [1, 2, 3, 4])): ?>
        <?php continue; ?> 
      <?php endif; ?>
      <?php if(Auth::check()): ?>
        <?php if(auth()->user()->admin == 1 && in_array($loop->iteration, [2])): ?>
          <?php continue; ?> 
        <?php elseif(!(auth()->user()->admin == 2) && !(auth()->user()->admin == 1) && in_array($loop->iteration, [2, 3])): ?>
          <?php continue; ?> 
        <?php endif; ?>
      <?php endif; ?>

    
    <?php
    $activeClass = null;
    $currentRouteName = Route::currentRouteName();

    if ($currentRouteName === $menu->slug) {
      $activeClass = 'active';
    }
    elseif (isset($menu->submenu)) {
      if (gettype($menu->slug) === 'array') {
        foreach($menu->slug as $slug){
          if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
            $activeClass = 'active open';
          }
        }
      }
      else{
        if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
          $activeClass = 'active open';
        }
      }
    }
    ?>

    
    <li class="menu-item <?php echo e($activeClass); ?>">
      <a href="<?php echo e(isset($menu->url) ? url($menu->url) : 'javascript:void(0);'); ?>" class="<?php echo e(isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link'); ?>" <?php if(isset($menu->target) and !empty($menu->target)): ?> target="_blank" <?php endif; ?>>
        <?php if(isset($menu->icon)): ?>
          <i class="<?php echo e($menu->icon); ?>"></i>
        <?php endif; ?>
        <div><?php echo e(isset($menu->name) ? __($menu->name) : ''); ?></div>
      </a>

      
      <?php if(isset($menu->submenu)): ?>
      <?php echo $__env->make('layouts.sections.menu.submenu',['menu' => $menu->submenu], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
    </li>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>

</aside>
<?php /**PATH C:\Users\DanielOliveira\Desktop\Roboyo\roboyo_pentest_report_tool\resources\views/layouts/sections/menu/verticalMenu.blade.php ENDPATH**/ ?>