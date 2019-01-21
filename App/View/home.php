<div class="uk-container uk-container-medium">
    <h1>Home view !</h1>
    <div class="uk-grid-large uk-child-width-1-3 uk-grid-match" uk-grid>

    <?php foreach($persos as $perso): ?>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <div class="uk-card-header">
                    <div class="uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <img class="uk-border-circle" width="50" height="50" src="https://placeimg.com/50/50/people">
                        </div>
                        <div class="uk-width-expand">
                            <h3 class="uk-card-title uk-margin-remove-bottom"><?= $perso->nom ?></h3>
                            <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p>
                        </div>
                    </div>
                </div>
                <div class="uk-card-body">
                    <p><?= substr($perso->description, 0, 50).'...' ?></p>
                </div>
                <div class="uk-card-footer">
                    <a href="persos/<?= $perso->id ?>" class="uk-button uk-button-text">Pick your character</a>
                </div>
            </div>
        </div>
    <?php endforeach;?>
    
    </div>
</div>