/**
 * EVENT
 *
 * @author      Samet Tarim
 * @copyright   (c) 2016, Samet Tarim
 * @link        http://samet-tarim.de/wp/melibu-plugins/sharing-social-safe
 * @package     Melibu Sharing Social Safe
 * @since       1.0
 */

/**
 * EventListener
 * @param {type} elem
 * @param {type} evnt
 * @param {type} func
 * @returns {undefined}
 */
function addEvent(elem, evnt, func) {

    if (elem.addEventListener) {

        elem.addEventListener(evnt, func, false); // W3C DOM

    } else if (elem.attachEvent) {

        elem.attachEvent("on" + evnt, func); // IE DOM
    }
}