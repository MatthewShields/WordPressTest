// import $ from "cash-dom";

const TableWrap = class {
    constructor(el, wrapper) {
        this.target = el;
        this.nav = $('#main-nav');
        this.html_doc = $('html');
        this.menu_toggle_btn = $('#menu-toggle');
        this.menu_parents = this.nav.find('.menu-item-has-children');
        this.menu_dropdowns = false;

        this._init_events();
    }

    _init_events() {
        var self = this;
        self.menu_toggle_btn.on('click', self.menu_toggle.bind(this));
        self.nav.on('DOMMouseScroll mousewheel', self.menu_scroll.bind(this));
        self.add_dropdown_buttons();
    }

    add_dropdown_buttons() {
        var self = this;
        self.menu_parents.append('<a href="javascript:void(0)" class="dropdown-toggle">Expand Menu Item</a>');
        self.menu_dropdowns = $('.dropdown-toggle');
        self.menu_dropdowns.on('click', self.toggle_dropdown.bind(this));
    }

    toggle_dropdown(e) {
        console.log(e);
        console.log();
        var target = $(e.currentTarget);
        target.parent().toggleClass('open');
    }

    menu_scroll(ev) {
        var self = this;
        // console.log(self.nav);
        // console.log(ev);
        var scrollTop = self.nav.scrollTop(),
            scrollHeight = self.nav.prop('scrollHeight'),
            height = self.nav.height(),
            delta = (ev.type == 'DOMMouseScroll' ?
                ev.originalEvent.detail * -40 :
                ev.originalEvent.wheelDelta),
            up = delta > 0;

        var prevent = function() {
            console.log('prevent');
            ev.stopPropagation();
            ev.preventDefault();
            ev.returnValue = false;
            return false;
        }

        console.log('break');
        console.log(scrollTop);
        console.log(scrollHeight);
        console.log(height);

        if (!up && -delta > scrollHeight - height - scrollTop) {
            // Scrolling down, but this will take us past the bottom.
            self.nav.scrollTop(scrollHeight);
            return prevent();
        } else if (up && delta > scrollTop) {
            // Scrolling up, but this will take us past the top.
            self.nav.scrollTop(0);
            return prevent();
        }
    }

    menu_toggle() {
        var self = this;
        self.html_doc.toggleClass('menu-open');
        self.nav.toggleClass('nav--active');
    }


};

export default TableWrap;