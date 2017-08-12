

$(document).ready(function(){

	$('#select_btn li:first').css('border','none');

	if ($('#zSlider').length) {

		zSlider();

		$('#h_sns').find('img').click(function(){

			$(this).fadeTo(200,0.5);

		}, function(){

			$(this).fadeTo(100,1);

		});

	}

	function zSlider(ID, delay){

		var ID=ID?ID:'#zSlider';

		var delay=delay?delay:8000;

		var currentEQ=0, picnum=$('#picshow_img li').size(), autoScrollFUN;

		$('#select_btn li').eq(currentEQ).addClass('current');

		$('#picshow_img li').eq(currentEQ).show();

		$('#picshow_tx li').eq(currentEQ).show();

		autoScrollFUN=setTimeout(autoScroll, delay);

		function autoScroll(){

			clearTimeout(autoScrollFUN);

			currentEQ++;

			if (currentEQ>picnum-1) currentEQ=0;

			$('#select_btn li').removeClass('current');

			$('#picshow_img li').hide();

			$('#picshow_tx li').hide().eq(currentEQ).slideDown(400);

			$('#select_btn li').eq(currentEQ).addClass('current');

			$('#picshow_img li').eq(currentEQ).show();

			autoScrollFUN = setTimeout(autoScroll, delay);

		}

		$('#picshow').click(function(){

			clearTimeout(autoScrollFUN);

		}, function(){

			autoScrollFUN = setTimeout(autoScroll, delay);

		});

		$('#select_btn li').hover(function(){

			var picEQ=$('#select_btn li').index($(this));

			if (picEQ==currentEQ) return false;

			currentEQ = picEQ;

			$('#select_btn li').removeClass('current');

			$('#picshow_img li').hide();

			$('#picshow_tx li').hide().eq(currentEQ).slideDown(100);

			$('#select_btn li').eq(currentEQ).addClass('current');

			$('#picshow_img li').eq(currentEQ).show();

			return false;

		});

	};

})


addComment = {
    moveForm: function(d, f, i, c) {
        var m = this,
        a, h = m.I(d),
        b = m.I(i),
        l = m.I("cancel-comment-reply-link"),
        j = m.I("comment_parent"),
        k = m.I("comment_post_ID");
        if (!h || !b || !l || !j) {
            return
        }
        m.respondId = i;
        c = c || false;
        if (!m.I("wp-temp-form-div")) {
            a = document.createElement("div");
            a.id = "wp-temp-form-div";
            a.style.display = "none";
            b.parentNode.insertBefore(a, b)
        }
        h.parentNode.insertBefore(b, h.nextSibling);
        if (k && c) {
            k.value = c
        }
        j.value = f;
        l.style.display = "";
        l.onclick = function() {
            var n = addComment,
            e = n.I("wp-temp-form-div"),
            o = n.I(n.respondId);
            if (!e || !o) {
                return
            }
            n.I("comment_parent").value = "0";
            e.parentNode.insertBefore(o, e);
            e.parentNode.removeChild(e);
            this.style.display = "none";
            this.onclick = null;
            return false
        };
        try {
            m.I("comment").focus()
        } catch(g) {}
        return false
    },
    I: function(a) {
        return document.getElementById(a)
    }
};



