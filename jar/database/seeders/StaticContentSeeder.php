<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StaticContent;
use App\Models\Admin;

class StaticContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first();

        $contents = [
            [
                'key' => 'privacy_policy',
                'title_en' => 'Privacy Policy',
                'title_ar' => 'سياسة الخصوصية',
                'content_en' => '<h2>Privacy Policy</h2><p>Your privacy is important to us. This policy explains how we collect, use, and protect your information.</p><p>We collect information you provide directly to us, such as when you create an account, use our services, or contact us for support.</p>',
                'content_ar' => '<h2>سياسة الخصوصية</h2><p>خصوصيتك مهمة بالنسبة لنا. هذه السياسة توضح كيف نجمع ونستخدم ونحمي معلوماتك.</p><p>نجمع المعلومات التي تقدمها لنا مباشرة، مثل عند إنشاء حساب أو استخدام خدماتنا أو الاتصال بنا للحصول على الدعم.</p>',
                'is_published' => true,
            ],
            [
                'key' => 'terms_of_service',
                'title_en' => 'Terms of Service',
                'title_ar' => 'شروط الخدمة',
                'content_en' => '<h2>Terms of Service</h2><p>By using our platform, you agree to these terms and conditions.</p><p>Our platform connects renters and lenders for rental services. All users must comply with applicable laws and regulations.</p>',
                'content_ar' => '<h2>شروط الخدمة</h2><p>باستخدام منصتنا، فإنك توافق على هذه الشروط والأحكام.</p><p>منصتنا تربط بين المستأجرين والمؤجرين لخدمات التأجير. يجب على جميع المستخدمين الامتثال للقوانين واللوائح المعمول بها.</p>',
                'is_published' => true,
            ],
            [
                'key' => 'about_us',
                'title_en' => 'About Us',
                'title_ar' => 'من نحن',
                'content_en' => '<h2>About Jar-T</h2><p>Jar-T is a leading rental platform that connects people who need to rent items with those who have items to rent.</p><p>Our mission is to make renting easy, safe, and affordable for everyone.</p>',
                'content_ar' => '<h2>حول Jar-T</h2><p>Jar-T هي منصة تأجير رائدة تربط بين الأشخاص الذين يحتاجون إلى تأجير العناصر وأولئك الذين لديهم عناصر للتأجير.</p><p>مهمتنا هي جعل التأجير سهلاً وآمناً وميسور التكلفة للجميع.</p>',
                'is_published' => true,
            ],
            [
                'key' => 'faq',
                'title_en' => 'Frequently Asked Questions',
                'title_ar' => 'الأسئلة الشائعة',
                'content_en' => '<h2>FAQ</h2><p><strong>How do I rent an item?</strong></p><p>Browse our catalog, select the item you want, choose rental dates, and complete the booking.</p><p><strong>How do I list my item for rent?</strong></p><p>Create an account as a lender, submit your application, and once approved, you can list your items.</p>',
                'content_ar' => '<h2>الأسئلة الشائعة</h2><p><strong>كيف أستأجر عنصراً؟</strong></p><p>تصفح كتالوجنا، اختر العنصر الذي تريده، حدد تواريخ التأجير، وأكمل الحجز.</p><p><strong>كيف أدرج عنصري للتأجير؟</strong></p><p>أنشئ حساباً كمؤجر، قدم طلبك، وبمجرد الموافقة، يمكنك إدراج عناصرك.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($contents as $content) {
            StaticContent::create(array_merge($content, [
                'created_by' => $admin->id,
            ]));
        }
    }
}
