<section class="homecharacters">
	<div class="container">

		<div class="row">
			<?php foreach ($this->view_data->results as $key => $character) {
				?>

				<div class="col-md-4">

					<?php echo character_card($character); ?>

				</div>

				<?php
				if ($key == 2) {
					break;
				}
			} ?>
		</div>
		<div class="row">
			<div class="col-12">
				<center>
					<a class="btn btn-primary" href="/characters">
						View All Characters
					</a>
				</center>
			</div>
		</div>


		
	</div>
</section>
