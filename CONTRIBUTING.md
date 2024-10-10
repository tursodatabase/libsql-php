# Contributor Manual

Turso welcomes contributions from the community. This manual provides guidelines for contributing to `libsql-php` SDK.

Make sure to [join us on Discord](https://tur.so/discord-php) &mdash; (`#libsql-php` channel) to discuss your ideas and get help.

## Prerequisites

- PHP 8.3 or higher
- Composer

## Development

1. Fork and clone the repository
2. Install dependencies using `composer install`
3. Create a new branch for your feature or bug fix: `git switch -c my-new-feature`
4. Make changes and commit them with a clear commit message
5. Push your changes to your fork `git push origin my-new-feature`
6. Open a Pull Request on the main repository

## Running Tests

To run the test suite, use the following command:

```bash
composer test
```

This will execute PHPUnit tests located in the tests directory.
