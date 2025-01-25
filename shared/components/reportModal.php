<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm" method="post">
                    <p class="mb-3">Please select the reason for reporting this content:</p>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="spam" value="1" required>
                        <label class="form-check-label" for="spam">Spam</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo" value="2">
                        <label class="form-check-label" for="wrongInfo">Wrong Information</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                            value="3">
                        <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                            value="4">
                        <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="reportReason" id="harassment" value="5">
                        <label class="form-check-label" for="harassment">Harassment or Abuse</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="reportReason" id="others" value="6">
                        <label class="form-check-label" for="others">Others</label>
                    </div>
                    <div class="form-group" id="othersTextArea" style="display: none;">
                        <label for="otherReasonDetails" class="form-label">Please specify:</label>
                        <textarea class="form-control" name="otherReasonDetails" id="otherReasonDetails" rows="3"
                            placeholder="Enter details..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="reportForm" class="btn btn-danger">Submit Report</button>
            </div>
        </div>
    </div>
</div>