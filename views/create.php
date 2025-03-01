<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Web CV Form</title>
    <link rel="stylesheet" href="../assests/css/homeform.css">
    <script defer src="../assests//js/home.js"></script>
</head>
<body>
   
	<body>
	<h3>Click on the fields to fill in your information.</h3>
	<form class="main" action="index.php?action=createCV" method= "POST">
	 <h1 id="name"> 
		<input type="text" id="nameInput" value="Full Name"></h1>
        <input id="keyword" value="Insert keywords."> 
    <section class="summary" id="summary">
        <input type="text" id="image">
        <textarea id="bio" rows='7'>Enter your biography/summary.</textarea>
    </section>
    
    <section id="skills">
        <h2>Skills</h2>
		<input type='text' id='skill' value="Add Skill"/>
		<!- This input needs to process into a list of skills that both displays below and is added to the json->

		<ul id='list'>
            
        </ul>
    </section>

    <section id="projects">
	<h2>Projects</h2>
	<h3><input id="project" type="text" value="Project Title"></h3>
	<p><input id="projectDesc" type="text" value="Project description-"></p>
	<h4><input id="tech" type="text" value="Tech stack-"></h4>

    </section>
    
	
	<button type="submit">
                    Create CV
    </button>
	</form>
    </body>
</body>
</html>