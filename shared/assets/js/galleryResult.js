document.addEventListener("DOMContentLoaded", function () {
    var reportButtons = document.querySelectorAll('.btn-report');

    for (var i = 0; i < reportButtons.length; i++) {
        reportButtons[i].addEventListener('click', function () {
            var reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
            reportModal.show();
        });
    }

    document.getElementById('submitReport').addEventListener('click', function () {
        var selectedReason = document.querySelector('input[name="reportReason"]:checked');
        if (selectedReason) {
            alert('Report submitted for reason: ' + selectedReason.value);
            var reportModal = bootstrap.Modal.getInstance(document.getElementById('reportModal'));
            reportModal.hide();
        } else {
            alert('Please select a reason for reporting.');
        }
    });
});