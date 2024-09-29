// resources/lang/ar/validation.php
<?php

return [

    'accepted' => 'يجب قبول :attribute.',
    'active_url' => ':attribute ليس عنوان URL صالح.',
    'after' => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'alpha' => 'قد يحتوي :attribute على أحرف فقط.',
    'alpha_dash' => 'قد يحتوي :attribute على أحرف وأرقام وشرطات وشرطات سفلية فقط.',
    'alpha_num' => 'قد يحتوي :attribute على أحرف وأرقام فقط.',
    'array' => 'يجب أن يكون :attribute مصفوفة.',
    'before' => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'between' => [
        'numeric' => 'يجب أن تكون قيمة :attribute بين :min و :max.',
        'file' => 'يجب أن يكون حجم :attribute بين :min و :max كيلوبايت.',
        'string' => 'يجب أن يكون :attribute بين :min و :max أحرف.',
        'array' => 'يجب أن يحتوي :attribute على :min إلى :max عناصر.',
    ],
    'boolean' => 'يجب أن يكون :attribute صحيحًا أو خاطئًا.',
    'confirmed' => 'تأكيد :attribute لا يتطابق.',
    'date' => ':attribute ليس تاريخًا صالحًا.',
    'date_format' => ':attribute لا يتطابق مع التنسيق :format.',
    'different' => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits' => 'يجب أن يكون :attribute عددًا مكونًا من :digits رقمًا.',
    'digits_between' => 'يجب أن يكون :attribute بين :min و :max رقمًا.',
    'email' => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالح.',
    'exists' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'filled' => 'يجب أن يحتوي :attribute على قيمة.',
    'image' => 'يجب أن يكون :attribute صورة.',
    'in' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'integer' => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون :attribute عنوان IP صالح.',
    'json' => 'يجب أن يكون :attribute سلسلة JSON صالحة.',
    'max' => [
        'numeric' => 'لا يمكن أن تكون قيمة :attribute أكبر من :max.',
        'file' => 'لا يمكن أن يكون حجم :attribute أكبر من :max كيلوبايت.',
        'string' => 'لا يمكن أن يكون :attribute أطول من :max أحرف.',
        'array' => 'لا يمكن أن يحتوي :attribute على أكثر من :max عناصر.',
    ],
    'mimes' => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
    'mimetypes' => 'يجب أن يكون :attribute ملفًا من نوع: :values.',
    'min' => [
        'numeric' => 'يجب أن تكون قيمة :attribute على الأقل :min.',
        'file' => 'يجب أن يكون حجم :attribute على الأقل :min كيلوبايت.',
        'string' => 'يجب أن يكون :attribute على الأقل :min أحرف.',
        'array' => 'يجب أن يحتوي :attribute على الأقل :min عناصر.',
    ],
    'not_in' => 'القيمة المحددة لـ :attribute غير صحيحة.',
    'numeric' => 'يجب أن يكون :attribute رقمًا.',
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'regex' => 'تنسيق :attribute غير صحيح.',
    'required' => 'حقل :attribute مطلوب.',
    'required_if' => 'يجب أن يكون :attribute مطلوبًا عندما يكون :other هو :value.',
    'required_unless' => 'يجب أن يكون :attribute مطلوبًا ما لم يكن :other هو :values.',
    'required_with' => 'يجب أن يكون :attribute مطلوبًا عندما يكون :values موجودًا.',
    'required_with_all' => 'يجب أن يكون :attribute مطلوبًا عندما تكون :values موجودة.',
    'required_without' => 'يجب أن يكون :attribute مطلوبًا عندما لا يكون :values موجودًا.',
    'required_without_all' => 'يجب أن يكون :attribute مطلوبًا عندما لا تكون أي من :values موجودة.',
    'same' => 'يجب أن يتطابق :attribute و :other.',
    'size' => [
        'numeric' => 'يجب أن تكون قيمة :attribute :size.',
        'file' => 'يجب أن يكون حجم :attribute :size كيلوبايت.',
        'string' => 'يجب أن يكون :attribute :size أحرف.',
        'array' => 'يجب أن يحتوي :attribute على :size عناصر.',
    ],
    'string' => 'يجب أن يكون :attribute سلسلة نصية.',
    'timezone' => 'يجب أن يكون :attribute منطقة زمنية صالحة.',
    'unique' => 'قيمة :attribute مستخدمة بالفعل.',
    'uploaded' => 'فشل في رفع :attribute.',
    'url' => 'تنسيق :attribute غير صحيح.',
    'name'=>'الاسم',
    'attributes' => [
        'name' => 'الاسم',
        'email' => 'البريد الإلكتروني',
        'password'=>'كلمة المرور'
        // Add other attributes as needed
    ],


    // Add custom messages here if needed
];
