<script src="client/js/jquery-3.3.1.min.js"></script>
<script src="client/js/bootstrap.min.js"></script>
<script src="client/js/jquery.nice-select.min.js"></script>
<script src="client/js/jquery-ui.min.js"></script>
<script src="client/js/jquery.slicknav.js"></script>
<script src="client/js/mixitup.min.js"></script>
<script src="client/js/owl.carousel.min.js"></script>
<script src="client/js/main.js"></script>

<script>
     document.addEventListener('DOMContentLoaded', function () {
      const toastSuccess = document.getElementById('toast-success');
      const toastError = document.getElementById('toast-error');

      function showToast(toast) {
          if (toast) {
              toast.style.opacity = 1;
              toast.style.transform = 'translateY(0)';
              // Hide toast after 3 seconds
              setTimeout(() => {
                  toast.style.opacity = 0;
                  toast.style.transform = 'translateY(-20px)';
              }, 6000);
          }
      }

      // Show toasts if present
      showToast(toastSuccess);
      showToast(toastError);
  });
</script>