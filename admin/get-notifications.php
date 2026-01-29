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

// Get last check timestamps from session
$last_booking_check = isset($_SESSION['last_booking_check']) ? $_SESSION['last_booking_check'] : '2000-01-01 00:00:00';
$last_query_check = isset($_SESSION['last_query_check']) ? $_SESSION['last_query_check'] : '2000-01-01 00:00:00';
$last_testimonial_check = isset($_SESSION['last_testimonial_check']) ? $_SESSION['last_testimonial_check'] : '2000-01-01 00:00:00';
$last_subscriber_check = isset($_SESSION['last_subscriber_check']) ? $_SESSION['last_subscriber_check'] : '2000-01-01 00:00:00';
$last_user_check = isset($_SESSION['last_user_check']) ? $_SESSION['last_user_check'] : '2000-01-01 00:00:00';

$notifications = [];
$totalCount = 0;

// 1. New pending bookings (Status = 0) AND newer than last check
$sql = "SELECT COUNT(*) as count FROM tblbooking WHERE Status = 0 AND PostingDate > :last_check";
$query = $dbh->prepare($sql);
$query->bindParam(':last_check', $last_booking_check, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$pendingBookings = $result->count;

if($pendingBookings > 0) {
    $notifications[] = [
        'type' => 'booking',
        'icon' => 'fa-calendar-check-o',
        'color' => '#ffc107',
        'title' => 'Pending Dispatch Request',
        'count' => $pendingBookings,
        'message' => $pendingBookings . ' new dispatch request(s)',
        'link' => 'manage-bookings.php'
    ];
    $totalCount += $pendingBookings;
}

// 2. New contact queries (status = 0/NULL) AND newer than last check
// Note: We might update status to 1 in DB, but timestamp check is safer for "notification view"
$sql = "SELECT COUNT(*) as count FROM tblcontactusquery WHERE (status = 0 OR status IS NULL) AND PostingDate > :last_check";
$query = $dbh->prepare($sql);
$query->bindParam(':last_check', $last_query_check, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$pendingQueries = $result->count;

if($pendingQueries > 0) {
    $notifications[] = [
        'type' => 'query',
        'icon' => 'fa-envelope',
        'color' => '#17a2b8',
        'title' => 'New Inquiry',
        'count' => $pendingQueries,
        'message' => $pendingQueries . ' new contact inquiry(ies)',
        'link' => 'manage-conactusquery.php'
    ];
    $totalCount += $pendingQueries;
}

// 3. New testimonials (status = 0/NULL) AND newer than last check
$sql = "SELECT COUNT(*) as count FROM tbltestimonial WHERE (status = 0 OR status IS NULL) AND PostingDate > :last_check";
$query = $dbh->prepare($sql);
$query->bindParam(':last_check', $last_testimonial_check, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$pendingTestimonials = $result->count;

if($pendingTestimonials > 0) {
    $notifications[] = [
        'type' => 'testimonial',
        'icon' => 'fa-comment',
        'color' => '#28a745',
        'title' => 'Testimonial Review',
        'count' => $pendingTestimonials,
        'message' => $pendingTestimonials . ' new testimonial(s)',
        'link' => 'testimonials.php'
    ];
    $totalCount += $pendingTestimonials;
}

// 4. New subscribers (last 7 days AND newer than last check)
$sql = "SELECT COUNT(*) as count FROM tblsubscribers WHERE PostingDate >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND PostingDate > :last_check";
$query = $dbh->prepare($sql);
$query->bindParam(':last_check', $last_subscriber_check, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$newSubscribers = $result->count;

if($newSubscribers > 0) {
    $notifications[] = [
        'type' => 'subscriber',
        'icon' => 'fa-bell',
        'color' => '#6f42c1',
        'title' => 'New Subscriber',
        'count' => $newSubscribers,
        'message' => $newSubscribers . ' new alert subscriber(s)',
        'link' => 'manage-subscribers.php'
    ];
    $totalCount += $newSubscribers;
}

// 5. New users (last 7 days AND newer than last check)
$sql = "SELECT COUNT(*) as count FROM tblusers WHERE RegDate >= DATE_SUB(NOW(), INTERVAL 7 DAY) AND RegDate > :last_check";
$query = $dbh->prepare($sql);
$query->bindParam(':last_check', $last_user_check, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);
$newUsers = $result->count;

if($newUsers > 0) {
    $notifications[] = [
        'type' => 'user',
        'icon' => 'fa-user-plus',
        'color' => '#20c997',
        'title' => 'New Registration',
        'count' => $newUsers,
        'message' => $newUsers . ' new patient(s) registered',
        'link' => 'reg-users.php'
    ];
    $totalCount += $newUsers;
}

echo json_encode([
    'success' => true,
    'totalCount' => $totalCount,
    'notifications' => $notifications
]);
?>
