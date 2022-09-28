$(document).ready(function () {
	let mobile_menu = document.querySelector("#mobile-menu");

	document
		.querySelector(".mobile-menu-hamburger")
		.addEventListener("click", function () {
			mobile_menu.classList.toggle("visible");
		});

	document.querySelector(".close-menu").addEventListener("click", function (e) {
		mobile_menu.classList.remove("visible");
	});

	// Add smooth scrolling to all links
	$("a").on("click", function (event) {
		// Make sure this.hash has a value before overriding default behavior
		if (this.hash !== "") {
			// Prevent default anchor click behavior
			event.preventDefault();

			// Store hash
			var hash = this.hash;

			// Using jQuery's animate() method to add smooth page scroll
			// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
			$("html, body").animate(
				{
					scrollTop: $(hash).offset().top,
				},
				800
			);
		} // End if
	});
});
