window.onload = function () {
    if (typeof alerts !== "undefined" && alerts.length > 0) {
        alerts.forEach(alert => showAlert(alert.status, alert.pgName));
    }
};

function showAlert(status, packageName) {
    let alertClass = "";
    let headerBg = "";
    let icon = '<i class="fas fa-bell text-white"></i>'; // White notification icon using Font Awesome

    switch (status) {
        case "Pending":
            alertClass = "alert-warning";
            headerBg = "bg-warning text-white";
            message = `Your booking for <strong>${packageName}</strong> is currently <span class="text-warning fw-bold">Pending</span>. Please wait for confirmation.`;
            break;
        case "Confirmed":
            alertClass = "alert-primary";
            headerBg = "bg-primary text-white";
            message = `Great news! Your booking for <strong>${packageName}</strong> has been <span class="text-primary fw-bold">Confirmed</span>.`;
            break;
        case "Rejected":
            alertClass = "alert-danger";
            headerBg = "bg-danger text-white";
            message = `Unfortunately, your booking for <strong>${packageName}</strong> has been <span class="text-danger fw-bold">Rejected</span>. Please try again or contact support.`;
            break;
        default:
            alertClass = "alert-secondary";
            headerBg = "bg-secondary text-white";
    }

    let alertHtml = `
<div class="alert ${alertClass} alert-dismissible fade show rounded-3 shadow-lg" role="alert" style="max-width: 400px;">
    <div class="alert-header ${headerBg} d-flex justify-content-between align-items-center px-3 py-2 fw-bold rounded-3">
        <span>${icon} Booking Notification</span>
        <button type="button" class="btn-close" onclick="this.parentElement.parentElement.remove();" aria-label="Close"></button>
    </div>
    <div class="alert-body pt-2">
        ${message}
    </div>
</div>`;

    let alertContainer = document.getElementById("alert-container");
    if (alertContainer) {
        const wrapper = document.createElement("div");
        wrapper.innerHTML = alertHtml;
        alertContainer.append(wrapper);

        // Auto-hide alert after 5 seconds (5000ms)
        setTimeout(() => {
            wrapper.remove();
        }, 10000);
    } else {
        console.error("⚠️ Alert container not found!");
    }
}
