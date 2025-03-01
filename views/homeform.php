<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Web CV</title>
    <link rel="stylesheet" href="../assests/css/homeform.css">
    <script defer src="../assests//js/home.js"></script>
</head>
<body>
   
	<body>
	 <button id='btn1' onclick="toggleTheme()">Toggle Theme</button>
	<div class="main" id = "main" >
	 <h1 id="name"> John Doe </h1>
        <p id="keyword">Skill| Passion | Hobby</p> 
    <section class="summary" id="summary">
        <img id="image" src="https://www.exscribe.com/wp-content/uploads/2021/08/placeholder-image-person-jpg.jpg" alt="Photograph of the user" width = "150" height="150">
	 <p id="bio" rows='7'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Morbi eget tempus turpis. Suspendisse eu ligula orci. Quisque sagittis posuere purus, vel rhoncus mi feugiat sit amet. 
		Mauris posuere dapibus sapien, ut varius nibh mattis vitae. 
		Pellentesque vel risus lectus. Nullam mattis nibh quam, et finibus massa ornare in. 
		Nunc consequat tincidunt sapien posuere euismod. Nam commodo, metus eget pharetra ullamcorper, mi ex volutpat turpis, at commodo dui libero quis arcu.
		Mauris eu tortor egestas, luctus turpis sit amet, commodo arcu. Maecenas pretium consectetur sapien id ultrices. 
		Suspendisse potenti. Praesent non massa ac mi malesuada pulvinar. Nam a orci eget libero malesuada rhoncus vitae nec ante. 
		Integer aliquet ipsum quis consectetur fringilla. Cras convallis est in dolor molestie, nec porttitor sem egestas.</p>
    </section>
    
    <section id="skills">
        <h2>Skills</h2>
		<ul id='list'>
            <li> Skill 1</li>
			<li> Skill 2</li>
			<li> Skill 3</li>
			<li> Skill 4</li>
        </ul>
    </section>

    <section id="projects">
	<h2>Projects</h2><ul>
	<li><h3>Passion project 1</h3>
	<p>Ut ut elit vel turpis sollicitudin bibendum. Nam fermentum diam quis hendrerit fermentum. Mauris maximus dignissim lorem sit amet pulvinar. Vivamus in viverra lacus, a dictum orci.
	Praesent eu tellus et dolor facilisis rutrum. Pellentesque fringilla dapibus sagittis. 
	Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<h4>Tech 1 | Tech 2 | Tech 3</h4>
	</li>
	<li>
	<h3>Passion project 2</h3>
	<p>Ut ut elit vel turpis sollicitudin bibendum. Nam fermentum diam quis hendrerit fermentum. Mauris maximus dignissim lorem sit amet pulvinar. Vivamus in viverra lacus, a dictum orci.
	Praesent eu tellus et dolor facilisis rutrum. Pellentesque fringilla dapibus sagittis. 
	Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	<h4>Tech 1 | Tech 2 | Tech 3</h4>
	</li>
	</ul>
    </section>
    <section id="experience">
	<h2>Experience</h2><ul>
	<li><h3> Software engineer at XZY</h3></li>
	<li><h3> Front end at ABC</h3></li>
	</ul>
    </section>
	
	 <section id="contact">
        <h2>Contact</h2>
        <form action="contact.php" method="POST">
            <input id="id1" type="text" name="name" placeholder="Your Name" required>
            <input id="id2" type="email" name="email" placeholder="Your Email" required>
            <textarea id="id3" name="message" placeholder="Your Message"></textarea>
            <button id='btn' type="submit">Send</button>
        </form>
   </div>
    </body>
</body>
</html>
