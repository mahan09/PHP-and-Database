<?php

 /*
this code is for connecting to the database.
*/
 
class ConnectionFactory{
    private static $conn;
    public static function connect()
    {
        if(!ConnectionFactory::$conn)
        {
            try{
                self::$conn = new PDO('mysql:host=localhost;dbname=u1253147', 'u1253147', '04feb93');
             }
             catch (PDOException $exception) 
             {
                echo "Oh no, there was a problem" . $exception->getMessage();
             }
        }
        return ConnectionFactory ::$conn;
    }
}
?>
