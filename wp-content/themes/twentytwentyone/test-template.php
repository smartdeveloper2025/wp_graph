<?php
/*Template Name: test page**/
get_header();
?>


<?php
if ( is_user_logged_in() ) {
    echo 'Welcome, registered user!';
} else {
    echo 'No user Logged in';
}
?>

<?php 
if(pmpro_hasMembershipLevel('2'))
{
?>
<br>Basic - but make it custom membership is paid
<?php 
}
?>

<?php 
if(pmpro_hasMembershipLevel('1'))
{
?>
<br>Basic membership is taken
<?php 
}
?>


<?php 
if( pmpro_hasMembershipLevel('1') || pmpro_hasMembershipLevel('2') )
{
?>
<br>Some membership is taken
<?php 
} else {
?>
<br>No membership is taken
<?php } ?>

<?php
get_footer();
