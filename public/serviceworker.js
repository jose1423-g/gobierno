var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    './resources/views/vendor/laravelpwa/offline',    
    './build/assets/app-CLEQ3Vna.css',
    './build/assets/app-uzqnvh6b.css', 
    './build/assets/app-BGY8nuIQ.js',
    './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
    // './images/icons/logo_gobierno.jpg',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});