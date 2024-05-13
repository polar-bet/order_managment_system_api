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

    'accepted' => 'Поле :attribute має бути прийняте.',
    'accepted_if' => 'Поле :attribute має бути прийняте, якщо :other є :value.',
    'active_url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'after' => 'Поле :attribute має бути датою після :date.',
    'after_or_equal' => 'Поле :attribute має бути датою після або рівною :date.',
    'alpha' => 'Поле :attribute повинно містити лише літери.',
    'alpha_dash' => 'Поле :attribute має містити лише літери, цифри, тире та підкреслення.',
    'alpha_num' => 'Поле :attribute може містити лише літери та цифри.',
    'array' => 'Поле :attribute має бути масивом',
    'ascii' => 'Поле :attribute має містити лише однобайтові алфавітно-цифрові символи та символи.',
    'before' => 'Поле :attribute має бути датою, що передує :date.',
    'before_or_equal' => 'Поле :attribute має бути датою, що передує або дорівнює :date.',
    'between' => [
        'array' => 'Поле :attribute повинно мати від :min до :max елементів.',
        'file' => 'Поле :attribute повинно містити від :min до :max кілобайт.',
        'numeric' => 'Поле :attribute повинно містити від :min до :max.',
        'string' => 'Поле :attribute повинно містити від :min до :max символів.',
    ],
    'boolean' => 'Поле :attribute має бути true або false.',
    'confirmed' => 'Підтвердження поля :attribute не збігається.',
    'current_password' => 'Пароль невірний.',
    'date' => 'Поле :attribute має бути дійсною датою.',
    'date_equals' => 'У полі :attribute має бути дата, що дорівнює :date.',
    'date_format' => 'Поле :attribute має відповідати формату :format.',
    'decimal' => 'Поле :attribute повинне мати кількість знаків після коми :decimal.',
    'declined' => 'Поле :attribute має бути відхилено.',
    'declined_if' => 'Поле :attribute має бути відхилено, коли :other є :value.',
    'different' => 'Поле :attribute та :other мають бути різними.',
    'digits' => 'Поле :attribute повинно мати значення :digits digits.',
    'digits_between' => 'Поле :attribute має бути між :min та :max цифрами.',
    'dimensions' => 'У полі :attribute вказано невірні розміри зображення.',
    'distinct' => 'Поле :attribute має повторюване значення.',
    'doesnt_end_with' => 'Поле :attribute не повинно закінчуватися одним з наступних: :values.',
    'doesnt_start_with' => 'Поле :attribute не повинно починатися з одного з наступних: :values.',
    'email' => 'Поле :attribute має бути дійсною адресою електронної пошти.',
    'ends_with' => 'Поле :attribute має закінчуватися одним з наступних: :values.',
    'enum' => 'Вибраний :атрибут є недійсним.',
    'exists' => 'Вибраний атрибут :attribute є недійсним.',
    'file' => 'Поле :attribute має бути файлом.',
    'filled' => 'Поле :attribute повинно мати значення.',
    'gt' => [
        'array' => 'Поле :attribute повинно мати більше елементів, ніж :value.',
        'file' => 'Поле :attribute має бути більшим за :value кілобайтів.',
        'numeric' => 'Поле :attribute має бути більшим за :value.',
        'string' => 'Поле :attribute повинно бути більшим за :value символів.',
    ],
    'gte' => [
        'array' => 'Поле :attribute повинно містити елементів :value або більше.',
        'file' => 'Поле :attribute має бути більше або дорівнювати :value кілобайт.',
        'numeric' => 'Поле :attribute має бути більше або дорівнювати :value кілобайт.',
        'string' => 'Значення поля :attribute повинно бути більше або дорівнювати :value символів.',
    ],
    'image' => 'Поле :attribute має бути зображенням.',
    'in' => 'Вибраний :атрибут є недійсним.',
    'in_array' => 'Поле :attribute має існувати в :other.',
    'integer' => 'Поле :attribute має бути цілим числом.',
    'ip' => 'Поле :attribute має бути дійсною IP-адресою.',
    'ipv4' => 'Поле :attribute має бути дійсною IPv4-адресою.',
    'ipv6' => 'Поле :attribute має бути дійсною IPv6-адресою.',
    'json' => 'Поле :attribute має бути коректним JSON-рядком.',
    'lowercase' => 'Поле :attribute має бути рядковим.',
    'lt' => [
        'array' => 'Поле :attribute повинно мати менше елементів, ніж :value.',
        'file' => 'Поле :attribute повинно мати розмір менше ніж :value кілобайт.',
        'numeric' => 'Поле :attribute має бути меншим за :value.',
        'string' => 'Поле :attribute має бути меншим за :value символів.',
    ],
    'lte' => [
        'array' => 'Поле :attribute не повинно містити більше елементів :value.',
        'file' => 'Поле :attribute має бути менше або дорівнювати :value кілобайт.',
        'numeric' => 'Поле :attribute повинно бути менше або дорівнювати :value.',
        'string' => 'Поле :attribute повинно бути менше або дорівнювати :value символів.',
    ],
    'mac_address' => 'Поле :attribute має бути дійсною MAC-адресою.',
    'max' => [
        'array' => 'Поле :attribute не повинно містити більше ніж :max елементів.',
        'file' => 'Поле :attribute не повинно мати більше ніж :max кілобайт.',
        'numeric' => 'Поле :attribute не повинно бути більшим за :max.',
        'string' => 'Поле :attribute не повинно перевищувати :max символів.',
    ],
    'max_digits' => 'Поле :attribute не повинно містити більше ніж :max digits.',
    'mimes' => 'Поле :attribute має бути файлом типу: :values.',
    'mimetypes' => 'Поле :attribute має бути файлом типу: :values.',
    'min' => [
        'array' => 'Поле :attribute повинно мати щонайменше :min елементів.',
        'file' => 'Поле :attribute повинно мати не менше :min кілобайт.',
        'numeric' => 'Поле :attribute повинно мати не менше :min.',
        'string' => 'Поле :attribute повинно містити не менше :min символів.',
    ],
    'min_digits' => 'Поле :attribute повинно містити щонайменше :min цифр.',
    'missing' => 'Поле :attribute має бути відсутнє.',
    'missing_if' => 'Поле :attribute має бути відсутнім, якщо :other є :value.',
    'missing_unless' => 'Поле :attribute має бути відсутнім, якщо :other не є :value.',
    'missing_with' => 'Поле :attribute повинно бути відсутнім, якщо :values є присутнім.',
    'missing_with_all' => 'Поле :attribute повинно бути відсутнім, коли присутні :values.',
    'multiple_of' => 'Поле :attribute має бути кратним :value.',
    'not_in' => 'Вибраний :атрибут є недійсним.',
    'not_regex' => 'Формат поля :attribute є невірним.',
    'numeric' => 'Поле :attribute має бути числом.',
    'password' => [
        'letters' => 'Поле :attribute має містити принаймні одну літеру.',
        'mixed' => 'Поле :attribute має містити принаймні одну велику та одну малу літери.',
        'numbers' => 'Поле :attribute повинно містити принаймні одне число.',
        'symbols' => 'Поле :attribute має містити принаймні один символ.',
        'uncompromised' => "Даний :attribute з'явився в результаті витоку даних. Виберіть інший :attribute.",
    ],
    'present' => 'Поле :attribute має бути присутнім.',
    'prohibited' => 'Поле :attribute заборонено',
    'prohibited_if' => 'Поле :attribute заборонено, якщо :other є :value.',
    'prohibited_unless' => 'Поле :attribute заборонено, якщо в :values немає :other.',
    'prohibits' => 'Поле :attribute забороняє присутність :other',
    'regex' => 'Формат поля :attribute є невірним.', 'regex' => 'Формат поля :attribute є невірним.',
    'required' => "Поле :attribute є обов'язковим.",
    "required_array_keys" => 'Поле :attribute повинно містити записи для: :values.',
    'required_if' => "Поле :attribute є обов'язковим, коли :other є :value.",
    'required_if_accepted' => "Поле :attribute є обов'язковим, коли :other прийнято.",
    'required_unless' => "Поле :attribute є обов'язковим, якщо :other не є в :values.",
    'required_with' => "Поле :attribute є обов'язковим, якщо присутній :values.",
    'required_with_all' => "Поле :attribute є обов'язковим, якщо присутні :values.",
    "required_without" => "Поле :attribute є обов'язковим, якщо немає :values.",
    'required_without_all' => "Поле :attribute є обов'язковим, якщо немає жодного з :values.",
    'same' => 'Поле :attribute має відповідати :other.',
    'size' => [
        'array' => 'Поле :attribute має містити елементи :size.',
        'file' => 'Поле :attribute має бути :size кілобайт.',
        'numeric' => 'Поле :attribute має бути :size.',
        'string' => 'Поле :attribute має містити символи :size.',
    ],
    'starts_with' => 'Поле :attribute повинно починатися з одного з наступного: :values.',
    'string' => 'Поле :attribute має бути рядком.',
    'timezone' => 'Поле :attribute має бути дійсним часовим поясом.',
    'unique' => ':attribute вже використовується.',
    'uploaded' => 'Не вдалося завантажити :attribute.',
    'uppercase' => 'Поле :attribute має бути великим.',
    'url' => 'Поле :attribute має бути дійсною URL-адресою.',
    'ulid' => 'Поле :attribute має бути дійсним ULID.',
    'uuid' => 'Поле :attribute має бути дійсним UUID.',

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
        'name' => "ім'я",
        'short_description' => 'короткий опис',
        'description' => 'опис',
        'return' => 'те що повертає функція',
        'type' => 'тип',
        'title' => 'заголовок',
        'example' => 'приклад',
        'examples' => 'приклади',
        'examples.*' => 'приклад',
        'syntaxes' => 'синтаксів',
        'syntaxes.*' => 'синтаксис',
        'constructors' => 'конструктори',
        'constructors.*' => 'конструктор',
        'parameters' => 'параметрів',
        'parameters.*.name' => 'назва параметру',
        'parameters.*.type' => 'тип параметру',
        'parameters.*.description' => 'опис параметру',
        'method_id' => 'методи',
        'method_id.*' => 'метод',
        'related_class_id' => "пов'язані класи",
        'related_class_id.*' => "пов'язаний клас",
        'documentation_type_id' => 'тип документації',
        'email' => 'електронна пошта',
        'password' => 'пароль',
        'avatar' => 'фото користувача',
        'role_id' => 'роль',
        'documentation_section_id' => "розділ",
        'status' => "статус",
    ],

];
