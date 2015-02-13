<?php 

    include("includes/parsedown.php");
    include("classes/question.php");

    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";
 
    //echo "<hr/>";
 
    $line_number = 1;
	$text = '';
	
	//CSS Styles
	$text .= "<link rel='stylesheet' href='css/pdf.css' type='text/css' />";
	$text .= "<link rel='stylesheet' href='css/reset.css' type='text/css' />";
	
	//Paper details
	$text .= "<h1>" . $_POST['paprs_Title'] . "</h1>";
	$text .= "<h2>" . $_POST['paprs_Author'] . "</h2>";
	
	//Questions
	$text .= "<div class='body'>";
	foreach ($_POST['paprs_Questions'] as $question)
	{
			//Define variables
			$parsedown = new Parsedown();
			$line_amount = $question['lines'];
			$question_text = $question['text'];
			$question_points = $question['points'];
			
			//Construct question
			$text .= "<div class='question'>";
			$text .= "<div class='col_1'><strong>" . $line_number . "</strong></div>";
			$text .= "<div class='col_10'>";
			$text .= "<div class='text'>" . $parsedown->text($question_text) . "</div>";
			
			//Create answer lines
			$x = 1;
			$text .= "<div class='lines'>";
			while ( $x <= $line_amount) {
				$text .= "<div class='row'></div>";
				$x++;
			};
			$text .= "</div>";
			$text .= "<div class='col_1'>[" .$question_points . "]</div>";
		    $text .= "</div>";
			$text .= "</div>";
			
			//Increment line number
			$line_number++;
			
			//Add to total
			$total += $question['points'];
	};
    
    $text .= "<div class='total'>[Total: " . $total . "]</div>";
    $text .= "</div></div><!-- End of .body -->";
    
    echo $text;
    
    //Yay a class :)
    $q = new Question($_POST["paprs_Questions"]["0"]["text"]);
    echo "<p><br/>Echoed by a class: <br/>" . $q->getText() . "</p>";
    echo "<p><br/>Echoed by a class: <br/>" . $q->getHTML() . "</p>";
    
 ?>