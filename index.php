<?php
include 'config.php';

$message = "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <header class="header">
        <a href="#home" class="logo">Yogi
        <span>Aditya</span></a>

        <img src="Images/menu.svg" alt="menu" class="menu">

        <nav class="navbar">
        <a href="#home" class="active">Home</a>
        <a href="#about">About</a>
        <a href="#services">Services</a>
        <a href="#contact">Contact</a>
        </nav>
    </header>
    <section class="home" id="home">

        <div class="home-img">
            <img src="Images/kull(1)(1)(1)(1).png" alt="kuda">
        </div>

        <div class="home-content">
            <h1>It's <span>Adityaa</span></h1>
            <h3 class="text-animation">
                I'm a <span></span>
            </h3>

            <div class="social-icons">
                <img src="Images/linkedin.png" alt="link" class="link">
                <img src="Images/facebook.png" alt="fac" class="face">
                <img src="Images/twitter.png" alt="tw" class="twit">
                <img src="Images/instagram.png" alt="insta" class="insta">
            </div>

            <a href="#" class="btn">Hire me</a>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-content">
            <h2 class="heading">About <span>Me</span> </h2>
            <h3 class="text-animation">
                <span></span>
            </h3>
            <p>Selamat datang di halaman utama website 
                saya! Saya adalah seorang mahasiswa 
                semester 4 yang tengah belajar pemrograman. 
                Saya belajar pemrograman dengan tujuan untuk 
                mengembangkan keterampilan teknis yang diperlukan 
                dalam industri teknologi informasi. Selain itu, 
                saya ingin menggunakan pemrograman sebagai alat 
                untuk menciptakan solusi inovatif dalam berbagai 
                bidang, seperti pengembangan aplikasi yang 
                bermanfaat bagi masyarakat atau membangun 
                platform yang dapat meningkatkan efisiensi 
                dalam proses kerja.</p>
                <a href="#" class="btn">Read More</a>
        </div>
        <div class="about-img">
        <img src="Images/kull(1)(1)(1)(1).png" alt="">
    </div>
    </section>


    <section class="services" id="services">
        <h2 class="heading">Blog</h2>
        
        <div class="services-container">

         <?php
    $query = "SELECT * FROM blog";
    $result = mysqli_query($conn, $query);

    $no = 1;

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($no >=0) {
            ?>
            <div class="services-box">
                <div class="services-info">
                    <h4><?= $row["judul"] ?></h4>
                    <p><?= $row["deskripsi"] ?></p>
                </div>
            </div>
  <?php } 
            $no++;
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    } ?>
            

        </div>

    </section>

<section class="contact" id="contact">
    <h2 class="heading">Contact <span>Me</span></h2>

    <form action="index.php" method="POST">
        <div class="input-box">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="text" name="subject" placeholder="Subject" required>
        </div>
        <textarea name="message" cols="30" rows="10" placeholder="Your Message" required></textarea>
        <input type="submit" value="Send Message" class="btn">
    </form>

    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $sql = "INSERT INTO contacts (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);


    if ($stmt->execute()) {
        $message = "Pesan berhasil disimpan!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

</section>

    <footer class="footer">

        <div class="social">
            <img src="Images/linkedin.png" alt="link" class="link">
            <img src="Images/facebook.png" alt="fac" class="face">
            <img src="Images/twitter.png" alt="tw" class="twit">
            <img src="Images/instagram.png" alt="insta" class="insta">
        </div>

        <ul class="list">
            <li>
                <a href="#">FAQ</a>
            </li>

            <li>
                <a href="#">Service</a>
            </li>

            <li>
                <a href="#">About</a>
            </li>

            <li>
                <a href="#">Contact</a>
            </li>

            <li>
                <a href="#">Privacy Policy</a>
            </li>
        </ul>
        <p class="copyright">
            @ Yogi Aditya | All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>