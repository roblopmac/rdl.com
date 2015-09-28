<?php
echo 'Before Call email.';
try{
	mail('john.doe@example.com', 'The Magical Subject Line', 'The Magical Message Body');	
	
}
catch (Exception $er)
{
	echo $er->getMessage();
	
}

echo 'After.';

?>