<?php

function character_card(object $character)
{ ?>


    <div class="card <?php echo $character->status . ' ' . $character->gender; ?>">
        <img class="card-img-top" src="<?php echo $character->image; ?> " alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $character->name; ?>
            </h5>
            <p class="card-text">
            <ul>
                <li>Spieces:
                    <?php echo $character->species; ?>
                </li>
                <li>Location:
                    <?php echo $character->origin->name; ?>
                </li>
                <li>Status:
                    <?php echo $character->status; ?>
                </li>
            </ul>
            </p>
            <a href="/characters/single/<?php echo $character->id; ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>


<?php }

function get_search($type)
{ ?>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <div class="input-group">
                    <form action="/<?php echo $type; ?>/search/">
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" value=""
                                placeholder="Search <?php echo ucfirst($type); ?>" required>
                        </div>
                    </form>
                </div>
            </div>
            <?php echo get_filters(); ?>
        </div>
    </div>

<?php }

function get_filters()
{

    $request = trim($_SERVER['REQUEST_URI'], '/');
    $url = explode('/', $request);
    $controller = $url[0];

    switch ($controller) {
        case 'characters':
            echo character_filter();
            break;

        case 'locations':
            echo locations_filter();
            break;

        case 'episodes':
            echo episodes_filter();
            break;

    }


}

function character_filter()
{ ?>

    <div class="col-2">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Filter By Status
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/characters/search/?status=alive">Alive</a>
                <a class="dropdown-item" href="/characters/search/?status=dead">Dead</a>
                <a class="dropdown-item" href="/characters/search/?status=unknown">Unknown</a>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Filter By Gender
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/characters/search/?gender=female">Female</a>
                <a class="dropdown-item" href="/characters/search/?gender=male">Male</a>
                <a class="dropdown-item" href="/characters/search/?gender=genderless">Genderless</a>
            </div>
        </div>
    </div>

<?php }

function episodes_filter()
{ ?>

    <div class="col-2">
        <div class="dropdown">
            <form action="/episodes/search/">
                <div class="input-group">
                    <input type="text" class="form-control" name="episode" value="" placeholder="Filter by Code" required>
                </div>
            </form>
        </div>
    </div>

<?php }

function locations_filter()
{ ?>

    <div class="col-2">
        <div class="dropdown">
            <form action="/locations/search/">
                <div class="input-group">
                    <input type="text" class="form-control" name="type" value="" placeholder="Filter by Type" required>
                </div>
            </form>
        </div>
    </div>
    <div class="col-2">
        <form action="/locations/search/">
            <div class="input-group">
                <input type="text" class="form-control" name="dimension" value="" placeholder="Filter by Dimension"
                    required>
            </div>
        </form>
    </div>

<?php }