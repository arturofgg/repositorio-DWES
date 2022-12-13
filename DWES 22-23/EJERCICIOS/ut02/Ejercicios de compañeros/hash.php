<?php
//$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72
for($a=97; $a<123; $a++ ){
    for($b=97; $b<123;$b++ ){
        for($c=97; $c<123;$c++ ){
            for($d=97; $d<123; $d++ ){
                if(password_verify(chr($d).chr($c).chr($b).chr($a),'$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72')==1){
                    echo(chr($d).chr($c).chr($b).chr($a));
                }
            }
        }
    }
}
//hora
?>