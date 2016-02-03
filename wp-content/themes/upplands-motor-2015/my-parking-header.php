<div class="contain"></div>

<div class="mp-top-button">
    <span class="parking-icon">P</span>
    <span class="parking-text light">Min P-plats</span>
</div>

<div class="mp-container">
<span class="myparking-close"></span>
    <div class="mp-favorites col-sm-8">
        <div class="wrapper col-sm-offset-1 col-sm-11">
            <h2><?php the_field('favorites-headertext', 'options'); ?></h2>
            <p><?php the_field('favorites-bodytext', 'options'); ?></p>
            <div class="mp-tabs">
                <div class="mp-vehicles mp-tab mp-button active" data-tabid="mp-vehicles">
                    <i class="icon icon-cab"></i>
                    <p><strong>Fordon</strong> (<span class="mp-vehicles-amount">0</span>)</p>
                </div>
                <div class="mp-offers mp-tab mp-button" data-tabid="mp-offers">
                    <i class="icon icon-folder"></i>
                    <p><strong>Erbjudanden</strong> (<span class="mp-offers-amount">0</span>)</p>
                </div>
                <div class="mp-subscriptions mp-tab mp-button" data-tabid="mp-subscriptions">
                    <i class="icon icon-eye"></i>
                    <p><strong>Bevakningar</strong> (<span class="mp-search-amount">0</span>)</p>
                </div>
                <div class="mp-settings mp-tab mp-button settings" data-tabid="mp-settings">
                    <i class="icon icon-cog"></i>
                    <p><strong>Hämta/Ta bort favoriter</strong></p>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="mp-vehicles-content tab-content active">
                <p class="mobile-headline"><strong>Fordon</strong></p>
                <ul></ul>
                <a class="mp-button compare" href="/bilar/bilar-i-lager/jamforelsesida/#?id=">
                    <i class="icon icon-chart-bar"></i>
                    <p><strong>Gå till jämförelse</strong> (<span id="mp-comparison-amount" class="mp-comparison-amount">0</span>)</p>
                    <div style="clear:both;"></div>
                </a>
            </div>
            <div class="mp-offers-content tab-content">
                <p class="mobile-headline"><strong>Erbjudanden</strong></p>
                <ul></ul>
            </div>
            <div class="mp-subscriptions-content tab-content">
                <p class="mobile-headline"><strong>Bevakningar</strong></p>
                <ul></ul>
            </div>
            <div class="mp-settings-content tab-content">
                <p class="mobile-headline"><strong>Inställningar</strong></p>
                <form class="collect-remove-form" method="">
                    <p>Ange din e-postadress för att hämta/ta bort dina favoriter.</p>
                    <div style="clear:both;"></div>
                    <p>
                        <label for="" class="">E-postadress</label><br>
                        <input id="formEmail" type="email" name="" class="form-email" placeholder="Ange din e-postadress" required>
                        <i class="icon icon-user"></i>
                    </p>
                    <button type="submit" class="submit-button"><i class="icon icon-download"></i> Hämta</button>
                    <button type="submit" class="something remove-button"><i class="icon icon-trash"></i> Ta bort</button>
                    <p class="mp-loading">
                        <img src="/wp-content/themes/upplands-motor/images/loading.gif">
                    </p>
                    <div style="clear: both;"></div>
                    <p class="form-response"></p>
                </form>
            </div>
            <div style="clear:both;"></div>
            <hr>
            <h3>Spara/Dela favoriter</h3>
            <div class="mp-buttons">
                <div class="mp-button save">
                    <i class="icon icon-save"></i>
                    <p><strong>Spara</strong></p>
                    <div style="clear:both;"></div>
                </div>
                <div class="mp-button share">
                    <div class="mp-share-dialog">
                        <ul>
                            <li><a class="fb-share-favorites" href="" target="_blank"><i class="icon icon-facebook"></i> Facebook</a></li>
                            <li class="mp-email-share"><i class="icon icon-mail"></i> E-post</li>
                        </ul>
                    </div>
                    <i class="icon icon-share-alternative"></i>
                    <p><strong>Dela</strong></p>
                    <div style="clear:both;"></div>
                </div>
                <p class="mp-loading">
                    <img src="/wp-content/themes/upplands-motor/images/loading.gif">
                </p>
                <div style="clear:both;"></div>
            </div>
            <div class="mobile-clearfix"></div>
            <div class="mp-save-form">
                <p class="favorites-save-text"><?php the_field('favorites-save-text', 'option'); ?></p>
                <p class="favorites-share-text"><?php the_field('favorites-share-text', 'option'); ?></p>
                <div style="clear:both;"></div>
                <form method="" action="">
                    <p>
                        <input type="email" name="save-email" placeholder="Ange din e-postadress" required>
                        <i class="icon icon-user"></i>
                    </p>
                    <button type="submit" class="submit-button"><i class="icon icon-save"></i>Spara</button>
                    <p class="mp-loading">
                        <img src="/wp-content/themes/upplands-motor/images/loading.gif">
                    </p>
                    <div style="clear:both;"></div>
                </form>
            </div>
            <div class="mp-email-share-form">
                <p class="favorites-share-email-text"><?php the_field('favorites-share-email-text', 'option'); ?></p>
                <div style="clear:both;"></div>
                <form method="" action="">
                    <p>
                        <input type="email" name="share-email" placeholder="Ange din väns e-postadress" required>
                        <i class="icon icon-user"></i>
                    </p>
                    <button type="submit" class="submit-button"><i class="icon icon-mail"></i> Skicka</button>
                    <p class="mp-loading">
                        <img src="/wp-content/themes/upplands-motor/images/loading.gif">
                    </p>
                    <div style="clear:both;"></div>
                </form>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div class="mp-login col-sm-4">
        <div class="wrapper col-sm-9">
            <h2><?php the_field('company-headertext', 'options'); ?></h2>
            <p><?php the_field('company-bodytext', 'options'); ?></p>
        </div>
    </div>
</div>

