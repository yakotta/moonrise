<html>
    <head>
        <link rel="stylesheet" href="resources/styles.css" />
    </head>
    <body id="sky" class="skystart">
        <?php
            // We are using PHP to write html, just to be cool, you can just write the html
            // out directly, cause its already a html document, but we want to practice php
            print("<img id='moon' class='moonstart' src='resources/moon.png' />");
            print("<img id='mountains' src='resources/mountains.png' />");
        ?>
        <script type="text/javascript">
            // First, obtain the two changing html elements by using their id attribute
            var moonElement = document.getElementById("moon");
            var skyElement = document.getElementById("sky");
            
            setTimeout(function(){
                // This changes the element's class to end, which in the CSS has the bottom transition
                moonElement.className = "moonend";
                skyElement.className = "skyend";
                
                setTimeout(function(){
                    moonElement.className = "moonstart";
                    skyElement.className = "skystart";
                },10000);
            },250);
        </script>
    </body>
</html>