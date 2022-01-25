</body>
<script src="<?= base_url()?>assets/owner/js/core/jquery.3.2.1.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/core/popper.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/core/bootstrap.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/chartist/chartist.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/chart-circle/circles.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/ready.min.js"></script>
<script src="<?= base_url()?>assets/owner/js/demo.js"></script>

<script>
function bacaGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#gambar_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#preview_gambar").change(function() {
    bacaGambar(this);
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 3000)

document.getElementById("preview_video")
    .onchange = function(event) {
        let file = event.target.files[0];
        let blobURL = URL.createObjectURL(file);
        document.querySelector("video").src = blobURL;
    }
</script>

</html>