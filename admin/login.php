<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Abitea</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
    <main class="container" style="max-width: 400px; margin-top: 100px;">
        <article>
            <h2 style="text-align: center;">Login Admin</h2>
            <form action="proses_login.php" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Masuk</button>
            </form>
            <?php 
            if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
                echo "<small style='color:red;'>Username atau Password salah!</small>";
            }
            ?>
        </article>
    </main>
</body>
</html>