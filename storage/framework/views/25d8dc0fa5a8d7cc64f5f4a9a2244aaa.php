<?php $__env->startSection('content'); ?>
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-[#3B1E0E] mb-4">Our Menu</h1>
                <p class="text-[#8B6347] italic">Handcrafted with passion, served with love.</p>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-20">
                    <div class="flex items-center mb-8">
                        <h2 class="text-3xl font-bold text-[#3B1E0E] whitespace-nowrap"><?php echo e($category->translated_name); ?></h2>
                        <div class="ml-6 rtl:ml-0 rtl:mr-6 flex-grow border-t-2 border-[#F0E0C8]"></div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $category->menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex justify-between items-start group">
                                <div class="flex-grow">
                                    <div class="flex items-center">
                                        <h3 class="text-xl font-bold text-[#3B1E0E] group-hover:text-[#C8922A] transition"><?php echo e($item->translated_name); ?></h3>
                                        <div class="mx-2 flex-grow border-b border-dotted border-gray-300"></div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1"><?php echo e($item->translated_description); ?></p>
                                </div>
                                <div class="ml-4 rtl:ml-0 rtl:mr-4 text-lg font-bold text-[#3B1E0E]">
                                    <?php echo e($item->price); ?> <?php echo e($item->currency); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\BuildSyntax\caffeine1922\resources\views/menu/index.blade.php ENDPATH**/ ?>