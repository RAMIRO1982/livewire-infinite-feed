# Livewire Infinite Feed

A reusable Livewire component that provides **infinite scroll** functionality for any Eloquent model.

Ideal for feeds, post-listings, news pages, and more.

---

## 🚀 Installation

You can install the package via Composer:

```bash
composer require ramiro1982/livewire-infinite-feed
```
If it's not yet published on Packagist, you can add it manually in your project's composer.json:

```json
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RAMIRO1982/livewire-infinite-feed"
  }
]
```

## 🧑‍💻 Basic Usage

```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    per-page="10" 
/>
```

### Optional parameters

- `per-page` *(int)*: Number of items per scroll (default: 10)
- `view` *(string)*: Blade view name to render each item


Example with custom view:

```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    view="components.post" 
/>
```

## 🎨 Overriding the Default View
You can override the built-in view by placing a file in your Laravel app at:

`resources/views/vendor/infinite-feed/feed.blade.php`

Laravel will use this file instead of the default one included in the package.

## ⚙️ Requirements
This component requires Alpine.js to handle scroll detection.

Make sure it's loaded in your layout:

```html
<script src="https://unpkg.com/alpinejs" defer></script>
```

Or via NPM if you're using Vite:
```bash
npm install alpinejs
```

Then, import it in your JavaScript entry file:
```javascript
// app.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```

## 📄 License

MIT © [RAMIRO1982](https://github.com/RAMIRO1982)
