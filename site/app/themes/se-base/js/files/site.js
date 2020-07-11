import $ from "cash-dom";
import FilterNav from '../modules/FilterNav';
import Accordion from '../modules/Accordion';
import TableWrap from '../modules/TableWrap';
import Menu from '../modules/Menu';
import EmbedResponsively from '../modules/EmbedResponsively';

$('.post-list__section--filterable').each(function() {
    new FilterNav($(this));
})

new Accordion($('.accordion__title'));
new TableWrap($('.main-content table:not([class])'), 'table-wrapper');
new EmbedResponsively($('.main-content iframe, .main-content embed, .main-content object'), 'embed-container');
new Menu();