$(document).ready(function() {
    
    //Options for adding questions
    var max_fields = 999; //maximum input boxes allowed
    var wrapper = $(".question-section"); //Fields wrapper
    var add_button = $(".add"); //Add button ID
    var x = 0; //initlal text box count
    
    //Options for updating total
    var $form = $('#paprsForm');
    //var $sum = $form.find('.form-points');
    var $total = $('#paprsTotalField');
    
    //Options for dragging and sorting
    var sortable = $(".sortable");
    var disabled = $(".question, .page-header, #paprsTotalField");
    var undraggable = $(".page-header");
    
    //Add question
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="panel panel-default question"><div class="panel-heading">Question<span class="glyphicon glyphicon-remove pull-right remove" aria-hidden="true"></span></div><div class="panel-body"><div class="form-group"><textarea name="paprs_Questions['+x+'][text]" class="form-control" rows="2"></textarea></div><div class="form-group form-inline pull-right"><div class="form-group"><label>Points</label><input type="text" name="paprs_Questions['+x+'][points]" class="form-control form-points"></div><div class="form-group"><label>Lines</label><input type="text" name="paprs_Questions['+x+'][lines]" class="form-control"></div></div></div></div>'); //add input box
            //var $formpoints = $(this).find('.form-points');
            //$sum.push($formpoints);
        }
        $('html, body').animate({scrollTop:$(document).height()}, 'slow');
    });
    
    $(wrapper).on("click",".remove", function(e){ //user click on close button
        e.preventDefault();
        $(this).closest('.question').remove();
        x--;
    });
    
    //Display the current total of paper
    $form.on('change', '.form-points', function () {
        //console.log(".form-points has been updated");
        var sum = 0;
        $.each($(document).find('.form-points'),function(){
            //console.log("calculated");
            var value = Number($(this).val());
            if (!isNaN(value)) sum += value;
        });
        
        $total.val(sum);
    });
    
    //Dragable and sortable
    $(sortable).sortable({
       containment:"parent"
    });
    $(disabled).disableSelection();
    $(undraggable).draggable({
        disabled :true
    });
    
    //Add visual to active question
    $(document).on({
        mouseenter: function() {
            //console.log( "mouse entered a question, class added" );
            $(this).addClass('selected');
        },
        mouseleave: function() {
            //console.log( "mouse left a question, class removed" );
            $(this).removeClass('selected');
        },
        click: function() {
            //console.log( "clicked on a question" );
        }
    },'.question');
    
});