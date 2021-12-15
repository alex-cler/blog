<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <title>Blog</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
</head>
<body>
<h1 style="text-align: center;">Bienvenue sur notre blog</h1>
<form method="post" style="width: 60vw; margin: 0 auto;" action="/executeaccount">
    <div class="row mb-3">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="EMAIL" class="form-control" id="inputEmail">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
        <div class="col-sm-10">
            <input type="password" name="PASSWORD" class="form-control" id="inputPassword">
        </div>
    </div>
    <fieldset class="row mb-3">
        <legend class="col-form-label col-sm-2 pt-0">Rôles</legend>
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" name="ADMIN" type="radio" name="gridRadios" id="admin" value="option1"
                       checked>
                <label class="form-check-label" name="ADMIN" for="admin">
                    Admin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="utilisateur" value="option2">
                <label class="form-check-label" name="USER" for="utilisateur">
                    Utilisateur
                </label>
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary" name="SUBMIT">Sign in</button>
    <strong>Déja un compte ? <a href="/login">Connectez-vous</a></strong>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous">
</script>
</body>
</html>
