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
- `with` *(array)*: Relationships to eager load

⚠️ Use the `:` prefix in Blade to pass the with parameter as a PHP array:
```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    :with="['author', 'tags']"
/>
```

## 🎨 Customizing the View
You can customize the item rendering by providing a view prop:

```blade
<livewire:infinite-feed 
    model="App\\Models\\Post" 
    view="components.post" 
/>
```

## 🧩 Overriding the Default View
You can customize the item rendering by publishing the Blade view file into your Laravel app:

```bash
php artisan vendor:publish --tag=views
```
This will copy the view file to:
`resources/views/vendor/infinite-feed/feed.blade.php`. The default view uses [Tailwind CSS](https://tailwindcss.com/) and [Flux UI](https://fluxui.dev) components.

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
