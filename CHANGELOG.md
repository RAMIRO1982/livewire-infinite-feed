# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),  
and this project adheres to [Semantic Versioning](https://semver.org/).

---

## [0.4.2] - 2025-06-30

### Fixed
- Ensured items are appended correctly on scroll after many items have been loaded.

## [0.4.1] - 2025-06-30

### Fixed
- Ensured items are appended correctly on scroll by enforcing ordering in query builder.


## [0.4.0] - 2025-06-30

### Added
- Required parameter `item-view` to define the Blade partial used for rendering each item.
- Automatic variable name generation based on model class name (e.g., `Post` → `post`) when passing item to the included view.
- Placeholder support for lazy loading via the `placeholder` parameter and Livewire’s `placeholder()` method.
- Added listener for `item-added` event to automatically refresh the feed.

### Changed
- Removed optional full view override (`view` parameter) to simplify usage. Now only `item-view` is required and used inside a consistent feed layout.

### Fixed
- Clarified README instructions for required and optional parameters.
- Improved README structure and usage examples.

### Removed
- Removed ability to override the entire feed layout via `view` parameter to enforce a consistent structure.

---

## [v0.3.0] - 2025-06-30

### Added
- Support for `placeholder` view via Livewire's `lazy` loading mechanism
- New public `placeholder()` method in the component
- Automatic feed refreshing when dispatching the `item-added` event, via built‑in `$listeners`
- `placeholder` parameter documented in README
- Published `placeholder.blade.php` view

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
