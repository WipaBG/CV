<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Web CV Form</title>
    <link rel="stylesheet" href="../assests/css/create.css">
    <script defer src="../assests//js/home.js"></script>
</head>
<body>
   
	<body>
	<h3>Click on the fields to fill in your information.</h3>
	<form class="main" action="index.php?action=createCV" method= "POST">
	        
	 <h1 id="name"> 
		<input type="text" id="nameInput" value="Full Name" name="name"></h1>
	<section class="image" id="image" name="image">
	<h2>Image</h2>
	<textarea type="text" id="image" >Insert url for CV photo"</textarea>
	</section>
    <section class="education" id="education" >
	        <h2>Education</h2>
        <textarea id="education" rows='7' name="education">Enter your education.</textarea>
    </section>
    
    <section id="skills">
        <h2>Skills</h2>
		<textarea type='text' id='skill' name="skill"> Add Skills </textarea>
		<!- This input needs to process into a list of skills that both displays below and is added to the json->

		<ul id='list'>
            
        </ul>
    </section>

    <section id="projects">
	<h2>Projects</h2>
	<h3><textarea id="project" type="text"name="project" rows='7' >Insert project information</textarea></h3>

    </section>
    
	
	<button type="submit">
                    Create CV
    </button>
	</form>
    </body>
</body>
</html>