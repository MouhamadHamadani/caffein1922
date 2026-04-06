<div class="bg-[#FDF6EC]">
    {{-- Header --}}
    <div class="bg-[#3B1E0E] py-20 text-center">
        <h1 class="text-5xl font-bold text-white mb-4">{{ __('site.nav.about') }}</h1>
        <div class="w-24 h-1 bg-[#C8922A] mx-auto"></div>
    </div>

    {{-- Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-20">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-[#3B1E0E] mb-6">A Century of Coffee</h2>
                <p class="text-lg text-[#8B6347] mb-6 leading-relaxed">
                    @if(app()->getLocale() === 'en')
                        Founded in 1922, Caffeine has stood the test of time. What started as a small roastery in the bustling streets of Beirut has evolved into a sanctuary for coffee lovers. Our journey is defined by a relentless pursuit of the perfect roast and a commitment to the community that has supported us for generations.
                    @else
                        تأسست كافيين في عام ١٩٢٢، وصمدت أمام اختبار الزمن. ما بدأ كمحمصة صغيرة في شوارع بيروت الصاخبة تطور ليصبح ملاذاً لعشاق القهوة. رحلتنا يحددها السعي الدؤوب للحصول على التحميص المثالي والالتزام تجاه المجتمع الذي دعمنا لأجيال.
                    @endif
                </p>
                <p class="text-lg text-[#8B6347] leading-relaxed">
                    @if(app()->getLocale() === 'en')
                        Every cup we serve carries the legacy of our founders — a legacy of quality, warmth, and the simple joy of a shared moment over coffee.
                    @else
                        كل كوب نقدمه يحمل إرث مؤسسينا — إرث من الجودة والدفء والفرح البسيط بلحظة مشتركة على فنجان قهوة.
                    @endif
                </p>
            </div>
            <div class="relative h-[500px] rounded-lg shadow-2xl overflow-hidden" data-aos="fade-left">
                <img src="{{ asset('images/story_1.png') }}" alt="Our Heritage" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center flex-row-reverse">
            <div class="relative h-[500px] rounded-lg shadow-2xl overflow-hidden md:order-2" data-aos="fade-left">
                <img src="{{ asset('images/story.png') }}" alt="Our Process" class="w-full h-full object-cover">
            </div>
            <div class="md:order-1" data-aos="fade-right">
                <h2 class="text-3xl font-bold text-[#3B1E0E] mb-6">The Art of Roasting</h2>
                <p class="text-lg text-[#8B6347] mb-6 leading-relaxed">
                    @if(app()->getLocale() === 'en')
                        We source our beans from the finest sustainable farms across the globe. Our master roasters then use time-honored techniques to bring out the unique character of each origin. It's a delicate balance of science and soul.
                    @else
                        نحن نستورد حبوبنا من أفضل المزارع المستدامة في جميع أنحاء العالم. ثم يستخدم كبار المحمصين لدينا تقنيات عريقة لإبراز الطابع الفريد لكل مصدر. إنه توازن دقيق بين العلم والروح.
                    @endif
                </p>
                <div class="bg-[#F0E0C8] p-8 rounded-lg border-l-4 border-[#C8922A]">
                    <p class="italic text-[#3B1E0E] text-lg">
                        @if(app()->getLocale() === 'en')
                            "Coffee is not just a drink; it's a conversation that has been happening for over a hundred years."
                        @else
                            "القهوة ليست مجرد مشروب؛ إنها محادثة مستمرة منذ أكثر من مائة عام."
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
