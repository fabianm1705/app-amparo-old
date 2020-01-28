module.exports = {
	globDirectory: '/home/fabianm/public_html/',
	globPatterns: ['**/*.{js,css,png,jpg}','offline.html'],
	swSrc: '/home/fabianm/public_html/sw-base.js',
	swDest: '/home/fabianm/public_html/service-worker.js',
	globIgnores: [
		'../workbox-cli-config.js',
		'images/**',
    'app-amparo/**'
  ]
};
