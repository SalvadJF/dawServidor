<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="relative overflow-x-auto w-full h-full">
        <table class="w-full h-full text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-7 py-3">
                        <a href="<?php echo e(route('articulos.index', ['order' => 'denominacion', 'direccion' => order_direccion($order == 'denominacion', $direccion)])); ?>" class="text-blue-500 hover:text-blue-700 font-semibold cursor-pointer">
                            Nombre Artículo <?php echo e(flechas($order == 'denominacion', $direccion)); ?>


                        </a>
                    </th>
                    <th scope="col" class="px-7 py-3">
                        <a href="<?php echo e(route('articulos.index', ['order' => 'precio', 'direccion' => order_direccion($order == 'precio', $direccion)])); ?>" class="text-blue-500 hover:text-blue-700 font-semibold cursor-pointer">
                            Precio <?php echo e(flechas($order == 'precio', $direccion)); ?>

                        </a>
                    </th>
                    <th scope="col" class="px-7 py-3">
                        Iva
                    </th>
                    <th scope="col" class="px-7 py-3">
                        Precio I.I.
                    </th>
                    <th scope="col" class="px-7 py-3]">
                        Categoría
                    </th>
                    <th scope="col" class="px-7 py-3" colspan="2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $denominacion = session('denominacion');
                ?>
                <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $articulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="<?php echo e(session()->has('exito') && isset($denominacion) && $denominacion == $articulo->denominacion ? 'bg-green-100' : ''); ?>">
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <?php echo e(truncar($articulo->denominacion)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <?php echo e(dinero($articulo->precio)); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500" title="<?php echo e($articulo->iva->tipo); ?>">
                            <?php echo e(" {$articulo->iva->por}%"); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <?php echo e($articulo->precio_ii . ' €'); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                                <?php echo e($articulo->categoria->nombre); ?>

                                                    </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <a href="<?php echo e(route('articulos.edit', ['articulo' => $articulo])); ?>">
                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-blue-500']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-blue-500']); ?>
                                    Editar
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-normal text-sm text-gray-500">
                            <form method="post" action="<?php echo e(route('articulos.destroy', ['articulo' => $articulo])); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-red-700']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-red-700']); ?>
                                    Borrar
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="<?php echo e(route('articulos.create')); ?>" method="get">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-green-700 m-4']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-green-700 m-4']); ?>Crear nuevo artículo <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </form>
    </div>
    <?php echo e($articulos->links()); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/sjimenez/Escritorio/Eservidor/ServidoresLaravel/tiendalaravel2324/resources/views/articulos/index.blade.php ENDPATH**/ ?>