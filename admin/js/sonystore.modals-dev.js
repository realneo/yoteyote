var modalHack = (function($) {

	return {

		modalMaskStateChange: function(skin, revealed) {
			if (revealed) {
				// Get all the controls/anchors on the page.
				$("input, select, a").each(function() {
					var control = $(this);

					// If the control is not disabled, disable it and add the modal-disabled class.
					if (!control.is(":disabled")) {
						control
							.attr("disabled", "disabled")
							.addClass("modal-disabled")
						;
					}
				});

				// Now, get all the inputs disabled this way in the modal and enable them.
				skin.find(".modal-disabled").removeAttr("disabled");
			}

			else {
				// Enable all the controls that were disabled by modal-disabled.
				$(".modal-disabled")
					.removeAttr("disabled")
					.removeClass("modal-disabled")
				;
			}
		}

	};

})(jQuery);

var ssModals = (function($) {

	var
			TARGET_SELECTOR			= ".mod-modal"
		,	CONTENT_SELECTOR		= ".modal-content"
		,	SUPPLEMENT_SELECTOR		= ".modal-inner"
		,	CLOSE_SELECTOR			= ".modal-close"
		,	STATE_SELECTOR			= ".modal-state"
		,	DEFAULT_STATE_SELECTOR	= STATE_SELECTOR + ".default"
		,	PAGELOAD_TRIGGER		= ".trigger-pageLoad"
	;

	var skinMain = '<div class="modal-container"> \
		<div class="modal-inner"> \
			<div class="modal-backdrop"></div> \
			<div class="modal-row"> \
				<div class="modal-corner modal-topLeft pngfix"></div> \
				<div class="modal-corner modal-topRight pngfix"></div> \
				<div class="modal-top pngfix"></div> \
			</div> \
			<div class="modal-row"> \
				<div class="modal-left pngfix"> \
					<div class="modal-right"> \
						<div class="modal-content"></div> \
					</div> \
				</div> \
			</div> \
			<div class="modal-row"> \
				<div class="modal-corner modal-bottomLeft pngfix"></div> \
				<div class="modal-corner modal-bottomRight pngfix"></div> \
				<div class="modal-bottom pngfix"></div> \
			</div> \
		</div> \
	</div>';

	/*	Markup for the arrows (used by tooltips) and close button (used by everything else). */
	var skinArrow = '<div class="modal-supplement modal-arrow pngfix"></div>';
	var skinClose = '<a href="#modal-close" class="modal-supplement modal-close pngfix"></a>';

	/*	A convenience object for proper arrow placement related to the window's position.
	 *	For instance: Tooltips appear to the right of a target would have an arrow pointing left.
	 */
	var arrowPositions = {
			top: 		"bottom"
		,	right: 		"left"
		, 	bottom: 	"top"
		,	left: 		"right"
	};


	/*	A jQueried reference to the body element. This gets set on init(). */
	var body = null;

	var _options = {

			// What is the window's constrained width (in px)?
			width: 				"232"

			// How will the window be activated? Available settings: hover, hoverPersist, click, custom
		,	trigger: 			"hover"

			// Where will this be positioned related to the trigger? top, right, bottom, left, absolute
		,	position: 			"bottom"

			// Does the window need to be nudged to a different position? These options may need to be used
		,	nudgeX:				"0"
		,	nudgeY:				"0"

			// How quickly will the window appear/disappear (in ms)?
		,	animationSpeed: 	"200"

			// Determines if this window has multiple states (for instance, if it can be the target of AJAX responses).
		,	hasStates: 			"false"

			// Determines if this window is inside a parent popup or modal. If set to "true", a clear mask will be placed on the parent.
			// You don't need to manually set this unless it will help you remember the window in the markup.
		,	hasParent: 			"false"

			// A callback function fired when the window closes. Public functions buried in objects are fine as the string will be
			// parsed to find the root function (e.g., myObject.anotherObject.myFunction). Note: Do not include the 'window' object.
		,	onClose: 			null

			// Similar to onClose, onTrigger fires before the window opens. This can be useful for displaying dynamic content.
		,	onTrigger: 		null

		,	mask: 				"false"

		,	maskStateFunction: 	modalHack.modalMaskStateChange

			// PJH - For when you have a link that needs to click out and have a tooltip
		,	combo:				"false"

	};

	// An array of potential callback functions that could fire during the modal's life.
	var _callbacks = [
			"onClose"		// Fires after the modal fades out.
		,	"onTrigger"		// Fires before the modal fades in.
	];


	function getOptions(element) {

		var options = {};

		// Now, let's cycle through all the available options (defined by our _options variable)
		// and populate our 'options' object with data from the element.
		for (var opt in _options) {
			var elementOpt = element.attr("data-" + opt);

			// If the option as a data attribute is not found on the element, set a default.
			options[opt] = elementOpt == undefined ? _options[opt] : elementOpt;
		}

		// Loop through the available modal callbacks and see if they are present on this modal.
		// If they are, parse the supplied callback string reference into a real function call.
		for (var c = 0, len = _callbacks.length; c < len; c++) {
			var callback = options[_callbacks[c]];
			if (callback) {
				var fun = window;
				var parts = callback.split(".");
				for (var p = 0, plen = parts.length; p < plen; p++) {
					fun = fun[parts[p]];
				}
				options[_callbacks[c]] = fun;
			}
		}

		return options;
	}

	function decorateAndListen(target, skin, opts) {

		// Let's cache the 'trigger' option because we use it multiple times here.
		var trigger = opts.trigger;

		// Let's define the show/hide functionality we'll be using below.
		function reveal() {

			// Fire the onTrigger callback if one exists. This should probably go inside the
			// "has disabled" logic block below but for R035 it makes sense to be here.
			if (opts.onTrigger) opts.onTrigger(skin);

			if (!skin.hasClass("disabled")) {

				// Fade in the window at the defined speed.
				skin.fadeIn(opts.animationSpeed);

				// Attach a click listener on the body to hide the modal.
				body.bind('click', conceal);	// Change to 'on' for jQuery 1.7.

				// If the 'mask' option is set the page behind the modal will be dimmed.
				if (opts.mask === "true") {
					body.append(
						$("<div>", {"class": "modal-mask"})
							.css('height', $(document).height() + 'px')
					);
					if (opts.maskStateFunction) opts.maskStateFunction(skin, true);
				}

				// If the 'hasParent' option is set, mask out the parent window to prevent interactions
				if (opts.hasParent === "true") {
					var parent = target.closest(ssModals.CONTAINER_SELECTOR);
					var mask = $("<div>", {"class": "modal-parentMask"});
					skin.parent()
						.append(mask)
						.css("z-index", "1000")
					;

					mask
						.css({width: $(document).width() + "px", height: $(document).height() + "px"})
						.click(conceal)
						.offset({top:0, left:0})
					;
				}
			}
		}

		function conceal() {
			skin.fadeOut(opts.animationSpeed, function() {

				// Fire the callback if one exists. Do this before changing state because
				// some callback functions rely on the current state (before closing).
				if (opts.onClose) opts.onClose(skin);

				// Set the window's state to default if the window has multiple states.
				if (opts.hasStates == "true") ssModals.changeState(skin, "default");

				// Remove the body's click listener. We don't want click event pollution.
				body.unbind('click', conceal);		// Change to 'off' for jQuery 1.7.
			});

			// trash the mask
			if (opts.mask === "true") {
				body.find(".modal-mask").remove();
				if (opts.maskStateFunction) opts.maskStateFunction(skin);
			}

			// If there is a parent, remove the parent mask.
			if (opts.hasParent === "true") {
				skin.parent().css("z-index", "");
				skin.next(".modal-parentMask").remove();
			}
		}

		// Anchor targets should do nothing other than launch the window unless it's a combo link
		if (target.is("a") && opts.combo != "true") target.click(function(e) { return false; });

		// If the trigger type is "hover", we add an arrow pointing to the target
		// and attach the jQuery 'hover' shortcut listener.
		if (trigger == "hover") {

				//	Added by VR to disable left nav tooltips on Category page
				if (target.hasClass("link-facetNavDimension") && (jQuery.browser.msie && (parseInt(jQuery.browser.version, 10) == 7))) { return false; };

			var arrow = $(skinArrow).addClass("arrow-" + arrowPositions[opts.position]);
			skin.find(SUPPLEMENT_SELECTOR).append(arrow);
			target.hover(reveal, conceal);
		}
		else if (trigger == "hoverPersist") {
			target.mouseover(reveal);
			skin
				.click(function(e) { e.stopPropagation(); })
				.mouseleave(conceal)
			;
		}
		else {
			var close = $(skinClose);
			skin.find(SUPPLEMENT_SELECTOR).append(close);
			skin.find(CLOSE_SELECTOR).click(conceal);
			skin.click(function(e) { e.stopPropagation(); });

			// If the trigger is "click", add a "click" listener to the target.
			if (trigger == "click") {
				target.click(reveal);
			}

			// Else, have the target listen for the defined custom event (ssModals.TRIGGER_EVENT).
			// This grants a little more versatility.
			else {
				target.bind(ssModals.TRIGGER_EVENT, reveal);
			}
		}
	}

	function positionWindow(target, skin, opts) {

		// A reference to the arrow element if it exists. We'll need to position this too.
		var arrow = skin.find(".modal-arrow");

		// The window's base position is the target's position.
		var skinCSS = target.position();
		skin.css("width", opts.width);

		switch (opts.position) {

			case "top":
				skinCSS.top -= skin.height();
				skinCSS.left += ((target.width() - skin.width()) / 2);
				if (arrow) arrow.css("left", (skin.width() - arrow.width()) / 2);
				break;

			case "right":
				skinCSS.top += ((target.height() - skin.height()) / 2);
				skinCSS.left += target.width();
				if (arrow) arrow.css("top", (skin.height() - arrow.height()) / 2);
				break;

			case "bottom":
				skinCSS.top += target.height();
				skinCSS.left += ((target.width() - skin.width()) / 2);
				if (arrow) arrow.css("left", (skin.width() - arrow.width()) / 2);
				break;

			case "left":
				skinCSS.top += ((target.height() - skin.height()) / 2);
				skinCSS.left -= skin.width();
				if (arrow) arrow.css("top", (skin.height() - arrow.height()) / 2);
				break;

			// If the position is 'absolute', reset 'top' and 'left'. We'll use 'nudgeX'
			// and 'nudgeY' for positioning (see below).
			case "absolute":
				skinCSS.top = 0;
				skinCSS.left = 0;
				break;
		}

		if (opts.position != "css") {
			skinCSS.left += +opts.nudgeX;
			skinCSS.top += +opts.nudgeY;
			skin.css(skinCSS);
		}
	}

	function configure(selector) {

		// If a selector wasn't passed, configure all the windows.
		// This is for ease-of-use; to initialize all windows simply use: ssModals.init();
		if (!selector) selector = TARGET_SELECTOR;

		// Let's find all the targets and work on each one.
		$(selector).each(function() {

			var target = $(this);

			var baseContent;

			// allowing for a combo attribute
			if (target.attr("data-combo") && target.attr("data-combo")==="true") {
				baseContent = $(target.attr("rel"));
			}
			else {
				baseContent = $(target.attr("href") || target.attr("rel"));
			}

			// If a content element was found, we're good. Continue the configuration.
			if (baseContent.length > 0) {

				// Show the content. It should be hidden by default so it can't accidentally pollute the page.
				baseContent.show();

				// Extract 'data-' attribute options from the target. Set defaults when necessary.
				var opts = getOptions(target);

				// If the window has child elements containing the "modal-state" class, set "hasStates" to "true".
				if (baseContent.find(STATE_SELECTOR)[0]) opts.hasStates = "true";

				// If the window is inside another window, set "hasParent" to "true".
				if (target.closest(ssModals.CONTAINER_SELECTOR)[0]) opts.hasParent = "true";

				// Get a jQuery'd instance of the skin.
				var skin = $(skinMain);

				// PJH - CTO - remove existing one incase we need to re-init
				//target.parent().children("div.modal-container").remove();

				// Insert the skin under the target's parent so the positioning is relative.
				target.parent().append(skin);

				var content = baseContent.parent().is(CONTENT_SELECTOR) ? baseContent.clone().attr("id", "") : baseContent.detach();
				skin.find(CONTENT_SELECTOR).append(content);

				// Now add event listeners, graphical components, and positioning based on the options.
				decorateAndListen(target, skin, opts);
				positionWindow(target, skin, opts);
			}
		});
	}

	return {
		TRIGGER_EVENT: "modalReveal"

	,	CONTAINER_SELECTOR: ".modal-container"

	,	init: function(selector) {
			body = $('body');
			configure(selector);
		}

	,	changeState: function(container, stateClass) {
			container.find(STATE_SELECTOR).hide();
			container.find("." + stateClass).show();
			container.closest(this.CONTAINER_SELECTOR).attr("data-state", stateClass);
		}

	,	launchPageLoadModals: function() {
			$(PAGELOAD_TRIGGER).trigger(ssModals.TRIGGER_EVENT);
		}

	}

})(jQuery);

jQuery(document).ready(function() {
	ssModals.init();
	ssModals.launchPageLoadModals();
	if (typeof sonyStoreCartCheckout != "undefined") sonyStoreCartCheckout.configureTabIndices();
});