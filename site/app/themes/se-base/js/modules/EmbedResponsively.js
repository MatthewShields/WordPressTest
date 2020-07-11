// import $ from "cash-dom";

const EmbedResponsively = class {
    constructor(el, wrapper) {
        this.targets = el;
        this.wrapper = wrapper;

        this._init_events();
    }

    _init_events() {
        var self = this;
        self.targets.each(function () {
            var target = $(this);

            if(!target.parent().hasClass('embed-container')) {
                var width = target.attr('width');
                var height = target.attr('height');
                var ratio = 56.25;

                if(width && height) {
                    var ratio = (height / width) * 100;
                }

                target.wrap('<div style="padding-bottom:'+ratio+'%" class="'+self.wrapper+'"></div>');
            }
        });
    }
};

export default EmbedResponsively;