<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<button style="display: none" id="notyf-show">Show notification</button>

<?php

if (isset($_SESSION['flash']) && !empty($_SESSION['flash'])) {
    $feedback_notification = $_SESSION['flash'][0];
    $feedback_type = $feedback_notification['type'];
    $feedback_message = $feedback_notification['message'];
    ?>
    <script>
        window.onload = function () {
            var message = '<?php echo $feedback_message; ?>';
            var type = '<?php echo $feedback_type; ?>';
            notify(type, message);
        };
    </script>
    <?php
    unset($_SESSION['flash']); // Clear flash data
}
?>

<script>
    // Initialize Notyf
    window.notyf = new Notyf({
        duration: 10000,
        ripple: true,
        dismissible: true,
        position: { x: 'center', y: 'top' }
    });

    // Reusable notify function
    function notify(type, message) {
        window.notyf.open({ type, message });
    }
</script>