<div id="footer-form">

    <label class="top-label" for="facility">Vem vill du kontakta?</label>
    <div style="clear:both;"></div>
    <select id="facility" name="facility" class="facility selectpicker">
        [populate_facilities]
    </select>
    <select id="function" name="function" class="departments selectpicker">
        <option value="0">Välj avdelning</option>
        <option value="service">Boka service</option>
        <option value="accessories">Tillbehör</option>
        <option value="sales">Försäljning bilar</option>
        <option value="rental">Biluthyrning</option>
        <option value="tyres">Däck/däckhotell</option>
        <option value="store">Grossistförsäljning</option>
        <option value="workshop">Skadeverkstad</option>
    </select>

    <div id="footer-form-brand">
        <div style="clear:both;"></div>
        <label class="top-label" for="brandmodel">Gäller märket/modellen</label>
        <div style="clear:both;"></div>

        <select id="brand-footer" name="brand" class="brand selectpicker">
            [populate_brands]
        </select>

        <select id="model-footer" name="model" class="model selectpicker">
            [populate_models]
        </select>
        <div style="clear:both;"></div>
    </div>

    <label class="top-label" for="info">Kontakta mig på</label>
    <div style="clear:both;"></div>
    [text phone id:phone class:default-input placeholder "Telefon"]
    [email* email id:email class:default-input placeholder "E-post"]
    <div style="clear:both;"></div>
    <label class="top-label" for="message">Meddelande</label>
    [textarea info x1 class:default-input placeholder "Hej, jag skulle behöva hjälp med..."]
    <button type="submit" name="submit" class="submit btn button blue fade"><i class="icon icon-mail"></i> Skicka meddelande</button>
    <button type="button" id="clearFooterForm" class="submit btn button red fade"><i class="icon icon-trash"></i> Rensa</button>
    <div style="clear:both;"></div>
</div>