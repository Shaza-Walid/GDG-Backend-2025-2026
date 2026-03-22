<?php 
# assignment 1
/*
  this is a multiple line comment
  you can write anuthing here and the compiler cannot see it 
  # for a single line comment
  // is also for a single line commect
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php echo "UTF-8"?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "My First PHP Page"?></title>
  </head>
  <body>
    <div><?="We Love"?></div>
    <div><?="Elzero Channel"?></div>
  </body>
</html>

<?php 
# assignment 2: comment with different methods
//echo 'Prevent Me From Running Please';
/*echo 'Prevent Me From Running Please';*/
#echo 'Prevent Me From Running Please';

# assignment 3: recorrect the comment
/*
  My Application
  Version 1.0
  Created By Elzero
*/

# assignment 4: whitch comment is true & whitch is false
// ## First Comment                   #=> True as it starts with //
# // # Second Comment                 #=> True as it starts with #
/* /* /* Third Comment */             #=> False as PHP doesn't support nested comment /* /* */ 
////// Fourth Comment                 #=> True as it starts with //

