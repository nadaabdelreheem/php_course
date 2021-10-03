 <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Calculator</title>
        <style>
            #div1{   margin: auto;
                    width : 450px;
                    height: 530px;
                    border: 2px solid black;
                    text-align: center;
                    padding: 20px;
                    border-radius: 20px;
                    background-color: lightgray;
            }
            h3{font-size: 50px;}
            label {font-size: 20px;}
            p{margin-right: 235px;
                font-size: 20px;}
            .rad{ margin-right: 220px; }
            button { background-color: black;
                    color: white;
                    text-align: center;
                    margin-top:15px; 
                    border: 1px solid black;
                    border-radius: 4px;
                    height: 35px; 
                    width: 75px
            }
            #div2{margin: auto;
                 border:1px dashed black;}
        </style>
    </head>
    <body>
        <div id="div1">
        <h3>Simple Calculator</h3>
        <form action="calc.php" method="post">
            <label>First Number:</label>
            <input id="num1" name="num1" type="text"><br><br>
            <label> Second Number:</label>
            <input id="num2" name="num2" type="text"><br><br>
             <p id="op">operation:</p>
                ADD <input class="rad" type="radio" value="add" id="add" name="op"><br>
                SUB <input class="rad" type="radio" value="sub" id="sub" name="op"><br>
                DIV <input class="rad" type="radio" value="div" id="div" name="op"><br>
                MUL <input class="rad" type="radio" value="mul" id="mul" name="op"><br><br>
            <button type="submit" value="answer" name="answer" >Answer</button>
        </form> <br>
            <div id="div2">
             <p id="result">The Result Is:

            <?php
                if(isset($_REQUEST['op'])){
                    
                switch($_REQUEST['op']){
                        
                    case "add":
                    echo $_REQUEST["num1"] + $_REQUEST["num2"];
                    break;    


                    case "sub":
                    echo $_REQUEST["num1"] - $_REQUEST["num2"];
                    break;


                    case "div":
                    echo $_REQUEST["num1"] / $_REQUEST["num2"];
                    break;    


                    case "mul":
                    echo $_REQUEST["num1"] * $_REQUEST["num2"];
                    break; 

                    defult:
                    echo "Invalid Operation";


                }
                    }

            ?>
                 </p>
              </div>
        </div>
      
        
    </body>
</html>
        
        
        
        
        