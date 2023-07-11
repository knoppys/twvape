<?php $data = $this->view_data; ?>

<?php echo get_search('characters'); ?>

<section class="single characters">
    <div class="container">

        <div class="row">

            <div class="col-sm-9">

                <h1>
                    <?php echo $data->name; ?>
                </h1>

                <h3>Basic Info.</h3>
                <ul>
                    <li>Spieces:
                        <?php echo $data->species; ?>
                    </li>
                    <li>Location:
                        <?php echo $data->origin->name; ?>
                    </li>
                    <li>Status:
                        <?php echo $data->status; ?>
                    </li>
                </ul>
                
            </div>

            <div class="col-sm-3">

                <div class="profile-image">

                    <img src="<?php echo $data->image; ?>">

                </div>

            </div>

        </div>
    </div>
</section>

<?php if (!empty($data->episodes->response)) { ?>

    <section class="single characters">

        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>
                        Appeareances
                    </h2>
                </div>
            </div>

            <div class="row">
                <?php foreach ($data->episodes->response as $key => $episode) { ?>

                    <div class="col-md-4">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <strong>
                                        <?php echo $episode->episode ?>
                                    </strong>
                                    <?php echo $episode->name; ?>
                                </h5>
                                <p class="card-text">
                                <ul>
                                    <li>Air Date:
                                        <?php echo $episode->air_date; ?>
                                    </li>
                                </ul>
                                </p>
                                <a href="/episodes/single/<?php echo $episode->id; ?>" class="btn btn-primary">Characters</a>
                            </div>
                        </div>

                    </div>


                <?php } ?>
            </div>
        </div>

    </section>

<?php } ?>