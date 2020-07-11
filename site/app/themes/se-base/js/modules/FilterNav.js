// import $ from "cash-dom";

const FilterNav = class {
    constructor(el) {
        this.filter_section = el;
        this.filter_links = this.filter_section.find('.filter-list a');
        this.filter_selected = this.filter_section.find('.filter-list__selected');
        this.load_more_btn = this.filter_section.find('.post-list__load');
        this.posts_container = this.filter_section.find('.post-list');
        this.post_type = this.filter_section.attr('data-post-type');
        this.cat_id = this.filter_section.attr('data-cat');
        this.ppp = 6;
        this.page = 1;
        this.in_ajax = false;

        this._init_events();
    }

    _init_events() {
        this.filter_links.on('click', this.prepare_ajax.bind(this));
        this.load_more_btn.on('click', this.load_more.bind(this));
    }

    prepare_ajax(e) {
        var self = this;
        e.preventDefault();

        if (self.in_ajax === false) {
            self.in_ajax = true;

            self.filter_selected.text($(e.currentTarget).text());

            var cat_id_str = $(e.currentTarget).parent().attr('class');
            var cat_id = parseInt(cat_id_str.replace(/\D/g, ''), 10);

            self.page = 1;

            if (isNaN(cat_id)) {
                self.cat_id = false;
            } else {
                self.cat_id = cat_id;
            }

            self.filter_section.attr('data-cat', self.cat_id);

            self.prepare_section(self.ppp, true);

        }
    }

    prepare_section(ppp, clear) {
        var self = this;

        this.filter_section.addClass('in-ajax');

        self.call_ajax(ppp, clear);
    }

    resolve_section() {
        var self = this;
        self.in_ajax = false;
        this.filter_section.removeClass('in-ajax');
    }

    call_ajax(ppp, clear) {
        var self = this;

        var data_obj = {
            action: 'ajax_pagination',
            query_vars: ajaxpagination.query_vars,
            post_type: self.post_type,
            cat_id: self.cat_id,
            ppp: ppp,
            page: self.page
        };

        self.load_more_btn.addClass('loading');

        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: data_obj,
            success: function(html) {

                var data_obj = JSON.parse(html);

                if (data_obj['html']) {

                    if (clear === true) {
                        self.posts_container.html(data_obj['html']);
                    } else {
                        self.posts_container.append(data_obj['html']);
                    }

                }

                if (data_obj['max_pages'] === self.page) {
                    self.hide_load_more();
                } else {
                    self.show_load_more();
                }

                self.load_more_btn.removeClass('loading');

                self.resolve_section();
            }
        })
    }

    load_more() {
        var self = this;

        if (self.in_ajax === false) {
            self.in_ajax = true;
            self.page++;
            this.prepare_section(self.ppp, false);
        }
    }

    hide_load_more() {
        var self = this;
        self.load_more_btn.hide();
    }

    show_load_more() {
        var self = this;
        self.load_more_btn.show();
    }
};

export default FilterNav;