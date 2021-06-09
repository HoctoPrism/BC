<div class="row align-items-center my-5 bg-secondary rounded-3 text-white">
    <h2 class="col-12 text-center my-5">Informations personnelles</h2>
    <!-- PREMIERE PARTIE -->
    <div class="col-5 mx-3">
        <div class="mb-3">
            <label for="EmailSignin" class="form-label">Adresse mail</label>
            <input type="email" class="form-control" id="EmailSignin" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="PasswordSignup" class="form-label">Votre mot de passe</label>
            <input type="password" class="form-control" id="PasswordSignup">
        </div>
        <div class="d-flex">
            <div class="form-check me-3">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Homme
                </label>
                </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Femme
                </label>
            </div>
        </div>
    </div>
    <!-- SECONDE PARTIE -->
    <div class="col-5 mx-3">
        <div class="mb-3">
            <label for="firstnameUser" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstnameUser">
        </div>
        <div class="mb-3">
            <label for="lastnameUser" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastnameUser">
        </div>
        <div class="mb-3">
            <label for="birthUser" class="form-label">Date de naissance</label>
            <input type="date" class="form-control" id="birthUser">
        </div>
    </div>
    <div class="d-flex justify-content-center my-3"><input type="submit" class="btn btn-warning text-white" value="Valider"></input></div>
</div>
<!-- ADRESSE -->
<div class="col-12 row bg-secondary rounded-3 flex-column mb-5">
    <h3 class="text-center my-5 text-white">Carnet d'adresses</h3>
    <div class="col row mb-5 bg-light w-100 align-self-center text-secondary g-0">
        <div class="col-4 bg_delivery_title h-100 d-flex justify-content-center align-items-center"><h4>Adresse de facturation</h4></div>
        <div class="col-8 bg_delivery_body p-3">
            <div>Monsieur Toto Durand</div>
            <div>10 rue de la Pastille</div>
            <div>48000</div>
            <div>San Fransisco</div>
            <div>France (métropolitaine)</div>
            <div>0123456789</div>
        </div>
    </div>
    <div class="col row mb-5 bg-light w-100 align-self-center text-secondary g-0">
        <div class="col-4 bg_delivery_title_default h-100 d-flex justify-content-center align-items-center"><h4>Adresse de Livraison</h4></div>
        <div class="col-8 bg_delivery_body_default p-3">
            <div>Monsieur Toto Durand</div>
            <div>10 rue de la Pastille</div>
            <div>48000</div>
            <div>San Fransisco</div>
            <div>France (métropolitaine)</div>
            <div>0123456789</div>
        </div>
    </div>
</div>
<!-- RESET PASSWORD -->
<div class="col-12 row bg-secondary rounded-3 flex-column mb-5  text-white">
    <h3 class="text-center my-5">Réinitialiser votre mot de passe</h3>
    <div class="d-flex flex-column align-items-center">
        <div class="mb-3 w-25">
            <div><label for="passwordActual" class="form-label">Mot de passe actuel</label><span class="text-danger">*</span></div>
            <input type="password" class="form-control" id="passwordActual">
        </div>
        <div class="mb-3 w-25">
            <label for="passwordNew" class="form-label">Nouveau mot de passe</label><span class="text-danger">*</span>
            <input type="password" class="form-control" id="passwordNew">
        </div>
        <div class="d-flex justify-content-center my-3"><input type="submit" class="btn btn-warning text-white" value="Valider"></input></div>
    </div>
</div>