<?php echo get_search('locations'); ?>

<section class="archive locations">
    <div class="container">

        <div class="row">
            <?php foreach ($this->view_data->results as $key => $location) { ?>

                <div class="col-md-4">

                    <div class="card ">
                        
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $location->name; ?>
                            </h5>
                            <p class="card-text">
                            <ul>
                                <li>Type: <?php echo $location->type; ?></li>
                                <li>Dimension: <?php echo $location->dimension; ?></li>
                            </ul>
                            </p>
                            <a href="/locations /single/<?php echo $location->id; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>

                </div>


            <?php } ?>
        </div>
    </div>
</section>

<section class="archive pagination">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (isset($this->view_data->info->prev)) { ?>
                    <a class="btn btn-primary paginate"
                        href="/locations/page/<?php echo get_page_no($this->view_data->info->prev); ?>">Previous</a>
                <?php } ?>
                <?php if (isset($this->view_data->info->next)) { ?>
                    <a class="btn btn-primary paginate"
                        href="/locations/page/<?php echo get_page_no($this->view_data->info->next); ?>">Next</a>
                <?php } ?>
            </div>
        </div>
    </div>

</section>