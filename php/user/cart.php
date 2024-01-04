<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>xx</title>
  </head>
  <body onload = "updateTotal();">
    <script type="text/javascript">
      function updateTotal(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
          document.getElementById("table").innerHTML = this.responseText;
        }
        xhttp.open("GET", "cart-system.php");
        xhttp.send();
      }

      setInterval(function(){
        updateTotal();
      }, 1000);
    </script>
    <div id="table">

    </div>
  </body>
</html>