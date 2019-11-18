importScripts(
	'https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js'
);

workbox.precaching.precacheAndRoute([
  {
    "url": "css/app-amparo.css",
    "revision": "1dfa3481a3090e0f00c6b59545bee693"
  },
  {
    "url": "css/app.css",
    "revision": "55972315e7b86f585b78d3e71bd5be42"
  },
  {
    "url": "js/app.js",
    "revision": "0ff4fed9892a429a027a0140c180c3bc"
  },
  {
    "url": "material/js/bootstrap.min.js",
    "revision": "e47e17c7d6dc2f22796754334f06ef8e"
  },
  {
    "url": "material/js/core/bootstrap-material-design.min.js",
    "revision": "479f5022008b8d4b6ef6f2d406ead5cf"
  },
  {
    "url": "material/js/core/jquery.min.js",
    "revision": "986d2baef41aa37ae02ab33355413b98"
  },
  {
    "url": "material/js/core/popper.min.js",
    "revision": "10a554dd975faf4004fc557d7cf8c998"
  },
  {
    "url": "material/js/envioForm.js",
    "revision": "c64186225bb3e7cc1377a49a637d6a20"
  },
  {
    "url": "material/js/form_object.js",
    "revision": "9e39c4405efb929d1a97c68c7c52d82d"
  },
  {
    "url": "material/js/material-kit.js",
    "revision": "03b428e1babd3fe4771b7c5a62288696"
  },
  {
    "url": "material/js/material-kit.min.js",
    "revision": "869129d75f741aeb914db9e726bf7c6a"
  },
  {
    "url": "material/js/material.min.js",
    "revision": "2f896bf7aa84a288fc71a6b302f06c91"
  },
  {
    "url": "material/js/plugins/bootstrap-datetimepicker.js",
    "revision": "14382219d09a6c2272e95a95a6bbc5c8"
  },
  {
    "url": "material/js/plugins/bootstrap-selectpicker.js",
    "revision": "b880760095ac3d4ccf31bed886c0161a"
  },
  {
    "url": "material/js/plugins/bootstrap-tagsinput.js",
    "revision": "ada40916745c321bce2c3920c5dc9bab"
  },
  {
    "url": "material/js/plugins/jasny-bootstrap.min.js",
    "revision": "290771f24de1f08dfddd81871442355c"
  },
  {
    "url": "material/js/plugins/jquery.flexisel.js",
    "revision": "18d345ee57a756ceb749f036ff8c31e2"
  },
  {
    "url": "material/js/plugins/moment.min.js",
    "revision": "234c4f6c148398f299e8ba0911e2fc3b"
  },
  {
    "url": "material/js/plugins/nouislider.min.js",
    "revision": "e7a013b83fd3efa2dbe243cb0f446c52"
  },
  {
    "url": "material/material-kit.css",
    "revision": "8834050e94a5e2db93990635509bad04"
  },
  {
    "url": "sw-base.js",
    "revision": "a9159f0348a9300e3404caf69a4d6b69"
  },
  {
    "url": "offline.html",
    "revision": "e237ae2d8c06140f9cbf9fe560297483"
  },
  {
    "url": "/welcome",
    "revision": "3bb220ccc4f81a6f4771f31b03942155"
  },
  {
    "url": "/contacto",
    "revision": "6bcf29a275d23e77534e2726975676e1"
  },
  {
    "url": "/home",
    "revision": "45badbdf21eeef095a1bc3568c3346bf"
  },
  {
    "url": "/app",
    "revision": "95deffc861035dd317bda3606a66b63f"
  },
  {
    "url": "/doctorsmostrar",
    "revision": "384f1baee98442f96fc5177752539e87"
  },
  {
    "url": "/orderscrear",
    "revision": "3cea413effe52b15b2913e940500981c"
  },
  {
    "url": "/ordersindice",
    "revision": "bb17334df31bd2b3da2988a3599d841c"
  },
  {
    "url": "/shopping",
    "revision": "a0b5f1f9399d59995e9c8ff52199b746"
  },
  {
    "url": "/login",
    "revision": "518c7d39b19367867141fa22047dfbbd"
  }
]);

workbox.routing.registerRoute(
	new RegExp('/images/'),
	new workbox.strategies.StaleWhileRevalidate({
		cacheName: 'images',
		plugins: [
			new workbox.expiration.Plugin({
				maxEntries: 15
			}),
			new workbox.cacheableResponse.Plugin({
				statuses: [200]
			})
		]
	})
);

const networkFirstHandler = new workbox.strategies.NetworkFirst({
	cacheName: 'dynamic',
	plugins: [
		new workbox.expiration.Plugin({
			maxEntries: 10
		}),
		new workbox.cacheableResponse.Plugin({
			statuses: [200]
		})
	]
});

const FALLBACK_URL = workbox.precaching.getCacheKeyForURL('/offline.html');
const matcher = ({ event }) => event.request.mode === 'navigate';
const handler = args =>
	networkFirstHandler
		.handle(args)
		.then(response => response || caches.match(FALLBACK_URL))
		.catch(() => caches.match(FALLBACK_URL));

workbox.routing.registerRoute(matcher, handler);
