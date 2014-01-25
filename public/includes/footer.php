

        <?php 
            echo $db->getQuerys();
            echo $db->getLastQuery();
            echo "SERVER<hr />";
            var_dump($_SERVER);            
            echo "SESSION<hr />";
            var_dump($_SESSION);
        ?>
    </body>
</html>