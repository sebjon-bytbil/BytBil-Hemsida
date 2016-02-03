

<form id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active"><i class="icon bytbil-icon bytbil-icon-car icon-car fa fa-car"></li>
        <li>Hur kontaktar vi dig?</li>
        <li>När och var vill du köra?</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Vilken bil vill du provköra?</h2>
        <h3 class="fs-subtitle">Steg (1/3)</h3>
        <label class="top-label" for="brand">
            Märke
            <select name="brand" class="selectpicker">
                <option hidden default selected val="0">Välj märke</option>
                <option class="brand-item" value="volvo">Volvo</option>
                <option class="brand-item" value="ford">Ford</option>
                <option class="brand-item" value="renault">Renault</option>
                <option class="brand-item" value="dacia">Dacia</option>
            </select>
        </label>
        <label class="top-label" for="brand">
            Modell
            <select name="brand" class="selectpicker" disabled>
                <option hidden default selected val="0">Välj modell</option>
                <option class="brand-item" data-brand="volvo" value="XC90">Volvo</option>
                <option class="brand-item" data-brand="renault" value="Megane">Megane</option>
                <option class="brand-item" data-brand="volvo" value="XC70">XC70</option>
                <option class="brand-item" data-brand="volvo" value="XC60">XC60</option>
            </select>
        </label>
        <label class="right-label" for="exchange">
            <input type="checkbox" class="checkbox" value="true" />

        </label>
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Social Profiles</h2>
        <h3 class="fs-subtitle">Your presence on the social network</h3>
        <input type="text" name="twitter" placeholder="Twitter" />
        <input type="text" name="facebook" placeholder="Facebook" />
        <input type="text" name="gplus" placeholder="Google Plus" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="text" name="lname" placeholder="Last Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset>
</form>

<p>Your Name (required)<br />
    [text* your-name] </p>

<p>Your Email (required)<br />
    [email* your-email] </p>

<p>Subject<br />
    [text your-subject] </p>

<p>Your Message<br />
    [textarea your-message] </p>

<p>[submit "Send"]</p>
