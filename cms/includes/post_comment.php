<?php 
$post_id = $_GET['p_id'];
$_POST['comment_author'] = NULL;
$_POST['comment_email'] = NULL;
$_POST['comment_content'] = NULL;

header ("Location: ../post.php?p_id=$post_id");
?>