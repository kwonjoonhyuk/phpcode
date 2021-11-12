<?php
session_start();
session_unset();
$result = session_destroy();
if($result){?>
<script>
    history.back();
</script>


<?php }?>