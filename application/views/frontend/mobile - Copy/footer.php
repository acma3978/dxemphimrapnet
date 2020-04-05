<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- BEGIN: footer -->

<c:if is="$debug">
    <div class="container">
        Queries: {$querycount}, Memory Usage: {$memory_usage}, Timing: {$execution_time}
    </div>
</c:if>

</body>
</html>
<!-- END: footer -->