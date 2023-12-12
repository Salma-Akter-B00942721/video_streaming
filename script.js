$(document).ready(function() {
    rating_value = 0;
    $('#add_review').click(function() {

        $('#myModal').modal('show')
    })

    $(document).on('mouseenter', '.submit_star', function() {
        rating = $(this).data('rating')
        resetStar()
        for (var i = 1; i <= rating; i++) {
            $('#submit_star_' + i).addClass('text-warning')
        }
    })

    function resetStar() {
        for (var i = 0; i <= 5; i++) {
            $('#submit_star_' + i).addClass('star-light')
            $('#submit_star_' + i).removeClass('text-warning')
        }
    }

    $(document).on('click', '.submit_star', function() {
        rating_value = $(this).data('rating')
        for (var i = 1; i <= rating_value; i++) {
            $('#submit_star_' + i).addClass('text-warning')
        }
    })


    $('#sendReview').click(function() {
        video_id = $('#video_id').val()
        user_id = $('#user_id').val()
        comment = $('#comment').val()
        if (comment == '') {
            alert('Please, Fill the Field')
            return false;
        } else {
            $.ajax({
                url: 'data-submit.php',
                method: 'POST',
                data: { video_id: video_id, user_id: user_id, comment: comment, rating_value: rating_value },
                success: function(data) {
                    $('#myModal').modal('hide')
                    console.log(data)
                        //loadData()
                }
            })
        }


    })



})