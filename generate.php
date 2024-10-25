<?php

use function Libsql\findDynamicLibsql;

require __DIR__.'/vendor/autoload.php';

$code = (new FFIMe\FFIMe(findDynamicLibsql()))
    ->include(__DIR__.'/lib/libsql.h')
    ->compile('ffi\\libsql')
;
// allow *->err nullable
$code = str_replace(
    'struct_libsql_error_t_ptr $err',
    'struct_libsql_error_t_ptr|null $err',
    $code
);
$code = str_replace(
    'new struct_libsql_error_t_ptr($this->data->err)',
    '$this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null',
    $code
);
file_put_contents(__DIR__.'/lib/libsql.php', '<?php '.$code);
