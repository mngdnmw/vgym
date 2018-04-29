<div class="alert alert-primary" id="successful-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <div class="alert-message">
        <strong>Success!</strong> <br/> You have successfully created a workout!
    </div>
</div>
<div class="alert alert-danger" id="failed-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <div class="alert-message"><strong>Error!</strong> <br/> Could not process your request, please try again!
    </div>
</div>
<div class="modal fade" id="pageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-confirm">Okay</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="../../private/scripts.js"></script>