<?php
$testimonials = [
	[
		"author" => "Oreva U",
		"body" => "I needed a Law Firm for a real estate and property transaction and I am glad to say Metalex Legal was a great choice. With the team of dedicated lawyers, the service delivery was great and satisfactory"
	],

	[
		"author" => "Koffi M",
		"body" => "Metalex Legal is definitely one of the best tech and corporate law firm in Nigeria my company have worked. Accessing their professional legal services from anywhere is effectively made possible via their virtual platforms. Metalex Legal facilitated the process of selling our products and made extending our business operations to Nigeria easy"
	],

	[
		"author" => "Alvin A",
		"body" => "A law firm like Metalex Legal that has effectively adopted technology in their professional legal offerings will definitely remain relevant as the practice of law evolves globally"
	],

	[
		"author" => "Vera S",
		"body" => "Metalex Legal handled the incorporation of my company and other incorporation matters. All I can say is, with Metalex Legal the best possible results are guaranteed"
	],

	[
		"author" => "Abiodun I",
		"body" => "Metalex Legal seems to put their clients and the Law on the same pedestal. The team gives quality legal advice with due considerations on the Laws"
	],

	[
		"author" => "Tobore L",
		"body" => "Retained the services of the firm for my company’s corporate regulatory compliance and we have had the best work experience so far"
	]

];
shuffle($testimonials);
foreach ($testimonials as $t) :
?>
	<div class="card _carousel">
		<img src="./imgs/blockquote.svg" alt="" />
		<p>
			<?php echo $t['body'] ?>
		</p>
		<h3 class="headings">
			<small style="font-size: 20px;"><?php echo $t['author'] ?></small>
		</h3>
	</div>

<?php
endforeach;
