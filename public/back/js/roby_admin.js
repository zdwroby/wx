/**
 * Created by roby on 2017/2/28.
 */


$(document).ready(function(){
    /* 左边菜单高亮 */
    url = window.location.pathname + window.location.search;
    url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(\?id=\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
    console.log(url);

    $('.wrapper .sidebar ul li ul li').hide();
    var curr_url_li = $('.sidebar').find("a[href='" + url + "']").parent();
    if(url=='/wechat/list' || url=='/wechat/active' || url=='/wechat/source'){             //公众号列表页面时，隐藏单独的公众号管理菜单
        var obj = curr_url_li.parent().parent();
        obj.next('li').find('span').hide();
    }
    if(url=='/onewechat/menu' || url=='/onewechat/keyword' || url=='/onewechat/event'){          //单独公众号页面时，隐藏公众号列表页面
        curr_url_li.parent().parent().prevAll('li').hide();
    }
    curr_url_li.addClass('current');           //当前页面链接所在li
    curr_url_li.parent().find('li').show()     //显示同级li
    $('.sidebar span').removeClass('glyphicon-minus');
    curr_url_li.parent().parent().find('span').addClass('glyphicon-minus');


    //左侧下拉框切换
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

