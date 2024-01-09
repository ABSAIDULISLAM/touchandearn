<script type="text/javascript">
    $(document).ready(function() {

        // activatio points send by sub-admin to students
        $('#searchForm').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Fix the quotes here
                data: $(this).serialize(),
                success: function(res) {
                    if (res.length > 0) {
                        $.each(res, function(key, value) {
                            $('#name').val(value.name);
                            $('#student_id').val(value.student_id);
                            $('#call').val(value.number);
                            $('#whatsApp').val(value.whats_app);
                            $('#country').val(value.country);
                            $('#gender').val(value.gender);
                            $('#id').val(value.id);
                            $('#activationPoint').val(value.activation_points);
                        });
                    }else if ('message' in res) {
                        alert(res.message);
                    }
                }
            });
        });

        // for subadmin
        $('#searchFormforsubadmin').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'), // Fix the quotes here
                data: $(this).serialize(),
                success: function(res) {
                    if (res.length > 0) {
                        $.each(res, function(key, value) {
                            $('#name').val(value.name);
                            $('#student_id').val(value.student_id);
                            $('#call').val(value.number);
                            $('#whatsApp').val(value.whats_app);
                            $('#country').val(value.country);
                            $('#gender').val(value.gender);
                            $('#id').val(value.id);
                        });
                    }else if ('message' in res) {
                        alert(res.message);
                    }
                }
            });
        });

    });
</script>
