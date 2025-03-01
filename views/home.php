<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Web CV</title>
    <link rel="stylesheet" href="../assests/css/homs.css">
    <script defer src="../assests//js/home.js"></script>
</head>
<body>
    <header>
        <h1 id="name">John Doe</h1>
        <p id="bio">Full-Stack Developer | Cybersecurity Enthusiast</p>
        <button onclick="toggleTheme()">Toggle Theme</button>
    </header>
    
    <section id="skills">
        <h2>Skills</h2>
        <ul>
            <li>JavaScript</li>
            <li>PHP</li>
            <li>React</li>
            <li>MySQL</li>
        </ul>
    </section>

    <section id="experience">
        <h2>Experience</h2>
        <p>Software Engineer at XYZ Corp</p>
    </section>
    
    <section id="contact">
        <h2>Contact</h2>
        <form action="contact.php" method="POST">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message"></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

    
</body>
</html>
