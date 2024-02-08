
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/198d7bf926.js" crossorigin="anonymous"></script>
</head>
<body>
<section>
    <div class="container mt-5 pt-5">
        <div class="row">
            <!--            <div class="col-12 col-sm-8 col-md-6 m-auto">-->
            <!--                <div class="card">-->
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="text-center mt-3">
                        <h1>Customer Administration</h1>
                    </div>

                    <div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>ID</th>
                                    <th>Anrede</th>
                                    <th>Vorname</th>
                                    <th>Nachname</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Mitglied seit:</th>
                                    <th>Aktions</th>
                                    <!--                                    <i class="fa-solid fa-pen-to-square"></i>-->
                                </tr>
                                <tr>
                                    <?php
                                    require("connection.php");

                                    if(isset($_GET["del"])){
                                        if(!empty($_GET["del"])){
                                            $stmt = $con->prepare("DELETE FROM customer WHERE ID_customer =:id");
                                            $stmt->execute(array(":id" => $_GET["del"]));
                                            ?>
                                            <p>Der Benutzer wurde gelöscht</p>
                                            <?php
                                        }
                                    }

                                    $stmt = $con->prepare("SELECT * FROM customer");
                                    $stmt->execute();

                                    while ($row = $stmt->fetch()){
                                    ?>
                                <tr>
                                    <td><?php echo $row["ID_customer"] ?></td>
                                    <td><?php echo $row["gender"] ?></td>
                                    <td><?php echo $row["vorname"] ?></td>
                                    <td><?php echo $row["nachname"] ?></td>
                                    <td><?php echo $row["adresse"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["erstellt_am"] ?></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row["ID_customer"] ?>"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="index.php?del=<?php echo $row["ID_customer"] ?>"><i class="fa-solid fa-user-xmark"></i></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <!--                </div>-->
        </div>
    </div>

</section>


<!--Scripts-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>
</html>