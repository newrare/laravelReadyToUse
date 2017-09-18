<?php
    //command: php bdd.php <action> <nameTable> <base1,base2> <secretPass> <optionCommand>

    //arguments
    if( isset($argv[1]) and isset($argv[2]) and isset($argv[3]) and isset($argv[4]) )
    {
        $action     = $argv[1]; //ex: CREATE
        $table      = $argv[2]; //ex: user
        $baseList   = $argv[3]; //ex: laravelReadyToUseDev,laravelReadyToUseProd
        $pass       = $argv[4]; //ex: xXxXxXx
    }
    else
    {
        print "Example: php bdd.php CREATE user laravelReadyToUseDev xXxXxXx\n";
        exit("Error, missing argument(s).\n");
    }

    if(isset($argv[5]))
    {
        $option = $argv[5]; //ex: "admin TINYINT(1) NULL"
    }

    $tabBase = explode(",", $baseList);

    //loop dataBase
    foreach ($tabBase as $value)
    {
        //connection
        $Connection = new mysqli("localhost", "root", $pass, $value);

        if($Connection->connect_error)
        {
            exit("Connection failed for " . $value . ": " . $Connection->connect_error . "\n");
        }

        //action
        if($action == "CREATE")
        {
            if($table == "user")
            {
                $sql = "CREATE TABLE IF NOT EXISTS user (
                    id                  INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    login               VARCHAR(255) UNIQUE,
                    password            VARCHAR(255),
                    email               VARCHAR(255),
                    emailIsValid        TINYINT,
                    socialNetwork       VARCHAR(255),
                    urlAvatar           TEXT,
                    dateRegistration    DATE,
                    lang                CHAR(2),
                    isAdmin             TINYINT
                )";
            }
            else
            {
                print "Error, this table is not support by this script.\n";
            }
        }
        elseif($action == "DROP")
        {
            $sql = "DROP TABLE IF EXISTS " . $table;
        }
        else
        {
            print "Error, this action is not support by this script.\n";
        }

        //commit and message
        if($Connection->query($sql) === TRUE)
        {
            print "Succes, " . $action . ": " . $table . " in " . $value . ".\n";
        }
        else
        {
            print "Error, " . $table . " in " . $value . " :" . $Connection->error . "\n";
        }

        $Connection->close();
    }

    print "Finish.\n";
?>
