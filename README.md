# Livewire Infinite Feed

A reusable Livewire component that provides **infinite scroll** functionality for any Eloquent model.

Ideal for feeds, post-listings, news pages, and more.

---

## 🚀 Installation

You can install the package via Composer:

```bash
composer require ramiro1982/livewire-infinite-feed:^0.3.0
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

## ⚙️ Props
- `per-page` *(int)*: Number of items per scroll (default: 10)
- `view` *(string)*: Blade view name to render each item
- `placeholder` *(string)*: View shown as placeholder during lazy loading — requires using the `lazy` attribute
- `with` *(array)*: Relationships to eager load

⚠️ Use the `:` prefix in Blade to pass the with parameter as a PHP array:
```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    :with="['author', 'tags']"
/>
```

## 🎨 Customizing the View
You can customize the item rendering by providing a custom Blade view:

```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    view="components.post" 
/>
```

## 🕳️ Placeholder View
To show a placeholder while the component loads, provide a custom view and use `lazy`:
```blade
<livewire:infinite-feed 
    model="App\\Models\\Post"
    placeholder="components.feed-placeholder"
    lazy
/>
```

## 🧩 Overriding the Default View and Placeholder
To customize the default views, publish them with:

```bash
php artisan vendor:publish --tag=views
```
This will copy the files to:
- `resources/views/vendor/infinite-feed/feed.blade.php`
- `resources/views/vendor/infinite-feed/placeholder.blade.php`

The default view uses [Tailwind CSS](https://tailwindcss.com/) and [Flux UI](https://fluxui.dev) components.

## ⚙️ Requirements
This component requires Alpine.js to handle scroll detection.

### Via CDN:

```html
<script src="https://unpkg.com/alpinejs" defer></script>
```

### Or via NPM (Vite):
```bash
npm install alpinejs
```

```javascript
// app.js
import Alpine from 'alpinejs'
window.Alpine = Alpine
Alpine.start()
```

## 🔄 Refreshing the Feed
If your application allows creating new items via another component, you can automatically refresh the feed by dispatching the `item-added` event.

---
## 📄 License
MIT © [RAMIRO1982](https://github.com/RAMIRO1982)
