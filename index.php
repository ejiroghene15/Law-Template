<?php
require_once "./conn.php";
$services_query = $db->query("SELECT `slug`, `display_name`, `logo` FROM `services`");
$services = $services_query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<!-- // * Head section  -->
<?php include_once "./includes/head.php" ?>

<body>
	<section id="grid-page-container">
		<!-- // * Navbar  -->
		<?php include_once "./includes/services.nav.php" ?>

		<!-- // * Main Body` -->
		<main id="main-content">
			<div id="intro" class="info-section">
				<section>
					<h2 class="headings">
						A New Age Innovative Law Firm
					</h2>
					<p>
						We Diligently back and protect you from the future and meet your legal needs with sheer efficiency in delivering the best possible results.
					</p>
					<a href="#more-info" class="btn-link primary">CONTACT US</a>
				</section>
				<aside>
					<img src="./assets/imgs/banner_1.jpg" alt="" class="intro_img" />
				</aside>
			</div>

			<div id="about-us" class="info-section">
				<section>
					<h2 class="headings">
						<small>ABOUT US</small> <br />
						<span>Why Metalex Legal Is Right For You</span>
					</h2>
					<p>
						Metalex Legal provides expert legal advice in technology and corporate matters for individuals, startups, existing SMEs in the process scaling and big corporations.
					</p>
					<p>
						We work at an international level and offer full legal support to companies setting up in Nigeria.
						Our expertise cuts across but not limited to a full range of technology and corporate matters from transfer of technology and intellectual property to incorporation, mergers, acquisitions, investment, shareholders’ agreements, buybacks, capital reductions, complex group reorganization, commercial contract reviews and dispute resolution.
					</p>
				</section>
				<aside>
					<img src="./assets/imgs/banner_2.jpg" alt="" class="intro_img" />
				</aside>
			</div>

			<div id="area-of-practice" class="info-section">
				<section>
					<h2 class="headings">
						<small>SERVICES</small> <br />
						<span>Areas of Practice</span>
					</h2>
					<div class="card-grid">
						<?php foreach ($services as $service) : ?>
							<a href="./service/<?php echo $service->slug ?>" target="_blank" class="card">
								<img src="<?php echo BASE_PATH ?>assets/imgs/icons/<?php echo $service->logo ?>" alt="<?php echo $service->logo ?>" />
								<h3 class="headings"><?php echo $service->display_name ?></h3>
							</a>
						<?php endforeach; ?>
					</div>
				</section>
			</div>

			<div id="case-results" class="info-section">
				<section>
					<h2 class="headings">
						<small>SUCCESSFUL CASE RESULTS</small> <br />
						<span>Maintaining a record of success</span>
					</h2>
					<p>
						Aliqua culpa cillum amet elit dolore quis sint labore ea eiusmod
						pariatur sit qui ut. Laborum est ad aliquip anim qui. Nisi magna
						exercitation adipisicing reprehenderit exercitation sit veniam
						deserunt
					</p>
					<a href="#more-info">Send us a Message</a>
				</section>
				<aside>
					<div class="four-sections">
						<h3>$124M</h3>
						<p>Won for unpaid workers</p>
					</div>

					<div class="four-sections">
						<h3>$110M</h3>
						<p>Won for unpaid workers</p>
					</div>

					<div class="four-sections">
						<h3>$90M</h3>
						<p>Won for unpaid workers</p>
					</div>

					<div class="four-sections">
						<h3>$75M</h3>
						<p>Won for unpaid workers</p>
					</div>
				</aside>
			</div>

			<div id="our-team" class="info-section">
				<section>
					<h2 class="headings">
						<small>OUR TEAM</small> <br />
						<span>Meet our team of Experts</span>
					</h2>
					<div class="card-grid">
						<div class="card">
							<figure>
								<img src="./assets/imgs/team/akpos.jpg" alt="" />
							</figure>
							<h5 class="headings">Kohwo Akpofure</h5>
							<p>Founder</p>
						</div>

						<div class="card">
							<figure>
								<img src="./assets/imgs/team/partner_2.jpg" alt="" />
							</figure>
							<h5 class="headings">Orobosa Ebowe</h5>
							<p>Senior Associate</p>
						</div>

						<div class="card">
							<figure>
								<img src="./assets/imgs/team/felliot.jpg" alt="" />
							</figure>
							<h5 class="headings">Frank Ogheneruemu</h5>
							<p>Associate</p>
						</div>

						<div class="card">
							<figure>
								<img src="./assets/imgs/team/ella.jpg" alt="" />
							</figure>
							<h5 class="headings">Emmanuella Okonopa</h5>
							<p>Chief Operating Officer</p>
						</div>

						<div class="card" hidden>
							<figure>
								<img src="./imgs/secretary.png" alt="" />
							</figure>
							<h5 class="headings">Keri Powell</h5>
							<p>Secretary</p>
						</div>
					</div>
				</section>
			</div>

			<div id="testimonial" class="info-section">
				<section>
					<h2 class="headings">
						<small>TESTIMONIALS</small> <br />
						<span>See what people are saying</span>
					</h2>
					<div class="card-grid">
						<div class="card _carousel">
							<img src="./imgs/blockquote.svg" alt="" />
							<p>
								Aliqua culpa cillum amet elit dolore quis sint labore ea eiusmod
								pariatur sit qui ut. Laborum est ad aliquip anim qui.
							</p>
							<h3 class="headings">
								Derrick Johnson
								<br />
								<small> CEO, Lacoste </small>
							</h3>
						</div>
						<div class="card _carousel">
							<img src="./imgs/blockquote.svg" alt="" />
							<p>
								Aliqua culpa cillum amet elit dolore quis sint labore ea eiusmod
								pariatur sit qui ut. Laborum est ad aliquip anim qui.
							</p>
							<h3 class="headings">
								Roseline Moore
								<br />
								<small> Founder, Daisies </small>
							</h3>
						</div>
					</div>
				</section>
				<p class="indicators">
					<span>
						<input type="radio" name="c" class="carousel-check" checked /><span class="active"></span>
					</span>
					<span>
						<input type="radio" name="c" class="carousel-check" value="1" /><span></span>
					</span>
				</p>
			</div>

			<div id="more-info" class="info-section">
				<section>
					<div class="card-grid">
						<div class="card" id="contact-info">
							<img src="./assets/imgs/logos/full_logo.png" height="50" alt="" style="margin-left: -1em;" />
							<p>
								Aliqua culpa cillum amet elit dolore quis sint labore ea eiusmod
								pariatur sit qui ut. Laborum est ad aliquip anim qui.
							</p>
							<div class="contact-info">
								<p>
									<img src="./imgs/location-marker.svg" alt="location" />
									<span>358, Beverly View, New York</span>
								</p>
								<p>
									<img src="./imgs/phone-receiver.svg" alt="phone" />
									<span>+234-705-983-8239</span>
								</p>
								<p>
									<img src="./imgs/close-envelope.svg" alt="mail" />
									<span>hello@metalex.com</span>
								</p>
							</div>
						</div>

						<div class="card" id="quick-links">
							<h3 class="headings">Quick links</h3>
							<ul>
								<li><a href="#intro">Home</a></li>
								<li><a href="#about-us">About us</a></li>
								<li><a href="#area-of-practice">Services</a></li>
								<li><a href="#our-team">Our team</a></li>
							</ul>
						</div>

						<div class="card" id="contact-form">
							<h3 class="headings">Get in touch</h3>
							<form method="POST">
								<section class="form-group">
									<label for="">Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter full name" />
								</section>
								<section class="form-group">
									<label for="">Email address</label>
									<input type="text" name="email" class="form-control" placeholder="Enter email address" />
								</section>
								<section class="form-group">
									<label for="">Message</label>
									<textarea rows="7" name="message" class="form-control" placeholder="Type your message"></textarea>
								</section>
								<button type="submit"> Send Message </button>
							</form>
						</div>
					</div>
				</section>
			</div>
		</main>

		<!-- // * Footer  -->
		<?php include_once "./includes/footer.php" ?>
	</section>
	<!-- // * Scripts  -->
	<?php include_once "./includes/scripts.php" ?>
</body>

</html>