<?php

# token required, since this should only get accessed from cvs.php.net
if (!isset($token) || md5($token) != "19a3ec370affe2d899755f005e5cd90e")
  die("token not correct.");

// Connect and generate the list from the DB
if (@mysql_connect("localhost","nobody","")) {
  if (@mysql_select_db("php3")) {
    $res = @mysql_query("SELECT cvsuser FROM users_cvs WHERE approved");
    if ($res) {
      while ($row = @mysql_fetch_array($res)) {
        if ($row[cvsuser] == 'cvsread') continue;
        echo "$row[cvsuser]\n";
      }
    }
  }
}
