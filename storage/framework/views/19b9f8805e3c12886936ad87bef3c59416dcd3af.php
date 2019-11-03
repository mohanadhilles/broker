<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full font-sans antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1280">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(\Laravel\Nova\Nova::name()); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('app.css', 'vendor/nova')); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('icons/apple-icon-57x57.png')); ?>">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('icons/apple-icon-60x60.png')); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('icons/apple-icon-72x72.png')); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('icons/apple-icon-76x76.png')); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('icons/apple-icon-114x114.png')); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('icons/apple-icon-120x120.png')); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('icons/apple-icon-144x144.png')); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('icons/apple-icon-152x152.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('icons/apple-icon-180x180.png')); ?>">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(asset('icons/android-icon-192x192.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('icons/favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('icons/favicon-96x96.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('icons/favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('icons/manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(asset('icons/ms-icon-144x144.png')); ?>">
    <meta name="theme-color" content="#ffffff">



    <!-- Tool Styles -->
    <?php $__currentLoopData = \Laravel\Nova\Nova::availableStyles(request()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="/nova-api/styles/<?php echo e($name); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Custom Meta Data -->
    <?php echo $__env->make('nova::partials.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="min-w-site bg-40 text-black min-h-full">
    <div id="nova">
        <div v-cloak class="flex min-h-screen">
            <!-- Sidebar -->
            <div class="min-h-screen flex-none pt-header min-h-screen w-sidebar bg-grad-sidebar px-6">
                <a href="<?php echo e(\Laravel\Nova\Nova::path()); ?>">
                    <div class="absolute pin-t pin-l pin-r bg-logo flex items-center w-sidebar h-header px-6 text-white">
                       <?php echo $__env->make('nova::partials.logo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </a>

                <?php $__currentLoopData = \Laravel\Nova\Nova::availableTools(request()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tool): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $tool->renderNavigation(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Content -->
            <div class="content">
                <div class="flex items-center relative shadow h-header bg-white z-20 px-6">
                    <a v-if="'<?php echo e(\Laravel\Nova\Nova::name()); ?>'" href="<?php echo e(\Illuminate\Support\Facades\Config::get('nova.url')); ?>" class="no-underline dim font-bold text-90 mr-6">
                        <?php echo e(\Laravel\Nova\Nova::name()); ?>

                    </a>

                    <?php if(count(\Laravel\Nova\Nova::globallySearchableResources(request())) > 0): ?>
                        <global-search></global-search>
                    <?php endif; ?>

                    <dropdown class="ml-auto h-9 flex items-center dropdown-right">
                        <?php echo $__env->make('nova::partials.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </dropdown>
                </div>

                <div data-testid="content" class="px-view py-view mx-auto">
                    <?php echo $__env->yieldContent('Content'); ?>

                    <?php echo $__env->make('nova::partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.config = <?php echo json_encode(\Laravel\Nova\Nova::jsonVariables(request()), 15, 512) ?>;
    </script>

    <!-- Scripts -->
    <script src="<?php echo e(mix('manifest.js', 'vendor/nova')); ?>"></script>
    <script src="<?php echo e(mix('vendor.js', 'vendor/nova')); ?>"></script>
    <script src="<?php echo e(mix('app.js', 'vendor/nova')); ?>"></script>

    <!-- Build Nova Instance -->
    <script>
        window.Nova = new CreateNova(config)
    </script>

    <!-- Tool Scripts -->
    <?php $__currentLoopData = \Laravel\Nova\Nova::availableScripts(request()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(\Illuminate\Support\Str::startsWith($path, ['http://', 'https://'])): ?>
            <script src="<?php echo $path; ?>"></script>
        <?php else: ?>
            <script src="/nova-api/scripts/<?php echo e($name); ?>"></script>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Start Nova -->
    <script>
        Nova.liftOff()
    </script>
</body>
</html>
<?php /**PATH /Users/mohanad/Documents/GitHub/broker/nova/src/../resources/views/layout.blade.php ENDPATH**/ ?>