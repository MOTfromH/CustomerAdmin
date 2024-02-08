<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzer bearbeiten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <?php
    if (isset($_GET["id"])) {
    if (!empty($_GET["id"])) {
    require("connection.php");
    if (isset($_POST["submit"])) {
        $stmt = $con->prepare("UPDATE customer SET gender = :user, vorname= :vorname, nachname =:nachname, adresse =:adresse, email = :email WHERE ID_customer = :id");
        $stmt->execute(array(":user" => $_POST["username"], ":email" => $_POST["email"], ":id" => $_GET["id"]));
        ?>
        <p>Der Benutzer wurde gespeichert.</p>
        <?php
    }
    $stmt = $con->prepare("SELECT * FROM customer WHERE ID_customer = :id");
    $stmt->execute(array(":id" => $_GET["id"]));
    $row = $stmt->fetch();
    ?>
    <section>
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card">
                        <div class="card-body"
                        <form action="edit.php?id=<?php echo $_GET["id"] ?>" method="post">
                            <select class="form-select" aria-label="Default select example"
                                    value="<?php echo $row["gender"] ?>">
                                <option selected><?php echo $row["gender"] ?></option>
                                <?php

                                switch ($row["gender"]) {
                                    case 'F' : ?>
                                        <option value="1">M</option>
                                        <option value="2">Div</option>
                                        <?php
                                        break;
                                    case "M" :
                                        ?>
                                        <option value="1">F</option>
                                        <option value="2">Div</option>
                                        <?php
                                        break;
                                    case "Div" :
                                        ?>
                                        <option value="1">F</option>
                                        <option value="2">M</option>
                                        <?php
                                        break;
                                    default : ?>
                                        <option value="1">F</option>
                                        <option value="2">M</option>
                                        <option value="3">Div</option>
                                    <?php
                                } ?>


                            </select> <br>

                            <form class="form-floating">
                                <input type="text" class="form-control" id="floatingInputValue"
                                       placeholder="name@example.com" value="<?php echo $row["vorname"] ?>">
                                <label for="floatingInputValue">Vorname</label>
                            </form>
                            <br>

                            <form class="form-floating">
                                <input type="text" class="form-control" id="floatingInputValue"
                                       placeholder="name@example.com" value="<?php echo $row["nachname"] ?>">
                                <label for="floatingInputValue">Nachname</label>
                            </form>
                            <br>

                            <form class="form-floating">
                                <input type="text" class="form-control" id="floatingInputValue"
                                       placeholder="name@example.com" value="<?php echo $row["adresse"] ?>">
                                <label for="floatingInputValue">Adresse</label>
                            </form>
                            <br>

                            <form class="form-floating">
                                <input type="text" class="form-control" id="floatingInputValue"
                                       placeholder="name@example.com" value="<?php echo $row["email"] ?>">
                                <label for="floatingInputValue">E-Mail</label>
                            </form>
                            <br>

                            <button name="submit" type="submit">Speichern</button>
                        </form>
                        <?php
                        } else {
                            //edit.php?id
                            ?>
                            <p>Kein Benutzer wurde angefragt</p>
                            <?php
                        }
                        } else {
                            //edit.php
                            ?>
                            <p>Kein Benutzer wurde angefragt</p>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>