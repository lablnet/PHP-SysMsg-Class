<?php 
require_once 'init.php';
echo view_system_message();
if(is_submit('submit')){
  if(input('q')){
    system_message('Comment added successfully','success');
     header('Location:index.php');
    //store to database and return to this or another page
	   //echo '<div class="container">'. restore_new_lines(input('q')) . '</div>';
  }else{

    system_message('Can not send empty comment','error');
    header('Location:index.php');

  }
}

?>
<head>
  <title>PHP Systen Message class example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<div class="container">
  <form method='post'>
    <div class="form-group">
      <label for="comment">Comment:</label>
      <textarea class="form-control" rows="5" name='q'></textarea>
      <br>
      <input type='submit' name='submit' class="btn btn-success" value='Submit' />
    </div>
  </form>
</div>