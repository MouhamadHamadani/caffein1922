<?php $__env->startSection('content'); ?>
    
    <section class="relative h-screen flex items-center justify-center bg-[#3B1E0E] bg-center overflow-hidden" style="background-image: url('<?php echo e(asset('images/hero-section.png')); ?>')">
        <div class="absolute inset-0 bg-black opacity-70"></div>
        <div class="relative z-10 text-center px-4" data-aos="fade-up">
            
            <img src="<?php echo e(asset('images/logo-2.png')); ?>" alt="<?php echo e(config('app.name')); ?>" class="mx-auto w-full">
            <p class="text-xl md:text-2xl text-[#F0E0C8] mb-8 italic"><?php echo e(\App\Models\Setting::get('tagline_' . app()->getLocale())); ?></p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="<?php echo e(route('menu')); ?>" class="bg-[#C8922A] text-white px-8 py-4 rounded-full font-bold hover:bg-[#B07D1E] transition"><?php echo e(__('site.cta.explore_menu')); ?></a>
                <a href="<?php echo e(route('reserve')); ?>" class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-bold hover:bg-white hover:text-[#3B1E0E] transition"><?php echo e(__('site.cta.reserve_table')); ?></a>
            </div>
        </div>
    </section>

    
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div data-aos="<?php echo e(app()->getLocale() === 'en' ? 'fade-right' : 'fade-left'); ?>">
                    <h2 class="text-4xl font-chamberi font-bold text-[#3B1E0E] mb-6">Our Story</h2>
                    <p class="text-lg text-[#8B6347] mb-6 leading-relaxed">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(app()->getLocale() === 'en'): ?>
                            Since 1922, Caffeine has been more than a coffee shop — it's a ritual. Born in the heart of Beirut, we roast every bean with the same devotion that has made us a neighborhood institution for over a century. Come for the coffee. Stay for the feeling.
                        <?php else: ?>
                            منذ عام ١٩٢٢، كانت كافيين أكثر من مجرد مقهى — إنها طقس يومي. وُلدنا في قلب بيروت، ونحمّص كل حبة قهوة بنفس الشغف الذي جعلنا جزءاً من نسيج الحي لأكثر من قرن. تعال من أجل القهوة. وابقَ من أجل الإحساس.
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </p>
                    <a href="<?php echo e(route('about')); ?>" class="text-[#C8922A] font-bold hover:underline"><?php echo e(__('site.cta.our_story')); ?> →</a>
                </div>
                <div class="bg-[#F0E0C8] bg-center bg-cover h-96 rounded-lg shadow-xl" style="background-image: url(<?php echo e(asset('images/story.png')); ?>)" data-aos="<?php echo e(app()->getLocale() === 'en' ? 'fade-left' : 'fade-right'); ?>">
                    
                    <div class="absolute bg-[#F0E0C8] inset-0 opacity-30"></div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-[#3B1E0E] py-12 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div data-aos="zoom-in">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2">100+</div>
                    <div class="text-sm uppercase tracking-widest">Years of Heritage</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="100">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2"><?php echo e(\App\Models\Setting::get('rating')); ?>★</div>
                    <div class="text-sm uppercase tracking-widest">Google Rating</div>
                </div>
                <div data-aos="zoom-in" data-aos-delay="200">
                    <div class="text-4xl font-bold text-[#C8922A] mb-2"><?php echo e(\App\Models\Setting::get('reviews_count')); ?>+</div>
                    <div class="text-sm uppercase tracking-widest">Happy Reviews</div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="py-20 bg-[#FDF6EC]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#3B1E0E]">Our Signature Drinks</h2>
            </div>
            <div class="swiper featured-swiper pb-12">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $featuredItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-xl transition">
                                <div class="h-64 bg-gray-200">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->hasMedia('image')): ?>
                                        <img src="<?php echo e($item->getFirstMediaUrl('image')); ?>" alt="<?php echo e($item->translated_name); ?>" class="w-full h-full object-cover">
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-[#3B1E0E] mb-2"><?php echo e($item->translated_name); ?></h3>
                                    <p class="text-[#C8922A] font-bold"><?php echo e($item->price); ?> <?php echo e($item->currency); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="text-center mt-8">
                <a href="<?php echo e(route('menu')); ?>" class="inline-block border-2 border-[#3B1E0E] text-[#3B1E0E] px-8 py-3 rounded-full font-bold hover:bg-[#3B1E0E] hover:text-white transition"><?php echo e(__('site.cta.view_menu')); ?></a>
            </div>
        </div>
    </section>

    
    <section class="py-20 bg-[#F0E0C8]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-[#3B1E0E]">What People Say</h2>
            </div>
            <div class="swiper testimonial-swiper pb-12">
                <div class="swiper-wrapper">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                                <div class="flex justify-center mb-4 text-[#C8922A]">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                                        ★
                                    <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                                <p class="text-lg italic text-[#3B1E0E] mb-6">"<?php echo e($testimonial->content); ?>"</p>
                                <h4 class="font-bold text-[#3B1E0E]"><?php echo e($testimonial->author_name); ?></h4>
                                <span class="text-xs text-gray-500 uppercase tracking-widest"><?php echo e($testimonial->source); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    
    <section class="bg-[#C8922A] py-16 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-white mb-6">Reserve your table today</h2>
            <a href="<?php echo e(route('reserve')); ?>" class="inline-block bg-[#3B1E0E] text-white px-10 py-4 rounded-full font-bold hover:bg-black transition shadow-lg"><?php echo e(__('site.cta.book_now')); ?></a>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper('.featured-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
        new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                768: { slidesPerView: 2 }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\BuildSyntax\caffeine1922\resources\views/home/index.blade.php ENDPATH**/ ?>