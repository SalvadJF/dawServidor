<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="relative overflow-x-auto w-auto mx-8 mshadow-md sm:rounded-lg bg-slate-300">
        <?php if($articulo->existeImagen()): ?>
            <img class="flex-1 w-1/10 m-auto mt-2 rounded-xl" src="<?php echo e(asset($articulo->imagen_url)); ?>" />
        <?php endif; ?>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Nombre :</i> <?php echo e(truncar($articulo->denominacion)); ?></p>


        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Precio :</i> <?php echo e(dinero($articulo->precio)); ?></p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">IVA :</i> <?php echo e($articulo->iva->por . ' %'); ?></p>

        <p class="font-black text-5xl text-center m-auto pt-3"><i class="text-red-500	color: rgb(239 68 68);">Total :</i> <?php echo e(dinero($articulo->precio_ii)); ?></p>


        <a href="<?php echo e(route('articulos.cambiar_imagen', ['articulo' => $articulo])); ?>"
            class="m-auto font-medium text-blue-600 dark:text-blue-500 hover:underline flex justify-center items-center mt-2 mb-2">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                Cambiar imagen
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </a>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /home/sjimenez/Escritorio/Eservidor/ServidoresLaravel/tiendalaravel2324/resources/views/articulos/show.blade.php ENDPATH**/ ?>