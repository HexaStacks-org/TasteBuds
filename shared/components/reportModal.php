<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm">
                    <p class="mb-3">Please select the reason for reporting this content:</p>

                    <!-- Radio Options -->
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam"
                            required>
                        <label class="form-check-label" for="spam">Spam</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo"
                            value="Wrong Information">
                        <label class="form-check-label" for="wrongInfo">Wrong Information</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                            value="Inappropriate Content">
                        <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                            value="Copyright Infringement">
                        <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="harassment"
                            value="Harassment or Abuse">
                        <label class="form-check-label" for="harassment">Harassment or Abuse</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="reportReason" id="others" value="Others">
                        <label class="form-check-label" for="others">Others</label>
                    </div>

                    <!-- Textarea for 'Others' option -->
                    <div class="form-group" id="othersTextArea" style="display: none;">
                        <label for="otherReasonDetails" class="form-label">Please specify:</label>
                        <textarea class="form-control" id="otherReasonDetails" rows="3"
                            placeholder="Enter details..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="submitReport">Submit Report</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to toggle the textarea visibility -->
<script>
    const radioButtons = document.querySelectorAll('input[name="reportReason"]');
    const othersTextArea = document.getElementById('othersTextArea');

    radioButtons.forEach(button => {
        button.addEventListener('change', function () {
            if (this.value === 'Others' && this.checked) {
                othersTextArea.style.display = 'block';
            } else {
                othersTextArea.style.display = 'none';
            }
        });
    });
</script>