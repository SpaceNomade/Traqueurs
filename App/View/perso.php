<div class="uk-container uk-text-center">
    <h1>Perso View</h1>
</div>

<div uk-grid>
    <div class="uk-width-1-3">
        <div class="uk-card uk-card-default">
            <div class="uk-card-badge uk-label uk-label-red"><?= $perso->classe ?></div>
            <div class="uk-card-media-top">
                <img src="https://placeimg.com/480/200/people" alt="none">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title"><?= $perso->nom ?></h3>
                <p><?= $perso->description ?></p>
                <ul class="uk-list uk-list-divider">
                    <li><i class="fas fa-heart"></i> <?= $perso->vie ?></li>
                    <li><i class="fas fa-khanda"></i> <?= $perso->attaque ?></li>
                    <li><i class="fas fa-shield-alt"></i> <?= $perso->armure ?></li>
                </ul>
            </div>
        </div>
    </div> 
    <div class="uk-width-2-3">
        
    </div> 
</div>

