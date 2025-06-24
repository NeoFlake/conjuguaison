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
        <form action="index.php">
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
                <ul>
                    <?php
                    $verbe = "";
                    $temps = "";
                    $conjuguaison = [];

                    if (isset($_SERVER["HTTP_REFERER"])) {
                        if (isset($_GET['verbe'])) {

                            $verbe = $_REQUEST["verbe"];
                            $temps = $_REQUEST["temps"];

                            if ($temps == "noChoice") {
                                echo "Veuillez choisir un temps s'il vous plait";
                            } else if ($verbe == "") {
                                echo "N'oubliez pas de rentrer un verbe s'il vous plait";
                            } else {
                                switch ($temps) {
                                    case "present":
                                        $verbe = substr($verbe, 0, -1);
                                        array_push(
                                            $conjuguaison,
                                            $verbe,
                                            $verbe . "s",
                                            $verbe,
                                            substr($verbe, -2, 1) == "g" ? $verbe . "ons" : (
                                                substr($verbe, -2, 1) == "c" ? substr($verbe, 0, -2) . "çons" :
                                                substr($verbe, 0, -1) . "ons"
                                            ),
                                            $verbe . "z",
                                            $verbe . "nt"
                                        );
                                        break;
                                    case "futur":
                                        array_push(
                                            $conjuguaison,
                                            $verbe . "ai",
                                            $verbe . "as",
                                            $verbe . "a",
                                            $verbe . "ons",
                                            $verbe . "ez",
                                            $verbe . "ont"
                                        );
                                        break;
                                    case "imparfait":
                                        $verbe = substr($verbe, 0, -2);
                                        array_push(
                                            $conjuguaison,
                                            $verbe . "ais",
                                            $verbe . "ais",
                                            $verbe . "ait",
                                            $verbe . "ions",
                                            $verbe . "iez",
                                            $verbe . "iont"
                                        );
                                        break;
                                };
                                foreach ($conjuguaison as $element) {
                                    echo "<li>" . $element . "</li>";
                                }
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <style>
        #resultat-conjuguaison {
            margin: 5% 0 0 10%;
        }

        form {
            margin-top: 10%;

        }
    </style>
    <?php include './_body_dependancies.php' ?>
</body>

</html>