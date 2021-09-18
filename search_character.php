<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabel Character Genshin Impact</title>
    <style>
      body{
        background: #8360c3;  
        background: -webkit-linear-gradient(to right, #2ebf91, #8360c3);  
        background: linear-gradient(to right, #2ebf91, #8360c3);
        font-family: 'Roboto', sans-serif;
      }
      .header {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: auto;
        background: #f1f1f1;
        box-shadow: 0 4px rgba(0, 0, 0, 0.2);
      }

      .search {
        float: right;
        line-height: 50px;
        margin-right: 10px;
        font-weight: bold;
        border-radius: 5px 0px 0px 5px;
      }

      #submit {
        position: relative;
        left: -8px;
        border: 2px solid #0c4a7c;
        background-color: #0c4a7c;
        color: #fafafa;
        font-weight: bold;
        cursor: pointer;
        border-radius: 0px 5px 5px 0px;
      }

      #submit:hover {
        background: black;
      }

      .menu {
        float: left;
      }
      .logo {
        display: inline-block;
        vertical-align: top;
        width: 80px;
        height: 50px;
        margin-right: 30px;
        margin-left: 40px;
      }
      .menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .menu ul li {
        display: inline-block;
      }

      .menu li a {
        text-decoration: none;
        color: #0c4a7c;
        padding: 0 20px;
        display: block;
        line-height: 50px;
        font-weight: bold;
      }
      .active {
        color: #ffffff;
      }
      .menu li:hover {
        background-color: #539ad8;
      }

      .menu li a:hover {
        color: #ffffff;
      }
      .button:hover {
        background-color: #539ad8;
        border-radius: 10px;
      }
      h1 {
        font-size: 2.5em;
        text-transform: uppercase;
        margin: 0;
      }
      .dropbtn {
        padding: 16px;
        font-size: 16px;
        border: none;
        background-color: none;
        color: #0c4a7c;
        font-weight: bold;
        cursor: pointer;
      }

      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
      }
      .dropdown-content a:hover {
        background-color: #539ad8;
      }

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .dropdown:hover .dropbtn {
        background-color: none;
      }
      h1{
        font-size: 30px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 300;
        text-align: center;
        padding-top: 75px;
        margin-bottom: 15px;
      }
      table{
        width:100%;
        table-layout: fixed;
      }
      th{
        padding: 17px 13px;
        text-align: center;
        font-weight: 500;
        font-size: 16px;
        color: #fff;
        text-transform: uppercase;
      }
      td {
        padding: 15px;
        text-align: center;
        vertical-align:middle;
        font-weight: 300;
        font-size: 14px;
        color: #fff;
        border-bottom: solid 1px rgba(255,255,255,0.1);
      }
      table thead tr {
        background-color: rgba(255,255,255,0.3);
      }
      /* th, td{
        padding: 12px 15px;
      } */

      tbody tr {
        height:75px;
        overflow-x:auto;
        margin-top: 0px;
        border: 1px solid rgba(255,255,255,0.3);
      }
    </style>
</head>
<body>
    <div class="header">
        <div class="search">
        <form action="search_character.php" method="post">
            <input type="text" name="search" placeholder="Search..." />
            <input type="submit" id="submit "value="Search" />
            </form>
        </div>
        <div class="menu">
            <ul>
            <img class="logo" src="./assets/logo.png" alt="">
            <li><a href="genshin.html">Home</a></li>
            <li>
                <div class="dropdown">
                <div class="dropbtn">Database</div>
                <div class="dropdown-content">
                    <a href="list_character.php">Character</a>
                    <a href="list_monster.php">Monster</a>
                </div>
                </div>
            </li>
            <li><a href="about.html">About</a></li>
            </ul>
        </div>
    </div>
    <h1>Character</h1>
    <table>
      <thead>
        <tr>
        <th width="7%">No</th>
        <th width="28%">Character Name</th>
        <th width="20%">Rarity</th>
        <th width="45%">Link</th>
        </tr>
    </thead>
    <?php
    include ('config.php');

    $search = $_POST['search'];

    if ($db_connection->connect_error){
        die("Connection failed: ". $db_connection->connect_error);
    }

    $sql = "select * from character_list where nama_karakter like '%$search%'";
    $result = $db_connection->query($sql);

    if ($result->num_rows > 0){
    while($row = $result->fetch_assoc() ){
        echo "<tbody><tr><td>" . $row["nomor"] . "</td><td>" . $row["nama_karakter"] . "</td><td>" . $row["rarity"] . "</td><td>" . $row["link"] . "</td></tr></tbody>";
        }
        echo "</table>";
    } else {
        echo "0 records";
    }

    $db_connection->close();

    ?>
    </table>
  </body>
</html>