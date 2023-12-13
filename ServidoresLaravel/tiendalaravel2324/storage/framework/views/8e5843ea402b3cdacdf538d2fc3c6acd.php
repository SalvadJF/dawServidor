<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container mx-auto">
        <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
            <table class="mx-auto text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th scope="col" class="py-3 px-6">Descripción</th>
                    <th scope="col" class="py-3 px-6">Cantidad</th>
                    <th scope="col" class="py-3 px-6">Precio</th>
                    <th scope="col" class="py-3 px-6">Importe</th>
                </thead>
                <tbody>
                    <?php
                    $total = 0
                    ?>

                    <?php $__currentLoopData = $carrito->getLineas(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $articulo = $linea->getArticulo();
                        $cantidad = $linea->getCantidad();
                        $precio = $articulo->precio;
                        $importe = $cantidad * $precio;
                        $total += $importe;
                        ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6"><?php echo e($articulo->denominacion); ?></td>
                            <td class="py-4 px-6 text-center"><?php echo e($cantidad); ?></td>
                            <td class="py-4 px-6 text-center">
                                <?php echo e(dinero($precio)); ?>

                            </td>
                            <td class="py-4 px-6 text-center">
                                <?php echo e(dinero($importe)); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <td colspan="2"></td>
                    <td class="text-center font-semibold">TOTAL:</td>
                    <td class="text-center font-semibold"><?php echo e(dinero($total)); ?></td>
                </tfoot>
            </table>
            <form action="<?php echo e(route('realizar_compra')); ?>" method="POST" class="mx-auto flex mt-4">
                <?php echo csrf_field(); ?>
                <button type="submit" href="" class="mx-auto focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Realizar pedido</button>
            </form>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/sjimenez/Escritorio/Eservidor/tiendalaravel2324/resources/views/comprar.blade.php ENDPATH**/ ?>