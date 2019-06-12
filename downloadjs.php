<?php 
function downloadJs($file_url, $save_to)
{
    $content = file_get_contents($file_url);
    file_put_contents($save_to, $content);
}


downloadJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyAxhZ-9RNqOwY0eZVa0Ba0krzk1tDswRsA&callback=initMap', 'web/mdclux.com.ua/public_html/js/maps.js');