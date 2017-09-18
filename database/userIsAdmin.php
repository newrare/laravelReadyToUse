<?php
    //command: php userIsAdmin.php <tableName> <userName> <isAdmin> <secretPass>

    //arguments
    if( isset($argv[1]) and isset($argv[2]) and isset($argv[3]) )
    {
        $table      = $argv[1]; //ex: laravelReadyToUse
        $user       = $argv[2]; //ex: adminName
        $isAdmin    = $argv[3]; //ex: 1
        $pass       = $argv[4]; //ex: xXxXxXx
    }
    else
    {
        print "Example: php userIsAdmin.php laravelReadyToUse adminName 1 xXxXxXx\n";
        exit("Error, missing argument(s).\n");
    }

    //connection
    $Connection = new mysqli("localhost", "root", $pass, $table);

    if($Connection->connect_error)
    {
        exit("Connection failed for " . $table . ": " . $Connection->connect_error . "\n");
    }

    //action
    if($isAdmin == 1)
    {
        $sql = "UPDATE user SET isAdmin='1' WHERE login='" . $user . "'";
    }
    else
    {
        $sql = "UPDATE user SET isAdmin='0' WHERE login='" . $user . "'";
    }

    //commit and message
    if($Connection->query($sql) === TRUE)
    {
        print "Succes\n";
    }
    else
    {
        print "Error: " . $Connection->error . "\n";
    }

    $Connection->close();

    print "Finish.\n";
?>
