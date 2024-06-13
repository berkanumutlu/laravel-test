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

    'accepted'             => ':Attribute alanı kabul edilmelidir.',
    'accepted_if'          => ':Other :value olduğunda :attribute alanı kabul edilmelidir.',
    'active_url'           => ':Attribute alanı geçerli bir URL olmalıdır.',
    'after'                => ':Attribute alanı :date tarihinden sonra bir tarih olmalıdır.',
    'after_or_equal'       => ':Attribute alanı :date tarihinden sonra veya aynı tarih olmalıdır.',
    'alpha'                => ':Attribute alanı sadece harfleri içermelidir.',
    'alpha_dash'           => ':Attribute alanı sadece harfleri, rakamları, tireleri ve alt çizgileri içermelidir.',
    'alpha_num'            => ':Attribute alanı sadece harfleri ve rakamları içermelidir.',
    'array'                => ':Attribute alanı bir dizi olmalıdır.',
    'ascii'                => ':Attribute alanı sadece tek baytlık alfasayısal karakterler ve sembolleri içermelidir.',
    'before'               => ':Attribute alanı :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal'      => ':Attribute alanı :date tarihinden önce veya aynı tarih olmalıdır.',
    'between'              => [
        'array'   => ':Attribute alanı :min ile :max arasında öğe içermelidir.',
        'file'    => ':Attribute alanı :min ile :max kilobayt arasında olmalıdır.',
        'numeric' => ':Attribute alanı :min ile :max arasında olmalıdır.',
        'string'  => ':Attribute alanı :min ile :max karakter arasında olmalıdır.',
    ],
    'boolean'              => ':Attribute alanı doğru veya yanlış olmalıdır.',
    'can'                  => ':Attribute alanı yetkilendirilmemiş bir değer içeriyor.',
    'confirmed'            => ':Attribute alanları eşleşmiyor.',
    'current_password'     => 'Şifre yanlış.',
    'date'                 => ':Attribute alanı geçerli bir tarih olmalıdır.',
    'date_equals'          => ':Attribute alanı :date tarihine eşit olmalıdır.',
    'date_format'          => ':Attribute alanı :format formatına uymalıdır.',
    'decimal'              => ':Attribute alanı :decimal ondalık basamağa sahip olmalıdır.',
    'declined'             => ':Attribute alanı reddedilmelidir.',
    'declined_if'          => ':Other :value olduğunda :attribute alanı reddedilmelidir.',
    'different'            => ':Attribute alanı ve :other farklı olmalıdır.',
    'digits'               => ':Attribute alanı :digits basamaklı olmalıdır.',
    'digits_between'       => ':Attribute alanı :min ile :max arasında basamaklı olmalıdır.',
    'dimensions'           => ':Attribute alanı geçersiz resim boyutlarına sahip.',
    'distinct'             => ':Attribute alanı tekrarlanan bir değere sahiptir.',
    'doesnt_end_with'      => ':Attribute alanı şu değerlerden biriyle bitmemelidir: :values.',
    'doesnt_start_with'    => ':Attribute alanı şu değerlerden biriyle başlamamalıdır: :values.',
    'email'                => ':Attribute alanı geçerli bir e-posta adresi olmalıdır.',
    'ends_with'            => ':Attribute alanı şu değerlerden biriyle bitmelidir: :values.',
    'enum'                 => 'Seçilen :attribute geçersiz.',
    'exists'               => 'Seçilen :attribute geçersiz.',
    'extensions'           => ':Attribute alanı şu uzantılardan birine sahip olmalıdır: :values.',
    'file'                 => ':Attribute alanı bir dosya olmalıdır.',
    'filled'               => ':Attribute alanı bir değer içermelidir.',
    'gt'                   => [
        'array'   => ':Attribute alanı :value öğeden fazla olmalıdır.',
        'file'    => ':Attribute alanı :value kilobaytdan büyük olmalıdır.',
        'numeric' => ':Attribute alanı :value\'dan büyük olmalıdır.',
        'string'  => ':Attribute alanı :value karakterden uzun olmalıdır.',
    ],
    'gte'                  => [
        'array'   => ':Attribute alanı :value öğe veya daha fazla olmalıdır.',
        'file'    => ':Attribute alanı :value kilobayt veya daha büyük olmalıdır.',
        'numeric' => ':Attribute alanı :value veya daha büyük olmalıdır.',
        'string'  => ':Attribute alanı en az :value karakter olmalıdır.',
    ],
    'hex_color'            => ':Attribute alanı geçerli bir onaltılık renk olmalıdır.',
    'image'                => ':Attribute alanı bir resim olmalıdır.',
    'in'                   => 'Seçilen :attribute geçersiz.',
    'in_array'             => ':Attribute alanı :other içinde bulunmalıdır.',
    'integer'              => ':Attribute alanı bir tamsayı olmalıdır.',
    'ip'                   => ':Attribute alanı geçerli bir IP adresi olmalıdır.',
    'ipv4'                 => ':Attribute alanı geçerli bir IPv4 adresi olmalıdır.',
    'ipv6'                 => ':Attribute alanı geçerli bir IPv6 adresi olmalıdır.',
    'json'                 => ':Attribute alanı geçerli bir JSON dizesi olmalıdır.',
    'lowercase'            => ':Attribute alanı küçük harf olmalıdır.',
    'lt'                   => [
        'array'   => ':Attribute alanı :value öğeden az olmalıdır.',
        'file'    => ':Attribute alanı :value kilobaytdan küçük olmalıdır.',
        'numeric' => ':Attribute alanı :value\'dan küçük olmalıdır.',
        'string'  => ':Attribute alanı :value karakterden kısa olmalıdır.',
    ],
    'lte'                  => [
        'array'   => ':Attribute alanı :value öğeden fazla olmamalıdır.',
        'file'    => ':Attribute alanı :value kilobayt veya daha küçük olmalıdır.',
        'numeric' => ':Attribute alanı :value\'dan küçük veya eşit olmalıdır.',
        'string'  => ':Attribute alanı :value karakterden kısa veya eşit olmalıdır.',
    ],
    'mac_address'          => ':Attribute alanı geçerli bir MAC adresi olmalıdır.',
    'max'                  => [
        'array'   => ':Attribute alanı :max öğeden fazla olmamalıdır.',
        'file'    => ':Attribute alanı :max kilobayttan büyük olmamalıdır.',
        'numeric' => ':Attribute alanı :max\'dan büyük olmamalıdır.',
        'string'  => ':Attribute alanı :max karakterden büyük olmamalıdır.',
    ],
    'max_digits'           => ':Attribute alanı :max basamaktan fazla olmamalıdır.',
    'mimes'                => ':Attribute alanı şu türden bir dosya olmalıdır: :values.',
    'mimetypes'            => ':Attribute alanı şu türden bir dosya olmalıdır: :values.',
    'min'                  => [
        'array'   => ':Attribute alanı en az :min öğe içermelidir.',
        'file'    => ':Attribute alanı en az :min kilobayt olmalıdır.',
        'numeric' => ':Attribute alanı en az :min olmalıdır.',
        'string'  => ':Attribute alanı en az :min karakter olmalıdır.',
    ],
    'min_digits'           => ':Attribute alanı en az :min basamaklı olmalıdır.',
    'missing'              => ':Attribute alanı eksik olmalıdır.',
    'missing_if'           => ':Other :value olduğunda :attribute alanı eksik olmalıdır.',
    'missing_unless'       => ':Other :value olmadığında :attribute alanı eksik olmalıdır.',
    'missing_with'         => ':Values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'missing_with_all'     => ':Values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'multiple_of'          => ':Attribute alanı :value\'nın katı olmalıdır.',
    'not_in'               => 'Seçilen :attribute geçersiz.',
    'not_regex'            => ':Attribute formatı geçersiz.',
    'numeric'              => ':Attribute bir sayı olmalıdır.',
    'password'             => [
        'letters'       => ':Attribute en az bir harf içermelidir.',
        'mixed'         => ':Attribute en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers'       => ':Attribute en az bir rakam içermelidir.',
        'symbols'       => ':Attribute en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında göründü. Lütfen farklı bir :attribute seçin.',
    ],
    'present'              => ':Attribute alanı mevcut olmalıdır.',
    'present_if'           => ':Other :value olduğunda :attribute alanı mevcut olmalıdır.',
    'present_unless'       => ':Other :value olmadığında :attribute alanı mevcut olmalıdır.',
    'present_with'         => ':Values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'present_with_all'     => ':Values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'prohibited'           => ':Attribute alanı yasaktır.',
    'prohibited_if'        => ':Other :value olduğunda :attribute alanı yasaktır.',
    'prohibited_unless'    => ':Other :values içinde olmadığında :attribute alanı yasaktır.',
    'prohibits'            => ':Attribute alanı :other\'in varlığını engeller.',
    'regex'                => ':Attribute formatı geçersiz.',
    'required'             => ':Attribute alanı gereklidir.',
    'required_array_keys'  => ':Attribute alanı için şu girişleri içermelidir: :values.',
    'required_if'          => ':Other :value olduğunda :attribute alanı gereklidir.',
    'required_if_accepted' => ':Other kabul edildiğinde :attribute alanı gereklidir.',
    'required_unless'      => ':Other :values içinde olmadığında :attribute alanı gereklidir.',
    'required_with'        => ':Values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all'    => ':Values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without'     => ':Values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':Values hiçbiri mevcut olmadığında :attribute alanı gereklidir.',
    'same'                 => ':Attribute ve :other aynı olmalıdır.',
    'size'                 => [
        'array'   => ':Attribute :size öğe içermelidir.',
        'file'    => ':Attribute :size kilobayt olmalıdır.',
        'numeric' => ':Attribute :size olmalıdır.',
        'string'  => ':Attribute :size karakter olmalıdır.',
    ],
    'starts_with'          => ':Attribute şu değerlerden biriyle başlamalıdır: :values.',
    'string'               => ':Attribute bir metin olmalıdır.',
    'timezone'             => ':Attribute geçerli bir zaman dilimi olmalıdır.',
    'unique'               => ':Attribute zaten alınmış.',
    'uploaded'             => ':Attribute yüklenemedi.',
    'uppercase'            => ':Attribute büyük harf olmalıdır.',
    'url'                  => ':Attribute geçerli bir URL olmalıdır.',
    'ulid'                 => ':Attribute geçerli bir ULID olmalıdır.',
    'uuid'                 => ':Attribute geçerli bir UUID olmalıdır.',

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

    'attributes' => [],

    'email.exists'  => "E-posta veya şifre hatalı.",
    'required_text' => "gerekli",
];
