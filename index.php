<!DOCTYPE html>
<html lang="en">
<head>
	<title>paprs.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/paprs.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
<div class="container">
	<div class="">
		<div class="col-md-2"></div>
		<div class="col-md-8"><h1>paprs.</h1>
			<p class="lead">Handy little app to make writing question and exam papers easier</p>
		</div>
		<div class="col-md-2"></div>
	</div>

</div>
<div class="container">
	
	<div class="col-md-2"></div>
	
	<div class="col-md-8">
	
	<!-- This is the general options of the form -->
		<form id="paprsForm" action="pdf.php" method="post" target="_blank"> 
			<div class="form-group has-error">
				<label>Title of Paper*</label>
				<input type="text" name="paprs_Title" required class="form-control" placeholder="Enter title for the exam paper">
			</div> 
			<div class="form-group">
				<label>Prepared by</label>
				<input type="text" name="paprs_Author" class="form-control" placeholder="Who prepared this paper">
			</div>
			<!--<div class="form-group">-->
			<!--	<label>Type of paper</label>-->
			<!--	<select name="paprs.Type" class="form-control">-->
			<!--		<option value="paprs_Type1">Paper with lines</option>-->
			<!--		<option value="paprs_Type2">Paper with no lines</option>-->
			<!--		<option value="paprs_Type3">Paper with line sheet</option>-->
			<!--	</select>-->
			<!--</div>-->
			<div class="form-group">
				<label>Time</label>
				<input type="text" name="paprs_Time" class="form-control" placeholder="Allowed time">
			</div>
		

	<!-- Start of section -->
		<div class="page-header"><h3>Create</h3></div>
		<div class="question-section sortable">
			
			<!-- This panel serves as one question -->
				<div class="panel panel-default question">
				<div class="panel-heading">Question</div>
					<div class="panel-body">
						
						<div class="form-group">
							<textarea name="paprs_Questions[0][text]" class="form-control" rows="2"></textarea>
						</div>
						
						<div class="form-group form-inline pull-right">
							<div class="form-group">
								<label>Points</label>
								<input type="text" pattern="\d+" name="paprs_Questions[0][points]" class="form-control form-points">
							</div>
							<div class="form-group">
								<label>Lines</label>
								<input type="text" pattern="\d+" name="paprs_Questions[0][lines]" class="form-control">
							</div>
						</div>
					
					</div>
				</div>
			<!-- End of question -->
		
		</div>
	<!-- End of section -->
	<input type="text" name="paprsTotalField" id="paprsTotalField" class="paprsTotalField pull-right" readonly>
	<label class="paprsTotalField pull-right">Total: </label>
	<button type="button" class="btn btn-primary add">Add</button>
	<button type="submit" class="btn btn-primary">Submit!</button>
	</form>
	
	<div class="footer"><hr/><p>copyright Sam Hearn</p></div>
	
	</div>
	
	<div class="col-md-2"></div>

</div>

<div class="footer"><p></p></div>

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>