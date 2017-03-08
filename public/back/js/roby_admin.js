/**
 * Created by roby on 2017/2/28.
 */


$(document).ready(function(){
    $('.wrapper .sidebar ul li ul li:gt(0)').hide();
    $('.sidebar span:eq(0)').addClass('glyphicon-minus');
    $('.sidebar span:gt(0)').removeClass('glyphicon-minus');

    $('.sidebar span').click(function(){
        $('.sidebar span').removeClass('glyphicon-minus');
        $(this).toggleClass('glyphicon-minus');

        $('.wrapper .sidebar ul li ul li:not(this)').hide();
        $(this).next().find('li').toggle();
    })


    //公用顶部下拉
    $('.dropdown a').mousemove(function(){
        $('.dropdown-menu').show();
        $(this).addClass('current');
    })
    $('.dropdown-menu, .dropdown').mouseleave(function(){
        $('.dropdown-menu').hide();
        $('.dropdown a').removeClass('current');
    })
})

