
<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px; display: flex; align-items: center; gap: 15px; padding: 10px 20px;">
        <div style="background: var(--primary-color); width: 40px; height: 40px; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
            <i class="fa fa-ambulance" style="color: white; font-size: 1.2em;"></i>
        </div>
        <span style="font-weight: 800; letter-spacing: 1px;">E-Emergency <small style="font-weight: 400; opacity: 0.7;">Admin</small></span>
    </a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<!-- Notification Bell -->
			<li class="ts-notifications" id="notificationContainer" style="position: relative; margin-right: 10px;">
				<a href="#" id="notificationBell" style="background: rgba(255,255,255,0.1) !important; border-radius: 8px; padding: 10px 15px !important; position: relative;">
					<i class="fa fa-bell" style="font-size: 1.2em;"></i>
					<span id="notificationBadge" style="position: absolute; top: 5px; right: 5px; background: var(--primary-color); color: white; font-size: 10px; font-weight: 700; padding: 2px 6px; border-radius: 10px; display: none;">0</span>
				</a>
				<div id="notificationDropdown" style="display: none; position: absolute; right: 0; top: 100%; width: 320px; background: white; border-radius: 12px; box-shadow: 0 10px 40px rgba(0,0,0,0.2); z-index: 9999; margin-top: 10px; overflow: hidden;">
					<div style="background: var(--secondary-color); color: white; padding: 15px 20px; font-weight: 700;">
						<i class="fa fa-bell"></i> Mission Alerts
					</div>
					<div id="notificationList" style="max-height: 350px; overflow-y: auto;">
						<!-- Notifications will be loaded here -->
						<div style="padding: 20px; text-align: center; color: #999;">
							<i class="fa fa-spinner fa-spin"></i> Loading...
						</div>
					</div>
					<a href="dashboard.php" style="display: block; padding: 12px; text-align: center; background: var(--accent-color); color: var(--secondary-color); font-weight: 600; border-top: 1px solid #eee;">
						View Command Dashboard
					</a>
				</div>
			</li>
			<li class="ts-account">
				<a href="#" style="background: rgba(255,255,255,0.1) !important; border-radius: 8px; margin: 10px;"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Portal Access <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Security Settings</a></li>
					<li><a href="logout.php">Terminate Session</a></li>
				</ul>
			</li>
		</ul>
	</div>

<style>
.ts-notifications:hover #notificationDropdown {
	display: block !important;
}
/* Bridge the gap so hover isn't lost */
.ts-notifications::after {
    content: '';
    display: block;
    position: absolute;
    top: 100%;
    right: 0;
    width: 100%;
    height: 15px; /* Covers the margin-top gap */
}
#notificationDropdown .notification-item {
	display: flex;
	align-items: flex-start;
	gap: 12px;
	padding: 15px 20px;
	border-bottom: 1px solid #f0f0f0;
	transition: all 0.2s;
	text-decoration: none;
	color: #333;
}
#notificationDropdown .notification-item:hover {
	background: #f9f9f9;
}
#notificationDropdown .notification-icon {
	width: 40px;
	height: 40px;
	border-radius: 50%;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-shrink: 0;
}
#notificationDropdown .notification-content {
	flex: 1;
}
#notificationDropdown .notification-title {
	font-weight: 700;
	font-size: 0.9em;
	margin-bottom: 3px;
}
#notificationDropdown .notification-message {
	font-size: 0.8em;
	color: #666;
	line-height: 1.4;
}
</style>

<script>
var lastCount = 0;

document.addEventListener('DOMContentLoaded', function() {
	// Fetch notifications
	function loadNotifications() {
		fetch('get-notifications.php')
			.then(function(response) { return response.json(); })
			.then(function(data) {
				if(data.success) {
                    lastCount = data.totalCount;

					// Update badge - Only hide if count is 0
					var badge = document.getElementById('notificationBadge');
					if(data.totalCount > 0) {
						badge.textContent = data.totalCount > 99 ? '99+' : data.totalCount;
						badge.style.display = 'block';
					} else {
						badge.style.display = 'none';
					}
					
					// Update notification list
					var list = document.getElementById('notificationList');
					if(data.notifications.length > 0) {
						var html = '';
						data.notifications.forEach(function(notif) {
							html += '<a href="' + notif.link + '" class="notification-item" onclick="markNotificationRead(\'' + notif.type + '\', \'' + notif.link + '\'); return false;">' +
								'<div class="notification-icon" style="background: ' + notif.color + '20; color: ' + notif.color + ';">' +
									'<i class="fa ' + notif.icon + '"></i>' +
								'</div>' +
								'<div class="notification-content">' +
									'<div class="notification-title">' + notif.title + ' <span style="background: ' + notif.color + '; color: white; font-size: 10px; padding: 2px 6px; border-radius: 10px; margin-left: 5px;">' + notif.count + '</span></div>' +
									'<div class="notification-message">' + notif.message + '</div>' +
								'</div>' +
							'</a>';
						});
						list.innerHTML = html;
					} else {
						list.innerHTML = '<div style="padding: 30px; text-align: center; color: #999;"><i class="fa fa-check-circle" style="font-size: 2em; margin-bottom: 10px; display: block; color: #28a745;"></i>All systems operational. No pending actions.</div>';
					}
				}
			})
			.catch(function(err) {
				console.log('Notification fetch error:', err);
			});
	}
	
	// Load on page load
	loadNotifications();
	
	// Refresh every 30 seconds
	setInterval(loadNotifications, 30000);
});
</script>
