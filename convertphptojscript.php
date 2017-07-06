<?php


$LANG="xyz";

$js_out = json_encode($LANG);

?>
<script>
    var LANG = <?php echo $js_out; ?>;
    window.alert(LANG);
</script>