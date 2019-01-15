var changePhoto = document.getElementsByClassName('season');
function mouseover() {
    var img = document.getElementById('img');
    img.src = this.getAttribute('src');
}

function nowDate() {
    var now = new Date();
    alert('Այսօրվա ամսաթիվն է ' + now );
}

function myFunction() {

    var now = new Date();
    var time = now.getTime() / (1000 * 60 * 60 * 24 ); // days

    var myBirthday = new Date(2017,9,21,0,0,0);
    var from1970ToMyBirthday = myBirthday.getTime() / (1000 * 60 * 60 * 24);
    var fromTodayToMybirthday = Math.round(from1970ToMyBirthday - time);

    var days = [
        'Կիրակի','Երկուշաբթի','Երեքշաբթի','Չորեքշաբթի','Հինգշաբթի','Ուրբաթ','Շաբաթ'
    ];
    var myDay = days[myBirthday.getDay()];
    document.getElementById("demo");
    alert('Մնաց ' + fromTodayToMybirthday + ' օր և այն ' + myDay + ' է։' );
}

$(document).ready(function () {

    for(i = 0; i < changePhoto.length; i++){
        changePhoto[i].addEventListener("mouseover", mouseover);
    }

    $('.mvc_diagram').hide();

    $(".mvc_btn").mouseover(function(){
        $(".mvc_diagram").show();
    });
    $(".mvc_btn").click(function(){
        $(".mvc_diagram").hide();
    });

    $('#add_comment').click(function () {
        var comment = $('#comment').val();
        var product_id = $('#product_id').val();

        $.ajax({
            url: '/addComment',
            type: 'POST',
            async: false,
            data: {
                ajax: 'true',
                comment: comment,
                product_id: product_id
            },
            dataType: 'json'
        });

        var currentdate = new Date();
        var datetime = currentdate.getFullYear() + "-"
            + (currentdate.getMonth() + 1) + "-"
            + currentdate.getDate() + " - "
            + currentdate.getHours() + ":"
            + currentdate.getMinutes() + ":"
            + currentdate.getSeconds();
        $('#comment').val(' ');
        $("#comment_area").append('<p>' + comment + '<span style="float: right">' + datetime + '</span></p>');
    });

    $('#edit').hide();

    $('.edit_phone').click(function () {
        $("#edit").toggle();
    });


    $('.replaced_photo').click(function () {
        var x = '<button class="replace_photo">Replace</button>';
        $(x).show();
    });

    $(document).delegate(".delete_phone", "click", function () {
        $("#dialog").html('Are you sure to delete this phone?').dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            modal: true,
            buttons: {
                "Ok": function () {
                    $(this).dialog("close");
                },
                "Cancel": function () {
                    $(this).dialog("close");
                }
            }
        });
        $("#dialog").dialog("open");
    });

});
