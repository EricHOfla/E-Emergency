<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if admin is logged in
if(strlen($_SESSION['alogin'])==0) {
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

header('Content-Type: application/json');

$type = isset($_GET['type']) ? $_GET['type'] : 'all';
$now = date('Y-m-d H:i:s');

try {
    // Mark notifications as read by updating the "last checked" timestamp
    // This effectively filters out all older items in get-notifications.php
    
    switch($type) {
        case 'booking':
            $_SESSION['last_booking_check'] = $now;
            break;
            
        case 'query':
            $_SESSION['last_query_check'] = $now;
            // Also update DB status for queries as before
            $sql = "UPDATE tblcontactusquery SET status = 1 WHERE status = 0 OR status IS NULL";
            $query = $dbh->prepare($sql);
            $query->execute();
            break;
            
        case 'testimonial':
            $_SESSION['last_testimonial_check'] = $now;
            break;
            
        case 'subscriber':
            $_SESSION['last_subscriber_check'] = $now;
            break;
            
        case 'user':
            $_SESSION['last_user_check'] = $now;
            break;
            
        case 'all':
            // Mark all types as checked now
            $_SESSION['last_booking_check'] = $now;
            $_SESSION['last_query_check'] = $now;
            $_SESSION['last_testimonial_check'] = $now;
            $_SESSION['last_subscriber_check'] = $now;
            $_SESSION['last_user_check'] = $now;
            
            // Should act as 'mark all read' for persistent markers too
            $sql = "UPDATE tblcontactusquery SET status = 1 WHERE status = 0 OR status IS NULL";
            $query = $dbh->prepare($sql);
            $query->execute();
            break;
    }
    
    echo json_encode(['success' => true, 'message' => 'Notifications marked as read', 'timestamp' => $now]);
    
} catch(Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
