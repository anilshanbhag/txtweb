<?php 
    include('config_techiitb.php');
    $d = date('Y-m-d');
    $json = file_get_contents("https://www.googleapis.com/calendar/v3/calendars/3d65d6e5ftvteefng6rem6bhl4%40group.calendar.google.com/events?timeMax=".$d."T23%3A59%3A00.000Z&timeMin=".$d."T00%3A00%3A02.000Z&key=" . $GOOGLE_API_KEY);
    $calender = json_decode($json);
    $count = count($calender->items);
    $message = "";
    
    if ( $count == 0 ) {
        $message .= "Sadly there are no events today, checkback tomorrow";
    } else if ( $count == 1 ) {
        $message .= "There is 1 event today: ";
    } else {
        $message .= "There are ".$count." events today: ";
    }
    
    for ( $i = 0; $i < $count; $i++ )
        $message .= $calender->items[$i]->summary." | ";
?>
<html>           
    <head>           
        <meta name="txtweb-appkey" content="<?php echo $TXTWEB_API_KEY; ?>">
    </head>        
    <body>
        <?php echo $message; ?>
    </body>
</html>

