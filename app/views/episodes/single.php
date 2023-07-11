<?php $data = $this->view_data; ?>

<?php echo get_search('episodes'); ?>

<section class="single characters">
    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <h1><strong>
                        <?php echo $data->episode ?>
                    </strong>
                    <?php echo $data->name; ?>
                </h1>

            </div>

        </div>
    </div>
</section>
<?php if (!empty($data->characterProfiles->response)) { ?>

    <section class="archive characters residents">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <h2>
                    Cast
                </h2>
            </div>
        </div>

        <div class="row">
            <?php foreach ($data->characterProfiles->response as $key => $character) { ?>

                <div class="col-md-4">

                    <?php echo character_card($character); ?>

                </div>


            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>