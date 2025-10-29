<!-- Include Bootstrap CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Modal Structure -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered"> <!-- Added 'modal-dialog-centered' -->
        <div class="modal-content" style="background-color: #3F3F3F; gray: white; margin: 0; font-size:10px; width:300px;">
            <div class="modal-header" style="padding: 5px;">
                <h5 class="modal-title" id="authModalLabel" style="margin: 0;font-size:12px;">Login or Register</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="row g-0">
                    <!-- Login Section -->
                    <div class="col-6" style="text-align: center; margin: auto 0;font-size:12px;">
                        <h6 style="margin-bottom: 5px;font-size:12px;">Do you have an account?</h6>
                        <button style="background-color:gray" type="button" class="btn btn-primary btn-sm mb-2"><a style="color:white; text-decoration:none" href="">Login</a></button>
                        <h6 style="margin-bottom: 5px;font-size:12px;">Already have an account?</h6>
                        <button type="button" style="font-size:12px;" class="btn btn-success btn-sm"><a style="color:white; text-decoration:none" href="">Register</a></button>
                    </div>
                    
                    <!-- Image Section -->
                    <div class="col-6">
                        <div style="width: 100%; max-width: 300px; margin: 0 auto;">
                            <img src="https://via.placeholder.com/300" alt="Sample Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script to Show Modal on Page Load -->
<script>
    window.onload = function() {
        var myModal = new bootstrap.Modal(document.getElementById('authModal'));
        myModal.show();
    };
</script>
