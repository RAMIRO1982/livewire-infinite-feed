# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),  
and this project adheres to [Semantic Versioning](https://semver.org/).

---

## [v0.2.1] - 2025-06-29

### Added
- Support for `cursorPaginate()` instead of traditional pagination
- Alpine `x-intersect` support for infinite scroll
- Publishing support via `php artisan vendor:publish --tag=views`
- Documentation: updated README with advanced usage examples

### Fixed
- Improved internal structure for more reliable pagination handling

---

## [v0.1.1] - 2025-06-29

### Added
- Support for the `with` prop to eager load Eloquent relationships
- Blade syntax now allows passing `with` as an array
- Updated README to document new usage

---

## [v0.1.0] - 2025-06-27

### Added
- Initial release of the Livewire Infinite Feed component
- Basic pagination and infinite scroll with IntersectionObserver
- Customizable Blade view support
- View overriding via `resources/views/vendor/infinite-feed/feed.blade.php`
- Alpine.js requirement noted in documentation
