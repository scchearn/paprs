<?php
    //Includes
    require("includes/mpdf60/mpdf.php");
    require("includes/parsedown.php");
    
    //Initiate vars
    $pdf=new mPDF('','A4',10,'Arial');
    $line_number = 1;
    $filename = "paprs - " . strtolower($_POST['paprs_Title']) . " - " .date("Ymd") . ".pdf";
	$text = '';
	$total = '';
	
	//CSS Styles
	$text .= "<link rel='stylesheet' href='css/pdf.css' type='text/css' />";
// 	$text .= "<link rel='stylesheet' href='css/reset.css' type='text/css' />";
	
	//Paper details
	$text .= "<div class='heading'>";
	$text .= "<h1>" . $_POST['paprs_Title'] . "</h1>";
    	if (!empty($_POST['paprs_Author'])){
    	    $text .= "<h2>Prepared by: " . $_POST['paprs_Author'] . "</h2>";
    	}
    	if (!empty($_POST['paprs_Time'])){
    	    $text .= "<h3>Allowed time: " . $_POST['paprs_Time'] . "</h3>";
    	}
	$text .= "</div>";
	
	//Questions
	$text .= "<div class='body'>";
	foreach ($_POST['paprs_Questions'] as $question)
	{
			//Define variables
			$parsedown = new Parsedown();
			$line_amount = $question['lines'];
			$question_text = mb_convert_encoding($question['text'],'UTF-8');
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
			$text .= "</div></div><!-- End of .lines -->";
			$text .= "<div class='col_1'>[" .$question_points . "]</div>";
		    $text .= "</div><!-- End of .question -->";
			$text .= "</div>";
			
			//Increment line number
			$line_number++;
			
			//Sum the total points
			$total += $question['points'];
	};
    
    $text .= "<div class='total'>[Total: " . $total . "]</div>";
    $text .= "</div><!-- End of .body -->";
    
    //Write the PDF
    $pdf->SetTitle($_POST['paprs_Title']);
    $pdf->SetAuthor($_POST['paprs_Author']);
    $pdf->WriteHTML($text);
    $pdf->Output($filename,I);
    exit;

?>