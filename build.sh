#!/usr/bin/env sh

set -xe

cd libsql-c

./build.sh

rm -rf ../lib

mkdir -p \
  ../lib/aarch64-unknown-linux-gnu \
  ../lib/x86_64-unknown-linux-gnu \
  ../lib/aarch64-apple-darwin \
  ../lib/x86_64-apple-darwin \
  ../lib/x86_64-pc-windows-gnu

cp ./libsql.h ../lib/libsql.h
cp ./target/aarch64-unknown-linux-gnu/release/liblibsql.so ../lib/aarch64-unknown-linux-gnu/
cp ./target/x86_64-unknown-linux-gnu/release/liblibsql.so ../lib/x86_64-unknown-linux-gnu/
cp ./target/aarch64-apple-darwin/release/liblibsql.dylib ../lib/aarch64-apple-darwin/
cp ./target/x86_64-apple-darwin/release/liblibsql.dylib ../lib/x86_64-apple-darwin/
cp ./target/x86_64-pc-windows-gnu/release/libsql.dll ../lib/x86_64-pc-windows-gnu/
