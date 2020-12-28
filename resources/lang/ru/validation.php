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

    'accepted' => ':attribute должен быть принят.',
    'active_url' => ':attribute не является допустимым URL.',
    'after' => ':attribute должен быть датой после: date.',
    'after_or_equal' => ':attribute должен быть датой после или равной :date.',
    'alpha' => ':attribute может содержать только буквы.',
    'alpha_dash' => ':attribute может содержать только буквы, цифры, дефисы и символы подчеркивания.',
    'alpha_num' => ':attribute может содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой перед :date.',
    'before_or_equal' => ':attribute должен быть датой до или равной :date.',
    'between' => [
        'numeric' => ':attribute должен находиться в диапазоне от: min до: max.',
        'file' => ':attribute должен находиться в диапазоне от: min до: max килобайт. ',
        'string' => ':attribute должен находиться в диапазоне от: min до: max символы.',
        'array' => ':attribute должен находиться в диапазоне от: min до: max элементы.',
    ],
    'boolean' => 'Поле :attribute должно быть истинным или ложным.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть датой, равной :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'different' => ':attribute attribute и :other должны отличаться.',
    'digits' => ':attribute должен быть :digits цифрами.',
    'digits_between' => ':attribute должен быть между :min и :max цифрами.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет повторяющееся значение.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих: :values.',
    'exists' => ':attribute selected: недействителен.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'numeric' => 'attribute: должен быть больше, чем :value.',
        'file' => 'attribute: должен быть больше, чем :value килобайт.',
        'string' => 'attribute: должен быть больше, чем :value символы.',
        'array' => 'attribute: должен быть больше, чем :value предметы.',
    ],
    'gte' => [
        'numeric' => ':attribute должен быть больше или равен :value.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'string' => ':attribute должен быть больше или равен :value символы.',
        'array' => ':attribute должен иметь элементы :value или больше.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Избранные :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть допустимой строкой JSON.',
    'lt' => [
        'numeric' => ':attribute должен быть меньше :value.',
        'file' => ':attribute должен быть меньше :value килобайт.',
        'string' => ':attribute должен быть меньше :value символы.',
        'array' => ':attribute должен быть меньше :valuee элементы.',
    ],
    'lte' => [
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'file' => ':attribute должен быть меньше или равен :value килобайт.',
        'string' => ':attribute должен быть меньше или равен :value символы.',
        'array' => ':attribute должен быть меньше или равен :value элементы.',
    ],
    'max' => [
        'numeric' => ':attribute не может быть больше, чем :max.',
        'file' => ':attribute не может быть больше, чем :max килобайт.',
        'string' => ':attribute не может быть больше, чем :max символы.',
        'array' => ':attribute не может быть больше, чем :max элементы.',
    ],
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'numeric' => ':attribute должен быть не меньше :min.',
        'file' => ':attribute должен быть не меньше :min килобайт.',
        'string' => ':attribute должен быть не меньше :min символы.',
        'array' => ':attribute должен быть не меньше :min элементы.',
    ],
    'not_in' => 'Избранные :attribute недействителен.',
    'not_regex' => 'Формат :attribute недействителен.',
    'numeric' => ':attribute должен быть числом.',
    'password' => 'Пароль неверен.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Формат :attribute недействителен.',
    'required' => 'Формат :attribute недействителен.',
    'required_if' => 'Поле :attribute необходимо, когда :other :values.',
    'required_unless' => 'Поле :attribute является обязательным, если :other не входит в :values.',
    'required_with' => 'Поле :attribute требуется, если присутствует :values.',
    'required_with_all' => 'Поле :attribute необходимо, если присутствуют :values.',
    'required_without' => 'Поле :attribute является обязательным, если :values отсутствует.',
    'required_without_all' => 'Поле :attribute является обязательным, если нет ни одного из :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'numeric' => ':attribute должен быть размером :size.',
        'file' => ':attribute должен быть размером :size килобайт.',
        'string' => ':attribute должен быть размером :size символы.',
        'array' => ':attribute должен быть размером :size элементы.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть допустимой зоной.',
    'unique' => ':attribute уже был занят.',
    'uploaded' => ':attribute не удалось загрузить.',
    'url' => 'Формат :attribute недействителен.',
    'uuid' => ':attribute должен быть действительным UUID.',

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
            'rule-name' => 'заказное сообщение',
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
    'add_rating_twice_in_product_comment' => 'Вы не можете добавлять комментарии и оценки!',
    'fill_three_textarea_for_comments' => 'Все поля для комментариев должны быть заполнены!',
    'dont_forget_to_rate' => 'Не забывайте ставить оценки!',

];
