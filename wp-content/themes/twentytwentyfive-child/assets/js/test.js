window.addEventListener('elementor/frontend/init', () => {
	console.log('✅ Elementor ready');

	setTimeout(() => {
		console.log('⏳ Waiting for widget...');

		elementorFrontend.hooks.addAction('frontend/element_ready/global', ($scope, $) => {
			console.log('🔥 A widget is ready!', $scope);
		});
	}, 100);
});
