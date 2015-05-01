function vCenter()
{
    $('.p404').css({
        'position': 'relative',
        'top':      ($(document).height() - $('.p404').height()) / 2,
    });
}

function toggleSmile(e)
{
    var face = $(this).parent().siblings('.face');

    if(
        face.hasClass('face-smile')
        &&
        $(this).is('form')
        &&
        e.type === 'focusin'
    ){
        face.data('trigger', $(this));
    }
    else if(
        !face.hasClass('face-smile')
        ||
        (
            face.hasClass('face-smile')
            &&
            $(this).is(face.data('trigger'))
        )
    ){
        face.toggleClass('face-smile').data('trigger', $(this));
    }
}

vCenter();

$('.message a').on('mouseenter mouseleave', toggleSmile);
$('.p404').on('focusin focusout', '.search-box form', toggleSmile);
$('.search-box form').submit(false);


window.onresize = vCenter;