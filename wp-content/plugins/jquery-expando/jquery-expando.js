jQuery(document).ready(function ($) {
    function getInnerText($e) {
<<<<<<< HEAD
        return $("#" + $e.attr("id").replace('expando_link_','expando_text_'));
    }

    function getViewModChild($e) {
        return $("#" + $e.attr("id").replace('expando_link_','expando_viewmod_'));
    }
	
    function getTitle($e) {
        return $("#" + $e.attr("id").replace('expando_link_','expando_title_'));
=======
        return $e.siblings("div.expando_text:first");
    }

    function getViewModChild($e) {
        return $e.children("span.view_modifier:first");
>>>>>>> 9b8e15da06769f4a1173d25252d7d1f658bc5f62
    }

    function stopEvent($e) {
        $e.preventDefault();
        $e.stopPropagation();
    }

    function hideExpando($link) {
		var $inner = getInnerText($link);
		var $viewMod = getViewModChild($link);
<<<<<<< HEAD
        $inner.hide();
        $viewMod.attr('data-visible','false').html($viewMod.attr("data-show"));
        $link.attr('data-visible','false');
=======
        $inner.removeClass("show").addClass("hide");
        $viewMod.html($viewMod.attr("data-show"));
>>>>>>> 9b8e15da06769f4a1173d25252d7d1f658bc5f62
    }

    function showExpando($link) {
		var $inner = getInnerText($link);
		var $viewMod = getViewModChild($link);
<<<<<<< HEAD
        $inner.show();
        $viewMod.attr('data-visible','true').html($viewMod.attr("data-show"));
        $link.attr('data-visible','true');
=======
        $inner.removeClass("hide").addClass("show");
        $viewMod.html($viewMod.attr("data-hide"));
>>>>>>> 9b8e15da06769f4a1173d25252d7d1f658bc5f62
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
<<<<<<< HEAD
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
=======
    $allLinks.each(function () {
        var $link = $(this);
        var $inner = getInnerText($link);
        $link.on("click", function ($e) {
            stopEvent($e);
            if ($inner.hasClass("show")) {
                hideExpando($link);
            } else if ($inner.hasClass("hide")) {
                showExpando($link);
            }
        });
    });
    $("a.showall").each(function () {
        var $i = $(this);
        $i.on("click", function (evt) {
            stopEvent(evt);
			showAllExpandos();
        });
    });
    $("a.hideall").each(function () {
        var s = $(this);
        s.on("click", function (s) {
            stopEvent(s);
			hideAllExpandos();
        });
    });
>>>>>>> 9b8e15da06769f4a1173d25252d7d1f658bc5f62
    hideAllExpandos();
});