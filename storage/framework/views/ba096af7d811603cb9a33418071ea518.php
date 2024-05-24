<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="title">
        ESTRUCTURA REGIONAL DE LA SECCIÓN 56 DEN SNTE
        <h5>
            COMITÉS EJECUTIVOS DELEGACIONALES Y REPRESENTANTES DE CENTROS DE TRABAJO
        </h5>      
    </div>   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php $__currentLoopData = $regiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <?php if (isset($component)) { $__componentOriginal7c3231cc43010e9ecc8859a1737622a7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c3231cc43010e9ecc8859a1737622a7 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\InfoBox::resolve(['title' => ''.e($region->delegaciones_count).' Delegaciones','text' => ''.e($region->region).' - '.e($region->sede).'','icon' => 'fas fa-lg fa-users text-orange','theme' => 'gradient-success','iconTheme' => 'white','url' => ''.e(route('region.show', $region)).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-info-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\InfoBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url-text' => 'Ver todas las delegaciones']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c3231cc43010e9ecc8859a1737622a7)): ?>
<?php $attributes = $__attributesOriginal7c3231cc43010e9ecc8859a1737622a7; ?>
<?php unset($__attributesOriginal7c3231cc43010e9ecc8859a1737622a7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c3231cc43010e9ecc8859a1737622a7)): ?>
<?php $component = $__componentOriginal7c3231cc43010e9ecc8859a1737622a7; ?>
<?php unset($__componentOriginal7c3231cc43010e9ecc8859a1737622a7); ?>
<?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script> console.log('Hi!'); </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delegaciones\resources\views/dashboard.blade.php ENDPATH**/ ?>