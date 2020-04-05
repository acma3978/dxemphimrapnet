var _titleSllipsis=null;
var _loadFbSDk=null;
jQuery(document).ready(function(){
	//--Menu
	try{
       $(function(argument) {
            $('#check_trailer').bootstrapSwitch('state', true, true);
        });

        $(function(argument) {
            $('#episode_timeline').bootstrapSwitch('state', true, true );
        });

	}catch(err){
		console.error(err.message);
	}

    try{
        var max_fields      = 3; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="control-group"><input type="text" name="collect[]" class="span7"/><a href="#" class="btn remove_field">-</a></div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    }catch(err){
        console.error(err.message);
    }
});

