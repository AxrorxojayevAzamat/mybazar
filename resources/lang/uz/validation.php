<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute qabul qilinishi kerak.',
    'active_url' => ':attribute yaroqli URL emas.',
    'after' => ':attribute :date dan keyin sana bo\'lishi kerak.',
    'after_or_equal' => ':attribute :date dan keyin yoki unga tenglashtirilgan sana bo\'lishi kerak.',
    'alpha' => ':attribute faqat harflardan iborat bo\'lishi mumkin.',
    'alpha_dash' => ':attribute da faqat harflar, raqamlar, chiziqcha va pastki chiziqlar bo\'lishi mumkin.',
    'alpha_num' => ':attribute da faqat harflar va raqamlar bo\'lishi mumkin.',
    'array' => ':attribute massiv bo\'lishi kerak.',
    'before' => ':attribute :date oldin sana bo\'lishi kerak.',
    'before_or_equal' => ':attribute :date dan oldingi sana yoki unga teng bo\'lishi kerak.',
    'between' => [
        'numeric' => ':attribute :min va :max orasida bo\'lishi kerak.',
        'file' => ':attribute :min va :max kilobayt orasida bo\'lishi kerak.',
        'string' => ':attribute :min va :max belgilar orasida bo\'lishi kerak.',
        'array' => ':attribute :min va :max elementlar orasida bo\'lishi kerak.',
    ],
    'boolean' => ':attribute maydoni haqiqiy yoki noto\'g\'ri bo\'lishi kerak.',
    'confirmed' => ':attribute ni tasdiqlash mos kelmaydi.',
    'date' => 'The :attribute haqiqiy sana emas.',
    'date_equals' => ':attribute :date ga teng sana bo\'lishi kerak.',
    'date_format' => ':attribute :format formatga mos kelmaydi.',
    'different' => ':attribute va :other boshqacha bo\'lishi kerak.',
    'digits' => ':attribute :digits raqamlar bo\'lishi kerak.',
    'digits_between' => ':attribute :min va :max raqamlari orasida bo\'lishi kerak.',
    'dimensions' => ':attribute da yaroqsiz rasm o\'lchamlari mavjud.',
    'distinct' => ':attribute maydoni takrorlanadigan qiymatga ega.',
    'email' => ':attribute haqiqiy elektron pochta manzili bo\'lishi kerak.',
    'ends_with' => ':attribute quyidagi: :values dan biri bilan tugashi kerak.',
    'exists' => 'Tanlangan :attribute yaroqsiz.',
    'file' => ':attribute fayl bo\'lishi kerak.',
    'filled' => ':attribute maydonida qiymat bo\'lishi kerak.',
    'gt' => [
        'numeric' => ':attribute :value dan katta bo\'lishi kerak.',
        'file' => ':attribute :value kilobayt dan katta bo\'lishi kerak.',
        'string' => ':attribute :value belgilar dan katta bo\'lishi kerak.',
        'array' => ':attribute :value elementlar dan katta bo\'lishi kerak.',
    ],
    'gte' => [
        'numeric' => ':attribute :value dan katta yoki teng bo\'lishi kerak.',
        'file' => ':attribute :value kilobaytdan katta yoki teng bo\'lishi kerak .',
        'string' => ':attribute :value belgilardan katta yoki teng bo\'lishi kerak.',
        'array' => ':attribute :value elementlari yoki boshqalar bo\'lishi kerak.',
    ],
    'image' => ':attribute rasm bo\'lishi kerak.',
    'in' => 'Tanlangan :attribute yaroqsiz.',
    'in_array' => ':attribute maydoni :other joyda mavjud emas.',
    'integer' => ':attribute butun son bo\'lishi kerak.',
    'ip' => ':attribute IP-manzil bo\'lishi kerak.',
    'ipv4' => ':attribute IPv4-manzil bo\'lishi kerak.',
    'ipv6' => ':attribute IPv6-manzil bo\'lishi kerak.',
    'json' => ':attribute JSON qatori bo\'lishi kerak.',
    'lt' => [
        'numeric' => ':attribute :value dan kam bo\'lishi kerak.',
        'file' => ':attribute :value kilobaytdan kam bo\'lishi kerak..',
        'string' => ':attribute :value belgilardan kam bo\'lishi kerak..',
        'array' => ':attribute :value elementlardan kam bo\'lishi kerak..',
    ],
    'lte' => [
        'numeric' => ':attribute :value dan kam yoki teng bo\'lishi kerak.',
        'file' => ':attribute :value kilobaytdan kam yoki teng bo\'lishi kerak.',
        'string' => ':attribute :value belgilardan kam yoki teng bo\'lishi kerak.',
        'array' => ':attribute :value elementlardan kam yoki teng bo\'lishi kerak.',
    ],
    'max' => [
        'numeric' => ':attribute :max dan katta bo\'lmasligi mumkin.',
        'file' => ':attribute :max kilobaytdan katta bo\'lmasligi mumkin.',
        'string' => ':attribute :max belgilardan katta bo\'lmasligi mumkin.',
        'array' => ':attribute :max elementlardan katta bo\'lmasligi mumkin.',
    ],
    'mimes' => ':attribute :values turidagi fayl bo\'lishi kerak.',
    'mimetypes' => ':attribute :values turidagi fayl bo\'lishi kerak.',
    'min' => [
        'numeric' => ':attribute kamida :min bo\'lishi kerak.',
        'file' => ':attribute kamida :min kilobayt bo\'lishi kerak.',
        'string' => ':attribute kamida :min belgilar bo\'lishi kerak.',
        'array' => ':attribute kamida :min elementlar bo\'lishi kerak.',
    ],
    'not_in' => 'Tanlangan :attribute yaroqsiz.',
    'not_regex' => ':attribute formati yaroqsiz.',
    'numeric' => ':attribute raqam bo\'lishi kerak.',
    'password' => 'Parol noto\'g\'ri.',
    'present' => ':attribute maydoni mavjud bo\'lishi kerak.',
    'regex' => ':attribute formati yaroqsiz.',
    'required' => ':attribute maydoni talab qilinadi.',
    'required_if' => ' :other :value bo\'lganda :attribute maydoni talab qilinadi.',
    'required_unless' => ':attribute maydonini talab qilish kerak, agar :value :other qiymatlarda bo\'lmasa.',
    'required_with' => ':attribute maydoni :values mavjud bo\'lganda talab qilinadi.',
    'required_with_all' => ':attribute maydoni :values mavjud bo\'lganda talab qilinadi.',
    'required_without' => ':attribute maydoni :values mavjud bo\'lmaganda talab qilinadi.',
    'required_without_all' => ':attribute maydoni :values hech biri mavjud bo\'lmaganda talab qilinadi.',
    'same' => ':attribute va :other mos kelishi kerak.',
    'size' => [
        'numeric' => ':attribute :size bo\'lishi kerak.',
        'file' => ':attribute :size kilobayt bo\'lishi kerak.',
        'string' => ':attribute :size belgilar bo\'lishi kerak.',
        'array' => ':attribute :size elementlar bo\'lishi kerak.',
    ],
    'starts_with' => ':attribute quyidagilardan biri bilan boshlanishi kerak: :values.',
    'string' => ':attribute satr bo\'lishi kerak.',
    'timezone' => ':attribute to\'g\'ri zona bo\'lishi kerak.',
    'unique' => ':attribute allaqachon olingan.',
    'uploaded' => ':attribute yuklanmadi.',
    'url' => ':attribute formati yaroqsiz.',
    'uuid' => ':attribute UUID bo\'lishi kerak.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'maxsus xabar',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],
    'add_rating_twice_in_product_comment' => 'Siz sharh va reyting qo\'sha olmaysiz!',
    'fill_three_textarea_for_comments' => 'Barcha sharhlar maydonlarini to\'ldirish kerak!',
    'dont_forget_to_rate' => 'Baho berishni unutmang!',

];
