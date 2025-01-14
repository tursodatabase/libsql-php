
#!/usr/bin/env sh

set -xe

cd libsql-c

cargo build

mkdir -p ../lib/aarch64-apple-darwin

cp ./target/aarch64-apple-darwin/debug/liblibsql.dylib ../lib/aarch64-apple-darwin/
