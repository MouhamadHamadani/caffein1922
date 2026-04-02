<footer class="bg-[#3B1E0E] text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div>
                <h3 class="text-2xl font-bold mb-4">CAFFEINE 1922</h3>
                <p class="text-gray-300 mb-4"><?php echo e(\App\Models\Setting::get('tagline_' . app()->getLocale())); ?></p>
                <p class="text-gray-400 text-sm">Roasted with passion since 1922. Born in the heart of Beirut.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="<?php echo e(route('home')); ?>" class="text-gray-300 hover:text-[#C8922A] transition"><?php echo e(__('site.nav.home')); ?></a></li>
                    <li><a href="<?php echo e(route('menu')); ?>" class="text-gray-300 hover:text-[#C8922A] transition"><?php echo e(__('site.nav.menu')); ?></a></li>
                    <li><a href="<?php echo e(route('about')); ?>" class="text-gray-300 hover:text-[#C8922A] transition"><?php echo e(__('site.nav.about')); ?></a></li>
                    <li><a href="<?php echo e(route('reserve')); ?>" class="text-gray-300 hover:text-[#C8922A] transition"><?php echo e(__('site.nav.reserve')); ?></a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                <ul class="space-y-2 text-gray-300">
                    <li>Phone: <?php echo e(\App\Models\Setting::get('phone')); ?></li>
                    <li>Address: <?php echo e(\App\Models\Setting::get('address_' . app()->getLocale())); ?></li>
                    <li class="whitespace-pre-line">Hours: <?php echo e(\App\Models\Setting::get('hours_' . app()->getLocale())); ?></li>
                </ul>
                <div class="mt-6 flex space-x-4 rtl:space-x-reverse">
                    <a href="<?php echo e(\App\Models\Setting::get('facebook')); ?>" class="text-gray-300 hover:text-[#C8922A] transition">Facebook</a>
                    <a href="<?php echo e(\App\Models\Setting::get('instagram')); ?>" class="text-gray-300 hover:text-[#C8922A] transition">Instagram</a>
                </div>
            </div>
        </div>
        <div class="mt-12 pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
            <p>© <?php echo e(date('Y')); ?> Caffeine 1922. All rights reserved.</p>
        </div>
    </div>
</footer>
<?php /**PATH C:\wamp64\www\BuildSyntax\caffeine1922\resources\views/components/footer.blade.php ENDPATH**/ ?>