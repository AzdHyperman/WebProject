<?php 
    function encryptPassword($word)
    {
        $result="";
        for ($i = 0; $i < strlen($word); $i++)
        {
            switch ($word[$i]) 
            {
                case "a":
                    $codec = "a1b";
                    $result=$result . $codec;
                break;

                case "b":
                    $codec = "b2c";
                    $result=$result . $codec;
                break;

                case "c":
                    $codec = "c3d";
                    $result=$result . $codec;
                break;

                case "d":
                    $codec = "d4e";
                    $result=$result . $codec;
                break;

                case "e":
                    $codec = "e5f";
                    $result=$result . $codec;
                break;

                case "f":
                    $codec = "f6g";
                    $result=$result . $codec;
                break;

                case "g":
                    $codec = "g7h";
                    $result=$result . $codec;
                break;

                case "h":
                    $codec = "h8i";
                    $result=$result . $codec;
                break;

                case "i":
                    $codec = "i9j";
                    $result=$result . $codec;
                break;

                case "j":
                    $codec = "j0k";
                    $result=$result . $codec;
                break;

                case "k":
                    $codec = "k1l";
                    $result=$result . $codec;
                break;

                case "l":
                    $codec = "l2m";
                    $result=$result . $codec;
                break;

                case "m":
                    $codec = "m3n";
                    $result=$result . $codec;
                break;

                case "n":
                    $codec = "n4o";
                    $result=$result . $codec;
                break;

                case "o":
                    $codec = "o5p";
                    $result=$result . $codec;
                break;

                case "p":
                    $codec = "p6q";
                    $result=$result . $codec;
                break;

                case "q":
                    $codec = "q7r";
                    $result=$result . $codec;
                break;

                case "r":
                    $codec = "r8s";
                    $result=$result . $codec;
                break;

                case "s":
                    $codec = "s9t";
                    $result=$result . $codec;
                break;

                case "t":
                    $codec = "t0u";
                    $result=$result . $codec;
                break;

                case "u":
                    $codec = "u1v";
                    $result=$result . $codec;
                break;

                case "v":
                    $codec = "v2w";
                    $result=$result . $codec;
                break;

                case "w":
                    $codec = "w3x";
                    $result=$result . $codec;
                break;

                case "x":
                    $codec = "x4y";
                    $result=$result . $codec;
                break;

                case "y":
                    $codec = "y5z";
                    $result=$result . $codec;
                break;

                case "z":
                    $codec = "z6a";
                    $result=$result . $codec;
                break;

                case "1":
                    $codec = "!";
                    $result=$result . $codec;
                break;

                case "2":
                    $codec = "@";
                    $result=$result . $codec;
                break;

                case "3":
                    $codec = "#";
                    $result=$result . $codec;
                break;

                case "4":
                    $codec = "$";
                    $result=$result . $codec;
                break;

                case "5":
                    $codec = "%";
                    $result=$result . $codec;
                break;

                case "6":
                    $codec = "^";
                    $result=$result . $codec;
                break;

                case "7":
                    $codec = "&";
                    $result=$result . $codec;
                break;

                case "8":
                    $codec = "*";
                    $result=$result . $codec;
                break;

                case "9":
                    $codec = "(";
                    $result=$result . $codec;
                break;

                case "0":
                    $codec = ")";
                    $result=$result . $codec;
                break;

                default:
                    $result=$result . $word[$i];
                break;

            }  

        }
        return $result;
    }
?>