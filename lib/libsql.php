<?php namespace ffi;
use FFI;
use ffi\double;
interface ilibsql {}
interface ilibsql_ptr {}
class libsql {
    const __x86_64__ = 1;
    const __LP64__ = 1;
    const __GNUC_VA_LIST = 1;
    const __GNUC__ = 4;
    const __GNUC_MINOR__ = 2;
    const __STDC__ = 1;
    const true = 1;
    const false = 0;
    const __bool_true_false_are_defined = 1;
    const LIBSQL_CYPHER_DEFAULT = (0) + 0 /* typedefenum libsql_cypher_t */;
    const LIBSQL_CYPHER_AES256 = (0) + 1 /* typedefenum libsql_cypher_t */;
    const LIBSQL_TYPE_INTEGER = (1) + 0 /* typedefenum libsql_type_t */;
    const LIBSQL_TYPE_REAL = (2) + 0 /* typedefenum libsql_type_t */;
    const LIBSQL_TYPE_TEXT = (3) + 0 /* typedefenum libsql_type_t */;
    const LIBSQL_TYPE_BLOB = (4) + 0 /* typedefenum libsql_type_t */;
    const LIBSQL_TYPE_NULL = (5) + 0 /* typedefenum libsql_type_t */;
    const LIBSQL_TRACING_LEVEL_ERROR = (1) + 0 /* typedefenum libsql_tracing_level_t */;
    const LIBSQL_TRACING_LEVEL_WARN = (1) + 1 /* typedefenum libsql_tracing_level_t */;
    const LIBSQL_TRACING_LEVEL_INFO = (1) + 2 /* typedefenum libsql_tracing_level_t */;
    const LIBSQL_TRACING_LEVEL_DEBUG = (1) + 3 /* typedefenum libsql_tracing_level_t */;
    const LIBSQL_TRACING_LEVEL_TRACE = (1) + 4 /* typedefenum libsql_tracing_level_t */;
    public static function ffi(?string $pathToSoFile = libsqlFFI::SOFILE): libsqlFFI { return new libsqlFFI($pathToSoFile); }
    public static function sizeof($classOrObject): int { return libsqlFFI::sizeof($classOrObject); }
}
class libsqlFFI {
    const SOFILE = '/home/gingdev/Code/php/libsql-php/src/../lib/x86_64-unknown-linux-gnu/liblibsql.so';
    const TYPES_DEF = 'typedef long int ptrdiff_t;
typedef int wchar_t;
typedef signed char int_least8_t;
typedef short int int_least16_t;
typedef int int_least32_t;
typedef long int int_least64_t;
typedef unsigned char uint_least8_t;
typedef short unsigned int uint_least16_t;
typedef unsigned int uint_least32_t;
typedef long unsigned int uint_least64_t;
typedef signed char int_fast8_t;
typedef long int int_fast16_t;
typedef long int int_fast32_t;
typedef long int int_fast64_t;
typedef unsigned char uint_fast8_t;
typedef long unsigned int uint_fast16_t;
typedef long unsigned int uint_fast32_t;
typedef long unsigned int uint_fast64_t;
typedef long int intptr_t;
typedef long unsigned int uintptr_t;
typedef long int intmax_t;
typedef long unsigned int uintmax_t;
typedef struct libsql_error_t libsql_error_t;
typedef enum {
  LIBSQL_CYPHER_DEFAULT = 0,
  LIBSQL_CYPHER_AES256,
} libsql_cypher_t;
typedef enum {
  LIBSQL_TYPE_INTEGER = 1,
  LIBSQL_TYPE_REAL = 2,
  LIBSQL_TYPE_TEXT = 3,
  LIBSQL_TYPE_BLOB = 4,
  LIBSQL_TYPE_NULL = 5,
} libsql_type_t;
typedef enum {
  LIBSQL_TRACING_LEVEL_ERROR = 1,
  LIBSQL_TRACING_LEVEL_WARN,
  LIBSQL_TRACING_LEVEL_INFO,
  LIBSQL_TRACING_LEVEL_DEBUG,
  LIBSQL_TRACING_LEVEL_TRACE,
} libsql_tracing_level_t;
typedef struct {
  char *message;
  char *target;
  char *file;
  uint64_t timestamp;
  size_t line;
  libsql_tracing_level_t level;
} libsql_log_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_database_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_connection_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_statement_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_transaction_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_rows_t;
typedef struct {
  libsql_error_t *err;
  void *inner;
} libsql_row_t;
typedef struct {
  libsql_error_t *err;
} libsql_batch_t;
typedef struct {
  void *ptr;
  size_t len;
} libsql_slice_t;
typedef union {
  int64_t integer;
  double real;
  libsql_slice_t text;
  libsql_slice_t blob;
} libsql_value_union_t;
typedef struct {
  libsql_value_union_t value;
  libsql_type_t type;
} libsql_value_t;
typedef struct {
  libsql_error_t *err;
  libsql_value_t ok;
} libsql_result_value_t;
typedef struct {
  libsql_error_t *err;
  uint64_t frame_no;
  uint64_t frames_synced;
} libsql_sync_t;
typedef struct {
  libsql_error_t *err;
} libsql_bind_t;
typedef struct {
  libsql_error_t *err;
  uint64_t rows_changed;
} libsql_execute_t;
typedef struct {
  libsql_error_t *err;
  int64_t last_inserted_rowid;
  uint64_t total_changes;
} libsql_connection_info_t;
typedef struct {
  char *url;
  char *path;
  char *auth_token;
  char *encryption_key;
  uint64_t sync_interval;
  libsql_cypher_t cypher;
  _Bool disable_read_your_writes;
  _Bool webpki;
} libsql_database_desc_t;
typedef struct {
  void (*logger)(libsql_log_t log);
  char *version;
} libsql_config_t;
';
    const HEADER_DEF = self::TYPES_DEF . 'libsql_error_t *libsql_setup(libsql_config_t config);
char *libsql_error_message(libsql_error_t *self);
libsql_database_t libsql_database_init(libsql_database_desc_t desc);
libsql_sync_t libsql_database_sync(libsql_database_t self);
libsql_connection_t libsql_database_connect(libsql_database_t self);
libsql_transaction_t libsql_connection_transaction(libsql_connection_t self);
libsql_batch_t libsql_connection_batch(libsql_connection_t self, char *sql);
libsql_connection_info_t libsql_connection_info(libsql_connection_t self);
libsql_batch_t libsql_transaction_batch(libsql_transaction_t self, char *sql);
libsql_statement_t libsql_connection_prepare(libsql_connection_t self, char *sql);
libsql_statement_t libsql_transaction_prepare(libsql_transaction_t self, char *sql);
libsql_execute_t libsql_statement_execute(libsql_statement_t self);
libsql_rows_t libsql_statement_query(libsql_statement_t self);
void libsql_statement_reset(libsql_statement_t self);
libsql_row_t libsql_rows_next(libsql_rows_t self);
libsql_slice_t libsql_rows_column_name(libsql_rows_t self, int32_t index);
int32_t libsql_rows_column_length(libsql_rows_t self);
libsql_result_value_t libsql_row_value(libsql_row_t self, int32_t index);
libsql_slice_t libsql_row_name(libsql_row_t self, int32_t index);
int32_t libsql_row_length(libsql_row_t self);
_Bool libsql_row_empty(libsql_row_t self);
libsql_bind_t libsql_statement_bind_named(libsql_statement_t self, char *name, libsql_value_t value);
libsql_bind_t libsql_statement_bind_value(libsql_statement_t self, libsql_value_t value);
libsql_value_t libsql_integer(int64_t integer);
libsql_value_t libsql_real(double real);
libsql_value_t libsql_text(char *ptr, size_t len);
libsql_value_t libsql_blob(uint8_t *ptr, size_t len);
libsql_value_t libsql_null();
void libsql_error_deinit(libsql_error_t *self);
void libsql_database_deinit(libsql_database_t self);
void libsql_connection_deinit(libsql_connection_t self);
void libsql_statement_deinit(libsql_statement_t self);
void libsql_transaction_commit(libsql_transaction_t self);
void libsql_transaction_rollback(libsql_transaction_t self);
void libsql_rows_deinit(libsql_rows_t self);
void libsql_row_deinit(libsql_row_t self);
void libsql_slice_deinit(libsql_slice_t value);
';
    private FFI $ffi;
    private static FFI $staticFFI;
    private static \WeakMap $__arrayWeakMap;
    private array $__literalStrings = [];
    public function __construct(?string $pathToSoFile = self::SOFILE) {
        $this->ffi = FFI::cdef(self::HEADER_DEF, $pathToSoFile);
    }

    public static function cast(ilibsql $from, string $to): ilibsql {
        if (!is_a($to, ilibsql::class, true)) {
            throw new \LogicException("Cannot cast to a non-wrapper type");
        }
        return new $to(self::$staticFFI->cast($to::getType(), $from->getData()));
    }

    public static function makeArray(string $class, int|array $elements): ilibsql {
        $type = $class::getType();
        if (substr($type, -1) !== "*") {
            throw new \LogicException("Attempting to make a non-pointer element into an array");
        }
        if (is_int($elements)) {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[$elements]");
        } else {
            $cdata = self::$staticFFI->new(substr($type, 0, -1) . "[" . count($elements) . "]");
            foreach ($elements as $key => $raw) {
                $cdata[$key] = \is_scalar($raw) ? \is_int($raw) && $type === "char*" ? \chr($raw) : $raw : $raw->getData();
            }
        }
        $object = new $class(self::$staticFFI->cast($type, \FFI::addr($cdata)));
        self::$__arrayWeakMap[$object] = $cdata;
        return $object;
    }

    public static function sizeof($classOrObject): int {
        if (is_object($classOrObject) && $classOrObject instanceof ilibsql) {
            return FFI::sizeof($classOrObject->getData());
        } elseif (is_a($classOrObject, ilibsql::class, true)) {
            return FFI::sizeof(self::$staticFFI->type($classOrObject::getType()));
        } else {
            throw new \LogicException("Unknown class/object passed to sizeof()");
        }
    }

    public function getFFI(): FFI {
        return $this->ffi;
    }


    public function __get(string $name) {
        switch($name) {
            default: return $this->ffi->$name;
        }
    }
    public function __set(string $name, $value) {
        switch($name) {
            default: return $this->ffi->$name;
        }
    }
    public function __allocCachedString(string $str): FFI\CData {
        return $this->__literalStrings[$str] ??= string_::ownedZero($str)->getData();
    }
    public function libsql_setup(libsql_config_t | null $config): ?struct_libsql_error_t_ptr {
        $config = $config?->getData();
        $result = $this->ffi->libsql_setup($config);
        return $result === null ? null : new struct_libsql_error_t_ptr($result);
    }
    public function libsql_error_message(void_ptr | struct_libsql_error_t_ptr | null | array $self): ?string_ {
        $__ffi_internal_refsself = [];
        if (\is_array($self)) {
            $_ = $this->ffi->new("struct libsql_error_t[" . \count($self) . "]");
            $_i = 0;
            if ($self) {
                if ($_ref = \ReflectionReference::fromArrayElement($self, \key($self))) {
                    foreach ($self as $_k => $_v) {
                        $__ffi_internal_refsself[$_i] = &$self[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v->getData();
                        }
                    }
                    $__ffi_internal_originalself = $self = $_;
                } else {
                    foreach ($self as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $self = $_;
                }
            }
        } else {
            $self = $self?->getData();
            if ($self !== null) {
                $self = $this->ffi->cast("struct libsql_error_t*", $self);
            }
        }
        $result = $this->ffi->libsql_error_message($self);
        foreach ($__ffi_internal_refsself as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $this->ffi->new("struct libsql_error_t");
            \FFI::addr($__ffi_internal_ref_v)[0] = $__ffi_internal_originalself[$_k];
            if ($__ffi_internal_ref_v !== null) {
                $__ffi_internal_ref_v = new struct_libsql_error_t($__ffi_internal_ref_v);
            }
        }
        return $result === null ? null : new string_($result);
    }
    public function libsql_database_init(libsql_database_desc_t | null $desc): ?libsql_database_t {
        $desc = $desc?->getData();
        $result = $this->ffi->libsql_database_init($desc);
        return $result === null ? null : new libsql_database_t($result);
    }
    public function libsql_database_sync(libsql_database_t | null $self): ?libsql_sync_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_database_sync($self);
        return $result === null ? null : new libsql_sync_t($result);
    }
    public function libsql_database_connect(libsql_database_t | null $self): ?libsql_connection_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_database_connect($self);
        return $result === null ? null : new libsql_connection_t($result);
    }
    public function libsql_connection_transaction(libsql_connection_t | null $self): ?libsql_transaction_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_connection_transaction($self);
        return $result === null ? null : new libsql_transaction_t($result);
    }
    public function libsql_connection_batch(libsql_connection_t | null $self, void_ptr | string_ | null | string | array $sql): ?libsql_batch_t {
        $self = $self?->getData();
        $__ffi_internal_refssql = [];
        if (\is_string($sql)) {
            $sql = string_::ownedZero($sql)->getData();
        } elseif (\is_array($sql)) {
            $_ = $this->ffi->new("char[" . \count($sql) . "]");
            $_i = 0;
            if ($sql) {
                if ($_ref = \ReflectionReference::fromArrayElement($sql, \key($sql))) {
                    foreach ($sql as $_k => $_v) {
                        $__ffi_internal_refssql[$_i] = &$sql[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalsql = $sql = $_;
                } else {
                    foreach ($sql as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $sql = $_;
                }
            }
        } else {
            $sql = $sql?->getData();
            if ($sql !== null) {
                $sql = $this->ffi->cast("char*", $sql);
            }
        }
        $result = $this->ffi->libsql_connection_batch($self, $sql);
        foreach ($__ffi_internal_refssql as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalsql[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_batch_t($result);
    }
    public function libsql_connection_info(libsql_connection_t | null $self): ?libsql_connection_info_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_connection_info($self);
        return $result === null ? null : new libsql_connection_info_t($result);
    }
    public function libsql_transaction_batch(libsql_transaction_t | null $self, void_ptr | string_ | null | string | array $sql): ?libsql_batch_t {
        $self = $self?->getData();
        $__ffi_internal_refssql = [];
        if (\is_string($sql)) {
            $sql = string_::ownedZero($sql)->getData();
        } elseif (\is_array($sql)) {
            $_ = $this->ffi->new("char[" . \count($sql) . "]");
            $_i = 0;
            if ($sql) {
                if ($_ref = \ReflectionReference::fromArrayElement($sql, \key($sql))) {
                    foreach ($sql as $_k => $_v) {
                        $__ffi_internal_refssql[$_i] = &$sql[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalsql = $sql = $_;
                } else {
                    foreach ($sql as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $sql = $_;
                }
            }
        } else {
            $sql = $sql?->getData();
            if ($sql !== null) {
                $sql = $this->ffi->cast("char*", $sql);
            }
        }
        $result = $this->ffi->libsql_transaction_batch($self, $sql);
        foreach ($__ffi_internal_refssql as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalsql[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_batch_t($result);
    }
    public function libsql_connection_prepare(libsql_connection_t | null $self, void_ptr | string_ | null | string | array $sql): ?libsql_statement_t {
        $self = $self?->getData();
        $__ffi_internal_refssql = [];
        if (\is_string($sql)) {
            $sql = string_::ownedZero($sql)->getData();
        } elseif (\is_array($sql)) {
            $_ = $this->ffi->new("char[" . \count($sql) . "]");
            $_i = 0;
            if ($sql) {
                if ($_ref = \ReflectionReference::fromArrayElement($sql, \key($sql))) {
                    foreach ($sql as $_k => $_v) {
                        $__ffi_internal_refssql[$_i] = &$sql[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalsql = $sql = $_;
                } else {
                    foreach ($sql as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $sql = $_;
                }
            }
        } else {
            $sql = $sql?->getData();
            if ($sql !== null) {
                $sql = $this->ffi->cast("char*", $sql);
            }
        }
        $result = $this->ffi->libsql_connection_prepare($self, $sql);
        foreach ($__ffi_internal_refssql as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalsql[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_statement_t($result);
    }
    public function libsql_transaction_prepare(libsql_transaction_t | null $self, void_ptr | string_ | null | string | array $sql): ?libsql_statement_t {
        $self = $self?->getData();
        $__ffi_internal_refssql = [];
        if (\is_string($sql)) {
            $sql = string_::ownedZero($sql)->getData();
        } elseif (\is_array($sql)) {
            $_ = $this->ffi->new("char[" . \count($sql) . "]");
            $_i = 0;
            if ($sql) {
                if ($_ref = \ReflectionReference::fromArrayElement($sql, \key($sql))) {
                    foreach ($sql as $_k => $_v) {
                        $__ffi_internal_refssql[$_i] = &$sql[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalsql = $sql = $_;
                } else {
                    foreach ($sql as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $sql = $_;
                }
            }
        } else {
            $sql = $sql?->getData();
            if ($sql !== null) {
                $sql = $this->ffi->cast("char*", $sql);
            }
        }
        $result = $this->ffi->libsql_transaction_prepare($self, $sql);
        foreach ($__ffi_internal_refssql as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalsql[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_statement_t($result);
    }
    public function libsql_statement_execute(libsql_statement_t | null $self): ?libsql_execute_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_statement_execute($self);
        return $result === null ? null : new libsql_execute_t($result);
    }
    public function libsql_statement_query(libsql_statement_t | null $self): ?libsql_rows_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_statement_query($self);
        return $result === null ? null : new libsql_rows_t($result);
    }
    public function libsql_statement_reset(libsql_statement_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_statement_reset($self);
    }
    public function libsql_rows_next(libsql_rows_t | null $self): ?libsql_row_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_rows_next($self);
        return $result === null ? null : new libsql_row_t($result);
    }
    public function libsql_rows_column_name(libsql_rows_t | null $self, int $index): ?libsql_slice_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_rows_column_name($self, $index);
        return $result === null ? null : new libsql_slice_t($result);
    }
    public function libsql_rows_column_length(libsql_rows_t | null $self): int {
        $self = $self?->getData();
        $result = $this->ffi->libsql_rows_column_length($self);
        return $result;
    }
    public function libsql_row_value(libsql_row_t | null $self, int $index): ?libsql_result_value_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_row_value($self, $index);
        return $result === null ? null : new libsql_result_value_t($result);
    }
    public function libsql_row_name(libsql_row_t | null $self, int $index): ?libsql_slice_t {
        $self = $self?->getData();
        $result = $this->ffi->libsql_row_name($self, $index);
        return $result === null ? null : new libsql_slice_t($result);
    }
    public function libsql_row_length(libsql_row_t | null $self): int {
        $self = $self?->getData();
        $result = $this->ffi->libsql_row_length($self);
        return $result;
    }
    public function libsql_row_empty(libsql_row_t | null $self): int {
        $self = $self?->getData();
        $result = $this->ffi->libsql_row_empty($self);
        return $result;
    }
    public function libsql_statement_bind_named(libsql_statement_t | null $self, void_ptr | string_ | null | string | array $name, libsql_value_t | null $value): ?libsql_bind_t {
        $self = $self?->getData();
        $__ffi_internal_refsname = [];
        if (\is_string($name)) {
            $name = string_::ownedZero($name)->getData();
        } elseif (\is_array($name)) {
            $_ = $this->ffi->new("char[" . \count($name) . "]");
            $_i = 0;
            if ($name) {
                if ($_ref = \ReflectionReference::fromArrayElement($name, \key($name))) {
                    foreach ($name as $_k => $_v) {
                        $__ffi_internal_refsname[$_i] = &$name[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalname = $name = $_;
                } else {
                    foreach ($name as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $name = $_;
                }
            }
        } else {
            $name = $name?->getData();
            if ($name !== null) {
                $name = $this->ffi->cast("char*", $name);
            }
        }
        $value = $value?->getData();
        $result = $this->ffi->libsql_statement_bind_named($self, $name, $value);
        foreach ($__ffi_internal_refsname as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalname[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_bind_t($result);
    }
    public function libsql_statement_bind_value(libsql_statement_t | null $self, libsql_value_t | null $value): ?libsql_bind_t {
        $self = $self?->getData();
        $value = $value?->getData();
        $result = $this->ffi->libsql_statement_bind_value($self, $value);
        return $result === null ? null : new libsql_bind_t($result);
    }
    public function libsql_integer(int $integer): ?libsql_value_t {
        $result = $this->ffi->libsql_integer($integer);
        return $result === null ? null : new libsql_value_t($result);
    }
    public function libsql_real(float $real): ?libsql_value_t {
        $result = $this->ffi->libsql_real($real);
        return $result === null ? null : new libsql_value_t($result);
    }
    public function libsql_text(void_ptr | string_ | null | string | array $ptr, int $len): ?libsql_value_t {
        $__ffi_internal_refsptr = [];
        if (\is_string($ptr)) {
            $ptr = string_::ownedZero($ptr)->getData();
        } elseif (\is_array($ptr)) {
            $_ = $this->ffi->new("char[" . \count($ptr) . "]");
            $_i = 0;
            if ($ptr) {
                if ($_ref = \ReflectionReference::fromArrayElement($ptr, \key($ptr))) {
                    foreach ($ptr as $_k => $_v) {
                        $__ffi_internal_refsptr[$_i] = &$ptr[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalptr = $ptr = $_;
                } else {
                    foreach ($ptr as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $ptr = $_;
                }
            }
        } else {
            $ptr = $ptr?->getData();
            if ($ptr !== null) {
                $ptr = $this->ffi->cast("char*", $ptr);
            }
        }
        $result = $this->ffi->libsql_text($ptr, $len);
        foreach ($__ffi_internal_refsptr as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalptr[$_k];
                $__ffi_internal_ref_v = \ord($__ffi_internal_ref_v);
        }
        return $result === null ? null : new libsql_value_t($result);
    }
    public function libsql_blob(void_ptr | uint8_t_ptr | null | string | array $ptr, int $len): ?libsql_value_t {
        $__ffi_internal_refsptr = [];
        if (\is_string($ptr)) {
            $__ffi_str_ptr = string_::ownedZero($ptr)->getData();
            $ptr = $this->ffi->cast("uint8_t*", \FFI::addr($__ffi_str_ptr));
        } elseif (\is_array($ptr)) {
            $_ = $this->ffi->new("uint8_t[" . \count($ptr) . "]");
            $_i = 0;
            if ($ptr) {
                if ($_ref = \ReflectionReference::fromArrayElement($ptr, \key($ptr))) {
                    foreach ($ptr as $_k => $_v) {
                        $__ffi_internal_refsptr[$_i] = &$ptr[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v;
                        }
                    }
                    $__ffi_internal_originalptr = $ptr = $_;
                } else {
                    foreach ($ptr as $_v) {
                        $_[$_i++] = $_v ?? 0;
                    }
                    $ptr = $_;
                }
            }
        } else {
            $ptr = $ptr?->getData();
            if ($ptr !== null) {
                $ptr = $this->ffi->cast("uint8_t*", $ptr);
            }
        }
        $result = $this->ffi->libsql_blob($ptr, $len);
        foreach ($__ffi_internal_refsptr as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $__ffi_internal_originalptr[$_k];
        }
        return $result === null ? null : new libsql_value_t($result);
    }
    public function libsql_null(): ?libsql_value_t {
        $result = $this->ffi->libsql_null();
        return $result === null ? null : new libsql_value_t($result);
    }
    public function libsql_error_deinit(void_ptr | struct_libsql_error_t_ptr | null | array $self): void {
        $__ffi_internal_refsself = [];
        if (\is_array($self)) {
            $_ = $this->ffi->new("struct libsql_error_t[" . \count($self) . "]");
            $_i = 0;
            if ($self) {
                if ($_ref = \ReflectionReference::fromArrayElement($self, \key($self))) {
                    foreach ($self as $_k => $_v) {
                        $__ffi_internal_refsself[$_i] = &$self[$_k];
                        if ($_v !== null) {
                            $_[$_i++] = $_v->getData();
                        }
                    }
                    $__ffi_internal_originalself = $self = $_;
                } else {
                    foreach ($self as $_v) {
                        $_[$_i++] = $_v?->getData();
                    }
                    $self = $_;
                }
            }
        } else {
            $self = $self?->getData();
            if ($self !== null) {
                $self = $this->ffi->cast("struct libsql_error_t*", $self);
            }
        }
        $this->ffi->libsql_error_deinit($self);
        foreach ($__ffi_internal_refsself as $_k => &$__ffi_internal_ref_v) {
            $__ffi_internal_ref_v = $this->ffi->new("struct libsql_error_t");
            \FFI::addr($__ffi_internal_ref_v)[0] = $__ffi_internal_originalself[$_k];
            if ($__ffi_internal_ref_v !== null) {
                $__ffi_internal_ref_v = new struct_libsql_error_t($__ffi_internal_ref_v);
            }
        }
    }
    public function libsql_database_deinit(libsql_database_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_database_deinit($self);
    }
    public function libsql_connection_deinit(libsql_connection_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_connection_deinit($self);
    }
    public function libsql_statement_deinit(libsql_statement_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_statement_deinit($self);
    }
    public function libsql_transaction_commit(libsql_transaction_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_transaction_commit($self);
    }
    public function libsql_transaction_rollback(libsql_transaction_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_transaction_rollback($self);
    }
    public function libsql_rows_deinit(libsql_rows_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_rows_deinit($self);
    }
    public function libsql_row_deinit(libsql_row_t | null $self): void {
        $self = $self?->getData();
        $this->ffi->libsql_row_deinit($self);
    }
    public function libsql_slice_deinit(libsql_slice_t | null $value): void {
        $value = $value?->getData();
        $this->ffi->libsql_slice_deinit($value);
    }
}

class string_ implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr { return new string_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return \ord($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = \chr($value); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while ("\0" !== $cur = $this->data[$i++]) { $ret[] = \ord($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = \ord($this->data[$i]); } } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string($this->data) : FFI::string($this->data, $length); }
    public static function persistent(string $string): self { $str = new self(FFI::cdef()->new("char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::cdef()->new("char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\0"); }
    public function set(int | void_ptr | string_ $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = \chr($value);
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'char*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr { return new string_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ { return new string_($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return string_[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr { return new string_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr { return new string_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return string_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class string_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(string_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): string_ptr_ptr_ptr_ptr { return new string_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): string_ptr_ptr { return new string_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): string_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return string_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new string_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new string_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | string_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'char***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr implements ilibsql, ilibsql_ptr {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr { return new void_ptr_ptr(FFI::addr($this->data)); }
    public function set(ilibsql_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr { return new void_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return void_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr { return new void_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return void_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class void_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(void_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): void_ptr_ptr_ptr_ptr_ptr { return new void_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): void_ptr_ptr_ptr { return new void_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): void_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return void_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new void_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new void_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | void_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'void****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class function_type_ptr implements ilibsql, ilibsql_ptr {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr { return new function_type_ptr_ptr(FFI::addr($this->data)); }
    public function set(callable | void_ptr | function_type_ptr $value): void {
        if ($value instanceof void_ptr) {
            $value = $value->getData();
        } elseif ($value instanceof function_type_ptr) {
            if ($value->types != $this->types) {
                throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
            }
            $value = $value->getData();
        } else {
            $types = $this->types;
            $value = static function (...$args) use ($value, $types) {
                foreach ($args as $i => $arg) {
                    $type = $types[$i + 1];
                    if ($type === "char") {
                        $args[$i] = \chr($arg);
                    } elseif (\is_array($type)) {
                        $args[$i] = new (__NAMESPACE__ . "\\" . $type[0])($arg, array_slice($type, 1));
                    } elseif ($type !== "int" && $type !== "float") {
                        $args[$i] = new (__NAMESPACE__ . "\\" . $type)($arg);
                    }
                }
                $ret = $value(...$args);
                if ($types[0] === "int" || $types === "float") {
                    return $ret;
                } elseif ($types[0] === "char") {
                    return \chr($ret);
                } elseif ($types[0] !== null) {
                    return $ret->getData();
                }
            };
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(*)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(*)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr { return new function_type_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(**)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(**)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr_ptr { return new function_type_ptr_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(***)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(***)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class function_type_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    private array $types;
    public function __construct(FFI\CData $data, array $types) { $this->data = $data; $this->types = $types; }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(function_type_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): function_type_ptr_ptr_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): function_type_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->deref($offset)->set($value); }
    public function deref(int $n = 0): function_type_ptr_ptr_ptr { return new function_type_ptr_ptr_ptr($this->data[$n], $this->types); }
    /** @return function_type_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new function_type_ptr_ptr_ptr($cur, $this->types); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new function_type_ptr_ptr_ptr($this->data[$i], $this->types); } } return $ret; }
    public function set(void_ptr | function_type_ptr_ptr_ptr_ptr $value): void {
        if ($value instanceof function_type_ptr_ptr_ptr_ptr && $value->types != $this->types) {
            throw new \TypeError("Cannot assign " . get_class($value) . " with type signature " . json_encode($value->types) . " to " . get_class($this) . " with type signature " . json_encode($this->types));
        }
        FFI::addr($this->data)[0] = $value;
    }
    public static function getType(): string { return "(****)"; }
    public function getDefinition(): string { return ($this->types[0] !== null ? \is_array($this->types[0]) ? (new (__NAMESPACE__ . "\\" . $this->types[0][0])($this->data, array_slice($this->types[0], 1)))->getDefinition() : $this->types[0]::getType() : "void") . "(****)(" . implode(", ", array_map(function($t) { return \is_array($t) ? (new (__NAMESPACE__ . "\\" . $t[0])($this->data, array_slice($t, 1)))->getDefinition() : $t::getType(); }, array_slice($this->types, 1))) . ")"; }
}
class struct_libsql_error_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct_libsql_error_t $other): bool { return $this->data == $other->data; }
    public function addr(): struct_libsql_error_t_ptr { return new struct_libsql_error_t_ptr(FFI::addr($this->data)); }
    public function set(struct_libsql_error_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct libsql_error_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct_libsql_error_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct_libsql_error_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct_libsql_error_t_ptr_ptr { return new struct_libsql_error_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct_libsql_error_t { return new struct_libsql_error_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct_libsql_error_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return struct_libsql_error_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new struct_libsql_error_t($this->data[$i]); } return $ret; }
    public function set(void_ptr | struct_libsql_error_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct libsql_error_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct_libsql_error_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct_libsql_error_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct_libsql_error_t_ptr_ptr_ptr { return new struct_libsql_error_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct_libsql_error_t_ptr { return new struct_libsql_error_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct_libsql_error_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return struct_libsql_error_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct_libsql_error_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct_libsql_error_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct_libsql_error_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct libsql_error_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct_libsql_error_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct_libsql_error_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct_libsql_error_t_ptr_ptr_ptr_ptr { return new struct_libsql_error_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct_libsql_error_t_ptr_ptr { return new struct_libsql_error_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct_libsql_error_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return struct_libsql_error_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct_libsql_error_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct_libsql_error_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct_libsql_error_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct libsql_error_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class struct_libsql_error_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(struct_libsql_error_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): struct_libsql_error_t_ptr_ptr_ptr_ptr_ptr { return new struct_libsql_error_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): struct_libsql_error_t_ptr_ptr_ptr { return new struct_libsql_error_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): struct_libsql_error_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return struct_libsql_error_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new struct_libsql_error_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new struct_libsql_error_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | struct_libsql_error_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'struct libsql_error_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $message
 * @property string_ $target
 * @property string_ $file
 * @property int $timestamp
 * @property int $line
 * @property int $level
 */
class libsql_log_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_log_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_log_t_ptr { return new libsql_log_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "message": return new string_($this->data->message);
            case "target": return new string_($this->data->target);
            case "file": return new string_($this->data->file);
            case "timestamp": return $this->data->timestamp;
            case "line": return $this->data->line;
            case "level": return $this->data->level;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "message":
                (new string_($_ = &$this->data->message))->set($value);
                return;
            case "target":
                (new string_($_ = &$this->data->target))->set($value);
                return;
            case "file":
                (new string_($_ = &$this->data->file))->set($value);
                return;
            case "timestamp":
                $this->data->timestamp = $value;
                return;
            case "line":
                $this->data->line = $value;
                return;
            case "level":
                $this->data->level = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_log_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_log_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $message
 * @property string_ $target
 * @property string_ $file
 * @property int $timestamp
 * @property int $line
 * @property int $level
 */
class libsql_log_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_log_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_log_t_ptr_ptr { return new libsql_log_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_log_t { return new libsql_log_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_log_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_log_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_log_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "message": return new string_($this->data[0]->message);
            case "target": return new string_($this->data[0]->target);
            case "file": return new string_($this->data[0]->file);
            case "timestamp": return $this->data[0]->timestamp;
            case "line": return $this->data[0]->line;
            case "level": return $this->data[0]->level;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "message":
                (new string_($_ = &$this->data[0]->message))->set($value);
                return;
            case "target":
                (new string_($_ = &$this->data[0]->target))->set($value);
                return;
            case "file":
                (new string_($_ = &$this->data[0]->file))->set($value);
                return;
            case "timestamp":
                $this->data[0]->timestamp = $value;
                return;
            case "line":
                $this->data[0]->line = $value;
                return;
            case "level":
                $this->data[0]->level = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_log_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_log_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_log_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_log_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_log_t_ptr_ptr_ptr { return new libsql_log_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_log_t_ptr { return new libsql_log_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_log_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_log_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_log_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_log_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_log_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_log_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_log_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_log_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_log_t_ptr_ptr_ptr_ptr { return new libsql_log_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_log_t_ptr_ptr { return new libsql_log_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_log_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_log_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_log_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_log_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_log_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_log_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_log_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_log_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_log_t_ptr_ptr_ptr_ptr_ptr { return new libsql_log_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_log_t_ptr_ptr_ptr { return new libsql_log_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_log_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_log_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_log_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_log_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_log_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_log_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_database_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_t_ptr { return new libsql_database_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_database_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_database_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_t_ptr_ptr { return new libsql_database_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_t { return new libsql_database_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_database_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_t_ptr_ptr_ptr { return new libsql_database_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_t_ptr { return new libsql_database_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_t_ptr_ptr_ptr_ptr { return new libsql_database_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_t_ptr_ptr { return new libsql_database_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_t_ptr_ptr_ptr_ptr_ptr { return new libsql_database_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_t_ptr_ptr_ptr { return new libsql_database_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_connection_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_t_ptr { return new libsql_connection_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_connection_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_connection_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_t_ptr_ptr { return new libsql_connection_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_t { return new libsql_connection_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_connection_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_t_ptr_ptr_ptr { return new libsql_connection_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_t_ptr { return new libsql_connection_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_t_ptr_ptr_ptr_ptr { return new libsql_connection_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_t_ptr_ptr { return new libsql_connection_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_t_ptr_ptr_ptr_ptr_ptr { return new libsql_connection_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_t_ptr_ptr_ptr { return new libsql_connection_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_statement_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_statement_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_statement_t_ptr { return new libsql_statement_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_statement_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_statement_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_statement_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_statement_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_statement_t_ptr_ptr { return new libsql_statement_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_statement_t { return new libsql_statement_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_statement_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_statement_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_statement_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_statement_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_statement_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_statement_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_statement_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_statement_t_ptr_ptr_ptr { return new libsql_statement_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_statement_t_ptr { return new libsql_statement_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_statement_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_statement_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_statement_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_statement_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_statement_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_statement_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_statement_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_statement_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_statement_t_ptr_ptr_ptr_ptr { return new libsql_statement_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_statement_t_ptr_ptr { return new libsql_statement_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_statement_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_statement_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_statement_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_statement_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_statement_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_statement_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_statement_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_statement_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_statement_t_ptr_ptr_ptr_ptr_ptr { return new libsql_statement_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_statement_t_ptr_ptr_ptr { return new libsql_statement_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_statement_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_statement_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_statement_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_statement_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_statement_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_statement_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_transaction_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_transaction_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_transaction_t_ptr { return new libsql_transaction_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_transaction_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_transaction_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_transaction_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_transaction_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_transaction_t_ptr_ptr { return new libsql_transaction_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_transaction_t { return new libsql_transaction_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_transaction_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_transaction_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_transaction_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_transaction_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_transaction_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_transaction_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_transaction_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_transaction_t_ptr_ptr_ptr { return new libsql_transaction_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_transaction_t_ptr { return new libsql_transaction_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_transaction_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_transaction_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_transaction_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_transaction_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_transaction_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_transaction_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_transaction_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_transaction_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_transaction_t_ptr_ptr_ptr_ptr { return new libsql_transaction_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_transaction_t_ptr_ptr { return new libsql_transaction_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_transaction_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_transaction_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_transaction_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_transaction_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_transaction_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_transaction_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_transaction_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_transaction_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_transaction_t_ptr_ptr_ptr_ptr_ptr { return new libsql_transaction_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_transaction_t_ptr_ptr_ptr { return new libsql_transaction_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_transaction_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_transaction_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_transaction_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_transaction_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_transaction_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_transaction_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_rows_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_rows_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_rows_t_ptr { return new libsql_rows_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_rows_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_rows_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_rows_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_rows_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_rows_t_ptr_ptr { return new libsql_rows_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_rows_t { return new libsql_rows_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_rows_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_rows_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_rows_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_rows_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_rows_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_rows_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_rows_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_rows_t_ptr_ptr_ptr { return new libsql_rows_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_rows_t_ptr { return new libsql_rows_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_rows_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_rows_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_rows_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_rows_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_rows_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_rows_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_rows_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_rows_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_rows_t_ptr_ptr_ptr_ptr { return new libsql_rows_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_rows_t_ptr_ptr { return new libsql_rows_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_rows_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_rows_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_rows_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_rows_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_rows_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_rows_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_rows_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_rows_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_rows_t_ptr_ptr_ptr_ptr_ptr { return new libsql_rows_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_rows_t_ptr_ptr_ptr { return new libsql_rows_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_rows_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_rows_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_rows_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_rows_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_rows_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_rows_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_row_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_row_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_row_t_ptr { return new libsql_row_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "inner": return new void_ptr($this->data->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_row_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_row_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property void_ptr $inner
 */
class libsql_row_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_row_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_row_t_ptr_ptr { return new libsql_row_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_row_t { return new libsql_row_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_row_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_row_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_row_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "inner": return new void_ptr($this->data[0]->inner);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "inner":
                (new void_ptr($_ = &$this->data[0]->inner))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_row_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_row_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_row_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_row_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_row_t_ptr_ptr_ptr { return new libsql_row_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_row_t_ptr { return new libsql_row_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_row_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_row_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_row_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_row_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_row_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_row_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_row_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_row_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_row_t_ptr_ptr_ptr_ptr { return new libsql_row_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_row_t_ptr_ptr { return new libsql_row_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_row_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_row_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_row_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_row_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_row_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_row_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_row_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_row_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_row_t_ptr_ptr_ptr_ptr_ptr { return new libsql_row_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_row_t_ptr_ptr_ptr { return new libsql_row_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_row_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_row_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_row_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_row_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_row_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_row_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 */
class libsql_batch_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_batch_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_batch_t_ptr { return new libsql_batch_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_batch_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_batch_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 */
class libsql_batch_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_batch_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_batch_t_ptr_ptr { return new libsql_batch_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_batch_t { return new libsql_batch_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_batch_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_batch_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_batch_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_batch_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_batch_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_batch_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_batch_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_batch_t_ptr_ptr_ptr { return new libsql_batch_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_batch_t_ptr { return new libsql_batch_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_batch_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_batch_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_batch_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_batch_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_batch_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_batch_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_batch_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_batch_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_batch_t_ptr_ptr_ptr_ptr { return new libsql_batch_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_batch_t_ptr_ptr { return new libsql_batch_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_batch_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_batch_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_batch_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_batch_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_batch_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_batch_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_batch_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_batch_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_batch_t_ptr_ptr_ptr_ptr_ptr { return new libsql_batch_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_batch_t_ptr_ptr_ptr { return new libsql_batch_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_batch_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_batch_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_batch_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_batch_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_batch_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_batch_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property void_ptr $ptr
 * @property int $len
 */
class libsql_slice_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_slice_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_slice_t_ptr { return new libsql_slice_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "ptr": return new void_ptr($this->data->ptr);
            case "len": return $this->data->len;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "ptr":
                (new void_ptr($_ = &$this->data->ptr))->set($value);
                return;
            case "len":
                $this->data->len = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_slice_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_slice_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property void_ptr $ptr
 * @property int $len
 */
class libsql_slice_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_slice_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_slice_t_ptr_ptr { return new libsql_slice_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_slice_t { return new libsql_slice_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_slice_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_slice_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_slice_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "ptr": return new void_ptr($this->data[0]->ptr);
            case "len": return $this->data[0]->len;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "ptr":
                (new void_ptr($_ = &$this->data[0]->ptr))->set($value);
                return;
            case "len":
                $this->data[0]->len = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_slice_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_slice_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_slice_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_slice_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_slice_t_ptr_ptr_ptr { return new libsql_slice_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_slice_t_ptr { return new libsql_slice_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_slice_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_slice_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_slice_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_slice_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_slice_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_slice_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_slice_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_slice_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_slice_t_ptr_ptr_ptr_ptr { return new libsql_slice_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_slice_t_ptr_ptr { return new libsql_slice_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_slice_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_slice_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_slice_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_slice_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_slice_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_slice_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_slice_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_slice_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_slice_t_ptr_ptr_ptr_ptr_ptr { return new libsql_slice_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_slice_t_ptr_ptr_ptr { return new libsql_slice_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_slice_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_slice_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_slice_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_slice_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_slice_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_slice_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $integer
 * @property float $real
 * @property libsql_slice_t $text
 * @property libsql_slice_t $blob
 */
class libsql_value_union_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_union_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_union_t_ptr { return new libsql_value_union_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "integer": return $this->data->integer;
            case "real": return $this->data->real;
            case "text": return new libsql_slice_t($this->data->text);
            case "blob": return new libsql_slice_t($this->data->blob);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "integer":
                $this->data->integer = $value;
                return;
            case "real":
                $this->data->real = $value;
                return;
            case "text":
                (new libsql_slice_t($_ = &$this->data->text))->set($value);
                return;
            case "blob":
                (new libsql_slice_t($_ = &$this->data->blob))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_value_union_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_union_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property int $integer
 * @property float $real
 * @property libsql_slice_t $text
 * @property libsql_slice_t $blob
 */
class libsql_value_union_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_union_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_union_t_ptr_ptr { return new libsql_value_union_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_union_t { return new libsql_value_union_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_union_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_union_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_union_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "integer": return $this->data[0]->integer;
            case "real": return $this->data[0]->real;
            case "text": return new libsql_slice_t($this->data[0]->text);
            case "blob": return new libsql_slice_t($this->data[0]->blob);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "integer":
                $this->data[0]->integer = $value;
                return;
            case "real":
                $this->data[0]->real = $value;
                return;
            case "text":
                (new libsql_slice_t($_ = &$this->data[0]->text))->set($value);
                return;
            case "blob":
                (new libsql_slice_t($_ = &$this->data[0]->blob))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_value_union_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_union_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_union_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_union_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_union_t_ptr_ptr_ptr { return new libsql_value_union_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_union_t_ptr { return new libsql_value_union_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_union_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_union_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_union_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_union_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_union_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_union_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_union_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_union_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_union_t_ptr_ptr_ptr_ptr { return new libsql_value_union_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_union_t_ptr_ptr { return new libsql_value_union_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_union_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_union_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_union_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_union_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_union_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_union_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_union_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_union_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_union_t_ptr_ptr_ptr_ptr_ptr { return new libsql_value_union_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_union_t_ptr_ptr_ptr { return new libsql_value_union_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_union_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_union_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_union_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_union_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_union_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_union_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property libsql_value_union_t $value
 * @property int $type
 */
class libsql_value_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_t_ptr { return new libsql_value_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "value": return new libsql_value_union_t($this->data->value);
            case "type": return $this->data->type;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "value":
                (new libsql_value_union_t($_ = &$this->data->value))->set($value);
                return;
            case "type":
                $this->data->type = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_value_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property libsql_value_union_t $value
 * @property int $type
 */
class libsql_value_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_t_ptr_ptr { return new libsql_value_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_t { return new libsql_value_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "value": return new libsql_value_union_t($this->data[0]->value);
            case "type": return $this->data[0]->type;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "value":
                (new libsql_value_union_t($_ = &$this->data[0]->value))->set($value);
                return;
            case "type":
                $this->data[0]->type = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_value_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_t_ptr_ptr_ptr { return new libsql_value_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_t_ptr { return new libsql_value_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_t_ptr_ptr_ptr_ptr { return new libsql_value_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_t_ptr_ptr { return new libsql_value_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_value_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_value_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_value_t_ptr_ptr_ptr_ptr_ptr { return new libsql_value_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_value_t_ptr_ptr_ptr { return new libsql_value_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_value_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_value_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_value_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_value_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_value_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_value_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property libsql_value_t $ok
 */
class libsql_result_value_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_result_value_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_result_value_t_ptr { return new libsql_result_value_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "ok": return new libsql_value_t($this->data->ok);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "ok":
                (new libsql_value_t($_ = &$this->data->ok))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_result_value_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_result_value_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property libsql_value_t $ok
 */
class libsql_result_value_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_result_value_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_result_value_t_ptr_ptr { return new libsql_result_value_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_result_value_t { return new libsql_result_value_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_result_value_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_result_value_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_result_value_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "ok": return new libsql_value_t($this->data[0]->ok);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "ok":
                (new libsql_value_t($_ = &$this->data[0]->ok))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_result_value_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_result_value_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_result_value_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_result_value_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_result_value_t_ptr_ptr_ptr { return new libsql_result_value_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_result_value_t_ptr { return new libsql_result_value_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_result_value_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_result_value_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_result_value_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_result_value_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_result_value_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_result_value_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_result_value_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_result_value_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_result_value_t_ptr_ptr_ptr_ptr { return new libsql_result_value_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_result_value_t_ptr_ptr { return new libsql_result_value_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_result_value_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_result_value_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_result_value_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_result_value_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_result_value_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_result_value_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_result_value_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_result_value_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_result_value_t_ptr_ptr_ptr_ptr_ptr { return new libsql_result_value_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_result_value_t_ptr_ptr_ptr { return new libsql_result_value_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_result_value_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_result_value_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_result_value_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_result_value_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_result_value_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_result_value_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $frame_no
 * @property int $frames_synced
 */
class libsql_sync_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_sync_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_sync_t_ptr { return new libsql_sync_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "frame_no": return $this->data->frame_no;
            case "frames_synced": return $this->data->frames_synced;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "frame_no":
                $this->data->frame_no = $value;
                return;
            case "frames_synced":
                $this->data->frames_synced = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_sync_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_sync_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $frame_no
 * @property int $frames_synced
 */
class libsql_sync_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_sync_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_sync_t_ptr_ptr { return new libsql_sync_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_sync_t { return new libsql_sync_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_sync_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_sync_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_sync_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "frame_no": return $this->data[0]->frame_no;
            case "frames_synced": return $this->data[0]->frames_synced;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "frame_no":
                $this->data[0]->frame_no = $value;
                return;
            case "frames_synced":
                $this->data[0]->frames_synced = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_sync_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_sync_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_sync_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_sync_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_sync_t_ptr_ptr_ptr { return new libsql_sync_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_sync_t_ptr { return new libsql_sync_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_sync_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_sync_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_sync_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_sync_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_sync_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_sync_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_sync_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_sync_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_sync_t_ptr_ptr_ptr_ptr { return new libsql_sync_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_sync_t_ptr_ptr { return new libsql_sync_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_sync_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_sync_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_sync_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_sync_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_sync_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_sync_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_sync_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_sync_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_sync_t_ptr_ptr_ptr_ptr_ptr { return new libsql_sync_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_sync_t_ptr_ptr_ptr { return new libsql_sync_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_sync_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_sync_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_sync_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_sync_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_sync_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_sync_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 */
class libsql_bind_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_bind_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_bind_t_ptr { return new libsql_bind_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_bind_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_bind_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 */
class libsql_bind_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_bind_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_bind_t_ptr_ptr { return new libsql_bind_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_bind_t { return new libsql_bind_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_bind_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_bind_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_bind_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_bind_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_bind_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_bind_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_bind_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_bind_t_ptr_ptr_ptr { return new libsql_bind_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_bind_t_ptr { return new libsql_bind_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_bind_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_bind_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_bind_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_bind_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_bind_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_bind_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_bind_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_bind_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_bind_t_ptr_ptr_ptr_ptr { return new libsql_bind_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_bind_t_ptr_ptr { return new libsql_bind_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_bind_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_bind_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_bind_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_bind_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_bind_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_bind_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_bind_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_bind_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_bind_t_ptr_ptr_ptr_ptr_ptr { return new libsql_bind_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_bind_t_ptr_ptr_ptr { return new libsql_bind_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_bind_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_bind_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_bind_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_bind_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_bind_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_bind_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $rows_changed
 */
class libsql_execute_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_execute_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_execute_t_ptr { return new libsql_execute_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "rows_changed": return $this->data->rows_changed;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "rows_changed":
                $this->data->rows_changed = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_execute_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_execute_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $rows_changed
 */
class libsql_execute_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_execute_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_execute_t_ptr_ptr { return new libsql_execute_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_execute_t { return new libsql_execute_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_execute_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_execute_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_execute_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "rows_changed": return $this->data[0]->rows_changed;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "rows_changed":
                $this->data[0]->rows_changed = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_execute_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_execute_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_execute_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_execute_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_execute_t_ptr_ptr_ptr { return new libsql_execute_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_execute_t_ptr { return new libsql_execute_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_execute_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_execute_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_execute_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_execute_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_execute_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_execute_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_execute_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_execute_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_execute_t_ptr_ptr_ptr_ptr { return new libsql_execute_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_execute_t_ptr_ptr { return new libsql_execute_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_execute_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_execute_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_execute_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_execute_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_execute_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_execute_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_execute_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_execute_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_execute_t_ptr_ptr_ptr_ptr_ptr { return new libsql_execute_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_execute_t_ptr_ptr_ptr { return new libsql_execute_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_execute_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_execute_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_execute_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_execute_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_execute_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_execute_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $last_inserted_rowid
 * @property int $total_changes
 */
class libsql_connection_info_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_info_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_info_t_ptr { return new libsql_connection_info_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "err": return $this->data->err ? new struct_libsql_error_t_ptr($this->data->err) : null;
            case "last_inserted_rowid": return $this->data->last_inserted_rowid;
            case "total_changes": return $this->data->total_changes;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data->err))->set($value);
                return;
            case "last_inserted_rowid":
                $this->data->last_inserted_rowid = $value;
                return;
            case "total_changes":
                $this->data->total_changes = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_connection_info_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_info_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property struct_libsql_error_t_ptr|null $err
 * @property int $last_inserted_rowid
 * @property int $total_changes
 */
class libsql_connection_info_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_info_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_info_t_ptr_ptr { return new libsql_connection_info_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_info_t { return new libsql_connection_info_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_info_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_info_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_info_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "err": return new struct_libsql_error_t_ptr($this->data[0]->err);
            case "last_inserted_rowid": return $this->data[0]->last_inserted_rowid;
            case "total_changes": return $this->data[0]->total_changes;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "err":
                (new struct_libsql_error_t_ptr($_ = &$this->data[0]->err))->set($value);
                return;
            case "last_inserted_rowid":
                $this->data[0]->last_inserted_rowid = $value;
                return;
            case "total_changes":
                $this->data[0]->total_changes = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_connection_info_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_info_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_info_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_info_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_info_t_ptr_ptr_ptr { return new libsql_connection_info_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_info_t_ptr { return new libsql_connection_info_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_info_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_info_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_info_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_info_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_info_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_info_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_info_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_info_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_info_t_ptr_ptr_ptr_ptr { return new libsql_connection_info_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_info_t_ptr_ptr { return new libsql_connection_info_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_info_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_info_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_info_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_info_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_info_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_info_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_connection_info_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_connection_info_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_connection_info_t_ptr_ptr_ptr_ptr_ptr { return new libsql_connection_info_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_connection_info_t_ptr_ptr_ptr { return new libsql_connection_info_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_connection_info_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_connection_info_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_connection_info_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_connection_info_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_connection_info_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_connection_info_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $url
 * @property string_ $path
 * @property string_ $auth_token
 * @property string_ $encryption_key
 * @property int $sync_interval
 * @property int $cypher
 * @property int $disable_read_your_writes
 * @property int $webpki
 */
class libsql_database_desc_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_desc_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_desc_t_ptr { return new libsql_database_desc_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "url": return new string_($this->data->url);
            case "path": return new string_($this->data->path);
            case "auth_token": return new string_($this->data->auth_token);
            case "encryption_key": return new string_($this->data->encryption_key);
            case "sync_interval": return $this->data->sync_interval;
            case "cypher": return $this->data->cypher;
            case "disable_read_your_writes": return $this->data->disable_read_your_writes;
            case "webpki": return $this->data->webpki;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "url":
                (new string_($_ = &$this->data->url))->set($value);
                return;
            case "path":
                (new string_($_ = &$this->data->path))->set($value);
                return;
            case "auth_token":
                (new string_($_ = &$this->data->auth_token))->set($value);
                return;
            case "encryption_key":
                (new string_($_ = &$this->data->encryption_key))->set($value);
                return;
            case "sync_interval":
                $this->data->sync_interval = $value;
                return;
            case "cypher":
                $this->data->cypher = $value;
                return;
            case "disable_read_your_writes":
                $this->data->disable_read_your_writes = $value;
                return;
            case "webpki":
                $this->data->webpki = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_database_desc_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_desc_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property string_ $url
 * @property string_ $path
 * @property string_ $auth_token
 * @property string_ $encryption_key
 * @property int $sync_interval
 * @property int $cypher
 * @property int $disable_read_your_writes
 * @property int $webpki
 */
class libsql_database_desc_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_desc_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_desc_t_ptr_ptr { return new libsql_database_desc_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_desc_t { return new libsql_database_desc_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_desc_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_desc_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_desc_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "url": return new string_($this->data[0]->url);
            case "path": return new string_($this->data[0]->path);
            case "auth_token": return new string_($this->data[0]->auth_token);
            case "encryption_key": return new string_($this->data[0]->encryption_key);
            case "sync_interval": return $this->data[0]->sync_interval;
            case "cypher": return $this->data[0]->cypher;
            case "disable_read_your_writes": return $this->data[0]->disable_read_your_writes;
            case "webpki": return $this->data[0]->webpki;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "url":
                (new string_($_ = &$this->data[0]->url))->set($value);
                return;
            case "path":
                (new string_($_ = &$this->data[0]->path))->set($value);
                return;
            case "auth_token":
                (new string_($_ = &$this->data[0]->auth_token))->set($value);
                return;
            case "encryption_key":
                (new string_($_ = &$this->data[0]->encryption_key))->set($value);
                return;
            case "sync_interval":
                $this->data[0]->sync_interval = $value;
                return;
            case "cypher":
                $this->data[0]->cypher = $value;
                return;
            case "disable_read_your_writes":
                $this->data[0]->disable_read_your_writes = $value;
                return;
            case "webpki":
                $this->data[0]->webpki = $value;
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_database_desc_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_desc_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_desc_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_desc_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_desc_t_ptr_ptr_ptr { return new libsql_database_desc_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_desc_t_ptr { return new libsql_database_desc_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_desc_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_desc_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_desc_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_desc_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_desc_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_desc_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_desc_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_desc_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_desc_t_ptr_ptr_ptr_ptr { return new libsql_database_desc_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_desc_t_ptr_ptr { return new libsql_database_desc_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_desc_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_desc_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_desc_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_desc_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_desc_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_desc_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_database_desc_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_database_desc_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_database_desc_t_ptr_ptr_ptr_ptr_ptr { return new libsql_database_desc_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_database_desc_t_ptr_ptr_ptr { return new libsql_database_desc_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_database_desc_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_database_desc_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_database_desc_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_database_desc_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_database_desc_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_database_desc_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property function_type_ptr $logger
 * @property string_ $version
 */
class libsql_config_t implements ilibsql {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_config_t $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_config_t_ptr { return new libsql_config_t_ptr(FFI::addr($this->data)); }
    public function __get($prop) {
        switch ($prop) {
            case "logger": return new function_type_ptr($this->data->logger, [NULL, 'libsql_log_t']);
            case "version": return new string_($this->data->version);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "logger":
                (new function_type_ptr($_ = &$this->data->logger, [NULL, 'libsql_log_t']))->set($value);
                return;
            case "version":
                (new string_($_ = &$this->data->version))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(libsql_config_t $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_config_t'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
/**
 * @property function_type_ptr $logger
 * @property string_ $version
 */
class libsql_config_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_config_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_config_t_ptr_ptr { return new libsql_config_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_config_t { return new libsql_config_t($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_config_t { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_config_t[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_config_t($this->data[$i]); } return $ret; }
    public function __get($prop) {
        switch ($prop) {
            case "logger": return new function_type_ptr($this->data[0]->logger, [NULL, 'libsql_log_t']);
            case "version": return new string_($this->data[0]->version);
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function __set($prop, $value) {
        switch ($prop) {
            case "logger":
                (new function_type_ptr($_ = &$this->data[0]->logger, [NULL, 'libsql_log_t']))->set($value);
                return;
            case "version":
                (new string_($_ = &$this->data[0]->version))->set($value);
                return;
        }
        throw new \Error("Unknown field $prop on type " . self::getType());
    }
    public function set(void_ptr | libsql_config_t_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_config_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_config_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_config_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_config_t_ptr_ptr_ptr { return new libsql_config_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_config_t_ptr { return new libsql_config_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_config_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_config_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_config_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_config_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_config_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_config_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_config_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_config_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_config_t_ptr_ptr_ptr_ptr { return new libsql_config_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_config_t_ptr_ptr { return new libsql_config_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_config_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_config_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_config_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_config_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_config_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_config_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class libsql_config_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(libsql_config_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): libsql_config_t_ptr_ptr_ptr_ptr_ptr { return new libsql_config_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): libsql_config_t_ptr_ptr_ptr { return new libsql_config_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): libsql_config_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return libsql_config_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new libsql_config_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new libsql_config_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | libsql_config_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'libsql_config_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class _Bool_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_Bool_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _Bool_ptr_ptr { return new _Bool_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function toString(?int $length = null): string { return $length === null ? FFI::string(FFI::cdef()->cast("char*", $this->data)) : FFI::string(FFI::cdef()->cast("char*", $this->data), $length); }
    public static function persistent(string $string): self { $str = new self(FFI::cdef()->new("unsigned char[" . \strlen($string) . "]", false)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function owned(string $string): self { $str = new self(FFI::cdef()->new("unsigned char[" . \strlen($string) . "]", true)); FFI::memcpy($str->data, $string, \strlen($string)); return $str; }
    public static function persistentZero(string $string): self { return self::persistent("$string\0"); }
    public static function ownedZero(string $string): self { return self::owned("$string\0"); }
    public function set(int | void_ptr | _Bool_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return '_Bool*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class _Bool_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_Bool_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _Bool_ptr_ptr_ptr { return new _Bool_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _Bool_ptr { return new _Bool_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): _Bool_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return _Bool_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new _Bool_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new _Bool_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | _Bool_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '_Bool**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class _Bool_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_Bool_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _Bool_ptr_ptr_ptr_ptr { return new _Bool_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _Bool_ptr_ptr { return new _Bool_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): _Bool_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return _Bool_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new _Bool_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new _Bool_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | _Bool_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '_Bool***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class _Bool_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(_Bool_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): _Bool_ptr_ptr_ptr_ptr_ptr { return new _Bool_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): _Bool_ptr_ptr_ptr { return new _Bool_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): _Bool_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return _Bool_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new _Bool_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new _Bool_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | _Bool_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return '_Bool****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_int_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_int_ptr_ptr { return new short_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | short_int_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'short_int*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_int_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_int_ptr_ptr_ptr { return new short_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_int_ptr { return new short_int_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_int_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return short_int_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_int_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_int_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_int_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short_int**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_int_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_int_ptr_ptr_ptr_ptr { return new short_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_int_ptr_ptr { return new short_int_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_int_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return short_int_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_int_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_int_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_int_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short_int***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class short_int_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(short_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): short_int_ptr_ptr_ptr_ptr_ptr { return new short_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): short_int_ptr_ptr_ptr { return new short_int_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): short_int_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return short_int_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new short_int_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new short_int_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | short_int_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'short_int****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_int_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_int_ptr_ptr { return new unsigned_short_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | unsigned_short_int_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_short_int*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_int_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_int_ptr_ptr_ptr { return new unsigned_short_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_int_ptr { return new unsigned_short_int_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_int_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_int_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_int_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_int_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_int_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short_int**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_int_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_int_ptr_ptr_ptr_ptr { return new unsigned_short_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_int_ptr_ptr { return new unsigned_short_int_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_int_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_int_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_int_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_int_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_int_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short_int***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_short_int_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_short_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_short_int_ptr_ptr_ptr_ptr_ptr { return new unsigned_short_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_short_int_ptr_ptr_ptr { return new unsigned_short_int_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_short_int_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_short_int_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_short_int_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_short_int_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_short_int_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_short_int****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int32_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int32_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int32_t_ptr_ptr { return new int32_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | int32_t_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'int32_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int32_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int32_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int32_t_ptr_ptr_ptr { return new int32_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int32_t_ptr { return new int32_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int32_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int32_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int32_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int32_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int32_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int32_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int32_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int32_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int32_t_ptr_ptr_ptr_ptr { return new int32_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int32_t_ptr_ptr { return new int32_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int32_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int32_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int32_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int32_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int32_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int32_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int32_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int32_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int32_t_ptr_ptr_ptr_ptr_ptr { return new int32_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int32_t_ptr_ptr_ptr { return new int32_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int32_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int32_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int32_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int32_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int32_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int32_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr { return new unsigned_int_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | unsigned_int_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'unsigned_int*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr { return new unsigned_int_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr_ptr { return new unsigned_int_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class unsigned_int_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(unsigned_int_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): unsigned_int_ptr_ptr_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): unsigned_int_ptr_ptr_ptr { return new unsigned_int_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): unsigned_int_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return unsigned_int_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new unsigned_int_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new unsigned_int_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | unsigned_int_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'unsigned_int****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr { return new int64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | int64_t_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'int64_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr { return new int64_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr_ptr { return new int64_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class int64_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(int64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): int64_t_ptr_ptr_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int64_t_ptr_ptr_ptr { return new int64_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int64_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int64_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new int64_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new int64_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | int64_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'int64_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class uint64_t_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(uint64_t_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uint64_t_ptr_ptr { return new uint64_t_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): int { return $this->data[$n]; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): int { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return int[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(int | void_ptr | uint64_t_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'uint64_t*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class uint64_t_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(uint64_t_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uint64_t_ptr_ptr_ptr { return new uint64_t_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uint64_t_ptr { return new uint64_t_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): uint64_t_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return uint64_t_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new uint64_t_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new uint64_t_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | uint64_t_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'uint64_t**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class uint64_t_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(uint64_t_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uint64_t_ptr_ptr_ptr_ptr { return new uint64_t_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uint64_t_ptr_ptr { return new uint64_t_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): uint64_t_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return uint64_t_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new uint64_t_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new uint64_t_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | uint64_t_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'uint64_t***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class uint64_t_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(uint64_t_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): uint64_t_ptr_ptr_ptr_ptr_ptr { return new uint64_t_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): uint64_t_ptr_ptr_ptr { return new uint64_t_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): uint64_t_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return uint64_t_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new uint64_t_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new uint64_t_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | uint64_t_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'uint64_t****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class double_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(double_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): double_ptr_ptr { return new double_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): float { return $this->data[$n] + 0.0; }
    #[\ReturnTypeWillChange] public function offsetGet($offset): float { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value; }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return float[] */ public function toArray(int $length): array { $ret = []; for ($i = 0; $i < $length; ++$i) { $ret[] = ($this->data[$i]); } return $ret; }
    public function set(float | void_ptr | double_ptr $value): void {
        if (\is_scalar($value)) {
            $this->data[0] = $value;
        } else {
            FFI::addr($this->data)[0] = $value->getData();
        }
    }
    public static function getType(): string { return 'double*'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class double_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(double_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): double_ptr_ptr_ptr { return new double_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): double_ptr { return new double_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): double_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return double_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new double_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new double_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | double_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'double**'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class double_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(double_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): double_ptr_ptr_ptr_ptr { return new double_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): double_ptr_ptr { return new double_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): double_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return double_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new double_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new double_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | double_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'double***'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
class double_ptr_ptr_ptr_ptr implements ilibsql, ilibsql_ptr, \ArrayAccess {
    private FFI\CData $data;
    public function __construct(FFI\CData $data) { $this->data = $data; }
    public static function castFrom(ilibsql $data): self { return libsqlFFI::cast($data, self::class); }
    public function getData(): FFI\CData { return $this->data; }
    public function equals(double_ptr_ptr_ptr_ptr $other): bool { return $this->data == $other->data; }
    public function addr(): double_ptr_ptr_ptr_ptr_ptr { return new double_ptr_ptr_ptr_ptr_ptr(FFI::addr($this->data)); }
    public function deref(int $n = 0): double_ptr_ptr_ptr { return new double_ptr_ptr_ptr($this->data[$n]); }
    #[\ReturnTypeWillChange] public function offsetGet($offset): double_ptr_ptr_ptr { return $this->deref($offset); }
    #[\ReturnTypeWillChange] public function offsetExists($offset): bool { return !FFI::isNull($this->data); }
    #[\ReturnTypeWillChange] public function offsetUnset($offset): void { throw new \Error("Cannot unset C structures"); }
    #[\ReturnTypeWillChange] public function offsetSet($offset, $value): void { $this->data[$offset] = $value->getData(); }
    public static function array(int $size = 1): self { return libsqlFFI::makeArray(self::class, $size); }
    /** @return double_ptr_ptr_ptr[] */ public function toArray(?int $length = null): array { $ret = []; if ($length === null) { $i = 0; while (null !== $cur = $this->data[$i++]) { $ret[] = new double_ptr_ptr_ptr($cur); } } else { for ($i = 0; $i < $length; ++$i) { $ret[] = new double_ptr_ptr_ptr($this->data[$i]); } } return $ret; }
    public function set(void_ptr | double_ptr_ptr_ptr_ptr $value): void {
        FFI::addr($this->data)[0] = $value->getData();
    }
    public static function getType(): string { return 'double****'; }
    public static function size(): int { return libsqlFFI::sizeof(self::class); }
    public function getDefinition(): string { return static::getType(); }
}
(function() { self::$staticFFI = \FFI::cdef(libsqlFFI::TYPES_DEF); self::$__arrayWeakMap = new \WeakMap; })->bindTo(null, libsqlFFI::class)();
\class_alias(_Bool_ptr::class, uint8_t_ptr::class);
\class_alias(_Bool_ptr_ptr::class, uint8_t_ptr_ptr::class);
\class_alias(_Bool_ptr_ptr_ptr::class, uint8_t_ptr_ptr_ptr::class);
\class_alias(_Bool_ptr_ptr_ptr_ptr::class, uint8_t_ptr_ptr_ptr_ptr::class);
\class_alias(_Bool_ptr::class, unsigned_char_ptr::class);
\class_alias(_Bool_ptr_ptr::class, unsigned_char_ptr_ptr::class);
\class_alias(_Bool_ptr_ptr_ptr::class, unsigned_char_ptr_ptr_ptr::class);
\class_alias(_Bool_ptr_ptr_ptr_ptr::class, unsigned_char_ptr_ptr_ptr_ptr::class);
\class_alias(int32_t_ptr::class, int_ptr::class);
\class_alias(int32_t_ptr_ptr::class, int_ptr_ptr::class);
\class_alias(int32_t_ptr_ptr_ptr::class, int_ptr_ptr_ptr::class);
\class_alias(int32_t_ptr_ptr_ptr_ptr::class, int_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, size_t_ptr::class);
\class_alias(int64_t_ptr_ptr::class, size_t_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, size_t_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, size_t_ptr_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr::class, long_int_ptr::class);
\class_alias(int64_t_ptr_ptr::class, long_int_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr::class, long_int_ptr_ptr_ptr::class);
\class_alias(int64_t_ptr_ptr_ptr_ptr::class, long_int_ptr_ptr_ptr_ptr::class);
\class_alias(uint64_t_ptr::class, unsigned_long_int_ptr::class);
\class_alias(uint64_t_ptr_ptr::class, unsigned_long_int_ptr_ptr::class);
\class_alias(uint64_t_ptr_ptr_ptr::class, unsigned_long_int_ptr_ptr_ptr::class);
\class_alias(uint64_t_ptr_ptr_ptr_ptr::class, unsigned_long_int_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, ptrdiff_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, ptrdiff_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, ptrdiff_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, ptrdiff_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, wchar_t_ptr::class);
\class_alias(int_ptr_ptr::class, wchar_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, wchar_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, wchar_t_ptr_ptr_ptr_ptr::class);
\class_alias(string_::class, int_least8_t_ptr::class);
\class_alias(string_ptr::class, int_least8_t_ptr_ptr::class);
\class_alias(string_ptr_ptr::class, int_least8_t_ptr_ptr_ptr::class);
\class_alias(string_ptr_ptr_ptr::class, int_least8_t_ptr_ptr_ptr_ptr::class);
\class_alias(short_int_ptr::class, int_least16_t_ptr::class);
\class_alias(short_int_ptr_ptr::class, int_least16_t_ptr_ptr::class);
\class_alias(short_int_ptr_ptr_ptr::class, int_least16_t_ptr_ptr_ptr::class);
\class_alias(short_int_ptr_ptr_ptr_ptr::class, int_least16_t_ptr_ptr_ptr_ptr::class);
\class_alias(int_ptr::class, int_least32_t_ptr::class);
\class_alias(int_ptr_ptr::class, int_least32_t_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr::class, int_least32_t_ptr_ptr_ptr::class);
\class_alias(int_ptr_ptr_ptr_ptr::class, int_least32_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, int_least64_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, int_least64_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, int_least64_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, int_least64_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr::class, uint_least8_t_ptr::class);
\class_alias(unsigned_char_ptr_ptr::class, uint_least8_t_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr::class, uint_least8_t_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr_ptr::class, uint_least8_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_short_int_ptr::class, uint_least16_t_ptr::class);
\class_alias(unsigned_short_int_ptr_ptr::class, uint_least16_t_ptr_ptr::class);
\class_alias(unsigned_short_int_ptr_ptr_ptr::class, uint_least16_t_ptr_ptr_ptr::class);
\class_alias(unsigned_short_int_ptr_ptr_ptr_ptr::class, uint_least16_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr::class, uint_least32_t_ptr::class);
\class_alias(unsigned_int_ptr_ptr::class, uint_least32_t_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr::class, uint_least32_t_ptr_ptr_ptr::class);
\class_alias(unsigned_int_ptr_ptr_ptr_ptr::class, uint_least32_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uint_least64_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uint_least64_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uint_least64_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uint_least64_t_ptr_ptr_ptr_ptr::class);
\class_alias(string_::class, int_fast8_t_ptr::class);
\class_alias(string_ptr::class, int_fast8_t_ptr_ptr::class);
\class_alias(string_ptr_ptr::class, int_fast8_t_ptr_ptr_ptr::class);
\class_alias(string_ptr_ptr_ptr::class, int_fast8_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, int_fast16_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, int_fast16_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, int_fast16_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, int_fast16_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, int_fast32_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, int_fast32_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, int_fast32_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, int_fast32_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, int_fast64_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, int_fast64_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, int_fast64_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, int_fast64_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr::class, uint_fast8_t_ptr::class);
\class_alias(unsigned_char_ptr_ptr::class, uint_fast8_t_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr::class, uint_fast8_t_ptr_ptr_ptr::class);
\class_alias(unsigned_char_ptr_ptr_ptr_ptr::class, uint_fast8_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uint_fast16_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uint_fast16_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uint_fast16_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uint_fast16_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uint_fast32_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uint_fast32_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uint_fast32_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uint_fast32_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uint_fast64_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uint_fast64_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uint_fast64_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uint_fast64_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, intptr_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, intptr_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, intptr_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, intptr_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uintptr_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uintptr_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uintptr_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uintptr_t_ptr_ptr_ptr_ptr::class);
\class_alias(long_int_ptr::class, intmax_t_ptr::class);
\class_alias(long_int_ptr_ptr::class, intmax_t_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr::class, intmax_t_ptr_ptr_ptr::class);
\class_alias(long_int_ptr_ptr_ptr_ptr::class, intmax_t_ptr_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr::class, uintmax_t_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr::class, uintmax_t_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr::class, uintmax_t_ptr_ptr_ptr::class);
\class_alias(unsigned_long_int_ptr_ptr_ptr_ptr::class, uintmax_t_ptr_ptr_ptr_ptr::class);
\class_alias(struct_libsql_error_t::class, libsql_error_t::class);
\class_alias(struct_libsql_error_t_ptr::class, libsql_error_t_ptr::class);
\class_alias(struct_libsql_error_t_ptr_ptr::class, libsql_error_t_ptr_ptr::class);
\class_alias(struct_libsql_error_t_ptr_ptr_ptr::class, libsql_error_t_ptr_ptr_ptr::class);
\class_alias(struct_libsql_error_t_ptr_ptr_ptr_ptr::class, libsql_error_t_ptr_ptr_ptr_ptr::class);