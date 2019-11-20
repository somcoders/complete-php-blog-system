<footer class="footer">
            <h2>&copy;copyright <?php echo date("Y");  ?> Somcoders Designed by Abdifatah Abdilahi</h2>
        </footer>
    
    </body>
        <script>
            function showMenu(){
               var nav = document.getElementById("nav");
                if(nav.className === "navbar" ){
                    nav.className += " responsive";
                }else{
                    nav.className = "navbar";
                }
            }
        </script>
</html>