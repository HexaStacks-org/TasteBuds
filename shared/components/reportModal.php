<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reportForm">
                    <p>Please select the reason for reporting this content:</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="spam" value="Spam"
                            required>
                        <label class="form-check-label" for="spam">Spam</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="wrongInfo"
                            value="Wrong Information">
                        <label class="form-check-label" for="wrongInfo">Wrong Information</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="inappropriateContent"
                            value="Inappropriate Content">
                        <label class="form-check-label" for="inappropriateContent">Inappropriate Content</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="copyrightInfringement"
                            value="Copyright Infringement">
                        <label class="form-check-label" for="copyrightInfringement">Copyright Infringement</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="harassmentAbuse"
                            value="Harassment or Abuse">
                        <label class="form-check-label" for="harassmentAbuse">Harassment or Abuse</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="reportReason" id="other" value="Other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel-report" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-submit-report" id="submitReport">Submit Report</button>
            </div>
        </div>
    </div>
</div>