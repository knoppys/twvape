<?php $data = $this->view_data; ?>

<?php echo get_search('locations'); ?>

<section class="single location">
    <div class="container">

        <div class="row">

            <div class="col-12">

                <h1>
                    <?php echo $data->name; ?>
                </h1>

                <h3>Basic Info.</h3>
                <ul>
                    <li>Type:
                        <?php echo $data->type; ?>
                    </li>
                    <li>Dimension:
                        <?php echo $data->dimension; ?>
                    </li>
                </ul>

            </div>

        </div>
    </div>
</section>

<section class="archive characters residents">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2>
                    Residents of
                    <?php echo $data->name; ?>
                </h2>
            </div>
        </div>

        <div class="row">
            <?php foreach ($data->residentProfiles->response as $key => $character) { ?>

                <div class="col-md-4">

                    <?php echo character_card($character); ?>

                </div>


            <?php } ?>
        </div>
    </div>
</section>