$(document).ready(function () {

	let mobile_menu = document.querySelector("#mobile-menu");
	// * Add smooth scrolling to all links
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

	// * Toggle the mobile menu icon
	document
		.querySelector(".mobile-menu-hamburger")
		.addEventListener("click", function () {
			mobile_menu.classList.toggle("visible");
		});

	$(".navlist li").click(function () {
		$(".navlist li.active").removeClass("active");
		$(this).addClass("active");
	});

	$(".carousel-check").click(function () {
		let index = $(".carousel-check").index(this);
		let calc = +index * 100;
		$("._carousel").animate({
			left: `-${calc}%`,
		});
	});

	// * Submit contact message
	$("#contact-form form").submit(function (e) {
		e.preventDefault();
		let form_data = $(this).serializeArray();
		let check_data = form_data.filter((data) => data.value.trim() !== "");
		if (check_data.length !== form_data.length) {
			return swal({
				text: "All fields are required",
				icon: "error",
			});
		}

		//? Show the Lottie icon showing mail in progress
		swal({
			title: "Sending Message",
			button: false,
			content: {
				element: "lottie-player",
				attributes: {
					src: "https://assets7.lottiefiles.com/packages/lf20_78obvmke.json",
					loop: true,
					autoplay: true,
					background: "transparent",
					style: "height: 200px",
				},
			},
		});

		$.post("./ajax/contact_us.php", form_data).then((res) => {
			res = JSON.parse(res);
			setTimeout(() => {
				if (res.status == 1) {
					contact_form.reset();
					return swal({
						text: `${res.message}`,
						icon: "success",
					});
				}
				return swal({
					text: `${res.message}`,
					icon: "error",
				});
			}, 3000);
		});
	});
});
