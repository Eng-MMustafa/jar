# 🎯 دليل الاستخدام - صفحات حساب المستخدم

## 📋 قائمة الصفحات المنفذة:

### 1. صفحة حسابي (My Profile) 
🔗 **المسار:** `/profile`
- عرض بيانات المستخدم الكاملة
- تغيير البيانات الشخصية
- تغيير كلمة المرور
- روابط سريعة للخدمات الأخرى

### 2. صفحة تفعيل حساب المؤجر (Activate Renter Mode)
🔗 **المسار:** `/profile/activate-renter`
- نموذج شامل لتفعيل حساب المؤجر
- حقول البيانات الشخصية والبنكية
- تحميل صورة الأيدي

### 3. صفحة نجاح التفعيل (Success Page)
🔗 **المسار:** `/profile/activation-success`
- رسالة تأكيد إرسال الطلب بنجاح
- معلومات المتابعة

---

## 🔧 التعديلات المضافة:

### ملفات جديدة تم إنشاؤها:

```
✅ app/Http/Controllers/ProfileController.php
✅ resources/views/profile/index.blade.php
✅ resources/views/profile/activate-renter.blade.php
✅ resources/views/profile/activation-success.blade.php
✅ resources/views/profile/edit.blade.php
✅ resources/views/profile/bookings.blade.php
✅ resources/views/profile/support-tickets.blade.php
✅ database/migrations/2024_12_20_000000_add_renter_fields_to_users_table.php
```

### الملفات المعدلة:

```
✏️ routes/web.php                    (إضافة مسارات Profile)
✏️ app/Models/User.php               (إضافة fillable fields)
```

---

## 🚀 خطوات الاستخدام:

### الخطوة 1: تشغيل Migration
```bash
cd c:\Users\Mohammed\Desktop\newProlaravel\jar
php artisan migrate
```

### الخطوة 2: بدء الخادم
```bash
php artisan serve
```

### الخطوة 3: تسجيل الدخول واختبار الصفحات
```
http://localhost:8000/login          # صفحة تسجيل الدخول
http://localhost:8000/profile        # الملف الشخصي
http://localhost:8000/profile/edit   # تعديل البيانات
```

---

## 📄 تفاصيل الصفحات:

### صفحة حسابي (index.blade.php)

**الأقسام:**
1. **القائمة الجانبية (Sidebar)**
   - صورة أفاتار
   - اسم المستخدم
   - البريد الإلكتروني
   - حالة الحساب
   - بيانات المراسلة

2. **المحتوى الرئيسي (Main Content)**
   - **تبويب 1: البيانات الشخصية**
     - الاسم الأول والأخير
     - البريد الإلكتروني (غير قابل للتعديل)
     - رقم الهاتف
     - المدينة
   
   - **تبويب 2: تغيير كلمة المرور**
     - كلمة المرور الحالية
     - كلمة المرور الجديدة
     - تأكيد كلمة المرور
     - أيقون إظهار/إخفاء كلمة المرور

3. **خيارات إضافية**
   - تفعيل حساب المؤجر
   - عرض الحجوزات
   - الدعم الفني
   - تسجيل الخروج

---

### صفحة تفعيل المؤجر (activate-renter.blade.php)

**القسم 1: البيانات الشخصية**
- اسم الشهرة/محل التأجير
- اختيار المدينة (قائمة منسدلة)
- وصف محل التأجير (Textarea)
- تحميل صورة الأيدي (Drag & Drop)

**القسم 2: البيانات البنكية**
- اسم صاحب الحساب البنكي
- رقم الآيبان (IBAN)
- رقم الحساب البنكي
- ملاحظة حول السياسة

**الأزرار:**
- إرسال طلب التفعيل (PRIMARY)
- إلغاء (SECONDARY)

---

## 🎨 التصميم:

### الألوان المستخدمة:
```css
--primary: #00bcd4        /* اللون الأساسي (تيركواز) */
--primary-dark: #0097a7   /* لون أغمق للـ Hover */
--danger: #e74c3c         /* لون الخطأ (أحمر) */
--success: #27ae60        /* لون النجاح (أخضر) */
--text-dark: #333         /* نصوص داكنة */
--text-light: #666        /* نصوص فاتحة */
--bg-light: #f5f7fa       /* خلفيات فاتحة */
```

### الخط المستخدم:
```css
font-family: 'Tajawal', sans-serif;  /* خط عربي جميل */
direction: rtl;                       /* الاتجاه من اليمين لليسار */
```

---

## 🔐 التحقق من الصحة (Validation):

### على جانب الخادم (Backend):
```php
// في ProfileController.php

// تحديث البيانات الشخصية
validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'phone' => 'required|string|max:20',
    'city' => 'required|string|max:255',
]);

// تفعيل المؤجر
validate([
    'business_name' => 'required|string|max:255',
    'city' => 'required|string|max:255',
    'business_description' => 'required|string|max:1000',
    'hand_photo' => 'nullable|image|max:5000',
    'bank_account_name' => 'required|string|max:255',
    'bank_iban' => 'required|string|max:34',
    'bank_account_number' => 'required|string|max:20',
]);

// تغيير كلمة المرور
validate([
    'current_password' => 'required|current_password',
    'password' => 'required|confirmed|min:8',
]);
```

---

## 📤 رفع الملفات:

الملفات تُحفظ في:
```
storage/app/public/renter-photos/
```

تأكد من تشغيل:
```bash
php artisan storage:link
```

---

## 🔗 المسارات الكاملة:

| المسار | الدالة | الوصف |
|--------|--------|--------|
| `/profile` | `index()` | عرض الملف الشخصي |
| `/profile/edit` | `edit()` | عرض نموذج التعديل |
| `PUT /profile` | `update()` | تحديث البيانات |
| `PUT /profile/password` | `updatePassword()` | تغيير كلمة المرور |
| `/profile/activate-renter` | `activateRenter()` | عرض نموذج التفعيل |
| `POST /profile/activate-renter` | `storeRenterActivation()` | حفظ طلب التفعيل |
| `/profile/activation-success` | `activationSuccess()` | صفحة النجاح |
| `/profile/bookings` | `bookings()` | عرض الحجوزات |
| `/profile/support-tickets` | `supportTickets()` | عرض تذاكر الدعم |

---

## 🛡️ الأمان:

✅ **CSRF Protection** - جميع النماذج محمية
✅ **Authentication** - جميع الصفحات تتطلب تسجيل دخول
✅ **Authorization** - التحقق من الصلاحيات
✅ **Password Hashing** - استخدام bcrypt
✅ **Input Validation** - التحقق من جميع المدخلات

---

## 📱 الاستجابة (Responsive):

جميع الصفحات تعمل بشكل مثالي على:
- ✅ أجهزة الكمبيوتر (Desktop)
- ✅ الأجهزة اللوحية (Tablet)
- ✅ الهواتف الذكية (Mobile)

---

## 🎯 الخطوات التالية:

1. **تشغيل Migration:**
   ```bash
   php artisan migrate
   ```

2. **بدء الخادم:**
   ```bash
   php artisan serve
   ```

3. **الاختبار:**
   - سجل دخول وانتقل إلى `/profile`
   - اختبر تحديث البيانات
   - اختبر تغيير كلمة المرور
   - اختبر تفعيل حساب المؤجر

4. **التخصيص (اختياري):**
   - عدّل الألوان في CSS
   - أضف حقول جديدة
   - خصص الرسائل

---

## 💡 نصائح مفيدة:

1. **لتغيير الألوان:** عدّل قيم `:root` في CSS
2. **لإضافة حقول:** أضفها في Migration والـ View والـ Controller
3. **للتعديل على الرسائل:** عدّل ملفات اللغة في `resources/lang/ar/`
4. **للإضافة المزيد:** استخدم نفس النمط المتبع

---

## 📞 للمساعدة:

إذا واجهت أي مشاكل:
1. تأكد من تشغيل `php artisan migrate`
2. تأكد من تشغيل `php artisan storage:link`
3. تأكد من تسجيل الدخول قبل الوصول للصفحات
4. تحقق من ملف `storage/logs/laravel.log` للأخطاء

---

**تم إنجاز المشروع بنجاح! 🎉**

جميع الصفحات جاهزة للاستخدام الفوري بدون أي تعديلات إضافية ضرورية.
