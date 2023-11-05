<div class="register form">
    <div class="shadow"></div>
    <div class="py-5 d-flex flex-row justify-content-center">
        <div class="form-container">
            <h2 class="form-title">Zarejestruj się</h2>
            <form action="./index.php?register" method="post">
                <div class="form-element">
                    <input type="text" name="login" placeholder="Login" required />
                </div>
                <div class="form-element">
                    <input type="password" name="password_1" placeholder="Hasło" required />
                </div>
                <div class="form-element">
                    <input type="password" name="password_2" placeholder="Powtórz Hasło" required />
                </div>
                <div class="form-element">
                    <input type="email" name="email" placeholder="E-mail" required />
                </div>
                <div class="form-element">
                    <input type="checkbox" name="checkbox" value="checkox" required>
                    <p class="information">Mam ukończone 13 lat i akceptuję warunki Umowy użytkownika Achroshi oraz Polityki prywatności Achroshi.</p>
                </div>
                <button type="submit" name="register" value="register">Zarejestruj się</button>
                <?php
                $email_regex = "/^[\w\-.]+@([\w\-]+.)+[\w\-]{2,4}$/";
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "achroshi";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Nie połączono: " . $conn->connect_error);
                }

                $reg_data = [
                    "login" => @$_POST["login"],
                    "pass1" => @$_POST["password_1"],
                    "pass2" => @$_POST["password_2"],
                    "email" => @$_POST["email"],
                    "checkox" => @$_POST["checkbox"],
                ];

                foreach ($reg_data as $val) {
                    if (empty($val)) {
                        return;
                    }
                }
                if ($reg_data["pass1"] != $reg_data["pass2"]) {
                    echo "<p class='notification'>Hasła nie są takie same.</p>";
                    return;
                }
                if (preg_match($email_regex, $reg_data["email"]) !== 1) {
                    return;
                }
                if (!isset($reg_data["checkox"]) && $reg_data["checkox"] != "checkox") {
                    return;
                }

                $result = $conn->query("SELECT `ussers`.`user_login` FROM `ussers` WHERE `ussers`.`user_login` = '" . $reg_data["login"] . "';");
                if (mysqli_num_rows($result) != 0) {
                    echo "<p class='notification'>Nazwa użytkownika jest zajęta.</p>";
                    return;
                }
                $hashed_password = password_hash($reg_data["pass1"], PASSWORD_DEFAULT);
                $conn->query("INSERT INTO `ussers`(`user_login`, `user_password`, `user_email`, `user_access`) VALUES ('" . $reg_data["login"] . "','" . $hashed_password . "','" . $reg_data["email"] . "','1')");
                echo "<script>location='./index.php?login'</script>";
                ?>
            </form>
        </div>
    </div>
</div>