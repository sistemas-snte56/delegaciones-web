

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>ADMINISTRACIÓN DE REGIONES</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            Lista de <strong>Regiones</strong>
            <a href="<?php echo e(route('region.create')); ?>" class="btn btn-primary float-right"><i class="fa fa-sm fa-fw fa-pen"></i> Nuevo</a>
        </div>

        <div class="card-body">
            <div class="row">
                <?php $__currentLoopData = $regiones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-4">
                        <div class="card">
                            <?php if (isset($component)) { $__componentOriginal28a68399664384fcdb4ffafd23cbfe61 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal28a68399664384fcdb4ffafd23cbfe61 = $attributes; } ?>
<?php $component = JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::resolve(['title' => ''.e($region->region).' - '.e($region->sede).'','text' => ''.e($region->delegaciones_count).' Delegaciones','icon' => 'fa fa-users fa-2x text-white','theme' => 'secondary','url' => ''.e(route('region.show', $region)).'','urlText' => 'Ver todas las delegaciones'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('adminlte-small-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(JeroenNoten\LaravelAdminLte\View\Components\Widget\SmallBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal28a68399664384fcdb4ffafd23cbfe61)): ?>
<?php $attributes = $__attributesOriginal28a68399664384fcdb4ffafd23cbfe61; ?>
<?php unset($__attributesOriginal28a68399664384fcdb4ffafd23cbfe61); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal28a68399664384fcdb4ffafd23cbfe61)): ?>
<?php $component = $__componentOriginal28a68399664384fcdb4ffafd23cbfe61; ?>
<?php unset($__componentOriginal28a68399664384fcdb4ffafd23cbfe61); ?>
<?php endif; ?>
                                <!-- Botones adicionales -->
                                <div class="small-box-footer" style="margin-bottom: 6px; margin-left: 6px;" >
                                    
                                    <a href="<?php echo e(route('region.edit', $region)); ?>" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                </div>
                        </div>
                    </div>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="tota-delegaciones">
                Total Delegaciones: <?php echo e($regiones->sum('delegaciones_count')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            $('.formEliminar').submit(function(e) {
                e.preventDefault();

                Swal.fire({
                    title: "Estas seguro?",
                    text: "¡No podrás revertir esto!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, borrarlo!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });

            })
        });
    </script>

    <?php if(session('update')): ?>
        <script>
            $(document).ready(function(){
                let mensaje = "<?php echo e(session ('update')); ?>"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });
            });
        </script>
    <?php endif; ?>

    <?php if(session('delete')): ?>
        <script>
            $(document).ready(function(){
                let mensaje = "<?php echo e(session('delete')); ?>"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });

                // Swal.fire({
                //     title: '¿Estás seguro?',
                //     text: 'Eliminar esta región también eliminará todas las delegaciones asociadas. ¿Deseas continuar?',
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#d33',
                //     cancelButtonColor: '#3085d6',
                //     confirmButtonText: 'Sí, eliminar',
                //     cancelButtonText: 'Cancelar'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         // Realiza la acción de eliminación
                //         axios.delete(botonEliminar.href)
                //             .then(response => {
                //                 Swal.fire('Éxito', response.data.mensaje, 'success');
                //             })
                //             .catch(error => {
                //                 Swal.fire('Error', error.response.data.mensaje, 'error');
                //             });
                //     }
                // });                




            });
        </script>
    <?php endif; ?>    

    <?php if(session('error')): ?>
        <script>
            $(document).ready(function(){
                let mensaje = "<?php echo e(session('error')); ?>"
                Swal.fire({
                    icon: "error",
                    title: mensaje,
                    text: "Debido a que depende de otras delegaciones. "
                });
            });            
        </script>
    <?php endif; ?>



    <?php if(session('success')): ?>
        <script>
            $(document).ready(function(e){
                let mensaje = "<?php echo e(session('success')); ?>"
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: mensaje,
                    showConfirmButton: false,
                    timer: 1800
                });
            });
        </script>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\delegaciones\resources\views/config/regiones/index.blade.php ENDPATH**/ ?>