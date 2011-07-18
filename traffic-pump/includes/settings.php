<?
echo '<div class="wrap">';
echo '<h2>+1 Traffic Pump Settings</h2>';
if ($_POST['header'] && $_POST['text']){
    $header = fopen(dirname(__FILE__).'/header.txt', 'w');
    fputs($header, stripslashes($_POST['header']));
    fclose($header);
    $text = fopen(dirname(__FILE__).'/text.txt', 'w');
    fputs($text, stripslashes($_POST['text']));
    fclose($text);
    echo 'Settings have been saved!';
}
echo'<form action="" method="post">';
echo 'Dialog header:<br /><textarea name="header" cols="50" rows="6">'.file_get_contents(dirname(__FILE__).'/header.txt').'</textarea><br />';
echo 'Dialog text:<br /><textarea name="text" cols="50" rows="6">'.file_get_contents(dirname(__FILE__).'/text.txt').'</textarea><br />';
echo '<input type="submit" class="button" value="Сохранить изменения">';
echo '</form>';
echo '</div>';
?>