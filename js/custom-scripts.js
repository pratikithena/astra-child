jQuery(document).ready(function($) {
    
	//// ********** impacting-industries - start ********** ////
	const images = [
		{
			src: '/wp-content/uploads/2025/07/Process-Industries.png',
			srcset: '/wp-content/uploads/2025/07/Process-Industries.png 557w, https://dev.ithena.io//wp-content/uploads/2025/07/Process-Industries-300x296.png 300w'
		},
		{
			src: '/wp-content/uploads/2025/07/Discrete-Manufacturing.png',
			srcset: '/wp-content/uploads/2025/07/Discrete-Manufacturing.png 557w, https://dev.ithena.io//wp-content/uploads/2025/07/Discrete-Manufacturing-300x296.png 300w'
		},
		{
			src: '/wp-content/uploads/2025/07/AI-in-FinServ.png',
			srcset: '/wp-content/uploads/2025/07/AI-in-FinServ.png 557w, https://dev.ithena.io//wp-content/uploads/2025/07/AI-in-FinServ-300x296.png 300w'
		}
	];

	$('#impacting-industries .elementor-accordion-item').on('click', function () {
		const $clickedItem = $(this);

		// Skip if already active
		if ($clickedItem.hasClass('active-accord')) return;

		const index = $clickedItem.index();
		const imgData = images[index];
		const $img = $('#impact-industry-imgs .elementor-widget-container img');

		if (imgData) {
			$img.fadeOut(200, function () {
				$img.attr({
					src: imgData.src,
					srcset: imgData.srcset
				}).fadeIn(200);
			});
		}

		$('#impacting-industries .elementor-accordion-item').removeClass('active-accord');
		$clickedItem.addClass('active-accord');
	});

	//// ********** impacting-industries - end ********** ////
	
	//// ****** AI Built for How You Work - start (works only for desktop) ********* ////
	if (window.innerWidth > 768) {
		const items = $('.section-what-can-you-do .elementor-icon-list-item');
		let index = 0;

		function activateItem(i) {
			items.removeClass('active');
			const currentItem = items.eq(i);

			// Force animation restart
			void currentItem[0].offsetWidth;
			currentItem.addClass('active');
		}

		// Initial active item
		activateItem(index);

		// Rotate every 3 seconds
		setInterval(function () {
			index = (index + 1) % items.length;
			activateItem(index);
		}, 3000);
	}
	//// ****** AI Built for How You Work - end (works only for desktop) ********* ////
	
	// Mobile JS
	 if (window.innerWidth <= 768) {
		 
		/**** AI-in-action - start *****/
		const $cards = $(".card-grid .card");
		const observer = new IntersectionObserver((entries) => {
		  $cards.each(function () {
			const $card = $(this);
			$card.removeClass("mobile-hovered")
				 .css("background-color", ""); // reset background
			$card.find(".card-hover").css({
			  opacity: 0,
			  zIndex: 1,
			  transform: "scale(0.98)"
			});
			$card.find(".card-normal").css({
			  opacity: 1,
			  zIndex: 2,
			  transform: "scale(1)"
			});
		  });

		  entries.forEach(entry => {
			if (entry.isIntersecting) {
			  const $target = $(entry.target);
			  $target.addClass("mobile-hovered")
					 .css("background-color", "#0082c8");

			  $target.find(".card-hover").css({
				opacity: 1,
				zIndex: 3,
				transform: "scale(1)"
			  });

			  $target.find(".card-normal").css({
				opacity: 0,
				zIndex: 1,
				transform: "scale(1.02)"
			  });
			}
		  });
		}, {
		  root: null,
		  rootMargin: "-50% 0px -50% 0px",
		  threshold: 0
		});

		$cards.each(function () {
		  observer.observe(this);
		});
	  }
	
});
