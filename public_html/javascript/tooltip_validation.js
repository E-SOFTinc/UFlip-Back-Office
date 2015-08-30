$(document).ready(function()

	{

      $.post("toolTip/validate_tooltip",{user_details:$('#user_details')},function(data){
      $(this).html(data);
      });
     /*for($i=1;$i<=count($user_detail);$i++)

	 {

		echo '$("a#userlink'.$user_detail["detail$i"]["id"].'").easyTooltip({';

        echo "\n";

	    echo 'useElement: "user'.$user_detail["detail$i"]["id"].'"';

       echo "\n";

		echo "});";

        echo "\n";

     }*/

     

	});
