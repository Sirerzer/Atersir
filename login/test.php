<div class="signin">
    <div class="content">
        <h2>Sign up</h2>
        <div class="form">
            <form method="post">
                <div class="inputBox">
                    <input type="text" name="pseudo" required> <i>Username</i>
                </div>
                <div class="inputBox">
                    <input type="email" id="email" name="email" required><i>Email</i>
                </div>
                <div class="inputBox">
                    <input type="password" name="modepass" required> <i>Password</i>
                </div>
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <a href="index.php">Login</a>
                </div>
                <div class="inputBox">
                    <input type="submit" value="Sign Up" name="submit" id="submit">
                </div>
            </form>

            <?php
            include '../serveur/database.php';
            global $conn;

            if (isset($_POST['submit'])) {
                $pseudo = $_POST['pseudo'];
                $email = $_POST['email'];
                $motdepasse = $_POST['modepass'];

                $q = $conn->prepare("INSERT INTO useri (pseudo, email, motdepasse) VALUES (?, ?, ?)");
                $q->bind_param("sss", $pseudo, $email, $motdepasse);

                if ($q->execute()) {
                    echo "Data inserted successfully!";
                } else {
                    echo "Error: " . $q->error;
                }
            }
            ?>
        </div>
    </div>
</div>
