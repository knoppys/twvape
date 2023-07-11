<?php echo get_search('episodes'); ?>

<section class="archive episode">
    <div class="container">

        <div class="row">
            <?php foreach ($this->view_data->results as $key => $episode) { ?>

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

<section class="archive pagination">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if (isset($this->view_data->info->prev)) { ?>
                    <a class="btn btn-primary paginate"
                        href="/characters/page/<?php echo get_page_no($this->view_data->info->prev); ?>">Previous</a>
                <?php } ?>
                <?php if (isset($this->view_data->info->next)) { ?>
                    <a class="btn btn-primary paginate"
                        href="/characters/page/<?php echo get_page_no($this->view_data->info->next); ?>">Next</a>
                <?php } ?>
            </div>
        </div>
    </div>

</section>