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

    'accepted' => ':attributeを承認してください。',
    'active_url' => ':attributeが有効なURLではありません。',
    'after' => ':attributeには、:date以降の日付を指定してください。',
    'after_or_equal' => ':attributeには、:date以降の日付を指定してください。',
    'alpha' => ':attributeにはアルファベッドのみ使用できます。',
    'alpha_dash' => ":attributeには、英字、数字、ダッシュ（-）および下線（_）が使用できます。",
    'alpha_num' => ':attributeには英字と数字が使用できます。',
    'array' => ':attributeには配列を指定してください。',
    'before' => ':attributeには、:date以前の日付を指定してください。',
    'before_or_equal' => ':attributeには、:date以前の日付を指定してください。',
    'between' => [
        'numeric' => ':attributeは、:minから:maxの間で指定してください。',
        'file' => ':attributeは、:min kBから、:max kBの間で指定してください。',
        'string' => ':attributeは、:min文字から、:max文字の間で指定してください。',
        'array' => ':attributeの項目は、:min個から:max個の間で指定してください。',
    ],
    'boolean' => ':attributeには、trueかfalseを指定してください。',
    'confirmed' => ':attributeと:attribute確認が一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeには、:dateと同じ日付を指定してください。',
    'date_format' => ':attributeの形式は、:formatと一致していません。',
    'different' => ':attributeと:otherには、異なるものを指定してください。',
    'digits' => ':attributeは、:digits桁で指定してください。',
    'digits_between' => ':attributeは、:min桁から:max桁の間で指定してください。',
    'dimensions' => ':attributeの画像サイズが無効です。',
    'distinct' => ':attributeに重複した値があります。',
    'email' => ':attributeは、有効なメールアドレス形式で指定してください。',
    'ends_with' => ':attributeには、:valuesのいずれかで終わる値を指定してください。',
    'exists' => '選択された:attributeは、有効ではありません。',
    'file' => ':attributeはファイルでなければいけません。',
    'filled' => ':attributeには値が必要です。',
    'gt' => [
        'numeric' => ':attributeは、:valueより大きくなければいけません。',
        'file' => ':attributeは、:value kBより大きくなければいけません。',
        'string' => ':attributeは、:value文字より大きくなければいけません。',
        'array' => ':attributeの項目は、:value個より多くなければいけません。',
    ],
    'gte' => [
        'numeric' => ':attributeは、:value以上でなければいけません。',
        'file' => ':attributeは、:value kB以上でなければいけません。',
        'string' => ':attributeは、:value文字以上でなければいけません。',
        'array' => ':attributeの項目は、:value個以上でなければいけません。',
    ],
    'image' => ':attributeは画像でなければいけません。',
    'in' => '選択された:attributeは、有効ではありません。',
    'in_array' => ':attributeは、:otherに存在しません。',
    'integer' => ':attributeは整数でなければいけません。',
    'ip' => ':attributeは、有効なIPアドレスでなければいけません。',
    'ipv4' => ':attributeは、有効なIPv4アドレスでなければいけません。',
    'ipv6' => ':attributeは、有効なIPv6アドレスでなければいけません。',
    'json' => ':attributeは、有効なJSON文字列でなければいけません。',
    'lt' => [
        'numeric' => ':attributeは、:valueより小さくなければいけません。',
        'file' => ':attributeは、:value kBより小さくなければいけません。',
        'string' => ':attributeは、:value文字より小さくなければいけません。',
        'array' => ':attributeの項目は、:value個より少なくなければいけません。',
    ],
    'lte' => [
        'numeric' => ':attributeは、:value以下でなければいけません。',
        'file' => ':attributeは、:value kB以下でなければいけません。',
        'string' => ':attributeは、:value文字以下でなければいけません。',
        'array' => ':attributeの項目は、:value個以下でなければいけません。',
    ],
    'max' => [
        'numeric' => ':attributeは、:max以下でなければいけません。',
        'file' => ':attributeは、:max kB以下でなければいけません。',
        'string' => ':attributeは、:max文字以下でなければいけません。',
        'array' => ':attributeの項目は、:max個以下でなければいけません。',
    ],
    'mimes' => ':attributeは、:valuesタイプのファイルでなければいけません。',
    'mimetypes' => ':attributeは、:valuesタイプのファイルでなければいけません。',
    'min' => [
        'numeric' => ':attributeは、:min以上でなければいけません。',
        'file' => ':attributeは、:min kB以上でなければいけません。',
        'string' => ':attributeは、:min文字以上でなければいけません。',
        'array' => ':attributeの項目は、:min個以上でなければいけません。',
    ],
    'not_in' => '選択された:attributeは、有効ではありません。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは、数値でなければいけません。',
    'password' => 'パスワードが間違っています。',
    'present' => ':attributeが存在している必要があります。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeは必須です。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valuesでない限り、:attributeは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesが全て存在する場合、:attributeは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが全て存在しない場合、:attributeは必須です。',
    'same' => ':attributeと:otherが一致する必要があります。',
    'size' => [
        'numeric' => ':attributeは、:sizeでなければいけません。',
        'file' => ':attributeは、:size kBでなければいけません。',
        'string' => ':attributeは、:size文字でなければいけません。',
        'array' => ':attributeの項目は、:size個でなければいけません。',
    ],
    'starts_with' => ':attributeは、:valuesのいずれかで始まる必要があります。',
    'string' => ':attributeは、文字列でなければいけません。',
    'timezone' => ':attributeは、有効なタイムゾーンでなければいけません。',
    'unique' => ':attributeは既に存在します。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeの形式が無効です。',
    'uuid' => ':attributeは、有効なUUIDでなければいけません。',

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
        'name' => '名前',
        'description' => '商品説明',
        'price' => '価格',
        'image' => '画像',
    ],

];
