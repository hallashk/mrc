jQuery(document).ready(function ($) {
    function getInnerText($e) {
        return $("#" + $e.attr("id").replace('expando_link_','expando_text_'));
    }

    function getViewModChild($e) {
        return $("#" + $e.attr("id").replace('expando_link_','expando_viewmod_'));
    }
	
    function getTitle($e) {
        return $("#" + $e.attr("id").replace('expando_link_','expando_title_'));
    }

    function stopEvent($e) {
        $e.preventDefault();
        $e.stopPropagation();
    }

    function hideExpando($link) {
		var $inner = getInnerText($link);
		var $viewMod = getViewModChild($link);
        $inner.hide();
        $viewMod.attr('data-visible','false').html($viewMod.attr("data-show"));
        $link.attr('data-visible','false');
    }

    function showExpando($link) {
		var $inner = getInnerText($link);
		var $viewMod = getViewModChild($link);
        $inner.show();
        $viewMod.attr('data-visible','true').html($viewMod.attr("data-show"));
        $link.attr('data-visible','true');
    }

    function hideAllExpandos() {
        $allLinks.each(function () {
            hideExpando($(this));
        });
    }
    function showAllExpandos() {
        $allLinks.each(function () {
            showExpando($(this));
        });
    }
    var $allLinks = $("a.expando_link");
    $allLinks.click(function (evt) {
        var $link = $(this);
		//alert($link.html() + "\n\n|||\n\n" + $inner.html() + " --- \n" + $link.attr('data-visible'));
		stopEvent(evt);
		if ($link.attr('data-visible') == "true") {
			hideExpando($link);
		} else {
			showExpando($link);
		}
    });
    $("a.showall").click(function (evt) {
		stopEvent(evt);
		showAllExpandos();
	});
    $("a.hideall").click(function (evt) {
		stopEvent(evt);
		hideAllExpandos();
	});
    hideAllExpandos();
});