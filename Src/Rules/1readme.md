Validator側で、下記のように呼び出します。
$this->{$method}($value,$comparison);

従って、必ず第二引数まで指定する必要があります。

必要ない場合は、下記のように初期値nullで対応してください。
function hoge($foo,$bar = null){}
