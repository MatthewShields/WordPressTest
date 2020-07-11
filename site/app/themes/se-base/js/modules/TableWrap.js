// import $ from "cash-dom";

const TableWrap = class {
    constructor(el, wrapper) {
        this.target = el;
        this.wrapper = wrapper;

        this._init_events();
    }

    _init_events() {
        var self = this;
        this.target.wrap('<div class="'+self.wrapper+'"></div>');
    }
};

export default TableWrap;