<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;
use App\Models\Admin;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();

        $sliders = [
            [
                'title_en' => 'Rent Anything, Anytime',
                'title_ar' => 'استأجر أي شيء، في أي وقت',
                'subtitle_en' => 'Join thousands of users renting and lending items in your community',
                'subtitle_ar' => 'انضم إلى آلاف المستخدمين الذين يستأجرون ويقرضون العناصر في مجتمعك',
                'image' => 'slider1.jpg',
                'button_text_en' => 'Start Renting',
                'button_text_ar' => 'ابدأ التأجير',
                'button_link' => '/products',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title_en' => 'Earn Money from Your Items',
                'title_ar' => 'اربح المال من عناصرك',
                'subtitle_en' => 'List your items for rent and start earning passive income today',
                'subtitle_ar' => 'ادرج عناصرك للتأجير وابدأ في كسب الدخل السلبي اليوم',
                'image' => 'slider2.jpg',
                'button_text_en' => 'Become a Lender',
                'button_text_ar' => 'كن مؤجراً',
                'button_link' => '/lender-application',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title_en' => 'Safe & Secure Rentals',
                'title_ar' => 'تأجير آمن ومأمون',
                'subtitle_en' => 'Verified users, secure payments, and insurance protection',
                'subtitle_ar' => 'مستخدمون موثقون، مدفوعات آمنة، وحماية تأمينية',
                'image' => 'slider3.jpg',
                'button_text_en' => 'Learn More',
                'button_text_ar' => 'اعرف المزيد',
                'button_link' => '/about',
                'is_active' => true,
                'sort_order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create(array_merge($slider, [
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
            ]));
        }
    }
}
