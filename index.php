<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conjuguaison</title>
    <?php include './_header_dependancies.php' ?>
</head>

<body>
    <div class="container">
        <form>
            <div class="row">
                <div class="col-3">
                    <label for="verbe-infinitif" class="col-form-label">Verbe du premier groupe à l'infinitif : </label>
                </div>
                <div class="col-2">
                    <input type="texte" id="verbe-infinitif" name="verbe" class="form-control" placeholder="Votre verbe..." />
                </div>
                <div class="col-3">
                    <select class="form-select" name="temps">
                        <option value="noChoice" selected>Choisissez votre temps</option>
                        <option value="present">Présent</option>
                        <option value="futur">Futur</option>
                        <option value="imparfait">Imparfait</option>
                    </select>
                </div>
                <div class="col-4">
                    <button class="btn btn-info">Conjuguer</button>
                </div>
            </div>
        </form>
        <div id="resultat-conjuguaison" class="row">
            <div class="col-5">
            </div>
        </div>
    </div>
    <style>
        #resultat-conjuguaison{
            margin: 5% 0 0 10%;
        }

        form {
            margin-top: 10%;

        }
    </style>
    <?php include './_body_dependancies.php' ?>
</body>

</html>