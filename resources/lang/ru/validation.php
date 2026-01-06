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
    'accepted_if' => ':attribute должен быть принят, если :other равен :value.',
    'active_url' => ':attribute не является допустимым URL-адресом.',
    'after' => ':attribute должен быть датой после :date.',
    'after_or_equal' => ':attribute должен быть датой, следующей за :date или равной ей.',
    'alpha' => ':attribute должен содержать только буквы.',
    'alpha_dash' => ':attribute должен содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute должен содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'ascii' => ':attribute должен содержать только однобайтовые буквенно-цифровые символы и символы.',
    'before' => ':attribute должен быть датой перед :date.',
    'before_or_equal' => ':attribute должен быть датой, предшествующей :date или равной ей.',
    'between' => [
        'array' => ':attribute должен содержать элементы от :min до :max.',
        'file' => ':attribute должен быть от :min до :max килобайт.',
        'numeric' => ':attribute должен быть от :min до :max.',
        'string' => ':attribute должен быть от :min до :max символов.',
    ],
    'boolean' => ':attribute должно быть true или false.',
    'confirmed' => 'Подтверждение :attribute не совпадает.',
    'current_password' => 'Пароль неверен.',
    'date' => ':attribute не является допустимой датой.',
    'date_equals' => ':attribute должен быть равен :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'decimal' => ':attribute должен иметь :decimal знака(ов) после запятой.',
    'declined' => ':attribute должен быть отклонен.',
    'declined_if' => ':attribute должен быть отклонен, если :other равен :value.',
    'different' => ':attribute и :other должны отличаться.',
    'digits' => ':attribute должен содержать :digits цифры.',
    'digits_between' => ':attribute должен содержать от :min до :max цифр.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute имеет дублирующее значение.',
    'doesnt_end_with' => ':attribute не должен заканчиваться одним из следующих значений: :values.',
    'doesnt_start_with' => ':attribute не должен начинаться одним из следующих значений: :values.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться одним из следующих значений: :values.',
    'enum' => 'Выбранное значение :attribute недопустимо.',
    'exists' => 'Выбранный :attribute недействителен.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно иметь значение.',
    'gt' => [
        'array' => 'Поле :attribute должно содержать более :value элементов.',
        'file' => 'Размер :attribute должен быть больше :value килобайт.',
        'numeric' => ':attribute должен быть больше :value.',
        'string' => 'Длина :attribute должна быть больше :value символов.',
    ],
    'gte' => [
        'array' => 'Поле :attribute должно содержать :value элементов или более.',
        'file' => 'Размер :attribute должен быть больше или равен :value килобайт.',
        'numeric' => ':attribute должен быть больше или равен :value.',
        'string' => 'Длина :attribute должна быть больше или равна :value символам.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недействителен.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть допустимой JSON строкой.',
    'lowercase' => ':attribute должен быть в нижнем регистре.',
    'lt' => [
        'array' => 'Поле :attribute должно содержать менее :value элементов.',
        'file' => 'Размер :attribute должен быть меньше :value килобайт.',
        'numeric' => ':attribute должен быть меньше :value.',
        'string' => 'Длина :attribute должна быть меньше :value символов.',
    ],
    'lte' => [
        'array' => 'Поле :attribute не должно содержать более :value элементов.',
        'file' => 'Размер :attribute должен быть меньше или равен :value килобайт.',
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'string' => 'Длина :attribute должна быть меньше или равна :value символам.',
    ],
    'mac_address' => ':attribute должен быть действительным MAC-адресом.',
    'max' => [
        'array' => ':attribute не должен содержать более :max элементов.',
        'file' => ':attribute не должен быть больше :max килобайт.',
        'numeric' => ':attribute не должен быть больше :max.',
        'string' => ':attribute не должен быть длиннее :max символов.',
    ],
    'max_digits' => ':attribute не должен содержать более :max цифр.',
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ':attribute должен содержать как минимум :min элементов.',
        'file' => ':attribute должен быть как минимум :min килобайт.',
        'numeric' => ':attribute должен быть как минимум :min.',
        'string' => ':attribute должен содержать как минимум :min символов.',
    ],
    'min_digits' => ':attribute должен содержать как минимум :min цифры.',
    'missing' => 'Поле :attribute должно быть отсутствующим.',
    'missing_if' => 'Поле :attribute должно быть отсутствующим, когда :other равно :value.',
    'missing_unless' => 'Поле :attribute должно быть отсутствующим, если :other не равно :value.',
    'missing_with' => 'Поле :attribute должно быть отсутствующим, когда присутствует :values.',
    'missing_with_all' => 'Поле :attribute должно быть отсутствующим, когда присутствуют :values.',
    'multiple_of' => ':attribute должен быть кратным :value.',
    'not_in' => 'Выбранный :attribute недействителен.',
    'not_regex' => 'Формат :attribute недействителен.',
    'numeric' => ':attribute должен быть числом.',
    'password' => [
        'letters' => ':attribute должен содержать как минимум одну букву.',
        'mixed' => ':attribute должен содержать как минимум одну заглавную букву и одну строчную букву.',
        'numbers' => ':attribute должен содержать как минимум одну цифру.',
        'symbols' => ':attribute должен содержать как минимум один символ.',
        'uncompromised' => 'Указанный :attribute встречается в утечках данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => 'Поле :attribute должно быть присутствующим.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если :other не находится в :values.',
    'prohibits' => 'Поле :attribute запрещает :other быть присутствующим.',
    'regex' => 'Формат :attribute недействителен.',
    'required' => 'Поле :attribute обязательно.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
    'required_if_accepted' => 'Поле :attribute обязательно, когда :other принято.',
    'required_unless' => 'Поле :attribute обязательно, если :other не находится в :values.',
    'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
    'required_with_all' => 'Поле :attribute обязательно, когда присутствуют :values.',
    'required_without' => 'Поле :attribute обязательно, когда отсутствует :values.',
    'required_without_all' => 'Поле :attribute обязательно, когда отсутствуют все :values.',
    'same' => ':attribute и :other должны совпадать.',
    'size' => [
        'array' => ':attribute должен содержать :size элементов.',
        'file' => ':attribute должен быть :size килобайт.',
        'numeric' => ':attribute должен быть :size.',
        'string' => ':attribute должен быть :size символов.',
    ],
    'starts_with' => ':attribute должен начинаться с одного из следующих значений: :values.',
    'string' => ':attribute должен быть строкой.',
    'timezone' => ':attribute должен быть действительным часовым поясом.',
    'unique' => ':attribute уже существует.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'uppercase' => ':attribute должен быть в верхнем регистре.',
    'url' => ':attribute должен быть действительным URL.',
    'ulid' => ':attribute должен быть действительным ULID.',
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
            'rule-name' => 'custom-message',
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

    'attributes' => [
        'name' => 'Имя',
        'phone' => 'Телефон',
        'g-recaptcha-response' => 'recaptcha'
    ],

];