<?php
if (isset($_GET["wyloguj"])) {
    session_destroy();
    echo "<script>location='./index.php?home'</script>";
}
?>
<div class="login form">
    <div class="shadow"></div>
    <div class="py-5 d-flex flex-row justify-content-center">
        <div class="form-container my-5">
            <h2 class="form-title">Zaloguj się</h2>
            <form action="./index.php?login" method="post">
                <div class="form-element">
                    <input type="text" name="login" placeholder="Login" required />
                </div>
                <div class="form-element">
                    <input type="password" name="password" placeholder="Hasło" required />
                </div>
                <button type="submit" name="register" value="register">Zaloguj się</button>
                <p>Pierwszy raz na Achroshi?</p>
                <a class="link" href="./index.php?register">utwórz konto</a>

                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "achroshi";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Nie połączono: " . $conn->connect_error);
                }

                $log_data = [
                    "login" => @$_POST["login"],
                    "pass" => @$_POST["password"],

                ];

                foreach ($log_data as $val) {
                    if (empty($val)) {
                        return;
                    }
                }

                $result = $conn->query("SELECT `ussers`.`user_login` FROM `ussers` WHERE `ussers`.`user_login` = '" . $log_data["login"] . "' AND `ussers`.`user_password` = '" . $log_data["pass"] . "';");
                if (mysqli_num_rows($result) == 0) {
                    echo "<p class='notification'>Nazwa konta lub hasło są niepoprawne</p>";
                    return;
                } elseif (mysqli_num_rows($result) == 1) {
                    $_SESSION["logged_in"] = true;
                    session_write_close();
                    echo "<script>location='./index.php?home'</script>";
                }

                ?>
            </form>
        </div>
    </div>
</div>