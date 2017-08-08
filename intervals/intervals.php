<html>
    <head>
        <link rel="stylesheet" href="resources/styles.css" />
    </head>
    <body id="sky" class="sky0">
        <?php
            // We are using PHP to write html, just to be cool, you can just write the html
            // out directly, cause its already a html document, but we want to practice php
            print("<img id='moon' class='moon0' src='resources/moon.png' />");
            print("<img id='mountains' src='resources/mountains.png' />");
        ?>
        <script type="text/javascript">
            // First, obtain the two changing html elements by using their id attribute
            var moonElement = document.getElementById("moon");
            var skyElement = document.getElementById("sky");
            
            // You are using the skyX and moonX styles to change the display
            // from one frame to another
            
            // We want to start at second 0
            var second = 0;
            
            // We create an interval which executes every second
            // This creates the first condition, which is that you get
            // one second of sky0, before changing to sky1, 2, 3, etc
            setInterval(function(){
                // We can increment the second here by one each time
                second = second + 1;
                // We want to use modulus to create a circle of "remainders" 
                // The cirle this creates is 7 cycles long
                second = second % 8;
                
                // Then we update the moon and sky classnames
                // We just simply "add" the number to the end of the class name string
                moonElement.className="moon"+second;
                skyElement.className="sky"+second;
            },1000);
            
            /*
            each "interval" will execute the function, after the timer of 1000 milliseconds "runs out"
            but this automatically creates a 1 second "gap" at the beginning of the cycle, right?
            this gives you automatically what you wanted, 1 second with sky0, before changing it
            but after the cycle starts, it never stops, so it just continues until infinity (when the sun explodes, or chrome crashes, which is first)
            because you want to change every second, for a total of 7 iterations, each iteration is one second long, so thats 7000 milliseconds in total
            :P
            
            */
        </script>
    </body>
</html>