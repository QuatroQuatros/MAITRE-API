
    $(document).ready(function() {

        $('#link').on('change', function() {
            
            var url = $(this).val();
            if (url == '#categoria') {
                window.open(url, '_top');
            }
            return false;
        });
    });
