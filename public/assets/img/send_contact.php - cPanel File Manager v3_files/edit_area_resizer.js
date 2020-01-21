var edit_area_resize = { editAreaId: "", frameId: "" };

function setElementIds(editAreaId) {
    edit_area_resize.editAreaId = editAreaId;
    edit_area_resize.frameId = "frame_" + editAreaId;
}

function resize_editarea() {
    var codeWindowFrEl = document.getElementById(edit_area_resize.frameId);
    if (!codeWindowFrEl) {
        setTimeout(resize_editarea, 500);
    }
    doResize();
}

function doResizeforscroll() {
    doResize(2);
}

function doResize(doover) {
    var codeWindowFrEl = document.getElementById(edit_area_resize.frameId);
    if (!codeWindowFrEl || editAreaLoader.waiting_loading["resize_area.js"] != "loaded") {
        setTimeout(doResize, 100);
        return;
    }
    var resizeEl = document.getElementById("edit_area_resize");
    if (!resizeEl) {
        var div = document.createElement("div");
        div.id = "edit_area_resize";
        div.style.border = "dashed #888888 1px";
        var a = editAreas[editAreaEl]["textarea"];
        var father = a.parentNode;
        father.insertBefore(div, a);
        a.style.display = "none";
    }
    resizeEl = document.getElementById("edit_area_resize");
    if (resizeEl) {
        try {
            var codewinXY = YAHOO.util.Dom.getXY(codeWindowFrEl);
            editAreaLoader.execCommand(edit_area_resize.editAreaId, "start_resize", {});
            var scrolled = window.scrollX || 0;
            var viewportHeight = YAHOO.util.Dom.getViewportHeight();
            var viewportWidth = YAHOO.util.Dom.getViewportWidth();
            var parent_width = CPANEL.dom.get_content_width(resizeEl.parentNode);
            resizeEl.style.width = Math.min(viewportWidth - codewinXY[0], parent_width) + "px";
            resizeEl.style.height = (viewportHeight - codewinXY[1] - scrolled - 3) + "px";
            editAreaLoader.end_resize_area();

            if (doover != 2) {
                setTimeout(doResizeforscroll, 250);
            }
        } catch (e) {
            setTimeout(doResize, 100);
        }
    } else {
        setTimeout(doResize, 100);
    }
}

function doResizeSoon() {
    var now = new Date();
    lastResizeRequestTime = now.getTime();
    setTimeout(seeIfResizeTime, 200);
}

function seeIfResizeTime() {
    var now = new Date();
    var nowTime = now.getTime();
    if (lastResizeRequestTime < lastResizeTime) {
        return;
    }
    if (lastResizeRequestTime + 500 < nowTime) {
        lastResizeRequestTime = 0;
        lastResizeTime = nowTime;
        doResize();
    } else {
        setTimeout(seeIfResizeTime, 200);
    }

}
