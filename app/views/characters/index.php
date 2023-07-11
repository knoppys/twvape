<?php echo get_search('characters'); ?>

<section class="archive characters">
    <div class="container">

        <div class="row">
            <?php foreach ($this->view_data->results as $key => $character) { ?>

                <div class="col-md-4">

                    <?php echo character_card($character); ?>

                </div>


            <?php } ?>
        </div>
    </div>
</section>

<section class="archive pagination">
    <?php pre($this->view_data->info); ?>

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