<!doctype html>
<?php
    function search() {
        echo "<br><h1>The API returned zero results for the request</h1>";
    }
    $array  = array(
    "" => "Keyword*",
    "Legislators" => "State/Representative*",
    "Committees" => "Committee ID*",
    "Bills" => "Bill ID*",
    "Amendments" => "Amendment ID*"
    );
?>
<html>
    <head>
        <title>Forecast</title>
        <style type = "text/css">
            h1 {
                text-align:center;
                font-weight:bolder;
            }
            table {
                margin: 0px auto;
                width: 350px;
                display: table;
                text-align: center;
                border-style: solid;
                border-color: gray;      //#EFEEEC
            }
            td {
                height: auto;
            }
        </style>

    </head>
    <body onchange = "changeCongress()">
        <h1>Congress Information Search</h1>
        <form name = "submit_form" id = "myForm" method = "POST" onsubmit = "return checkTable()">       <!--action = "form_processing.php" -->
            <table>
                <tr>
                    <td>
                        Congress Database
                    </td>
                    <td>
                        <select name = "congress" id = "congress">
                            <option value = "" <?php if (isset($_POST['congress']) && $_POST['congress'] == '') echo "selected";?>>Select your option</option>
                            <option value = "Legislators" <?php if (isset($_POST['congress']) && $_POST['congress'] == 'Legislators') echo "selected";?>>Legislators</option>
                            <option value = "Committees" <?php if (isset($_POST['congress']) && $_POST['congress'] == 'Committees') echo "selected";?>>Committees</option>
                            <option value = "Bills" <?php if (isset($_POST['congress']) && $_POST['congress'] == 'Bills') echo "selected";?>>Bills</option>
                            <option value = "Amendments" <?php if (isset($_POST['congress']) && $_POST['congress'] == 'Amendments') echo "selected";?>>Amendments</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Chamber
                    </td>
                    <td>
                        <input type = "radio" name = "chamber" value = "Senate" 
                        <?php 
                               if (!isset($_POST['chamber']))
                                  {echo 'checked'; }
                                  else { 
                                      if ($_POST['chamber'] == "Senate") 
                                          echo 'checked'; 
                                  }
                        ?>>Senate
                        <input type = "radio" name = "chamber" value = "House" <?php if (isset($_POST['chamber']) && $_POST['chamber'] == "House") echo "checked"; 
                        ?>>House
                    </td>
                </tr>
                <tr>
                    <td>
                        <p name = "keyword" id = "keyword">
                            <?php
                                if (isset($_POST['search']))
                                    echo $array[$_POST['congress']];
                                else        
                                    echo "Keyword*";
                            ?>
                        </p>
                    </td>
                    <td>
                        <input type = "text" name = "keyword" id = "keyword_input" <?php if (isset($_POST['keyword'])) {$_k = $_POST['keyword']; echo "value = '".$_k."'";}   //if (strlen($_k) > 0) ?>> 
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input type = "submit" name = "search" value = "Search">
                        <input type = "reset" name = "clear" value = "Clear">
                    </td>
                </tr>
                <tr>
                    <td colspan = 2>
                        <a href = "http://sunlightfoundation.com/" target = "_blank">Powered by Sunlight Foundation</a>
                    </td>

                </tr>
            </table> 
        </form>

            <script type = "text/javascript">
                function changeCongress() {
                    var cong = document.getElementById("congress");
                    var words = ["Keyword*", "State/Representative*", "Committee ID*", "Bill ID*", "Amendment ID*"];
                    document.getElementById("keyword").innerHTML =  words[cong.selectedIndex];    //
                }
                function checkTable() {
                    var cong = document.getElementById("congress").value.trim();
                    var key = document.getElementById("keyword_input").value.trim();
                    if (cong.length == 0 || key.length == 0) {
                        var msg = "Please enter the following missing information: ";
                        if (cong.length == 0 && key.length == 0)
                            msg += "Congress database" + ", " + "keyword";
                        else if (cong.length == 0)
                            msg += "Congress database";
                        else 
                            msg += "keyword";
                        alert(msg);
                        return false;
                    }
                    else {
                        //alert("length: " + cong.length + ", " + key.length);
                        return true;
                    }
                }
                
            </script>
        <?php 
            if (isset($_POST['search']))
                print_r($_POST);
            var_dump(stream_get_wrappers());
            $homepage = file_get_contents('https://congress.api.sunlightfoundation.com/legislators?chamber=house&state=WA&apikey=4ae7fc8356ba4501aad3260f043285f5');
            echo $homepage."<br>";
            $ch = curl_init(); 

        // set url 
            curl_setopt($ch, CURLOPT_URL, "https://congress.api.sunlightfoundation.com/legislators?chamber=house&state=WA&apikey=4ae7fc8356ba4501aad3260f043285f5"); 

        //return the transfer as a string 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
            $output = curl_exec($ch); 
            echo $output;
        // close curl resource to free up system resources 
            curl_close($ch);    
            //echo $homepage;
            $w = stream_get_wrappers();
            echo 'openssl: ',  extension_loaded  ('openssl') ? 'yes':'no', "\n";
            echo 'http wrapper: ', in_array('http', $w) ? 'yes':'no', "\n";
            echo 'https wrapper: ', in_array('https', $w) ? 'yes':'no', "\n";
            echo 'wrappers: ', var_export($w);
            echo 'wrappers: ', var_export($w);
        ?>
    </body>
</html>