jQuery(document).ready(function ($) {
    console.log('ready'); 
    let menuText = {};
    $("#mega-menu-item-786").on('open_panel', function(e) {
        e.preventDefault();
        menuText['786'] = $("#mega-menu-item-786 > .mega-menu-link").text();
        $('#mega-menu-wrap-primary #mega-menu-primary li#mega-menu-item-786 > a.mega-menu-link')
            .attr('style','width:auto !important;' );
        $("#mega-menu-item-786 > .mega-menu-link").empty();
        console.log(menuText);
    });
    $("#mega-menu-item-786").on('close_panel', function () {
        $("#mega-menu-item-786 > .mega-menu-link").width('100%');
        $("#mega-menu-item-786 > .mega-menu-link").text(menuText['786']);
    });
    $("#mega-menu-item-790").on('open_panel', function () {
        menuText[790] = $("#mega-menu-item-790 > .mega-menu-link").text();
        $('#mega-menu-wrap-primary #mega-menu-primary li#mega-menu-item-790 > a.mega-menu-link')
            .attr('style', 'width:auto !important;');
        $("#mega-menu-item-790 > .mega-menu-link").empty();
    });
    $("#mega-menu-item-790").on('close_panel', function () {
        $("#mega-menu-item-790 > .mega-menu-link").width('100%');
        $("#mega-menu-item-790 > .mega-menu-link").text(menuText[790]);
    });
    $("#mega-menu-item-796").on('open_panel', function () {
        menuText[796] = $("#mega-menu-item-796 > .mega-menu-link").text();
        $('#mega-menu-wrap-primary #mega-menu-primary li#mega-menu-item-796 > a.mega-menu-link')
            .attr('style', 'width:auto !important;');
        $("#mega-menu-item-796 > .mega-menu-link").empty();
    })
    $("#mega-menu-item-796").on('close_panel', function () {
        $("#mega-menu-item-796 > .mega-menu-link").width('100%');
        $("#mega-menu-item-796 > .mega-menu-link").text(menuText[796]);
    });
    $("#mega-menu-item-798").on('open_panel', function () {
        menuText[798] = $("#mega-menu-item-798 > .mega-menu-link").text();
        $('#mega-menu-wrap-primary #mega-menu-primary li#mega-menu-item-798 > a.mega-menu-link')
            .attr('style', 'width:auto !important;');
        $("#mega-menu-item-798 > .mega-menu-link").empty();
    })
    $("#mega-menu-item-798").on('close_panel', function () {
        $("#mega-menu-item-798 > .mega-menu-link").width('100%');
        $("#mega-menu-item-798 > .mega-menu-link").text(menuText[798]);
    });
}); 