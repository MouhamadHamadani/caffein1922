<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-[#FDF6EC] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold text-[#3B1E0E] tracking-wider">
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="h-20 w-auto inline-block mr-2">
                    
                </a>
            </div>
            <div class="hidden md:flex items-center gap-8 rtl:space-x-reverse">
                <a href="<?php echo e(route('home')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.home')); ?></a>
                <a href="<?php echo e(route('menu')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.menu')); ?></a>
                <a href="<?php echo e(route('about')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.about')); ?></a>
                <a href="<?php echo e(route('gallery')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.gallery')); ?></a>
                <a href="<?php echo e(route('reserve')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.reserve')); ?></a>
                <a href="<?php echo e(route('blog')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.blog')); ?></a>
                <a href="<?php echo e(route('contact')); ?>" class="text-[#3B1E0E] hover:text-[#C8922A] transition"><?php echo e(__('site.nav.contact')); ?></a>
                
                <div class="flex items-center border-l border-gray-300 pl-4 rtl:border-l-0 rtl:border-r rtl:pl-0 rtl:pr-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'en'): ?>
                        <a href="<?php echo e(route('lang.switch', 'ar')); ?>" class="text-sm font-medium text-[#3B1E0E]">AR</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('lang.switch', 'en')); ?>" class="text-sm font-medium text-[#3B1E0E]">EN</a>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-[#3B1E0E]">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div x-show="open" class="md:hidden bg-[#FDF6EC] border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="<?php echo e(route('home')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.home')); ?></a>
            <a href="<?php echo e(route('menu')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.menu')); ?></a>
            <a href="<?php echo e(route('about')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.about')); ?></a>
            <a href="<?php echo e(route('gallery')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.gallery')); ?></a>
            <a href="<?php echo e(route('reserve')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.reserve')); ?></a>
            <a href="<?php echo e(route('blog')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.blog')); ?></a>
            <a href="<?php echo e(route('contact')); ?>" class="block px-3 py-2 text-[#3B1E0E]"><?php echo e(__('site.nav.contact')); ?></a>
            <div class="px-3 py-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'en'): ?>
                    <a href="<?php echo e(route('lang.switch', 'ar')); ?>" class="text-[#3B1E0E] font-bold">العربية</a>
                <?php else: ?>
                    <a href="<?php echo e(route('lang.switch', 'en')); ?>" class="text-[#3B1E0E] font-bold">English</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<?php /**PATH C:\wamp64\www\BuildSyntax\caffeine1922\resources\views/components/navbar.blade.php ENDPATH**/ ?>