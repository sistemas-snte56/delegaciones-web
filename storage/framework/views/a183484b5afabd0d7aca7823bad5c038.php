

<?php $__env->startSection('title', $region->region); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="title">
        ESTRUCTURA REGIONAL DE LA SECCIÓN 56 DEN SNTE
        <h5>
            DELEGACIONES CORRESPONDIENTES A LA <?php echo e($region->region); ?> <?php echo e($region->sede); ?>

        </h5>      
    </div>    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3> <?php echo e($region->region); ?> | <?php echo e($region->sede); ?> </h3>
            <h5> <strong>COORDINADOR:</strong>&emsp;<?php echo e($region->coordinador); ?></h5>            

        </div>

        <div class="card-body">

            <?php
                $heads = [
                    'NO',
                    ['label' => 'DELEGACIÓN', 'width' => 5],
                    'NIVEL',
                    ['label' => 'SEDE', 'width' => 40],
                    ['label' => 'ACCIONES', 'no-export' => true, 'width' => 5],
                ];

                $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </button>';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </button>';
                $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </button>';

                $config = [
                    
                    'order' => [[1, 'asc']],
                    'columns' => [
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false], 
                        ['orderable' => false]
                    ],
                    'lengthMenu' => [50,100,500],
                    // 'paging' => false,
                    // 'lengthMenu' => false,
                    // 'searching' => false,
                    // 'info' => false,                    
                ];
            ?>

            
            <?php if (isset($component)) { $__componentOriginal1f0f987500f76b1f57bfad21f77af286 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal1f0f987500f76b1f57bfad21f77af286 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable::resolve(['id' => 'table1','heads' => $heads,'config' => $config,'striped' => true,'hoverable' => true] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php
                    $num_secuencial = 1;
                ?>
                




                <?php $__currentLoopData = $region->delegaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2>Delegación: <?php echo e($delegacion->nomenclatura->nomenclatura); ?><?php echo e($delegacion->num_delegaciona); ?> </h2>
                <ul>
                    <?php $__currentLoopData = $delegacion->maestros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maestro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>ID Secretaria: <?php echo e($maestro->id_secretaria); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal1f0f987500f76b1f57bfad21f77af286)): ?>
<?php $attributes = $__attributesOriginal1f0f987500f76b1f57bfad21f77af286; ?>
<?php unset($__attributesOriginal1f0f987500f76b1f57bfad21f77af286); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1f0f987500f76b1f57bfad21f77af286)): ?>
<?php $component = $__componentOriginal1f0f987500f76b1f57bfad21f77af286; ?>
<?php unset($__componentOriginal1f0f987500f76b1f57bfad21f77af286); ?>
<?php endif; ?>



            
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- <link rel="stylesheet" href="/css/miestilo.css"> -->
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delegaciones\resources\views/config/regiones/show.blade.php ENDPATH**/ ?>